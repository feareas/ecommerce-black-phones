<?php
require_once('config.php');
require_once('Ler.php');

// Verificar se a exclusão foi bem-sucedida e exibir a mensagem
session_start();
if (isset($_SESSION['exclusao_sucesso']) && $_SESSION['exclusao_sucesso']) {
    echo '<div class="alert alert-success" role="alert">Produto excluído com sucesso!</div>';
    // Limpar a variável de sessão
    unset($_SESSION['exclusao_sucesso']);
}

$ler = new Ler();
$ler->Leitura('produtos', "ORDER BY data DESC");
$resultados = $ler->getResultado();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa;
    }

    header {
        background-color: #343a40;
        color: #ffffff;
        padding: 10px;
        text-align: center;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: #d4edda;
        color: #155724;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table, th, td {
        border: 1px solid #dee2e6;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #343a40;
        color: #ffffff;
    }

    img {
        max-width: 100px;
    }

    form {
        display: flex;
        flex-direction: column;
        width: 100%; /* Para ocupar a largura total do contêiner */
        max-width: 400px; /* Define uma largura máxima para o formulário */
        margin: 0 auto; /* Centraliza o formulário horizontalmente */
    }

    label {
        margin-bottom: 5px;
    }

    input {
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ced4da;
        border-radius: 4px;
    }

    button {
        padding: 12px;
        background-color: #343a40;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    hr {
        margin: 20px 0;
        border: 1px solid #dee2e6;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
        padding-top: 60px;
    }

    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

</head>
<body>

<header>
    <h1>Painel de Controle</h1>
</header>

<div class="container">
    <?php
    if (isset($_SESSION['exclusao_sucesso']) && $_SESSION['exclusao_sucesso']) {
        echo '<div class="alert alert-success" role="alert">Produto excluído com sucesso!</div>';
        // Limpar a variável de sessão
        unset($_SESSION['exclusao_sucesso']);
    }
    ?>

    <form action="salvar.php" method="post" enctype="multipart/form-data">
        <h2>Cadastro de Produto</h2>
        <div>
            <label for="nome">Nome do produto</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <div>
            <label for="preco">Preço do produto</label>
            <input type="number" id="preco" name="preco" required>
        </div>
        <div>
            <label for="foto">Foto do produto</label>
            <input type="file" id="foto" name="foto" required>
        </div>
        <button type="submit">Salvar</button>
    </form>

    <hr>

    <h2>Lista de Produtos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Foto</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($resultados) {
                foreach ($resultados as $produto) {
                    $produto = (object) $produto;
            ?>
                    <tr>
                        <td><?= $produto->id ?></td>
                        <td><?= $produto->nome ?></td>
                        <td>R$<?= $produto->preco ?></td>
                        <td><img src="<?= $produto->foto ?>" alt="<?= $produto->nome ?>"></td>
                        <td>
                            <button type="button" onclick="excluirProduto(<?= $produto->id ?>)">Excluir</button>
                        </td>
                    </tr>
            <?php
                }
            } else {
            ?>
                <tr>
                    <td colspan="5">Nenhum produto encontrado</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <hr>

    <div>
        <a href="index.php">Voltar para a página principal</a>
    </div>
</div>

<!-- Modal de confirmação de exclusão -->
<div id="modalExclusao" class="modal">
    <div class="modal-content">
        <span class="close" onclick="fecharModalExclusao()">&times;</span>
        <p>Tem certeza que deseja excluir este produto?</p>
        <button onclick="excluirConfirmado()">Excluir</button>
        <button onclick="fecharModalExclusao()">Cancelar</button>
    </div>
</div>

<script>
    function excluirProduto(id) {
        // Abre o modal de confirmação de exclusão
        var modal = document.getElementById('modalExclusao');
        modal.style.display = 'block';

        // Define o ID do produto no modal
        var modalContent = modal.querySelector('.modal-content');
        modalContent.dataset.produtoId = id;
    }

    function excluirConfirmado() {
        // Obtém o ID do produto a ser excluído
        var modalContent = document.querySelector('#modalExclusao .modal-content');
        var produtoId = modalContent.dataset.produtoId;

        // Redireciona para a página de exclusão com o ID do produto
        window.location.href = 'excluir.php?id=' + produtoId;
    }

    function fecharModalExclusao() {
        // Fecha o modal de confirmação de exclusão
        var modal = document.getElementById('modalExclusao');
        modal.style.display = 'none';
    }

    // Fecha o modal se o usuário clicar fora dele
    window.onclick = function(event) {
        var modal = document.getElementById('modalExclusao');
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    }
</script>

</body>
</html>
