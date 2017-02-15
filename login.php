<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="css/scs.png" rel="shortcut icon" type="image/x-icon" />
	<link rel="stylesheet" href="css/login2.css">
	<title>Login Sistem Control de Solicitudes</title>
	
</head>
<body>

	
<!--
<br><br><br><br><br><br><br><br><br>
	<h1 align="center">Inicio de Sesion</h1>	
	<form action="loginvalpg.php" method="POST">	
	<table align="center">


		
			<tr>
				<td>Usuario: </td>
				<td><input type="text" name="user" autocomplete="off" placeholder="Introducir Usuario" required></td>
			</tr>
			<br>
			<tr>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Password: </td>
				<td><input type="password" name="pass" autocomplete="off" placeholder="Introducir Contraseña"></td>
			</tr>

	</table>	
				<br>
				<center><input type="submit" value="Ingresar"> </center>
	</form>
-->
<div id="main" class="container"> 	

	<form name="loginform" id="loginform" action="loginvalpg.php" method="post" class="wpl-track-me"> 
		<p class="login-username">
		<label for="user_login">Username</label> 
			<input type="text" name="user" id="user_login" class="input" placeholder="Ingrese Correo" value="" size="20" required /> 
		</p> 
		<p class="login-password"> 
		<label for="user_pass">Password</label><input type="password" name="pass" id="user_pass" class="input" placeholder="Ingrese Password" value="" size="20" required/> 
		<p class="login-submit"><input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="Ingresar" />
		<input type="hidden" name="redirect_to" value="Ingresar"/>
		</p> 	
	</form> 

</div>


</body>
</html>