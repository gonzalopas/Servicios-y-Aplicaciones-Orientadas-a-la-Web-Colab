<?php
// Incluir archivo de configuración con la conexión a la base de datos
include 'config.php';

// Funciones CRUD
function getAllResultados($conn)
{
    $sql = "SELECT resultados.*, deportistas.nombre AS deportista_nombre, eventos.nombre_evento FROM resultados 
            JOIN deportistas ON resultados.id_deportista = deportistas.id_deportista
            JOIN eventos ON resultados.id_evento = eventos.id_evento";
    $result = $conn->query($sql);
    return $result;
}

function addResultado($conn, $id_evento, $id_deportista, $tiempo, $posicion)
{
    $stmt = $conn->prepare("INSERT INTO resultados (id_evento, id_deportista, tiempo, posicion) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iisi", $id_evento, $id_deportista, $tiempo, $posicion);
    $stmt->execute();
    return $stmt->insert_id; // Retorna el ID del resultado insertado
}

function updateResultado($conn, $id_resultado, $id_evento, $id_deportista, $tiempo, $posicion)
{
    $stmt = $conn->prepare("UPDATE resultados SET id_evento = ?, id_deportista = ?, tiempo = ?, posicion = ? WHERE id_resultado = ?");
    $stmt->bind_param("iisii", $id_evento, $id_deportista, $tiempo, $posicion, $id_resultado);
    $stmt->execute();
    return $stmt->affected_rows; // Retorna el número de filas afectadas
}

function deleteResultado($conn, $id_resultado)
{
    $stmt = $conn->prepare("DELETE FROM resultados WHERE id_resultado = ?");
    $stmt->bind_param("i", $id_resultado);
    $stmt->execute();
    return $stmt->affected_rows; // Retorna el número de filas afectadas
}

// Manejar la acción CRUD desde el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];
    $id_evento = $_POST['id_evento'] ?? 0;
    $id_deportista = $_POST['id_deportista'] ?? 0;
    $tiempo = $_POST['tiempo'] ?? '';
    $posicion = $_POST['posicion'] ?? 0;
    $id_resultado = $_POST['id_resultado'] ?? 0;

    if ($action == "create") {
        addResultado($conn, $id_evento, $id_deportista, $tiempo, $posicion);
    } elseif ($action == "update") {
        updateResultado($conn, $id_resultado, $id_evento, $id_deportista, $tiempo, $posicion);
    } elseif ($action == "delete") {
        deleteResultado($conn, $id_resultado);
    }
}

// Siempre leer los resultados para mostrarlos
$resultados = getAllResultados($conn);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Resultados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php include 'partials/navbar.php'; ?>
    <h1>Resultados de Competencias</h1>
    <form method="post">
        <input type="hidden" name="action" value="create">
        <input type="number" name="id_evento" placeholder="ID Evento" required>
        <input type="number" name="id_deportista" placeholder="ID Deportista" required>
        <input type="text" name="tiempo" placeholder="Tiempo" required>
        <input type="number" name="posicion" placeholder="Posición" required>
        <button type="submit">Agregar Resultado</button>
    </form>

    <h2>Listado de Resultados</h2>
    <ul>
        <?php while ($resultado = $resultados->fetch_assoc()) : ?>
            <li>
                <?php echo "Evento: " . htmlspecialchars($resultado['nombre_evento']) . ", Deportista: " . htmlspecialchars($resultado['deportista_nombre']) . ", Tiempo: " . htmlspecialchars($resultado['tiempo']) . ", Posición: " . htmlspecialchars($resultado['posicion']); ?>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id_resultado" value="<?php echo $resultado['id_resultado']; ?>">
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        <?php endwhile; ?>
    </ul>

    <!-- Aquí podrías añadir un formulario o modal para la actualización de los datos -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
$conn->close();
?>