<?php
session_start();

$bookmark_array = [];

if(isset($_POST['save'])){
    $title = $_POST['title'];
    $url = $_POST['url'];
    $info = ["title"=>$title,"url"=>$url];
    $bookmark_array[] = $info;

    if(isset($_SESSION['bookmarks'])){
        array_push($_SESSION['bookmarks'],$info);
    }else{
        $_SESSION['bookmarks'] = $bookmark_array;
    }

    // unset($_SESSION['bookmarks']);
    header("Location:index.php");
}


if(isset($_POST['remove'])){
    echo "helllo";
    array_splice($_SESSION['bookmarks'],$_POST['id'],1);
    header("Location:index.php");
}


if(isset($_POST['clearAll'])){
    unset($_SESSION['bookmarks']);
    header("Location:index.php");
}

?>