<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['zmsaid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
    $Aname=$_POST['Aname'];
    $AKid=$_POST['AKid'];
    $Physical_Characteristics=$_POST['Physical_Characteristics'];
    $Zoo_Region=$_POST['Zoo_Region'];
    $Diet=$_POST['Diet'];
    $Population_Status=$_POST['Population_Status'];
   $aimg=$_FILES["image"]["name"];
$extension = substr($aimg,strlen($aimg)-4,strlen($aimg));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$aimg=md5($aimg).time().$extension;
 move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$aimg);
 $ret=mysqli_query($con,"select * from ANIMAL_KIND where AKid='$AKid'");
 $result=mysqli_fetch_array($ret);
 if($result>0){

echo "<script>alert('This ID is already alloted to other animal_kind');</script>";
    }
    else{

        $query=mysqli_query($con, "insert into  ANIMAL_KIND(AKid,Aname,Physical_Characteristics,Zoo_Region,Diet,Population_Status,AnimalImage) value('$AKid','$Aname','$Physical_Characteristics','$Zoo_Region','$Diet','$Population_Status','$aimg')");
    if ($query) {

     echo '<script>alert("Animal detail has been added.")</script>';
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
}
}
}
  ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Add Animal Detail - Zoo Management System</title>
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
                                        <h4 class="header-title">Add Animal Detail</h4>
                                        <form method="post" enctype="multipart/form-data">
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Animal Name</label>
                                                <input type="text" class="form-control" id="Aname" name="Aname" aria-describedby="emailHelp" placeholder="Enter animal Name" value="" required="true">
                                            </div>
                                         <div class="form-group">
                                                <label for="exampleInputEmail1">Animal Image</label>
                                                <input type="file" class="form-control" id="image" name="image" aria-describedby="emailHelp" value="" required="true">

                                            </div>

                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Akid</label>
                                                <input type="text" class="form-control" id="AKid" name="AKid" aria-describedby="emailHelp" placeholder="Enter akid" value="" required="true">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Region</label>
                                                <input type="text" class="form-control" id="Zoo_Region" name="Zoo_Region" aria-describedby="emailHelp" placeholder="Enter zoo region" value="" required="true" maxlength="6">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Physical_Characteristics</label>
                                                <input type="text" class="form-control" id="Physical_Characteristics" name="Physical_Characteristics" aria-describedby="emailHelp" placeholder="Enter Physical_Characteristics" value="" required="true">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Diet</label>
                                                <input type="text" class="form-control" id="Diet" name="Diet" aria-describedby="emailHelp" placeholder="Enter diet of animal" value="" required="true">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Population_Status</label>
                                                <input type="text" class="form-control" id="Population_Status" name="Population_Status" aria-describedby="emailHelp" placeholder="Enter population of animal" value="" required="true">
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
