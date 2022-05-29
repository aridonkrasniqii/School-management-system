 <?php
  require("./models/subject.php");
  require("./database/connection.php");
  require("./repositories/subject-repository.php");
  include("./controllers/subject_controller.php");
  include("./controllers/homework-controller.php");

  $subject_controller = new subject_controller;
  $subjects = $subject_controller->findAllSubjects();

  $homework_controller = new homework_controller;
  $he = $homework_controller->getAll();

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
       <option value="1">Semester 1</option>
       <option value="2">Semester 2</option>
       <option value="3">Semester 3</option>
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