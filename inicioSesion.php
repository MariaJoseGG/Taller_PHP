<?php
include("db.php");
if (empty($_SESSION['active'])) { //Si no se ha iniciado sesión
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Iniciar sesión</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    </head>

    <body>
        <nav class="navbar navbar-dark bg-dark navbar-expand-sm navbar-expand-md navbar-expand-lg navbar-expand-xl">
            <div class="container">
                <a href="index.php" class="navbar-brand text-info">Películas</a>
            </div>
        </nav>
        <div class="container p-4">
            <div class="col-md-4 mx-auto">
                <?php if (isset($_SESSION['mensaje_inicio'])) { ?>
                    <div class="alert alert-<?= $_SESSION['mensaje_tipo']; ?> alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['mensaje_inicio']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <div class="card-header text-center">
                    <h3>Inicio de sesión</h3>
                </div>
                <div class="card card-body">
                    <form action="login.php" method="POST">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping"></span>
                            <input type="text" class="form-control" placeholder="Nombre de usuario" name="usuario" aria-describedby="addon-wrapping">
                        </div>
                        <br>
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping"></span>
                            <input type="password" class="form-control" placeholder="Contraseña" name="clave" aria-describedby="addon-wrapping">
                        </div>
                        <br>
                        <center>
                            <input type="submit" class="btn btn-success btn-block" name="enter" value="Entrar"></inpunt>
                        </center>
                    </form>
                </div>
                <div class="card-footer text-center bg-secondary bg-opacity-25">
                    <p>¿No tiene una cuenta?</p>
                    <a href="registro.php">Registrarse</a>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>

    </html>

<?php } else { //Si hay una sesión activa, no se muestra esta página
    header("Location: index.php");
} ?>