<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class homework_repository
{

  private $connection;
  public function __construct()
  {
    $this->connection = db::getConnection();
  }
  public function getAll()
  {

    $query = "select * from homework;";
    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
      exit();
    } else {
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);

      $homeworks = array();

      while ($row = mysqli_fetch_assoc($result)) {
        $homeworks[] = $this->fromFetchAssoc($row);
      }
      return $homeworks;
    }
    return null;
  }

  public function fromFetchAssoc($row)
  {
    return new homework($row['id'], $row['name'], $row['subject_id'], $row['description'], $row['max_points'], $row['created_at'], $row['deadline'], $row['created_by'], $row['semester']);
  }

  public function find($id)
  {
    $query = "select * from homework where id = ?";
    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_bind_param($stmt, "i", $id);
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);

      while ($row = mysqli_fetch_assoc($result)) {
        $homework = $this->fromFetchAssoc($row);
      }
      return $homework;
    }
    return null;
  }

  public function findTeacher($homework_id, $teacher_id)
  {
    $query = "select * from homework, teacher
            where teacher_id = created_by and teacher_id = ? and id = ?";
    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_bind_param($stmt, "ii", $teacher_id, $homework_id);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if ($row = mysqli_fetch_assoc($result)) {
        return $row['teacher_name'];
      }
    }
  }

  public function showSubjectHomework($subject_id)
  {
    $query = "select * from homework where subject_id = ? order by semester desc;";

    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_bind_param($stmt, "i", $subject_id);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      $homeworks = array();
      while ($row = mysqli_fetch_assoc($result)) {
        $homeworks[] = $this->fromFetchAssoc($row);
      }
      return $homeworks;
    }
    return null;
  }
  public function findSpecificTeacher($teacher_id)
  {
    $query = "select * from teacher where teacher_id = ?";
    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_bind_param($stmt, "i", $teacher_id);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if ($row = mysqli_fetch_assoc($result)) {
        return $row['teacher_name'];
      }
    }
  }
  public function findSpecificSubject($subject_id)
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


  public function filterHomework($subject_id, $semester)
  {

    $query = "select * from homework where subject_id = ? and semester = ?;";
    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_bind_param($stmt, "ii", $subject_id, $semester);
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);

      $homeworks = array();
      while ($row = mysqli_fetch_assoc($result)) {
        $homeworks[] = $this->fromFetchAssoc($row);
      }
      return $homeworks;
    }
    return null;
  }
};