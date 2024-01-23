<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        body {
            padding-top: 50px; /* Adiciona espaço para o navbar fixo no topo */
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Painel de Controle</a>
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="salvar.php" method="post" enctype="multipart/form-data">
                <h2 class="mb-4">Cadastro de Produto</h2>
                <div class="form-group">
                    <label for="nome">Nome do produto</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="preco">Preço do produto</label>
                    <input type="number" class="form-control" id="preco" name="preco" required>
                </div>
                <div class="form-group">
                    <label for="foto">Foto do produto</label>
                    <input type="file" class="form-control-file" id="foto" name="foto" required>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>

    <hr class="my-5">

    <div class="row">
        <div class="col-md-12 text-center">
            <a href="index.php" class="btn btn-secondary">Voltar para a página principal</a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js" integrity="sha384-Z9PmMSlUJPHbE5WSvxEEN/C9RwDO9x8Qz8A2c6qUxyqK4q7QpXsWBWLR3l5gispA" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-rzEGRVoqI5Bv8GOfQ5oWqUTlTYYeo1RAoVTBU9A7PRQGjGKGJFwFCTt8GNEeYwwJ" crossorigin="anonymous"></script>

</body>
</html>
