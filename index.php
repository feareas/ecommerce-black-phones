<?php
require_once('config.php');
require_once('Ler.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Black Iphones</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
  <header>
    <div class="header-container">
      <div class="header-sections">
        <h1 class="site-title">Black Iphones</h1>
        <div class="search-box">
          <input type="text" placeholder="Buscar...">
          <button><i class="fas fa-search"></i></button>
        </div>
        <nav>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="shop.html">Shop</a></li>
            <li><a href="contact.html">Contact</a></li>
            <div class="cart-icon" onclick="goToCart()">
                <i class="fas fa-shopping-cart"></i>
              </div>
          </ul>
        </nav>
      </div>
    </div>
  </header>

  <main class="container">
    <section class="banner">
      <div class="banner-container" id="bannerContainer">
        <!-- Adicione imagens ao contêiner do scroll -->
        <img src="images/iphone 1.jpg" alt="Banner 1">
        <img src="images/iphone 2.jpg" alt="Banner 2">
        <img src="images/iphone 3.jpg" alt="Banner 3">
        <img src="images/iphone 4.jpg" alt="Banner 4">
        <img src="images/iphone 5.png" alt="Banner 5">
        <img src="images/iphone 6.png" alt="Banner 6">
        <img src="images/iphone 7.jpg" alt="Banner 7">
        <img src="images/iphone 8.jpg" alt="Banner 8">
      </div>
    </section>
  </main>
 


    <!-- Sua seção de produtos permanece inalterada -->

    <section class="products">
      <article class="product" id="product1">
        <img src="images/iphone 2.jpg" alt="Product 1">
        <h2>Product 1</h2>
        <p class="price">$50.00</p>
        <button onclick="addToCart('Product 1', 50, 'product1')">Add to Cart</button>
      </article>

      <article class="product" id="product2">
        <img src="images/iphone 3.jpg" alt="Product 2">
        <h2>Product 2</h2>
        <p class="price">$40.00</p>
        <button onclick="addToCart('Product 2', 40, 'product2')">Add to Cart</button>
      </article>
    </section>
  </main>

  <footer>
    <p>© 2022 Black Iphones. All rights reserved.</p>
  </footer>

  <script src="script.js"></script>
</body>
</html>
