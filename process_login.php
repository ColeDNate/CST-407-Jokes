<html>
<head>

</head>
 <?php
 session_start();
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
 
include "db_connect.php";

$username = addslashes($_POST['username']);
$password = $_POST['password'];

echo "<h2>You attempted to login with " . $username . " and " . $password . "</h2>";

$stmt = $conn->prepare ("SELECT user_id, user_name, password FROM users WHERE user_name = ?");
$stmt->bindValue(1, $username, PDO::PARAM_STR);
$stmt->execute();

if ($stmt->rowCount() > 0 ) {
    echo "Found 1 person with that username<br>";
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (password_verify($password, $row['password'])) {
        echo "The password matches<br>";
        echo "Login success<br>"; 
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $userid;
        exit;
    }
    else {
        echo "Password does not match<br>";
        session_destroy();
    }
    

} else {
    echo "0 results. Not logged in<br>";
    $_SESSION =  [];
    session_destroy();
    echo "you got to the error check.";
}

echo "Session variable = <br>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

echo "<br><a href='index.php'>Return to main page</a>";
?>

</html>
