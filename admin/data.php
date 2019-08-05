<?php
include('../rec/cred.php');
$conex = mysqli_connect("$host", "$user", "$pw") or die ("Problemas al conectar con el servidor");
mysqli_select_db($conex, "$bd") or die ("Problemas al conectar con la BD");

$query="SELECT Alumnos.Nombre_A, materias.Clave_M, Nombre_M, Calif_P1, Calif_P2, Calif_F, calificaciones.Estatus
				from calificaciones
				inner join Alumnos on calificaciones.Matricula_A = Alumnos.Matricula_A 
				inner join Materias on calificaciones.Clave_M = Materias.Clave_M
				inner join cuentas on alumnos.Cuenta_A = cuentas.Usuario
				where alumnos.Cuenta_A = ?";

$stmt = $conex->prepare($query);
$stmt->bind_param("s", $_POST['mat']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($Nombre_A, $Clave_M, $Nombre_M, $Calif_P1, $Calif_P2, $Calif_F, $Estatus);
$stmt->fetch();
$stmt->close();

echo "<table>";
echo "<tr>";
echo "<th>Alumno</th>";
echo "<td>" . $Nombre_A . "</td>";
echo "<th>Clave</th>";
echo "<td>" . $Clave_M . "</td>";
echo "<th>Materia</th>";
echo "<td>" . $Nombre_M . "</td>";
echo "<th>Parcial 1</th>";
echo "<td>" . $Calif_P1 . "</td>";
echo "<th>Parcial 2</th>";
echo "<td>" . $Calif_P2 . "</td>";
echo "<th>Final</th>";
echo "<td>" . $Calif_F . "</td>";
echo "<th>Estatus</th>";
echo "<td>" . $Estatus . "</td>";
echo "</tr>";
echo "</table>";
?>