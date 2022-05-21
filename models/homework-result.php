<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class homework_result {
  private $id;
  private $student_id;
  private $points;
  private $delivered_on_time;
  private $result_date;

  public function __construct($id, $student_id, $points, $delivered_on_time, $result_date){
    $this->id = $id;
    $this-> student_id = $student_id;
    $this-> points = $points;
    $this-> delivered_on_time = $delivered_on_time;
    $this-> result_date = $result_date;
  }


  public function setId($id) {
      $this->id = $id;
  }
  public function setStudent_id($student_id){
        $this-> student_id = $student_id;
  }

  public function setPoints($points){
    $this->points = $points;
  }
  public function setDelivered_on_time($delivered_on_time){
    $this-> delivered_on_time = $delivered_on_time;
  }

  public function setResult_date($result_date) {
    $this-> result_date = $result_date;
  }
  public function getId(){
    return $this->id;
  }
  public function getStudent_id(){
    return $this-> student_id;
  }

  public function getPoints(){
    return $this-> points;
  }

  public function getDelivered_on_time(){
    return $this-> delivered_on_time;
  }

  public function getResult_date() {
    return $this->result_date;
  }




}

