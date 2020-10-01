<?php
include "handler.php";

if(isset($_POST['close'])){
    $status = "none";
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
    <div>
        <form action="index.php" method="POST">
            <div class="form">
                <div class="holder">
                    <div class="image-top">
                        <img class="image" src="profile.png" alt="">
                    </div>
                </div>
                <h1 class="title">Registration Form</h1>
                <label for="">First Name</label>
                <span style="margin-left:35%;color:#d62424"><?php echo $fnameError??""?></span>
                <input name="fname" type="text" value = "<?php echo $fname??""?>" required>
                <label for="">Last Name</label>
                <span style="margin-left:35%;color:#d40606"><?php echo $lnameError??""?></span>
                <input name="lname" type="text" value = "<?php echo $lname??""?>" required>
                <label for="">Email</label>
                <span style="margin-left:40%;color:#d40606"><?php echo $emailError??""?></span>
                <input name="email" type="text" value = "<?php echo $email??""?>" required>
                <label for="">Address</label>
                <span style="margin-left:40%;color:#d40606"><?php echo $error2??""?></span>
                <input name="address" type="text" value = "<?php echo $address??""?>" required>
                <button name="submit" class="btn right-btn">Submit</button>
            </div>
        </form>
    </div>
    <div class="modal" style = "display:<?php echo $status??"none"?>">
    <form action="index.php" method ="POST">
        <button name ="close" type ="submit" style = "position:absolute;color:red;right:0px;font-size:30px;background:transparent;border:none">X</button>
    </form>
    <h1 style = "text-align:center;color:white">Information Recorded</h1>
    <h3 style ="margin-left:100px;color:white">First Name: <?php echo $fname?></h3>
    <h3 style ="margin-left:100px;color:white">Last Name: <?php echo $lname?></h3>
    <h3 style ="margin-left:100px;color:white">Email: <?php echo $email?></h3>
    <h3 style ="margin-left:100px;color:white">Address: <?php echo $address?></h3>
    </div>
</body>

</html>