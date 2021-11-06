<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/icons/favicon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
</head>

<!-- <body class="w-100 h-100" style="	background-image: url(images/check_list_Easy-Resize.com.jpg);	height: 100%; background-size: cover;	background-position: top left;	background-repeat: no-repeat;">  -->
<body class="w-100 h-100" style="">
  <div class="py-5 text-center">
    <div class="container">
      <div class="row">
        <div class="mx-auto col-md-6 col-10 bg-white p-5">
          <h1 class="mb-4">Login</h1>
          <form action="controle/ver_login.php" method="POST">
            <div class="form-group"> <input type="email" class="form-control" placeholder="Digite seu email" id="form9" name="email" required="required"> </div>
            <div class="form-group mb-3"> <input type="password" class="form-control" placeholder="Digite sua senha" id="form10" name="senha" required="required">
              <div class="form-group mt-2 mb-3"> <select class="form-control" name="tipo" placeholder="Digite seu email" id="form9">
                  
                  <option value="2" class="form-control">Técnico</option>
                  <option value="1" class="form-control">Administrador</option>
                </select></div>
              <div>
                <small class="form-text text-muted text-right">
                  <!--<a data-toggle="modal" data-target="#exampleModal" href="#">Esqueceu sua senha?</a>-->
                </small>
              </div> <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Esqueceu sua senha?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="controle/forget_password.php" method="POST">
            <div class="form-group">
              <label for="exampleFormControl">Digite seu Email </label>
              <input type="email" class="form-control" id="exampleFormControlInput1" name="email" required="required">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Fim do modal -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
</body>

</html>