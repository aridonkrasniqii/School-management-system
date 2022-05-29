<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("user.php");


class student extends user
{

  public function __construct($student_id, $student_name, $student_username, $student_email, $student_password, $student_index)
  {

    parent::__construct($student_id, $student_name, $student_username, $student_email, $student_password, $student_index);
  }



  public function getStudent_index()
  {
    return parent::getIndex();
  }

  public function setStudent_index($student_index)
  {
    parent::setIndex($student_index);
  }

  public function getStudent_password()
  {
    return parent::getPassword();
  }

  public function setStudent_password($student_password)
  {
    parent::setPassword($student_password);
  }

  public function getStudent_id()
  {
    return parent::getId();
  }
  public function setStudent_id($student_id)
  {
    parent::setId($student_id);
  }
  public function getStudent_name()
  {
    return parent::getName();
  }

  public function setStudent_name($student_name)
  {
    parent::setName($student_name);
  }


  public function getStudent_username()
  {
    return parent::getUsername();
  }

  public function setStudent_username($student_username)
  {
    parent::setUsername($student_username);
  }


  public function getStudent_email()
  {
    return parent::getEmail();
  }

  public function setStudent_email($student_email)
  {
    parent::setEmail($student_email);
  }
}