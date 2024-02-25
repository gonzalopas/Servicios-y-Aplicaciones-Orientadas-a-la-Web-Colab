<?php
include 'config.php';

$action = $_GET['action'] ?? '';
$id_deportista = $_GET['id_deportista'] ?? '';
 
// Identifica la acción solicitada (si existe)
$action = $_GET['action'] ?? $_POST['action'] ?? '';
$id_deportista = $_GET['id_deportista'] ?? $_POST['id_deportista'] ?? 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $pais = $_POST['pais'] ?? '';

    if ($action == 'create') {
        $stmt = $conn->prepare("INSERT INTO deportistas (nombre, pais) VALUES (?, ?)");
        $stmt->bind_param("ss", $nombre, $pais);
        $stmt->execute();
        $stmt->close();
    } elseif ($action == 'update' && $id_deportista) {
        $stmt = $conn->prepare("UPDATE deportistas SET nombre = ?, pais = ? WHERE id_deportista = ?");
        $stmt->bind_param("ssi", $nombre, $pais, $id_deportista);
        $stmt->execute();
        $stmt->close();
    }
}

if ($action == 'delete' && $id_deportista) {
    $stmt = $conn->prepare("DELETE FROM deportistas WHERE id_deportista = ?");
    $stmt->bind_param("i", $id_deportista);
    $stmt->execute();
    $stmt->close();
}

// Función para obtener todos los deportistas
$deportistas = [];
$result = $conn->query("SELECT * FROM deportistas");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $deportistas[] = $row;
    }
    $result->free();
}
$conn->close();

// Incluye aquí el código HTML para mostrar los formularios y la lista de deportistas
// Siguiendo el formato y las clases de Bootstrap para formularios y tablas


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Deportistas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php include 'partials/navbar.php'; ?>
<div class="container mt-5">
    <h2>Gestión de Deportistas</h2>

    <!-- Formulario de Creación/Edición -->
    <div class="card mb-3">
        <div class="card-header">
            <?php echo $action && $id_deportista ? 'Editar Deportista' : 'Agregar Deportista'; ?>
        </div>
        <div class="card-body">
            <form action="deportistas.php?action=<?php echo $id_deportista ? 'update&id_deportista='.$id_deportista : 'create'; ?>" method="post">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="pais">País:</label>
                    <input type="text" class="form-control" id="pais" name="pais" required>
                </div>
                <button type="submit" class="btn btn-primary"><?php echo $id_deportista ? 'Actualizar' : 'Agregar'; ?></button>
            </form>
        </div>
    </div>

    <!-- Listado de Deportistas -->
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>País</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($deportistas as $deportista): ?>
            <tr>
                <td><?= htmlspecialchars($deportista['nombre']) ?></td>
                <td><?= htmlspecialchars($deportista['pais']) ?></td>
                <td>
                    <a href="deportistas.php?action=edit&id_deportista=<?= $deportista['id_deportista'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="deportistas.php?action=delete&id_deportista=<?= $deportista['id_deportista'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
