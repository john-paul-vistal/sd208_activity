<?php
    session_start();

    if(isset($_POST['logout'])){
        header('Location:login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
    body {
        margin: 0;
        background: rgb(248, 248, 248);
        font-family: Arial, Helvetica, sans-serif;
    }
    
    .coverphoto {
        background-image: url("src/img/bg.png");
        background-size: cover;
        height: 300px;
        margin: 0px;
    }
    
    .profileHolder {
        background-image: url("src/img/bg.png");
        width: 300px;
        height: 300px;
        border-radius: 50% 50%;
        margin-top: -150px;
        margin-left: 50px;
    }
    
    .profilePic {
        border-radius: 50% 50%;
        width: 290px;
        height: 290px;
        margin-left: 5px;
        margin-top: 5px;
        background: white;
    }
    
    .displayField {
        border: none;
        border-bottom: solid rgb(189, 189, 189) 1px;
        border-radius: 0%;
    }
</style>

<body>
    <div class="coverphoto"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <div class="profileHolder">
                    <img class="profilePic" src="src/img/<?php echo $_SESSION['image']?>" alt="">
                </div>
            </div>
            <div class="col-sm">
                <form action="profile.php" method = "POST">
                    <button name="logout" style="position: absolute;right: 5px;" class="btn btn-danger mt-1"><i class="fa fa-power-off"></i></button>
                </form>
                <h1 class="mt-3" style="margin-left:-45px;"><?php echo strtoupper($_SESSION['name'])?></h1>
                <div class="d-flex d-inline">
                    <h6 style="margin-left:-45px;"><i class="fa fa-envelope"></i> <?php echo $_SESSION['email']?></h6>
                    <h6 class="ml-5"><i class="fa fa-phone"> <?php echo $_SESSION['phoneNumber']?></i></h6>
                </div>
                <div style="margin-left:-45px;height: 300px;" class="container rounded pt-2 mt-3">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Username</label>
                                <input type="email" class="form-control displayField bg-transparent" value = "<?php echo $_SESSION['username']?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Password</label>
                                <input type="password" class="form-control displayField bg-transparent" value = "<?php echo $_SESSION['password']?>" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Birthdate</label>
                                <input type="text" class="form-control displayField bg-transparent" value = "<?php echo $_SESSION['birthdate']?>" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Gender</label>
                                <input type="text" class="form-control displayField bg-transparent" value = "<?php echo $_SESSION['gender']?>" readonly>
                            </div>

                            <div class="form-group col-md-2">
                                <label>Age</label>
                                <input type="text" class="form-control displayField bg-transparent" value = "<?php echo $_SESSION['age']?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label">School</label>
                            <input type="text" class="form-control displayField bg-transparent" value = "<?php echo $_SESSION['school']?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control displayField bg-transparent" value = "<?php echo $_SESSION['address']?>" readonly>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>

    </div>


</body>

</html>