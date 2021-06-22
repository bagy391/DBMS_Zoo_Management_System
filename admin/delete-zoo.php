<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['zmsaid']==0)) {
  header('location:logout.php');
  } else{
    $Zid=$_GET['editid'];
    $query=mysqli_query($con, "delete from ZOO where Zid='$Zid'");
    if ($query) {

    echo '<script>alert("Zoo Details Deleted.")</script>';
    header("location:dashboard.php");
  }
  else
    {

      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
      
    }


}



  ?>
