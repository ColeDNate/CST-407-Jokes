<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $privateEndpointAddress = "JokesAccess.default.CST407Network.privatelink.database.windows.net";
    $port = "1433";
    
    $conn = new PDO("sqlsrv:server = tcp:cst407jokes.database.windows.net,1433; Database = cst407jokes", "JokesIsPass123!", "Jokes123!");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "JokesIsPass123!", "pwd" => "{your_password_here}", "Database" => "cst407jokes", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:cst407jokes.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>
