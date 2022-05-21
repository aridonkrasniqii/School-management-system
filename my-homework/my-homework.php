<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT DASHBOARD</title>

    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/student.css">
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
			height: 75%;
			width: 80%;
			background-color: #b2bec3;
			position: fixed;
			left: 17%;
			top: 21%;
			color: red;
			border: solid 2px black;
			border-radius: 10px;
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
        session_start();
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"aca");
    ?>
</head>
<body>
    <section class="homework">
  <div class="homework__wrapper">
    <div class="container">
      <div class="homework__heading">
        <!-- Emri i detyres -->
        <h3>Homework Information</h3>
      </div>
      <div class="homework__description">
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perspiciatis magnam dolore dolorem. Non eveniet dolores, inventore accusantium exercitationem aliquam nihil voluptas facilis? Ullam explicabo temporibus deleniti debitis quia reiciendis eaque.</p>
      </div>
      <div class="homework__maxpoints">
        <!-- Piket maksimale -->
        <span>100</span>
      </div>
      <div class="homework__date">
        <!-- Data e leshimit te detyres -->
        <span>23/15/2021</span>
      </div>
      <div class="homework__deadline">
        <span>25/15/2021</span>
      </div>
      <div class="homework__createdby">
        <!-- Teacher -->
        <span>Aridon Krasniqi</span>
      </div>
      <div class="homework__button">
        <a href="../student_dashboard.php">Back</a>
      </div>
    </div>
  </div>
</section>
</body>
</html>
