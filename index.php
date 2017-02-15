<?php include("head.php"); ?>


<?php 


$conexion=pg_connect("host=localhost port=5432 dbname=ISW user=postgres password=185553698");

 ?>
	<div class="container">
		<div class="main row" style="height: 380px;">

			<aside class="col-md-3 bg-warning" style="height: 100%; ">
				<h3 align="center">Buscador de Solicitudes</h3> <br>
				
				<form action="" method="POST"  id="formulario"> <!---class="form-horizontal" para ordenar el formulario horizontal --> 

					<div class="form-group has-success">

						<input class="form-control" name="ids_rut" id="xnombre" type="text" placeholder="Buscar por nombre o apellido">	

					</div>

					<div class="form-group has-error">

						<label for="opcion1" class="control-label">BUSCAR POR ESTADO</label>

						<select class="form-control" name="xestado" id="opcion1">
							<option value="no">Estado Solicitud</option>  
							<option value="Pendiente">Pendiente</option>
							<option value="Aprobado">Aprobado</option>
							<option value="Reprobado">Reprobado</option>


						</select>

					</div>
					<div class="form-group has-warning">

						<label for="opcion2" class="control-label">BUSCAR POR TIPO</label>

						<select class="form-control" name="xtipo">
							<option value="no1">Tipo de Solicitud</option>  
							<option value="Reclamo">Reclamo</option>
							<option value="Carga Horaria">Carga Horaria</option>
							<option value="Otros">Otros</option>
							<option value="Tomar Asignatura">Tomar Asignatura</option>

						</select>
					</div>

					<div class="form-group col-md-offset-2 has-success">
					
						<label class="control-label"><input type="checkbox" name="fechas">  ORDENAR POR FECHAS</label>
						
					</div>
					
					<div class="form-group">

						<button class="btn btn-primary center-block glyphicon glyphicon-search" name="buscar"  value="buscar" type="submit"> BUSCAR</button>

					</div>

					

				</form>



			</aside>

	<article class="col-md-9  bg-danger" style="height: 100%;overflow-y: auto;">

			<h3 class="text-center fixed" >Registros de Solicitudes</h3>
				
				<div class="table-responsive">

					<div class="panel panel-default">



<?php 





	$tablaS=pg_query("SELECT S.id_solicitud, E.nombre, E. apellido, ES.nombre_es, TS.tipo_solicitud, A.nombre_asig, S.fecha_inicio, S.fecha_termino FROM estudiantes E NATURAL INNER JOIN   solicitudes S  NATURAL INNER JOIN estado_solicitud ES NATURAL INNER JOIN tipo_solicitud TS NATURAL INNER JOIN asignaturas A ORDER BY S.id_solicitud ASC");

	function mostrarTabla($tablahead){
			echo "<form action='index.php' method='post'>";
				echo "<table class='table table-striped table-bordered  table-condensed table-responsive table-fixed' align=center>";
					echo "<thead align=center>";
						echo "<tr class='success'>";
							#echo "<th>ID Consulta</th>";
							echo "<th>Nombre</th>";
							echo "<th>Apellido</th>";
							echo "<th>Estado Solicitud</th>";
							echo "<th>Tipo Solicitud</th>";
							echo "<th>Asignatura</th>";
							echo "<th>Fecha Envio</th>";
							echo "<th>Plazo Final</th>";
							echo "<th><button type='submit' name='btnver' class='btn-success  glyphicon glyphicon-eye-open'></button></th>";
							echo "<th><button type='submit' name='eliminar'  class='btn-danger glyphicon glyphicon-trash'></button></th>";
							echo "<th><button name='aprobado' class='glyphicon glyphicon-ok btn-info'></button></th>";
							echo "<th><button name='reprobado' class='glyphicon glyphicon-remove btn-warning'></button></th>";

						echo "</tr>";
					echo "</thead>";

				
				echo $tablahead;
	}

	function mostrarRow($tablabody){

			while ($fila=pg_fetch_array($tablabody)) {

				
					echo "<tbody align=center>";
						echo "<tr>";
							#echo "<td>$fila[0]</td>";
							echo "<td>$fila[1]</td>";
							echo "<td>$fila[2]</td>";
							echo "<td>$fila[3]</td>";
							echo "<td>$fila[4]</td>";
							echo "<td>$fila[5]</td>";
							echo "<td>$fila[6]</td>";
							echo "<td>$fila[7]</td>";
							
                    ?>
                    
	                    <td><input type="checkbox" name="view[]" value="<?php echo $fila[0]?>"></td>
	                    <td><input type="checkbox"  name="delete[]" value="<?php echo $fila[0]?>"></td>
	                	<td><input type="checkbox" name="aceptar[]" value="<?php echo $fila[0]?>"></td>
	                    <td><input type="checkbox"  name="rechazar[]" value="<?php echo $fila[0]?>"></td>
                    
                    <?php
						echo "</tr>";
					echo "</tbody>";


			}
			pg_free_result($tablabody);
			echo "</table>";
		echo "</form>";
	}




