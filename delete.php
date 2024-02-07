<?php

include 'database.php';

$conn = connectDB();

echo "<a href='/'>Return to homepage</a><br><br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['id'];

  // Delete query
  $sql = "DELETE FROM courses WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
}
