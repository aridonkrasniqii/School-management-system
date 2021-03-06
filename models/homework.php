<?php

class homework
{

  private $id;
  private $name;
  private $subject;
  private $description;
  private $max_points;
  private $created_at;
  private $deadline;
  private $created_by;
  private $semester;

  public function __construct($id, $name, $subject, $description, $max_points, $created_at, $deadline, $created_by, $semester)
  {
    $this->id = $id;
    $this->name = $name;
    $this->subject = $subject;
    $this->description = $description;
    $this->max_points = $max_points;
    $this->created_at = $created_at;
    $this->deadline = $deadline;
    $this->created_by = $created_by;
    $this->semester = $semester;
  }


  public function getId()
  {
    return $this->id;
  }

  public function getName()
  {
    return $this->name;
  }


  public function getDescription()
  {
    return $this->description;
  }
  public function getMax_points()
  {
    return $this->max_points;
  }

  public function getCreated_at()
  {
    return $this->created_at;
  }
  public function getDeadline()
  {
    return $this->deadline;
  }

  public function getCreated_by()
  {
    return $this->created_by;
  }


  public function getSubject()
  {
    return $this->subject;
  }

  
  public function setSubject($subject)
  {
    $this->subject = $subject;

    return $this;
  }

  public function getSemester()
  {
    return $this->semester;
  }


  public function setSemester($semester)
  {
    $this->semester = $semester;

    return $this;
  }
}