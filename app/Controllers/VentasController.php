<?php 
namespace App\Controllers;
use App\Models\VentaModel;
use App\Models\Usuarios_Model;
use App\Models\ProductosModel;
use App\Models\DetalleVentaModel;
require_once FCPATH . '../vendor/autoload.php';

use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Exceptions\MPApiException;

class VentasController extends BaseController
{
    public function listarVentas(){
        $ventaModel = new VentaModel();
        $usuarioModel = new Usuarios_Model();
        $busqueda = $this->request->getGet('q');

        $ventasRaw = $ventaModel->orderBy('id_venta', 'DESC')->findAll();
        $ventas = [];

        foreach ($ventasRaw as $venta) {
            $cliente = $usuarioModel->find($venta['persona_id']);
            $clienteNombre = ($cliente && isset($cliente['persona_nombre'], $cliente['persona_apellido']))
                ? $cliente['persona_nombre'] . ' ' . $cliente['persona_apellido']
                : 'N/D';

            // Si hay búsqueda, filtramos en este punto con todos los campos disponibles
            if ($busqueda) {
                $match = false;
                $valores = [
                    strtolower($clienteNombre),
                    strtolower($venta['estado_pago']),
                    strtolower($venta['metodo_pago']),
                    strval($venta['total']),
                    date('d/m/Y', strtotime($venta['created_at'] ?? $venta['fecha_estimada']))
                ];

                foreach ($valores as $valor) {
                    if (stripos($valor, strtolower($busqueda)) !== false) {
                        $match = true;
                        break;
                    }
                }

                if (!$match) continue;
            }

            $ventas[] = [
                'id_venta'       => $venta['id_venta'],
                'id_cliente'     => $venta['persona_id'],
                'cliente_nombre' => $clienteNombre,
                'metodo_pago'    => $venta['metodo_pago'],
                'total'          => $venta['total'],
                'venta_fecha'    => $venta['created_at'] ?? $venta['fecha_estimada'],
                'estado_pago'    => $venta['estado_pago']
            ];
        }

        $data = [
            'titulo' => 'Listado de Ventas',
            'ventas' => $ventas
        ];

        return view('plantillas/adminNav_view', $data)
            . view('backend/listarVentas_view', $data);
    }

    public function verVenta($idVenta){
    $ventaModel = new VentaModel();
    $detalleModel = new DetalleVentaModel();
    $usuarioModel = new Usuarios_Model(); 
    $talleModel = new \App\Models\TalleModel();    

    $venta = $ventaModel->find($idVenta);

    if (!$venta) {
        return redirect()->to('admin/ventas')->with('error', 'Venta no encontrada');
    }

    // Obtener cliente
    $cliente = $usuarioModel->find($venta['persona_id']);
    $nombreCliente = $cliente
        ? $cliente['persona_nombre'] . ' ' . $cliente['persona_apellido']
        : 'N/D';

    // Obtener detalle de la venta
    $detalleRaw = $detalleModel
        ->where('venta_id', $idVenta)
        ->findAll();

    foreach ($detalleRaw as &$item) {
        if (isset($item['id_talle'])) {
            $talle = $talleModel->find($item['id_talle']);
            $item['talle'] = $talle ? $talle['descripcion'] : 'Sin especificar';
        } else {
            $item['talle'] = 'Sin especificar';
        }
    }

    $data = [
        'venta' => [
            'id_venta'       => $venta['id_venta'],
            'id_cliente'     => $venta['persona_id'],
            'cliente_nombre' => $nombreCliente,
            'metodo_pago'    => $venta['metodo_pago'],
            'estado_pago'    => $venta['estado_pago'],
            'total'          => $venta['total'],
            'fecha_estimada' => $venta['fecha_estimada']
        ],
        'detalle' => $detalleRaw
    ];

    return view('plantillas/adminNav_view', $data)
         . view('Backend/detalleVenta_view', $data);
}

    public function cambiarEstadoPago($idVenta){
        $ventaModel = new \App\Models\VentaModel();
        $venta = $ventaModel->find($idVenta);

        if (!$venta) {
            return redirect()->back()->with('error', 'Venta no encontrada');
        }

        // Alternar estado
        $nuevoEstado = ($venta['estado_pago'] === 'pendiente') ? 'pagado' : 'pendiente';
        $ventaModel->update($idVenta, ['estado_pago' => $nuevoEstado]);

        return redirect()->back()->with('success', 'Estado de pago actualizado a ' . strtoupper($nuevoEstado));
    }

    public function historial(){
        $session = session();
        $clienteId = $session->get('id');

        $ventaModel = new \App\Models\VentaModel();
        $ventas = $ventaModel->where('persona_id', $clienteId)
                            ->orderBy('fecha', 'DESC')
                            ->findAll();

        return view('plantillas/header_view') . view('contenidos/historial_view', [
            'titulo' => 'Mis Compras',
            'ventas' => $ventas
        ]).  view('plantillas/footer_view');
    }

