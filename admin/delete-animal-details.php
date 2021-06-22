<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['zmsaid']==0)) {
  header('location:logout.php');
  } else{
    $Aid=$_GET['editid'];
    $query=mysqli_query($con, "delete from ANIMAL where Aid='$Aid'");
    if ($query) {
    header("location:manage-animals.php");
  }
  else
    {

      echo '<script>alert("Something Went Wrong. Please try again.")</script>';

    }


}



  ?>
