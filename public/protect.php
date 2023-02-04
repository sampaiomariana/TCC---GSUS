<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

if(!isset($_SESSION['email'])) {
    die("Você não tem permissão para acessar essa página.<p><a href=\"index.php\">Faça login</a> para continuar.</p>");
}
?>