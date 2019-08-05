<?php
    include("../cred.php");
    $conex=mysqli_connect("$host", "$user", "$pw") or die ("Problemas al conectar con el servidor");
    mysqli_select_db($conex, "$bd") or die ("Problemas al conectar con la Base de Datos");

    mysqli_query($conex, "INSERT INTO profesores (Matricula_P, Nombre_P, Apellido_P_P, Apellido_M_P, Direccion_P, Telefono_P, Area_P)
    VALUES ('$_POST[matr]', '$_POST[nombr]', '$_POST[apelp]', '$_POST[apelm]', '$_POST[dire]', '$_POST[tele]', '$_POST[area]')");

echo <<<JAVASCRIPT
<script type="text/javascript">
    alert("Docente Guardado");
    self.location="regDoce.php"
</script>
JAVASCRIPT;
?>