<?php
    include("db.php");

    if(isset($_POST['save'])) {
        $user = $_POST['user'];
        $iden = password_hash($_POST['iden'],PASSWORD_BCRYPT);

        $query1 = "SELECT * FROM usuario WHERE nombre='$user'";
        $result = mysqli_query($conn,$query1);
        $vec=mysqli_fetch_array($result);
        if($vec>0){
            $_SESSION['mensaje_registro'] = "No se pudo guardar";
            $_SESSION['tipo-mensaje'] = "danger";
        }
        else{
            $query2 = "INSERT INTO usuario(nombre,clave) VALUES( '$user','$iden')";
            $result2 = mysqli_query($conn,$query2);  
            if(!$result2) {
                $_SESSION['mensaje_registro'] = "No se pudo guardar";
                $_SESSION['tipo-mensaje'] = "danger";
            }
            else {
                $_SESSION['mensaje_registro'] = "Usuario guardado con éxito";
                $_SESSION['tipo-mensaje'] = "success";
            } 
        }
        header("Location: registro.php");
    }
?>
