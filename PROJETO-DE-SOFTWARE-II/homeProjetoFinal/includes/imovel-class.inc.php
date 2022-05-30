<?php
    
    Class Imovel
    {
        public $idimovel; //autoincremento 
        public $latitude; //double
        public $longitude; //double
        public $cep; //int
        public $logradouro; //varchar
        public $numero; //varchar
        public $bloco; //varchar
        public $numero_apartamento; //varchar
        public $cidade; //varchar 45
        public $bairro; //varchar
        public $estado; //varchar
        public $idproprietario; //int id de quem está com sessao ativa
        public $foto_imóvel; //varchar
        public $last_idimovel; //so depois que cadastrar o imovel

        //Método construtor personalizado(__construct) da classe:
        function __construct($idproprietario)
        {   //Atributos            Dados locais
            $this->idproprietario = $idproprietario;   
        }


        function receberDados($conexao)
        {
            //idimovel é autoincremento
            $latitude            = $conexao->escape_string(trim($_POST['latitude'])); //ok
            $longitude           = $conexao->escape_string(trim($_POST['longitude'])); //ok
            $cep                 = $conexao->escape_string(trim($_POST['cep'])); //ok
            $logradouro          = $conexao->escape_string(trim($_POST['logradouro']));; //ok
            $numero              = $conexao->escape_string(trim($_POST['numero'])); //ok
            $bloco               = $conexao->escape_string(trim($_POST['bloco'])); //ok
            $numero_apartamento  = $conexao->escape_string(trim($_POST['numero_apartamento'])); //ok
            $cidade              = $conexao->escape_string(trim($_POST['cidade'])); //ok
            $bairro              = $conexao->escape_string(trim($_POST['bairro'])); //ok
            $estado              = $conexao->escape_string(trim($_POST['estado'])); //ok
            $foto_imóvel         = $conexao->escape_string(trim($_POST['foto_imovel'])); //ok
            //idproprietario é o id da sessao verificar como receber
            // $idproprietario      = $conexao->escape_string(trim($_POST['idproprietario']));
            


            //atribuir os dados do formulário aos atributos da classe
            $this->idimovel            = 0;
            $this->latitude            = $latitude;
            $this->longitude           = $longitude;
            $this->cep                 = $cep;
            $this->logradouro          = $logradouro;
            $this->numero              = $numero;
            $this->bloco               = $bloco; //só numero ou letra
            $this->numero_apartamento  = $numero_apartamento;
            $this->cidade              = $cidade;
            $this->bairro              = $bairro;
            $this->estado              = $estado;        
            // $this->idproprietario      = $idusuario; //idproprietario é o id da sessao verificar como receber        
            $this->foto_imóvel         = $foto_imóvel;        

        }

        function cadastrarImovel($conexao, $nomeDaTabela)
        {
            $sql = "INSERT $nomeDaTabela VALUES (
                '$this->idimovel',
                '$this->latitude',
                '$this->longitude',
                '$this->cep',
                '$this->logradouro',
                '$this->numero',
                '$this->bloco',
                '$this->numero_apartamento',
                '$this->cidade',
                '$this->bairro',
                '$this->estado',
                '$this->idproprietario',
                '$this->foto_imóvel')";

        
            $conexao->query($sql) or die($conexao->error);

             //resgatar idmovel
             //$last_idimovel = $conexao->insert_id;
            
             //atribuir last idimovel ao atributo da classe
             //$this->last_idimovel = $last_idimovel;

            // Print auto-generated id
            echo "New record has id: " . $conexao -> insert_id;
            $this->last_idimovel = $conexao -> insert_id;

            //printf("New record has ID %d.\n", $conexao->insert_id);
            
            

        }

        // function getIdimovel() {
        //     $this->idimovel;
        // }
    }
?>