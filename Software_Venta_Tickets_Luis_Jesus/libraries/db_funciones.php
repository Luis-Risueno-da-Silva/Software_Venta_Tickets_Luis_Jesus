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

        
        // Mostrar resultados en pantalla
        while ($fila = mysqli_fetch_assoc($result)) {
            
            if($fila["correo"] == $correo && $fila["contraseña"] == $contra__cifrada){
                
                //Se crea una cookie con el nombre del usuario
                crearCookie( $fila["nombre"] );
                
                //Se comprueba el rol del usuario
                comprobarRol( $fila["rol"] );
                
            }else{
                echo '<div class="alert alert-danger" role="alert">
                    Usuario y/o contraseña incorrectos
                  </div>'; 
            }//if-else
            
        }//while

        // Liberar el resultado
        mysqli_free_result($result);

        // Cerrar la conexión
        mysqli_close($conn);
        
    } catch (Exception $ex) {
        echo "Error con la base de datos: ". $ex->getMessage();
    }
    
}

/**
 * Esta función crea una cookie
 * 
 * @param type $valor
 */
function crearCookie($valor){
    
    setcookie("nombreUsuario", $valor, time()+3600, "/");
    
}


function comprobarRol($rol){
    
    //Rol 0 ---> Usuario Normal
    if($rol == 0){
        session_start();
        $_SESSION['rol'] = 0;
        header('Location: ./pages/inicio_usuario_normal.php');
    }
    
    //Rol 1 ---> Usuario Admin
    if($rol == 1){
        session_start();
        $_SESSION['rol'] = 1;
        header('Location: ./pages/inicio_usuario_admin.php');
    }
    
}