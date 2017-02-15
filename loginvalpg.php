<?php

//AQUI CONECTAMOS A LA BASE DE DATOS DE POSTGRES
$conex = "host=localhost port=5432 dbname=ISW user=postgres password=185553698";
$cnx = pg_connect($conex) or die ("<h1>Error de conexion.</h1> ". pg_last_error());
session_start();

	function quitar($mensaje)
	{
		 $nopermitidos = array("'",'\\','<','>',"\"");
		 $mensaje = str_replace($nopermitidos, "", $mensaje);
		 return $mensaje;
	}


if(trim($_POST["user"]) != "" && trim($_POST["pass"]) != "")	{
 // Puedes utilizar la funcion para eliminar algun caracter en especifico
 //$usuario = strtolower(quitar($HTTP_POST_VARS["usuario"]));
 //$password = $HTTP_POST_VARS["password"];
 // o puedes convertir los a su entidad HTML aplicable con htmlentities
 $usuario = strtolower(htmlentities($_POST["user"], ENT_QUOTES));
 $password = $_POST["pass"];

	$result = pg_query('SELECT * FROM usuario U, jefecarrera J WHERE U.id_usuario = J.id_usuario AND correo=\''.$usuario.'\'');

 	if($row = pg_fetch_array($result)){

			if($row["ctr"] == $password){
				   $_SESSION["k_username"] = $row['correo'];
				   $_SESSION["k_nombre"] = $row['nombre'];
				   echo '<script type="text/javascript">alert("Has sido logueado correctamente '.$_SESSION['k_nombre'].' ");</script>';

				   
		   //Elimina el siguiente comentario si quieres que re-dirigir automáticamente a index.php
		   /*Ingreso exitoso, ahora sera dirigido a la pagina principal.*/
		   	echo'<SCRIPT LANGUAGE="javascript"> location.href = "index.php";  </SCRIPT>';

			}
			else{
				#echo 'Password incorrecto';
				echo '<script type="text/javascript">alert("Password incorrecto");</script>';
				echo'<SCRIPT LANGUAGE="javascript"> location.href = "login.php";  </SCRIPT>';
			}
	}
	else{
  		#echo 'Usuario no existente en la base de datos';
  		echo '<script type="text/javascript">alert("Usuario no existente en la base de datos");</script>';
  		echo'<SCRIPT LANGUAGE="javascript"> location.href = "login.php";  </SCRIPT>';
 	}
pg_free_result($result);
}
else{
 	#echo 'Usuario no existente en la base de datos';
 	echo '<script type="text/javascript">alert("Debe especificar un usuario y password");</script>';
  	echo'<SCRIPT LANGUAGE="javascript"> location.href = "login.php";  </SCRIPT>';
}
pg_close();
?>