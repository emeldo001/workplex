<div class="header header-light dark-text">
	<div class="container">
		<nav id="navigation" class="navigation navigation-landscape">
			<div class="nav-header">
				<a class="nav-brand" href="#">
					<img src="assets/img/logo.png" class="logo" alt="" />
				</a>
				<div class="nav-toggle"></div>

				<?php
				// session_start();

				if (isset($_SESSION["userID"]) and (trim($_SESSION["userID"] != ""))) {
					$session_id = $_SESSION["userID"]; ?>

					<div class="mobile_nav">
						<ul>
							<li>
								<a href="dashboard/" class="theme-cl fs-lg">
									<i class="lni lni-user"></i>
								</a>
							</li>
							<li>
								<a href="job-search-v1.php" class="crs_yuo12 w-auto text-white theme-bg">
									<span class="embos_45"><i class="fas fa-plus-circle mr-1 mr-1"></i>Apply Job</span>
								</a>
							</li>
						</ul>
					</div>

				<?php } else { ?>
					<div class="mobile_nav">
						<ul>
							<li>
								<a href="#" data-toggle="modal" data-target="#login" class="theme-cl fs-lg">
									<i class="lni lni-user"></i>
								</a>
							</li>
							<li>
								<a href="javascript:void(0);" data-toggle="modal" data-target="#login" class="crs_yuo12 w-auto text-white theme-bg">
									<span class="embos_45"><i class="fas fa-plus-circle mr-1 mr-1"></i>Apply Job</span>
								</a>
							</li>
						</ul>
					</div>
				<?php }
				?>

			</div>
			<div class="nav-menus-wrapper" style="transition-property: none;">
				<ul class="nav-menu">

					<li><a href="./">Home</a>
						<!-- <ul class="nav-dropdown nav-submenu">
										<li><a href="index-2">Home 1</a></li>
										<li><a href="home-2">Home 2</a></li>
										<li><a href="home-3">Home 3</a></li>
										<li><a href="home-4">Home 4</a></li>
										<li><a href="home-5">Home 5</a></li>
										<li><a href="home-6">Home 6</a></li>
										<li><a href="home-7">Home 7</a></li>
										<li><a href="home-8">Home 8</a></li>
									</ul> -->
					</li>

					<li>
						<a href="job-list-v1.php">Find Job</a>
						<!-- <a href="javascript:void(0);">Find Job</a> 
	                        <ul class="nav-dropdown nav-submenu">
										<li><a href="job-search-v1">Job Search V1</a></li>
										<li><a href="job-search-v2">Job Search V2</a></li>
										<li><a href="job-search-v3">Job Search V3</a></li>
										<li><a href="job-list-v1">Job Search V4</a></li>
										<li><a href="job-list-v2">Job Search V5</a></li>
										<li><a href="job-list-v3">Job Search V6</a></li>
										<li><a href="javascript:void(0);">Map Styles</a>
											<ul class="nav-dropdown nav-submenu">
												<li><a href="job-half-map">Search On Map V1</a></li>
												<li><a href="job-half-map-v2">Search On Map V2</a></li>
												<li><a href="job-search-map-v1">Search On Map V3</a></li>
												<li><a href="job-search-map-v2">Search On Map V4</a></li>
											</ul>
										</li>
										<li><a href="javascript:void(0);">Single Job</a>
											<ul class="nav-dropdown nav-submenu">
												<li><a href="single-job-1">Single Job V1</a></li>
												<li><a href="single-job-2">Single Job V2</a></li>
												<li><a href="single-job-3">Single Job V3</a></li>
												<li><a href="single-job-4">Single Job V4</a></li>
											</ul>
										</li>
									</ul> -->
					</li>

					<!--<li>
                    <a href="javascript:void(0);">Candidates</a>
	                  <ul class="nav-dropdown nav-submenu">
	                     <li><a href="browse-jobs">Browse Jobs</a></li>
	                     <li><a href="browse-resumes">Browse Resumes</a></li>
	                     <li><a href="browse-category">Browse Categories</a></li>
	                     <li><a href="candidate-detail">Candidate Detail</a></li>
	                     <li><a href="candidate-dashboard">Candidate Dashboard</a></li>
	                  </ul> 
	               </li>-->

					<li>
						<a href="browse-employers.php">Employers</a>

					</li>

					<li>
						<a href="about-us.php">About Us</a>
						<!-- <a href="javascript:void(0);">Pages</a>
	                  <ul class="nav-dropdown nav-submenu">
	                     <li><a href="blog">Blog Style</a></li>
	                     <li><a href="about-us">About Us</a></li>
	                     <li><a href="contact">Contact</a></li>
	                     <li><a href="404">404 Page</a></li>
	                     <li><a href="privacy">Privacy Policy</a></li>
	                     <li><a href="faq">FAQs</a></li>
	                     <li><a href="docs">Docs</a></li>
	                  </ul> -->
					</li>

					<li>
						<a href="contact.php">Contact</a>
					</li>

				</ul>

				<ul class="nav-menu nav-menu-social align-to-right">

					<?php
					// session_start();

					if (isset($_SESSION["userID"]) and (trim($_SESSION["userID"] != ""))) {
						$session_id = $_SESSION["userID"]; ?>

						<li>
							<a href="./dashboard" class="ft-medium">
								<i class="lni lni-dashboard mr-1"></i> Dashboard
							</a>
						</li>

						<li class="add-listing gray">
							<a href="logout.php">
								<i class="lni lni-power-switch mr-1"></i> Logout
							</a>
						</li>
						<li class="add-listing theme-bg">

							<a href="./job-list-v1.php">
								<i class="lni lni-circle-plus mr-1"></i> Apply a Job
							</a>




						</li>

					<?php } else { ?>
						<li>
							<a href="#" data-toggle="modal" data-target="#login" class="ft-medium">
								<i class="lni lni-user mr-2"></i>Sign In
							</a>
						</li>
						<li class="add-listing theme-bg">

							<a href="./login.php">
								<i class="lni lni-circle-plus mr-1"></i> Apply a Job
							</a>




						</li>
					<?php }
					?>



				</ul>
			</div>
		</nav>
	</div>
</div>