
include("db.php");

if(isset($_POST['save'])) {
    $iden = $_POST['iden'];
    $nom = $_POST['nom'];
    $fechaNaci = $_POST['fechaNaci'];
    $papa = $_POST['papa'];

    $query = "INSERT INTO estudiante(id,nombre,fechaNacimiento,PAPA) VALUES($iden, '$nom', '$fechaNaci', $papa)";
    $result = mysqli_query($conn,$query);
    if(!$result) {
        $_SESSION['mensaje'] = "No se pudo guardar";
        $_SESSION['tipo_mensaje'] = "danger";
    }
    else {
        $_SESSION['mensaje'] = "Estudiante guardado con éxito";
        $_SESSION['tipo_mensaje'] = "success";
    }
    header("Location: index.php");
}
?>
