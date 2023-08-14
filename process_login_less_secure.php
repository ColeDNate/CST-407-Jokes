<head>
    <?php
    session_start();
    
    
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include "db_connect.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    echo "You attempted to login with " . $username . " and " . $password . "<br>";

    $sql = "SELECT user_id, user_name, password FROM users WHERE user_name = '$username' AND password ='$password'";

    echo "SQL = " . $sql . "<br>";

    $result = $mysqli->query($sql);

    if($result->num_rows > 0){
        echo "Found 1 person with that username<br>";
        echo " pw matches<br>";
        echo "<p>Login success</p>"; 
    } else {
        echo "0 results. Not logged in<br>";
        $_SESSION =  [];
        session_destroy();
    }
    echo "<pre>";
    print_r($result);
    echo "</pre>";
