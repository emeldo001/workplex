<!DOCTYPE html>
<html lang="zxx">

<?php require 'include/phpcode.php';

if (!empty($_GET['type'])) {
   $type = $_GET['type'];

   if (($type == "delete")) {
      $Qid = $_GET['id'];
      $delete_sql = "DELETE from tblscreening where id='$Qid'";
      mysqli_query($con, $delete_sql); ?>

      <script>
         alert("Question was deleted");
         setTimeout(function() {
            window.location.href = 'dashboard-screen-question-add.php';
         }, 3000);
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
                     <h1 class="ft-medium"> Screening Questions</h1>
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                           <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                           <li class="breadcrumb-item"><a href="#" class="theme-cl">Add Screening Questions</a></li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>

            <div class="dashboard-widg-bar d-block">
               <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12">
                     <div class="_dashboard_content bg-white rounded mb-4">
                        <div class="_dashboard_content_header br-bottom py-3 px-3">
                           <div class="_dashboard__header_flex">
                              <h4 class="mb-0 ft-medium fs-md"><i class="fa fa-file mr-1 theme-cl fs-sm"></i>Add Screening Questions</h4>
                           </div>
                        </div>

                        <div class="_dashboard_content_body py-3 px-3">

                           <div class="col-xl-12 col-lg-12 col-md-12">
                              <ul class="nav nav-tabs b-0 d-flex align-items-center justify-content-center simple_tab_links mb-4" id="myTab" role="tablist">
                                 <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="description-tab" href="#description" data-toggle="tab" role="tab" aria-controls="description" aria-selected="true" aria-expanded="true">Questions List</a>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                    <a class="nav-link" href="#information" id="information-tab" data-toggle="tab" role="tab" aria-controls="information" aria-selected="false" aria-expanded="false">Add Quetion</a>
                                 </li>

                              </ul>
                              <div class="row">


                           <?php
                              $query = "SELECT * from tblscreening ORDER BY id DESC" or die(mysqli_error($con));
                              $run = mysqli_query($con, $query);
                              $count = 0;
                              while ($row = mysqli_fetch_array($run)) {
                                 $count++;
                              }?>
                                 <div class="tab-content" id="myTabContent">

                                    <!-- Description Content -->
                                    <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab" aria-expanded="true">
                                       <div class="col-xl-12 col-lg-12 col-md-12">
                                          <div class="form-group">
                                             <br>
                                             <br><br>
                                             <h4>Screening Questions (<?php echo $count?>)</h4>
                                             <label class="text-dark ft-medium">List of questions to screen for qualified applicants</label>
                                             <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                   <ul class="no-ul-list">
                                                      <hr>


                                                      <?php
                                                      $query = "SELECT * from tblscreening ORDER BY id DESC" or die(mysqli_error($con));
                                                      $run = mysqli_query($con, $query);
                                                      $count = 0;
                                                      while ($row = mysqli_fetch_array($run)) {
                                                         $question_id = $row['id'];

                                                         $query_ans = "SELECT * from tblscreening_answer where question_id ='$question_id' order by id desc";
                                                         $result_ans = mysqli_query($con, $query_ans);
                                                         $row_ans = mysqli_fetch_array($result_ans);

                                                         $count++;


                                                      ?>
                                                         <li>
                                                            <label for="b1" class="checkbox-custom-label"><i>Question <strong>(<?php echo $row['q_title'] ?>)</strong></i></label>
                                                            <label for="b1" class="checkbox-custom-label"><?php echo $row['question'] ?><span>?</span></label>
                                                            <a href="?type=delete&id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure you want to delete?');" class="badge badge-danger text-light rounded float-right"><i class="fas fa-trash"></i></a>

                                                            <a href="dashboard-screen-question-edit.php?id=<?php echo $row['id'] ?>" class="badge badge-md theme-bg text-light rounded float-right">Edit Question</a>

                                                            <label for="b1" class="checkbox-custom-label"><i>Ideal Answer</i></label>
                                                            <label for="b1" class="checkbox-custom-label"><?php echo '('.$row_ans['ideal_ans_opt'].')' ?> - <?php echo $row_ans['ideal_ans'] ?></label>
                                                         </li>
                                                         <hr>
                                                      <?php } ?>

                                                      <!-- <li>

                                                      <label for="b2" class="checkbox-custom-label"><i>Question <strong>(Background Check)</strong></i></label>
                                                      <label for="b2" class="checkbox-custom-label">Are you willing to undergo a background check, in accordance with local law/regulations<span>?</span></label>

                                                      <a href="dashboard-company-edit.php?companyid=" class="badge badge-md theme-bg text-light rounded float-right">Edit Question</a>

                                                      <label for="b2" class="checkbox-custom-label"><i>Ideal Answer</i></label>
                                                      <label for="b2" class="checkbox-custom-label">Yes</label>
                                                   </li>
                                                   <br> -->

                                                   </ul>
                                                </div>

                                             </div>
                                          </div>
                                       </div>

                                    </div>

                                    <!-- Additional Content -->
                                    <div class="tab-pane fade" id="information" role="tabpanel" aria-labelledby="information-tab" aria-expanded="false">
                                       <form class="row" method="post">
                                          <div class="additionals card-body">
                                             <div class="row">

                                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                   <div class="form-group">
                                                      <label class="text-dark ft-medium">Question Title*</label>
                                                      <input type="text" class="form-control rounded" placeholder="Title" name="q_title" required>
                                                   </div>
                                                </div>


                                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                   <div class="form-group">
                                                      <label class="text-dark ft-medium">Question*</label>
                                                      <textarea class="form-control rounded" placeholder="Add Screening Question." name="question" required></textarea>
                                                   </div><br>
                                                   <hr>
                                                </div>



                                                <div class="col-xl-3 col-lg-3 col-md-3">

                                                   <div class="form-group">
                                                      <label class="text-dark ft-medium">Answer Option A*</label>
                                                      <input type="text" class="form-control rounded" placeholder="Option A" name="opt_A" required>
                                                   </div>
                                                </div>


                                                <div class="col-xl-3 col-lg-3 col-md-3">
                                                   <div class="form-group">
                                                      <label class="text-dark ft-medium">Answer Option B*</label>
                                                      <input type="text" class="form-control rounded" placeholder="Option B" name="opt_B" required>
                                                   </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-3 col-md-3">
                                                   <div class="form-group">
                                                      <label class="text-dark ft-medium">Answer Option C*</label>
                                                      <input type="text" class="form-control rounded" placeholder="Option C" name="opt_C" required>
                                                   </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-3 col-md-3">
                                                   <div class="form-group">
                                                      <label class="text-dark ft-medium">Answer Option D*</label>
                                                      <input type="text" class="form-control rounded" placeholder="Option D" name="opt_D" required>
                                                   </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-3 col-md-3">
                                                   <div class="form-group">
                                                      <label class="text-dark ft-medium">Answer Option E*</label>
                                                      <input type="text" class="form-control rounded" placeholder="Option E" name="opt_E" required>
                                                   </div>
                                                </div>


                                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                   <hr><br>
                                                   <label class="text-dark ft-medium">Select Correct Answer </label><br>
                                                </div>
                                                <div class="col-xl-3 col-lg-3 col-md-3">
                                                   <div class="form-group">
                                                      <select class="form-control" name="ideal_ans_opt" required>
                                                         <option disabled selected value="">Select Answer</option>
                                                         <option>A</option>
                                                         <option>B</option>
                                                         <option>C</option>
                                                         <option>D</option>
                                                         <option>E</option>
                                                      </select>
                                                   </div><br>
                                                </div>


                                                <div class="col-12">
                                                   <div class="form-group">
                                                      <button type="submit" class="btn btn-md ft-medium text-light rounded theme-bg" name="add_question">Publish Question</button>
                                                   </div>
                                                </div>


                                             </div>
                                          </div>
                                       </form>
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

<!-- Mirrored from themezhub.net/live-workplex/workplex/dashboard-post-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Feb 2022 12:07:20 GMT -->

</html>