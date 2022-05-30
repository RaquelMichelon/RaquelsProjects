<!DOCTYPE html>
<html>

    <head>
        
        <meta charset="UTF-8">        
        <meta name="theme-color" content="#f4f4f4">

        <title> home. | Sua plataforma de busca por informações de imóveis on-line </title>

        <link rel="shortcut icon" href="Images/icons/favicon.ico" type="images/ico">
        <link rel="stylesheet" href="css/style-signup.css">
        
    </head>

    <body>

        <div class="header">
        <img src="Images/logo-home.svg" alt="Logo">
        <h1> Cadastro de usuário </h1>
        </div>

        
            
        <form action="sign-up.php" method="post">

            <fieldset>

                <legend>  </legend>
                            
                <label> Nome completo: </label>
                <input type="text" name="nome" required autofocus> <br>

                <label> E-mail: </label>
                <input type="email" name="email" required> <br>

                <label> Data de nascimento: </label>
                <input type="date" name="data_nasc" required> <br>
                

                <div class="row">
                    <div class="col-md-3">
                        <span> Sexo: </span>

                        <label class="containerckd"> Feminino
                            <input type="radio" checked="checked" name="sexo" value=2>
                            <span class="checkmark"></span>
                        </label>

                        <label class="containerckd"> Masculino
                            <input type="radio" checked="checked" name="sexo" value=1>
                            <span class="checkmark"></span>
                        </label>

                        <label class="containerckd"> Outro
                            <input type="radio" checked="checked" name="sexo" value=3>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
             

                <label> Cidade: </label>
                <input type="text" name="cidade" required> <br>

                <label> Foto do perfil (opcional): </label>
                <input class="upload" type="file" name="foto_usuario" accept="image/*"> <br>

                <label> Senha: </label required>
                <input type="password" name="senha"> <br>
                
                <div class="botoes">
                <button name="cadastrar"> 
                    <a href="http://localhost/PROJETO-DE-SOFTWARE-II/homeProjetoFinal/pg-login.php">Voltar</a>
                     </button>
                <button name="cadastrar"> Cadastrar </button>
                </div>

                

            </fieldset>

        </form>


        <!-- ================================== Main Script ================================= -->

        <?php
            $includeDataBase = "./includes/data-base-class-sign-up.inc.php";
            $includeUser = "./includes/user-class.inc.php";
            
            require_once $includeDataBase;
            require_once $includeUser;
            
            $banco = new BancoDeDados("localhost", "root", "root", "abmr", "usuario");
            
            $conexao = $banco->criarConexao();
            $banco->acessarBanco($conexao);
            $banco->definirCharset($conexao);

            $user = new Usuario();

            if(isset($_POST['cadastrar']))
            {
                $user->receberDados($conexao);
                $user->cadastrarUsuario($conexao, $banco->nomeDaTabela);
                echo"<p> Cadastro realizado com sucesso! </p>";
            }
            
            $banco->desconectar($conexao);
        ?>

    </body>
    
</html>