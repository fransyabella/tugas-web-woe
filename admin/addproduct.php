<?php
    require_once "../db/pdo.php";
    $message='';
    $failed='';
    $error='';
    if (isset($_POST['insert'])) {
        if ( isset($_FILES['img']) && isset($_POST['product_name']) && isset($_POST['color'])
            && isset($_POST['size'])  && ($_POST['price'])) {
            $img = $_FILES['img']['name'];
            $tmp = $_FILES['img']['tmp_name'];
            $imagesize=$_FILES['img']['size'];
            $valid_extensions = array('jpeg','jpg','png','pdf');
            $ext=explode('.',$img);
            $extfix=strtolower(end($ext));
            
            if (!in_array($extfix, $valid_extensions)) {
                $failed = "Failed! Your file extension is " .$extfix. ". Please input only jpeg, jpg, png or pdf file";
        }
        else if($imagesize > 1048576){
            $failed ="Failed! Your file size : " .$imagesize. " is too big. File size required only less than 1 Mb";
        }
    
        else if (move_uploaded_file($tmp, '../assets/product_images/' . $img)){
            $sql = "INSERT INTO products (product_name, color, size, price, img)
                    VALUES (:product_name, :color, :size, :price, :img)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':product_name' => $_POST['product_name'],
                ':color'=>$_POST['color'],
                ':size'=>$_POST['size'],
                ':price' =>  $_POST['price'],
                ':img'=> $img));
            $message = "Data succesfully add!";
        }
        else{
            $error="Failed to move files";
        }
    }
    else{
        $error="All fields are required";
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
    <link rel="stylesheet" href="admin.css">
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
        
        <div class="col-md-4 ml-5 mt-5 col-md-offset-4 form-login">
        <?php
        if ($message != ""){
            echo '<div class="alert alert-success" role="alert">' .$message.'</div>';
        }
        else if ($error != ""){
            echo '<div class="alert alert-danger" role="alert">' .$error.'</div>';
        }
        else if ($failed != ""){
            echo '<div class="alert alert-danger" role="alert">' .$failed.'</div>';
        }
        ?>
            <div class="ml-5 outter-form-login">
                
                <form method="post" class="inner-login" action="" enctype="multipart/form-data">
                    <h3 class="text-center title-login">Add Product</h3>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="product_id">
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" name="user_id" ></p>
                    </div>
                    <p>Name
                    <div class="form-group">
                        <input type="text" class="form-control" name="product_name" ></p>
                    </div>
                    <p>Color
                    <div class="form-group">
                        <input type="text" class="form-control" name="color"></p>
                    </div>
                    <p>Size
                    <div class="form-group">
                        <input type="text" class="form-control" name="size"></p>
                    </div>
                    <p>Price
                    <div class="form-group">
                        <input type="text" class="form-control" name="price"></p>
                    </div>
                    <p>Image (max 1 MB)
                    <div class="form-group">
                    <input type="file" name="img" accept="*/image"></p>
                    </div>
                    <p><input type="submit" class="btn btn-primary" value="Add new" name="insert"/></p>
        
                </form>
            </div>
        </div>
       
</body>
</html>