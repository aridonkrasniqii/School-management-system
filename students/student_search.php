<?php $id = $_POST['id'];
$connection = mysqli_connect("localhost:3307", "root", "");
$db = mysqli_select_db($connection, "school");
$query = "SELECT * FROM student WHERE student_id = {$id};";
$query_run = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($query_run)) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    .brand{
            background: #cbb09c !important;
        }
        .brand-text{
            
            color:#cbb09c !important;
            font-size:10px !important;
        }
        form{
            max-width: 460px;
            margin: 20px auto;
            padding:20px;
        }
        .card{
            width:100% !important;
            padding:0px !important;
        }
</style>

<h4><b>Student's details</b></h4><br><br>
<table class="striped center" style="width:70%; margin-left:200px;">
  <tr>
    <td>
      <b>ID:</b>
    </td>
    <td>
      <input type="text" value="<?php echo $row['student_id'] ?>" disabled>
    </td>
  </tr>
  <tr>
    <td>
      <b>Name:</b>
    </td>
    <td>
      <input type="text" value="<?php echo $row['student_name'] ?>" disabled>
    </td>
  </tr>
  <tr>
    <td>
      <b>Username:</b>
    </td>
    <td>
      <input type="text"  value="<?php echo $row['student_username'] ?>" disabled>
    </td>
  </tr>
  <tr>
    <td>
      <b>Email:</b>
    </td>
    <td>
      <input type="text"  value="<?php echo $row['student_email'] ?>" disabled>
    </td>
  </tr>
  <tr>
  <tr>
    <td>
      <b>Index:</b>
    </td>
    <td>
      <input type="text"  value="<?php echo $row['student_index'] ?>" disabled>
    </td>
  </tr>

</table>
<a class="btn brand z-depth-0 center" href="/school-management-systemm/teacher_dashboard.php" style="margin-left:200px;">Go Back</a>
<?php

}
?>