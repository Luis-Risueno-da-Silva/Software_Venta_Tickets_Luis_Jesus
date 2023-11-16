<?php

/**
 * Comprueba que los datos son correctos para iniciar sesión
 * 
 * @param [string] $correo
 * @param [string] $contra
 */
function iniciarSesion($correo, $contra){
   
    try{
        
        // Contraseña cifrada
        $contra__cifrada = hash('sha256', $contra);
        
        // Crear la conexión con la base de datos
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $database = "software_venta_tickets";

        $conn = mysqli_connect($servername, $username, $password, $database);
        
        // Realizar la consulta SQL
        $sql = "SELECT * FROM usuarios WHERE correo='$correo' AND contraseña='$contra__cifrada'";
        $result = mysqli_query($conn, $sql);

        /*
         *  Si la consulta devuelve algo, significa
         *  que existe el usuario
         */
        if (mysqli_num_rows($result) > 0) {
            echo "Los datos existen en la base de datos.";
        } else {
            echo '<div class="alert alert-danger" role="alert">
                    Usuario y/o contraseña incorrectos
                  </div>';
        }

    } catch (Exception $ex) {
        echo "Error con la base de datos: ". $ex->getMessage();
    }
    
}