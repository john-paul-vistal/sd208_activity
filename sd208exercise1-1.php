<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess Board</title>
</head>

<style>
.square{
    display:inline-block;
    width:100px;
    height:100px;
    margin-top:-4px;
}
.black{
    border:solid black 1px;
    background-color:black;
}
.white{
    border:solid black 1px;
    background-color:white;
}
</style>
<body>
<?php 
$switch = false;
for($x = 0;$x < 8; $x++){
    if($switch == false){
        for($i = 0;$i < 8;$i++){
            if($i % 2 == 0){
                echo '<div class = "square black"></div>';
            }else{
                echo '<div class = "square white"></div>';
            }
        }
    }else{
        for($i = 0;$i < 8;$i++){
            if($i % 2 == 0){
                echo '<div class = "square white"></div>';
            }else{
                echo '<div class = "square black"></div>';
            }
        }
    }
    echo "<br>";
    if($switch == false){
        $switch = true;
    }else{
        $switch = false;
    }
}
?>

    
</body>
</html>