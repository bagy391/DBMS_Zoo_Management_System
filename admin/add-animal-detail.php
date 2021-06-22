<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['zmsaid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
    $ADid=$_POST['ADid'];
    $Height=$_POST['Height'];
    $Weight=$_POST['Weight'];
    $Age=$_POST['Age'];
    $Aid=$_POST['Aid'];

 $ret=mysqli_query($con,"select * from ANIMAL_DETAIL where ADid='$ADid'");
 $result=mysqli_fetch_array($ret);
 if($result>0){

echo "<script>alert('This ID is already alloted to other Animal-Detail');</script>";
    }
    else{

        $query=mysqli_query($con, "insert into ANIMAL_DETAIL values('$ADid','$Height','$Weight','$Age','$Aid')");
    if ($query) {

     echo '<script>alert("Animal-detail has been added.")</script>';
     header("location:manage-animal-detail.php");
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
}

}
  ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Add Animal-Detail - Zoo Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>

<body>

    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
     <?php include_once('includes/sidebar.php');?>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
          <?php include_once('includes/header.php');?>
            <!-- header area end -->
            <!-- page title area start -->
           <?php include_once('includes/pagetitle.php');?>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">

                    <div class="col-lg-12 col-ml-12">
                        <div class="row">
                            <!-- basic form start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Add Animal-Detail</h4>
                                        <form method="post" enctype="multipart/form-data">
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">AD id</label>
                                                <input type="text" class="form-control" id="ADid" name="ADid" aria-describedby="emailHelp" placeholder="Enter Animal-Detail id" value="" required="true">
                                            </div>

                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Height(inches)</label>
                                                <input type="text" class="form-control" id="Height" name="Height" aria-describedby="emailHelp" placeholder="Enter Height" value="" required="true">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Weight</label>
                                                <input type="text" class="form-control" id="Weight" name="Weight" aria-describedby="emailHelp" placeholder="Enter Weight" value="" required="true" >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Age</label>
                                                <input type="text" class="form-control" id="Age" name="Age" aria-describedby="emailHelp" placeholder="Enter Age" value="" required="true">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Animal ID</label>
                                                <input type="text" class="form-control" id="Aid" name="Aid" aria-describedby="emailHelp" placeholder="Enter Animal ID" value="" required="true">
                                            </div>

                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" name="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- basic form end -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <?php include_once('includes/footer.php');?>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
<?php }  ?>
