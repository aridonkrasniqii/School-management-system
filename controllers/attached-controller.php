<?php
include("./models/attached.php");
include("./repositories/attached-homework-repository.php");



class attached_controller
{



  public function getStudentHomeworks($student_id)
  {
    $repository = new attached_repository;
    return $repository->getStudentHomeworks($student_id);
  }


  public function findSemester($homework_id)
  {
    $repository = new attached_repository;
    return $repository->findSemester($homework_id);
  }


  public function findSubject($subject_id)
  {
    $repository = new attached_repository;
    return $repository->findSubject($subject_id);
  }
  public function findHomework($homework_id)
  {
    $repository = new attached_repository;
    return $repository->findHomework($homework_id);
  }
  public function findStudent($student_id)
  {
    $repository = new attached_repository;
    return $repository->findStudent($student_id);
  }
}