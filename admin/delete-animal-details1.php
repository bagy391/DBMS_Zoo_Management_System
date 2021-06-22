<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['zmsaid']==0)) {
  header('location:logout.php');
  } else{
    $ADid=$_GET['editid'];
    $query=mysqli_query($con, "delete from ANIMAL_DETAIL where ADid='$ADid'");
    if ($query) {
    header("location:manage-animal-detail.php");
  }
  else
    {

      echo '<script>alert("Something Went Wrong. Please try again.")</script>';

    }


}



  ?>
