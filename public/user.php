<?php
include('head.php');
?>
<aside class="sidebar">
    <nav class="menu mt-3">
        <ul class="nav-list">
            <li class="nav-item">
                <a href="addmedice.php">
                <i class="icofont-medicine"></i>
                    Registrar Medicamento
                </a>
            </li>
            <li class="nav-item">
                <a href=".php">
                    <i class="icofont-home mr-2"></i>
                    Relatório Mensal
                </a>
            </li>
            <li class="nav-item">
                <a href=".php">
                    <i class="icofont-chart-histogram mr-2"></i>
                    Relatório Gerencial
                </a>
            </li>
            <li class="nav-item">
                <a href="login.php">
                    <i class="icofont-chart-histogram mr-2"></i>
                    Acesso Teste
                </a>
            </li>
            <li class="nav-item">
                <a href=".php">
                    <i class="icofont-chart-histogram mr-2"></i>
                    Dashboard Estoque de Medicamentos
                </a>
            </li>
        </ul>
    </nav>   
</aside>

<?php 
include('dashuser.php')
?>

<?php 
include('footer.php')
?>

