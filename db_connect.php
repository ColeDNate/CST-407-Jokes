<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$privateEndpointAddress = "JokesAccess.default.CST407Network.privatelink.database.windows.net";
$port = "1433";
$username = "JokesIsPass123!";
$password = "Jokes123!";
$database_in_use = "cst407jokes";

try {
    // PDO connection
    $conn = new PDO("sqlsrv:server = tcp:$privateEndpointAddress,$port; Database = $database_in_use", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // MySQLi connection
    $host = $privateEndpointAddress;
    $user_pass = $password;
    $mysqli = new mysqli($host, $username, $user_pass, $database_in_use);
    
    echo "Connected to Azure SQL Database successfully<br>";
} catch (PDOException $e) {
    echo "Failed to connect to Azure SQL Database: " . $e->getMessage();
}
?>
