<?php

    Class Avaliacao
    {
        public $idavaliacao; 
        public $avaliacao_textual; 
        public $nota_geral; 
        public $quantidade_curtidas;
        public $foi_morador; 
        public $idusuario; 
        public $idimovel; 
        public $data_avaliacao; 
        public $last_idavaliacao; 


        function __construct($idusuario, $idimovel)
        {   //Atributos        Dados locais
            $this->idusuario = $idusuario;
            $this->idimovel = $idimovel;
        }


        function receberDados($conexao)
        {            
            // $idavaliacao          = $conexao->escape_string(trim($_POST['idavaliacao']));
            $avaliacao_textual    = $conexao->escape_string(trim($_POST['avaliacao_textual']));
            $nota_geral           = $conexao->escape_string(trim($_POST['q6']));
            // $quantidade_curtidas  = $conexao->escape_string(trim($_POST['quantidade_curtidas']));
            $foi_morador          = $conexao->escape_string(trim($_POST['foi_morador']));;
            // $idusuario            = $conexao->escape_string(trim($_POST['idusuario']));
            // $idimovel             = $conexao->escape_string(trim($_POST['idimovel']));
            // $data_avaliacao       = $conexao->escape_string(trim($_POST['data_avaliacao']));

            //atribuir os dados do formulário aos atributos da classe
            $this->idavaliacao         = 0;
            $this->avaliacao_textual   = $avaliacao_textual;
            $this->nota_geral          = $nota_geral;
            $this->quantidade_curtidas = 0;
            $this->foi_morador         = $foi_morador;
            // $this->idusuario           = $_SESSION['usuario']; //idproprietario é o id da sessao verificar como receber  
            // $this->idimovel            = $last_idimovel; //last_id autoincremento cadastrado na tabela imovel
            $this->data_avaliacao      = date('Y-m-d H:i:s', time()); 
        }


        function cadastrarAvaliacao($conexao, $nomeDaTabela)
        {
            $sql = "INSERT $nomeDaTabela VALUES (
                '$this->idavaliacao',
                '$this->avaliacao_textual',
                '$this->nota_geral',
                '$this->quantidade_curtidas',
                '$this->foi_morador',
                '$this->idusuario',
                '$this->idimovel',
                '$this->data_avaliacao')";

            $conexao->query($sql) or die($conexao->error);

            // Print auto-generated id
            echo "New record has id: " . $conexao -> insert_id;
            $this->last_idavaliacao = $conexao -> insert_id;

            // $vesselTransitID = $this->dbLink->insert_id;
        }
    }
?>
