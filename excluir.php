<?php
error_reporting(E_ALL);

require_once('config.php');

// Verifica se houve uma solicitação de exclusão via GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Debugging: Exibir ID para verificar se está sendo corretamente capturado
    echo "ID: $id";

    // Conectar ao banco de dados
    $conexao = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

    // Verificar a conexão
    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    // Preparar e executar a consulta de exclusão
    $query = "DELETE FROM produtos WHERE id = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Exclusão bem-sucedida
        $stmt->close();
        $conexao->close();

        // Redirecionar de volta para o painel após a exclusão
        header('Location: painel.php?exclusao_sucesso=true');
        exit();
    } else {
        // Erro na exclusão
        echo "Erro ao excluir o produto.";
    }
} else {
    // ID inválido
    echo "ID inválido.";
}
?>
