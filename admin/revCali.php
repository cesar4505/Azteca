<?php
//Conexión

include("../rec/cred.php");
    $conex=mysqli_connect("$host", "$user", "$pw") or die ("Problemas al conectar con el servidor");
	mysqli_select_db($conex, "$bd") or die ("Problemas al conectar con la Base de Datos");
?>

<html>
	<head> 
		<title>Calificaciones</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	</head>
	<body>
		<header>
			<div class="alert alert-info">
			<h2>Calificaciones</h2>
			<form method="request">
			<input type="text" name="mat">
			<a href="busc.php" class="btn btn-primary">
				<i class="fa fa-search"></i>
			</a>
			<!--<button>Buscar</button>-->
			</form>
			<?php
			$nomb="SELECT Nombre_A, Apellido_A_P, Apellido_A_M, Grupo_A FROM alumnos
			inner join cuentas on alumnos.Cuenta_A = cuentas.Usuario 
			where alumnos.Matricula_A = '$_GET[mat]'";

			$result1= mysqli_query($conex,$nomb);
			if(mysqli_num_rows($result1)>0){
		
			while($fila1=mysqli_fetch_array($result1))
				{
				?>
					<h3><?php echo  $fila1["Nombre_A"], " " .$fila1["Apellido_A_P"], " " .$fila1["Apellido_A_M"]; ?></h3>
					<?php
				}
		
			}
				?>
			</div>
		</header>

		<tbody>
			<table class="col-md-12">
				<tr class="bg-primary">
					<th class="pad-basic">Clave Materia </th>
					<th class="pad-basic">Nombre Materia </th>
					<th class="pad-basic">Primer Parcial </th>
					<th class="pad-basic">Segundo Parcial</th>
					<th class="pad-basic">Calificacion Final</th>
					<th class="pad-basic">Estatus</th>
					<th class="pad-basic"></th>
				<tr>

				<?php
				$query="SELECT Alumnos.Nombre_A, materias.Clave_M, Nombre_M, Calif_P1, Calif_P2, Calif_F, calificaciones.Estatus
				from calificaciones
				inner join Alumnos on calificaciones.Matricula_A = Alumnos.Matricula_A 
				inner join Materias on calificaciones.Clave_M = Materias.Clave_M
				inner join cuentas on alumnos.Cuenta_A = cuentas.Usuario
				where alumnos.Matricula_A = '$_GET[mat]'";

				$result= mysqli_query($conex,$query);
				if(mysqli_num_rows($result)>0){

				while($fila=mysqli_fetch_array($result))
					{
					?>
						<tr>
						<td><?php echo $fila["Clave_M"];?></td>
						<td><?php echo $fila["Nombre_M"];?></td>
						<td><?php echo $fila["Calif_P1"];?></td>
						<td><?php echo $fila["Calif_P2"];?></td>
						<td><?php echo $fila["Calif_F"];?></td>
						<td><?php echo $fila["Estatus"];?></td>
						<td><a href="">Editar</a></td>
						</tr>
						<?php
					}

				}
				?>

			</table>
			<a href="../rec/cerrar.php">Cerrar Sesión</a>
		</tbody>
</body>
</html>