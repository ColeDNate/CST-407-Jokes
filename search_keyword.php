<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Accordion - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
  </script>
</head><?php

include "db_connect.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);
$keywordfromform = $_GET['keyword'];
echo "this is our keyword: " . $keywordfromform . "<br>";

echo "<h2>Show all jokes with the word " . $keywordfromform . "</h2>";
$keywordfromform = "%" . $keywordfromform . "%";

// use the PDO connection object instead of the mysqli one
$stmt = $conn->query("SELECT JokeID, Joke_question, Joke_answer, jokes_table.user_id, user_name 
                      FROM jokes.jokes_table JOIN jokes.users 
                      ON jokes_table.user_id = users.user_id 
                      WHERE Joke_question LIKE ?");
// use the bindValue method instead of the bind_param one
$stmt->bindValue(1, "%$keywordfromform%", PDO::PARAM_STR);
// use the fetchAll method instead of the store_result and bind_result ones
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// use the count function instead of the num_rows property
if (count($results) > 0) {
    // output data of each row

    echo "<div id='accordion'>";
    // use a foreach loop instead of the fetch method
    foreach ($results as $row) {
        $safe_joke_question = htmlspecialchars($row['Joke_question']);
        $safe_joke_answer = htmlspecialchars($row['Joke_answer']);

        echo "<h3>" . $safe_joke_question . "</h3>";
    
        echo "<div><p>" . $safe_joke_answer  . " -- Submitted by user " . $row['user_name'] ."</p></div>";
    }

    echo "</div>";
} else {
    echo "0 results";
}
?>
