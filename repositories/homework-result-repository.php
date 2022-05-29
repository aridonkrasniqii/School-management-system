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



class homework_result_repository
{


  private $connection;


  public function __construct()
  {
    $this->connection = db::getConnection();
  }
  public function filterData($student_id, $subject_id, $semester)
  {

    $query = "select * from homework h inner join homework_result hr on h.id = hr.homework_id where hr.student_id = ? and h.subject_id = ? and h.semester = ? ;";

    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_bind_param($stmt, "iii", $student_id, $subject_id, $semester);
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


  public function findSubject($homework_id)
  {

    $query = "select * from homework_result hr inner join homework h on h.id = hr.homework_id where hr.homework_id = ? ";
    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_bind_param($stmt, "i", $homework_id);

      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if ($row = mysqli_fetch_assoc($result)) {
        return $this->getSubjectName($row['subject_id']);
      }
    }
    return null;
  }
  public function getSubjectName($subject_id)
  {
    $query = "select * from subject where id = ?";
    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_bind_param($stmt, "i", $subject_id);

      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if ($row = mysqli_fetch_assoc($result)) {
        return $row['name'];
      }
    }
    return null;
  }

  public function getSemester($homework_id)
  {

    $query = "select * from homework_result hr inner join homework h on h.id = hr.homework_id where hr.homework_id = ? ";
    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_bind_param($stmt, "i", $homework_id);

      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if ($row = mysqli_fetch_assoc($result)) {
        return $row['semester'];
      }
    }
    return null;
  }

  public function getStudentResults($student_id)
  {
    $query = "select * from homework_result where student_id = ?";
    $stmt = mysqli_stmt_init($this->connection);
    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_bind_param($stmt, "i", $student_id);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      $results = [];
      while ($row = mysqli_fetch_assoc($result)) {
        $results[] = $this->fromFetchAssoc($row);
      }

      return $results;
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
}