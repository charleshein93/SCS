<?php
session_start();
//Matamos la sesion
session_destroy();

echo '<script type="text/javascript">alert("Has terminado tu sesión '.$_SESSION['k_nombre'].' ");</script>';

?>
<SCRIPT LANGUAGE="javascript">location.href = "index.php";</SCRIPT>