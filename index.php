<?php
    include 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Despliegue</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="header">
        <h1>Práctica 1</h1>
        <h2>Laboratorio de despliegue de aplicaciones empresariales</h2>
        <h3>Cervantes Jaramillo Luis Eduardo</h3>
    </div>

    <nav class="navegacion">
        <a href="consultar.php">Listado Usuarios</a>
        <a href="modificar.php">Modificar Usuario</a>
        <a href="eliminar.php">Eliminar Usuario</a>
    </nav>

    <p>Registro de usuarios</p>

    <?php
        // Crear nuevo usuario
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $email = $_POST["email"];
            $contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT); // Hash de la contraseña
        
            $sql = "INSERT INTO usuarios (nombre, email, pass) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $nombre, $email, $contrasena);
        
            if ($stmt->execute()) {
                echo "
                <div class='message-div'>
                    <p class='mensaje'>Usuario registrado exitosamente.</p>
                </div>
                ";
            } else {
                echo "
                <div class='message-div'>
                    <p class='mensaje-error'>Error al registrar el usuario: " . $conn->error . "</p>" .
                "</div>";
            }
        
            $stmt->close();
        }
        
        $conn->close();
    ?>


    <div class="form-div">
        <form action="index.php" method="POST">
            <div>
                <label for="nombre">
                    NOMBRE:
                </label>
                <input id="nombre" name="nombre" type="text" placeholder="Escribe tu nombre...">
            </div>
            <div>
                <label for="email">
                    E-MAIL:
                </label>
                <input id="email" name="email" type="text" placeholder="Escribe tu Correo Electrónico...">
            </div>
            <div>
                <label for="password">
                    PASSWORD:
                </label>
                <input id="password" name="contrasena" type="password" placeholder="Escribe tu Password...">
            </div>
            <input class="registrar" type="submit" value="REGISTRAR">
        </form>
    </div>

    
</body>
</html>