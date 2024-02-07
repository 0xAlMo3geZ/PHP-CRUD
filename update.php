<?php

include 'database.php';

$conn = connectDB();

echo "<a href='/'>Return to homepage</a><br><br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['id'];
  $NAME = $_POST['NAME'];

  // Update query
  $sql = "UPDATE courses SET NAME='$NAME' WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }
}
