<?php
include_once("../conexion.php");

$target_dir = "../fotos/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "LA IMAGEN YA EXISTE.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "TU ARCHIVO ES DEMASIADO GRANDE.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Solo se Permite archivos JPG, JPEG, PNG & GIF .";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "ERRO AL SUBIR ARCHIVO.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      /*  echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        echo "Nombre = ". basename( $_FILES["fileToUpload"]["name"]);
        echo "id = " . $_POST['id'];
        echo "numero = " . $_POST['numero'];*/
        $id = $_POST['id'];
        $numero = '';
        $fotoName = basename( $_FILES["fileToUpload"]["name"]);

        if(isset($_POST['numero']));{
            $numero = $_POST['numero'];
        }

        //pasa al estado dos porque ya fue tomada la foto
        $test = "UPDATE asociado SET estado = 2, numero= '". $numero."',foto = '". $fotoName ."'  where id = ". $id;
        mysqli_query($mysqli,$test);

        if($numero != ''){
            $insert = "insert into opinion (id_asociado) values (".$id.")";
            mysqli_query($mysqli,$insert);
        }
        header('Location: http://localhost/ControlAcceso/fotografia.php');
    } else {
        echo "ERROR FALTAL.";
    }
}
?>