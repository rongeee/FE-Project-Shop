<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Order</title>
  <link rel="stylesheet" href="./assets/style/main.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>

  <?php
  require_once "./header.php";
  
?>
    <main class="order-main">
      <div class="background"></div>
      <div class="cont">
        <div class="products">
          <h2 class="products__headline">Your Order</h2>
          <div class="products__container"></div>
          <div class="products__completion-btns">
            <div class="products__total-wrap">
              <div class="products__price-text">PRICE:</div>
              <div class="products__price-price">0</div>
            </div>
            <div class="products__total-wrap">
              <div class="products__discount-text">DISCOUNT:</div>
              <div class="products__discount-price">0</div>
            </div>
            <div class="products__total-wrap">
              <div class="products__shipping-text">SHIPPING:</div>
              <div class="products__shipping-price">0</div>
            </div>
            <div class="products__total-wrap">
              <div class="products__total-text">TOTAL:</div>
              <div class="products__total">0</div>
            </div>
          </div>
        </div>
      
        <div class="form-wrapper">
          <h2 class="form-wrapper__headline">Shipping</h2>
          <form action="./admin/order/addOrder.php" name="addOrder" method="POST" class="form-wrapper__form" enctype="multipart/form-data">
            <label for="name" class="form-wrapper__name-label">Name</label>
            <input type="text" name="name" class="form-wrapper__input" minlength="2" maxlength="20" required />
            <div class="error form-wrapper__validation-text"></div>



            <label for="e-mail" class="form-wrapper__name-label">E-Mail</label>
            <input type="text" name="email" class="form-wrapper__input mail" required />
            <div class="error1 form-wrapper__validation-text"></div>

            <label for="phone" class="form-wrapper__name-label">Phone</label>
            <input type="text" name="phone" class="form-wrapper__input  mobile" minlength="10" maxlength="12" required />
            <div class="mobileError form-wrapper__validation-text"></div>

            <label for="adress" class="form-wrapper__name-label">Adress</label>
            <input type="text" name="adress" class="form-wrapper__input adress" minlength="5" maxlength="20" required />
            <div class="adressError form-wrapper__validation-text"></div>

            <div class="form-wrapper__zip-city">
              <div class="form-wrapper__zip">
                <label for="zip" class="form-wrapper__name-label">Zip</label>
                <input type="text" name="zip" class="form-wrapper__input  zip" minlength="5" maxlength="5" required />
                <div class="zipError form-wrapper__validation-text"></div>
              </div>

              <div class="form-wrapper__city">
                <label for="city" class="form-wrapper__name-label">City</label>
                <input type="text" name="city" class="form-wrapper__input city" minlength="2" maxlength="15" required />
                <div class="cityError form-wrapper__validation-text"> </div>
              </div>
            </div>
            <div class="products-hidden"></div>

            <button type="submit" value="ORDER" class="form-wrapper__checkout" name="addOrder">
              ORDER
            </button>
          </form>
        </div>
    </div>
  </main>
  <?php
  require_once "./footer.php"
  ?>

    <script src="./assets/js/happyLib.js"></script>
    <script src="./assets/js/header.js"></script>
    <script src="./admin/js/alert.js"></script>
    <script src="./assets/js/cart.js"></script>
    <script src="./assets/js/order.js"></script>
    <script src="./assets/js/ajax-categories.js"></script>
    <script src="./assets/js/render.js"></script>
    <script src="./assets/js/ordervalidation.js"></script>
    <script src="./assets/js/search.js"></script>
</body>

</html>



