<!DOCTYPE html>
<html lang="zxx">
<?php
if (!empty($_GET['id'])) {
   $id = $_GET['id'];
} else {
   header('location: dashboard-companys.php');
}
?>
<?php require 'include/phpcode.php';

$query = "SELECT * from tblscreening WHERE id = '$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

$question_id = $row['id'];
$q_title = $row['q_title'];
$question = $row['question'];

$opt_A = $row['opt_A']; //
$opt_B = $row['opt_B']; //
$opt_C = $row['opt_C']; //
$opt_D = $row['opt_D']; //
$opt_E = $row['opt_E']; //

$query = "SELECT * from tblscreening_answer WHERE question_id = '$question_id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

$ideal_ans_opt = $row['ideal_ans_opt'];
$ideal_ans = $row['ideal_ans'];

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
                           <li class="breadcrumb-item"><a href="#" class="theme-cl">Edit Screening Questions</a></li>
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
                              <h4 class="mb-0 ft-medium fs-md"><i class="fa fa-file mr-1 theme-cl fs-sm"></i>Edit Screening Questions</h4>
                           </div>
                        </div>

                        <div class="_dashboard_content_body py-3 px-3">
                           <form class="row" method="post">
                              <div class="col-xl-12 col-lg-12 col-md-12">
                                 <div class="row">

                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                       <div class="form-group">
                                          <label class="text-dark ft-medium">Question Title*</label>
                                          <input type="text" class="form-control rounded" placeholder="Title" name="q_title" value="<?php echo $q_title ?>">
                                       </div>
                                    </div>


                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                       <div class="form-group">
                                          <label class="text-dark ft-medium">Question*</label>
                                          <textarea class="form-control rounded" placeholder="Add Screening Question." name="question"><?php echo $question ?></textarea>
                                       </div><br>
                                       <hr>
                                    </div>


                                    <div class="col-xl-3 col-lg-3 col-md-3">

                                       <div class="form-group">
                                          <label class="text-dark ft-medium">Answer Option A*</label>
                                          <input type="text" class="form-control rounded" placeholder="Option A" name="opt_A" value="<?php echo $opt_A ?>" required>
                                       </div>
                                    </div>


                                    <div class="col-xl-3 col-lg-3 col-md-3">
                                       <div class="form-group">
                                          <label class="text-dark ft-medium">Answer Option B*</label>
                                          <input type="text" class="form-control rounded" placeholder="Option B" name="opt_B" value="<?php echo $opt_B ?>" required>
                                       </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3">
                                       <div class="form-group">
                                          <label class="text-dark ft-medium">Answer Option C*</label>
                                          <input type="text" class="form-control rounded" placeholder="Option C" name="opt_C" value="<?php echo $opt_C ?>" required>
                                       </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3">
                                       <div class="form-group">
                                          <label class="text-dark ft-medium">Answer Option D*</label>
                                          <input type="text" class="form-control rounded" placeholder="Option D" name="opt_D" value="<?php echo $opt_D ?>" required>
                                       </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3">
                                       <div class="form-group">
                                          <label class="text-dark ft-medium">Answer Option E*</label>
                                          <input type="text" class="form-control rounded" placeholder="Option E" name="opt_E" value="<?php echo $opt_E ?>" required>
                                       </div>
                                    </div>


                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                       <hr><br>
                                       <label class="text-dark ft-medium">Select Correct Answer </label><br>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3">
                                       <div class="form-group">
                                          <select class="form-control" name="ideal_ans_opt" required>
                                             <option hidden selected value="<?php echo $ideal_ans_opt ?>"><?php echo $ideal_ans ?> - (<?php echo $ideal_ans_opt ?>)</option>
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
                                          <button type="submit" class="btn btn-md ft-medium text-light rounded theme-bg" name="edit_question">Edit Question</button>
                                       </div>
                                    </div>




                                 </div>
                           </form>
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