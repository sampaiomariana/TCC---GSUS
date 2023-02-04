<?php
include('head.php');
?>
<aside class="sidebar">
    <nav class="menu mt-3">
        <ul class="nav-list">
            <li class="nav-item">
                <a href="searchmedice.php">
                <i class="icofont-look mr-2"></i>
                Lista de medicamento
                </a>
            </li>
            <li class="nav-item">
                <a href="register.php">
                    <i class="icofont-plus-circle mr-2"></i>
                    Cadastro de usuário
                </a>
            </li>
           
            <li class="nav-item">
                <a href="login.php">
                <i class="icofont-ui-user mr-2"></i>
                    Acesso cidadão
                </a>
            </li>
            
            <li class="nav-item">
                <a href="logingestor.php">
                    <i class="icofont-chart-histogram mr-2"></i>
                    Acesso gestor
                </a>
            </li>
        </ul>
    </nav>   
</aside>

<?php 
include('searchmedice.php')
?>

<?php 
include('footer.php')
?>

