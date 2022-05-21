<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_reset();
session_start();

  if(!isset($_SESSION['user_id']) && !isset($_SESSION['user_username'])){
    header("Location: ./student_login.php");
    exit();
  }

require("./database/dbconnect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT DASHBOARD</title>

    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/student.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		body{
      font-family: 'Arial';
			background-color: #dfe6e9;
		}
		#header{
			height: 8%;
			width: 99%;
			top: 2%;
			background-color: #b2bec3;
			border: solid 2px black;
			border-radius: 10px;
			color: black;
		}
		#header:hover{
			-webkit-box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
            -moz-box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
            box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
		}
		#left_side{
			padding-top:10px;
			background-color: #b2bec3;
			width: 15%;
			top: 25%;
			position: fixed;
      overflow: scroll;
			border: solid 2px black;
			border-radius: 10px;
			padding-bottom:10px;
		}
		#left_side:hover{
            -webkit-box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
            -moz-box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
            box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
        }
		#right_side{
			height: auto;
			width: 80%;
			background-color: #b2bec3;
			position: absolute;
			left: 17%;
			top: 21%;
			color: red;
			border: solid 2px black;
			border-radius: 10px;
      padding-bottom: 20px;
		}
		#right_side:hover{
            -webkit-box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
            -moz-box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
            box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
        }

		#top_span{
			top: 15%;
			width: 80%;
			left: 17%;
			position: fixed;
		}
		#btn{
			border-radius: 5px;
			background-color: #dfe6e9;
			width:150px

		}

		#btn:hover{
			-webkit-box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
            -moz-box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
            box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
		}
		#td{
			border: 1px solid black;
			padding-left: 2px;
			text-align: left;
			width: 200px;
		}

		#btn1{
			border-radius: 5px;
			background-color: #dfe6e9;
		}

		@media screen and (max-width: 550px) {
			#btn{
				width:50px;
				font-size:4px;

			}
			#btn1{
				font-size:8px
			}
			#left_side{
				width: 12%;
				padding-top:30px;
			}
			#right_side{
				font-size:8px
			}

		}
	</style>
    <?php
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"aca");
    ?>
