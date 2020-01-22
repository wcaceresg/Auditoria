<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
   <title>Reportes Villa Chicken S.A.C</title>
 <link rel="icon" href="dist/img/Logo/villa_chicken.ico" type="image/gif" sizes="16x16">
  <link rel="stylesheet" href="dist/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/modules/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">

  <link rel="stylesheet" href="dist/css/demo.css">
  <link rel="stylesheet" href="dist/css/style.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
                Aplicativos
            </div>

            <div class="card card-primary">
              <div class="card-header" style="text-align:center;"> <img src="dist/img/Logo/villa_chicken.ico" width="90px" >

              </div>

              <div class="card-body">
                <form method="POST" action="#" class="needs-validation" novalidate="" id="form" name="login">
                  <div class="form-group">
                    <label for="email">Usuario</label>
                    <input id="usuario" type="text" class="form-control" name="usuario" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                         Ingresa Usuario
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password" class="d-block">Password
                     <!--
                      <div class="float-right">
                        <a href="forgot.html">
                          Forgot Password?
                        </a>
                      </div>

                      -->
                    </label>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                        Por favor ingresa Password
                    </div>
                  </div>

                  <!--

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>

                  -->

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" tabindex="4" id="ingresar-control">
                      Ingresar
                    </button>
                  </div>




                     




                </form>


                    <div class="alert alert-danger" id="contenedor-mensaje" style="text-align:center !important;">
                        <span id="mensaje"></span>
                     </div>



               
              </div>
            </div>

            <!--
            <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="register.html">Create One</a>
            </div>

            -->
            <div class="simple-footer">
              Copyright &copy; Villa Chicken S.A.C 2019
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="dist/modules/jquery.min.js"></script>
  <script src="dist/modules/popper.js"></script>
  <script src="dist/modules/tooltip.js"></script>
  <script src="dist/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="dist/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="dist/modules/moment.min.js"></script>
  <script src="dist/modules/scroll-up-bar/dist/scroll-up-bar.min.js"></script>
  <script src="dist/js/sa-functions.js"></script>
  
  <script src="dist/js/scripts.js"></script>
  <script src="dist/js/custom.js"></script>
  <script src="dist/js/demo.js"></script>


  <script>
       


          $(document).ready(function(){
       $("#usuario").focus();
       $("#contenedor-mensaje").hide();
    });
    $(function(){
      $("#ingresar-control").click(function(){
     
      
        var usuario = $('form[name=login] input[name=usuario]')[0].value;
        var clave = $('form[name=login] input[name=password]')[0].value;

    
        if(usuario=="" && clave==""){
          //swal(response);
         // alert("Ingrese sus credenciales..!");
          

        }else{

          
                    $.ajax({
            type: "POST",
            url: 'Controller/acceso.php',
            data: {ingresar:"ingresar", user: usuario, password: clave},
            success: function(response){
                  //alert(response);

                  if(response.trim()=="principal"){
                     document.location=response;

                 }else{
                    $("#contenedor-mensaje").show();
                     $("#mensaje").html(response);
                 }
             

              

            }

          });
        return false;
        }
    

      });
    });




  </script>
</body>
</html>