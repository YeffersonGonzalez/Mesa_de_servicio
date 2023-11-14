<?php
    include "../app/libros-listados-service.php";
    $objAPI = new librosAPI();

    
    header("Content-Type: Application/json");
    
            $objAPI->getAllLibros();                        
            

        