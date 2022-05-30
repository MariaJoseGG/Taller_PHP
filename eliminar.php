<?php

include("db.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM pelicula WHERE id = $id";
    $result = mysqli_query($conn,$query);
    if(!$result) {
        $_SESSION['mensaje'] = "No se pudo eliminar";
        $_SESSION['tipo_mensaje'] = "danger";
        die("Falló consulta.");
    }
    else {
        $_SESSION['mensaje'] = "Película eliminada";
        $_SESSION['tipo_mensaje'] = "info";
    }

    header("Location: listaPeliculas.php");
}

?>