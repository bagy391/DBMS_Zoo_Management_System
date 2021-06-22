<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['zmsaid']==0)) {
  header('location:logout.php');
  } else{
    $Eid=$_GET['editid1'];
    $Tid=$_GET['editid2'];
    $query=mysqli_query($con, "delete from MANAGES where Eid='$Eid' and Tid='$Tid'");
    if ($query) {
    header("location:employee-manages.php");
  }
  else
    {

      echo '<script>alert("Something Went Wrong. Please try again.")</script>';

    }


}



  ?>
