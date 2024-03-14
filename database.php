<?php

class database{
  private $servername = "localhost";
  private $username   = "root";
  private $password   = "";
  private $database   = "data";
  public  $con;

  public function __construct()
  {
    $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
    if(mysqli_connect_error()) {
      die("Failed to connect to MySQL: " . mysqli_connect_error());
    }
  }

  public function insertData($fname,$lname,$StdID,$sem,$grade)
  {
    $query="INSERT INTO student(fname, lname, StdID, sem, grade) VALUES('$fname','$lname','$StdID','$sem','$grade')";
    $sql = $this->con->query($query);
    if ($sql==true) {
      header("Location:index.php?msg1=insert");
    }else{
      echo "Registration failed try again!";
    }
  }

  public function displayData()
  {
    $query = "SELECT * FROM student";
    $result = $this->con->query($query);
    if ($result->num_rows > 0){
      $data = array();
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    }else{
      echo "No found records";
    }
  }

  public function displayRecordById($id)
  {
    $query = "SELECT * FROM student WHERE id = '$id'";
    $result = $this->con->query($query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row;
    }
  }

  public function updateRecord($new_fname, $new_lname, $new_StdID, $new_sem, $new_grade)
  {
      $query = "UPDATE student SET fname = '$new_fname', lname = '$new_lname', StdID = '$new_StdID', sem = '$new_sem', grade ='$new_grade' WHERE id = '$id'";
      $sql = $this->con->query($query);
      if ($sql==true) {
        header("Location:index.php?msg2=update");
      }else{
        echo "Registration updated failed try again!";
      }
    
  }

  public function deleteRecord($id)
  {
    $query = "DELETE FROM student WHERE id = '$id'";
    $sql = $this->con->query($query);
    if ($sql==true) {
      header("Location:index.php?msg3=delete");
    }else{
      echo "Record does not delete try again";
    }
  }
  
}
$customerObj = new database();