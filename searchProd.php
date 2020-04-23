<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Frontendprojekt</title>
  <link rel="stylesheet" href="./assets/style/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
  <?php require_once 'header.php';
  require_once './assets/php/db.php';
  ?>

  <div class="search-container">
    <?php

    $words_to_filter = array("and", "not", "if", "get", "with", "keep", "that", "this", "every", "is", 'let', 'go');
    // character 'a' is not included here it can be find in the middle 
    if (isset($_GET['submit-search'])) {
      $searchQ = htmlspecialchars($_GET['search-word']);
      $res = str_ireplace($words_to_filter, "", $searchQ);
      $res = trim($res);
      $res = explode(' ', $res);
      // since a can be find in middle of the word 
      foreach ($res as &$val) {
        if ($val == 'a' || $val == 'A') $val = '';
      }
      $res = trim(implode('', $res));
      $headline = '<h2 class="search__headline">' . 'Search result for:' . ' ' . $res . '</h2>';
      echo $headline;
      if (!empty($res)) {

        $stmt = $db->prepare('SELECT * FROM products WHERE name LIKE :keywords  OR description LIKE :keywords ');
        $stmt->execute([
          ':keywords' => '%' . $res . '%'
        ]);
        if ($stmt->rowCount()) {
          echo "<div class='products-container'>";
          while ($row = $stmt->fetch()) {
            $id = $row['ID'];
            $image = $row["image"];
            $name = $row["name"];
            $price = $row["price"];
            $stock = $row["in_stock"];
            echo "<article class='product-container'>
                  <a class='searchProd'  href='./product.php?id=$id'>
                  <div class='searchProd__image'>
                    <img src='./admin/images/$image' alt=''>
                   </div>
                  <div class='searchProd__detail'>
                      <h3 class='searchProd__detail-name'>$name</h3>
                      <p class='searchProd__detail-price'>$price EUR</p>
                      <p class='searchProd__detail-stock'>IN STOCK: $stock</p>
                  </div>
                  </a>
                  <button class='product-container__add' data-id=$id>Add to cart</button>
                   </article>";
          }
          echo "</div>";
        } else {
          echo 'Nothing found';
        }
      } else {
        echo 'Nothing found';
      }
    }



    ?>
  </div>






  <?php
  require_once 'footer.php';
  ?>
  <script src="./assets/js/search.js"></script>
  <script src="./assets/js/happyLib.js"></script>
  <script src="./assets/js/header.js"></script>
  <script src="./assets/js/cart.js"></script>
</body>

</html>