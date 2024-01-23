<?php
require_once('config.php');
require_once('Ler.php'); 
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loja Black Phones</title>
  <link rel="stylesheet" href="estilos/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

  <div class="container">

    <div class="row">

      <div class="col-md-12">

        <h1>Loja Black Phones</h1>

        <div class="row">

          <div class="col-md-3">

            <h2>Categorias</h2>

            <ul>
              <li><a href="#">Celulares</a></li>
              <li><a href="#">Computadores</a></li>
              <li><a href="#">Eletrodomésticos</a></li>
            </ul>

          </div>

          <div class="col-md-9">

            <?php
            $ler = new Ler();
            $resultados = $ler->Leitura('produtos', 'ORDER BY data DESC');
            
            if ($resultados) {
              foreach ($resultados as $produto) {
                $produto = (object) $produto;
            ?>

              <div class="produto">

                <img src="<?= HOME ?>/uploads/<?= $produto->foto ?>" alt="<?= $produto->nome ?>">

                <h2><?= $produto->nome ?></h2>

                <p>R$<?= $produto->preco ?></p>

                <!-- Adicione aqui qualquer outra informação que desejar mostrar -->

              </div>

            <?php
              }
            } else {
            ?>

              <h3>Nenhum produto encontrado</h3>

            <?php
            }
            ?>

          </div>

        </div>

      </div>

    </div>

  </div>

</body>

</html>
