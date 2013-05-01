<?php
session_start();

require_once 'class.proyecciones.php';

$x = $_SESSION['x'];
$y = $_SESSION['y'];

$objProyecciones = new proyecciones();

$xy = $objProyecciones->xy($x, $y);
$xx = $objProyecciones->cuadrado($x);
$yy = $objProyecciones->cuadrado($y);
$b = $objProyecciones->b($x,$y,$xx,$xy);
$a = $objProyecciones->a($x, $y, $b);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Proyecciones</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>		
		<nav class="container">
			<div class="row">
				<div class="span12">
					<div class="mynav redondeado">
						<a class="brand" href="#">Proyecciones</a>
						<ul>
							<li>
								<a href="./">Inicio</a>									
							</li>
							<li>
								<a href="instrucciones.html">Instrucciones</a>
							</li>
							<li>
								<a href="acerca.html">Acerca de</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</nav>	
		<br>		
	</header>
	<section>
		<div class="container ">
			<div class="row-fluid">
				<div class="span12">
					<div class="cuadro redondeado">
						<div class="row-fluid">
							<table class="table">
								<thead>
									<tr>
										<th>Año</th>
										<th>Demanda</th>
									</tr>
								</thead>
								<tbody>
									<?php
									for($i = 0; $i < count($x); $i++){
										echo "<tr>";
										echo "<td>";
										echo $x[$i];
										echo "</td>";
										echo "<td>";
										echo $y[$i];
										echo "</td>";
										echo "</tr>";
									}
									$n = count($x)+1;
									for($i = 0; $i < $_SESSION['numProyecciones']; $i++){
										$yr = $a + $b * ($n+$i);
										echo "<tr>";
										echo "<td>";
										echo $n+$i;
										echo "</td>";
										echo "<td>";
										echo $yr;
										echo "</td>";
										echo "</tr>";	
									}
									?>									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</section>
	<footer></footer>
</body>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</html>