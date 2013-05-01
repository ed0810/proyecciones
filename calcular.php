<?php

session_start();
$y = $_POST['demanda'];

for ($i = 0; $i < count($y); $i++){
	$x[$i] = $i+1;
}

$_SESSION['x'] = $x;
$_SESSION['y'] = $y;
$_SESSION['numProyecciones'] = $_POST['numProyecciones'];

header('Location: proyeccion.php');
?>