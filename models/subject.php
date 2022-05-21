<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);




class Subject {
  private $id;
  private $name;
  private $credits;
  private $created_at;
  private $date;
  private $create_by;


  public function __construct($id, $name, $credits, $created_at, $date, $create_by){
    $this->id = $id;
    $this-> name = $name;
    $this-> credits = $credits;
    $this-> created_at = $created_at;
    $this-> date = $date;
    $this-> create_by = $create_by;
  }


  public function getId(){
    return $this->id;
  }


  public function getName(){
    return $this->name;
  }

  public function getCredits(){
    return $this->credits;
  }
  public function getCreated_at() {
    return $this->created_at;
  }

  public function getDate(){
    return $this->date;
  }

  public function getCreated_by(){
    return $this->create_by;
  }

}
