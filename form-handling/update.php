<?php 


$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "records";


$conn = mysqli_connect($serverName,$userName,$password,$dbName);

if(!$conn){
    die("Connection Failed: ".mysqli_error());
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM users_records WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
}


$emailError = null;


//Update Data

if(isset($_POST["update"])){
   $id = $_POST['id'];
   $fName =  trim($_POST['firstName']);
   $LName =  trim($_POST['lastName']);

   if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
       $email = $_POST['email'];
   }else{
       $emailError = "Must be a valid email";
   }

   $password = $_POST['password'];


   if(!$emailError != null){
    echo $id;
    $sql = "UPDATE users_records SET fName = '$fName', lName = '$LName',email = '$email',password = '$password' WHERE id = '$id'";

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
    <title>Update Records Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form class="form" action="update.php" method="POST">
        <?php
         if(mysqli_num_rows($result)<= 0):
            echo "<p><b>Records Not Found!</b></p>";
        else:

            while($row = mysqli_fetch_assoc($result)):
         
         ?>
        <h1 style="margin-top:60px;margin-bottom: 60px;">Update Records Form</h1>
        <input type="hidden" name = "id" value = "<?php echo $row['id']?>">
        <label for="">First Name</label>
        <input type="text" name="firstName" value = "<?php echo $row['fName']?>" required>
        <label for="">Last Name</label>
        <input type="text" name="lastName" value = "<?php echo $row['lName']?>" required>
        <label for="">Email</label>
        <input type="email" name="email" value = "<?php echo $row['email']?>" required>
        <label for="">Password</label>
        <input type="text" name="password" value = "<?php echo $row['password']?>" required>
        <button class="btn" type="submit" name="update">Update</button>
        <a href="records.php"><h4 style= "margin-top:150px">Back to records</h4></a>
         <?php endwhile; endif?>
    </form>



</body>

</html>