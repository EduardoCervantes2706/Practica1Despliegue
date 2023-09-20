<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
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
        <a href="eliminar.php">Eliminar Usuario</a>
    </nav>

    <p>Modificar Usuario</p>

    <?php
        include 'conexion.php'; // Incluye el archivo de conexión

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $nombre = $_POST["nombre"];
            $email = $_POST["email"];

            $sql = "UPDATE usuarios SET nombre=?, email=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $nombre, $email, $id);

            if ($stmt->execute()) {
                echo "
                <div class='message-div'>
                    <p class='mensaje'>Usuario actualizado exitosamente.</p>
                </div>
                ";
            } else {
                echo "
                <div class='message-div'>
                    <p class='mensaje-error'>Error al actualizar el usuario: " . $conn->error . "</p>" .
                "</div>";
            }

            $stmt->close();
        }

        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $sql = "SELECT * FROM usuarios WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $stmt->close();
        }
        $conn->close();
    ?>

    <div class="form-div">
        <form method="post" action="modificar.php">
            <div>
                <label>ID:</label>
                <input type="text" name="id" value="<?php echo $row['id']; ?>">
            </div>
            <div>
                <label>NOMBRE:</label>
                <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required><br><br>
            </div>
            <div>
                <label>EMAIL:</label>
                <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>
            </div>
            <input class="registrar" type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>