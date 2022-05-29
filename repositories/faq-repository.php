<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);




class faq_repository
{


  private $connection;
  public function __construct()
  {
    $this->connection = db::getConnection();
  }
  public function getAll()
  {
    $query = "select * from faq";
    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);

      $faqs = array();
      while ($row = mysqli_fetch_assoc($result)) {
        $faqs[] = $row;
      }
    }

    return $faqs;
  }

  public function create($question, $answer)
  {
    $query = "insert into faq(faq_question , faq_answer) values( ? , ? )";
    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_bind_param($stmt, "ss", $question, $answer);
      mysqli_stmt_execute($stmt);
    }
  }

  public function updateAnswer($faq_id, $faq_answer)
  {
    $query = "update faq_answer set faq_answer = ? where faq_id = ?";
    $stmt = mysqli_stmt_init($this->connection);


    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_bind_param($stmt, "si", $faq_answer, $faq_id);
      mysqli_stmt_execute($stmt);
    }
  }

  public function getSpecificAnswers($faq_id)
  {
    $query = "select * from faq_answer where faq_id = ?";
    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_bind_param($stmt, "i", $faq_id);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      $faq_answers = [];
      if ($row = mysqli_fetch_assoc($result)) {
        $faq_answers = $row['faq_answer'];
      }

      return $faq_answers;
    }
    return null;
  }
}