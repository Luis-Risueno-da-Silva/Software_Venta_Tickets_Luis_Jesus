<?php

    session_start();
    
    if(!isset($_SESSION['rol'])){
        header('Location: ../index.php');
    }else{
        if($_SESSION['rol'] != 0){
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
        <title>Inicio Usuario</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    <!-- Inicio del body -->
    <body class="body">

        <!-- Inicio del main -->
        <main class="main">
            
            <h1 class="centrar">Hola, 
                <span class="text-primary"><?php echo $_COOKIE['nombreUsuario']; ?></span></h1>
            <p class="centrar">Por favor, selecciona una de las siguientes funciones</p>

            
            
        </main>
        <!-- Fin del main-->
        
    </body>
    <!-- Fin del body -->
</html>
