<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class attached_homework
{
  private $id;
  private $homework;
  private $subject;
  private $student;
  private $semester;
  private $points;
  private $date;


  public function __construct($id, $homework, $subject, $student, $semester, $points, $date)
  {
    $this->id = $id;
    $this->homework = $homework;
    $this->subject = $subject;
    $this->student = $student;
    $this->semester = $semester;
    $this->points = $points;
    $this->date = $date;
  }

  public function getId()
  {
    return $this->id;
  }
  public function getHomework()
  {
    return $this->homework;
  }

  public function getSubject()
  {
    return $this->subject;
  }
  public function getPoints()
  {
    return $this->points;
  }
  public function getDate()
  {
    return $this->date;
  }
  public function getSemester()
  {
    return $this->semester;
  }
  public function getStudent()
  {
    return $this->student;
  }
}