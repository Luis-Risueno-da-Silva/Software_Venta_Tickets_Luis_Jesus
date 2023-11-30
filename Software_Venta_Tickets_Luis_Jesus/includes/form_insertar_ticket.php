<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Insertar Tickets</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    <!-- Inicio del body -->
    <body class="body">

        <!-- Inicio del main -->
        <main class="main">
            
            <p class="fs-3 fw-bold text-success">Rellena los siguientes campos:</p>
            
            <!-- Formulario para insertar un nuevo ticket -->
            <form action="../pages/inicio_usuario_admin.php" method="post">
                
                <!-- Tipo de ticket -->
                <div class="mb-3">
                  <label class="form-label">Tipo:</label>
                  <select class="form-select" name="tipo_ticket" required>
                    <option selected>Selecciona una opción...</option>
                    <option value="Concierto">Concierto</option>
                    <option value="Partido de futbol">Partido de futbol</option>
                    <option value="Carrera">Carrera</option>
                  </select>
                </div>
                
                <!-- Nombre del ticket -->
                <div class="mb-3">
                    <label class="form-label">Nombre del Ticket:</label>
                    <input type="text" class="form-control" name="nom_ticket">
                </div>
                
                <!-- Precio -->
                <div class="mb-3">
                    <label class="form-label">Precio:</label>
                    <input type="number" class="form-control" name="precio_ticket" min="1">
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Fecha de vencimiento</label>
                    <input type="date" class="form-control" name="fec_vencimiento">
                </div>
                
                <button type="submit" class="btn btn-success mb-3">Añadir nuevo ticket</button>
            </form>
             
        </main>
        <!-- Fin del main-->
        
    </body>
    <!-- Fin del body -->
</html>
