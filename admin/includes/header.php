<?php

$catPath  = "";
$prodPath = "";
$homePath = "";
$orderPath = "";
$currentPath =  $_SERVER['REQUEST_URI'];
$header = "";
if (strpos($currentPath, 'product')) {
        $catPath  = "./../index.php"; 
        $prodPath = "products.php";
        $homePath = "../../index.php";
        $orderPath = "./../order/orders.php";
        $header = "Productbank";
}
elseif (strpos($currentPath, 'orders')){
    $catPath  = "./../index.php"; 
    $prodPath = "./../product/products.php";
    $homePath = "../../index.php";
    $orderPath = "orders.php";
    $header = "Orders";
}
else {
        $catPath  = "./";
        $prodPath = "./product/products.php";
        $homePath = "../index.php";
        $orderPath = "./order/orders.php";
        $header = "Categories";
  }

?>
<header class="header">
    <nav class="header__hidden-burgernav">
        <ul class="header__list">
            <a href="<?= $catPath ?>" class="header__item-link">
                <li class="header__list-item">Categories</li>
            </a>
            <a href="<?= $prodPath ?>" class="header__item-link">
                <li class="header__list-item" id="products">Products</li>
            </a>
            <a href="<?= $orderPath ?>" class="header__item-link">
                <li class="header__list-item" id="order">Orders</li>
            </a>
            <a href="<?= $homePath ?>" class="header__item-link">
                <li class="header__list-item">Back to shop</li>
            </a>
        </ul>
    </nav>
    <div class="header__nav">
        <span class="header__nav-line"></span>
    </div>
    <h2 class="header__headline"><?php echo $header ?></h2>
    <div class="header__headline-centering"></div>
</header>