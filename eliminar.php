<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="header">
        <h1>Práctica 1</h1>
        <h2>Laboratorio de despliegue de aplicaciones empresariales</h2>
        <h3>Cervantes Jaramillo Luis Eduardo</h3>
    </div>

    <nav class="navegacion">
        <a href="index.php">Insertar Usuario</a>
        <a href="consultar.php">Listado Usuarios</a>
        <a href="modificar.php">Modificar Usuario</a>
    </nav>

    <p>Eliminar Usuario</p>

    <?php
        include 'conexion.php'; // Incluye el archivo de conexión

        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            $sql = "DELETE FROM usuarios WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                echo "
                <div class='message-div'>
                    <p class='mensaje'>Usuario eliminado exitosamente.</p>
                </div>
                ";
            } else {
                echo "
                <div class='message-div'>
                    <p class='mensaje-error'>Error al modificar el usuario: " . $conn->error . "</p>" .
                "</div>";
            }

            $stmt->close();
        }

        $conn->close();
    ?>
    <div class="form-div">
        <form method="post" action="eliminar.php">
            <div>
                <label>ID:</label>
                <input type="text" name="id" value="<?php echo $row['id']; ?>">
            </div>
            <input class="registrar" type="submit" value="Eliminar">
        </form>
    </div>
</body>
</html>