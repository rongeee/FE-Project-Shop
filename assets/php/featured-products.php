<?php 
    

$salePercentage = 0.9;


require 'db.php';

$sql = "SELECT * FROM products WHERE featured = 1 AND in_stock > 0";
$stmt = $db->prepare($sql);
$stmt->execute();


while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
    $id = htmlspecialchars($row['ID']);
    $name = htmlspecialchars($row['name']);
    $desc = htmlspecialchars($row['description']);
    $price = htmlspecialchars($row['price']);
    $image = htmlspecialchars($row['image']);
    $stock = htmlspecialchars($row['in_stock']);
    $isOld = $row["is_old"];

    $addToCartBtn = "<button class='feature-products__add' data-id=$id>ADD TO CART</button>";

    if ($isOld == 1) {
        $sale_price = $price * $salePercentage;
        $sale = "
        <div class='feature-products__price'>
            <span class='old-price'>$price €</span>
            <span class='on-sale'>-10%</span>
            <span class='new-price'>$sale_price €</span>
        </div>";
    }
    else {
        $sale = "<span class='old-price'>$price €</span>";
    }


echo "<article class='feature-products__product'>
        <a class='feature-products__link-wrap' href='./product.php?id=$id'>
        <div class='feature-products__img-wrap'><img class='feature-products__img' src='./admin/images/$image' alt=''></div>
        <div class='feature-products__product-title'>$name</div>
        $sale
        <div class='feature-products__stock'>IN STOCK: $stock</div>
        </a>
        $addToCartBtn
      </article>";
endwhile;

?>
