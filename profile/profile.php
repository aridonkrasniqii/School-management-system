<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROFILE DASHBOARD</title>

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
</head>
<body>
<section class="profile">
  <div class="container">
    <div class="profile__wrapper">
      <div class="profile__title">
        <h3>Settings</h3>
      </div>
      <div class="profile__inputs">
        <form action="">
          <div class="profile__inputs--name">
            <label for="name">Your name</label>
            <input type="text">
          </div>
          <div class="profile__inputs--username">
            <label for="name">Your username</label>
            <input type="text">
          </div>
          <div class="profile__inputs--email">
            <label for="name">Your email address</label>
            <input type="text">
          </div>
          <div class="profile__inputs--password">
            <label for="name">Your password</label>
            <input type="password">
          </div>
          <div class="profile__inputs--index">
            <label for="name">Your index</label>
            <input type="text">
          </div>
          <button type="submit">Save updates</button>
        </form>
      </div>
      <div class="profile__button">
        <a href="../student_dashboard.php">Go Back</a>
      </div>
    </div>
  </div>
</section>
</body>
</html>


