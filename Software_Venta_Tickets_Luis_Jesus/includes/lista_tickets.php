<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lista tickets comprar -- Usuario Normal</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    <!-- Inicio del body -->
    <body>
        
        <!-- Formulario que contiene el Select-->
        <form method="post" action="../pages/inicio_usuario_normal.php">
            
            <!-- Select con los tickets que se pueden comprar-->
            <select class="form-select mb-3" aria-label="Default select example" name="id_ticket">
                <option selected>Selecciona una opción...</option>
                
                    <?php 
                        // Llamo la función que genera los options de este select.
                        generarOptionsTickets(); 
                    ?>
                    
            </select>
            
            <button type="submit" class="btn btn-success mb-3">Comprar ticket</button>
        </form>
        
        
    </body>
    <!-- Fin del body -->
    
</html>
