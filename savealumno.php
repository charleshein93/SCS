<?php 

$conexion=pg_connect("host=localhost port=5432 dbname=ISW user=postgres password=185553698") or die (pg_last_error());

$nombrealumno=$_POST['nombrealumno'];
$apellidoalumno=$_POST['apellidoalumno'];
$rutalumno=$_POST['rutalumno'];
$fechaalumno=$_POST['fechaalumno'];
$ctralumno=$_POST['ctralumno'];
$carreraalumno=$_POST['carreraalumno'];

$idusuario=1;

if (isset($savenombre)) {

	#INSERT INTO estudiantes (rut, nombre, apellido, fecha_nacimiento, ctr, id_carrera, id_usuario) VALUES ('185553698', 'Carlos', 'Hein', '1993-12-27', 'hola1', '1', '1')

	$save="INSERT INTO estudiantes (rut, nombre, apellido, fecha_nacimiento, ctr, id_carrera, id_usuario) VALUES ('$rutalumno', '$nombrealumno', '$apellidoalumno', '$fechaalumno', '$ctralumno', '$carreraalumno', '$idusuario')";
	$guardar=pg_query($conexion,$save) or die (pg_last_error());

	echo '<script type="text/javascript">alert("Se guardo correctamente el alumno");</script>';
	echo'<SCRIPT LANGUAGE="javascript"> location.href = "index.php";  </SCRIPT>';

}
else{

	echo '<script type="text/javascript">alert("Error al guardar alumno");</script>';
	echo'<SCRIPT LANGUAGE="javascript"> location.href = "newalumno.php";  </SCRIPT>';

}