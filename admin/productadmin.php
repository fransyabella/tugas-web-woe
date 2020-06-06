<?php
require_once "../db/pdo.php";
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

        <!-- MAIN -->
        <div class="col mt-5 ml-5 mr-5">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Id </th>
                        <th scope="col">Name Product</th>
                        <th scope="col">Size</th>
                        <th scope="col">Color</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                    </tr>
                </thead>
                <?php
        foreach ( $rows as $row ) {
                ?>  
                <tbody>
                <tr>
                    <td><?=($row['product_id'])?></td>
                        <td><?=($row['product_name'])?></td>
                        <td><?=($row['size'])?></td>
                        <td><?=($row['color'])?></td>
                        <td><?=($row['price'])?></td>
                       <td><img src="../assets/product_images/<?=($row['img'])?>" width="100" height="100" alt="<?=($row['product_name'])?>"></td>
                </tr>           
                </tbody>
                <?php
        }
    ?>
            </table>
        </div>
    </div>

</body>

</html>