<?php
    include('../rec/cred.php');
    $conex=mysqli_connect("$host","$user", "$pw") or die ("PRoblemas al conectar con el servidor");
    mysqli_select_db($conex, "$bd") or die ("PRoblemas al conectar con la Base de datos");

    $datos="SELECT Nombre_A, Apellido_A_P, Apellido_A_M, Grupo_A FROM alumnos
    inner join cuentas on alumnos.Cuenta_A = cuentas.Usuario 
    where alumnos.Matricula_A = '$_GET[mat]'";

    $query="SELECT Alumnos.Nombre_A, materias.Clave_M, Nombre_M, Calif_P1, Calif_P2, Calif_F, calificaciones.Estatus
				from calificaciones
				inner join Alumnos on calificaciones.Matricula_A = Alumnos.Matricula_A 
				inner join Materias on calificaciones.Clave_M = Materias.Clave_M
				inner join cuentas on alumnos.Cuenta_A = cuentas.Usuario
                where alumnos.Matricula_A = '$_GET[mat]'";
                
                $result1= mysqli_query($conex,$nomb);
                if(mysqli_num_rows($result1)>0){
                while($fila1=mysqli_fetch_array($result1))  {
                       echo '<h3>' .$fila['Nombre_A']. '</h3>';
                    }
                }

                $result = mysqli_query($conex,$query);
				if(mysqli_num_rows($result)>0){
				while($fila=mysqli_fetch_array($result))
					{
						echo'
						<tr>
						<td>'.$fila['Clave_M'].'</td>
						<td>'.$fila['Nombre_M'].'</td>
						<td>'.$fila['Calif_P1'].'</td>
						<td>'.$fila['Calif_P2'].'</td>
						<td>'.$fila['Calif_F'].'</td>
						<td>'.$fila['Estatus'].'</td>
						</tr>';
					}

				}
    
                if(mysqli_query($conex,$query)){
                header('location: revCali.php');
                }else{
                echo "No se busco nada";
                }
?>