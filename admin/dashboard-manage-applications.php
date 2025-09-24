<!DOCTYPE html>
<html lang="zxx">

<?php require 'include/phpcode.php';


//////////////////////Get Company Details////////////////////////
if (!empty($_GET['jobid'])) {

	$JOBID = $_GET['jobid'];

	$query = "SELECT * from tbljob WHERE JOBID = '$JOBID'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);

	$COMPANYID = $row['COMPANYID'];
	$WORKPLACE_POLICY = $row['WORKPLACE_POLICY'];
	$JOBTITLE = $row['JOBTITLE'];
	$SALARY = $row['SALARY'];
	$JOBTYPE = $row['JOBTYPE'];
	$QUALIFICATION = $row['QUALIFICATION'];
	$JOBDESCRIPTION = $row['JOBDESCRIPTION'];
	$PREFEREDSEX = $row['PREFEREDSEX'];
	$CAREERLEVEL = $row['CAREERLEVEL'];
	$WORKEXPERIENCE = $row['WORKEXPERIENCE'];
	$DEADLINE = $row['DEADLINE'];
	$JOBSTATUS = $row['JOBSTATUS'];
	$DATEPOSTED = $row['DATEPOSTED'];


	$querycomp = "SELECT * from tblcompany WHERE COMPANYID = '$COMPANYID'";
	$resultcomp = mysqli_query($con, $querycomp);
	$rowcomp = mysqli_fetch_array($resultcomp);

	$COMPANYNAME = $rowcomp['COMPANYNAME'];
	$COMPANYADDRESS = $rowcomp['COMPANYADDRESS'];
	$COMPANYCOUNTRY = $rowcomp['COMPANYCOUNTRY'];
	$COMPANYCITY = $rowcomp['COMPANYCITY'];
	$COMPANYEMAIL = $rowcomp['COMPANYEMAIL'];
	$COMPANYCONTACTNO = $rowcomp['COMPANYCONTACTNO'];
	$COMPANYINDUSTRY = $rowcomp['COMPANYINDUSTRY'];
	$COMPANYSPECIALISM = $rowcomp['COMPANYSPECIALISM'];
	$COMPANYLOGO = $rowcomp['COMPANYLOGO'];
}
//////////////////////Get Company Details Ends//////////////////////


