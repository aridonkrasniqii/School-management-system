<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("user.php");

class teacher extends user
{

  private $teacher_role;

  public function __construct($teacher_id, $teacher_name, $teacher_role, $teacher_username, $teacher_email, $teacher_password, $teacher_index)
  {
    parent::__construct($teacher_id, $teacher_name, $teacher_username, $teacher_email, $teacher_password, $teacher_index);
    $this->teacher_role = $teacher_role;
  }


  public function getTeacher_email()
  {
    return parent::getEmail();
  }

  public function getTeacher_password()
  {
    parent::getPassword();
  }

  public function setTeacher_password($password)
  {
    parent::setPassword($password);
  }

  public function getTeacher_index()
  {
    parent::getIndex();
  }
  public function setTeacher_index($index)
  {
    parent::setIndex($index);
  }




  public function getTeacher_id()
  {
    return parent::getId();
  }


  public function setTeacher_id($id)
  {
    parent::setId($id);
  }

  public function getTeacher_name()
  {
    return parent::getName();
  }

  public function getTeacher_username()
  {
    return parent::getUsername();
  }

  public function setTeacher_username($username)
  {
    parent::setUsername($username);
  }



  public function getTeacher_role()
  {
    return $this->teacher_role;
  }

  public function setTeacher_role($teacher_role)
  {
    $this->teacher_role = $teacher_role;

    return $this;
  }
}