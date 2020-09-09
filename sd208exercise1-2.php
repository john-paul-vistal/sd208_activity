<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Count Words</title>
</head>
<body>
<?php
  function countWords($str){
    $newArray = [];
    $count = 0;
    $keywords = preg_split("/[\s,]+/",strtolower($str));
    foreach($keywords as $wordRef){
        foreach($keywords as $wordLoop){
            if($wordRef == $wordLoop){
                $count++;
            }
        }
        $newArray[$wordRef] = $count;
        $count = 0;
    }
    print_r($newArray);
    
  }
  countWords("The Quick Little Brown Fox jumps over the Lazy dog");
?>
    
</body>
</html>