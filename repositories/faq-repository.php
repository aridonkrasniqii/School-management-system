<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// class faq_repository {

//   private $connection;



//   public function __construct()
//   {
//     $this->connection = mysqli_connect("localhost" , "root", "", "aca");
//   }

//   public function create($faq)  {

//       $query = "insert into faq(faq_question,student_id,teacher_id) values(? , ? , ?);";

//       $stmt  = mysqli_stmt_init($this->connection);

//       if(!mysqli_stmt_prepare($stmt, $query)){
//         throw new Exception();
//       }else {
//         $question = $faq->getQuestion();
//         $student_id = $faq->getStudent();
//         $teacher_id = $faq->getTeacher();
//         mysqli_stmt_bind_param($stmt, "sii" , $question , $student_id, $teacher_id);
//         mysqli_stmt_execute($stmt);
//       }

//         if($this->find($faq->getId()) != null) {
//           return  $faq;
//         }
//         return null;

//   }

//   public function find($id){

//     $query = "select * from faq where faq_id = ? ";
//      global $connection;
//       $stmt  = mysqli_stmt_init($connection);
//       if(!mysqli_stmt_prepare($stmt, $query)){
//         throw new Exception();
//       }else {
//         mysqli_stmt_bind_param($stmt, "i" , $id);
//         mysqli_stmt_execute($stmt);
//         $result = mysqli_stmt_get_result($stmt);


//         if($row = mysqli_fetch_assoc($result)){
//             $faq = $this->fromFetchAssoc($row);
//         }
//       }
//       if($faq != null ) return $faq;

//       return $faq;
//   }

//   public function fromFetchAssoc($row) {
//     return new faq($row['faq_id'],  $row['faq_question'] , $row['faq_answer'] , $row['student_id'] , $row['teacher_id']);
//   }



// }

class faq_repositoy {




  public function getAll() {
    $connection = mysqli_connect("localhost", "root", "", "aca");
    $query = "select * from faq";
    $stmt = mysqli_stmt_init($connection);

    if(!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    }else {
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);

      $faqs = array();
      while($row = mysqli_fetch_assoc($result)){
        $faqs[] = $row;
      }
    }

    return $faqs;
  }

}