$tablahead="";

$nombre= filter_input(INPUT_POST,"ids_rut");
$boton= filter_input(INPUT_POST,"buscar");
$estado= filter_input(INPUT_POST,"xestado");
$tipo= filter_input(INPUT_POST,"xtipo");
$fechas= filter_input(INPUT_POST,"fechas");

#SELECCIONA LA ID_SOLICITUD DE LA CONSULTA EN EL CHECKBOX PARA MOSTRAR LOS DATOS DEL ALUMNO

if (isset($_POST['btnver'])) {

	if (empty($_POST['view'])) {


		echo "<h4>No se ha seleccionado ningun registro</h4>";

		$consultaverdatos="SELECT E.rut, E.nombre, E.apellido, E.fecha_nacimiento, S.descripcion, ES.nombre_es, D.ciudad, D.calle, D.numero, T.numero_personal, T.numero_fijo, CO.correo_institucional, CO.correo_personal, C.nombre_carrera, C.año_ingreso,  S.id_estado, S.id_solicitud FROM estudiantes E NATURAL FULL OUTER JOIN   solicitudes S  NATURAL FULL OUTER JOIN estado_solicitud ES NATURAL FULL OUTER JOIN direccion D NATURAL FULL OUTER JOIN telefono T NATURAL FULL OUTER JOIN correo CO NATURAL FULL OUTER JOIN carrera C WHERE id_solicitud='1'";

		$verdatos=pg_query($conexion,$consultaverdatos);

		$registro=pg_fetch_row($verdatos);

	
}


	else {

		
		foreach ($_POST['view'] as $verregistro) {
			
			echo "<h4>Se ha seleccionado un registro</h4>";

			$consultaverdatos="SELECT E.rut, E.nombre, E.apellido, E.fecha_nacimiento, S.descripcion, ES.nombre_es, D.ciudad, D.calle, D.numero, T.numero_personal, T.numero_fijo, CO.correo_institucional, CO.correo_personal, C.nombre_carrera, C.año_ingreso,  S.id_estado, S.id_solicitud FROM estudiantes E NATURAL FULL OUTER JOIN   solicitudes S  NATURAL FULL OUTER JOIN estado_solicitud ES NATURAL FULL OUTER JOIN direccion D NATURAL FULL OUTER JOIN telefono T NATURAL FULL OUTER JOIN correo CO NATURAL FULL OUTER JOIN carrera C WHERE id_solicitud='$verregistro'";

			$verdatos=pg_query($conexion,$consultaverdatos);

			$registro=pg_fetch_row($verdatos);

		}


	}


}
else{

	$consultaverdatos="SELECT E.rut, E.nombre, E.apellido, E.fecha_nacimiento, S.descripcion, ES.nombre_es, D.ciudad, D.calle, D.numero, T.numero_personal, T.numero_fijo, CO.correo_institucional, CO.correo_personal, C.nombre_carrera, C.año_ingreso, S.id_estado, S.id_solicitud FROM estudiantes E NATURAL FULL OUTER JOIN   solicitudes S  NATURAL FULL OUTER JOIN estado_solicitud ES NATURAL FULL OUTER JOIN direccion D NATURAL FULL OUTER JOIN telefono T NATURAL FULL OUTER JOIN correo CO NATURAL FULL OUTER JOIN carrera C WHERE id_solicitud='1'";

	$verdatos=pg_query($conexion,$consultaverdatos);

	$registro=pg_fetch_row($verdatos);

}


#SELECCIONA LA ID_SOLICITUD DE LA CONSULTA EN EL CHECKBOX PARA ELIMINARLA

