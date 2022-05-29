<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class teacher_repository
{


  private $connection;
  public function __construct()
  {
    $this->connection = db::getConnection();
  }
  public function aboutTeachers()
  {
    $query = "select * from teacher limit 3";
    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      $teachers = array();
      while ($row = mysqli_fetch_assoc($result)) {
        $teachers[] = $this->fromFetchAssoc($row);
      }
      if ($teachers != null)
        return $teachers;
      else
        throw new Exception;
    }
    return null;
  }

  public function fromFetchAssoc($row)
  {
    return new teacher($row['teacher_id'], $row['teacher_name'], $row['teacher_role'], $row['teacher_username'], $row['teacher_email'], $row['teacher_password'], $row['teacher_index']);
  }
}
