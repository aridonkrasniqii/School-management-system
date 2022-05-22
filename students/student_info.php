<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

<h2>Students</h2>
<table class="responsive-table white">
  <thead>
    <tr>
      <th>id.</th>
      <th>name</th>
      <th>role</th>
      <th>email</th>
      <th>index</th>
    <tr>
  </thead>
  <tbody>
    <?php
    $connection = mysqli_connect("localhost","root", "", "aca");
    $query = "select * from student;";
    $students = [];
    $stmt = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      while ($row = mysqli_fetch_assoc($result)) {
        $students[] = $row;
      }
    }
    foreach ($students as $s) {
      echo "<tr>";
      echo "<td>" . $s['student_id'] . "</td>";
      echo "<td>" . $s['student_name'] . "</td>";
      echo "<td>" . $s['student_role'] . "</td>";
      echo "<td>" . $s['student_email'] . "</td>";
      echo "<td>" . $s['student_index'] . "</td>";
      // FIXME: to edit student

      echo "</tr>";
    }

    ?>

    <script>

    </script>