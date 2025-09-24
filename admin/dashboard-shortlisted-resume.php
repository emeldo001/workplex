<!DOCTYPE html>
<html lang="zxx">


<?php require 'include/phpcode.php';

if (!empty($_GET['type'])) {
	$type = $_GET['type'];

	// $jobid = $_GET['jobid'];

	if (($type == "delete")) {
		$bookmarkedid = $_GET['bookmarkedid'];
		$delete_sql = "DELETE from tblbookmarkresume where ID='$bookmarkedid'";
		mysqli_query($con, $delete_sql);

		// $delete_sql = "DELETE from tblscreening_qa where ID='$bookmarkedid'";
		// mysqli_query($con, $delete_sql); 
?>

		<script>
			// alert("Bookmarked Job Removed");
			// setTimeout(function() {
			// 	window.location.href = 'job-detail.php?jobid=<?php echo $jobid ?>';
			// }, 3000);
		</script>
<?php
	}
}
?>
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
							<h1 class="ft-medium">Shortlisted Resume</h1>
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
									<li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="#" class="theme-cl">Shortlisted Resume</a></li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="dashboard-widg-bar d-block">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12">

							<div class="px-3 py-2 br-bottom br-top bg-white rounded mb-3">
								<div class="flixors">
									<div class="row align-items-center justify-content-between">
										<div class="col-xl-3 col-lg-4 col-md-5 col-sm-12">
											<?php
											$query = "SELECT * from tblbookmarkresume WHERE USERID = '$session_id' ORDER BY ID DESC" or die(mysqli_error($con));
											$run = mysqli_query($con, $query);
											$count = mysqli_num_rows($run);
											if ($count > 0) { ?>
												<h6 class="mb-0 ft-medium fs-sm"><?php echo $count ?> Shortlisted Resume</h6>
											<?php } ?>
										</div>

										<form method="post">
											<?php
											$sort = '';
											if (isset($_POST['sort'])) {
												$sort = $_POST['sort'];
											}

											?>
											<select class="custom-select simple" onchange="submit()" name="sort">
												<?php
												if ($sort == "DESC") { ?>
													<option value="">Default Sorting</option>
													<option value="DESC" selected="">Sort By Recent</option>
													<option value="ASC">Sort By Older</option>
												<?php } elseif ($sort == "ASC") { ?>
													<option value="">Default Sorting</option>
													<option value="DESC">Sort By Recent</option>
													<option value="ASC" selected="">Sort By Older</option>
												<?php } else { ?>
													<option value="" selected="">Default Sorting</option>
													<option value="DESC">Sort By Recent</option>
													<option value="ASC">Sort By Older</option>
												<?php } ?>


											</select>

										</form>
									</div>

								</div>
							</div>

							<div class="data-responsive">

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

								if (empty($_GET['jobid'])) {

									if ($sort == '') {
										$query = "SELECT * from tblbookmarkresume WHERE USERID = '$session_id' ORDER BY ID DESC" or die(mysqli_error($con));
									} else {
										$query = "SELECT * from tblbookmarkresume WHERE USERID = '$session_id' ORDER BY ID $sort" or die(mysqli_error($con));
									}
								} else {
									$JOBID = $_GET['jobid'];
									if ($sort == '') {
										$query = "SELECT * from tblbookmarkresume WHERE USERID = '$session_id' and JOBRESUMEID = '$JOBID' ORDER BY ID DESC" or die(mysqli_error($con));
									} else {
										$query = "SELECT * from tblbookmarkresume WHERE USERID = '$session_id' and JOBRESUMEID = '$JOBID' ORDER BY ID $sort" or die(mysqli_error($con));
									}
								}

								$run = mysqli_query($con, $query);
								$count = 0;
								while ($row = mysqli_fetch_array($run)) {
									$count++;

									$USERID = $row['USERID'];
									$JOBID = $row['JOBRESUMEID'];
									$DATETIME = $row['DATETIME'];
									$JOBAPPLICATIONID = $row['JOBAPPLICATIONID'];


									$queryapplication = "SELECT * from tbljobapplication WHERE ID = '$JOBAPPLICATIONID'";
									$resultapplication = mysqli_query($con, $queryapplication);
									$rowapplication = mysqli_fetch_array($resultapplication);
									$ID = $rowapplication['ID'];

									$APPLICANTID = $rowapplication['APPLICANTID'];

									$APPLICATIONSTATUS = $rowapplication['APPLICATIONSTATUS'];
									$APPLICATIONDATE = $rowapplication['APPLICATIONDATE'];

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

									//////JOB DETAIL///////
									$queryjob = "SELECT * from tbljob WHERE JOBID = '$JOBID'";
									$resultjob = mysqli_query($con, $queryjob);
									$rowjob = mysqli_fetch_array($resultjob);
									$JOBTITLE = $rowjob['JOBTITLE'];
									$DATEPOSTED = $rowjob['DATEPOSTED'];
									//////JOB DETAIL ENDS///////	


									$queryapplication = "SELECT * from tbljobapplication WHERE JOBID = '$JOBID'";
									$resultapplication = mysqli_query($con, $queryapplication);
									$rowapplication = mysqli_fetch_array($resultapplication);
									$RESUME_FILE = $rowapplication['RESUME_FILE'];

								?>

									<!-- Single List -->
									<div class="dashed-list-wrap bg-white rounded mb-3">
										<div class="dashed-list-full bg-white rounded p-3 mb-3">
											<div class="dashed-list-short d-flex align-items-center">
												<div class="dashed-list-short-first">
													<div class="dashed-avater">
														<img src="../<?php echo $APPLICANTPHOTO ?>" class="img-fluid circle" width="70" alt="" />
													</div>
												</div>
												<div class="dashed-list-short-last">
													<div class="cats-box-caption px-2">
														<h4 class="fs-lg mb-0 ft-medium theme-cl"><?php echo $FNAME . ' ' . $OTHERNAMES ?></h4>
														<div class="d-block mb-2 position-relative">
															<span><i class="lni lni-map-marker mr-1"></i> <?php echo $CITY ?>, <?php echo $COUNTRY ?></span>
															<span class="ml-2"><i class="lni lni-briefcase mr-1"></i><?php echo $JOBTITLE ?></span>
														</div>
														<div class="ico-content">
															<ul>
																<?php if ($APPLICATIONSTATUS == "Pending") { ?>
																	<li><span class="px-2 py-1 medium bg-light-success rounded text-warning"><i class="fa fa-minus mr-1"></i> <?php echo $APPLICATIONSTATUS ?></span></li>
																<?php } elseif ($APPLICATIONSTATUS == "Approved") { ?>
																	<li><span class="px-2 py-1 medium bg-light-success rounded text-info"><i class="fa fa-check mr-1"></i> <?php echo $APPLICATIONSTATUS ?></span></li>
																<?php } elseif ($APPLICATIONSTATUS == "Reviewed") { ?>
																	<li><span class="px-2 py-1 medium bg-light-success rounded text-secondary"><i class="fa fa-briefcase mr-1"></i> <?php echo $APPLICATIONSTATUS ?></span></li>
																<?php } elseif ($APPLICATIONSTATUS == "Hire") { ?>
																	<li><span class="px-2 py-1 medium bg-light-success rounded text-success"><i class="fa fa-check-circle mr-1"></i> <?php echo $APPLICATIONSTATUS ?></span></li>
																<?php } else { ?>
																	<li><span class="px-2 py-1 medium bg-light-success rounded text-danger"><i class="fa fa-times mr-1"></i> <?php echo $APPLICATIONSTATUS ?></span></li>
																<?php } ?>

																<li>
																	<form method="post">
																		<input type="hidden" name="resume_url" value="<?php echo $RESUME_FILE ?>">
																		<button type="submit" name="download_resume" class="px-2 py-1 medium bg-light-success rounded text-success" style="border: none;" onclick="return confirm('You are about to download <?php echo $FNAME ?> Remsume/CV?');"><i class="lni lni-download mr-1"></i>Download CV</button>
																	</form>

																</li>

																<!-- <li><a href="#" data-toggle="modal" data-target="#message" class="px-2 py-1 medium bg-light-info rounded text-info"><i class="lni lni-envelope mr-1"></i>Message</a></li> -->

																<li><a href="javascript:void(0);" class="px-2 py-1 medium bg-light-info rounded text-info" onclick="message()" id="showmsg"><i class="lni lni-envelope mr-1"></i>Message</a></li>

																<li><a href="javascript:void(0);" class="px-2 py-1 medium bg-light-info rounded text-info" onclick="unsetmsg()" id="hidemsg"><i class="lni lni-envelope mr-1"></i>X</a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
											<div class="dashed-list-last">
												<div class="dash-action">


													<form method="post">


														<input type="hidden" name="jobID" value="<?php echo $JOBID ?>">
														<input type="hidden" name="userID" value="<?php echo $session_id ?>">
														<input type="hidden" name="jobapplicationid" value="<?php echo $ID ?>">

														<!-- <button name="applicationapprove" onchange="submit()" class="p-2 circle text-success bg-light-success d-inline-flex align-items-center justify-content-center" title="Approved" style="border: none;"><i class="lni lni-checkmark"></i></button> -->

														<select class="btn gray ft-medium apply-btn fs-sm rounded mr-1" name="applicationstatus" onchange="submit()">
															<option value="<?php echo $APPLICATIONSTATUS ?>" hidden>Application Status</option>
															<option>Approved</option>
															<option>Reviewed</option>
															<option>Hire</option>
															<option>Ineligible</option>
															<option>Trashed</option>
														</select>

														<a href="dashboard-candidate-detail.php?applicantid=<?php echo $APPLICANTID ?>&jobapplicationid=<?php echo $ID ?>" class=" p-2 circle text-info bg-light-info d-inline-flex align-items-center justify-content-center mr-1"><i class="lni lni-eye"></i></a>


														<a href="?type=delete&bookmarkedid=<?php echo $row['ID'] ?>" class=" p-2 circle text-danger bg-light-danger d-inline-flex align-items-center justify-content-center ml-1"><i class="lni lni-trash-can"></i></a>
													</form>


												</div>
											</div>
										</div>


										<style>
											#msg,
											#hidemsg {
												display: none;
												/* visibility: hidden; */
											}
										</style>

										<!-- onclick="unset()"> -->
										<script>
											function message() {
												document.getElementById("msg").style.display = "block";
												document.getElementById("hidemsg").style.display = "block";
												document.getElementById("showmsg").style.display = "none";

											}

											function unsetmsg() {
												document.getElementById("msg").style.display = "none";
												document.getElementById("hidemsg").style.display = "none";
												document.getElementById("showmsg").style.display = "block";

											}
										</script>

										<div class="modal-body p-5" id="msg">
											<form>
												<div class="form-group">
													<textarea class="ht-200 form-control" placeholder="Type Your Message..."></textarea>
												</div>

												<div class="form-group">
													<button type="submit" class="btn btn-md full-width theme-bg text-light fs-md ft-medium">Send Message</button>
												</div>
											</form>
										</div>


										<div class="dashed-list-footer p-3 br-top">
											<div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star"></i>
											</div>
											<div class="ico-content">
												<ul>
													<li><span><i class="lni lni-calendar mr-1"></i><?php echo $DATEPOSTED ?></span></li>
													<li><span><i class="lni lni-add-files mr-1"></i><?php echo timeago($DATEPOSTED) ?></span></li>
												</ul>
											</div>
										</div>
									</div>

								<?php }
								if ($count < 1) { ?>
									<p class="text-center"><i>No Saved Application/Resume Yet...</i></p>
								<?php } ?>

							</div>
						</div>
					</div>

				</div>

				<!-- footer -->
				<?php include 'footer.php' ?>

			</div>

		</div>
		<!-- ======================= dashboard Detail End ======================== -->

		<!-- Message Modal -->


		<!-- End Modal -->

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

<!-- Mirrored from themezhub.net/live-workplex/workplex/dashboard-shortlisted-resume.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Feb 2022 12:08:08 GMT -->

</html>