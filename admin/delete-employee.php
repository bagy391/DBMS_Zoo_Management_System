<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['zmsaid']==0)) {
  header('location:logout.php');
  } else{
    $Eid=$_GET['editid'];
    $query=mysqli_query($con, "delete from EMPLOYEE where Eid='$Eid'");
    if ($query) {
    header("location:manage-employee.php");
  }
  else
    {

      echo '<script>alert("Something Went Wrong. Please try again.")</script>';

    }


}



  ?>
