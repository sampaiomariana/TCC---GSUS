<?php 
include('validation.php')
?>


<!DOCTYPE html>

<html lang="en">
<head>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>GSUS</title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
  <link href="plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
  <link href="plugins/simplebar/simplebar.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="plugins/nprogress/nprogress.css" rel="stylesheet" />
  
  <!-- MONO CSS -->
  <link id="main-css-href" rel="stylesheet" href="css/style.css" />

  <link rel="stylesheet" href="assets/css/icofont.min.css">

  <!-- FAVICON -->
  <link href="images/favicon.png" rel="shortcut icon" />

  <script src="plugins/nprogress/nprogress.js"></script>
</head>

</head>
  <body class="bg-light-gray" id="body">
          <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
          <div class="d-flex flex-column justify-content-between">
            <div class="row justify-content-center">
              <div class="col-lg-6 col-md-10">
                <div class="card card-default mb-0">
                  <div class="card-header pb-0">
                    <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                      <a class="w-auto pl-0" href="/index.html">
                      <i class="icofont-group"></i>
                      <span class="font-weight-light">GSUS</span>
                      <i class="icofont-map-pins"></i>
                      </a>
                    </div>
                  </div>
                  <div class="card-body px-5 pb-5 pt-0">

                    <h4 class="text-dark mb-6 text-center">Login</h4>

                    <form class = "form-login" action="" method="POST" >
                      <div class="row">
                        <div class="form-group col-md-12 mb-4">
                          <label for="email">E-mail</label>
                          <input type="email" id="email" name="email" class="form-control" placeholder="email@gsus.com.br" autofocus>
                        </div>
                        <div class="form-group col-md-12 ">
                          <label for="senha">Senha</label>
                          <input type="senha" id="senha" name="senha" class="form-control" placeholder="*****">
                        </div>
                        <div class="col-md-12">

                          <div class="d-flex justify-content-between mb-3">

                            <div class="custom-control custom-checkbox mr-3 mb-3">
                              <input type="checkbox" class="custom-control-input" id="customCheck2">
                              <label class="custom-control-label" for="customCheck2">Lembrar-me</label>
                            </div>

                            <a class="text-color" href="#"> Esqueceu sua senha ? </a>

                          </div>

                          <button type="submit" class="btn btn-primary btn-pill mb-4">Logar</button>

                          <p>Ainda não se registrou?
                            <a class="text-blue" href="sign-up.php">Se registre!</a>
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
