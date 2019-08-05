<?php
include("../rec/cred.php");
$conex=mysqli_connect("$host", "$user", "$pw") or die ("Problemas al conectar con el servidor");
mysqli_select_db($conex, "$bd") or die ("Problemas al conectar con la Base de Datos");
#cesar
#$q=mysqli_query($conex, "INSERT INTO alumnos (Matricula_A, Nombre_A, Apellido_A_P, Apellido_A_M, Direccion_A, Telefono_A, Grupo_A)
#VALUES ('$_POST[mat]', '$_POST[nomb]', '$_POST[apep]', '$_POST[apem]', '$_POST[dir]', '$_POST[tel]', '$_POST[grupo]')");

$query="INSERT INTO alumnos (Matricula_A, Nombre_A, Apellido_A_P, Apellido_A_M, Direccion_A, Telefono_A, Grupo_A)
VALUES ('$_POST[mat]', '$_POST[nomb]', '$_POST[apep]', '$_POST[apem]', '$_POST[dir]', '$_POST[tel]', '$_POST[grupo]')";

if(mysqli_query($conex,$query)){
    echo <<<JAVASCRIPT
    <script type="text/javascript">
        alert("Alumno Guardado");
        </script>
JAVASCRIPT;
    header('Location: regAlum.php');
}else{
    echo "No se guardo";
}

?>