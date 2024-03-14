<?php

// Include database file
include 'database.php';


//Edit customer record
if(!empty($_GET['StdId'])) {
  $editId = $_GET['StdId'];
  $customer = $customerObj->displayRecordById($editId);
}

class update{
public function updateRecord($fname,$lname,$StdID,$sem,$grade){
      $query = "UPDATE customers SET name = '$uname', email = '$uemail', salary = '$usalary' WHERE id = '$id'";
      $sql = $this->con->query($query);
      if ($sql==true) {
        header("Location:index.php?msg2=update");
      }else{
        echo "Registration updated failed try again!";
      }
}

public function deleteRecord($StdID){
    $query = "DELETE FROM customers WHERE id = '$id'";
    $sql = $this->con->query($query);
    if ($sql==true) {
      header("Location:index.php?msg3=delete");
    }else{
      echo "Record does not delete try again";
    }
}

}

if(!empty($_POST)) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $StdID = $_POST['StdID'];
    $sem = $_POST['sem'];
    $grade = $_POST['grade'];
    $customerObj->updateRecord($fname,$lname,$StdID,$sem,$grade);
  }
?>