if (isset($_POST['eliminar'])) {


	if (empty($_POST['delete'])) {
		
		echo "<h4>No se ha seleccionado ningun registro</h4>";

	}
	else{

		foreach ($_POST['delete'] as $idborrar) {
			


			$deleteregistros= "DELETE FROM solicitudes WHERE id_solicitud='$idborrar'";
			$delete=pg_query($conexion,$deleteregistros);
			echo '<script type="text/javascript">alert("Se ha eliminado la solicitud");</script>';
			echo'<SCRIPT LANGUAGE="javascript"> location.href = "index.php";  </SCRIPT>';

		}

	}

}

#SELECCIONA LA ID_ESTADO Y LA CAMBIA A APROBADA

if (isset($_POST['aprobado'])) {

	if (empty($_POST['aceptar'])) {
		
		echo "<h4>No se ha seleccionado ningun registro</h4>";

	}
	else{

		foreach ($_POST['aceptar'] as $idaceptar) {
			

		$aceptarsolicitud="UPDATE solicitudes SET id_estado='1' WHERE id_solicitud='$idaceptar'";
		$estadoaceptado=pg_query($conexion,$aceptarsolicitud) or die (pg_last_error());

			#echo '<script type="text/javascript">alert("'.$aceptarsolicitud.'");</script>';
			echo '<script type="text/javascript">alert("Se ha aprobado la solicitud");</script>';
			echo'<SCRIPT LANGUAGE="javascript"> location.href = "index.php";  </SCRIPT>';

		}

	}

}

#SELECCIONA LA ID_ESTADO Y LA CAMBIA A REPROBADO

if (isset($_POST['reprobado'])) {

	if (empty($_POST['rechazar'])) {
		
		echo "<h4>No se ha seleccionado ningun registro</h4>";

	}
	else{

		foreach ($_POST['rechazar'] as $idrechazar) {
			

		$rechazarsolicitud="UPDATE solicitudes SET id_estado='2' WHERE id_solicitud='$idrechazar'";
		$estadorechazado=pg_query($conexion,$rechazarsolicitud) or die (pg_last_error());

			echo '<script type="text/javascript">alert("Se ha reprobado la solicitud");</script>';
			echo'<SCRIPT LANGUAGE="javascript"> location.href = "index.php";  </SCRIPT>';

		}

	}

}


#COMBINACION DE FORMAS DE FILTRADO DE BUSQUEDA

