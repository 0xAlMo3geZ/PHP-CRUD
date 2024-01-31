<html lang="en">

<head>
  <title>PHP Deez</title>
</head>

<body>
  <h2>Insert Data into Courses Table:</h2>

  <form action="insert.php" method="post">
    <label for="NAME">Course Name:</label>
    <input type="text" id="NAME" name="NAME" required><br>

    <input type="submit" value="Insert">
  </form>

  <?php
  include_once 'database.php';

  $conn = connectDB();

  echo "<h2>Table Name:</h2>";
  echo "<p>Courses</p>";

  echo "<h2>Table Data:</h2>";
  $tableData = getTableData($conn);

  if (!empty($tableData)) {
    echo "<table border='1'>";
    echo "<tr>
            <th>ID</th>
            <th>Course Name</th>
          </tr>";

    foreach ($tableData as $row) {
      echo "<tr>";
      echo "<td>" . $row['id'] . "</td>";
      echo "<td>" . $row['NAME'] . "</td>";
      echo "</tr>";
    }

    echo "</table>";
  } else {
    echo "No data found in the 'courses' table. <br>";
  }

  $conn->close();
  ?>
</body>

</html>