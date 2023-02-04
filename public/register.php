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
        $sql_code = "INSERT INTO cidadao (nome, email, data_nascimento, telefone, data_cadastro) 
        VALUES ('$nome', '$email', '$data_nascimento', '$telefone', NOW())";
        $salvar = $mysqli->query($sql_code) or die($mysqli->error);
        if($salvar){
            echo "<p><b>Usuário cadastrado com sucesso!</b></p>";
            unset($_POST);
        } else{
            echo "<p><b>Erro ao cadastrar usuário</b></p>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro cidadão</title>
</head>
<body>
    <a href="index.php">Voltar para página principal</a>
    <form method = "POST" action = "">
        <p>
        <label>Nome</label>
            <input value = "<?php if(isset($_POST['nome'])) echo $_POST['nome']?>" type="text" name="nome" id="nome">
        </p>
        <p>   
            <label>E-mail</label>
            <input  value = "<?php if(isset($_POST['email'])) echo $_POST['email']?>" type="text" name="email" id="email"><br>
        </p> 
        <p>   
            <label>Data de nascimento</label>
            <input value = "<?php if(isset($_POST['data_nascimento'])) echo $_POST['data_nascimento']?>" type="text" name="data_nascimento" id="data_nascimento"><br>
        </p>   
        <p>   
            <label>Telefone</label>
            <input value = "<?php if(isset($_POST['telefone'])) echo $_POST['telefone']?>" placeholder = "(61) 95555 - 7777" type="text" name="telefone" id="telefone"><br>
        </p>
        <p>
            <button type="submit">Salvar usuário</button>
        </p>
    </form>
</body>
</html>