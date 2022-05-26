<?php

include("/opt/lampp/htdocs/school-management-system/repositories/homework-repository.php");
include("/opt/lampp/htdocs/school-management-system/models/homework.php");



class homework_controller
{

  public function getSpecificHomework($id)
  {
    $h = new homework_repository;
    return $h->find($id);
  }

  public function findTeacher($id, $created_by)
  {
    $h = new homework_repository;
    return $h->findTeacher($id, $created_by);
  }
  public function getAll()
  {
    $h = new homework_repository;
    return $h->getAll();
  }
}