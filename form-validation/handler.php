<?php

$fname = "";
$lname= "";
$email= "";
$address= "";

$emailError = null;
$fnameError = null;
$lnameError = null;

if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $address = trim($_POST['address']);

   if(strlen(trim($fname)) < 2){
       $fnameError = "First name must contain atleast two character!";
   }else if(strlen(trim($fname)) > 25){
        $fnameError = "First name should not exced in 25 character!";
   }

   if(strlen(trim($lname)) < 2){
       $lnameError = "Last name must contain atleast two character!";
   }else if(strlen(trim($lname)) > 25){
        $lnameError = "Last name should not exced in 25 character!";
   }

   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       $emailError = "Must be a valid email!";
   }

   if($emailError == null && $fnameError == null && $lnameError == null ){
        $status = "block";
   }


}




?>