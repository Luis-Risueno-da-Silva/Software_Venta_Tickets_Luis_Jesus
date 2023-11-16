<?php

    include './libraries/db_funciones.php';

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Login-Register</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/styles.css">
    </head>
    
    <!-- Inicio del body -->
    <body class="body">

        <!-- Inicio del main -->
        <main class="main">
            
            <!-- Título de la página -->
            <h1 class="title text-center">Jecht</h1>
            <h2 class="text-center">Venta de Tickets</h2>

            <hr>
           
            <!-- Formularios -->
            <section class="formularios">

                <!-- Formulario de inicio de sesión -->
                <article class="formularios__inicio--sesion">
                    <p class="form__title text-center">Inicio de sesión</p>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="text-start mb-2">
                        <!-- correo electrónico -->
                        <div class="mb-3">
                            <label class="form-label">Correo electrónico:</label>
                            <input type="email" class="form-control" name="correo__inicio--sesion">
                        </div>

                        <!-- contraseña -->
                        <div class="mb-3">
                            <label class="form-label">Contraseña:</label>
                            <input type="password" class="form-control" name="pass__inicio--sesion">
                        </div>

                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <button type="reset" class="btn btn-secondary">Limpiar</button>
                    </form>
                </article>
                
                <!-- Formulario para registrarse -->
                <article class="formularios__registrarse">
                    <p class="form__title text-center">Registrarse</p>
                    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="text-start mb-2">
                        <!-- correo electrónico -->
                        <div class="mb-3">
                            <label class="form-label">Correo electrónico:</label>
                            <input type="email" class="form-control" name="correo__registro">
                        </div>
                        
                        <!-- nombre de usuario --> 
                        <div class="mb-3">
                            <label class="form-label">Nombre de usuario:</label>
                            <input type="text" class="form-control" name="nombre__registro">
                        </div>
                        
                        <!-- contraseña -->
                        <div class="mb-3">
                            <label class="form-label">Contraseña:</label>
                            <input type="password" class="form-control" name="pass__registro">
                        </div>
                        
                        <!-- repetir contraseña -->
                        <div class="mb-3">
                            <label class="form-label">Repetir contraseña:</label>
                            <input type="password" class="form-control" name="pass__registro--repetir">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <button type="reset" class="btn btn-secondary">Limpiar</button>
                    </form>
                </article>
                
            </section>
            
            <?php
            
                // Cuando ocurre un post
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $correo__inicio = filter_input(INPUT_POST, 'correo__inicio--sesion');
                    $contraseña__inicio = filter_input(INPUT_POST, 'pass__inicio--sesion');

                    if(isset($correo__inicio) && isset($contraseña__inicio)){
                        
                        // Llamo a la función para iniciar sesión
                        iniciarSesion($correo__inicio, $contraseña__inicio);
                    }//if
                }
                
            ?>
            
        </main>
        <!-- Fin del main-->
        
    </body>
    <!-- Fin del body -->
</html>
