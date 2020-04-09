<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frontendprojekt</title>
    <link rel="stylesheet" href="./assets/style/main.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
</head>
<body>
    <section class="lp-hero">
        <div class="scroller">
            <img class="lp-hero__img" src="https://source.unsplash.com/random/1920x1080" alt="">
            <img class="lp-hero__img" src="https://source.unsplash.com/random/1920x1050" alt="">
            <img class="lp-hero__img" src="https://source.unsplash.com/random/1920x1020" alt="">
        </div>
        <div class="lp-hero__btn-wrap">
            <h1 class="lp-hero__title">Summer Flavours</h1>
        </div>
        <button id="left"><i class="fa fa-arrow-left"></i></button>
        <button id="right"><i class="fa fa-arrow-right"></i></button>


    </section>
    <section class="feature-cards">
        <article class="feature-cards__card feature-cards__card--first"><div class="feature-cards__title">Inspirational quote</div></article>
        <article class="feature-cards__card feature-cards__card--second"><div class="feature-cards__title">Inspirational quote</div></article>
    </section>

    <section class="feature-products">
        <h2 class="feature-products__title">Featured</h2>
        <div class="feature-products__product-wrap">
        <!-- RENDER PRODUCTS FROM DATABASE -->
            <article class="feature-products__product">
                <img class="feature-products__img" src="./assets/media/placeholder-shoe.jpg" alt="">
                <div class="feature-products__product-title">Nike AirMax</div>
                <div class="feature-products__price">1800kr</div> 
            </article>
            <article class="feature-products__product">
                <img class="feature-products__img" src="./assets/media/placeholder-shoe.jpg" alt="">
                <div class="feature-products__product-title">Nike AirMax</div>
                <div class="feature-products__price">1800kr</div> 
            </article>
            <article class="feature-products__product">
                <img class="feature-products__img" src="./assets/media/placeholder-shoe.jpg" alt="">
                <div class="feature-products__product-title">Nike AirMax</div>
                <div class="feature-products__price">1800kr</div> 
            </article>
        <!-- RENDER PRODUCTS FROM DATABASE -->
        </div>
    </section>

    <section class="lp-categories">
        <!-- RENDER CATEGORIES FROM DATABASE -->
        <article class="lp-categories__item">
            <img class="lp-categories__img" src="https://source.unsplash.com/random/800x502" alt="">
            <div class="lp-categories__title">RUNNING</div>
        </article>
        <article class="lp-categories__item">
            <img class="lp-categories__img" src="https://source.unsplash.com/random/800x522" alt="">
            <div class="lp-categories__title">SNEAKERS</div>
        </article>
         <!-- RENDER CATEGORIES FROM DATABASE -->
    </section>

    <section class="lp-products">
        <article class="feature-products__product">
            <img class="feature-products__img" src="./assets/media/placeholder-shoe.jpg" alt="">
            <div class="feature-products__product-title">Nike AirMax</div>
            <div class="feature-products__price">1800kr</div> 
        </article>
        <article class="feature-products__product">
            <img class="feature-products__img" src="./assets/media/placeholder-shoe.jpg" alt="">
            <div class="feature-products__product-title">Nike AirMax</div>
            <div class="feature-products__price">1800kr</div> 
        </article>
        <article class="feature-products__product">
            <img class="feature-products__img" src="./assets/media/placeholder-shoe.jpg" alt="">
            <div class="feature-products__product-title">Nike AirMax</div>
            <div class="feature-products__price">1800kr</div> 
        </article>
        <article class="feature-products__product">
            <img class="feature-products__img" src="./assets/media/placeholder-shoe.jpg" alt="">
            <div class="feature-products__product-title">Nike AirMax</div>
            <div class="feature-products__price">1800kr</div> 
        </article>
        <article class="feature-products__product">
            <img class="feature-products__img" src="./assets/media/placeholder-shoe.jpg" alt="">
            <div class="feature-products__product-title">Nike AirMax</div>
            <div class="feature-products__price">1800kr</div> 
        </article>
        <article class="feature-products__product">
            <img class="feature-products__img" src="./assets/media/placeholder-shoe.jpg" alt="">
            <div class="feature-products__product-title">Nike AirMax</div>
            <div class="feature-products__price">1800kr</div> 
        </article>
    </section>

    <script src="./assets/js/hero-scroller.js"></script>
</body>
</html>