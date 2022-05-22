<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class homework_repository
{
    private $db;
    private $connection;

    public function __construct()
    {
        $this->db = new db();
        $this->connection = $this->db->conn();
    }
    public function getAll()
    {
        global $connection;

        $query = "select * from homework;";
        $stmt = mysqli_stmt_init($connection);

        if (!mysqli_stmt_prepare($stmt, $query)) {
            throw new Exception();
            exit();
        } else {
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            $homeworks = array();

            while ($row = mysqli_fetch_assoc($result)) {
                $homeworks[] = $this->fromFetchAssoc($row);
            }
            return $homeworks;
        }
        return null;
    }

    public function fromFetchAssoc($row)
    {
        return new homework($row['homework_id'], $row['homework_name'], $row['homework_subject'], $row['homework_description'], $row['homework_max_points'], $row['homework_created_at'], $row['homework_deadline'], $row['homework_created_by']);
    }

    public function find($id)
    {
        global $connection;
        $query = "select * from homework where homework_id = ?";
        $stmt = mysqli_stmt_init($connection);

        if (!mysqli_stmt_prepare($stmt, $query)) {
            throw new Exception();
        } else {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            while ($row = mysqli_fetch_assoc($result)) {
                $homework = $this->fromFetchAssoc($row);
            }
            return $homework;
        }
        return null;
    }

    public function findTeacher($homework_id, $teacher_id)
    {
        $query = "select * from homework, teacher
            where teacher_id = homework_created_by and teacher_id = ? and homework_id = ?";
        global $connection;
        $stmt = mysqli_stmt_init($connection);

        if (!mysqli_stmt_prepare($stmt, $query)) {
            throw new Exception();
        } else {
            mysqli_stmt_bind_param($stmt, "ii", $teacher_id, $homework_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                return $row['teacher_name'];
            }
        }
    }

    public function filterHomeworks($semester, $subject)
    {
        
        $query = "select * from homework where homework_subject = ?";
        global $connection;
        $stmt = mysqli_stmt_init($connection);

        if (!mysqli_stmt_prepare($stmt, $query)) {
            throw new Exception();
        } else {
            mysqli_stmt_bind_param($stmt, "i", $subject);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            while ($row = mysqli_fetch_assoc($result)) {
                $homework = $this->fromFetchAssoc($row);
            }
            return $homework;
        }
        return null;
    }

}
