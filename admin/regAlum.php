<html>
    <head>
        <title>Registro de alumnos</title>
    </head>
    
    <body>
        <form action="regAlumn.php" method="post" target="request">
            <label for="">Matricula: </label>
            <input type="text" name="mat" require>
            <br>
            <label for="">Nombre(s): </label>
            <input type="text" name="nomb" require>
            <br>
            <label for="">Apellido Paterno: </label>
            <input type="text" name="apep" require>
            <br>
            <label for="">Apellido Materno: </label>
            <input type="text" name="apem" require>
            <br>
            <label for="">Dirección: </label>
            <input type="text" name="dir" require>
            <br>
            <label for="">Telefono: </label>
            <input type="tel" name="tel">
            <br>
            <label for="">Grupo: </label>
            <input type="text" name="grupo">
            <br>
            <label>Usuario</label>
            <input type="text" name="user" id="">
            <br>
            <label>Contraseña</label>
            <input type="password" name="pass">
            <br>
            <br>
            <button>Enviar</button>
        </form>
    </body>
</html>