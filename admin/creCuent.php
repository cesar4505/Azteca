<html>
    <head>
        <title>Crear Usuario</title>
    </head>

    <body>
        <form action="creCuen.php" method="post">
            <input type="text" name="cuenta" id="" placeholder="Usuario Nuevo" autocomplete="off" require>
            <br>
            <input type="password" name="pw" id="" placeholder="Contraseña" autocomplete="off" require>
            <br>
            <select name="rol">
                <option value="administrador">Administrativo</option>
                <option value="docente">Docente</option>
                <option value="alumno">Alumno</option>
            </select>
            <button>Enviar</button>
        </form>
    </body>
</html>