<?php
include('../rec/cred.php');
$conex=mysqli_connect($host, $user, $pw) or die ("Problemas al conectar con el servidor");

mysqli_select_db($conex, $bd) or die ("Problema al conectar con la Base de Datos");

mysqli_query($conex, "INSERT INTO cuentas (Usuario, Contr, Rol)  
values ('$_POST[cuenta]', '$_POST[pw]', '$_POST[rol]')");
echo <<<JAVASCRIPT
<script type="text/javascript">
    alert("Cuenta Guardada");
    self.location="creCuent.php"
</script>
JAVASCRIPT;
?>