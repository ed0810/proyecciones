<?php
session_start();
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
							<h1 class="text-center">Calcula tus Proyecciones rápido y fácil</h1>
							<p class="lead text-center">Sólo debes ingresar los datos en la tabla siguiente, o también tienes la opción de 
								cargar tu archivo excel que contenga los datos años y demandas.							<br>
							</p>							
						</div>
						<div class="row-fluid">
							<div class="span6 offset3">
								<form class="form" method="post" action="calcular.php">
									
									<table class="table" >
										<thead>
											<tr>
												<th>Año</th>
												<th>Demanda</th>
											</tr>
										</thead>
										<tbody id="tabla">
											<tr>
												<td>
													<input type='text' class='txtAño' value='1' disabled='true' />
												</td>												
												<td>
													<input type='text' class='txtDemanda' name='demanda[]'  />
												</td>
											</tr>
										</tbody>
									</table>
									<span>Número de proyecciones:  </span>
									<input name="numProyecciones" type="text" value="5"/>
									<input type="button" class="btn btn-primary" value="Agregar" onClick="agregar()" />
									<input type="button" class="btn btn-primary" value="Borrar" onClick="borrarUltima()" />
									<input type="button" class="btn btn-primary" value="Enviar Datos" onClick="submit()" />
								</form>
							</div>
						</div>
						<hr>
						<div class="row-fluid">
							<p class="text-center">Para cargar tu archivo, sólo sigue el ejemplo de la imagen. No olvides escribir el número de proyecciones que deseas<br>
								<img class="img-polaroid" src="img/ejemplo.PNG" /></p>
							<form class="form span6 offset3" action="upload.php" method="post" enctype="multipart/form-data">
								<input type="hidden" name="action" value="upload" />
								<input name="archivo" type="file" />
								<input name="numProyecciones" type="text" placeholder="Número de Proyecciones"/>
								<input type="submit" class="btn" value="Enviar" />
							</form>
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

<script type="text/javascript">
var contLin = 1;
function agregar() {
	var tr, td, tabla;

	tabla = document.getElementById('tabla');
	tr = tabla.insertRow(tabla.rows.length);
	td = tr.insertCell(tr.cells.length);
	td.innerHTML = "<input type='text' class='txtAño' name='año[]' disabled='true' value='"+(contLin+1)+"'/>";
	td = tr.insertCell(tr.cells.length);
	td.innerHTML = "<input type='text' class='txtDemanda' name='demanda[]' id='" + (contLin) + "' />";	
	document.getElementById(contLin).focus();
	contLin++;
}
function borrarUltima() {
	ultima = document.all.tabla.rows.length - 1;
	if(ultima > 0){
		document.all.tabla.deleteRow(ultima);
		contLin--;
	}
}

$(document).keyup(function (e) {
    if ($(".txtDemanda").is(":focus") && (e.keyCode == 13)) {
        // Do something
        agregar();
    }
    });
</script>
</html>