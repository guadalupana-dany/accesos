<?php
    include_once("../conexion.php");
    header('Content-Type: application/json');

    //BUSCAR POR CIF
    if(isset($_GET['cif'])){
        $cif = $_GET['cif'];
      /*  $query = mysqli_query($mysqli,"select 
        id,cif,nombre,zona,sexo,areaFinanciera,id_estado_ingreso,id_estado_derecho,entro,numero,estado from 
        colaboradores where cif = " . $cif);*/
        $query = mysqli_query($mysqli,"select id,cif,nombre,areaFinanciera,id_estado_derecho,entro from asociado where cif = " . $cif);
        
        $response = array();
        while($row = mysqli_fetch_assoc($query)){
            $response[] = $row;
         }
         
         echo json_encode($response);
         exit;
    }

    //BUSCAR POPR NOMBRE
    if(isset($_GET['nombre'])){
        $nombre = $_GET['nombre'];
        $test = "select id,cif,nombre,areaFinanciera,id_estado_derecho,entro from asociado where nombre like '%" . $nombre ."%'";      
        $query = mysqli_query($mysqli,$test);
        
        $response = array();
        while($row = mysqli_fetch_assoc($query)){
            $response[] = $row;
         }         
         echo json_encode($response);
         exit;
    }

    //ACTUALIZAR LA PRIMERA ENTRA DONDE DAN EL BRAZALETE
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $test = "UPDATE asociado SET entro = 0,estado = 1 where id = ". $id;
         mysqli_query($mysqli,$test);
        
        $response = array(
            "error" => "NO",
            "test" => $test
        );
      
         echo json_encode($response);
         exit;
    }


    //BUSCAR POR CIF
    if(isset($_GET['cifInfo'])){
        $cif = $_GET['cifInfo'];
      /*  $query = mysqli_query($mysqli,"select 
        id,cif,nombre,zona,sexo,areaFinanciera,id_estado_ingreso,id_estado_derecho,entro,numero,estado from 
        colaboradores where cif = " . $cif);*/
         
        $query = mysqli_query($mysqli,"SELECT a.id,a.cif,a.nombre,a.areaFinanciera,ed.nombre as derecho,ei.nombre motivo 
        FROM asociado as a inner join estado_derecho as ed on ed.id = a.id_estado_derecho 
        inner join estado_ingreso as ei on ei.id = a.id_estado_ingreso where cif = " . $cif);
        
        $response = array();
        while($row = mysqli_fetch_assoc($query)){
            $response[] = $row;
         }
         
         echo json_encode($response);
         exit;
    }

    //BUSCAR POPR NOMBRE
    if(isset($_GET['nombreInfo'])){
        $nombre = $_GET['nombreInfo'];
        $test = "SELECT a.id,a.cif,a.nombre,a.areaFinanciera,ed.nombre as derecho,ei.nombre motivo 
         FROM asociado as a inner join estado_derecho as ed on ed.id = a.id_estado_derecho 
         inner join estado_ingreso as ei on ei.id = a.id_estado_ingreso where nombre like '%" . $nombre ."%'";      
        $query = mysqli_query($mysqli,$test);
        
        $response = array();
        while($row = mysqli_fetch_assoc($query)){
            $response[] = $row;
         }         
         echo json_encode($response);
         exit;
    }

    //muesttra los datos para el modulo de fotografias
    if(isset($_GET['mostrando'])){
        
        $test = "SELECT a.id,a.cif,a.nombre,a.areaFinanciera,ed.nombre as derecho,ei.nombre motivo 
         FROM asociado as a inner join estado_derecho as ed on ed.id = a.id_estado_derecho 
         inner join estado_ingreso as ei on ei.id = a.id_estado_ingreso where a.estado = 1";      
        $query = mysqli_query($mysqli,$test);
        
        $response = array();
        while($row = mysqli_fetch_assoc($query)){
            $response[] = $row;
         }         
         echo json_encode($response);
         exit;
    }

    //muestra los datos para el asociado en las fotografias
    if(isset($_GET['mostrandoAsociado'])){
        $id = $_GET['mostrandoAsociado'];
        
        $test = "SELECT a.id,a.cif,a.nombre,a.areaFinanciera,ed.nombre as derecho,ei.nombre motivo 
         FROM asociado as a inner join estado_derecho as ed on ed.id = a.id_estado_derecho 
         inner join estado_ingreso as ei on ei.id = a.id_estado_ingreso where a.id = ".$id;      
        $query = mysqli_query($mysqli,$test);
        
        $response = array();
        while($row = mysqli_fetch_assoc($query)){
            $response[] = $row;
         }         
         echo json_encode($response);
         exit;
    }


    

?>