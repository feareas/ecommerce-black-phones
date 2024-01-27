<?php
require_once('config.php');
require_once('Ler.php');

$cartCount = 0;

// Inicia a sessão
session_start();

// Verifica se há itens no carrinho na sessão
if (isset($_SESSION['cart'])) {
    $cartCount = count($_SESSION['cart']);
}

$ler = new Ler();
$ler->Leitura('produtos', 'nome');
$resultados = $ler->getResultado();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Black Iphones</title>
  <link rel="stylesheet" href="estilos/styles.css">
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
            <li><a href="contato.php">Contact</a></li>
            <div class="cart-icon" onclick="goToCart()">
              <i class="fas fa-shopping-cart"></i>
              <span id="cart-count"><?= $cartCount ?></span>
            </div>
          </ul>
        </nav>
      </div>
    </div>
  </header>

  <main class="container">
    <section class="products">
      <?php
      if ($resultados) {
        foreach ($resultados as $produto) {
          $produto = (object) $produto;
      ?>
          <article class="product">
            <img src="<?= $produto->foto ?>" alt="<?= $produto->nome ?>">
            <h2><?= $produto->nome ?></h2>
            <p class="price">R$<?= $produto->preco ?></p>
            <button onclick="addToCart('<?= $produto->nome ?>', <?= $produto->preco ?>, '<?= $produto->id ?>')">Adicionar</button>
          </article>
      <?php
        }
      } else {
      ?>
        <p>Nenhum produto encontrado</p>
      <?php
      }
      ?>
    </section>

   
</main>
  </main>


  <footer>
    <p>© 2022 Black Iphones.</p>
  </footer>

  <script src="js/script.js"></script>

</body>
</html>

