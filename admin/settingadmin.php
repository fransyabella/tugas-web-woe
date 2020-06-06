<?php
    require_once "../db/pdo.php";
    session_start();
    $message='';
    $error='';
    if (isset($_POST['update'])) {
        $session_uname = $_SESSION['username'];
        $username = $_POST['username'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "UPDATE users SET username = '$username', name = '$name' , email = '$email', password = '$password' WHERE username = '$session_uname'"; 
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        //use password_verify();
        if($pdo) {
            $message = 'Your profile is successfully updated';
        } else {
            $error = 'Update failed, please try again!';
        }
    }
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap first, then CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="layout_admin.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- Title -->
    <title>Product</title>
</head>

<body>
<?php 
    include "side_navbar.php";
?>

    <div class="card">
        <div class="card-body text-center">
            <h3>Hello, <?php echo  $_SESSION['username'] ?></h3>
            <h5>Would you like to edit your profile info? </h5>
            <br>
            <form action="settingadmin.php?edit=<?php echo $_SESSION['user_id'];?>" method="post">
                <input type="submit" class="btn btn-success btn-lg" value="Edit Profile" name="edit" />
                <input type="hidden" name="user_id" value="<?=$_SESSION['user_id']?>">
            </form>
            <?php
            if ($message != "") {
                echo '<div class="alert alert-success" role="alert">' .$message.'</div>';
            } else if ($error != "") {
                echo '<div class="alert alert-danger" role="alert">' .$error.'</div>';
            }
            ?>
        </div>
    </div>
    <?php
    if (isset($_POST['edit'])) {
        if ( isset($_GET['edit'])) {
            $session_uname = $_SESSION['username'];
            $sql = "SELECT * FROM users WHERE username = '$session_uname'";
            $stmt = $pdo->prepare($sql);
            $stmt -> execute(array(
                '$session_uname' => $_GET['edit']));
            $ambildata=$stmt->fetch();
            $username=$ambildata['username'];
            $name=$ambildata['name'];
            $email=$ambildata['email'];
            $password=$ambildata['password'];
            $address=$ambildata['address'];
            $phonenum=$ambildata['phonenum'];
    ?>
    <div class="outter-form-login ml-5" >
        <div class="logo-login">
            <em class="glyphicon glyphicon-user"></em>
        </div>
        <form method="post" class="inner-login" action="settingadmin.php?update=<?php echo $userid?> ">
            <p>Username
                <input type="text"class="form-control" name="username" value="<?php echo $username;?>">
            </p>
            <p>Password
                <input type="password" name="password" class="form-control col-4" value="<?php echo $password;?>" id="password">  
            </p>
            <p>Name
                <input type="text" name="name" class="form-control" size="40" value="<?php echo $name;?>">
            </p>
            <p>Email
                <input type="text" name="email" class="form-control" value="<?php echo $email;?>">
            </p>
            <p>Address
                <input type="text" name="email" class="form-control" value="<?php echo $address;?>">
            </p>
            <p>Phonenum
                <input type="text" name="email" class="form-control" value="<?php echo $phonenum;?>">
            </p>
                                
            <input type="submit" class="btn btn-primary" value="Update" name="update"/>
            <input type="submit" class="btn btn-primary"value="Cancel" name="cancel"/>
        </form>
    </div>
    <?php
        } 
    } 
    ?>
</body>

</html>