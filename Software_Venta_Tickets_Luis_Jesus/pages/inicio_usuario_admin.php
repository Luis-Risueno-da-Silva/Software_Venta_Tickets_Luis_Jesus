<?php

    include '../libraries/db_funciones.php';

    // Iniciar sesión
    session_start();
    
    // Si la sesión tiene información incorrecta --> Nos devuelve al index.php
    if(!isset($_SESSION['rol'])){
        header('Location: ../index.php?error=true');
    }else{
        if($_SESSION['rol'] != 1){
            header('Location: ../index.php?error=true');
        }
    }

    // Si no tenemos la cookie con el nombre del usuario --> Nos devuelve al index.php
    if(!isset($_COOKIE['nombreUsuario'])){
        header('Location: ../index.php?error=true');
    }

    // Si se modifica la cookie con el nombre de usuario --> Nos devuelve al index.php
    if($_COOKIE['nombreUsuario'] != $_SESSION['nombre']){
        header('Location: ../index.php?error=true');
    }
    
    // Si no tenemos la cookie con el id del usuario --> Nos devuelve al index.php
    if(!isset($_COOKIE['idUsuario'])){
        header('Location: ../index.php?error=true');
    }
    
    // Si se modifica la cookie con el id del usuario --> Nos devuelve al index.php
    if($_COOKIE['idUsuario'] != $_SESSION['id_usuario']){
        header('Location: ../index.php?error=true');
    }

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Inicio Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    <!-- Inicio del body -->
    <body class="body">

        <!-- Inicio del main -->
        <main class="main">
            
            <h1 class="centrar">Hola, 
                <span class="text-primary"><?php echo $_COOKIE['nombreUsuario']; ?></span></h1>
            <h2 class="centrar">Esta es la pantalla de administración</h2>
            <p class="centrar">Por favor, seleccione una opción</p>
            
            <!-- Mostrar todos los ticktes que hay -->
            <a class="btn btn-primary mb-3" href="./inicio_usuario_normal.php?accion=mostrar_tickets" role="button">Mostrar los tickets</a>
            
            <br>
            
            <!-- Cerrar la sesión -->
            <a class="btn btn-secondary mb-3" href="./inicio_usuario_normal.php?accion=cerrar_sesion" role="button">Cerrar sesión</a>
            
            
            <?php
            
                $accion = filter_input(INPUT_GET, 'accion');
                
                if(isset($accion)){
                    
                    //Mostrar una tabla con los tickets disponibles
                    if($accion == 'mostrar_tickets'){
                        
                    }//if
                                       
                    // Cerrar la sesión
                    if($accion == "cerrar_sesion"){
                        $nombre = $_COOKIE['nombreUsuario'];
                        $id = $_COOKIE['idUsuario'];
                        cerrarSesion($nombre, $id);
                    }//if
                    
                }//if
            
            ?>
            
            
        </main>
        <!-- Fin del main-->
        
    </body>
    <!-- Fin del body -->
</html>
