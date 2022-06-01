<?php

include("db.php");

if ($_SESSION['active']) { //Si ya se ha iniciado sesión
    header("Location: index.php");
} else {
    if (isset($_POST['enter'])) {
        if (empty($_POST['usuario']) || empty($_POST['clave'])) {
            $_SESSION['mensaje_inicio'] = "Todos los campos son obligatorios";
            $_SESSION['mensaje_tipo'] = "danger";
            header("Location: inicioSesion.php");
        } else {
            $user = $_POST['usuario'];
            $cont = $_POST['clave'];

            $query = "SELECT * FROM usuario WHERE nombre='$user'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_array($result);

                if (password_verify($cont, $data['clave'])) {
                    $_SESSION['active'] = true;
                    header("Location: index.php");
                } else {
                    $_SESSION['mensaje_inicio'] = "La clave ingresada no es correcta";
                    $_SESSION['mensaje_tipo'] = "danger";
                    header("Location: inicioSesion.php");
                }
            } else {
                $_SESSION['mensaje_inicio'] = "El usuario ingresado no existe";
                $_SESSION['mensaje_tipo'] = "danger";
                header("Location: inicioSesion.php");
            }
        }
    }
}