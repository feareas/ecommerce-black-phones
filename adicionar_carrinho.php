<?php

require_once('config.php');

// Verifica se o ID do produto e a quantidade foram fornecidos na solicitação
if (isset($_POST['produto_id']) && isset($_POST['quantidade'])) {
    $produto_id = $_POST['produto_id'];
    $quantidade = $_POST['quantidade'];

    // Obtém informações do produto
    $conexao = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

    // Verifica se a conexão foi bem sucedida
    if ($conexao->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
    }

    // Prepara a consulta para obter informações do produto
    $sql = "SELECT id, nome, preco FROM produtos WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $produto_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $produto = $result->fetch_assoc();

        // Inicializa ou obtém o carrinho da sessão
        session_start();
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

        // Verifica se o produto já está no carrinho
        $index = array_search($produto_id, array_column($cart, 'id'));

        if ($index !== false) {
            // Se o produto já estiver no carrinho, apenas aumenta a quantidade
            $cart[$index]['quantidade'] += $quantidade;
        } else {
            // Se o produto não estiver no carrinho, adiciona ao carrinho
            $item = [
                'id' => $produto_id,
                'nome' => $produto['nome'],
                'preco' => $produto['preco'],
                'quantidade' => $quantidade
            ];
            $cart[] = $item;
        }

        // Atualiza o carrinho na sessão
        $_SESSION['cart'] = $cart;

        // Adiciona o produto à tabela carrinho no banco de dados
        $sqlAdicionarCarrinho = "INSERT INTO carrinho (produto_id, quantidade) VALUES (?, ?)";
        $stmtAdicionarCarrinho = $conexao->prepare($sqlAdicionarCarrinho);
        $stmtAdicionarCarrinho->bind_param("ii", $produto_id, $quantidade);
        $stmtAdicionarCarrinho->execute();
    }

    // Fecha a conexão
    $conexao->close();
}

// comentario teste

?>
