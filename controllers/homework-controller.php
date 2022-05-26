<?php
include("../repositories/homework-repository.php");
include("../models/homework.php");
require("../database/dbconnect.php");


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
}