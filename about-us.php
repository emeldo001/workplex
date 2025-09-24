<!DOCTYPE html>
<html lang="zxx">

<?php
require('./mysqli_connect.php');
		// header.php

		//////////////////////Get Company Details////////////////////////

		include 'session_check.php';

		include "include/helper.php";


?>

<!-- Mirrored from themezhub.net/live-workplex/workplex/job-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Feb 2022 12:07:20 GMT -->

<head>
	<meta charset="utf-8" />
	<meta name="author" content="Themezhub" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Workplex - Creative Job Board HTML Template</title>

	<!-- Custom CSS -->
	<link href="assets/css/styles.css" rel="stylesheet">

</head>

<body>

	<!-- ============================================================== -->
	<!-- Preloader - style you can find in spinners.css -->
	<!-- ============================================================== -->
	<div class="preloader"></div>

	<!-- ============================================================== -->
	<!-- Main wrapper - style you can find in pages.scss -->
	<!-- ============================================================== -->
	<div id="main-wrapper">

		<!-- ============================================================== -->
		<!-- Top header  -->
		<!-- ============================================================== -->
		<!-- Start Navigation -->
		<?php include 'include/header.php' ?>
		<!-- End Navigation -->
		<div class="clearfix"></div>
		<!-- ============================================================== -->
		<!-- Top header  -->
		<!-- ============================================================== -->

		<!-- ======================= Top Breadcrubms ======================== -->
		<div class="gray py-3">
			<div class="container">
				<div class="row">
					<div class="colxl-12 col-lg-12 col-md-12">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item"><a href="#">Pages</a></li>
								<li class="breadcrumb-item active" aria-current="page">About Us</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<!-- ======================= Top Breadcrubms ======================== -->

		<!-- ======================= About Us Detail ======================== -->
		<section class="middle">
			<div class="container">
				<div class="row align-items-center justify-content-between">

					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
						<div class="abt_caption">
							<h2 class="ft-medium mb-4">We Have Everything You Need ?</h2>
							<p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
							<p class="mb-4">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.</p>
							<div class="form-group mt-4">
								<a href="#" class="btn theme-bg text-white">See More Info</a>
							</div>
						</div>
					</div>

					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
						<div class="abt_caption">
							<img src="assets/img/about-1.png" class="img-fluid rounded" alt="" />
						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- ======================= About Us End ======================== -->

		<!-- ======================= About Us Detail ======================== -->
		<section class="middle">
			<div class="container">
				<div class="row align-items-center justify-content-between">

					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
						<div class="abt_caption">
							<img src="assets/img/about-2.png" class="img-fluid rounded" alt="" />
						</div>
					</div>

					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
						<div class="abt_caption">
							<h2 class="ft-medium mb-4">Justin Lisiakir</h2>
							<p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
							<p class="mb-4">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.</p>
							<div class="form-group mt-4">
								<a href="#" class="btn theme-bg text-white">See More Info</a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- ======================= About Us End ======================== -->

		<?php include 'include/footer.php' ?>

		<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


	</div>
	<!-- ============================================================== -->
	<!-- End Wrapper -->
	<!-- ============================================================== -->

	<!-- ============================================================== -->
	<!-- All Jquery -->
	<!-- ============================================================== -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/slick.js"></script>
	<script src="assets/js/slider-bg.js"></script>
	<script src="assets/js/smoothproducts.js"></script>
	<script src="assets/js/snackbar.min.js"></script>
	<script src="assets/js/jQuery.style.switcher.js"></script>
	<script src="assets/js/custom.js"></script>
	<!-- ============================================================== -->
	<!-- This page plugins -->
	<!-- ============================================================== -->

</body>

<!-- Mirrored from themezhub.net/live-workplex/workplex/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Feb 2022 12:07:18 GMT -->

</html>