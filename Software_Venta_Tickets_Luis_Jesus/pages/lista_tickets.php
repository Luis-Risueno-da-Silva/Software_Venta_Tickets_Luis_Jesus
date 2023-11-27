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
        <form method="post" action="./inicio_usuario_normal.php">
            
            <!-- Select con los tickets que se pueden comprar-->
            <select class="form-select mb-3" aria-label="Default select example" name="tipo_ticket">
                <option selected>Selecciona una opción...</option>
                    <option value="1">Concierto de Ariana Grande</option>
                    <option value="2">Partido del Real Madrid</option>
                    <option value="3">Partido del Betis</option>
                    <option value="4">Concierto de Beyoncé</option>
                    <option value="5">Fórmula 1</option>
            </select>
            
            <button type="submit" class="btn btn-success mb-3">Comprar ticket</button>
        </form>
        
        
    </body>
    <!-- Fin del body -->
    
</html>
