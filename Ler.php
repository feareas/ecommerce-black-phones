<?php

class Ler {

    private $resultado;

    public function __construct() {
        $this->resultado = array();
    }

    private function colunaExiste($conexao, $tabela, $coluna) {
        $sql = "SHOW COLUMNS FROM `$tabela` LIKE '$coluna'";
        $resultado = $conexao->query($sql);
        return $resultado->num_rows > 0;
    }

    public function Leitura($tabela, $ordem) {
        $conexao = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    
        // Verifica se a conexão foi bem sucedida
        if ($conexao->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
        }
    
        // Constrói a consulta SQL
        $sql = "SELECT * FROM `$tabela`";
    
        // Adiciona a cláusula ORDER BY apenas se $ordem estiver definido e a coluna existir
        if ($ordem && $this->colunaExiste($conexao, $tabela, $ordem)) {
            $sql .= " ORDER BY `$ordem`";
        }
    
        $resultado = $conexao->query($sql);
    
        // Verifica se a consulta foi bem sucedida
        if (!$resultado) {
            die("Erro na consulta SQL: " . $conexao->error);
        }
    
        $dados = array();
        // Verifica se há linhas na consulta antes de tentar fetch_assoc()
        if ($resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {
                $dados[] = $linha;
            }
        }
    
        // Fecha a conexão
        $conexao->close();
    
        $this->resultado = $dados; // Armazena o array de resultados no atributo da classe
    }

    public function getResultado() {
        return $this->resultado;
    }
}

?>
