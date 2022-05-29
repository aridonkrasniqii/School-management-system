<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$name = $credits = $lectured_by = $semester = "";


?>

<center>
  <section class="container" grey-text>
    <h4 class="center" style="color:black;">Add subject</h4>
    <form action="./controllers/add-subject-controller.php" method="POST" class="white">
      <label for="title">Title of subject:</label>
      <input type="text" name="name">
      <label for="credits">Credits of subject: </label>
      <input type="text" name="credits">
      <label for="lectured_by">Lectured by: </label>
      <input type="text" name="lectured_by" placeholder="Teacher ID">
      <label for="lectured_by">Semester: </label>
      <input type="text" name="semester">
      <div class="center">
        <input type="submit" name="add-subject" value="submit" class="btn brand z-depth-0">
      </div>
    </form>
  </section>
</center>
