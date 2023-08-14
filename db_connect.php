<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// modify these settings according to the account on your Azure SQL database.
$serverName = "tcp:cst407jokes.database.windows.net,1433"; // update me
$database = "cst407jokes";
$username = "JokesIsPass123!";
$password = "Jokes123!"; 

try {
    //Establishes the connection
    $conn = new PDO("sqlsrv:server = $serverName; Database = $database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


?>
