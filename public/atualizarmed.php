<?php

include('connection.php');
$id_medicamento = intval($_GET['id_medicamento']);
function limpar_texto($str){ 
  return preg_replace("/[^0-9]/", "", $str); 
}

if(count($_POST) > 0){

    $erro = false;
    $nome = $_POST['nome'];
    $classificacao_medicamento = $_POST['classificacao_medicamento'];
    $informacoes = $_POST['informacoes'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
 
  if($erro){
        echo "<p><b>ERRO: $erro</b></p>";
  } else{
        $sql_code = "UPDATE medicamento
        SET nome = '$nome', 
        classificacao_medicamento = '$classificacao_medicamento', 
        informacoes = '$informacoes', 
        preco = '$preco', 
        quantidade = '$quantidade'
        WHERE id_medicamento = '$id_medicamento'";

        $salvar = $mysqli->query($sql_code) or die($mysqli->error);

        if($salvar){
            
            echo "<p><b>Medicamento atualizado com sucesso!</b></p>";
            unset($_POST);
        } else{
            echo "<p><b>Erro ao atualizar medicamento</b></p>";
        }
    }

}
$slq_medicamento = "SELECT * FROM medicamento WHERE id_medicamento = '$id_medicamento'";
$query_medicamento = $mysqli->query($slq_medicamento) or die($mysqli->error);
$medicamento = $query_medicamento->fetch_assoc();
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>GSUS</title>
    
  <!-- theme meta -->
  <meta name="theme-name" content="mono" />

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
  <link href="plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
  <link href="plugins/simplebar/simplebar.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="plugins/nprogress/nprogress.css" rel="stylesheet" />
  <link href="plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css" rel="stylesheet" />
  <link href="plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
  <link href="plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <link href="plugins/toaster/toastr.min.css" rel="stylesheet" />
  <link id="main-css-href" rel="stylesheet" href="css/style.css" />
  <link href="images/favicon.png" rel="shortcut icon" />
  <link rel="stylesheet" href="assets/css/icofont.min.css">
  <script src="plugins/nprogress/nprogress.js"></script>
</head>


  <body class="navbar-fixed sidebar-fixed" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>

    
    <div id="toaster"></div>
    

    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">
      
      
        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
        <aside class="left-sidebar sidebar-dark" id="left-sidebar">
          <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
              <a href="/index.html">
              <i class="icofont-group"></i>
              <span class="brand-name">GSUS</span>
              <i class="icofont-map-pins"></i> 
              </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-left" data-simplebar style="height: 100%;">
              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">
                

                
                  <li
                   class="active"
                   >
                    <a class="sidenav-item-link" href="indexgestor.php">
                      <i class="mdi mdi-briefcase-account-outline"></i>
                      <span class="nav-text">Dashboard GSUS</span>
                    </a>
                  </li>
                
                  <li class="section-title">
                    Apps
                  </li>

                  <li >
                              <a class="sidenav-item-link" href="relatoriomensal.php">
                                <span class="nav-text">Relatório Mensal</span>
                                
                              </a>
                            </li>
                  
                            
                  <li >
                              <a class="sidenav-item-link" href="relatoriomensal.php">
                                <span class="nav-text">Relatório Gerencial</span>
                                
                              </a>
                            </li>
                
                
                
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#email"
                      aria-expanded="false" aria-controls="email">
                      
                      <span class="nav-text">Estoque</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="email"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                  

                            <li >
                              <a class="sidenav-item-link" href="cadastrarmed.php">
                                <span class="nav-text">Cadastrar medicamento</span>
                                
                              </a>
                            </li>
                          
                            <li >
                              <a class="sidenav-item-link" href="atualizarmed.php">
                                <span class="nav-text">Atualizar medicamento</span>
                                
                              </a>
                            </li>
                        
                            <li >
                              <a class="sidenav-item-link" href="deletarmed.php">
                                <span class="nav-text">Apagar medicamento</span>
                                
                              </a>
                            </li>

                            <li >
                              <a class="sidenav-item-link" href="estoque.php">
                                <span class="nav-text">Estoque</span>
                                
                              </a>
                            </li>

                            <li >
                              <a class="sidenav-item-link" href="reposicaomed.php">
                                <span class="nav-text">Reposição Medicamento</span>
                                
                              </a>
                            </li>
                          
                          
                      
                      </div>
                    </ul>
                  </li>
                
                  <li class="section-title">
                    Pages
                  </li>
                
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#users"
                      aria-expanded="false" aria-controls="users">
                      <i class="mdi mdi-image-filter-none"></i>
                      <span class="nav-text">Usuários</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="users"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="user-profile.php">
                                <span class="nav-text">Perfil do usuário</span>
                                
                              </a>
                            </li>
                          
             
                        
                      </div>
                    </ul>
                  </li>
                
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#authentication"
                      aria-expanded="false" aria-controls="authentication">
                      <i class="mdi mdi-account"></i>
                      <span class="nav-text">Autenticação</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="authentication"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                            <li >
                              <a class="sidenav-item-link" href="sign-in.php">
                                <span class="nav-text">Acesso Cidadão</span>
                                
                              </a>
                            </li>

                            <li >
                              <a class="sidenav-item-link" href="sign-in-gestor.php">
                                <span class="nav-text">Acesso Gestor</span>
                              </a>
                            </li>
                          
                            <li >
                              <a class="sidenav-item-link" href="sign-up.php">
                                <span class="nav-text">Registrar-se</span>
                                
                              </a>
                            </li>
                          
                            <li >
                              <a class="sidenav-item-link" href="logout.php">
                                <span class="nav-text">Logout</span>
                                
                              </a>
                            </li>
                        
                      </div>
                    </ul>
                  </li>
                
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#other-page"
                      aria-expanded="false" aria-controls="other-page">
                      <i class="mdi mdi-file-multiple"></i>
                      <span class="nav-text">Outras páginas</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="other-page"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                        
                        

                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="page-comingsoon.html">
                                <span class="nav-text">Em breve</span>
                                
                              </a>
                            </li>
                        </div>
                    </ul>
                  </li>
                

                

                
                  <li class="section-title">
                    Documentation
                  </li>
                

                

                
                  <li
                   >
                    <a class="sidenav-item-link" href="getting-started.html">
                      <i class="mdi mdi-airplane"></i>
                      <span class="nav-text">Getting Started</span>
                    </a>
                  </li>
                

                

                
                  
                
              </ul>

            </div>

            <div class="sidebar-footer">
              <div class="sidebar-footer-content">
                <ul class="d-flex">
                  <li>
                    <a href="user-account-settings.html" data-toggle="tooltip" title="Profile settings"><i class="mdi mdi-settings"></i></a></li>
                  <li>
                    <a href="#" data-toggle="tooltip" title="No chat messages"><i class="mdi mdi-chat-processing"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </aside>

      

      <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
      <div class="page-wrapper">
        
          <!-- Header -->
          <header class="main-header" id="header">
            <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
              <!-- Sidebar toggle button -->
              <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
              </button>

              <span class="page-title">Dashboard</span>

              <div class="navbar-right ">

                <ul class="nav navbar-nav">
                  <!-- Offcanvas -->
                  <li class="custom-dropdown">
                    <a class="offcanvas-toggler active custom-dropdown-toggler" data-offcanvas="contact-off" href="javascript:" >
                      <i class="mdi mdi-contacts icon"></i>
                    </a>
                  </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </nav>  
            </header>
              <div class="col-lg-12 col-xl-12 col-md-15 ">
                <div class="card card-default mb-6">
                  <div class="card-header pb-5">
                    <div class="app-brand w-100 d-flex justify-content-center border-bottom-6">
                      
                      <i class="icofont-group"></i>
                      <span class="brand-name text-dark">GSUS</span>
                      <i class="icofont-map-pins"></i>  
                      </a>
                    </div>
                  </div>
                  
                  <div class="card-body px-14 pb-14 pt-6">
                    <h4 class="text-dark text-center mb-5">Atualizar medicamento</h4>
                    <form method = "POST" action = "">
                      <div class="row">  
                        <div class="form-group col-md-12 mb-4">
                          <label>Nome</label>
                          <input name = "nome" value = "<?php echo $medicamento['nome']?>" type="text" name = "nome" class="form-control input-lg">
                        </div>
                        <div class="form-group col-md-12 mb-4">
                          <label>Classificação do medicamento</label>
                          <input name = "classificacao_medicamento" value = "<?php  echo $medicamento['classificacao_medicamento']?>" type="text" name="classificacao_medicamento" id="classificacao_medicamento" class="form-control input-lg">
                        </div>
                        <div class="form-group col-md-12 ">
                        <label>Informações</label>
            <input name = "informacoes" value = "<?php echo $medicamento['informacoes']?>" type="text" name="informacoes" class="form-control input-lg" >
                        </div>
                        <div class="form-group col-md-12 ">
                          <label>Preço</label>
            <input name = "preco" value = "<?php echo $medicamento['preco']?>"  type="text" name="preco" id="preco" class="form-control input-lg">
                        </div>
                        <div class="form-group col-md-12 mb-4">
                          <label>Quantidade</label>
                          <input name = "quantidade" value = "<?php echo $medicamento['quantidade']?>" type="int" name = "quantidade" class="form-control input-lg" id="quantidade" >
                        </div>
                        

                          <button type="submit" class="btn btn-primary btn-pill mb-6">Atualizar medicamento</button>

                         </div>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

            
          

          <!-- Footer -->
          <footer class="footer mt-auto">
            <div class="copyright bg-white">
              <p>
                &copy; <span id="copy-year"></span> Copyright GSUS.
              </p>
            </div>
            <script>
                var d = new Date();
                var year = d.getFullYear();
                document.getElementById("copy-year").innerHTML = year;
            </script>
          </footer>

      </div>
    </div>
    
    
                    <script src="plugins/jquery/jquery.min.js"></script>
                    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                    <script src="plugins/simplebar/simplebar.min.js"></script>
                    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>

                    
                    
                    <script src="plugins/apexcharts/apexcharts.js"></script>
                    
                    
                    
                    <script src="plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
                    
                    
                    
                    <script src="plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
                    <script src="plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
                    <script src="plugins/jvectormap/jquery-jvectormap-us-aea.js"></script>
                    
                    
                    
                    <script src="plugins/daterangepicker/moment.min.js"></script>
                    <script src="plugins/daterangepicker/daterangepicker.js"></script>
                    <script>
                      jQuery(document).ready(function() {
                        jQuery('input[name="dateRange"]').daterangepicker({
                        autoUpdateInput: false,
                        singleDatePicker: true,
                        locale: {
                          cancelLabel: 'Clear'
                        }
                      });
                        jQuery('input[name="dateRange"]').on('apply.daterangepicker', function (ev, picker) {
                          jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
                        });
                        jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function (ev, picker) {
                          jQuery(this).val('');
                        });
                      });
                    </script>
                    
                    
                    
                    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
                    
                    
                    
                    <script src="plugins/toaster/toastr.min.js"></script>

                    
                    
                    <script src="js/mono.js"></script>
                    <script src="js/chart.js"></script>
                    <script src="js/map.js"></script>
                    <script src="js/custom.js"></script>

                    


                    <!--  -->


  </body>
</html>
