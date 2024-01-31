<?php

include_once 'database.php';

$conn = connectDB();

$response = array();

echo "<a href='/'>Return to homepage</a><br><br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $NAME = $_POST["NAME"];

  $result = insertData($conn, $NAME);

  if ($result === true) {
    $response['success'] = true;
    $response['message'] = "Data inserted successfully!";
  } else {
    $response['success'] = false;
    $response['message'] = "Error: " . $result;
  }
}


$conn->close();
