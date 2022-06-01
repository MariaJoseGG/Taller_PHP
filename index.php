<?php include("db.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-sm navbar-expand-md navbar-expand-lg navbar-expand-xl">
        <div class="container">
            <a href="#" class="navbar-brand text-info">Películas</a>
        </div>
        <?php if (!empty($_SESSION['active'])) { ?>
            <a href="salir.php" class="btn btn-danger">
                <i class="bi bi-box-arrow-left"></i> Cerrar sesión
            </a>
        <?php } ?>
    </nav>

    <img src="fondo.jpg" class="img-fluid" alt="Películas">
    <br>

    <center>
        <p class="h6 p-4">
            Puede ir a la <a href="listaPeliculas.php">lista de películas</a> para ver el catálogo de títulos disponibles.
        </p>
        <?php if (empty($_SESSION['active'])) { ?>
            <p class="h6 p-3">
                También puede <a href="inicioSesion.php">Iniciar sesión</a>, o <a href="registro.php">Registrarse</a> si aún no tiene una cuenta.
            </p>
        <?php } ?>
    </center>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>