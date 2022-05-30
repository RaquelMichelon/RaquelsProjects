<?php
    
    Class Nota
    {
        public $idavaliacao; //receber lastid da classe avaliacao
        public $valor_nota_q1;
        public $valor_nota_q2;
        public $valor_nota_q3;
        public $valor_nota_q4;
        public $valor_nota_q5;
        public $valor_nota_q6;
        public $last_idavaliacao;

       //Método construtor personalizado(__construct) da classe:
        // function __construct($last_idavaliacao)
        // {   //Atributos            Dados locais
        //     $this->$idavaliacao = $last_idavaliacao;   //null
        // }

        function receberDados($conexao)
        {            
            // $id_avaliacao; 
            $valor_nota_q1      = $conexao->escape_string(trim($_POST['q1']));
            $valor_nota_q2      = $conexao->escape_string(trim($_POST['q2']));
            $valor_nota_q3      = $conexao->escape_string(trim($_POST['q3']));
            $valor_nota_q4      = $conexao->escape_string(trim($_POST['q4']));
            $valor_nota_q5      = $conexao->escape_string(trim($_POST['q5']));
            $valor_nota_q6      = $conexao->escape_string(trim($_POST['q6']));

            //atribuir os dados do formulário aos atributos da classe
            //$this->id_avaliacao;  //verificar como receber os dados da avaliacao //null
            $this->valor_nota_q1            = $valor_nota_q1;
            $this->valor_nota_q2            = $valor_nota_q2;        
            $this->valor_nota_q3            = $valor_nota_q3;        
            $this->valor_nota_q4            = $valor_nota_q4;        
            $this->valor_nota_q5            = $valor_nota_q5;        
            $this->valor_nota_q6            = $valor_nota_q6;        
        }

        function cadastrarNota($conexao, $nomeDaTabela)
        {
            
            // $sql = "INSERT $nomeDaTabela VALUES (
            //     $this->valor_nota_q1,
            //     $this->idavaliacao,
            //     1)";
            echo gettype($this->idavaliacao);

            $sql = "INSERT INTO $nomeDaTabela (valor_nota, idavaliacao, iditens_avaliacao) 
            VALUES('$this->valor_nota_q1', '$this->idavaliacao', '1'),
            ('$this->valor_nota_q2', '$this->idavaliacao', '2'),
            ('$this->valor_nota_q3', '$this->idavaliacao', '3'),
            ('$this->valor_nota_q4', '$this->idavaliacao', '4'),
            ('$this->valor_nota_q5', '$this->idavaliacao', '5'),
            ('$this->valor_nota_q6', '$this->idavaliacao', '6') ";
            if ($conexao->query($sql) === true)
            {
            echo "NOtas inseridas successfully.";
            }
            else
            {
            echo "ERROR: Could not able to execute $sql. "
            .$conexao->error;
            }


            // $sql = "INSERT $nomeDaTabela VALUES (
            //     '$this->valor_nota_q1',
            //     '$this->idavaliacao',
            //     1)";
            
            
            // $sql  = "INSERT $nomeDaTabela VALUES 
            // ('$this->valor_nota_q1', '$this->idavaliacao', '1'), 
            // ('$this->valor_nota_q2', '$this->idavaliacao', '2'),
            // ('$this->valor_nota_q3', '$this->idavaliacao', '3'),
            // ('$this->valor_nota_q4', '$this->idavaliacao', '4'),
            // ('$this->valor_nota_q5', '$this->idavaliacao', '5'),
            // ('$this->valor_nota_q6', '$this->idavaliacao', '6')";



            // $sql .= "INSERT INTO $nomeDaTabela VALUES ('$this->valor_nota_q2', '$this->idavaliacao', '2');";
            // $sql .= "INSERT INTO $nomeDaTabela VALUES ('$this->valor_nota_q3', '$this->idavaliacao', '3');";
            // $sql .= "INSERT INTO $nomeDaTabela VALUES ('$this->valor_nota_q4', '$this->idavaliacao', '4');";
            // $sql .= "INSERT INTO $nomeDaTabela VALUES ('$this->valor_nota_q5', '$this->idavaliacao', '5');";
            // $sql .= "INSERT INTO $nomeDaTabela VALUES ('$this->valor_nota_q6', '$this->idavaliacao', '6');";


            // if ($conexao->multi_query($sql) === TRUE) {
            // echo "New records created successfully";
            // } else {
            // echo "Error: " . $sql . "<br>" . $conexao->error;
            // }


            //$conexao->query($sql) or die($conexao->error);
        }
    }
?>