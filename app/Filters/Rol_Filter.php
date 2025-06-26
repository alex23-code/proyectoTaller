<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Rol_Filter implements FilterInterface{
    public function before(RequestInterface $request, $arguments = null){
    $session = session();
    $perfil = $session->get('perfil');
 
    if ($session->get('login') && $arguments && !in_array($perfil, $arguments)) {
        if ($perfil == 1) {
            return redirect()->to('Ver_consultas')->with('error', 'Acceso denegado: vista solo para clientes.');
        } else {
            return redirect()->to('/')->with('error', 'Acceso no autorizado para tu perfil.');
        }
    }

    if (!$session->get('login') && $arguments && in_array(1, $arguments)) {
        return redirect()->to('Iniciar_Sesion')->with('error', 'Debes iniciar sesión para acceder.');
    }

    return; 
}



    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) { }
}


