<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema Control de Solicitudes</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="css/scs.png" rel="shortcut icon" type="image/x-icon" />


</head>
<body>

<?php
	session_start();
?> 



	<nav class="navbar navbar-inverse navbar-static-top example6">

	    <div class="container">

		    <div class="navbar-header">

			    <a class="navbar-brand" href=""><span class="glyphicon glyphicon-user"></span>
			    <?php  

					if (isset($_SESSION['k_username'])) {
					 echo ' <b>' .$_SESSION['k_nombre'].'</b>';

					}else{

					echo'<SCRIPT LANGUAGE="javascript"> location.href = "login.php";  </SCRIPT>';
					 
					}

			    ?></a>

		    </div>

	      	<div id="navbar6" class="navbar-collapse collapse">

		        <ul class="nav navbar-nav navbar-right">

			        <li class=""><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home Page</a></li>
			        <li class=""><a href="newsolicitud.php"><span class="glyphicon glyphicon-file"></span> Nueva Solicitud</a></li>
			       <!-- <li class=""><a href="newalumno.php"><span class="glyphicon glyphicon-education"></span> Agregar Alumno</a></li> -->
			        <li class="dropdown">

				        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Más Opciones <span class="caret"></span></a>

					        <ul class="dropdown-menu" role="menu">

									<li class="dropdown-header">OPCIONES</li>
						            <li><a href="#">Vista PDF</a></li>
						            <li><a href="#">Another action</a></li>
						            <li><a href="#">Something else here</a></li>
						            <li class="divider"></li>
									<li class="dropdown-header">Nav header</li>						            
						            <li><a href="#">Separated link</a></li>
						            <li><a href="#">One more separated link</a></li>

					        </ul>

				        <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> CERRAR SESION</a></li>

			        </li>

		        </ul>

	     	</div>
	      <!--/.nav-collapse -->
	    </div>
    <!--/.container-fluid -->
 	</nav>

