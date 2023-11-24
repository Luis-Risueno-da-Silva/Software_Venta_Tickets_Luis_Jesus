<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Inicio Usuario</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    <!-- Inicio del body -->
    <body>
        
        <!-- Formulario que contiene el Select-->
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            
            <!-- Select con los tickets que se pueden comprar-->
            <select class="form-select mb-3" aria-label="Default select example">
                <option selected>Selecciona una opción...</option>
                    <option value="Concierto de Beyoncé">Concierto de Beyoncé</option>
                    <option value="Concierto de Ariana Grande">Concierto de Ariana Grande</option>
                    <option value="Partido del Real Madrid">Partido del Real Madrid</option>
                    <option value="Partido del Betis">Partido del Betis</option>
                    <option value="Fórmula 1">Fórmula 1</option>
            </select>
            
            <button type="submit" class="btn btn-success mb-3">Comprar ticket</button>
        </form>
        
    </body>
    <!-- Fin del body -->
    
</html>
