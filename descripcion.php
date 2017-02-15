
	<div class="container" >
		<div class="row">
			<div class="col-md-7 bg-primary" style="height: 280px; overflow-y: auto;">

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
				<td><b>Fecha nacimiento:</b></td>
				<td><h5>&nbsp;&nbsp;<?php echo $registro[3] ?></h5></td>
				<td><b>Telefono fijo:</b></td>
				<td><h5>&nbsp;&nbsp;<?php echo $registro[10] ?></h5></td>
				<td><b>Telefono personal:</b></td>
				<td><h5>&nbsp;&nbsp;<?php echo $registro[9] ?></h5></td>
			</tr>
			<tr>
				<td><b>Ciudad:</b></td>
				<td><h5>&nbsp;&nbsp;<?php echo $registro[6] ?></h5></td>
				<td><b>Calle:</b></td>
				<td><h5>&nbsp;&nbsp;<?php echo $registro[7] ?></h5></td>
				<td><b>Número:</b></td>
				<td><h5>&nbsp;&nbsp;<?php echo $registro[8] ?></h5></td>

			</tr>
			<tr>
				<td><br></td>
				<td colspan="4">____________________________________________</td>
				<td><br></td>
			</tr>
			<tr>
				<td><b>Carrera:</b></td>
				<td colspan="2"><h5>&nbsp;&nbsp;<?php echo $registro[13] ?></h5></td>
				<td><b>Año ingreso:</b></td>
				<td><h5>&nbsp;&nbsp;<?php echo $registro[14] ?></h5></td>
			</tr>

			<tr>
				<td><b>Correo institucional:</b></td>
				<td colspan="2"><h5>&nbsp;&nbsp;<?php echo $registro[11] ?></h5></td>
				<td><b>Correo personal:</b></td>
				<td colspan="2"><h5>&nbsp;&nbsp;<?php echo $registro[12] ?></h5></td>
			</tr>

		</tbody>
	</table>

</form>
			</div>
			
			<div class="col-md-5 bg-info" style="height: 280px; overflow-y: auto;">

				
					<h3 align="center">Descripción Solicitud</h3>
				
					<!-- <textarea class="center-block" name="" id="" cols="70" rows="6"><?php echo $registro[4] ?></textarea><br> -->
						<label for=""></label>
						<h4 align="center"><?php echo $registro[4] ?></h4>




						<div class="form-inline">
		
							<div class="form-group col-md-5 ">

									
					
					<a href="Reglas.pdf" class="btn btn-info col-md-offset-10" target="_blank">Reglamentos Institución</a>
					<!-- 
					<a href="reglas" class="btn btn-info col-md-offset-12" data-toggle="modal">Reglamentos</a>

					<a href="Reglas.pdf" target="_blank">Enlace</a>
					
					<div class="modal fade" id="reglas">
						
						<div class="modal dialog">
							
							<div class="modal-content">
								
								<div class="modal-header">
									<button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&time;</button>
									<h4 class="modal-title">Reglas de la Institución</h4>
								</div>
								<div class="modal body">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, error quos odit quod, molestiae labore dignissimos pariatur rerum esse illum perspiciatis illo, asperiores nisi sapiente! Fugiat, minus quae odit explicabo.</p>
								</div>
								<div class="modal footer">
									<button type="butto" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									<button type="butto" class="btn btn-primary"></button>
								</div>

							</div>

						</div>

					</div>
				
					-->

							</div>

						</div>

			
				

			</div>
				


		</div>
	
	</div>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>