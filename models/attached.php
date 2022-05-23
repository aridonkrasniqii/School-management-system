<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class attached
{

  protected $id;
  protected $homework_id;
  protected $subject_id;
  protected $student_id;
  protected $attached_date;
  protected $description;

  public function __construct($id, $homework_id, $subject_id, $student_id, $attached_date, $description)
  {
    $this->id = $id;
    $this->homework_id = $homework_id;
    $this->subject_id = $subject_id;
    $this->student_id = $student_id;
    $this->attached_date = $attached_date;
    $this->description = $description;
  }

  /**
   * Get the value of attached_date
   */
  public function getAttached_date()
  {
    return $this->attached_date;
  }

  /**
   * Set the value of attached_date
   *
   * @return  self
   */
  public function setAttached_date($attached_date)
  {
    $this->attached_date = $attached_date;

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
   * Get the value of subject_id
   */
  public function getSubject_id()
  {
    return $this->subject_id;
  }

  /**
   * Set the value of subject_id
   *
   * @return  self
   */
  public function setSubject_id($subject_id)
  {
    $this->subject_id = $subject_id;

    return $this;
  }

  /**
   * Get the value of homework_id
   */
  public function getHomework_id()
  {
    return $this->homework_id;
  }

  /**
   * Set the value of homework_id
   *
   * @return  self
   */
  public function setHomework_id($homework_id)
  {
    $this->homework_id = $homework_id;

    return $this;
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
   * Get the value of description
   */
  public function getDescription()
  {
    return $this->description;
  }

  /**
   * Set the value of description
   *
   * @return  self
   */
  public function setDescription($description)
  {
    $this->description = $description;

    return $this;
  }
}