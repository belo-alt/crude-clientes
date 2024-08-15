<?php
require 'vendor/autoload.php'; // Inclui o autoload do MongoDB

$client = new MongoDB\Client("mongodb://localhost:27017");
$db = $client->clientes_db;
$collection = $db->clientes;
?>
