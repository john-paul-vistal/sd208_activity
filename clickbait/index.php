<?php

$clickbait_words = array("scientists","doctors","hate","stupid","weird","simple","tricked",
"shocked me","you'll never believe","hack","epic","unbelievable");

$replacement_words = array("so-called scientists","so-called doctors","arent threated by","average",
"completely normal","ineffective","method","is no different than the others",
"you won't really be surprised by","slightly improve","boring","normal");


function clickbait_words($clickbait_words,$replacement_words,$headline){
    $honest_headline = $headline;
    $parts = explode(' ', $headline);
    foreach($parts as $words){
        foreach($clickbait_words as $lie_words){
            if($words == $lie_words){
                $index =  array_search($lie_words,$clickbait_words);
                $honest_headline = str_replace($words,$replacement_words[$index],$honest_headline);
            }
        }
    }
    return $honest_headline;
}

if(isset($_POST["change"])){
    $original = $_POST['headline'];
    $honest =  clickbait_words($clickbait_words,$replacement_words,strtolower($_POST["headline"]));
}

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Click Bait Headlines</title>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <div class="card">
            <form action="index.php" method="POST">
                <div class="header">
                    <h1>Honest Headline Generator</h1>
                </div>
                <label for="">Headline</label>
                <input name="headline" class="textbox" type="text" placeholder="Paste a click bait headline" required>
                <button name="change" type = "submit" class="btn">Change Headline</button>
            </form>
            <div style = "margin-top:100px;">
                <label for="">Original Headline</label>
                <input class="textbox" type="text" value="<?php echo $original??''?>" readonly>
                <label for="">Honest Headline</label>
                <input class="textbox" type="text" value="<?php echo $honest??''?>" readonly>
            </div>
        </div>
    </body>

    </html>