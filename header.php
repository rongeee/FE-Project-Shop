<header class="header">
  <nav class="header__hidden-burgernav">

    <ul class="header__list">
      <li class="header__list-item">
        <a href="./" class="header__item-link">Home</a>
      </li>
      <?php require_once './assets/php/header_categories.php'; ?>
    </ul>
  </nav>
  <div class="header__left-wrap">
    <div class="header__nav">
      <span class="header__nav-line"></span>
    </div>
    <a class="header__headline" href="./"><img class="header__logo" src="assets/media/Logo.png" alt=""></a>
  </div>
  <form action="searchProd.php" action="POST" class="header__form" onsubmit="return checkForm(this);">
    <input type=" text" name="searchWord" class="header__search" placeholder="" />
    <input type="submit" name="submit-search" style="position: absolute; left: -9999px; width: 1px; height: 1px;" />
  </form>

  <?php
  require_once 'cart.php';
  ?>
</header>