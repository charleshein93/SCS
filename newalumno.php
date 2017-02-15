<?php include("head.php"); ?>

<?php 

$conexion=pg_connect("host=localhost port=5432 dbname=ISW user=postgres password=185553698") or die (pg_last_error());

?>

<div class="container">
	
	<div class="main row">
		
		<article class="col-md-12  bg-info" style="height: 100%; overflow-y: auto;">
			
			<form name="nuevo_alumno" action="savealumno.php" method="POST">
				
				<h3>Ingresar Nuevo Alumno</h3>

				<div class="form-group has-success col-md-6">

					<label class="control-label">Ingrese nombre:</label>

					<input class="form-control" name="nombrealumno" type="text" placeholder="Ingrese nombre del alumno nuevo" required>
					
				</div>
				<div class="form-group has-warning col-md-6">

					<label class="control-label">Ingrese apellido:</label>

					<input class="form-control" name="apellidoalumno" type="text" placeholder="Ingrese apellido del alumno nuevo"  required>
					
				</div>
				<div class="form-group has-error col-md-6">

					<label class="control-label">Ingrese rut:</label>

					<input class="form-control" name="rutalumno" type="text" placeholder="Ingrese rut del alumno nuevo | Ejemplo: 444444444 | NUEVE DIGITOS"  required>
					
				</div>
				<div class="form-group has-success col-md-6">

					<label class="control-label">Ingrese fecha de nacimiento:</label>

					<input class="form-control" name="fechaalumno" type="text" placeholder="Ingrese fecha de nacimiento del alumno nuevo | Año-Mes-Día | Ejemplo: 1993-01-30"  required>
					
				</div>
				<div class="form-group has-warning col-md-6">

					<label class="control-label">Ingrese password:</label>

					<input class="form-control" name="ctralumno" type="text" placeholder="Ingrese password del alumno nuevo"  required>
					
				</div>
				<div class="form-group has-error col-md-6">

					<label class="control-label">Elija carrera:</label>

					<select class="form-control" name="carreraalumno">
						<option value="">Elija carrera</option> 
						<?php 

							$carrera="SELECT id_carrera, nombre_carrera FROM carrera";
							$conscarrera=pg_query($conexion,$carrera);

							while ($fila=pg_fetch_row($conscarrera)) {

								echo "<option value='".$fila[0]."'>".$fila[1]."</option>";

							}

						 ?>
					</select>

				</div>
				<div class="form-group">

					<button class="btn btn-primary center-block glyphicon glyphicon-floppy-disk" name="guardar"  value="buscar" type="submit"> Guardar</button>

				</div>

			</form>
			

		</article>

	</div>


</div>


<?php include("footer.php"); ?>