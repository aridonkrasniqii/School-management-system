<h4 class="center grey-text">Subjects</h4>

<div class="container">
  <div class="row">

    <?php
    require("../database/connection.php");
    $connection = db::getConnection();
    $query = "select * from subject;";
    $subjects = [];
    $stmt = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      while ($row = mysqli_fetch_assoc($result)) {
        $subjects[] = $row;
        arsort($subjects);
      }
    } ?>


    <?php
    foreach ($subjects as $s) : ?>

    <div class="col s3 md3">
      <div class="card z-depth-0" id="card">
        <div class="card-content center">
          <h6><?php echo htmlspecialchars($s['name']); ?></h6>
          <div><?php echo htmlspecialchars($s['credits']); ?></div>
        </div>
        <div class="card-action right-align">
          <a class="brand-text" href="subjects/subject_delete.php?id=<?php echo $s['id']; ?>">Delete subject</a>
          <a class="brand-text"
            href="subjects/subject_edit_form.php?id=<?php echo $s['id']; ?>&name=<?php echo $s['name']; ?>&credits=<?php echo $s['credits']; ?>&lectured_by=<?php echo $s['created_by']; ?>&semester=<?php echo $s['semester']; ?>">Edit
            subject</a>

        </div>
      </div>
    </div>

    <?php endforeach; ?>
  </div>
</div>