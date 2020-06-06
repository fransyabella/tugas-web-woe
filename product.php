<?php
require_once 'db/pdo.php';
session_start();
$stmt = $pdo->query("SELECT product_id, product_name, size, color, price, img FROM products");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap first, then CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="product.css">
    <link rel="stylesheet" href="footer.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- Title -->
    <title>E-Commerce blabla</title>
</head>

<body>
<?php
include "navbar.php";
?>
    <!-- Start Grid -->
    <div class="container-fluid">
        <div class="row">
        <?php
        foreach ( $rows as $row ) {
        ?>
            <div class="col-md-4">
                <div class="bg-primary text-center text-white">.col-md-4</div>
                <img src="assets/product_images/<?=($row['img'])?>" width="100" height="100" alt="<?=($row['product_name'])?>">
                    <?=($row['product_name'])?>
                    <br>
                    <?=($row['size'])?>
                    <br>
                    <br>
                    <?=($row['color'])?>
                    <br>
                    <?=($row['price'])?></td>
                    <br>
                    <form action="transaction.php?buy=<?php echo $row['product_id'];?>" method="post">
                        <input type="hidden" name="user_id" value="<?=$row['product_id']?>">
                        <input type="submit" value="Buy" name="buy">
                    </form>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- End Grid -->

<?php
include "footer.php";
?>

</body>
</html>