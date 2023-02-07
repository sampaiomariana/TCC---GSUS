<?php
function limpartexto($str){
    return preg_replace("/[^0-9]/", "", $str);
}

if(count($_POST) > 0){
    include('connection.php');

    $erro = false;
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
 
    if(empty($nome)){
        $erro = "O nome é obrigatório";
    }
    
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $erro = "O email é obrigatório";
    }

    if(!empty($data_nascimento)){
        $tmp = explode('/', $data_nascimento);
        if(count($tmp) == 3){
            $data_nascimento = implode('-', array_reverse($tmp)); 
        
        } else{
            $erro = "Data de nascimento inválida";
        }

    }

    if(!empty($telefone)){
        $telefone = limpartexto($telefone);
        if(strlen($telefone) != 11){
            $erro = "Telefone inválido: O telefone deve ser preenchido no padrão (61) 95555 - 7777";
        }
    }


    if($erro){
        echo "<p><b>ERRO: $erro</b></p>";
    } else{
        $sql_code = "INSERT INTO cidadao (nome, email, data_nascimento, telefone, data_cadastro, senha) 
        VALUES ('$nome', '$email', '$data_nascimento', '$telefone', NOW(), '$senha')";
        $salvar = $mysqli->query($sql_code) or die($mysqli->error);
        if($salvar){
            echo "<p><b>Usuário cadastrado com sucesso!</b></p>";
            unset($_POST);
        } else{
            echo "<p><b>Erro ao cadastrar usuário</b></p>";
        }
    }

    
    if(empty($senha)){
      $erro = "A senha é obrigatória";
  }
}
?>


<!DOCTYPE html>

<html lang="en">
<head>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Cadastro do usuário</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
  <link href="plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
  <link href="plugins/simplebar/simplebar.css" rel="stylesheet" />
  <link href="plugins/nprogress/nprogress.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/icofont.min.css">
  <link id="main-css-href" rel="stylesheet" href="css/style.css" />
  <link href="images/favicon.png" rel="shortcut icon" />

  <script src="plugins/nprogress/nprogress.js"></script>
</head>

</head>
  <body class="bg-light-gray" id="body">
          <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
          <div class="d-flex flex-column justify-content-between">
            <div class="row justify-content-center">
              <div class="col-lg-6 col-xl-5 col-md-10 ">
                <div class="card card-default mb-0">
                  <div class="card-header pb-0">
                    <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                      <a class="w-auto pl-0" href="/index.html">
                      <i class="icofont-group"></i>
                      <span class="brand-name text-dark">GSUS</span>
                      <i class="icofont-map-pins"></i>  
                      </a>
                    </div>
                  </div>
                  <div class="card-body px-5 pb-5 pt-0">
                    <h4 class="text-dark text-center mb-5">Registre-se</h4>
                    <form method = "POST" action = "">
                      <div class="row">
                        <div class="form-group col-md-12 mb-4">
                          <label>Nome</label>
                          <input value = "<?php if(isset($_POST['nome'])) echo $_POST['nome']?>" type="text" name = "nome" class="form-control input-lg" id="nome"  placeholder="Nome">
                        </div>
                        <div class="form-group col-md-12 mb-4">
                          <label>E-mail</label>
                          <input  value = "<?php if(isset($_POST['email'])) echo $_POST['email']?>" type="text" name="email" id="email" class="form-control input-lg" placeholder="email@gmail.com">
                        </div>
                        <div class="form-group col-md-12 ">
                        <label>Data de nascimento</label>
            <input value = "<?php if(isset($_POST['data_nascimento'])) echo $_POST['data_nascimento']?>" type="text" name="data_nascimento" id="data_nascimento" class="form-control input-lg" placeholder="15/12/1995">
                        </div>
                        <div class="form-group col-md-12 ">
                          <label>Telefone</label>
            <input value = "<?php if(isset($_POST['telefone'])) echo $_POST['telefone']?>" placeholder = "(61) 95555 - 7777" type="text" name="telefone" id="telefone" class="form-control input-lg">
                        </div>
                        <div class="form-group col-md-12 mb-4">
                          <label>Senha</label>
                          <input value = "<?php if(isset($_POST['senha'])) echo $_POST['senha']?>" type="text" name = "senha" class="form-control input-lg" id="senha"  placeholder="******">
                        </div>
                        
                        <div class="col-md-12">
                          <div class="d-flex justify-content-between mb-3">

                            <div class="custom-control custom-checkbox mr-3 mb-3">
                              <input type="checkbox" class="custom-control-input" id="customCheck2">
                              <label class="custom-control-label" for="customCheck2">Eu concordo com todos os termos e condições.</label>
                            </div>

                          </div>

                          <button type="submit" class="btn btn-primary btn-pill mb-4">Salvar usuário </button>

                          <p>Já tem uma conta?
                            <a class="text-blue" href="sign-in.php">Logar</a>
                          </p>
                        </div>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

</body>
</html>