if (!empty($_GET['type'])) {
	$type = $_GET['type'];

	$jobid = $_GET['jobid'];

	if (($type == "delete")) {
		$bookmarkedid = $_GET['bookmarkedid'];
		$delete_sql = "DELETE from tblbookmarkresume where ID='$bookmarkedid'";
		mysqli_query($con, $delete_sql);

		// $delete_sql = "DELETE from tblscreening_qa where ID='$bookmarkedid'";
		// mysqli_query($con, $delete_sql); 
?>

		<script>
			// alert("Bookmarked Removed");
			// setTimeout(function() {
			window.location.href = 'dashboard-manage-applications.php';
			// }, 1000);
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
							<h1 class="ft-medium">Manage Applicants</h1>
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
									<li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="#" class="theme-cl">Manage Applicants</a></li>
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

										<?php if (empty($_GET['jobid'])) { ?>
											<div class="col-xl-3 col-lg-4 col-md-5 col-sm-12">
												<?php
												$query = "SELECT * from tbljobapplication ORDER BY ID DESC" or die(mysqli_error($con));
												$run = mysqli_query($con, $query);
												$count = 0;
												while ($row = mysqli_fetch_array($run)) {
													if ($row['APPLICATIONSTATUS'] == 'Pending') {
														$count++;
													}
												}
												if ($count > 0) { ?>
													<h6 class="mb-0 ft-medium fs-sm"><?php echo $count ?> New Applicants Found</h6>
												<?php } ?>
											</div>
										<?php } else { ?>
											<div class="col-xl-3 col-lg-4 col-md-5 col-sm-12">
												<h6 class="mb-0 ft-medium fs-sm">'<?php echo $JOBTITLE ?>' Applicants</h6>
											</div>
										<?php } ?>

										<div class="col-xl-9 col-lg-8 col-md-7 col-sm-12">
											<div class="filter_wraps elspo_wrap d-flex align-items-center justify-content-end">
												<div class="single_fitres mr-2">
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
																<option value="">Default Sorting (Highest Score)</option>
																<option value="DESC" selected="">Sort By Recent</option>
																<option value="ASC">Sort By Older</option>
															<?php } elseif ($sort == "ASC") { ?>
																<option value="">Default Sorting (Highest Score)</option>
																<option value="DESC">Sort By Recent</option>
																<option value="ASC" selected="">Sort By Older</option>
															<?php } else { ?>
																<option value="" selected="">Default Sorting (Highest Score)</option>
																<option value="DESC">Sort By Recent</option>
																<option value="ASC">Sort By Older</option>
															<?php } ?>


														</select>

													</form>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
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
							<div class="data-responsive">

								<?php

								if (empty($_GET['jobid'])) {

									if ($sort == '') {
										$query = "SELECT * from tbljobapplication ORDER BY ID DESC" or die(mysqli_error($con));
									} else {
										$query = "SELECT * from tbljobapplication ORDER BY ID $sort" or die(mysqli_error($con));
									}
								} else {
									if ($sort == '') {
										$query = "SELECT * from tbljobapplication WHERE JOBID = '$JOBID' ORDER BY SCORE DESC" or die(mysqli_error($con));
									} else {
										$query = "SELECT * from tbljobapplication WHERE JOBID = '$JOBID' ORDER BY ID $sort" or die(mysqli_error($con));
									}
								}

								// $query = "SELECT * from tbljobapplication ORDER BY ID DESC" or die(mysqli_error($con));
								$run = mysqli_query($con, $query);
								$count = 0;
								while ($row = mysqli_fetch_array($run)) {
									$count++;
									$ID = $row['ID'];
									$APPLICANTID = $row['APPLICANTID'];
									$JOBID = $row['JOBID'];
									$RESUME_FILE = $row['RESUME_FILE'];

									$APPLICATIONSTATUS = $row['APPLICATIONSTATUS'];
									$APPLICATIONDATE = $row['APPLICATIONDATE'];
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


									//////SCREENING SCORE///////
									$query_score = "SELECT * from tblscreening_score WHERE jobapp_id = '$ID'";
									$result_score = mysqli_query($con, $query_score);
									$row_score = mysqli_fetch_array($result_score);
									$score = $row_score['score'];
									$total_ques = $row_score['total_ques'];
									//////SCREENING DETAIL ENDS///////	
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


																<li><i class="lni lni-book mr-1"></i>Screening Score: <?php if ($total_ques != 0) echo $score . '/' . $total_ques ?></li>
																<li><i class="lni lni-book mr-1"></i>Score Percentage: <?php if ($total_ques != 0) echo ($score / $total_ques) * 100 . '%' ?></li>
																<li><a href="dashboard-view-application-screening.php?jopapp_id=<?php echo $ID?>" class="px-2 py-1 medium  rounded text-success"><i class="lni lni-eye mr-1"></i>View Screening</a></li>

															</ul>
														</div>
													</div>
												</div>
											</div>



											<div class="dashed-list-last">
												<div class="text-left">

													<form method="post">
														<select class="btn gray ft-medium apply-btn fs-sm rounded mr-1" name="applicationstatus" onchange="submit()">
															<option value="<?php echo $APPLICATIONSTATUS ?>" hidden>Application Status</option>
															<option>Approved</option>
															<option>Reviewed</option>
															<option>Hire</option>
															<option>Ineligible</option>
															<option>Trashed</option>
														</select>
														<!-- <a href="#" data-toggle="modal" data-target="#edit" class="btn gray ft-medium apply-btn fs-sm rounded mr-1"><i class="lni lni-arrow-right-circle mr-1"></i>Change Status</a> -->

														<!-- <a href="#" data-toggle="modal" data-target="#note" class="btn gray ft-medium apply-btn fs-sm rounded mr-1"><i class="lni lni-add-files mr-1"></i>Note</a> -->





														<!-- <a href="javascript:void(0);" class="btn gray ft-medium apply-btn fs-sm rounded mr-1" onclick="notice()" id="shownote"><i class="lni lni-add-files mr-1"></i>Note</a> -->





														<!-- <a href="javascript:void(0);" class="btn gray ft-medium apply-btn fs-sm rounded mr-1" onclick="unsetnote()" id="hidenote"><i class="lni lni-add-files mr-1"></i>X</a> -->

														<input type="hidden" name="jobID" value="<?php echo $JOBID ?>">
														<input type="hidden" name="userID" value="<?php echo $session_id ?>">
														<input type="hidden" name="jobapplicationid" value="<?php echo $ID ?>">

														<?php
														$cn_save = 0;
														$query_bk = "SELECT * from tblbookmarkresume where USERID = '$session_id' and JOBAPPLICATIONID = '$ID' ORDER BY ID DESC" or die(mysqli_error($con));

														$run_bk = mysqli_query($con, $query_bk);
														$cn_save = mysqli_num_rows($run_bk);
														$row_bk = mysqli_fetch_array($run_bk);


														$bk_ID = $row_bk['ID'];

														if ($cn_save > 0) { ?>

															<a href="?type=delete&bookmarkedid=<?php echo $bk_ID ?>&jobid=<?php echo $JOBID ?>" class="btn gray ft-medium apply-btn fs-sm rounded text-warning"><i class="lni lni-heart mr-1"></i>Saved</a>

														<?php } else { ?>
															<button type="submit" name="save_resume" class="btn gray ft-medium apply-btn fs-sm rounded"><i class="lni lni-heart mr-1"></i>Save</button>
														<?php } ?>

														<a href="dashboard-candidate-detail.php?applicantid=<?php echo $APPLICANTID ?>&jobapplicationid=<?php echo $ID ?>" class="btn gray ft-medium apply-btn fs-sm rounded"><i class="lni lni-eye mr-1"></i> Candidate</a>
													</form>



													<style>
														#msg,
														#note,
														#hidenote,
														#hidemsg {
															display: none;
															/* visibility: hidden; */
														}
													</style>

													<!-- onclick="unset()"> -->
													<script>
														function message() {
															document.getElementById("msg").style.display = "block";
															document.getElementById("note").style.display = "none";

															document.getElementById("hidemsg").style.display = "block";
															document.getElementById("showmsg").style.display = "none";


														}

														function notice() {
															document.getElementById("note").style.display = "block";
															document.getElementById("msg").style.display = "none";

															document.getElementById("hidenote").style.display = "block";
															document.getElementById("shownote").style.display = "none";

														}

														function unsetmsg() {
															document.getElementById("msg").style.display = "none";

															document.getElementById("hidemsg").style.display = "none";
															document.getElementById("showmsg").style.display = "block";

														}

														function unsetnote() {
															document.getElementById("note").style.display = "none";

															document.getElementById("hidenote").style.display = "none";
															document.getElementById("shownote").style.display = "block";
														}
													</script>

													<div class="modal-body p-5" id="msg">
														<form method="post">
															<input type="hidden" name="userID" value="<?php echo $APPLICANTID ?>">
															<div class="form-group">
																<textarea class="ht-200 form-control" placeholder="Type Your Message..." name="message"></textarea>
															</div>

															<div class="form-group">
																<button type="submit" name="send_msg" class="btn btn-md full-width theme-bg text-light fs-md ft-medium">Send Message</button>
															</div>
														</form>
													</div>

													<div class="modal-body p-5" id="note">
														<form method="post">
															<input type="hidden" name="jobID" value="<?php echo $JOBID ?>">
															<input type="hidden" name="userID" value="<?php echo $APPLICANTID ?>">
															<input type="hidden" name="jobapplicationid" value="<?php echo $ID ?>">
															<div class="form-group">
																<textarea class="ht-200 form-control" placeholder="Type Your Message..." name="notice"></textarea>
															</div>

															<div class="form-group">
																<button type="submit" name="send_note" class="btn btn-md full-width theme-bg text-light fs-md ft-medium">Save Note</button>
															</div>
														</form>
													</div>


												</div>
											</div>
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

							</div>
						</div>
					<?php }
								if ($count < 1) { ?>
						<p class="text-center"><i>No Application Yet...</i></p>
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
	<div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="messagemodal" aria-hidden="true">
		<div class="modal-dialog modal-xl login-pop-form" role="document">
			<div class="modal-content" id="messagemodal">
				<div class="modal-headers">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="ti-close"></span>
					</button>
				</div>

				<div class="modal-body p-5">
					<div class="text-center mb-4">
						<h2 class="m-0 ft-regular">Drop Your Message</h2>
					</div>

					<form>
						<div class="form-group">
							<textarea class="ht-200 form-control" placeholder="Type Your Message..."></textarea>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-md full-width theme-bg text-light fs-md ft-medium">Send Message</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Modal -->

	<!-- Applications Edit Modal -->
	<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="appeditmodal" aria-hidden="true">
		<div class="modal-dialog modal-xl login-pop-form" role="document">
			<div class="modal-content" id="appeditmodal">
				<div class="modal-headers">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="ti-close"></span>
					</button>
				</div>

				<div class="modal-body p-5">
					<div class="text-center mb-4">
						<h2 class="m-0 ft-regular">Edit Candidate Status</h2>
					</div>

					<form>
						<div class="form-group">
							<select class="form-control rounded">
								<option>Application Status</option>
								<option>Active New</option>
								<option>Interviewd</option>
								<option>Hires</option>
								<option>Trashed</option>
							</select>
						</div>
						<div class="form-group">
							<input type="number" class="form-control" placeholder="Rate out of 5" />
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-md full-width theme-bg text-light fs-md ft-medium">Save Status</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Modal -->

	<!-- Add Note Modal -->
	<div class="modal fade" id="note" tabindex="-1" role="dialog" aria-labelledby="nonemodal" aria-hidden="true">
		<div class="modal-dialog modal-xl login-pop-form" role="document">
			<div class="modal-content" id="nonemodal">
				<div class="modal-headers">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="ti-close"></span>
					</button>
				</div>

				<div class="modal-body p-5">
					<div class="text-center mb-4">
						<h2 class="m-0 ft-regular">Add A note</h2>
					</div>

					<form>
						<div class="form-group">
							<textarea class="ht-200 form-control" placeholder="Type Your Message..."></textarea>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-md full-width theme-bg text-light fs-md ft-medium">Save Note</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
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

<!-- Mirrored from themezhub.net/live-workplex/workplex/dashboard-manage-applications.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Feb 2022 12:08:07 GMT -->

</html>