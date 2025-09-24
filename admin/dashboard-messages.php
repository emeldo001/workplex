<!DOCTYPE html>
<html lang="zxx">


<?php require 'include/phpcode.php'; ?>
<!-- Mirrored from themezhub.net/live-workplex/workplex/dashboard-post-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Feb 2022 12:07:20 GMT -->

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
		<?php include 'header.php' ?>
		<!-- End Navigation -->
		<div class="clearfix"></div>
		<!-- ============================================================== -->
		<!-- Top header  -->
		<!-- ============================================================== -->

		<!-- ======================= dashboard Detail ======================== -->

		<div class="dashboard-wrap bg-light">
			<a class="mobNavigation" data-toggle="collapse" href="#MobNav" role="button" aria-expanded="false" aria-controls="MobNav">
				<i class="fas fa-bars mr-2"></i>Dashboard Navigation
			</a>

			<?php include 'sidenav.php' ?>

			<div class="dashboard-content">
				<div class="dashboard-tlbar d-block mb-5">
					<div class="row">
						<div class="colxl-12 col-lg-12 col-md-12">
							<h1 class="ft-medium">Messages</h1>
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
									<li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="#" class="theme-cl">Messages</a></li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="dashboard-widg-bar d-block">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12">
							<div class="_dashboard_content bg-white rounded mb-4">

								<div class="_dashboard_content_body">
									<!-- Convershion -->
									<div class="messages-container margin-top-0">
										<div class="messages-headline">

											<?php
											if (!empty($_GET['messageid'])) {

												$FEEDID = $_GET['messageid'];
												
												$queryapp = "SELECT * from tblfeedback WHERE APPLICANTID = '$FEEDID' order by FEEDBACKID DESC";
												$resultapp = mysqli_query($con, $queryapp);
												$rowapp = mysqli_fetch_array($resultapp);
												$APPLICANTID = $rowapp['APPLICANTID'];

												$query = "UPDATE tblfeedback SET STATUS = 'Read' WHERE APPLICANTID = '$FEEDID' and SENTBY = '$FEEDID'";
												$result = mysqli_query($con, $query);


												//////APPLICANT DETAIL///////
												$queryapp = "SELECT * from tblapplicants WHERE USERID = '$APPLICANTID'";
												$resultapp = mysqli_query($con, $queryapp);
												$rowapp = mysqli_fetch_array($resultapp);
												$APPLICANTPHOTO = $rowapp['APPLICANTPHOTO'];
												$FNAME = $rowapp['FNAME'];
												$OTHERNAMES = $rowapp['OTHERNAMES'];
											?>
												<h4><?php echo implode(' ', array_slice(explode(' ', $FNAME . ' ' . $OTHERNAMES), 0, 2)) ?></h4>
											<?php } ?>

										</div>

										<div class="messages-container-inner">

											<!-- Messages -->
											<div class="dash-msg-inbox">
												<ul>
													<?php

													function timeago($date)
													{
														$timestamp = strtotime($date);

														$strTime = array("second", "minute", "hour", "day", "month", "year");
														$length = array("60", "60", "24", "30", "12", "10");

														$currentTime = time();
														if ($currentTime >= $timestamp) {
															$diff     = time() - $timestamp;
															for ($i = 0; $diff >= $length[$i] && $i < count($length) - 1; $i++) {
																$diff = $diff / $length[$i];
															}

															$diff = round($diff);
															return $diff . " " . $strTime[$i] . "(s) ago ";
														}
													}

													// $strTimeAgo = timeago($row["trans_date"]);

													?>
													<?php
													$query = "SELECT * from tblfeedback where SENTBY !='$session_id' ORDER BY FEEDBACKID DESC" or die(mysqli_error($con));
													$run = mysqli_query($con, $query);
													$count = 0;
													while ($row = mysqli_fetch_array($run)) {
														$count++;
														$ID = $row['FEEDBACKID'];
														$APPLICANTID = $row['APPLICANTID'];
														$FEEDBACK = $row['FEEDBACK'];
														$DATETIME = $row['DATETIME'];

														$STATUS = $row['STATUS'];
														$ADMINID = $row['ADMINID'];

														//////APPLICANT DETAIL///////
														$queryapp = "SELECT * from tblapplicants WHERE USERID = '$APPLICANTID'";
														$resultapp = mysqli_query($con, $queryapp);
														$rowapp = mysqli_fetch_array($resultapp);
														$APPLICANTPHOTO = $rowapp['APPLICANTPHOTO'];
														$FNAME = $rowapp['FNAME'];
														$OTHERNAMES = $rowapp['OTHERNAMES'];
														$COUNTRY = $rowapp['COUNTRY'];
														$CITY = $rowapp['CITY'];
														//////APPLICANT DETAIL ENDS///////	


													?>
														<li>
															<a href="?messageid=<?php echo $APPLICANTID ?>">
																<div class="dash-msg-avatar"><img src="../<?php echo $APPLICANTPHOTO ?>" alt=""><span class="_user_status online"></span></div>

																<div class="message-by">
																	<div class="message-by-headline">
																		<h5><?php echo implode(' ', array_slice(explode(' ', $FNAME . ' ' . $OTHERNAMES), 0, 2)) ?></h5>

																		<span><?php echo timeago($DATETIME) ?></span>
																	</div>
																	<p><?php echo substr($FEEDBACK, 0, 35) ?> </p>
																</div>
															</a>
														</li>

													<?php } ?>

													<!-- <li class="active-message">
														<a href="#">
															<div class="dash-msg-avatar"><img src="assets/img/team-2.jpg" alt=""><span class="_user_status offline"></span></div>

															<div class="message-by">
																<div class="message-by-headline">
																	<h5>George Howarth</h5>
																	<span>2 hours ago</span>
																</div>
																<p>Hello, I am a web designer with 5 year..</p>
															</div>
														</a>
													</li> -->

												</ul>
											</div>
											<!-- Messages / End -->

											<?php if (!empty($_GET['messageid'])) {
													$messageid = $_GET['messageid'];
												?>
												<!-- Message Content -->
												
												<div class="dash-msg-content">


													<?php
													$query = "SELECT * from tblfeedback where APPLICANTID = '$messageid' ORDER BY FEEDBACKID DESC" or die(mysqli_error($con));
													$run = mysqli_query($con, $query);
													$count = 0;
													while ($row = mysqli_fetch_array($run)) {
														$count++;
														$ID = $row['FEEDBACKID'];
														$APPLICANTID = $row['APPLICANTID'];
														$FEEDBACK = $row['FEEDBACK'];
														$DATETIME = $row['DATETIME'];

														$STATUS = $row['STATUS'];
														$ADMINID = $row['ADMINID'];
														$SENTBY = $row['SENTBY'];


														//////APPLICANT DETAIL///////
														$queryapp = "SELECT * from tblapplicants WHERE USERID = '$APPLICANTID'";
														$resultapp = mysqli_query($con, $queryapp);
														$rowapp = mysqli_fetch_array($resultapp);
														$APPLICANTPHOTO = $rowapp['APPLICANTPHOTO'];
														$FNAME = $rowapp['FNAME'];
														$OTHERNAMES = $rowapp['OTHERNAMES'];
														$COUNTRY = $rowapp['COUNTRY'];
														$CITY = $rowapp['CITY'];
														//////APPLICANT DETAIL ENDS///////	

														if ($SENTBY == $session_id) {

													?>

															<div class="message-plunch me">
																<div class="dash-msg-avatar">
																	<span class="mr-2 mb-2 d-inline-flex px-2 py-1 rounded theme-cl theme-bg-light text-warning">:Me</span>
																	<!-- <img src="../<?php echo $APPLICANTPHOTO ?>" alt=""> -->
																</div>
																<div class="dash-msg-text">
																	<p><?php echo $FEEDBACK ?></p>
																</div>
															</div>

														<?php } else { ?>



															<div class="message-plunch">
																<div class="dash-msg-avatar"><img src="../<?php echo $APPLICANTPHOTO ?>" alt=""></div>
																<div class="dash-msg-text">
																	<p><?php echo $FEEDBACK ?></p>
																</div>
															</div>

													<?php }
													} ?>




													<!-- Reply Area -->
													<div class="clearfix"></div>
													<form method="post">
														<div class="message-reply">
															<input type="hidden" name="userID" value="<?php echo $APPLICANTID ?>">
															<textarea cols="40" rows="3" class="form-control with-light" placeholder="Your Message" name="message"></textarea>
															<button type="submit" name="send_msg" class="btn theme-bg text-white">Send Message</button>
														</div>
													</form>



												</div>
												<!-- Message Content -->
											<?php } else { ?>
												<h6 class="m-5 text-center"><i>Select Message to Display...</i></h6>
											<?php } ?>

										</div>

									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

				<!-- footer -->
				<?php include 'footer.php' ?>

			</div>

		</div>
		<!-- ======================= dashboard Detail End ======================== -->


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

<!-- Mirrored from themezhub.net/live-workplex/workplex/dashboard-messages.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Feb 2022 12:08:07 GMT -->

</html>