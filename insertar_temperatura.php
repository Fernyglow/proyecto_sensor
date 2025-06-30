 <?php
if ($argc < 3) {
    echo "Uso: php insertar_temperatura.php valor sensor_id\n";
    exit(1);
}

$valor = $argv[1];
$sensor_id = $argv[2];

$mysqli = new mysqli("192.168.0.100", "fernando", "practicas25$", "temperatura");

if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

$stmt = $mysqli->prepare("INSERT INTO temperatura (valor, sensor_id) VALUES (?, ?)");
$stmt->bind_param("di", $valor, $sensor_id);

if ($stmt->execute()) {
    echo "Dato guardado OK\n";
} else {
    echo "Error: " . $stmt->error . "\n";
}

$stmt->close();
$mysqli->close();
?>

