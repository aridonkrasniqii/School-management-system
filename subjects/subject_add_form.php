<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$title = $credits = $type = $lectured_by = "";
?>

<center>
  <section class="container" grey-text>
    <h4 class="center" style="color:black;">Add subject</h4>
    <form action="subjects/subject_add.php" method="POST" class="white">
      <label for="title">Title of subject:</label>
      <input type="text" name="title">
      <label for="credits">Credits of subject: </label>
      <input type="text" name="credits">
      <label for="lectured_by">Lectured by: </label>
      <input type="text" name="lectured_by" placeholder="Teacher ID">
      <div class="center">
        <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">

      </div>
    </form>
  </section>
</center>