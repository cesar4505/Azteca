<?php
include("cred.php");
$conex=mysqli_connect("$host", "$user", "$pw") or die ("Problemas al conectar con el servidor");
mysqli_select_db($conex, "$bd") or die ("Problemas al conectar con la Base de datos");

//variables de sesion
if (!isset($_SESSION)){
	session_start();
}
$resul=mysqli_query($conex, "SELECT * FROM cuentas WHERE Usuario = '$_POST[user]' AND Contr = '$_POST[pass]'");
$fila=mysqli_fetch_array($resul);

if (!$fila[0]){
	echo '<script language = javascript>
	alert ("Datos incorrectos");
	self.location="../index.php"</script>';
} else {
	
	if ($fila['Rol'] == "administrador"){
		header("Location: ../admin/menuAdmin.php");
		$_SESSION['Usuario'] = $fila ['Usuario'];
		$_SESSION['Rol'] = "administrador";

	} else if ($fila['Rol'] == "docente"){
		header("Location:admin/menuAdmin.php");
		$_SESSION['Usuario'] = $fila ['Usuario'];
		$_SESSION['Rol'] = "docente";

	} else if ($fila['Rol'] == "alumno"){
		header("Location: ../alumn/regCalif.php");
		$_SESSION['Usuario'] = $fila ['Usuario'];
		$_SESSION['Rol'] = "alumno";
	
}
}