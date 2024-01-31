<?php


function connectDB()
{
  $HOST = "localhost";
  $USER = "phpmyadmin";
  $PASSWORD = "password";
  $DATABASE = "test";

  $connection = new mysqli($HOST, $USER, $PASSWORD, $DATABASE);

  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }

  return $connection;
}

function insertData($conn, $NAME)
{
  $insertQuery = "INSERT INTO courses (NAME) VALUES ('$NAME')";

  if ($conn->query($insertQuery) === TRUE) {
    echo "Data inserted successfully!";
  } else {
    echo "Error: " . $insertQuery . "<br>" . $conn->error;
  }
}

function getTableData($conn)
{
  $tableDataQuery = "SELECT * FROM courses";
  $tableDataResult = $conn->query($tableDataQuery);

  $data = array();

  if ($tableDataResult->num_rows > 0) {
    while ($row = $tableDataResult->fetch_assoc()) {
      $data[] = $row;
    }
  }

  return $data;
}