    public function verVentaCliente($idVenta){
    $session = session();
    $clienteId = $session->get('id');

    $ventaModel = new VentaModel();
    $detalleModel = new DetalleVentaModel();
    $talleModel = new \App\Models\TalleModel();

    $venta = $ventaModel->find($idVenta);
    if (!$venta || $venta['persona_id'] != $clienteId) {
        return redirect()->to('cliente/historial')->with('error', 'Venta no encontrada o no autorizada.');
    }

    $detalleRaw = $detalleModel->where('venta_id', $idVenta)->findAll();

    foreach ($detalleRaw as &$item) {
        $talle = $talleModel->find($item['id_talle']);
        $item['talle'] = $talle ? $talle['descripcion'] : 'Sin especificar';
    }

    return view('plantillas/header_view') . view('contenidos/detalleCompra_view', [
        'titulo' => 'Detalle de Compra',
        'venta' => $venta,
        'detalle' => $detalleRaw
    ]) . view('plantillas/footer_view');
}

    public function formulario_cliente(){
        MercadoPagoConfig::setAccessToken(getenv('MP_ACCESS_TOKEN'));

        $carrito = session()->get('carrito') ?? [];
        $items = [];

        foreach ($carrito as $producto) {
            $items[] = [
                "title" => $producto['nombre'],
                "quantity" => intval($producto['cantidad']),
                "unit_price" => floatval(str_replace(',', '.', $producto['precio']))
            ];
        }

        $client = new PreferenceClient();

        $preference = $client->create([
            "items" => $items,
            "back_urls" => [
                "success" => "https://example.com/compra_exitosa",
                "failure" => "https://example.com/compra_fallida",
                "pending" => "https://example.com/compra_pendiente"
            ],
            "auto_return" => "approved"
        ]);

        return view('backend/form_compra', ['preference' => $preference]);
    }


    public function confirmarCompra(){
        $session = session();

        if (!$session->get('login')) {
            return redirect()->to('Iniciar_Sesion')->with('error', 'Debés iniciar sesión.');
        }

        $carrito = $session->get('carrito') ?? [];

        if (empty($carrito)) {
            return redirect()->to('ver_carro')->with('error', 'Tu carrito está vacío.');
        }

        $total = 0;
        foreach ($carrito as $item) {
            $total += floatval($item['precio']) * intval($item['cantidad']);
        }

        $metodo = $this->request->getPost('metodo_pago');
        $fechaEstimada = $this->sumarDiasHabiles(date('Y-m-d'), 3);

        $ventaModel = new VentaModel();
        $estadoPago = ($metodo === 'tarjeta') ? 'pagado' : 'pendiente';
        $idVenta = $ventaModel->insert([
            'persona_id'     => $session->get('id'),
            'metodo_pago'    => $metodo,
            'total'          => $total,
            'estado_pago'    => $estadoPago,
            'fecha_estimada' => $fechaEstimada
        ]);


        $detalleModel = new DetalleVentaModel();
        $stockModel = new \App\Models\StockTallesModel(); 
        foreach ($carrito as $item) {
            $detalleModel->insert([
                'venta_id'        => $idVenta,
                'id_talle'        => $item['talle'],
                'producto_nombre' => $item['nombre'],
                'cantidad'        => $item['cantidad'],
                'precio_unitario' => $item['precio']
            ]);

        // Restar stock del talle correspondiente
        $stockModel->where('producto_id', $item['producto_id'])
                ->where('id_talle', $item['talle'])
                ->decrement('stock', $item['cantidad']);

        // Verificar si el producto quedó sin stock total
        $totalRestante = $stockModel
            ->where('producto_id', $item['producto_id'])
            ->selectSum('stock')
            ->first();

        if (isset($totalRestante['stock']) && intval($totalRestante['stock']) <= 0) {
            $productoModel = new \App\Models\ProductosModel();
            $productoModel->update($item['producto_id'], ['estado' => null]);
        }
    }


        $session->remove('carrito');

        return redirect()->to('compra_exitosa/' . $idVenta);
    }

    public function mostrarExito($idVenta){
        $ventaModel   = new \App\Models\VentaModel();
        $detalleModel = new \App\Models\DetalleVentaModel();

        $venta = $ventaModel->find($idVenta);
        $detalles = $detalleModel->where('venta_id', $idVenta)->findAll();

        if (!$venta) {
            return redirect()->to('/')->with('error', 'Compra no encontrada.');
        }

        return redirect()->to(base_url('mensaje_exito/' . $idVenta));

    }

    public function mensajeExito($idVenta)
{
    $ventaModel   = new \App\Models\VentaModel();
    $detalleModel = new \App\Models\DetalleVentaModel();

    $venta    = $ventaModel->find($idVenta);
    $detalles = $detalleModel->where('venta_id', $idVenta)->findAll();

    if (!$venta) {
        return redirect()->to('/')->with('error', 'No se encontró la compra.');
    }

    $html = view('plantillas/header_view')
      . view('contenidos/compraExitosa_view', [
          'venta' => $venta,
          'detalles' => $detalles
      ])
      . view('plantillas/footer_view');

return $this->response->setBody($html);
}

    public function pago_pendiente(){
    return view('plantillas/header_view'). view('contenidos/pagoPendiente_view'). view('plantillas/footer_view');
    }

    public function compraExitosa(){
        return view('compraExitosa_view');
    }

    private function sumarDiasHabiles($fecha, $dias){
        $cont = 0;
        while ($cont < $dias) {
            $fecha = date('Y-m-d', strtotime($fecha . ' +1 day'));
            $diaSemana = date('N', strtotime($fecha));
            if ($diaSemana < 6) {
                $cont++;
            }
        }
        return $fecha;
    }



}




