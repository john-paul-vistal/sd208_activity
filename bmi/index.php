<?php
session_start();
$error1;
$error2;
if(isset($_POST['compute'])){
    if(is_numeric($_POST['weight']) && is_numeric($_POST['height'])){
        $bmi = $_POST['weight']/($_POST['height']/100)**2;
        $_SESSION['bmi'] = $bmi;
        header("Location:result.php");
    }else{
        if(!is_numeric($_POST['weight'])){
            $error1 = "PLEASE INPUT A VALID NUMBER";
        }
        if(!is_numeric($_POST['height'])){
            $error2 = "PLEASE INPUT A VALID NUMBER";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate BMI</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
        <form action="index.php" method = "POST">
            <div class="form">
                <h1 class="title">BMI CALCULATOR</h1>
                <label for="">Weight (kg)</label>
                <span style="margin-left:50%;color:red"><?php echo $error1??""?></span>
                <input name = "weight" type="number" min="0" required>
                <label for="">Height (cm)</label>
                <span style="margin-left:50%;color:red"><?php echo $error2??""?></span>
                <input name = "height" type="number" min="0" required>
                <button name = "compute" class="btn right-btn">Compute BMI</button>
            </div>
        </form>
    </div>
</body>

</html>