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

  <div id="cart-container">
            <h2>Carrinho</h2>
            <ul id="cart-items">
                <?php
                // Adicione o código para buscar os itens do carrinho do banco de dados e exibi-los aqui
                // Exemplo:
                foreach ($_SESSION['cart'] as $cartItem) {
                    echo '<li>' . $cartItem['name'] . ': R$' . $cartItem['price'] . ' x ' . $cartItem['quantity'] . '</li>';
                }
                ?>
            </ul>
            <p>Total: R$<span id="cart-total">
                    <?php
                    // Adicione o código para calcular o total do carrinho a partir dos dados do banco de dados
                    // Exemplo:
                    $total = 0;
                    foreach ($_SESSION['cart'] as $cartItem) {
                        $total += $cartItem['price'] * $cartItem['quantity'];
                    }
                    echo $total;
                    ?>
                </span>
            </p>
        </div>
  </main>

  <footer>
    <p>© 2022 Black Iphones. All rights reserved.</p>
  </footer>

  <script src="js/script.js"></script>
</body>
</html>