</head>
<body>
    <div id="header" class="student-header">
        <br>
        <div>
          <strong><center>STUDENT MANAGEMENT AND ACADEMIC SYSYTEM</center>
          <center></strong>E-mail:<?php echo $_SESSION['user_email'];?> &nbsp; &nbsp; &nbsp; Name:<?php echo $_SESSION['user_username'];?>&nbsp; &nbsp;</center>
        </div>
         <ul>
          <li><a href="#">Home</a></li>
          <li><a href="./profile/profile.php">Profile</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
		<br>
    </div>
    <span id="top_span"><marquee >if there is any problem plz contact to management group</marquee></span>
   	<div id="left_side">
       <form action=""method="post">
		<center>
            <table>
              <tr>
                    <td>
                        <input type="submit" name="subjects" value="SUBJECTS" id="btn"><br><br>
                    </td>
                </tr>
                 <tr>
                    <td>
                       <input type="submit" name="my_homework" value="MY HOMEWORK" id="btn"><br><br>
                    </td>
                </tr>
                 <tr>
                    <td>
                        <input type="submit" name="assessments" value="ASSESSMENTS" id="btn"><br><br>
                    </td>
                </tr>
                 <tr>
                    <td>
                        <input type="submit" name="attach" value="ATTACH HOMEWORK" id="btn"><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="faq" value="FAQ" id="btn"><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="search_student" value="SEARCH STUDENT" id="btn"><br><br>
                    </td>
                </tr>
				<tr>
                    <td><br>
                        <input type="submit" name="search_teacher" value="SEARCH TEACHER" id="btn"><br><br>
                    </td>
                </tr>
				<tr>
                    <td><br>
                        <input type="submit" name="search_result" value="SEARCH RESULT" id="btn"><br><br>
                    </td>
                </tr>
            </table>
		</center>
        </form>
   	</div>
       <div id="right_side"><br><br>
        <div id="demo">




        <?php
        if(isset($_POST['subjects'])){
          ?>
          <center>
              load subjects
          </center>

          <?php
        }

        ?>
        <?php
        if(isset($_POST['my_homework'])){

        ?>

          <form action="" class="search_filter">
            <div class="container">
              <input type="search" name="search_filter" id="search" placeholder="Filter by semester">
              <button type="submit" name="button_filter">Filter</button>
            </div>
          </form>

          <div class="box__section">
            <div class="container">
              <div class="box__wrapper">
            <?php
              include("./repositories/homework-repository.php");
              include("./models/homework.php");
              $homework_repository = new homework_repository();
              $homeworks = $homework_repository->getAll();

              foreach($homeworks as $homework) {?>
                <div class="box">
                  <div class="box__wrapper--ins">
                    <div class="box__assigment">

                      <span>Assigment Due <?php echo $homework->getDeadline();?></span>
                    </div>
                    <div class="box__info">
                      <div class="box__number">
                        <!-- ID OF HOMEWORK -->
                        <span><?php echo "ID: " . $homework->getId();?></span>
                      </div>
                      <div class="box__title">
                        <h4><a href="./my-homework/my-homework.php?id=<?php echo $homework->getId();?>"><?php
                          echo $homework->getName();
                        ?></a></h4>
                        </div>
                    </div>
                  </div>
                </div>

                <?php }?>

              </div>
            </div>
          </div>

          <?php
        }
        ?>
        <?php
        if(isset($_POST['assessments'])){
          ?>

          <table class="assessments">
            <tr>
              <th>Homework Result ID</th>
              <th>Student Name</th>
              <th>Homework Name</th>
              <th>Homework Points</th>
              <th>Delivered on time</th>
              <th>Homework Date</th>
            </tr>
            <?php
              include("./repositories/homework-result-repository.php");
              include("./models/homework-result.php");
              $homework_results = getAll();
              foreach ($homework_results as $result) {

              ?>
            <tr>
              <td><?php echo $result->getId();?></td>
              <td><?php echo $result->getStudent_id();?></td>
              <td><?php echo getName($result->getId());?></td>
              <td><?php echo $result->getPoints();?></td>
              <td><?php echo $result->getDelivered_on_time();?></td>
              <td><?php echo $result->getResult_date();?></td>
            </tr>
            <?php
              }
            ?>
          </table>

          <?php
        }
        ?>

        <?php
        if(isset($_POST['attach'])){
          ?>
          <form action="" class="attach">
            <div class="select__subject">
              <label for="subject">Choose a subject:</label>
              <?php

                  include("./repositories/subject-repository.php");
                  include("./models/subject.php");
                  $s = new subject_repository();
                  $subjects = $s->getAll();
                  ?>
              <select name="subject" id="subject">

          <?php
                foreach ($subjects as $subject) {
                    ?>
                     <option value="<?echo strtolower($subject->getName()); ?>"><?php echo $subject->getName();?></option>

                    <?php
                  }

                ?>
              </select>
            </div>
            <div class="select__semester">
              <label for="semester">Choose a semester:</label>
              <select name="semester" id="semester">
                <option value="volvo">Volvo</option>
                <option value="saab">Saab</option>
                <option value="opel">Opel</option>
                <option value="audi">Audi</option>
              </select>
            </div>
            <div class="select__homework">
              <label for="homework">Choose a homework:</label>

              <?php
              //  echo   count($homeworks);
              ?>
              <select name="homework" id="homework">


                  <option value="audi">Audi</option>

              </select>
            </div>


            <div class="textarea__description">
              <textarea placeholder="Enter description" name="description" id="description" cols="30" rows="10"></textarea>

            </div>

            <input type="file">
            <br><br>
            <input type="submit" class="attach-button" value="Attach">
          </form>

          <?php
        }
        ?>
        <?php
        if(isset($_POST['faq'])){
          ?>
          <section class="faq">
            <div class="container">
      <h2>Frequently Asked Questions</h2>
            <div class="faq__input">
              <form action="" class="faq__register">
                <textarea name="register-faq" id="register-faq" placeholder="Type your question here"></textarea>
                <input type="submit" value="Post">
              </form>
            </div>
      <div class="accordion">
        <div class="accordion-item">
          <button id="accordion-button-1" aria-expanded="false">
            <span class="accordion-title">Why is the moon sometimes out during the day?</span>
            <span class="icon" aria-hidden="true"></span>
          </button>
          <div class="accordion-content">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut.
              Ut tortor pretium viverra suspendisse potenti.
            </p>
          </div>
        </div>
        <div class="accordion-item">
          <button id="accordion-button-2" aria-expanded="false">
            <span class="accordion-title">Why is the sky blue?</span>
            <span class="icon" aria-hidden="true"></span>
          </button>
          <div class="accordion-content">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut.
              Ut tortor pretium viverra suspendisse potenti.
            </p>
          </div>
        </div>
        <div class="accordion-item">
          <button id="accordion-button-3" aria-expanded="false">
            <span class="accordion-title">Will we ever discover aliens?</span>
            <span class="icon" aria-hidden="true"></span>
          </button>
          <div class="accordion-content">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut.
              Ut tortor pretium viverra suspendisse potenti.
            </p>
          </div>
        </div>
        <div class="accordion-item">
          <button id="accordion-button-3" aria-expanded="false">
            <span class="accordion-title">Will we ever discover aliens?</span>
            <span class="icon" aria-hidden="true"></span>
          </button>
          <div class="accordion-content">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut.
              Ut tortor pretium viverra suspendisse potenti.
            </p>
          </div>
        </div>
      </div>
    </div>
    <script>
      const items = document.querySelectorAll('.accordion button');
          function toggleAccordion() {
            const itemToggle = this.getAttribute('aria-expanded');

            for (i = 0; i < items.length; i++) {
              items[i].setAttribute('aria-expanded', 'false');
            }

            if (itemToggle == 'false') {
              this.setAttribute('aria-expanded', 'true');
            }
          }

          items.forEach((item) => item.addEventListener('click', toggleAccordion));

    </script>
      </section>

          <?php
        }
        ?>
            <?php
				if(isset($_POST['search_student']))
				{
					?>
					<center>
					<form action="" method="post">
					&nbsp;&nbsp;<b>Enter Roll No:</b>&nbsp;&nbsp; <input type="text" name="roll_no">
					<input type="submit" name="search_by_roll_no_for_search" value="Search">
					</form><br><br>

					</center>
					<?php
				}
				if(isset($_POST['search_by_roll_no_for_search']))
				{
					$query = "select * from students where roll_no = '$_POST[roll_no]'";
					$query_run = mysqli_query($connection,$query);
					while ($row = mysqli_fetch_assoc($query_run))
					{
						?>
						<center><h4><b><u>Student's details</u></b></h4><br><br>
							<table>
								<tr>
									<td>
										<b>Roll No: &nbsp; &nbsp;&nbsp;</b>
									</td>
									<td>
										<input type="text"   id="btn1" value="<?php echo $row['roll_no']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Name: &nbsp; &nbsp;&nbsp;</b>
									</td>
									<td>
										<input type="text"   id="btn1" value="<?php echo $row['name']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Father's Name: &nbsp; &nbsp;&nbsp;</b>
									</td>
									<td>
										<input type="text"   id="btn1" value="<?php echo $row['father_name']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Class: &nbsp; &nbsp;&nbsp;</b>
									</td>
									<td>
										<input type="text"   id="btn1" value="<?php echo $row['class']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Mobile: &nbsp; &nbsp;&nbsp;</b>
									</td>
									<td>
										<input type="text"   id="btn1" value="<?php echo $row['mobile']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Email: &nbsp; &nbsp;&nbsp;</b>
									</td>
									<td>
										<input type="text"   id="btn1" value="<?php echo $row['email']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Password: &nbsp; &nbsp;&nbsp;</b>
									</td>
									<td>
										<input type="password"  id="btn1"  value="<?php echo $row['password']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Remark:&nbsp; &nbsp;&nbsp;</b>
									</td>
									<td>
										<textarea rows="3" cols="40"   id="btn1" disabled><?php echo $row['remark']?></textarea>
									</td>
								</tr>
							</table>
						</center>
						<?php

					}
				}
			?>
			<?php
                if(isset($_POST['search_teacher']))
                {
                    ?>
                    <center>
                    <form action="" method="post">
                    &nbsp;&nbsp;<b>Enter Teacher's name:</b>&nbsp;&nbsp; <input type="text" name="teacher_name">
                    <input type="submit" name="search_by_roll_no_for_search_teacher" value="Search">
                    </form><br><br>

                    </center>
                    <?php
                }
                if(isset($_POST['search_by_roll_no_for_search_teacher']))
                {
                    $query = "select * from teachers where teacher_name = '$_POST[teacher_name]'";
                    $query_run = mysqli_query($connection,$query);
                    while ($row = mysqli_fetch_assoc($query_run))
                    {
                        ?>

                        <center><h4><b><u>Teacher's details</u></b></h4><br><br>
                            <table>
                            <tr>
                                <td>
                                    <b>Name: &nbsp; &nbsp;&nbsp;</b>
                                </td>
                                <td>
                                    <input type="text"   id="btn1" value="<?php echo $row['teacher_name']?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Class Teacher: &nbsp; &nbsp;&nbsp;</b>
                                </td>
                                <td>
                                    <input type="text"   id="btn1" value="<?php echo $row['class_teacher']?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Subject: &nbsp; &nbsp;&nbsp;</b>
                                </td>
                                <td>
                                    <input type="text"   id="btn1" value="<?php echo $row['teacher_subject']?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Mobile: &nbsp; &nbsp;&nbsp;</b>
                                </td>
                                <td>
                                    <input type="text"   id="btn1" value="<?php echo $row['mobile_no']?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Email: &nbsp; &nbsp;&nbsp;</b>
                                </td>
                                <td>
                                    <input type="text"   id="btn1" value="<?php echo $row['email']?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Password: &nbsp; &nbsp;&nbsp;</b>
                                </td>
                                <td>
                                    <input type="password"   id="btn1" value="<?php echo $row['password']?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Gender: &nbsp; &nbsp;&nbsp;</b>
                                </td>
                                <td>
                                    <input type="text"   id="btn1" value="<?php echo $row['gender']?>" disabled>
                                </td>
                            </tr>
                        </table>
                    </center>
                    <?php
                    }
                }
            ?>
			<?php
			if(isset($_POST['search_result']))
			{
				?>
				<center>
				<form action="" method="post">
				&nbsp;&nbsp;<b>Enter Roll No:</b>&nbsp;&nbsp; <input type="text" name="roll_no">
				<input type="submit" name="search_by_roll_no_for_result_search" value="Search">
				</form><br><br>

				</center>
				<?php
			}
			if(isset($_POST['search_by_roll_no_for_result_search']))
			{
				$query = "select * from results where roll_no = '$_POST[roll_no]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run))
				{
					?>
					<center><h4><b><u>Student's result</u></b></h4><br><br>
						<table>
							<tr>
								<td>
									<b>Roll No: &nbsp; &nbsp;&nbsp;</b>
								</td>
								<td>
									<input type="text"   id="btn1" value="<?php echo $row['roll_no']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Name: &nbsp; &nbsp;&nbsp;</b>
								</td>
								<td>
									<input type="text"   id="btn1" value="<?php echo $row['name']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>	English: &nbsp; &nbsp;&nbsp;</b>
								</td>
								<td>
									<input type="text"   id="btn1" value="<?php echo $row['English']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>	Biology: &nbsp; &nbsp;&nbsp;</b>
								</td>
								<td>
									<input type="text"   id="btn1" value="<?php echo $row['Biology']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Chemistry: &nbsp; &nbsp;&nbsp;</b>
								</td>
								<td>
									<input type="text"   id="btn1" value="<?php echo $row['Chemistry']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Physics: &nbsp; &nbsp;&nbsp;</b>
								</td>
								<td>
									<input type="text"   id="btn1" value="<?php echo $row['Physics']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Mathematics: &nbsp; &nbsp;&nbsp;</b>
								</td>
								<td>
									<input type="text"   id="btn1" value="<?php echo $row['Mathematics']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Computer-Sciences: &nbsp; &nbsp;&nbsp;</b>
								</td>
								<td>
									<input type="text"   id="btn1" value="<?php echo $row['ComputerSciences']?>" disabled>
								</td>
							</tr>
						</table>
					</center>
					<?php
				}
			}
		?>
         </div>
    </div>
</body>
</html>
