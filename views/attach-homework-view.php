 <?php
  include "./repositories/subject-repository.php";
  include "./models/subject.php";
  $s = new subject_repository();
  $subjects = $s->getAll();
  include "./repositories/homework-repository.php";
  include "./models/homework.php";
  $h2 = new homework_repository();
  $he = $h2->getAll();

  ?>

 <form action="./controllers/attach-controller.php" method="post" class="attach" enctype="multipart/form-data">
   <div class="select__subject">
     <label for="subject">Choose a subject:</label>

     <select name="subject" id="subject">
       <?php
        foreach ($subjects as $subject) {
        ?>
       <option value="<?php echo $subject->getId(); ?>"><?php echo $subject->getName(); ?></option>

       <?php
        } ?>
     </select>
   </div>
   <div class="select__semester">
     <label for="semester">Choose a semester:</label>
     <select name="semester" id="semester">
       <option value="1">1</option>
       <option value="2">2</option>
     </select>
   </div>
   <div class="select__homework">
     <label for="homework">Choose a homework:</label>


     <select name="homework" id="homework">
       <?php foreach ($he as $homework) { ?>
       <option value="<?php echo strtolower($homework->getId()); ?>"><?php echo $homework->getName(); ?></option>
       <?php
        } ?>
     </select>
   </div>


   <div class="textarea__description">
     <textarea placeholder="Enter description" name="description" id="description" cols="30" rows="10"></textarea>
   </div>
   <input type="hidden" name="filename" value="<?php echo uniqid(".", true) ?>">
   <input type="file" name="file">
   <br><br>
   <input type="submit" name="attach_homework" class="attach-button" value="Attach">
 </form>