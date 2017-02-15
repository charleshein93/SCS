<?php 
	
	require_once 'dompdf/autoload.inc.php';
	include("conexion.php");

	$codigoHTML='';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TEST PDF</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="css/scs.png" rel="shortcut icon" type="image/x-icon" />

</head>
<body>
<div class="container" >
	<div class="row">
		<div class="col-md-12 bg-success" style="height: 400px;  overflow-y: auto;">

			<h4 align="center">Datos Alumno</h4>
			

<form action="descripcion.php" method="POST" name="ficha">
	<table>
		<tbody>
			<tr>
				<input type="hidden" name="escondido" value="<?php echo $registro[0]; ?>"> 
				<td><b>Nombre:</b></td>
				<td><h5>&nbsp;&nbsp;<?php echo $registro[1] ?></h5></td>
				<td><b>Apellido:</b></td>
				<td><h5>&nbsp;&nbsp;<?php echo $registro[2] ?></h5></td>
				<td><b>Rut:</b></td>
				<td><h5>&nbsp;&nbsp;<?php echo $registro[0] ?></h5></td>
			</tr>
			<tr>
				<td><b>Fecha nacimiento</b></td>
				<td><h5>&nbsp;&nbsp;<?php echo $registro[3] ?></h5></td>
				<td><b>Ciudad:</b></td>
				<td><h5>&nbsp;&nbsp;<?php echo $registro[6] ?></h5></td>
				<td><b>Calle:</b></td>
				<td><h5>&nbsp;&nbsp;<?php echo $registro[7] ?></h5></td>
			</tr>
			<tr>
				<td><b>Número:</b></td>
				<td><h5>&nbsp;&nbsp;<?php echo $registro[8] ?></h5></td>
			</tr>
			<tr>
				<td><b>Telefono fijo:</b></td>
				<td><h5>&nbsp;&nbsp;<?php echo $registro[10] ?></h5></td>
				<td><b>Telefono personal:</b></td>
				<td><h5>&nbsp;&nbsp;<?php echo $registro[9] ?></h5></td>
			</tr>
			<tr>
				<td><b>Carrera:</b></td>
				<td><h5>&nbsp;&nbsp;<?php echo $registro[13] ?></h5></td>
				<td><b>Año ingreso:</b></td>
				<td><h5>&nbsp;&nbsp;<?php echo $registro[14] ?></h5></td>
			</tr>
			<tr>
				<td><b>Correo institucional:</b></td>
				<td><h5>&nbsp;&nbsp;<?php echo $registro[11] ?></h5></td>
				<td><b>Correo personal:</b></td>
				<td><h5>&nbsp;&nbsp;<?php echo $registro[12] ?></h5></td>
			</tr>

		</tbody>
	</table>


			</div>
			
			<div class="col-md-12 bg-primary" style="height: 300px; overflow-y: auto;">

				
					<h3 align="center">Descripción Solicitud</h3>
				
					<!-- <textarea class="center-block" name="" id="" cols="70" rows="6"><?php echo $registro[4] ?></textarea><br> -->
						<label for=""></label>
						<h4 align="center"><?php echo $registro[4] ?></h4>

</form>
				

			</div>
			<!--
			<div class="col-md-3 bg-success" style="height: 280px;overflow-y: auto;">

				<h2 align="center">Reglamentos</h2>
				<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium odio atque, dolorum officia commodi placeat et voluptates sint expedita repellendus dolor vero dignissimos pariatur natus corporis omnis provident facere impedit! lorem</p>

			
			</div>
			-->
		</div>
	
	</div>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
