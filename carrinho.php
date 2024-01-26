<?php
session_start(); // Inicia a sessão
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : []; // Obtém o carrinho da sessão ou um array vazio
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrinho</title>
  <link rel="stylesheet" href="estilos/styles.css">
</head>
<body>
  <header>
    <div class="header-container">
      <div class="header-sections">
        <h1 class="site-title">Carrinho</h1>
        <nav>
          <ul>
            <li><a href="index.php">Home</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>

  <main class="container">
    <section class="cart">
      <h2>Itens no Carrinho</h2>
      <ul id="cart-items">
        <?php foreach ($cart as $item): ?>
          <li>
            <?= $item['name'] ?>: R$<?= $item['price'] ?> x <?= $item['quantity'] ?>
            <button onclick="removeFromCart('<?= $item['id'] ?>')">Remover</button>
            <!-- Adiciona um campo de input para a quantidade -->
            <input type="number" value="<?= $item['quantity'] ?>" min="1" onchange="updateQuantity('<?= $item['id'] ?>', this.value)">
          </li>
        <?php endforeach; ?>
      </ul>
      <?php if (!empty($cart)): ?>
        <p>Total: R$<span id="cart-total"><?= array_sum(array_column($cart, 'price')) ?></span></p>
      <?php else: ?>
        <p>Carrinho vazio</p>
      <?php endif; ?>
    </section>
  </main>

  <footer>
    <p>© 2022 Black Iphones. All rights reserved.</p>
  </footer>

  <script src="js/script.js"></script>
</body>
</html>
