<?php
$insert = false;
if(isset($_POST['name'])){
$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);

if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());

}
//echo "Success connection to the DB";
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$number = $_POST['number'];
$desc = $_POST['desc'];
$sql= "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `number`, `desc`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$number', '$desc', current_timestamp());";
//echo $sql;

if($con->query($sql)== true){
    //echo "Successfully inserted";
    $insert = true;
}
else{
    echo"ERROR: $sql <br> $con->error";
}
$con->close();
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lets go to Dubai</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Caveat&family=Foldit:wght@300&family=Young+Serif&display=swap"
      rel="stylesheet"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Caveat&family=Foldit:wght@300&family=Roboto&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <img class="bg" src="imaggg.avif" alt="dubai" />
    <div class="container">
      <h1>Welcome To Dubai</h1>
      <p>Enter your detail to confirm your registration</p>
      <?php
      if($insert == true){
      echo "<p class='submitmsg'>Thanks for submitting your form. Happy to see you there</p>";
    }
      ?>
      <form action="index.php" method="post">
        <input
          type="text"
          name="name"
          id="name"
          placeholder="Enter your name"
        />
        <input type="text" name="age" id="age" placeholder="Enter your age" />
        <input
          type="text"
          name="gender"
          id="gender"
          placeholder="Enter your gender"
        />
        <input
          type="email"
          name="email"
          id="email"
          placeholder="email@gmail.com"
        />
        <input
          type="number"
          name="number"
          id="number"
          placeholder="Enter your mobile number"
        />
        <textarea
          name="desc"
          id="desc"
          cols="30"
          rows="10"
          placeholder="Some text..."
        ></textarea>
        <button class="btn">Submit</button>
      </form>
    </div>
    <script src="index.js"></script>
  </body>
</html>

