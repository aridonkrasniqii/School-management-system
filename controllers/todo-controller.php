<?php


include "./repositories/homework-repository.php";
include "./models/homework.php";

class todo_controller
{


  public function getAll()
  {
    $h1 = new homework_repository();
    return $h1->getAll();
  }
}