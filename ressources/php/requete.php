<?php
require_once 'connect.php';

$c = new Connect();
$pdo = $c->connect();
$stmt = $pdo -> query ('SELECT * FROM artiste');
$results = $stmt -> FetchAll();

foreach ($results as $row) {
    echo $row['nom'] . "<br>";
}

?>