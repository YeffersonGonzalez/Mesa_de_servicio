<?php
    include "../app/productos_services.php";
    $objAPI = new ProductoAPI();

    
    header("Content-Type: Application/json");
   
            $objAPI->getAllProductos();                        
          
?>