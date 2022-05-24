  <?php
  include "./repositories/subject-repository.php";
  include "./models/subject.php";
  $s = new subject_repository();
  $sub = $s->getAll();

  ?>


  <form action="./filters/todo-filter.php" class="search_filter" method="post">
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

  </form>

  <div class="box__section">
    <div class="container">
      <div class="box__wrapper">


        <?php
        include "./repositories/homework-repository.php";
        include "./models/homework.php";
        $h1 = new homework_repository();
        $homeworks = $h1->getAll();
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
                <h4><a href="./views/my-homework.php?id=<?php echo $homework->getId(); ?>"><?php
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