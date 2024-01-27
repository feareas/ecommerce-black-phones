<?php
require_once('config.php');
require_once('Ler.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" href="estilos/stylectt.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
  <header>
    <div class="container">
      <!-- Cabeçalho com o título principal -->
      <h1 class="header-title">Entre em Contato - Black Iphones</h1>
<br>
</br>

      <!-- Barra de navegação -->
      <nav>
        <ul>
          <li><a href="index.php">Voltar à página Home</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main class="container">
    <section>
      <h2 class="center">Nosso Contato</h2>
      <p class="center">Sinta-se à vontade para entrar em contato conosco!</p>

      <div class="contact-box">
        <p>Email: contact@blackiphones.com</p>
        <p>Telefone: (555) 123-4567</p>
        <p>Endereço: 123 fatecsp, Vila dos Remédios</p>
      </div>

      <!-- Caixa de texto para sugestões -->
      <label for="suggestions">Sugestões:</label>
      <br>
      <textarea id="suggestions" name="suggestions" rows="8" cols="60"></textarea>
      <br>
      <!-- Botão de enviar maior e mais abaixo -->
      <button type="submit" class="center">Enviar</button>
    </section>
  </main>

  <footer>
    <div class="container">
      <p>© 2022 Black Iphones.</p>
    </div>
  </footer>
</body>
</html>
