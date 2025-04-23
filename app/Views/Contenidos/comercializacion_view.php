<!doctype html>
<html lang="en">
  <head><link href="assets/css/miEstiloComercializacion.css" rel="stylesheet"> </head>
  <body>
<section class="container">

  <h2 class="mt-3 px-2 mx-auto p-2 text-center fw-bold"> Brindamos distintos métodos de pago </h2>

  <p class="mt-3 bg-warning px-2 fst-italic">  </p>
  <div class="dropdown">
    <button class="dropdown-button">Medios de pago ▼</button>
       <div class="dropdown-content">
      <h1 >Tarjeta de crédito o debito</h1>
      <p> 6 cuotas sin interes para tarjetas de créditos bancarizadas</p>
      <p>Tarjeta naranja plan z hasta 9 cuotas sin interes</p>
      <p> Tarjetas de débito de todos los bancos</p>
      <h1 >MercadoPago</h1>
     <p>Pagando con dinero en cuenta obtenes 2% de descuentos los lunes</p>
      <h1 > Efectivo</h1>
      <p>Tenemos distintas alternativas de pago en efectivo</p>
      <p>Rapipago</p>
      <p>PagoFacil</p>
    </div>
  
    <button class="dropdown-button">Formas de envios ▼</button>
    <div class="dropdown-content">
    </div>
      
    <button class="dropdown-button">Entregas ▼</button>
  </div>
    <script>
  document.querySelector(".dropdown-button").addEventListener("click", function() {
    let content = document.querySelector(".dropdown-content");
    content.style.display = content.style.display === "block" ? "none" : "block";
  });
  document.addEventListener("click", function(event) {
    let dropdown = document.querySelector(".dropdown-content");
    let button = document.querySelector(".dropdown-button");

    if (!button.contains(event.target) && !dropdown.contains(event.target)) {
        dropdown.style.display = "none"; // Ocultar si se hace clic afuera
    }
  });
  </script>
</section>




    
  </body>
</html>