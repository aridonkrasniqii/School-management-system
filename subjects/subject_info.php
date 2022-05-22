<h4 class="center grey-text">Subjects</h4>

<div class="container">
  <div class="row">

    <?php

                        require("../database/db.php");

                        $query = "select * from subject;";
                        $subjects = [];
                        $stmt = mysqli_stmt_init($connection);

                        if(!mysqli_stmt_prepare($stmt, $query)){
                          throw new Exception();
                        }else {
                          mysqli_stmt_execute($stmt);
                          $result = mysqli_stmt_get_result($stmt);

                          while($row = mysqli_fetch_assoc($result)){
                            $subjects[] = $row;
                          }
                        }?>


    <?php
                                foreach($subjects as $s):?>

    <div class="col s3 md3">
      <div class="card z-depth-0" id="card">
        <div class="card-content center">
          <h6><?php echo htmlspecialchars($s['subject_title']); ?></h6>
          <div><?php echo htmlspecialchars($s['subject_credits']);?></div>
        </div>
        <div class="card-action right-align">
          <a class="brand-text" href="subjects/subject_delete.php?id=<?php echo $s['subject_id'];?>">Delete subject</a>
          <a class="brand-text"
            href="subjects/subject_edit_form.php?id=<?php echo $s['subject_id'];?>&title=<?php echo $s['subject_title'];?>&credits=<?php echo $s['subject_credits'];?>&type=<?php echo $s['subject_type'];?>&lectured_by=<?php echo $s['subject_lectured_by'];?>">Edit
            subject</a>

        </div>
      </div>
    </div>

    <?php endforeach;?>
  </div>
</div>