<!-- <?php
$connection = mysqli_connect("localhost:3307", "root", "");
$db = mysqli_select_db($connection, "school");

$name = $_POST['name']; //me evitu malicious sql actions
$username = $_POST['username'];
$email = $_POST['email'];
$index = $_POST['index'];

$query = "INSERT INTO student(student_name, student_username,student_email, student_password, student_index)
        VALUES('$name', '$username', '$email','$index', $index);";
$query_run = mysqli_query($connection, $query);
?>



<script type="text/javascript">
alert("Student added successfully.");
window.location.href = "../teacher_dashboard.php";
</script><?php

 -->