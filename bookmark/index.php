<?php
session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Mark</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Book Mark</h1>
        <form action="action.php" method ="POST">
            <label for="">TITLE</label>
            <input name="title" type="text" required>
            <label for="">URL</label>
            <input name="url" type="text" required>
            <br>
            <button class="btn" name="save">Save Bookmark</button>
        </form>
        <form action="action.php" method = "POST">
            <button name = "clearAll" type="submit" class = "btn-clear">Clear All</button>
        </form>
        <div style="margin-top:60px">
            <ul class="responsive-table">
                <li class="table-header">
                    <div class="col col-1">TITLE</div>
                    <div class="col col-2">URL</div>
                    <div class="col col-3"></div>
                </li>
                <?php
                    if(!isset($_SESSION['bookmarks'])):
                        echo "<h2>Bookmark list is empty!<h2>";
                    else:
                        foreach($_SESSION['bookmarks'] as $data):
                ?>
                <li class="table-row table-content">
                    <div class="col col-1" data-label="Job Id"><?php echo $data['title']?></div>
                    <div class="col col-2" data-label="Customer Name"><a href="<?php echo $data['url']?>"><?php echo $data['url']?></a></div>
                    <form action="action.php" method = "POST">
                        <input name = "id" type="hidden" value = "<?php echo array_search($data,$_SESSION['bookmarks'])?>">
                        <div data-label="Amount"><button name="remove" class="btn-sm">X</button></div>
                    </form>
                </li>
                <?php endforeach ; endif?>
        </div>
    </div>
</body>

</html>