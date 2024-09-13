<?php 

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "jkb";
    protected $koneksi;

    function __construct() {
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
    }

    function close() {
        mysqli_close($this->koneksi);
    }
}

class Lecturers extends Database {
    public function tampil_data() {
        $query = "SELECT * FROM lecturers";
        $result = mysqli_query($this->koneksi, $query);
        $lecturers = [];
        
        while ($row = mysqli_fetch_assoc($result)) {
            $lecturers[] = $row; 
        }
        
        return $lecturers;
    }
}

class Course_lecturers extends Database {
   
    public function tampil_data() {
        $query = "SELECT * FROM course_lecturers";
        $result = mysqli_query($this->koneksi, $query);
        $courseLecturers = [];
        
        while ($row = mysqli_fetch_assoc($result)) {
            $courseLecturers[] = $row; 
        }
        
        return $courseLecturers; 
    }
}
?>
