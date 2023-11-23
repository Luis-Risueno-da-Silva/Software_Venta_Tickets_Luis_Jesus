<?php

/**
 * Comprueba que los datos son correctos para iniciar sesión
 * 
 * @param [string] $correo
 * @param [string] $contra
 */
function iniciarSesion($correo, $contra){
   
    try{
        
        // Se llama a la función que cifra la contraseña
        $contra__cifrada = cifrarPass($contra);
        
        // Se llama la función que crea la conexión a la Base de Datos
        $conn = realizarConexionBD();
        
        // Realizar la consulta SQL
        $sql = "SELECT * FROM usuarios WHERE correo='$correo' AND contraseña='$contra__cifrada'";
        $result = mysqli_query($conn, $sql);

        
        // Comprobar que la consulta devuelve filas
        if($result->num_rows == 0){
            echo '<div class="alert alert-danger" role="alert">
                    Error al iniciar sesión: comprueba las credenciales.
                  </div>';
        }else{
            
            // Se llama a la función que valida el inicio de sesión
            validarInicioSesion($result, $contra__cifrada, $correo);
            
        }
        
        //Se cierra la conexión a la Base de Datos
        cerrarConexion($result, $conn);
        
    } catch (Exception $ex) {
        echo "Error con la base de datos: ". $ex->getMessage();
    }
    
}

/**
 * Esta función se utiliza para cerrar la sesión actual 
 * 
 * @param [string] $nombre
 */
function cerrarSesion($nombre, $id){
    
        session_destroy();
        setcookie("idUsuario", $id, time()-3600, "/");
        setcookie("nombreUsuario", $nombre, time()-3600, "/");
        header('Location: ../index.php');
    
}

/**
 * Esta función cierra la conexión a la Base de Datos
 * 
 * @param type $result
 * @param type $conn
 */
function cerrarConexion($result, $conn){
    
    // Liberar el resultado
    mysqli_free_result($result);

    // Cerrar la conexión
    mysqli_close($conn);
    
}

/**
 * Esta función muestra los tickets del usuario
 */
function mostrarTickets(){
    
    
    
    $id = $_COOKIE['idUsuario'];
    
    // Se hace la conexión a la Base de datos
    $conn = realizarConexionBD();
    
    $sql = "select nombre_ticket, CONCAT(precio, '€') 'Precio', fecha_ven from tickets 
            where id_ticket IN (SELECT id_ticket FROM compras WHERE id_usuario = ".$id.")";
    $result = mysqli_query($conn, $sql);
    
    
    // Comprobar que la consulta devuelve filas
    if($result->num_rows == 0){
        
        while ($fila = mysqli_fetch_assoc($result)) {

            echo $fila['nombre_ticket'];
            
        }//while
    }//if
    
    cerrarConexion($result, $conn);
    
}




/**
 * Esta función se utiliza para conectarnos a la Base de Datos
 * 
 * @return type
 */
function realizarConexionBD(){
    
   // Crear la conexión con la base de datos
   $servername = "127.0.0.1";
   $username = "root";
   $password = "";
   $database = "software_venta_tickets";

   $conn = mysqli_connect($servername, $username, $password, $database);
   
   return $conn;
}


/**
 * Esta función cifra la contraseña que pasamos como parámetro.
 * El método de cifrado es sha256
 * 
 * @param [string] $contra
 * @return [string]
 */
function cifrarPass($contra){
    
    // Contraseña cifrada
    $contra__cifrada = hash('sha256', $contra);
    return $contra__cifrada;
    
}


/**
 * Esta función valida el inicio de sesión.
 * Llama a otras dos funciones:
 *  - crearCookieNomUsuario();
 *  - comprobarRol();
 * 
 * @param [string] $result
 * @param [string] $contra__cifrada
 * @param [string] $correo
 */
function validarInicioSesion($result, $contra__cifrada, $correo){
    
    /*
     *  $fila --> Cada una de las filas que devuelve la consulta.
     *  En este caso, la consulta solo devuelve una fila.
     */
    
    while ($fila = mysqli_fetch_assoc($result)) {

        if($fila["correo"] == $correo && $fila["contraseña"] == $contra__cifrada){

            //Se crea una cookie con el id del usuario
            crearCookieIdUsuario($fila["id_usuario"]);
            
            //Se crea una cookie con el nombre del usuario
            crearCookieNomUsuario( $fila["nombre"] );

            //Se comprueba el rol del usuario
            comprobarUsuario( $fila["rol"], $fila["id_usuario"], $fila["nombre"] );

        }//if

    }//while
}


/**
 * Esta función crea una cookie.
 * El valor de la cookie es el id del usuario.
 * 
 * @param [int] $id
 */
function crearCookieIdUsuario($id){
    
    setcookie("idUsuario", $id, time()+3600, "/");
    
}


/**
 * Esta función crea una cookie.
 * El valor de la cookie es el nombre del usuario.
 * 
 * @param [string] $nombre
 */
function crearCookieNomUsuario($nombre){
    
    setcookie("nombreUsuario", $nombre, time()+3600, "/");
    
}

/**
 * Esta función comprueba de que tipo es el usuario
 * que ha iniciado sesión.
 * El usuario puede ser:
 *  - Normal (Rol 0)
 *  - Administrador (Rol 1)
 * 
 * @param [int] $rol
 */
function comprobarUsuario($rol, $id, $nombre){
    
    //Rol 0 ---> Usuario Normal
    if($rol == 0){
        session_start();
        $_SESSION['rol'] = 0;  
        $_SESSION['id_usuario'] = $id; 
        $_SESSION['nombre'] = $nombre;
        header('Location: ./pages/inicio_usuario_normal.php');
    }
    
    //Rol 1 ---> Usuario Admin
    if($rol == 1){
        session_start();
        $_SESSION['rol'] = 1; // Crear una sesión`para el administrador
        header('Location: ./pages/inicio_usuario_admin.php');
    }
    
}