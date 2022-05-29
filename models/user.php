<?php




abstract class user
{
  protected $id;
  protected $name;
  protected $username;
  protected $email;
  protected $password;
  protected $index;

  public function __construct($id, $name, $username, $email, $password, $index)
  {
    $this->id = $id;
    $this->name = $name;
    $this->username = $username;
    $this->email = $email;
    $this->password = $password;
    $this->index = $index;
  }


  public function getId()
  {
    return $this->id;
  }


  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  public function getUsername()
  {
    return $this->username;
  }

  public function setUsername($username)
  {
    $this->username = $username;

    return $this;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail($email)
  {
    $this->email = $email;

    return $this;
  }


  public function getPassword()
  {
    return $this->password;
  }
  public function setPassword($password)
  {
    $this->password = $password;

    return $this;
  }

  public function getIndex()
  {
    return $this->index;
  }

  public function setIndex($index)
  {
    $this->index = $index;

    return $this;
  }
}