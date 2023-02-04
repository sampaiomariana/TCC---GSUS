<?php
include('connection.php');

if (isset($_POST['email']) || isset($_POST['senha'])) {
    if (strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if (strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";

    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM cidadao WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na conexão:" . $mysqli->error);

        $qtd = $sql_query->num_rows;
        if ($qtd == 1) {
            $username = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $username['id'];
            $_SESSION['email'] = $username['email'];
            $_SESSION['nome'] = $username['nome'];

            header("Location: index.php");

            echo "Usuário logado com sucesso";
        } else {
            echo "Usuário ou senha inválidos";
        }

        }
    }
?>
