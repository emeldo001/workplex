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
         alert("Bookmarked Removed");
         // setTimeout(function() {
         window.location.href = 'dashboard-manage-applications.php';
         // }, 1000);
      </script>
   <?php
   }
}




if (!empty($_GET['jopapp_id'])) {
   $ID = $_GET['jopapp_id'];
} else {
   ?>
   <script>
      location.href = "./dashboard-manage-applications.php";
   </script>

<?php
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

                              <?php
                              //////SCREENING SCORE///////
                              $query_score = "SELECT * from tblscreening_score WHERE jobapp_id = '$ID'";
                              $result_score = mysqli_query($con, $query_score);
                              $row_score = mysqli_fetch_array($result_score);
                              $score = $row_score['score'];
                              $total_ques = $row_score['total_ques'];
                              //////SCREENING DETAIL ENDS///////	
                              ?>
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                 <h6 class="mb-0 ft-medium fs-sm">Screening Score:
                                    <span class="muted-text px-2 py-1 medium bg-light-info rounded text-info"><i class="lni lni-book mr-1"></i><?php if ($total_ques != 0) echo $score . ' out of ' . $total_ques ?></span>
                                 </h6>
                              </div>

                           </div>

                        </div>
                     </div>

                     <div class="data-responsive">

                        <?php

                        $queryjobapp = "SELECT * from tbljobapplication where ID = '$ID'   order by id desc";
                        $resultjobapp = mysqli_query($con, $queryjobapp);
                        $row = mysqli_fetch_array($resultjobapp);
                        $jobapp_id = $row['ID'];

                        $count = 0;

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

                           <div class="modal-dialog modal-lg">
                              <div class="modal-content">


                                 <div class="modal-body p-5">

                                    <div class="col-12 col-md-12 col-12 text-center miliods">

                                       <div class="d-block border rounded mfliud-bot mb-4">
                                          <h4 class="ft-medium fs-md mt-2 mb-0 mr-2 mb-2 d-inline-flex px-2 py-1 rounded theme-cl theme-bg-light">Application Review </h4>
                                          <div class="cdt_author px-2 pt-4 pb-4">
                                             <div class="dash_auth_thumb circle p-1 border d-inline-flex mx-auto mb-2">
                                                <img src="../<?php echo $APPLICANTPHOTO ?>" class="img-fluid circle" width="100" alt="" />
                                             </div>
                                             <div class="dash_caption mb-3">
                                                <h4 class="fs-lg ft-medium mb-0 lh-1"><?php echo $FNAME . ' ' . $OTHERNAMES ?></h4>
                                                <div class="jb-list-01-title px-2">
                                                   <span class="px-2 mb-2 d-inline-flex py-1 rounded text-purple bg-light-purple">0<?php echo $APPLICANTID ?></span>
                                                </div>
                                                <p class="m-0 p-0"><?php echo $JOBTITLE ?></p>
                                                <span class="text-muted smalls"><i class="lni lni-map-marker mr-1"></i> <?php echo $CITY ?>, <?php echo $COUNTRY ?></span>
                                             </div>

                                          </div>

                                       </div>

                                    </div>



                                    <!-- <form method="post"> -->
                                    <?php
                                    // $sql = "SELECT * from tbljobscreening_ques where job_id ='$JOBID'  ORDER BY id DESC";
                                    // $runjob = mysqli_query($con, $sql);
                                    // $c = mysqli_num_rows($runjob);
                                    // if ($c > 0) {
                                    ?>
                                    <div class="jbd-details mb-3">
                                       <h5>Screening Questions:</h5>
                                       <div class="position-relative row">
                                          <div class="col-lg-12 col-md-12 col-12">

                                             <?php
                                             $a = 'disabled';
                                             $b = 'disabled';
                                             $c = 'disabled';
                                             $d = 'disabled';
                                             $e = 'disabled';
                                             /////

                                             $count = 0;
                                             $sql = "SELECT * from tblscreening_qa where JOBAPPLICATION_ID ='$ID'  ORDER BY id ASC";
                                             $runques = mysqli_query($con, $sql);
                                             while ($rowques = mysqli_fetch_array($runques)) {
                                                $QUESTION_ID = $rowques['QUESTION_ID'];
                                                $APPLICANT_ANSWER = $rowques['APPLICANT_ANSWER'];


                                                if ($APPLICANT_ANSWER == "A") {
                                                   $a .= ' checked';
                                                } elseif ($APPLICANT_ANSWER == "B") {
                                                   $b .= ' checked';
                                                } elseif ($APPLICANT_ANSWER == "C") {
                                                   $c .= ' checked';
                                                } elseif ($APPLICANT_ANSWER == "D") {
                                                   $d .= ' checked';
                                                } elseif ($APPLICANT_ANSWER == "E") {
                                                   $e .= ' checked';
                                                }



                                                $query = "SELECT * from tblscreening where id = '$QUESTION_ID' ORDER BY id DESC" or die(mysqli_error($con));
                                                $run = mysqli_query($con, $query);
                                               
                                                while ($row = mysqli_fetch_array($run)) {
                                                   $count++;
                                                   // $jobque_id[] = $row['id'];

                                                   $ideal_ans_a = '';
                                                   $ideal_ans_b = '';
                                                   $ideal_ans_c = '';
                                                   $ideal_ans_d = '';
                                                   $ideal_ans_e = '';

                                                   $query_answer = "SELECT * from tblscreening_answer WHERE question_id = '$QUESTION_ID'";
                                                   $result_answer = mysqli_query($con, $query_answer);
                                                   $row_answer = mysqli_fetch_array($result_answer);
                                                   $ideal_ans_opt = $row_answer['ideal_ans_opt'];

                                                   if ($ideal_ans_opt == "A") {

                                                      $ideal_ans_a = '<i class = "fa fa-check px-2 py-1 medium  rounded bg-light-success text-success"></i>';
                                                   } elseif ($ideal_ans_opt == "B") {
                                                      $ideal_ans_b = '<i class = "fa fa-check px-2 py-1 medium  rounded bg-light-success text-success"></i>';

                                                   } elseif ($ideal_ans_opt == "C") {
                                                      $ideal_ans_c = '<i class = "fa fa-check px-2 py-1 medium  rounded bg-light-success text-success"></i>';

                                                   } elseif ($ideal_ans_opt == "D") {
                                                      $ideal_ans_d = '<i class = "fa fa-check px-2 py-1 medium  rounded bg-light-success text-success"></i>';

                                                   } elseif ($ideal_ans_opt == "E") {
                                                      $ideal_ans_e = '<i class = "fa fa-check px-2 py-1 medium  rounded bg-light-success text-success"></i>';
                                                   }


                                                   ///////////////////////////////////////////////
                                                    $correct_ans_a = '';
                                                    $correct_ans_b = '';
                                                    $correct_ans_c= '';
                                                    $correct_ans_d = '';
                                                    $correct_ans_e = '';
                                                   
                                                   if ($APPLICANT_ANSWER == "A") {
                                                      // if ($ideal_ans_opt == $APPLICANT_ANSWER) {
                                                      //    $correct_ans_a = 'text-success';
                                                      // } else {
                                                      //    $correct_ans_a = 'text-danger';
                                                      // }
                                                   } elseif ($APPLICANT_ANSWER == "B") {
                                                      // if ($ideal_ans_opt == $APPLICANT_ANSWER) {
                                                      //    $correct_ans_b = 'text-success';
                                                      // } else {
                                                      //    $correct_ans_b = 'text-danger';
                                                      // }
                                                   } elseif ($APPLICANT_ANSWER == "C") {
                                                      if ($ideal_ans_opt == $APPLICANT_ANSWER) {
                                                         $correct_ans_c = 'text-success';
                                                      } else {
                                                         $correct_ans_c = 'text-danger';
                                                      }
                                                   } elseif ($APPLICANT_ANSWER == "D") {
                                                      // if ($ideal_ans_opt == $APPLICANT_ANSWER) {
                                                      //    $correct_ans_d = 'text-success';
                                                      // } else {
                                                      //    $correct_ans_d = 'text-danger';
                                                      // }
                                                   } elseif ($APPLICANT_ANSWER == "E") {
                                                      // if ($ideal_ans_opt == $APPLICANT_ANSWER) {
                                                      //    $correct_ans_e = 'text-success';
                                                      // } else {
                                                      //    $correct_ans_e = 'text-danger';
                                                      // }
                                                   }
                                                /////////////////////////////////////////////

                                                
                                                


                                                  

                                             ?> <br>
                                                   <div class="form-group">
                                                      <div class="mb-2 mr-4 ml-lg-0 mr-lg-4">
                                                         <div class="d-flex align-items-center">
                                                            <div class="rounded-circle bg-light-danger theme-cl p-1 small d-flex align-items-center justify-content-center">
                                                               <i class="fas fa-question small text-danger"></i>
                                                            </div>
                                                            <h6 class="mb-0 ml-3 text-muted fs-sm"><?php echo $count ?>.<i> Question <strong>(<?php echo $row['q_title'] ?>)</strong></i></h6>
                                                         </div>


                                                         <label class="checkbox-custom-label text-dark ft-medium"><b><?php echo $row['question'] ?></b><span>?</span></label>

                                                         <!-- <div class="col-xl-12 col-lg-12 col-md-12">
																			<label class="muted-text ft-medium" for="<?php echo $row['id'] ?>">Choose Correct Option </label><br>
																		</div> -->

                                                         <input type="hidden" name="id[]" value="<?php echo $row['id'] ?>">


                                                         <input type="radio" id="A<?php echo $row['id'] ?>" class="checkbox-custom" name="ans[<?php echo $row['id'] ?>]" value="A" required <?php echo $a ?>>
                                                         <label for="A<?php echo $row['id'] ?>" class="checkbox-custom-label <?php echo $correct_ans_a ?>">A. <?php echo $row['opt_A'] ?> <?php echo $ideal_ans_a ?></label>




                                                         <input type="radio" id="B<?php echo $row['id'] ?>" class="checkbox-custom" name="ans[<?php echo $row['id'] ?>]" value="B" required <?php echo $b ?>>

                                                         <label for="B<?php echo $row['id'] ?>" class="checkbox-custom-label  <?php echo $correct_ans_b ?>">B. <?php echo $row['opt_B'] ?> <?php echo $ideal_ans_b ?></label>


                                                         <input type="radio" id="C<?php echo $row['id'] ?>" class="checkbox-custom" name="ans[<?php echo $row['id'] ?>]" value="C" required <?php echo $c ?>>

                                                         <label for="C<?php echo $row['id'] ?>" class="checkbox-custom-label <?php echo $correct_ans_c ?>">C. <?php echo $row['opt_C'] ?> <?php echo $ideal_ans_c ?></label>


                                                         <input type="radio" id="D<?php echo $row['id'] ?>" class="checkbox-custom" name="ans[<?php echo $row['id'] ?>]" value="D" required <?php echo $d ?>>

                                                         <label for="D<?php echo $row['id'] ?>" class="checkbox-custom-label  <?php echo $correct_ans_d ?>">D. <?php echo $row['opt_D'] ?> <?php echo $ideal_ans_d ?></label>


                                                         <input type="radio" id="E<?php echo $row['id'] ?>" class="checkbox-custom" name="ans[<?php echo $row['id'] ?>]" value="E" required <?php echo $e ?>>

                                                         <label for="E<?php echo $row['id'] ?>" class="checkbox-custom-label  <?php echo $correct_ans_e ?>">E. <?php echo $row['opt_E'] ?> <?php echo $ideal_ans_e ?></label>




                                                         <hr>
                                                      </div>
                                                   </div>




                                             <?php }
                                             } ?>


                                          </div>
                                       </div>
                                    </div>
                                    <?php //} 
                                    ?>


                                    <a href="./dashboard-manage-applications.php" class="px-2 py-1 medium bg-light-info rounded text-danger btn btn-primary"><i class="lni lni-arrow-left mr-1"></i> Back</a>
                                 </div>
                              </div>
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

<!-- Mirrored from themezhub.net/live-workplex/workplex/dashboard-manage-applications.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Feb 2022 12:08:07 GMT -->

</html>