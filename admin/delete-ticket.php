<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['zmsaid']==0)) {
  header('location:logout.php');
  } else{
    $Cid=$_GET['editid'];
    $query=mysqli_query($con, "delete from TICKET where Cid='$Cid'");
    if ($query) {
    header("location:manage-normal-ticket.php");
  }
  else
    {

      echo '<script>alert("Something Went Wrong. Please try again.")</script>';

    }


}



  ?>
