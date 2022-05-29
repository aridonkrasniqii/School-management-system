<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



class attached_repository
{

  private $connection;
  public function __construct()
  {
    // $this->connection = mysqli_connect("localhost", "root", "", "school");
    $this->connection = db::getConnection();
  }

  public function find($id)
  {
    $query = "select * from attached_homework where id = ?";
    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_bind_param($stmt, "i", $id);
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);

      if ($row = mysqli_fetch_assoc($result)) {
        return new attached($row['id'], $row['homework_id'], $row['subject_id'], $row['student_id'], $row['attached_date'], $row['description'], $row['filename']);
      }
    }
  }
  public function create($model)
  {
    $query = "insert into attached_homework(homework_id,subject_id,student_id,description,filename) values(?,?,?,?,?)";
    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {

      $homework_id = $model->getHomework_id();
      $student_id = $model->getStudent_id();
      $subject_id = $model->getSubject_id();
      $description = $model->getDescription();
      $filename = $model->getFilename();
      mysqli_stmt_bind_param($stmt, "iiiss", $homework_id, $subject_id, $student_id, $description, $filename);
      if (mysqli_stmt_execute($stmt)) {
        return $model;
      }
    }
    return null;
  }

  public function getAll()
  {

    $query = "select * from attached_homework ;";
    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      $attached = array();
      while ($row = mysqli_fetch_assoc($result)) {
        $attached[] = $this->fromFetchAssoc($row);
      }
      return $attached;
    }
  }
  public function getStudentHomeworks($student_id)
  {
    $query = "select * from attached_homework where student_id = ?";
    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_bind_param($stmt, "i", $student_id);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      $attached = array();
      while ($row = mysqli_fetch_assoc($result)) {
        $attached[] = $this->fromFetchAssoc($row);
      }
      return $attached;
    }
  }
  public function fromFetchAssoc($row)
  {
    return new attached($row['id'], $row['homework_id'], $row['subject_id'], $row['student_id'], $row['attached_date'], $row['description'], $row['filename']);
  }


  public function findHomework($homework_id)
  {
    $query = "select * from homework where id = ?";
    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_bind_param($stmt, "i", $homework_id);
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        return $row['name'];
      }
    }
  }

  public function findSubject($subject_id)
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
  }
  public function findStudent($student_id)
  {
    $query = "select * from student where student_id = ?";
    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_bind_param($stmt, "i", $student_id);
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        return $row['student_name'];
      }
    }
  }

  public function findSemester($homework_id)
  {
    $query = "select * from homework h inner join attached_homework a on h.id = a.homework_id where a.homework_id = ?";
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
  }

  public function getFilteredData($student_id, $subject_id, $semester_id)
  {

    $query = "select * from homework h inner join attached_homework a on h.id = a.homework_id where a.student_id = ? and a.subject_id = ? and h.semester = ?";
    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_bind_param($stmt, "iii", $student_id, $subject_id, $semester_id);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      $attached = array();
      while ($row = mysqli_fetch_assoc($result)) {
        $attached[] = $this->fromFetchAssoc($row);
      }
      return $attached;
    }
  }
}