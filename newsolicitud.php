<?php include("head.php"); ?>


<?php 

$conexion=pg_connect("host=localhost port=5432 dbname=ISW user=postgres password=185553698") or die (pg_last_error());

 ?>

<div class="container">

	<div class="main row">
		<article class="col-md-12  bg-info" style="height: 100%; overflow-y: auto;">
			<form name="nueva_solicitud" action="savesolicitud.php" method="POST">
				<h3>Ingresar Nueva Solicitud</h3>

				<div class="form-group has-success">

					<label class="control-label">Elija estudiante:</label>

					<select class="form-control" name="nombre">
						<option value="">Elija Alumno</option> 
						<?php 

							$nombreal="SELECT rut, nombre, apellido FROM estudiantes";
							$consnombreal=pg_query($conexion,$nombreal);

							while ($fila=pg_fetch_row($consnombreal)) {

								echo "<option value='".$fila[0]."'>".$fila[1]."&nbsp;".$fila[2]."</option>";

							}

						 ?>
					</select>

				</div>

				<div class="form-group has-warning">

					<label class="control-label">Elija estado solicitud:</label>

					<select class="form-control" name="estado">
						<option value="">Elija Estado</option> 
						<?php 

							$estado="SELECT id_estado, nombre_es FROM estado_solicitud";
							$consestado=pg_query($conexion,$estado);

							while ($fila=pg_fetch_row($consestado)) {

								echo "<option value='".$fila[0]."'>".$fila[1]."</option>";

							}

						 ?>
					</select>

				</div>
				<div class="form-group has-error">

					<label class="control-label">Elija tipo solicitud:</label>

					<select class="form-control" name="tipo">
						<option value="">Elija Tipo</option> 
						<?php 

							$tipo="SELECT id_tipo, tipo_solicitud FROM tipo_solicitud";
							$constipo=pg_query($conexion,$tipo);

							while ($fila=pg_fetch_row($constipo)) {

								echo "<option value='".$fila[0]."'>".$fila[1]."</option>";

							}

						 ?>
					</select>

				</div>
				<div class="form-group has-success">

					<label class="control-label">Elija asignatura:</label>

					<select class="form-control" name="asignatura">
						<option value="">Elija Asignatura</option> 
						<?php 

							$asignatura="SELECT id_asignatura, nombre_asig FROM asignaturas";
							$consasignatura=pg_query($conexion,$asignatura);

							while ($fila=pg_fetch_row($consasignatura)) {

								echo "<option value='".$fila[0]."'>".$fila[1]."</option>";

							}

						 ?>
					</select>

				</div>
				<div class="form-group has-warning">

					<label class="control-label">Ingrese fecha de envío solicitud:</label>
					<input class="form-control" name="fecha_inicio" type="text" placeholder="Año-Mes-Día | Ejemplo: 2016-01-01">	

				</div>
				<div class="form-group has-error">
				
					<label class="control-label">Ingrese fecha de plazo solicitud:</label>
					<input class="form-control" name="fecha_final" type="text" placeholder="Año-Mes-Día | Ejemplo: 2016-01-30">	

				</div>
				<div class="form-group has-success">
					<label class="control-label">Ingrese descripción solicitud:</label>
					<textarea class="control-label" name="descripcion" id="" cols="150" rows="3" required></textarea>
				</div>
				<div class="form-group">

					<button class="btn btn-primary center-block" name="guardar"  value="buscar" type="submit">Guardar</button>

				</div>
				<input class="form-control" name="id" type="hidden">	
			</form>
			
		</article>

	</div>

</div>


<?php include("footer.php"); ?>