<?php
    #procesos requeridos para el proceso
    include("../Controlador/conexion.php");
    $con = conectar();
    #sentencia SQl para utilizar en la BBDD
    $sql = "SELECT * FROM productos";
    $query = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($query);
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--acceso a bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Página producto</title>
</head>

<body>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h1>FORMULARIO</h1>
                <form action="../Modelo/insertar.php" method="POST">

                    <input type="text" class="form-control mb-3" name="id_producto" placeholder="Código Producto">
                    <input type="text" class="form-control mb-3" name="nombre" placeholder="Producto">
                    <input type="text" class="form-control mb-3" name="categoria" placeholder="Categoría">
                    <input type="text" class="form-control mb-3" name="precio" placeholder="Precio Unitario">
                    <input type="text" class="form-control mb-3" name="cantidad" placeholder="Cantidad">                  

                    <input type="submit" class="btn btn-primary" value="Guardar">
                </form>
            </div>

            <div class="col-md-8">
                <h1>DATOS REGISTRADOS - FARMACIA</h1>
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>Código Producto</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row=mysqli_fetch_array($query)){
                        ?>
                            <tr>
                                <th><?php echo $row['id_producto'] ?> </th>
                                <th><?php echo $row['nombre'] ?> </th>
                                <th><?php echo $row['categoria'] ?> </th>
                                <th><?php echo $row['precio'] ?> </th>
                                <th><?php echo $row['cantidad'] ?> </th>
                                
                                <th><a href="../Modelo/actualizar.php?id=<?php echo $row['id_producto'] ?>" class = "btn btn-info">Editar</a></th>
                                
                                <th><a href="../Modelo/delete.php?id=<?php echo $row ['id_producto']?>" class="btn btn-danger">Eliminar</a></th>
                                

                            </tr>

                        <?php
                            }                                              
                        ?>
                    </tbody>

                </table>
            </div>

        </div>

    </div>

</body>

</html>