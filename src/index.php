Holi <br><br>
Primer contenedor <br><br>

<strong>Pato!</strong>

<br>
<img src="https://www.caracteristicas.co/wp-content/uploads/2017/02/pato-2-e1560917879703.jpg">

<!-- Html -> lado del cliente -->
<!-- Scipt -> lado del servidor -->

<!-- <?php
    $i = 13;
    echo "Valor de i=".$i;

    for($j=0;$j<$i;$j++){
        echo $j."<br>";
    }
?> -->

<?php
function loadEnv($path)
{
    if (!file_exists($path)) {
        throw new Exception('El archivo .env no se encontró.');
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue; // Saltar los comentarios
        }

        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);

        if (!array_key_exists($name, $_ENV)) {
            putenv("$name=$value");
            $_ENV[$name] = $value;
        }
    }
}


try {
    loadEnv('../.env');
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
    exit;
}

// Asignar las variables de entorno a las variables PHP
$host = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_NAME'];
$user = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$port = $_ENV['DB_PORT'];


try {
    // Crear conexión usando PDO
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL para obtener datos
    $sql = "SELECT id, name FROM tablita";
    $stmt = $pdo->query($sql);

    // Verificar si hay resultados y mostrar los datos
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo  "<br>"."ID: " . $row["id"] . " - Nombre: " . $row["name"];
        }
    } else {
        echo "0 resultados";
    }
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

// Cerrar conexión (no es necesario, pero se puede hacer)
$pdo = null;

?>
