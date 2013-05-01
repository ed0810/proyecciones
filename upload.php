<?php

session_start();
require_once 'Excel/reader.php';
$status = "";

if(isset($_POST['numProyecciones']) && $_POST['numProyecciones'] != ""){
    // obtenemos los datos del archivo
    $tamano = $_FILES["archivo"]['size'];
    $tipo = $_FILES["archivo"]['type'];
    $archivo = $_FILES["archivo"]['name'];
    $prefijo = substr(md5(uniqid(rand())),0,6);
   

    if ($archivo != "") {
        // guardamos el archivo a la carpeta files
        $destino =  "Temp/".$prefijo.$archivo;
        if (copy($_FILES['archivo']['tmp_name'],$destino)) {
            $status = "Archivo subido: <b>".$archivo."</b>";
        } else {
            $status = "Error al subir el archivo";
        }
    } else {
        $status = "Error al subir archivo";
    }
    
    $data = new SpreadSheet_Excel_Reader();
    $data->read("Temp/$archivo");
    error_reporting(E_ALL^E_NOTICE);

    $xi = 0;
    $yi = 0;
    for($i=2; $i <= $data->sheets[0]['numRows']; $i++){
    /*  for($j=1; $j <= $data->sheets[0]['numCols']; $j++){
            echo $data->sheets[0]['cells'][$i][$j];
        }*/
        if(isset($data->sheets[0]['cells'][$i][1])){
            $x[$xi] = $data->sheets[0]['cells'][$i][1];
            $xi++;
            $y[$yi] = $data->sheets[0]['cells'][$i][2];
            $yi++;
        }
    }

    $_SESSION['x'] = $x;
    $_SESSION['y'] = $y;
    $_SESSION['numProyecciones'] = $_POST['numProyecciones'];
    header('Location:proyeccion.php');
}else{
	header('Location:./');
}
 
?>