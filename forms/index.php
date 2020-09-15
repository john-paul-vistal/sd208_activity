<?php
session_start();

if(isset($_GET['submit'])){
    $_SESSION['username'] = $_GET['username'];
    $_SESSION['password'] = $_GET['password'];
    $_SESSION['image'] = $_GET['image'];
    $_SESSION['name'] = $_GET['name'];
    $_SESSION['email'] = $_GET['email'];
    $_SESSION['age'] = $_GET['age'];
    $_SESSION['gender'] = $_GET['gender'];
    $_SESSION['birthdate'] = $_GET['birthdate'];
    $_SESSION['phoneNumber'] = $_GET['phoneNumber'];
    $_SESSION['address'] = $_GET['address'];
    $_SESSION['school'] = $_GET['school'];
    header('Location:login.php');
}
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration Form</title>
        <link rel="stylesheet" href="src/css/style.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>

    <body style="background: rgb(233, 233, 231);">
        <div class="container">
            <h3 style="position: relative;" class="mt-3">Registration Form</h3>
            <hr>
            <form mehtod="GET" action="index.php">
                <div class="box mt-3 text-white bg-primary pt-3 pb-3 pr-5 rounded">
                    <h4 class="ml-3 mb-4">INFORMATION SHEET</h4>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">
                                <img id="profile" class="bg-white rounded ml-2" src="src/img/profile.png" alt="Profile" style="width:300px;height:300px;margin-top:10px;">
                                <div class="input-group mt-2">
                                    <select id="avatar" name="image" style="border:none;border-bottom:solid #ebe8e8 1px;border-radius:0%;color:white" class="custom-select bg-transparent" id="inputGroupSelect01">
                                      <option style="color:#4e4d4d" value="profile.png" selected>Choose Avatar.....</option>
                                      <option style="color:#4e4d4d" value="avatar1.png">AVATAR 1</option>
                                      <option style="color:#4e4d4d" value="avatar2.png">AVATAR 2</option>
                                      <option style="color:#4e4d4d" value="avatar3.png">AVATAR 3</option>
                                      <option style="color:#4e4d4d" value="avatar4.png">AVATAR 4</option>
                                      <option style="color:#4e4d4d" value="avatar5.png">AVATAR 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="inputBox">
                                                <input type="text" name="username" required value="">
                                                <div class="line"></div>
                                                <label>Username</label>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="inputBox">
                                                <input type="password" name="password" required value="">
                                                <div class="line"></div>
                                                <label>Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inputBox">
                                        <input type="text" name="name" required value="">
                                        <div class="line"></div>
                                        <label>Name</label>
                                    </div>
                                    <div class="inputBox">
                                        <input type="text" name="email" required value="">
                                        <div class="line"></div>
                                        <label>Email</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="inputBox">
                                                <input type="text" name="age" required value="">
                                                <div class="line"></div>
                                                <label>Age</label>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="inputBox">
                                                <label style="margin-top: -27px;font-size:.75rem;">Gender</label>
                                                <select style="border:none;border-bottom:solid #ebe8e8 1px;border-radius:0%;color:white" class="bg-transparent custom-select mt-2" id="gender" name="gender">
                                                        <option style="color:#4e4d4d" selected>Choose....</option>
                                                        <option style="color:#4e4d4d" value="Male">MALE</option>
                                                        <option style="color:#4e4d4d" value="Female">FEMALE</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="inputBox">
                                                <label style="margin-top: -27px;font-size:.75rem;">Birthdate</label>
                                                <input type="date" name="birthdate" required value="">
                                                <div class="line"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="inputBox">
                                                <input type="text" name="phoneNumber" required value="">
                                                <div class="line"></div>
                                                <label>Phone Number</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inputBox">
                                        <input type="text" name="address" required value="">
                                        <div class="line"></div>
                                        <label>Address</label>
                                    </div>
                                    <div class="inputBox">
                                        <input type="text" name="school" required value="">
                                        <div class="line"></div>
                                        <label>School</label>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <input class="px-4" type="submit" name="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script>
            $("#avatar").on('change', function() {
                let value = $("#avatar").val()
                $('#profile').attr('src', "src/img/" + value);
            });
        </script>
    </body>

    </html>