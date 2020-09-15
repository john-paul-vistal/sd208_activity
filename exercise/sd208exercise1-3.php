<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fizz Buzz</title>
</head>
<body>
<?php
    function fizzBuzz(){
        for($i = 1;$i <=100; $i++){

            if($i % 3 == 0 && $i % 5 == 0){
                echo "<p>Fizz Buzz</p>";
            }else if( $i % 3 == 0){
                echo "<p>Fizz</p>";
            }else if($i % 5 == 0){
                echo "<p>Buzz</p>";
            }else{
                echo "<p>$i<p>";
            }
        }
    }

    fizzBuzz();
?>
    
</body>
</html>