if (!empty($boton)){
			
	#UNA SOLA OPCION

	switch (TRUE) {
				#nombre
				case !empty($nombre)&& ($estado == "no") && ($tipo == "no1") && empty($fechas): 

						$alumnos="SELECT S.id_solicitud, E.nombre, E. apellido, ES.nombre_es, TS.tipo_solicitud, A.nombre_asig, S.fecha_inicio, S.fecha_termino  FROM estudiantes E NATURAL INNER JOIN   solicitudes S  NATURAL INNER JOIN estado_solicitud ES NATURAL INNER JOIN tipo_solicitud TS NATURAL INNER JOIN asignaturas A WHERE E.nombre like '%".$nombre."%' OR E.apellido like'%".$nombre."%'";
					    $result = pg_query($conexion,$alumnos);
					    mostrarTabla($tablahead);
					    mostrarRow($result);

					break;

				#ESTADO
				case empty($nombre)&& ($estado == "Pendiente" || $estado == "Reprobado" || $estado == "Aprobado") && ($tipo == "no1") && empty($fechas):

						$alumnos="SELECT S.id_solicitud, E.nombre, E. apellido, ES.nombre_es, TS.tipo_solicitud, A.nombre_asig, S.fecha_inicio, S.fecha_termino  FROM estudiantes E NATURAL INNER JOIN   solicitudes S  NATURAL INNER JOIN estado_solicitud ES NATURAL INNER JOIN tipo_solicitud TS NATURAL INNER JOIN asignaturas A WHERE ES.nombre_es = '$estado'";
						$result = pg_query($conexion,$alumnos);
						mostrarTabla($tablahead);
						mostrarRow($result);
				
					break;
				#TIPO
				case empty($nombre) && ($estado == "no") && ($tipo == "Otros" || $tipo == "Carga Horaria" || $tipo =="Reclamo" || $tipo == "Tomar Asignatura") && empty($fechas):
				
						$alumnos="SELECT S.id_solicitud, E.nombre, E. apellido, ES.nombre_es, TS.tipo_solicitud, A.nombre_asig, S.fecha_inicio, S.fecha_termino  FROM estudiantes E NATURAL INNER JOIN   solicitudes S  NATURAL INNER JOIN estado_solicitud ES NATURAL INNER JOIN tipo_solicitud TS NATURAL INNER JOIN asignaturas A WHERE TS.tipo_solicitud = '$tipo'";	
						$result = pg_query($conexion,$alumnos);
						mostrarTabla($tablahead);
						mostrarRow($result);
			

					break;
				#FECHA
				case empty($nombre) && ($estado == "no") && ($tipo == "no1") && !empty($fechas):
						
						$alumnos="SELECT S.id_solicitud, E.nombre, E. apellido, ES.nombre_es, TS.tipo_solicitud, A.nombre_asig, S.fecha_inicio, S.fecha_termino  FROM estudiantes E NATURAL INNER JOIN   solicitudes S  NATURAL INNER JOIN estado_solicitud ES NATURAL INNER JOIN tipo_solicitud TS NATURAL INNER JOIN asignaturas A ORDER BY S.fecha_inicio DESC";
						$result = pg_query($conexion,$alumnos);
						mostrarTabla($tablahead);
						mostrarRow($result);

					break;

				#DOS OPCIONES

				#NOMBRE Y ESTADO
				case !empty($nombre) && ($estado == "Pendiente" || $estado == "Reprobado" || $estado == "Aprobado") && ($tipo=="no1") && empty($fechas):

						$alumnos="SELECT S.id_solicitud, E.nombre, E. apellido, ES.nombre_es, TS.tipo_solicitud, A.nombre_asig, S.fecha_inicio, S.fecha_termino  FROM estudiantes E NATURAL INNER JOIN   solicitudes S  NATURAL INNER JOIN estado_solicitud ES NATURAL INNER JOIN tipo_solicitud TS NATURAL INNER JOIN asignaturas A WHERE E.nombre like '%".$nombre."%' OR E.apellido like'%".$nombre."%' AND ES.nombre_es = '$estado'";
				        $result = pg_query($conexion,$alumnos);
				        mostrarTabla($tabla);
				        mostrarRow($result);

					break;
				#NOMBRE Y TIPO
				case !empty($nombre)&& ($estado == "no") && ($tipo == "Otros" || $tipo == "Carga Horaria" || $tipo =="Reclamo" || $tipo == "Tomar Asignatura") && empty($fechas):
					
						$alumnos="SELECT S.id_solicitud, E.nombre, E. apellido, ES.nombre_es, TS.tipo_solicitud, A.nombre_asig, S.fecha_inicio, S.fecha_termino  FROM estudiantes E NATURAL INNER JOIN   solicitudes S  NATURAL INNER JOIN estado_solicitud ES NATURAL INNER JOIN tipo_solicitud TS NATURAL INNER JOIN asignaturas A WHERE E.nombre like '%".$nombre."%' OR E.apellido like'%".$nombre."%' AND TS.tipo_solicitud = '$tipo'";
					    $result = pg_query($conexion,$alumnos);
					    mostrarTabla($tabla);
					    mostrarRow($result);

					break;	
				#NOMBRE Y FECHA
				case !empty($nombre)&& ($estado =="no") && ($tipo =="no1") && !empty($fechas):
							
						$alumnos="SELECT S.id_solicitud, E.nombre, E. apellido, ES.nombre_es, TS.tipo_solicitud, A.nombre_asig, S.fecha_inicio, S.fecha_termino  FROM estudiantes E NATURAL INNER JOIN   solicitudes S  NATURAL INNER JOIN estado_solicitud ES NATURAL INNER JOIN tipo_solicitud TS NATURAL INNER JOIN asignaturas A WHERE E.nombre like '%".$nombre."%' OR E.apellido like'%".$nombre."%' ORDER BY S.fecha_inicio DESC";
					    $result = pg_querypg_query($conexion,$alumnos);
					    mostrarTabla($tabla);
					    mostrarRow($result);

					break;

				#ESTADO Y FECHA
				case empty($nombre) && ($estado == "Pendiente" || $estado == "Reprobado" || $estado == "Aprobado") && ($tipo=="no1") && !empty($fechas):

						$alumnos="SELECT S.id_solicitud, E.nombre, E. apellido, ES.nombre_es, TS.tipo_solicitud, A.nombre_asig, S.fecha_inicio, S.fecha_termino  FROM estudiantes E NATURAL INNER JOIN   solicitudes S  NATURAL INNER JOIN estado_solicitud ES NATURAL INNER JOIN tipo_solicitud TS NATURAL INNER JOIN asignaturas A  WHERE ES.nombre_es = '$estado' ORDER BY S.fecha_inicio DESC  ";
						$result = pg_query($conexion,$alumnos);
					    mostrarTabla($tabla);
					    mostrarRow($result);
						break;

				#ESTADO Y TIPO

				case empty($nombre) && ($estado == "Pendiente" || $estado == "Reprobado" || $estado == "Aprobado") && ($tipo == "Otros" || $tipo == "Carga Horaria" || $tipo =="Reclamo" || $tipo == "Tomar Asignatura") && empty($fechas):

						$alumnos="SELECT S.id_solicitud, E.nombre, E. apellido, ES.nombre_es, TS.tipo_solicitud, A.nombre_asig, S.fecha_inicio, S.fecha_termino  FROM estudiantes E NATURAL INNER JOIN   solicitudes S  NATURAL INNER JOIN estado_solicitud ES NATURAL INNER JOIN tipo_solicitud TS NATURAL INNER JOIN asignaturas A WHERE (ES.nombre_es = '$estado') AND (TS.tipo_solicitud = '$tipo')";
						$result = pg_query($conexion,$alumnos);
					    mostrarTabla($tabla);
					    mostrarRow($result);

						break;

				#TIPO Y FECHA

				case empty($nombre) && ($estado == "no") && ($tipo == "Otros" || $tipo == "Carga Horaria" || $tipo =="Reclamo" || $tipo == "Tomar Asignatura") && !empty($fechas):
				
						$alumnos="SELECT S.id_solicitud, E.nombre, E. apellido, ES.nombre_es, TS.tipo_solicitud, A.nombre_asig, S.fecha_inicio, S.fecha_termino  FROM estudiantes E NATURAL INNER JOIN   solicitudes S  NATURAL INNER JOIN estado_solicitud ES NATURAL INNER JOIN tipo_solicitud TS NATURAL INNER JOIN asignaturas A WHERE TS.tipo_solicitud= '$tipo' ORDER BY S.fecha_inicio DESC  ";
						$result = pg_query($conexion,$alumnos);
					    mostrarTabla($tabla);
					    mostrarRow($result);

					break;

				#TRES OPCIONES

				#NOMBRE, ESTADO Y FECHA

				case !empty($nombre) && ($estado == "Pendiente" || $estado == "Reprobado" || $estado == "Aprobado") && ($tipo=="no1") && !empty($fechas):

						$alumnos="SELECT S.id_solicitud, E.nombre, E. apellido, ES.nombre_es, TS.tipo_solicitud, A.nombre_asig, S.fecha_inicio, S.fecha_termino  FROM estudiantes E NATURAL INNER JOIN   solicitudes S  NATURAL INNER JOIN estado_solicitud ES NATURAL INNER JOIN tipo_solicitud TS NATURAL INNER JOIN asignaturas A WHERE E.nombre like '%".$nombre."%' OR E.apellido like'%".$nombre."%' AND ES.nombre_es = '$estado' ORDER BY S.fecha_inicio DESC";
				        $result = pg_query($conexion,$alumnos);
				        mostrarTabla($tabla);
				        mostrarRow($result);

					break;


				#NOMBRE, TIPO Y FECHA

				case !empty($nombre) && ($estado =="no") && ($tipo == "Otros" || $tipo == "Carga Horaria" || $tipo =="Reclamo" || $tipo == "Tomar Asignatura") && !empty($fechas):

						$alumnos="SELECT S.id_solicitud, E.nombre, E. apellido, ES.nombre_es, TS.tipo_solicitud, A.nombre_asig, S.fecha_inicio, S.fecha_termino  FROM estudiantes E NATURAL INNER JOIN   solicitudes S  NATURAL INNER JOIN estado_solicitud ES NATURAL INNER JOIN tipo_solicitud TS NATURAL INNER JOIN asignaturas A WHERE E.nombre like '%".$nombre."%' OR E.apellido like'%".$nombre."%' AND (TS.tipo_solicitud = '$tipo') ORDER BY S.fecha_inicio DESC";
				        $result = pg_query($conexion,$alumnos);
				        mostrarTabla($tabla);
				        mostrarRow($result);

					break;

				#NOMBRE,ESTADO Y TIPO

				case !empty($nombre) && ($estado == "Pendiente" || $estado == "Reprobado" || $estado == "Aprobado") && ($tipo == "Otros" || $tipo == "Carga Horaria" || $tipo =="Reclamo" || $tipo == "Tomar Asignatura") && empty($fechas):

						$alumnos="SELECT S.id_solicitud, E.nombre, E. apellido, ES.nombre_es, TS.tipo_solicitud, A.nombre_asig, S.fecha_inicio, S.fecha_termino  FROM estudiantes E NATURAL INNER JOIN   solicitudes S  NATURAL INNER JOIN estado_solicitud ES NATURAL INNER JOIN tipo_solicitud TS NATURAL INNER JOIN asignaturas A WHERE E.nombre like '%".$nombre."%' OR E.apellido like'%".$nombre."%' AND ES.nombre_es = '$estado' AND (TS.tipo_solicitud = '$tipo')";
				        $result = pg_query($conexion,$alumnos);
				        mostrarTabla($tabla);
				        mostrarRow($result);

					break;


				#ESTADO, TIPO Y FECHA

				case empty($nombre) && ($estado == "Pendiente" || $estado == "Reprobado" || $estado == "Aprobado") && ($tipo == "Otros" || $tipo == "Carga Horaria" || $tipo =="Reclamo" || $tipo == "Tomar Asignatura") && !empty($fechas):

						$alumnos="SELECT S.id_solicitud, E.nombre, E. apellido, ES.nombre_es, TS.tipo_solicitud, A.nombre_asig, S.fecha_inicio, S.fecha_termino  FROM estudiantes E NATURAL INNER JOIN   solicitudes S  NATURAL INNER JOIN estado_solicitud ES NATURAL INNER JOIN tipo_solicitud TS NATURAL INNER JOIN asignaturas A WHERE (ES.nombre_es = '$estado') AND (TS.tipo_solicitud = '$tipo') ORDER BY S.fecha_inicio DESC";
						$result = pg_query($conexion,$alumnos);
					    mostrarTabla($tabla);
					    mostrarRow($result);

						break;



				#CUATRO OPCIONES 

				#NOMBRE, ESTADO, TIPO Y FECHA

				case !empty($nombre) and ($estado == "Pendiente" || $estado == "Reprobado" || $estado == "Aprobado") && ($tipo == "Otros" || $tipo == "Carga Horaria" || $tipo =="Reclamo" || $tipo == "Tomar Asignatura") and !empty($fechas):

						$alumnos="SELECT S.id_solicitud, E.nombre, E. apellido, ES.nombre_es, TS.tipo_solicitud, A.nombre_asig, S.fecha_inicio, S.fecha_termino  FROM estudiantes E NATURAL INNER JOIN   solicitudes S  NATURAL INNER JOIN estado_solicitud ES NATURAL INNER JOIN tipo_solicitud TS NATURAL INNER JOIN asignaturas A WHERE E.nombre like '%".$nombre."%' OR E.apellido like'%".$nombre."%' AND ES.nombre_es = '$estado' AND (TS.tipo_solicitud = '$tipo') ORDER BY S.fecha_inicio DESC";
				        $result = pg_query($conexion,$alumnos);
				        mostrarTabla($tabla);
				        mostrarRow($result);


					break;

					

				default:
						$alumnos="SELECT S.id_solicitud, E.nombre, E. apellido, ES.nombre_es, TS.tipo_solicitud, A.nombre_asig, S.fecha_inicio, S.fecha_termino  FROM estudiantes E NATURAL INNER JOIN   solicitudes S  NATURAL INNER JOIN estado_solicitud ES NATURAL INNER JOIN tipo_solicitud TS NATURAL INNER JOIN asignaturas A";
						$result = pg_query($conexion,$alumnos);
					    mostrarTabla($tablahead);
					    mostrarRow($result);

					break; 
		}

}
elseif (empty($boton)) {
	mostrarTabla($tablahead);
	mostrarRow($tablaS);
}



?>

		
						
					</div>
				</div>

	</article>



<?php include("descripcion.php"); ?>

<?php include("footer.php"); ?>
