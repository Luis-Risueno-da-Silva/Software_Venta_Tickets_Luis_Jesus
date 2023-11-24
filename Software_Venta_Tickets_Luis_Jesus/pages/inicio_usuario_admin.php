<?php

    session_start();
    
    if(!isset($_SESSION['rol'])){
        header('Location: ../index.php');
    }else{
        if($_SESSION['rol'] != 1){
            header('Location: ../index.php');
        }
    }

    if(!isset($_COOKIE['nombreUsuario'])){
        header('Location: ../index.php');
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
            
            <!-- Mostrar lista de usuarios registrados -->
            <a class="btn btn-primary mb-3" href="./inicio_usuario_admin.php?accion=mostrar_usuarios" role="button">Listar Usuarios Registrados</a>
            
            <br>
            <!-- Insertar tickets -->
            <a class="btn btn-primary mb-3" href="insertar_tickets.php" role="button">Insertar Tickets</a>
            
            <br>
            
            <!-- Cerrar la sesión -->
            <a class="btn btn-primary mb-3" href="./inicio_usuario_admin.php?accion=cerrar_sesion" role="button">Cerrar sesión</a>
            
            
            <?php

                $accion = filter_input(INPUT_GET, 'accion');
                
                if(isset($accion)){
                    
                    // Mostrar los tickets que tiene el usuario
                    if($accion == 'mostrar_usuarios'){
                        listarUsuarios();
                    }
                    
                    
                    // Cerrar la sesión
                    if($accion == "cerrar_sesion"){
                        $nombre = $_COOKIE['nombreUsuario'];
                        $id = $_COOKIE['idUsuario'];
                        cerrarSesion($nombre, $id);
                    }//if
                    
                }
                
            ?>

            
        </main>
        <!-- Fin del main-->
        
    </body>
    <!-- Fin del body -->
</html>
