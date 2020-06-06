<header>
<!-- Start Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom fixed-top scrolling-navbar">
    <!-- Brand Name -->
    <a class="navbar-brand" href="index.php">blabla</a>
    <!-- Toggle Button when minimize the screen -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Navbar Group Item -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="product.php">Product</a>
            </li>
            <!-- Shown Navbar if user has logged in -->
            <?php
            if (isset($_SESSION['username'])){
            ?>
            <li class="nav-item">
                <a class="nav-link" href="transaction.php">Transaction</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="history_transaction.php">History Transaction</a>
            </li>
            </ul>
            <!-- Shown Navbar if user hasn't logged in -->
            <?php
            } else if (!isset($_SESSION['username'])){
            ?>
        </ul>
        <?php
        }
        ?> 
        <!-- Search Engine -->
        <form class="form-inline my-2 my-lg-0" action="search.php" method="get">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <!-- Shown Navbar Logout if user has logged in -->
        <?php
        if (isset($_SESSION['username'])){
        ?>
        <ul class="navbar-nav ">
            <li class="nav-item  active">
                <a class="nav-link" href="setting.php">Setting<span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <ul class="navbar-nav ">
            <li class="nav-item ">
                <a class="nav-link" href="logout.php">Logout<span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <!-- Shown Navbar if user hasn't logged in -->
        <?php
        } else if (!isset($_SESSION['username'])){
        ?>
        <ul class="navbar-nav ">
            <li class="nav-item ">
                <a class="nav-link"href="login.php">Login<span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link" href="register.php">Register<span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <?php     
        }
        ?>         
    </div>
</nav>
<!-- End Navbar -->
</header>