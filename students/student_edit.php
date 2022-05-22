<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "aca");

if (isset($_POST['edit'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $parent = $_POST['parent'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $index = $_POST['index'];



  $query = "UPDATE student
    SET
    student_name = '$name',
    student_parent = $parent,
    student_username = '$username',
    student_email = '$email',
    student_index = $index
    WHERE
    student_id = $id;";

  mysqli_query($connection, $query);
}



?>
<script type="text/javascript">
alert("Student edited successfully.");
window.location.href = "../teacher_dashboard.php";
</script>