<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lista tickets modificar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    <!-- Inicio del body -->
    <body>
        
        <!-- Formulario para modificar el ticket -->
        <form method="post" action="../pages/inicio_usuario_admin.php">
            
            <!-- Select con los tickets que se van a eliminar-->
            <select class="form-select mb-3" aria-label="Default select example" name="id_ticket_modificar">
                <option selected>Selecciona el ticket que deseas modificar...</option>
                
                    <?php 
                        // Llamo la función que genera los options de este select.
                        generarOptionsTickets(); 
                    ?>
                    
            </select>
            
            <!-- Nuevo tipo del ticket -->
            <div class="mb-3">
              <label class="form-label">Nuevo tipo del ticket:</label>
              <select class="form-select" name="tipo_ticket_modificar">
                <option selected="" value="Concierto">Concierto</option>
                <option value="Partido de futbol">Partido de futbol</option>
                <option value="Carrera">Carrera</option>
              </select>
            </div>
            
            <!-- Nuevo nombre del ticket -->
            <div class="mb-3">
              <label class="form-label">Nuevo nombre del ticket: </label>
              <input type="text" class="form-control" name="nom_ticket_modificar">
            </div>
            
            <!-- Nuevo precio del ticket -->
            <div class="mb-3">
              <label class="form-label">Nuevo precio del ticket: </label>
              <input type="number" class="form-control" min="1" name="precio_ticket_modificar">
            </div>
            
            <!-- Nueva fecha de vencimiento -->
            <div class="mb-3">
              <label class="form-label">Nueva fecha de vencimiento del ticket: </label>
              <input type="date" class="form-control" name="fecha_ven_ticket_modificar">
            </div>
            
            <button type="submit" class="btn btn-success mb-3">Modificar el ticket</button>
        </form>
        
        
    </body>
    <!-- Fin del body -->
    
</html>
