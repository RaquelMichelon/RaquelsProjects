<?php
    
    Class Usuario
    {
        public $idusuario;
        public $nome;
        public $email;
        public $senha;
        public $data_cadastro;
        public $data_nasc;
        public $cidade;
        public $idsexo;
        public $foto_usuario;

        function receberDados($conexao)
        {
            //Recebendo dados de entrada do usuário:

            //IMPORTANTE: Não precisa de entrada do usuário: $idusuario       = $conexao->escape_string(trim($_POST['idusuario']));
            $nome            = $conexao->escape_string(trim($_POST['nome']));
            $email           = $conexao->escape_string(trim($_POST['email']));
            $senha           = $conexao->escape_string(trim($_POST['senha']));
            //IMPORTANTE: Não precisa de entrada do usuário: $data_cadastro   = $conexao->escape_string(trim($_POST['data_cadastro']));
            $data_nasc       = $conexao->escape_string(trim($_POST['data_nasc']));
            $cidade          = $conexao->escape_string(trim($_POST['cidade']));
            $idsexo          = $conexao->escape_string(trim($_POST['sexo']));
            $foto_usuario    = $conexao->escape_string(trim($_POST['foto_usuario']));

            //Define os valores de entrada nos atributos da classe (campos da tabela):

            // $this->idusuario     = rand(1, 1000);
            $this->idusuario     = 0;
            $this->nome          = $nome;
            $this->email         = $email;
            $this->senha         = $senha;
            $this->data_cadastro = date('Y-m-d H:i:s', time());
            $this->data_nasc     = $data_nasc;
            $this->cidade        = $cidade;
            $this->idsexo        = $idsexo;
            $this->foto_usuario  = $foto_usuario;
        }

        //Insere registro na tabela (o usuário é cadastrado):

        function cadastrarUsuario($conexao, $nomeDaTabela)
        {
            //$senhaCriptografada = hash("sha512", $this->senha);
            $sql = "INSERT $nomeDaTabela VALUES (
                
                '$this->idusuario',
                '$this->nome',
                '$this->email',
                -- '$senhaCriptografada',
                '$this->senha',
                '$this->data_cadastro',
                '$this->data_nasc',
                '$this->cidade',
                '$this->idsexo',
                '$this->foto_usuario')";

            $conexao->query($sql) or die($conexao->error);
        }
    }
?>