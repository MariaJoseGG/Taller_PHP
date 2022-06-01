<?php
include("db.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM pelicula WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $nom = $row['nombre'];
        $dir = $row['director'];
        $fechaEst = $row['fechaEstreno'];
        $portada = $row['portada'];
    }
}
if (isset($_POST['edit'])) {
    $iden = $_POST['iden'];
    $nom = $_POST['nom'];
    $director = $_POST['dir'];
    $fecha = $_POST['FechaEstreno'];

    $foto=$_FILES['foto'];
    $nombre_foto=$foto['name'];
    $type=$foto['type'];
    $url_temp=$foto['tmp_name'];

    $imgPelicula='default.jpg';//imagen por defecto

    if($nombre_foto!= ''){
        $destino='portadas/';//carpeta de las imagenes
        $img_nombre= 'img_'.md5(date('d-m-Y H:m:s'));
        $imgPelicula= $img_nombre.'.jpg';
        $src= $destino.$imgPelicula;
    }
    
    $query = "UPDATE pelicula SET id=$iden, nombre='$nom', director='$director', fechaEstreno='$fecha', portada='$imgPelicula' WHERE id=$id";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        $_SESSION['mensaje'] = "No se pudo editar";
        $_SESSION['tipo_mensaje'] = "danger";
        //die("Falló consulta.");
    } else {
        if($nombre_foto!= ''){
            move_uploaded_file($url_temp,$src);
        }
        $_SESSION['mensaje'] = "Película editada";
        $_SESSION['tipo_mensaje'] = "success";
    }

    header("Location: listaPeliculas.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD con PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
<nav class="navbar navbar-dark bg-dark navbar-expand-sm navbar-expand-md navbar-expand-lg navbar-expand-xl">
        <div class="container">
            <a href="index.php" class="navbar-brand text-info">Películas</a>
        </div>
        <?php if (!empty($_SESSION['active'])) { ?>
            <a href="salir.php" class="btn btn-danger">
                <i class="bi bi-box-arrow-left"></i> Cerrar sesión
            </a>
        <?php } ?>
    </nav>

    <div class="container p-4">
        <div class="row">
            <div class="col align-self-start">
            </div>
            <div class="col align-self-center">

                <!--<div class="col-md-4">-->
                <!--si la variable de sesion tiene algun contenido-->
                <?php if (isset($_SESSION['mensaje'])) { ?>
                    <div class="alert alert-<?= $_SESSION['tipo_mensaje']; ?> alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['mensaje']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <h1 class="text-info text-center">Agregar nueva pelicula</h1>
                <div class="card card-body">
                    <form action="editar.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <!--for hace que el foco este en el cuadro correspondiente
                                con name se envian/identifican los datos y a que corresponden -->
                            <label for="iden" class="form-label"> Código de la pelicula: </label>
                            <input type="number" id="iden" name="iden" class="form-control" value="<?php echo $id; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="nom" class="form-label"> Nombre Completo: </label>
                            <input type="text" id="nom" name="nom" class="form-control" value="<?php echo $nom; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="dir" class="form-label"> Director/es: </label>
                            <input type="text" id="dir" name="dir" class="form-control" value="<?php echo $dir; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="FechaEstreno" class="form-label"> Fecha de Estreno: </label>
                            <input type="date" id="FechaEstreno" name="FechaEstreno" class="form-control" value="<?php echo $fechaEst; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label"> Portada: </label>
                            <input type="file" name="foto" id="foto" class="form-control" value="<?php echo $portada; ?>">
                        </div>
                        <center>
                            <input type="submit" class="btn btn-success btn-block" name="edit" value="Editar Pelicula">
                        </center>
                    </form>
                </div>
                <div class="card-footer text-center bg-secondary bg-opacity-25">
                    <p class="p-4 h6">Volver a la <a href="listaPeliculas.php">Lista de películas</a></p>
                </div>
            </div>
            <div class="col align-self-end">
            </div>
        </div>
    </div>
</body>

</html>