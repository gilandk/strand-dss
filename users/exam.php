 <?php
  include('include/header.php');

  $e_id = $_REQUEST['id'];
  $c_id = $_REQUEST['cid'];

  $sql = "SELECT * FROM exams WHERE exam_id='$e_id'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

      $exam_id = $row['exam_id'];
      $guide = $row['exam_guide'];
      $type = $row['exam_type'];
      $date_s = $row['exam_date_s'];
      $date_e = $row['exam_date_e'];
    }
  }

  $sql2 = "SELECT * FROM category JOIN exam_category ON category.cat_id = exam_category.catID WHERE examID='$e_id' and cat_id='$c_id' ORDER by cat_seq ASC";
  $result1 = $conn->query($sql2);

  if ($result1->num_rows > 0) {
    while ($row1 = $result1->fetch_assoc()) {
      $cat_name = $row1['cat_name'];
      $cat_instruct = $row1['cat_instruct'];
      $cHour = $row1['cHour'];
      $cMin = $row1['cMin'];
    }
  }
  ?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0 text-dark"> <?php echo $type; ?></h1>
         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->


   <!-- Main content -->
   <div class="content">
     <div class="container">


       <?php include('include/exam_guide.php'); ?>
       <?php include('include/exam_questions.php'); ?>

       <?php include('include/timer.php'); ?>

     </div><!-- /.container-fluid -->
   </div><!-- /.content -->
 </div><!-- /.content-wrapper -->

 <?php
  include('include/footer.php');
  ?>