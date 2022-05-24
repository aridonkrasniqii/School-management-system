<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$connection = mysqli_connect("localhost", "root", "", "school");


function getAll()
{
  global $connection;
  $query = "select * from homework_result;";
  $stmt = mysqli_stmt_init($connection);

  if (!mysqli_stmt_prepare($stmt, $query)) {
    throw new Exception();
  } else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $homework_results = array();

    while ($row = mysqli_fetch_assoc($result)) {
      $homework_results[] = fromFetchAssoc($row);
    }
    return $homework_results;
  }
  return null;
}

function fromFetchAssoc($row)
{
  return new homework_result($row['id'], $row['homework_id'], $row['student_id'], $row['points'], $row['delivered_on_time'], $row['date']);
}


function getHomeworkName($id)
{

  $query = "select name from homework where id = ?";
  global $connection;
  $stmt = mysqli_stmt_init($connection);

  if (!mysqli_stmt_prepare($stmt, $query)) {
    throw new Exception();
  } else {
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
      return $row['name'];
    }
  }
  return null;
}

function getStudentName($id)
{

  $query = "select student_name from student where student_id = ?";
  global $connection;
  $stmt = mysqli_stmt_init($connection);

  if (!mysqli_stmt_prepare($stmt, $query)) {
    throw new Exception();
  } else {
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
      return $row['student_name'];
    }
  }
  return null;
}

function findDeliveredOnTime($homework_id, $attached_date)
{
  global $connection;
  $query = "select * from homework where id = ? and deadline > ?";
  $stmt = mysqli_stmt_init($connection);

  if (!mysqli_stmt_prepare($stmt, $query)) {
    throw new Exception();
  } else {
    mysqli_stmt_bind_param($stmt, "is", $homework_id, $attached_date);

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);


    if ($row = mysqli_fetch_assoc($result)) {
      return true;
    }
  }
  return false;
}

function create($model)
{
  $query = "insert into homework_result(homework_id,student_id,points,delivered_on_time, date) values(?,?,?,?,?);";
  global $connection;
  $stmt = mysqli_stmt_init($connection);

  if (!mysqli_stmt_prepare($stmt, $query)) {
    throw new Exception();
  } else {

    $homework = $model->getHomework();
    $sub = $model->getStudent_id();
    $points = $model->getPoints();
    $time = $model->getDelivered_on_time();
    $date = date("Y-m-d");
    mysqli_stmt_bind_param($stmt, "iiiss", $homework, $sub, $points, $time, $date);

    if (mysqli_stmt_execute($stmt)) {
      return $model;
    }
  }

  return null;
}