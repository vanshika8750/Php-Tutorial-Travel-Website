<?php
$insert=false;
if(isset($_POST['name'])){
    // set connection variables
$server="localhost";
$username="root";
$password="";

// connecting to database
$con=mysqli_connect($server,$username,$password);
// check for conn success
if(!$con){
    die("connection to this databe failed due to".
    mysqli_connect_error());
}
// echo "success connecting to the db";

// inserting data in sql
// collect post variables
$name=$_POST['name'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$desc=$_POST['desc'];

$sql="INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
// echo $sql;
// execute query
// insert the entered data in database mysql
if($con->query($sql)==true){
    // echo "Successfully inserted";
    // flag for successful insertion
    $insert=true;
}
else{
    echo "ERROR: $sql <br> $conn->error";
}

// close the database connection after your work
$con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to IIT Roorkee Trip</h1>
        <p>Enter your details and submit this form to confirm yout prticipation in the trip</p>
        <?php
        if($insert==true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your mobile number">
            <textarea name="desc" id="desc" placeholder="Enter any other information here" cols="30" rows="10"></textarea>
            <button class="btn">submit</button>
        </form>

    </div>
    <script src="index.js"></script>
    
</body>
</html>