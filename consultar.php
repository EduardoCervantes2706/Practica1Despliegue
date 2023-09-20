<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Usuarios</title>
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
        <a href="modificar.php">Modificar Usuario</a>
        <a href="eliminar.php">Eliminar Usuario</a>
    </nav>

    <p>Listado de Usuarios</p>

    <?php
        include 'conexion.php'; // Incluye el archivo de conexión

        $sql = "SELECT * FROM usuarios";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<div class='div-table'>";
            echo "<table class='tabla'>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Email</th><th>Password</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["pass"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
        } else {
            echo "
                <div class='message-div'>
                    <p class='mensaje-error'>No se encontraron usuarios.</p>
                </div>
                ";
        }

        $conn->close();
    ?>
</body>
</html>