<html lang="en">

<head>
  <title>PHPOps</title>

  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <style>
    .hide {
      display: none;
    }

    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    main {
      flex: 1;
    }

    #sidebarMenu {
      min-height: 69vh;
    }

    .jumbotron {
      border-radius: 0;
      margin-bottom: 0;
    }

    .container-fluid {
      padding: 0;
    }
  </style>
</head>

<body>

  <div class="container-fluid">
    <div class="jumbotron bg-primary text-white text-center">
      <h1>PHPOps</h1>
    </div>

    <div class="row">
      <!-- Sidebar -->
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
        <div class="sticky-top pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#add-course">Add Course</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#view-courses">View Courses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#update-course">Update Course</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#delete-course">Delete Course</a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Main content area -->
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <!-- Add Course Section -->
        <section id="add-course" class="mt-4 section">
          <h2>Add Course</h2>
          <form action="insert.php" method="post">
            <div class="form-group">
              <label for="name">Course Name:</label>
              <input type="text" class="form-control" id="name" name="NAME">
            </div>
            <button type="submit" class="btn btn-primary">Insert</button>
          </form>
        </section>

        <!-- View Courses Section -->
        <section id="view-courses" class="mt-4 section" style="display: none;">
          <h2>View Courses</h2>
          <button id="toggleButton" class="btn btn-success">View All Courses</button>
          <div id="coursesTable" class="table-responsive hide mt-3">
            <?php
            include_once 'database.php';

            $conn = connectDB();

            $tableData = getTableData($conn);

            if (!empty($tableData)) {
              echo "<table class='table table-striped'>";
              echo "<thead class='thead-dark'>
                              <tr>
                                  <th>ID</th>
                                  <th>Course Name</th>
                              </tr>
                          </thead>";
              foreach ($tableData as $row) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['NAME'] . "</td>";
                echo "</tr>";
              }
              echo "</table>";
            } else {
              echo "<p>No data found in the 'courses' table.</p>";
            }

            $conn->close();
            ?>
          </div>
        </section>

        <!-- Update Course Section -->
        <section id="update-course" class="mt-4 section" style="display: none;">
          <h2>Update Course</h2>
          <form action="update.php" method="post">
            <div class="form-group">
              <label for="updateId">Course ID:</label>
              <input type="text" class="form-control" id="updateId" name="id">
            </div>
            <div class="form-group">
              <label for="updateName">New Course Name:</label>
              <input type="text" class="form-control" id="updateName" name="NAME">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </section>

        <!-- Delete Course Section -->
        <section id="delete-course" class="mt-4 section" style="display: none;">
          <h2>Delete Course</h2>
          <form action="delete.php" method="post">
            <div class="form-group">
              <label for="deleteId">Course ID:</label>
              <input type="text" class="form-control" id="deleteId" name="id">
            </div>
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </section>
      </main>

    </div>
  </div>

  <!-- Footer -->
  <footer class="footer mt-auto py-3 bg-light">
    <div class="container text-center">
      <span class="text-muted">&copy; <?php echo $year = date('Y'); ?> PHPOps CRUD App</span>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    $(document).ready(function() {
      $(".nav-link").click(function() {
        $(".nav-link").removeClass("active");
        $(this).addClass("active");

        var sectionId = $(this).attr("href");
        $(".section").hide();
        $(sectionId).show();
      });
      $("#toggleButton").click(function() {
        $("#coursesTable").toggleClass("hide");
      });
    });
  </script>
</body>

</html>
