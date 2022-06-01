<?php
include("db.php");
//verifica el teme de las variables
//se usa en name del index
//$_POST en cada tipo de variable los elementos del formulario
//si hay valores guarda los datos
//print_r($_FILES);
//exit;
if(isset($_POST['save'])){
    $iden=$_POST['iden'];
    $nom=$_POST['nom'];
    $dir=$_POST['dir'];
    $FechaEstreno=$_POST['FechaEstreno'];
    //archivo
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
        
    $query= "INSERT INTO pelicula(id,nombre,director,fechaEstreno,portada)
    VALUES($iden,'$nom','$dir','$FechaEstreno','$imgPelicula')";
    $result= mysqli_query($conn,$query);
    if(!$result){
        $_SESSION['mensaje']="No se pudo Guardar";
        //recuadro rojo
        $_SESSION['tipo_mensaje']="danger";
        //die("Fallo consulta.");
    }else{
        if($nombre_foto!= ''){
            move_uploaded_file($url_temp,$src);
        }
        $_SESSION['mensaje']="Pelicula Guardada";
        //recuadro verde
        $_SESSION['tipo_mensaje']="success";
    }
    header("Location: crear.php");
}



?>