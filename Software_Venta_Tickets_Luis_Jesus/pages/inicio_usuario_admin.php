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
            <a class="btn btn-primary mb-3" href="./inicio_usuario_admin.php?accion=mostrar_tickets" role="button">Mostrar los tickets</a>
            
            <br>
            
            <!-- Formulario para insertar un nuevo ticket -->
            <a class="btn btn-primary mb-3" href="./inicio_usuario_admin.php?accion=form_insertar_ticket" role="button">Insertar Ticket Nuevo</a>
            
            <br>
            
            <!-- Eliminar tickets -->
            <a class="btn btn-primary mb-3" href="./inicio_usuario_admin.php?accion=eliminar_tickets" role="button">Eliminar Ticket</a>
            
            <br>
            
            <!-- Modificar tickets -->
            <a class="btn btn-primary mb-3" href="./inicio_usuario_admin.php?accion=modificar_tickets" role="button">Modificar Ticket</a>
            
            <br>
            
            <!-- Cerrar la sesión -->
            <a class="btn btn-secondary mb-3" href="./inicio_usuario_admin.php?accion=cerrar_sesion" role="button">Cerrar sesión</a>
            
            
            <?php
            
                $accion = filter_input(INPUT_GET, 'accion');
                
                if(isset($accion)){
                    
                    //Mostrar una tabla con los tickets disponibles
                    if($accion == 'mostrar_tickets'){
                        mostrarTickets();
                    }//if
                       
                    //Formulario para insertar un nuevo ticket
                    if($accion == 'form_insertar_ticket'){
                        include '../includes/form_insertar_ticket.php';
                    }//if
                    
                    /*
                     * Mostrar un select con los tickets. Se selecciona el que
                     * se desea borrar.
                     */
                    if($accion == 'eliminar_tickets'){
                        include '../includes/lista_ticket_eliminar.php';
                    }//if
                    
                    //Modificar ticket
                    if($accion == 'modificar_tickets'){
                        include '../includes/lista_tickets_modificar.php';
                    }//if
                    
                    // Cerrar la sesión
                    if($accion == "cerrar_sesion"){
                        $nombre = $_COOKIE['nombreUsuario'];
                        $id = $_COOKIE['idUsuario'];
                        cerrarSesion($nombre, $id);
                    }//if
                       
                }//if
                
                // La página recibe un POST de si misma
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                    // Insertar un nuevo ticket a la base de datos
                    $tipo_ticket = filter_input(INPUT_POST, 'tipo_ticket');
                    $nom_ticket = filter_input(INPUT_POST, 'nom_ticket');
                    $precio_ticket = filter_input(INPUT_POST, 'precio_ticket');
                    $fec_vencimiento = filter_input(INPUT_POST, 'fec_vencimiento');
                    if(isset($tipo_ticket) && isset($nom_ticket) 
                            && isset($precio_ticket) && isset($fec_vencimiento)){
                        insertarNuevoTicket($tipo_ticket, $nom_ticket, $precio_ticket, $fec_vencimiento);
                    }//if 
                    
                    // Eliminar un Ticket
                    $id_ticket_eliminar = filter_input(INPUT_POST, 'id_ticket_eliminar');
                    if(isset($id_ticket_eliminar)){
                        eliminarTicket($id_ticket_eliminar);
                    }//if
                    
                    
                    //Modificar ticket
                    $id_ticket_modificar = filter_input(INPUT_POST, 'id_ticket_modificar');
                    $tipo_ticket_modificar = filter_input(INPUT_POST, 'tipo_ticket_modificar');
                    $nom_ticket_modificar = filter_input(INPUT_POST, 'nom_ticket_modificar');
                    $precio_ticket_modificar = filter_input(INPUT_POST, 'precio_ticket_modificar');
                    $fecha_ven_ticket_modificar = filter_input(INPUT_POST, 'fecha_ven_ticket_modificar');
                    if(isset($id_ticket_modificar) && isset($tipo_ticket_modificar) && isset($nom_ticket_modificar)
                            && isset($precio_ticket_modificar) && isset($fecha_ven_ticket_modificar)){
                        modificarTicket($id_ticket_modificar, $tipo_ticket_modificar, $nom_ticket_modificar, $precio_ticket_modificar, $fecha_ven_ticket_modificar);
                    }//if
                    
                    
                }//if
            
            ?>
            
            
        </main>
        <!-- Fin del main-->
        
    </body>
    <!-- Fin del body -->
</html>
