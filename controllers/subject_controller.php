<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class subject_controller
{

  public function findAllSubjects()
  {
    $repository = new subject_repository();
    $subjects = $repository->getAll();
    return $subjects;
  }


  public function findTeacher($teacher_id)
  {

    $repository = new subject_repository();
    return $repository->findSpecificTeacher($teacher_id);
  }
}
