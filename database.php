<?php

// Verifica se as constantes não estão definidas para evitar avisos
if (!defined('DB_HOST')) {
    define('DB_HOST', 'devmobile3.mysql.dbaas.com.br');
}

if (!defined('DB_USER')) {
    define('DB_USER', 'devmobile3');
}

if (!defined('DB_PASSWORD')) {
    define('DB_PASSWORD', 'dm3@Fatec2024#');
}

if (!defined('DB_DATABASE')) {
    define('DB_DATABASE', 'devmobile3');
}

// Criar a conexão
$conexao = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

// Verifica se a conexão foi bem sucedida
if ($conexao->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
}

// Verifica se a tabela produtos existe
$sqlVerificaTabela = "SHOW TABLES LIKE 'produtos'";
$result = $conexao->query($sqlVerificaTabela);

if ($result->num_rows == 0) {
    // A tabela não existe, crie-a
    $sqlCriarTabela = "CREATE TABLE produtos (
        id INT NOT NULL AUTO_INCREMENT,
        nome VARCHAR(255) NOT NULL,
        preco DECIMAL(10,2) NOT NULL,
        foto VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    );";
    if ($conexao->query($sqlCriarTabela) === TRUE) {
        echo "Tabela produtos criada com sucesso<br>";
    } else {
        die("Erro ao criar tabela produtos: " . $conexao->error);
    }
} else {
    echo "A tabela produtos já existe<br>";
}

// Verifica se a tabela carrinho existe
$sqlVerificaTabelaCarrinho = "SHOW TABLES LIKE 'carrinho'";
$resultCarrinho = $conexao->query($sqlVerificaTabelaCarrinho);

if ($resultCarrinho->num_rows == 0) {
    // A tabela não existe, crie-a
    $sqlCriarTabelaCarrinho = "CREATE TABLE carrinho (
        id INT NOT NULL AUTO_INCREMENT,
        usuario_id INT,
        produto_id INT,
        quantidade INT,
        PRIMARY KEY (id),
        FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
        FOREIGN KEY (produto_id) REFERENCES produtos(id)
    );";
    if ($conexao->query($sqlCriarTabelaCarrinho) === TRUE) {
        echo "Tabela carrinho criada com sucesso<br>";
    } else {
        die("Erro ao criar tabela carrinho: " . $conexao->error);
    }
} else {
    echo "A tabela carrinho já existe<br>";
}

// Fecha a conexão
$conexao->close();

?>
