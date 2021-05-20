<?php
include('include/header.php');
include('include/sidebar.php');

$strand_id = $_REQUEST['id'];

$sql = "SELECT * FROM strands WHERE strand_id ='$strand_id'";
$result = $conn->query($sql);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Formula</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Strand</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-12">
          <?php
          //If User already registered with this email then show error message.
          if (isset($_SESSION['UpdateFormulaSuccess'])) {
          ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Success!</h5>
              Formula Successfully Added!
            </div>
          <?php
            unset($_SESSION['UpdateFormulaSuccess']);
          }
          ?>

          <?php
          //If User already registered with this email then show error message.
          if (isset($_SESSION['UpdateFormulaFailed'])) {
          ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i> Alert!</h5>
              Formula title already exist!
            </div>
          <?php
            unset($_SESSION['UpdateFormulaFailed']);
          }
          ?>

          <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $strand_id = $row['strand_id'];
              $strand_name = $row['strand_name'];
              $strand_abr = $row['strand_abr'];

          ?>
              <form action="add_formula.php" method="POST" enctype="multipart/form-data">

                <?php
                $count = "SELECT * FROM category";
                $r_count = $conn->query($count);
                $c_count = $r_count->num_rows;

                $sql = "SELECT * FROM strand_formula WHERE strand_id = '$strand_id'";
                $res = $conn->query($sql);

                if ($res->num_rows > 0) {
                  while ($rowsf = $res->fetch_assoc()) {
                    $sf_id = $rowsf['sf_id'];
                  }
                  $mode = 'edit';
                } else {
                  $mode = 'add';
                }
                ?>

                <input type="hidden" name="strand_id" value="<?php echo $strand_id; ?>">
                <input type="hidden" name="c_count" value="<?php echo $c_count; ?>">
                <input type="hidden" name="sf_id" value="<?php echo $sf_id; ?>">
                <input type="hidden" name="mode" value="<?php echo $mode; ?>">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title"><?php echo $strand_name . ' <strong>(' . $strand_abr . ')</strong>'; ?></h5>
                  </div><!-- /.card-header -->
                  <div class="card-body">

                    <div class="row">
                      <div class="col-sm-6">
                        <!-- checkbox -->
                        <div class="form-group">
                          <!-- category #1 -->
                          <?php
                          if ($c_count < 1) {
                            $hide = 'hide-me';
                          } else {
                            $hide = '';
                          }
                          ?>

                          <?php
                          $sqlc1 = "SELECT * FROM category WHERE cat_id = 1";
                          $resultc1 = $conn->query($sqlc1);
                          if ($resultc1->num_rows > 0) {
                            while ($rowc1 = $resultc1->fetch_assoc()) {
                              $category_id = $rowc1['cat_id'];
                              $category_name = $rowc1['cat_name'];

                              $sqls1 = "SELECT * FROM strand_formula WHERE strand_id='$strand_id'";
                              $results1 = $conn->query($sqls1);
                              if ($results1->num_rows > 0) {
                                while ($rows1 = $results1->fetch_assoc()) {
                                  $category1 = $rows1['category1'];

                                  if ($category1 == $category_id) {
                                    $checked1 = 'checked';
                                  } else {
                                    $checked1 = '';
                                  }
                          ?>
                                  <div class="form-check <?php echo $hide; ?>">
                                    <input class="form-check-input" type="checkbox" name="category<?php echo $category_id; ?>" <?php echo $checked1; ?> value="<?php echo $category_id; ?>" />
                                    <label class="form-check-label"><?php echo $category_name; ?></label>
                                  </div>
                          <?php
                                }
                              }
                            }
                          }
                          ?>
                          <!-- category #1 -->
                          <!-- category #2 -->
                          <?php
                          if ($c_count < 2) {
                            $hide = 'hide-me';
                          } else {
                            $hide = '';
                          }
                          ?>

                          <?php
                          $sqlc2 = "SELECT * FROM category WHERE cat_id = 2";
                          $resultc2 = $conn->query($sqlc2);
                          if ($resultc2->num_rows > 0) {
                            while ($rowc2 = $resultc2->fetch_assoc()) {
                              $category_id = $rowc2['cat_id'];
                              $category_name = $rowc2['cat_name'];

                              $sqls2 = "SELECT * FROM strand_formula WHERE strand_id='$strand_id'";
                              $results2 = $conn->query($sqls2);
                              if ($results2->num_rows > 0) {
                                while ($rows2 = $results2->fetch_assoc()) {
                                  $category2 = $rows2['category2'];

                                  if ($category2 == $category_id) {
                                    $checked2 = 'checked';
                                  } else {
                                    $checked2 = '';
                                  }
                          ?>
                                  <div class="form-check <?php echo $hide; ?>">
                                    <input class="form-check-input" type="checkbox" name="category<?php echo $category_id; ?>" <?php echo $checked2; ?> value="<?php echo $category_id; ?>" />
                                    <label class="form-check-label"><?php echo $category_name; ?></label>
                                  </div>
                          <?php
                                }
                              }
                            }
                          }
                          ?>

                          <!-- category #2 -->
                          <!-- category #3 -->
                          <?php
                          if ($c_count < 3) {
                            $hide = 'hide-me';
                          } else {
                            $hide = '';
                          }
                          ?>
                          <?php
                          $sqlc3 = "SELECT * FROM category WHERE cat_id = 3";
                          $resultc3 = $conn->query($sqlc3);
                          if ($resultc3->num_rows > 0) {
                            while ($rowc3 = $resultc3->fetch_assoc()) {
                              $category_id = $rowc3['cat_id'];
                              $category_name = $rowc3['cat_name'];

                              $sqls3 = "SELECT * FROM strand_formula WHERE strand_id='$strand_id'";
                              $results3 = $conn->query($sqls3);
                              if ($results3->num_rows > 0) {
                                while ($rows3 = $results3->fetch_assoc()) {
                                  $category3 = $rows3['category3'];

                                  if ($category3 == $category_id) {
                                    $checked3 = 'checked';
                                  } else {
                                    $checked3 = '';
                                  }
                          ?>
                                  <div class="form-check <?php echo $hide; ?>">
                                    <input class="form-check-input" type="checkbox" name="category<?php echo $category_id; ?>" <?php echo $checked3; ?> value="<?php echo $category_id; ?>" />
                                    <label class="form-check-label"><?php echo $category_name; ?></label>
                                  </div>
                          <?php
                                }
                              }
                            }
                          }
                          ?>

                          <!-- category #3 -->
                          <!-- category #4 -->
                          <?php
                          if ($c_count < 4) {
                            $hide = 'hide-me';
                          } else {
                            $hide = '';
                          }
                          ?>
                          <?php
                          $sqlc4 = "SELECT * FROM category  WHERE cat_id = 4";
                          $resultc4 = $conn->query($sqlc4);
                          if ($resultc4->num_rows > 0) {
                            while ($rowc4 = $resultc4->fetch_assoc()) {
                              $category_id = $rowc4['cat_id'];
                              $category_name = $rowc4['cat_name'];

                              $sqls4 = "SELECT * FROM strand_formula WHERE strand_id='$strand_id'";
                              $results4 = $conn->query($sqls4);
                              if ($results4->num_rows > 0) {
                                while ($rows4 = $results4->fetch_assoc()) {
                                  $category4 = $rows4['category4'];

                                  if ($category4 == $category_id) {
                                    $checked4 = 'checked';
                                  } else {
                                    $checked4 = '';
                                  }
                          ?>
                                  <div class="form-check <?php echo $hide; ?>">
                                    <input class="form-check-input" type="checkbox" name="category<?php echo $category_id; ?>" <?php echo $checked4; ?> value="<?php echo $category_id; ?>" />
                                    <label class="form-check-label"><?php echo $category_name; ?></label>
                                  </div>
                          <?php
                                }
                              }
                            }
                          }
                          ?>

                          <!-- category #4 -->
                          <!-- category #5 -->
                          <?php
                          if ($c_count < 5) {
                            $hide = 'hide-me';
                          } else {
                            $hide = '';
                          }
                          ?>
                          <?php
                          $sqlc5 = "SELECT * FROM category WHERE cat_id = 5";
                          $resultc5 = $conn->query($sqlc5);
                          if ($resultc5->num_rows > 0) {
                            while ($rowc5 = $resultc5->fetch_assoc()) {
                              $category_id = $rowc5['cat_id'];
                              $category_name = $rowc5['cat_name'];

                              $sqls5 = "SELECT * FROM strand_formula WHERE strand_id='$strand_id'";
                              $results5 = $conn->query($sqls5);
                              if ($results5->num_rows > 0) {
                                while ($rows5 = $results5->fetch_assoc()) {
                                  $category5 = $rows5['category5'];

                                  if ($category5 == $category_id) {
                                    $checked5 = 'checked';
                                  } else {
                                    $checked5 = '';
                                  }
                          ?>
                                  <div class="form-check <?php echo $hide; ?>">
                                    <input class="form-check-input" type="checkbox" name="category<?php echo $category_id; ?>" <?php echo $checked5; ?> value="<?php echo $category_id; ?>" />
                                    <label class="form-check-label"><?php echo $category_name; ?></label>
                                  </div>
                          <?php
                                }
                              }
                            }
                          }
                          ?>

                          <!-- category #5 -->
                          <!-- category #6 -->
                          <?php
                          if ($c_count < 6) {
                            $hide = 'hide-me';
                          } else {
                            $hide = '';
                          }
                          ?>

                          <?php
                          $sqlc6 = "SELECT * FROM category WHERE cat_id = 6";
                          $resultc6 = $conn->query($sqlc6);
                          if ($resultc6->num_rows > 0) {
                            while ($rowc6 = $resultc6->fetch_assoc()) {
                              $category_id = $rowc6['cat_id'];
                              $category_name = $rowc6['cat_name'];

                              $sqls6 = "SELECT * FROM strand_formula WHERE strand_id='$strand_id'";
                              $results6 = $conn->query($sqls6);
                              if ($results6->num_rows > 0) {
                                while ($rows6 = $results6->fetch_assoc()) {
                                  $category6 = $rows6['category6'];

                                  if ($category6 == $category_id) {
                                    $checked6 = 'checked';
                                  } else {
                                    $checked6 = '';
                                  }
                          ?>
                                  <div class="form-check <?php echo $hide; ?>">
                                    <input class="form-check-input" type="checkbox" name="category<?php echo $category_id; ?>" <?php echo $checked6; ?> value="<?php echo $category_id; ?>" />
                                    <label class="form-check-label"><?php echo $category_name; ?></label>
                                  </div>
                          <?php
                                }
                              }
                            }
                          }
                          ?>

                          <!-- category #6 -->
                          <!-- category #7 -->
                          <?php
                          if ($c_count < 7) {
                            $hide = 'hide-me';
                          } else {
                            $hide = '';
                          }
                          ?>

                          <?php
                          $sqlc7 = "SELECT * FROM category  WHERE cat_id = 7";
                          $resultc7 = $conn->query($sqlc7);
                          if ($resultc7->num_rows > 0) {
                            while ($rowc7 = $resultc7->fetch_assoc()) {
                              $category_id = $rowc7['cat_id'];
                              $category_name = $rowc7['cat_name'];

                              $sqls7 = "SELECT * FROM strand_formula WHERE strand_id='$strand_id'";
                              $results7 = $conn->query($sqls7);
                              if ($results7->num_rows > 0) {
                                while ($rows7 = $results7->fetch_assoc()) {
                                  $category7 = $rows7['category7'];

                                  if ($category7 == $category_id) {
                                    $checked7 = 'checked';
                                  } else {
                                    $checked7 = '';
                                  }
                          ?>
                                  <div class="form-check <?php echo $hide; ?>">
                                    <input class="form-check-input" type="checkbox" name="category<?php echo $category_id; ?>" <?php echo $checked7; ?> value="<?php echo $category_id; ?>" />
                                    <label class="form-check-label"><?php echo $category_name; ?></label>
                                  </div>
                          <?php
                                }
                              }
                            }
                          }
                          ?>

                          <!-- category #7 -->
                          <!-- category #8 -->
                          <?php
                          if ($c_count < 8) {
                            $hide = 'hide-me';
                          } else {
                            $hide = '';
                          }
                          ?>

                          <?php
                          $sqlc8 = "SELECT * FROM category  WHERE cat_id = 8";
                          $resultc8 = $conn->query($sqlc8);
                          if ($resultc8->num_rows > 0) {
                            while ($rowc8 = $resultc8->fetch_assoc()) {
                              $category_id = $rowc8['cat_id'];
                              $category_name = $rowc8['cat_name'];

                              $sqls8 = "SELECT * FROM strand_formula WHERE strand_id='$strand_id'";
                              $results8 = $conn->query($sqls8);
                              if ($results8->num_rows > 0) {
                                while ($rows8 = $results8->fetch_assoc()) {
                                  $category8 = $rows8['category8'];

                                  if ($category8 == $category_id) {
                                    $checked8 = 'checked';
                                  } else {
                                    $checked8 = '';
                                  }
                          ?>
                                  <div class="form-check <?php echo $hide; ?>">
                                    <input class="form-check-input" type="checkbox" name="category<?php echo $category_id; ?>" <?php echo $checked8; ?> value="<?php echo $category_id; ?>" />
                                    <label class="form-check-label"><?php echo $category_name; ?></label>
                                  </div>
                          <?php
                                }
                              }
                            }
                          }
                          ?>

                          <!-- category #8 -->
                          <!-- category #9 -->
                          <?php
                          if ($c_count < 9) {
                            $hide = 'hide-me';
                          } else {
                            $hide = '';
                          }
                          ?>

                          <?php
                          $sqlc9 = "SELECT * FROM category  WHERE cat_id = 9";
                          $resultc9 = $conn->query($sqlc9);
                          if ($resultc9->num_rows > 0) {
                            while ($rowc9 = $resultc9->fetch_assoc()) {
                              $category_id = $rowc9['cat_id'];
                              $category_name = $rowc9['cat_name'];

                              $sqls9 = "SELECT * FROM strand_formula WHERE strand_id='$strand_id'";
                              $results9 = $conn->query($sqls9);
                              if ($results9->num_rows > 0) {
                                while ($rows9 = $results9->fetch_assoc()) {
                                  $category9 = $rows9['category9'];

                                  if ($category9 == $category_id) {
                                    $checked9 = 'checked';
                                  } else {
                                    $checked9 = '';
                                  }
                          ?>
                                  <div class="form-check <?php echo $hide; ?>">
                                    <input class="form-check-input" type="checkbox" name="category<?php echo $category_id; ?>" <?php echo $checked9; ?> value="<?php echo $category_id; ?>" />
                                    <label class="form-check-label"><?php echo $category_name; ?></label>
                                  </div>
                          <?php
                                }
                              }
                            }
                          }
                          ?>

                          <!-- category #9 -->
                          <!-- category #10 -->
                          <?php
                          if ($c_count < 10) {
                            $hide = 'hide-me';
                          } else {
                            $hide = '';
                          }
                          ?>
                          <?php
                          $sqlc10 = "SELECT * FROM category  WHERE cat_id = 10";
                          $resultc10 = $conn->query($sqlc10);
                          if ($resultc10->num_rows > 0) {
                            while ($rowc10 = $resultc10->fetch_assoc()) {
                              $category_id = $rowc10['cat_id'];
                              $category_name = $rowc10['cat_name'];

                              $sqls10 = "SELECT * FROM strand_formula WHERE strand_id='$strand_id'";
                              $results10 = $conn->query($sqls10);
                              if ($results10->num_rows > 0) {
                                while ($rows10 = $results10->fetch_assoc()) {
                                  $category10 = $rows10['category10'];

                                  if ($category10 == $category_id) {
                                    $checked10 = 'checked';
                                  } else {
                                    $checked10 = '';
                                  }
                          ?>
                                  <div class="form-check <?php echo $hide; ?>">
                                    <input class="form-check-input" type="checkbox" name="category<?php echo $category_id; ?>" <?php echo $checked10; ?> value="<?php echo $category_id; ?>" />
                                    <label class="form-check-label"><?php echo $category_name; ?></label>
                                  </div>
                          <?php
                                }
                              }
                            }
                          }
                          ?>

                          <!-- category #10 -->
                        </div>

                        <button type="submit" name="save" class="btn btn-primary">Save</button>
                      </div>
                    </div>

              </form>
          <?php
            }
          }
          ?>

        </div><!-- /.col -->
      </div><!-- /. row -->
    </div><!-- /.container-fluid -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php
include('include/footer.php');
?>