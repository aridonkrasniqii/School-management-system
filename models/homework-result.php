<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class homework_result
{
  private $id;
  private $homework;
  private $student_id;
  private $points;
  private $delivered_on_time;
  private $result_date;

  public function __construct($id, $homework, $student_id, $points, $delivered_on_time, $result_date)
  {
    $this->id = $id;
    $this->student_id = $student_id;
    $this->points = $points;
    $this->delivered_on_time = $delivered_on_time;
    $this->result_date = $result_date;
    $this->homework = $homework;
  }



  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of homework
   */
  public function getHomework()
  {
    return $this->homework;
  }

  /**
   * Set the value of homework
   *
   * @return  self
   */
  public function setHomework($homework)
  {
    $this->homework = $homework;

    return $this;
  }

  /**
   * Get the value of student_id
   */
  public function getStudent_id()
  {
    return $this->student_id;
  }

  /**
   * Set the value of student_id
   *
   * @return  self
   */
  public function setStudent_id($student_id)
  {
    $this->student_id = $student_id;

    return $this;
  }

  /**
   * Get the value of points
   */
  public function getPoints()
  {
    return $this->points;
  }

  /**
   * Set the value of points
   *
   * @return  self
   */
  public function setPoints($points)
  {
    $this->points = $points;

    return $this;
  }

  /**
   * Get the value of delivered_on_time
   */
  public function getDelivered_on_time()
  {
    return $this->delivered_on_time;
  }

  /**
   * Set the value of delivered_on_time
   *
   * @return  self
   */
  public function setDelivered_on_time($delivered_on_time)
  {
    $this->delivered_on_time = $delivered_on_time;

    return $this;
  }

  /**
   * Get the value of result_date
   */
  public function getResult_date()
  {
    return $this->result_date;
  }

  /**
   * Set the value of result_date
   *
   * @return  self
   */
  public function setResult_date($result_date)
  {
    $this->result_date = $result_date;

    return $this;
  }
}
