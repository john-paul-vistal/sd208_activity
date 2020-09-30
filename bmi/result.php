<?php
session_start();
$bmi = $_SESSION['bmi'];

if($bmi < 18.5){
    $category = "Underweight";
}else if($bmi >= 18.5 && $bmi <= 24.9){
    $category = "Normal Weight";
}else if($bmi >= 25 && $bmi <= 29.9){
    $category = "Overweight";
}else{
    $category = "Obese";
}

if(isset($_POST['back'])){
    header("Location:index.php");
}

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Result</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <form action="result.php" method = "POST">
            <div class="form">
                <h1 class="title" style ="text-align:center">YOUR BMI RESULT</h1>
                <h3 style="color:white;text-align:center">BMI: <?php echo $bmi?></h3>
                <h3 style="color:white;text-align:center"><?php echo $category?></h3>
                <button name = "back" class="btn center-btn">Back to Calculator</button>
            </div>
        </form>
    </body>

    </html>