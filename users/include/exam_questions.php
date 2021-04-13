 <?php
  $sql1 = "SELECT * FROM sub_category WHERE main_cat = '$c_id'";
  $res1 = $conn->query($sql1);

  if ($res1->num_rows > 0) {
    while ($subc = $res1->fetch_assoc()) {
      $sub_id = $subc['sub_id'];
      $sub_name = $subc['sub_title'];
      $sub_inst = $subc['sub_instruction'];

  ?>
     <div class="card">
       <div class="card-header">
         <h3 class="card-title"><?php echo $sub_name; ?></h3>
       </div>
       <div class="card-body">
         <p class="card-text">
           <?php echo $sub_inst; ?>
         </p>



         <?php

          $num = '1';

          $ques = "SELECT * FROM questions WHERE q_scat = '$sub_id'";
          $resultq = $conn->query($ques);

          if ($resultq->num_rows > 0) {
            while ($q = $resultq->fetch_assoc()) {
              $qid = $q['q_id'];
              $question = $q['question'];
              $choice1 = $q['choice1'];
              $choice2 = $q['choice2'];
              $choice3 = $q['choice3'];
              $choice4 = $q['choice4'];

          ?>
             <table class="table">
               <thead>
                 <th width="25px"><?php echo $num;
                                  $num++; ?>.</th>
                 <th colspan="8"><?php echo $question; ?></th>
               </thead>
               <tbody>
                 <tr>
                   <td> </td>
                   <td>
                     <div class="custom-control custom-radio">
                       <input class="custom-control-input" type="radio" id="customRadio1_<?php echo $qid; ?>" name="customRadio<?php echo $qid; ?>" value="1" />
                       <label for="customRadio1_<?php echo $qid; ?>" class="custom-control-label"><?php echo $choice1; ?></label>
                     </div>
                   </td>
                   <td>
                     <div class="custom-control custom-radio">
                       <input class="custom-control-input" type="radio" id="customRadio2_<?php echo $qid; ?>" name="customRadio<?php echo $qid; ?>" value="2" />
                       <label for="customRadio2_<?php echo $qid; ?>" class="custom-control-label"><?php echo $choice2; ?></label>
                     </div>
                   </td>
                 </tr>
                 <tr>
                   <td> </td>
                   <td>
                     <div class="custom-control custom-radio">
                       <input class="custom-control-input" type="radio" id="customRadio3_<?php echo $qid; ?>" name="customRadio<?php echo $qid; ?>" value="3" />
                       <label for="customRadio3_<?php echo $qid; ?>" class="custom-control-label"><?php echo $choice3; ?></label>
                     </div>
                   </td>
                   <td>
                     <div class="custom-control custom-radio">
                       <input class="custom-control-input" type="radio" id="customRadio4_<?php echo $qid; ?>" name="customRadio<?php echo $qid; ?>" value="4" />
                       <label for="customRadio4_<?php echo $qid; ?>" class="custom-control-label"><?php echo $choice4; ?></label>
                     </div>
                   </td>
                 </tr>
               </tbody>
             </table>
         <?php
            }
          }
          ?>
       </div>
     </div>
 <?php
    }
  }
  ?>