<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<style>
.brand {
  background: #cbb09c !important;
}

.brand-text {

  color: #cbb09c !important;
  font-size: 10px !important;
}

form {
  max-width: 460px;
  margin: 20px auto;
  padding: 20px;
}

.card {
  width: 100% !important;
  padding: 0px !important;
}
</style>

<body>
  <section class="container" grey-text>
    <h4 class="center">Add student</h4>
    <form action="./controllers/add-student-controller.php" method="post" class="white">
      <label for="name">Name of student: </label>
      <input type="text" name="name">
      <label for="username">Username of subject : </label>
      <input type="text" name="username">
      <label for="email">Email of student: </label>
      <input type="text" name="email">
      <label for="index">Index of student: </label>
      <input type="text" name="index">
      <div class="center">
        <input type="submit" name="add-student" value="submit" class="btn brand z-depth-0">

      </div>


    </form>


  </section>
</body>



</html>
