<?php

require("../database/connection.php");
$connection = db::getConnection();
// $connection = mysqli_connect("localhost:3307", "root", "");
// $db = mysqli_select_db($connection, "school");
$id = "";

if (isset($_POST['edit'])) {

  update($id);
}

if (isset($_POST['delete'])) {

  delete($id);

}


function update(&$id)
{
  global $connection;

  // FIXME:
  $id = $_POST['id'];
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $index = $_POST['index'];

  
  $query = "UPDATE student
    SET
    student_name = '$name',
    student_username = '$username',
    student_email = '$email',
    student_index = $index
    WHERE
    student_id = $id;";

  mysqli_query($connection, $query);
}

function delete(&$id)
{
  global $connection;

  // FIXME:
  $id = $_POST['id'];
  $query = "SET FOREIGN_KEY_CHECKS=0;";
  mysqli_query($connection, $query);

  $query2 = "DELETE FROM student WHERE student_id = $id;";


  mysqli_query($connection, $query2);

  $query3 = "SET FOREIGN_KEY_CHECKS=1;";
  mysqli_query($connection, $query3);
}
?>
<script type="text/javascript">
alert("Student with id <?php echo $id; ?> edited successfully.");
window.location.href = "../teacher_dashboard.php";
</script>
<?php

unset($id);
?>