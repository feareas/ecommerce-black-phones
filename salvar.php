<?php

// Inclui o arquivo de configuração do banco de dados
include("database.php");

// Verifica se os dados do formulário estão presentes
if(isset($_POST["nome"]) && isset($_POST["preco"])) {
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];

    // Processa a foto se estiver presente
    if(isset($_FILES["foto"]) && $_FILES["foto"]["error"] == UPLOAD_ERR_OK) {
        $nomeFoto = htmlspecialchars($_FILES["foto"]["name"]);
        $caminhoDiretorio = "caminho/para/seu/diretorio/";
        $caminhoCompleto = $caminhoDiretorio . $nomeFoto;

        // Verifica se o diretório existe ou cria se não existir
        if (!file_exists($caminhoDiretorio)) {
            mkdir($caminhoDiretorio, 0777, true);
        }

        // Move o arquivo para o diretório
        if(move_uploaded_file($_FILES["foto"]["tmp_name"], $caminhoCompleto)) {
            echo "Arquivo movido com sucesso.<br>";

            // Reabre a conexão
            $conexao = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

            // Verifica se a conexão foi bem sucedida
            if ($conexao->connect_error) {
                die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
            }

            // Insere os dados no banco de dados
            $sql = "INSERT INTO produtos (nome, preco, foto) VALUES (?, ?, ?)";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("sss", $nome, $preco, $caminhoCompleto);
            
            if ($stmt->execute()) {
                echo "Registro inserido com sucesso.<br>";
            } else {
                die("Erro ao inserir registro: " . $stmt->error);
            }

            // Fecha a conexão
            $conexao->close();
        } else {
            die("Erro ao mover o arquivo para o diretório: " . $caminhoCompleto);
        }
    } else {
        $caminhoCompleto = ""; // Se não houver foto, defina como vazio ou algo apropriado
    }
} else {
    die("Dados do formulário não estão presentes.");
}

// Redireciona para a página principal
header("Location: index.php");
?>
