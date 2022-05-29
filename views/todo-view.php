  <?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  require("./database/connection.php");
  require("./models/subject.php");
  require("./repositories/subject-repository.php");
  require "./controllers/subject_controller.php";
  require "./controllers/todo-controller.php";




  $subject_controller = new subject_controller;
  $sub = $subject_controller->findAllSubjects();



  $homework_controller = new todo_controller;
  $homeworks = $homework_controller->getAll();

  ?>


  <!-- <form action="./filters/todo-filter.php" class="search_filter" method="post">
    <div class="container">
      <select name="subject" class="subject-homework">
        <?php foreach ($sub as $s) { ?>
        <option value="<?php echo strtolower($s->getId()); ?>">
          <?php echo $s->getName(); ?>
        </option>
        <?php } ?>
      </select>

      <select name="semester" class="semester-homework">
        <?php ?>
        <option value="1">Semester 1</option>
        <option value="2">Semester 2</option>
        <option value="3">Semester 3</option>
        <?php ?>
      </select>
      <button type="submit" name="filter_homework">Filter</button>
    </div>

  </form> -->

  <div class="box__section">
    <div class="container">
      <div class="box__wrapper">


        <?php

        foreach ($homeworks as $homework) {
        ?>


        <div class="box">
          <div class="box__wrapper--ins">
            <div class="box__assigment">

              <span>Assigment Due <?php echo $homework->getDeadline(); ?></span>
            </div>
            <div class="box__info">
              <div class="box__number">
                <!-- ID OF HOMEWORK -->
                <span><?php echo "ID: " . $homework->getId(); ?></span>
              </div>
              <div class="box__title">
                <h4><a href="./views/todo-homework-view.php?id=<?php echo $homework->getId(); ?>"><?php
                                                                                                    echo $homework->getName();
                                                                                                    ?></a></h4>
              </div>
            </div>
          </div>
        </div>

        <?php } ?>

      </div>
    </div>
  </div>