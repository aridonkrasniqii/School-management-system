<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class student
{
    private $student_id;
    private $student_name;
    private $student_role;
    private $student_username;
    private $student_email;
    private $student_password;
    private $student_salt;
    private $student_index;public function __construct($student_id, $student_name, $student_role, $student_username, $student_email, $student_password, $student_salt, $student_index)
    {
        $this->student_index = $student_index;
        $this->student_password = $student_password;
        $this->student_id = $student_id;
        $this->student_name = $student_name;
        $this->student_role = $student_role;
        $this->student_username = $student_username;
        $this->student_email = $student_email;
        $this->student_salt = $student_salt;

    }

    public function getStudent_index()
    {
        return $this->student_index;
    }

    public function setStudent_index($student_index)
    {
        $this->student_index = $student_index;
    }

    public function getStudent_password()
    {
        return $this->student_password;
    }

    public function setStudent_password($student_password)
    {
        $this->student_password = $student_password;

        return $this;
    }

    public function getStudent_id()
    {
        return $this->student_id;
    }
    public function setStudent_id($student_id)
    {
        $this->student_id = $student_id;

        return $this;
    }
    public function getStudent_name()
    {
        return $this->student_name;
    }

    public function setStudent_name($student_name)
    {
        $this->student_name = $student_name;

        return $this;
    }
    public function getStudent_role()
    {
        return $this->student_role;
    }
    public function setStudent_role($student_role)
    {
        $this->student_role = $student_role;

        return $this;
    }

    public function getStudent_username()
    {
        return $this->student_username;
    }

    public function setStudent_username($student_username)
    {
        $this->student_username = $student_username;

        return $this;
    }

    public function getStudent_email()
    {
        return $this->student_email;
    }

    public function setStudent_email($student_email)
    {
        $this->student_email = $student_email;

        return $this;
    }

    public function getStudent_salt()
    {
        return $this->student_salt;
    }

    public function setStudent_salt($student_salt)
    {
        $this->student_salt = $student_salt;

        return $this;
    }
}
