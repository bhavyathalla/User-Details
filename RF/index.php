<?php
$conn = mysqli_connect("localhost", "root", "", "stu");
require 'config.php';
if(isset($_POST["register"])){
  $name = $_POST["name"];
  $email = $_POST["email"];
  $age = $_POST["age"];
  $date = $_POST["date"];

  $user = mysqli_query($conn, "SELECT * FROM tt WHERE name = '$name'OR email = '$email'");
  if(mysqli_num_rows($user) > 0){
    echo
    "
    <script> alert('Username/Email Has Already Taken'); </script>
    ";
  }
  else{
    $query = "INSERT INTO tt VALUES('', '$name',  '$email', '$age', '$date')";
    mysqli_query($conn, $query);
    echo
    "
    <script> alert('Registration Successful'); </script>
    ";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
  </head>
  <body>
    <form class="" action="" method="post">
      <div class="title">
        <h2>Register</h2>
      </div>
      <div class="half">
        <div class="item">
          <label for="">Name</label>
          <input type="text" name="name" pattern="[A-Z][a-z]{1,25}" required value="">
        </div>
        
      </div>
      <div class="half">
        <div class="item">
          <label for="">Email</label>
          <input type="email" name="email" required value="">
        </div>
        <div class="item">
          <label for="">Age</label>
          <input type="number" name="age" min="1" max="200" required value="">
        </div>
      </div>
      <div class="full">
        <div class="item">
          <label for="">Date of Birth</label>
          <input type="date" name="date" required value="">
          <span class="error">*Please enter Date of Birth</span>
        </div>
      </div>
      <div class="action">
        <input type="submit" name = "register" value = "REGISTER">
      </div>
    </form>
      <table border=2px solid white width=50%, border-colapse="colapse">
        <tr bgcolor="blue">
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Age</th>
          <th>Date of birth</th>
</tr>
<?php

  $query=" SELECT * FROM `tt`";
  $result=mysqli_query($conn,$query);
  while($row=mysqli_fetch_assoc($result)){
    echo '<tr align="center">
            <td>'.$row['id'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['age'].'</td>
            <td>'.$row['date'].'</td>
            </tr>';
  }
?>
</table>
  </body>
</html>