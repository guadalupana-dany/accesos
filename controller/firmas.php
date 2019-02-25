<?php 
 include_once("../conexion.php");
// header('Content-Type: application/json');
$request_body = file_get_contents("php://input");
$data = json_decode($request_body);
$firmas =   $data->firmas;
$count = count($firmas);

/*
    asociado_id: "6"
    estado: "0"
    id: "15"
*/
for($i = 0; $i < $count; $i++){
    $query = "update firma set estado = 1 where id = ".$firmas[$i]->id;
    mysqli_query($mysqli,$query);
}

echo "LISTO";
exit;

?>