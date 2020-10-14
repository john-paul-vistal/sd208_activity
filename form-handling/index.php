<?php 

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "records";


$conn = mysqli_connect($serverName,$userName,$password,$dbName);

if(!$conn){
    die("Connection Failed: ".mysqli_error());
}


$emailError = null;


//Adding Data

if(isset($_POST["save"])){

   $fName =  trim($_POST['firstName']);
   $LName =  trim($_POST['lastName']);

   if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
       $email = $_POST['email'];
   }else{
       $emailError = "Must be a valid email";
   }

   $password = $_POST['password'];


   if(!$emailError != null){
    $sql = "INSERT INTO users_records (fName,lName,email,password) VALUES ('$fName','$LName','$email','$password')";

    if(mysqli_query($conn,$sql)){
        mysqli_close($conn);
    header("Location:records.php");
    }else{
        echo "Error".$sql."<br>".mysqli_error($conn);
    }
    
   
   }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form class="form" action="index.php" method="POST">
        <h1 style="margin-top:60px;margin-bottom: 60px;">Registration Form</h1>
        <label for="">First Name</label>
        <input type="text" name="firstName" required>
        <label for="">Last Name</label>
        <input type="text" name="lastName" required>
        <label for="">Email</label>
        <input type="email" name="email" required>
        <label for="">Password</label>
        <input type="text" name="password" required>
        <button class="btn" type="submit" name="save">Save</button>
        <a href="records.php"><h4 style= "margin-top:150px">Proceed to records</h4></a>
    </form>



</body>

</html>