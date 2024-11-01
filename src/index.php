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
// Datos de conexión
$host = 'base_de_datos'; //Se puede usar el nombre de la base de datos
$user = 'my_user'; // Reemplaza con tu usuario de base de datos
$password = 'user_password'; // Reemplaza con tu contraseña de base de datos
$dbname = 'mi_primera_db';
$port = 3306;

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
