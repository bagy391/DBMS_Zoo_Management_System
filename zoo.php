<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Zoo Management System | Zoo Detail</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<!--lightbox-->
<link rel="stylesheet" type="text/css" href="css/jquery.lightbox.css">
<script src="js/jquery.lightbox.js"></script>
<script>
  // Initiate Lightbox
  $(function() {
    $('.gallery a').lightbox();
  });
</script>
<!--lightbox-->
</head>
<body>
<?php include_once('includes/header.php');?>
		<div class="banner-header">
			<div class="container">
				<h2>Zoo Details</h2>
			</div>
			</div>
	<div class="content">
	<!--gallery-->
			<div class="gallery-section">
					<div class="container">
					<div class="welcome-grid">

				<div class="col-md-8">
					<div>
						<?php
						$anid=$_GET['anid'];

 $query=mysqli_query($con,"select * from ZOO");
 while ($row=mysqli_fetch_array($query)) {
 ?>
<table class="table text-center">
  <thead class="bg-light text-capitalize">
      <tr>
          <th>Details</th>
      </tr>
  </thead>
  <tbody>
<tr data-expanded="true">
  <td>
<h4 style="padding-top: 20px"><?php echo $row['ZName'];?>(<?php echo $row['Zid'];?>)</h4>

<strong style="padding-top: 20px">Location: <?php echo $row['Location'];?></strong><br>
<strong style="padding-top: 20px">Contact Info: <?php echo $row['Contact'];?>.</strong><br>
<strong style="padding-top: 20px">Working Hours: <?php echo $row['Hours'];?></strong><br>
</td>
</tr>
					<?php }?>
        </tbody>
        </table>
					</div>
				</div>

				<div class="clearfix"> </div>
			</div>

		</div>
	</div>
<!--gallery-->
<!--specials-->
		<?php include_once('includes/special.php');?>
			</div>
		<?php include_once('includes/footer.php');?>
</body>
</html>
