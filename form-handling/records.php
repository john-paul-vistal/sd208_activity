<?php 

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "records";


$conn = mysqli_connect($serverName,$userName,$password,$dbName);

if(!$conn){
    die("Connection Failed: ".mysqli_error());
}


//Retrieving Data
$sql = "SELECT * FROM users_records";
$result = mysqli_query($conn,$sql);


if(isset($_POST['delete'])){
    $id =  $_POST['id'];
    $sql = "DELETE FROM users_records WHERE id = '$id'";
    if(mysqli_query($conn,$sql)){
        mysqli_close($conn);
        header("Location:records.php");
    }else{
        echo "Error ".$sql."<br>".mysqli_error($conn);
    }
    
}


mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h1>Records</h1>
        <a href = "index.php"> <button class="btn-md">Add</button></a>
        <table>
            <tr class="tableheader">
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th>EMAIL</th>
                <th>ACTIONS</th>
            </tr>

            <?php 
            if(mysqli_num_rows($result)<= 0):
                echo "<p><b>Records is Empty!</b></p>";
            else:
               while($row = mysqli_fetch_assoc($result)):
            ?>

            <tr>
                <td><?php echo $row["fName"]?></td>
                <td><?php echo $row["lName"]?></td>
                <td><?php echo $row["email"]?></td>
                <td class="center">
                    <form action="records.php" method = "POST">
                    <input type="hidden" name="id" value="<?php  echo $row["id"] ?>">
                    <button type="submit" class="close" name="delete">Delete</button> 
                </form>
                <a href = "update.php?id=<?php echo $row["id"]?>"><button  class="update" name="update">Update</button></a>
                </td>
            </tr>

                <?php endwhile; endif?>

        </table>
    </div>
</body>

</html>