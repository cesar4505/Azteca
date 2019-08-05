<?php
///// CONEXION A LA BASE DE DATOS /////////
include('../rec/cred.php');
session_start();

try {
   		$conexion = new PDO('mysql:host='.$host.';dbname='.$bd, $user, $pw);
	} 
	catch (PDOException $e) 
	{
	    print "¡Error!: " . $e->getMessage() . "<br/>";
	    die();
	}
	$datos = "SELECT Nombre_A, Apellido_A_P, Apellido_A_M FROM alumnos
	inner join cuentas on alumnos.Cuenta_A = cuentas.Usuario 
    where cuentas.Usuario = '$_SESSION[Usuario]'";
?>

<html>
	<head> 
		<title>Calificaciones</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<header>
			<div class="alert alert-info">
			
			<h2>Calificaciones</h2>
			<?php
			$datos="SELECT Nombre_A, Apellido_A_P, Apellido_A_M, Grupo_A FROM alumnos
				inner join cuentas on alumnos.Cuenta_A = cuentas.Usuario 
				where cuentas.Usuario = '$_SESSION[Usuario]'";

			$nomb=$conexion->query($datos);
			while ($fila=$nomb->fetch(PDO::FETCH_ASSOC))
			{
				echo '<h3>'.$fila['Nombre_A'], ' ' .$fila['Apellido_A_P'], ' ' .$fila['Apellido_A_M'], ' Grupo: ' .$fila['Grupo_A'].'</h3>';
			}
			?>
			</div>
		</header>

		<section>
			<table class="col-md-12">
				<tr class="bg-primary">
					<th class="pad-basic">Clave Materia </th>
					<th class="pad-basic">Nombre Materia </th>
					<th class="pad-basic">Primer Parcial </th>
					<th class="pad-basic">Segundo Parcial</th>
					<th class="pad-basic">Calificacion Final</th>
					<th class="pad-basic">Estatus</th>
				<tr>

				<?php
				$query="SELECT Alumnos.Nombre_A, materias.Clave_M, Nombre_M, Calif_P1, Calif_P2, Calif_F, calificaciones.Estatus
				from calificaciones
				inner join Alumnos on calificaciones.Matricula_A = Alumnos.Matricula_A 
				inner join Materias on calificaciones.Clave_M = Materias.Clave_M
				inner join cuentas on alumnos.Cuenta_A = cuentas.Usuario
				where alumnos.Cuenta_A = '$_SESSION[Usuario]'";

				$consulta=$conexion->query($query);
				while ($fila=$consulta->fetch(PDO::FETCH_ASSOC))
					{
						echo'
						<tr>
						<td>'.$fila['Clave_M'].'</td>
						<td>'.$fila['Nombre_M'].'</td>
						<td>'.$fila['Calif_P1'].'</td>
						<td>'.$fila['Calif_P2'].'</td>
						<td>'.$fila['Calif_F'].'</td>
						<td>'.$fila['Estatus'].'</td>
						</tr>
						';
					}


				?>

			</table>
			<a href="../rec/cerrar.php">Cerrar Sesión</a>
		</section>
</body>
</html>