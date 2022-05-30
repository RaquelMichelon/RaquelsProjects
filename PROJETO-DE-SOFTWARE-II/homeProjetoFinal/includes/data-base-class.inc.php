<?php
    
    Class BancoDeDados
    {
        public $nomeDoBanco;
        public $nomeDaTabela;
        public $servidor;
        public $usuario;
        public $senha;

        //Método construtor personalizado(__construct) da classe:
        function __construct($servidorBanco, $usuarioBanco, $senhaBanco, $nomeBanco, $nomeTabela)
        {   //Atributos            Dados locais
            $this->servidor      = $servidorBanco;
            $this->usuario       = $usuarioBanco;
            $this->senha         = $senhaBanco;
            $this->nomeDoBanco   = $nomeBanco;
            $this->nomeDaTabela  = $nomeTabela;    
        }
        
        //Método que inicia a comunicação entre o nosso código em PHP e o servidor de banco de dados MySQL:
        function criarConexao()
        {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $conexao = new mysqli($this->servidor, $this->usuario, $this->senha) or exit($conexao->error);
            return $conexao;
            // $conexao->query($sql);
        }

        //Método para acessar o banco de dados a ser utilizado (abmr):
        function acessarBanco($conexao)
        {
            $conexao->select_db($this->nomeDoBanco);
        }

        //Definindo charset:
        function definirCharset($conexao)
        {
            $conexao->set_charset("utf8");
        }

        //Método para encerrar conexão com o banco de dados:
        function desconectar($conexao)
        {
            $conexao->close();
        }
    }
?>