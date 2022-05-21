<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class subject_repository {

  private $db;
  private $connection;

  public function __construct() {
    $this->db = new db();
    $this->connection = $this->db->conn();
  }

function getAll() {
  $query = "select * from subject";

  global $connection;
  $stmt = mysqli_stmt_init($connection);

  if(!mysqli_stmt_prepare($stmt, $query)){
    throw new Exception();
  }else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $subjects = array();

    while($row = mysqli_fetch_assoc($result)){
      $subjects[] = $this->fromFetchAssoc($row);
    }
    return $subjects;
  }
  return null;
}

function fromFetchAssoc($row) {
    $id = $row['subject_id'];
    $name = $row['subject_name'];
    $credits = $row['subject_credits'];
    $created_at  = $row['subject_created_at'];
    $date = $row['subject_date'];
    $created_by = $row['subject_created_by'];
    return new subject($id, $name, $credits, $created_at , $date, $created_by);
}


}


$connection = mysqli_connect("localhost", "root", "", "aca");

function getAll() {
  $query = "select * from subject";

  global $connection;
  $stmt = mysqli_stmt_init($connection);

  if(!mysqli_stmt_prepare($stmt, $query)){
    throw new Exception();
  }else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $subjects = array();

    while($row = mysqli_fetch_assoc($result)){
      $subjects[] = fromFetchAssoc($row);
    }
    return $subjects;
  }
  return null;
}

function fromFetchAssoc($row) {
    return new subject($row['subject_id'], $row['subject_name'], $row['subject_credits'], $row['subject_created_at'] , $row['subject_date'],  $row['subject_created_by']);
}
