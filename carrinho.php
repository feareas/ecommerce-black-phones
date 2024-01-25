<?php
require_once('config.php');
require_once('Ler.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
  <header>
    <div class="container">
      <h1>Your E-commerce</h1>
      <div class="header-sections">
        <nav>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="shop.html">Shop</a></li>
            <li><a href="contact.html">Contact</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>

  <main class="container">
    <section class="cart">
      <h2>Shopping Cart</h2>
      <ul id="cart-items"></ul>
      <p>Total: $<span id="cart-total">0.00</span></p>
      <button onclick="checkout()">Checkout</button>
    </section>
  </main>

  <script src="script.js"></script>
</body>
</html>
