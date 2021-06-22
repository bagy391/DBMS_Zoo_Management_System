<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['zmsaid']==0)) {
  header('location:logout.php');
  } else{
    $Eid=$_GET['editid1'];
    $Aid=$_GET['editid2'];
    $query=mysqli_query($con, "delete from LOOKS_AFTER where Eid='$Eid' and Aid='$Aid'");
    if ($query) {
    header("location:employee-looks-after.php");
  }
  else
    {

      echo '<script>alert("Something Went Wrong. Please try again.")</script>';

    }


}



  ?>
