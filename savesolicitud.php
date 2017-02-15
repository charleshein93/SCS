<?php 

$conexion=pg_connect("host=localhost port=5432 dbname=ISW user=postgres password=185553698") or die (pg_last_error());

$saveid= $_POST['id'];
$savedescripcion= $_POST['descripcion'];
$savenombre= $_POST['nombre'];
$savefechai= $_POST['fecha_inicio'];
$savefechaf= $_POST['fecha_final'];
$saveestado= $_POST['estado'];
$savetipo= $_POST['tipo'];
$saveasignatura= $_POST['asignatura'];

$btnsave=$_POST['guardar'];


if (isset($savenombre)) {

	#INSERT INTO solicitudes (id_solicitud, descripcion, rut, fecha_inicio, fecha_termino, id_estado, id_tipo, id_asignatura) VALUES ('4','descripcion wenona', '111111111', '2017-02-01', '2017-02-28', '1', '2', '3')

	#$save="INSERT INTO solicitudes (id_solicitud, descripcion, rut, fecha_inicio, fecha_termino, id_estado, id_tipo, id_asignatura) VALUES ('$id','$savedescripcion', '$savenombre', '$savefechai', '$savefechaf', '$saveestado', '$savetipo', '$saveasignatura')";

	$save="INSERT INTO solicitudes (descripcion, rut, fecha_inicio, fecha_termino, id_estado, id_tipo, id_asignatura) VALUES ('$savedescripcion', '$savenombre', '$savefechai', '$savefechaf', '$saveestado', '$savetipo', '$saveasignatura')";
	$guardar=pg_query($conexion,$save) or die (pg_last_error());

	echo '<script type="text/javascript">alert("Se guardo correctamente la solicitud");</script>';
	echo'<SCRIPT LANGUAGE="javascript"> location.href = "index.php";  </SCRIPT>';

}
else{

	echo '<script type="text/javascript">alert("Error al guardar solicitud");</script>';
	echo'<SCRIPT LANGUAGE="javascript"> location.href = "newsolicitud.php";  </SCRIPT>';

}



?>



