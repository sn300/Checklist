<?php
session_start();
if (!$_SESSION['usu_email'] || !$_SESSION['usu_senha'] or $_SESSION['usu_tipo'] <> "2") {
  header('Location: ../../');
}
$id = $_SESSION['usu_id'];
$cidade = $_SESSION['usu_cidade'];
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="../../images/icons/favicon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
   <!-- <link rel="stylesheet" href="../../default/theme.css">  -->


</head>

<body>
  <nav class="navbar navbar-expand-md fixed bg-light navbar-light" id="home">
    <div class="container">
      <a class="navbar-brand" href="#"><img src="../../images/logo_2.png"></a>
      <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar10">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar10">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="#">Home</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#equipe">Nossa Equipe</a> </li>
          <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Criar Relatório&nbsp;</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalLong">Motociclista</a> 
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalLongMotorista">Motorista</a> 
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalAuxiliar">Auxiliar</a>
            </div>
          </li>
          <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Checar</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> <a class="dropdown-item" href="acoes/ver_relatorios.php?pagina=1">Relatórios Enviados</a> <a class="dropdown-item" href="acoes/ver_perfil.php">Seu Perfil</a> </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../controle/sair.php"><i class="fa fa-sign-out">&nbsp;Sair</i><br></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="py-5 text-center text-white" style="	background-image: url(../../images/Background-header-home.jpg);	background-size: cover;	background-position: center top;	background-repeat: repeat;">
    <div class="container">
      <div class="row">
        <div class="mx-auto p-4 col-md-7">
          <h1 class="mb-4">Olá, <?php echo  $_SESSION['usu_nome'];?></h1> <a class="btn btn-primary" href="acoes/ver_relatorios.php?pagina=1"><strong>Ver Relatórios</strong></a> </h1>

            <a class="btn btn-primary" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>Criar Relatório&nbsp;</strong></a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalLong">Motociclista</a> 
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalLongMotorista">Motorista</a> 
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalAuxiliar">Auxiliar</a>
            </div>  

        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="px-lg-5 d-flex flex-column justify-content-center col-lg-6">
          <h1>Sobralnet</h1>
          <p class="mb-3 lead">O melhor provedor de internet de Sobral e região. Com variedades de planos de internet de banda larga. Atendimento especializado e plantão de assistência nós finais de semana.&nbsp;</p>
        </div>
        <!--<div class="col-lg-6"> <img class="img-fluid d-block" src="../../images/icons/img2.jpeg"> </div>-->
      </div>
    </div>
  </div>
<div class="pt-5 pb-3 text-center" id="equipe" style="background-color: #f3f3f3; background-position: top left;	background-size: 100%;	background-repeat: no-repeat;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="mb-3 text-dark">Nossa Equipe</h1>
        </div>
      </div>
      <div class="row">
        <?php
        include "../../controle/conexao.php";
        $sql = "SELECT usu_nome, usu_tipo, usu_foto  FROM usuarios where usu_tipo = '1'";
        $executar = mysqli_query($conexao, $sql);
        while ($dados = mysqli_fetch_assoc($executar)) {
          $nome = $dados['usu_nome'];
          $tipo = $dados['usu_tipo'];
          $aux = array(
            1 => 'Administrador',
            2 => 'Colaborador'
          );
          $foto = $dados['usu_foto'];
          $img;
          if ($foto != 0) {
            $img = $foto;
          } else {
            $img = "foto.png";
          }
        ?>

          <div class="col-md-3 col-6 p-4"> <img class="img-fluid d-block" src="../../images/perfil/<?php echo $img; ?>" width="1500">
            <div class="card-body">
              <h4 class="mt-3 mb-0 text-dark"><b><?php echo $nome; ?>&nbsp;</b> </h4>
              <p><?php echo $aux[$tipo]; ?>&nbsp;</p>
            </div>
          </div>
        <?php } ?>
        <?php
        $sql = "SELECT usu_nome, usu_tipo, usu_foto  FROM usuarios where usu_tipo = '2'";
        $executar = mysqli_query($conexao, $sql);
        while ($dados = mysqli_fetch_assoc($executar)) {
          $nome = $dados['usu_nome'];
          $tipo = $dados['usu_tipo'];
          $aux = array(
            1 => 'Administrador',
            2 => 'Colaborador'
          );
          $foto = $dados['usu_foto'];
          $img;
          if ($foto != 0) {
            $img = $foto;
          } else {
            $img = "foto.png";
          }
          if ($nome == $_SESSION['usu_nome']) {
            $nome = "Você";
          }
        ?>
        <div class="col-md-3 col-6 p-4"> <img class="img-fluid d-block" src="../../images/perfil/<?php echo $img;?>" width="1500">
            <div class="card-body">
              <h4 class="mt-3 mb-0 text-dark"><b><?php echo $nome; ?>&nbsp;</b> </h4>
              <p><?php echo $aux[$tipo]; ?>&nbsp;</p>
            </div>
          </div>
          
        <?php
        }
        ?>

      </div>
    </div>
  </div>
  <!-- Modal Motociclista-->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLong" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitlePreencher">Preencha estes dados Motociclista</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../../controle/inserir_modal.php" method="POST">
            <input type="hidden" name="usuario" value="<?php echo $id ?>">
            <input type="hidden" name="tipo" value="1">
            <div class="form-group">
              <label for="exampleFormControlData">Data</label>
              <input type="date" class="form-control" id="exampleFormControlInput1" name="data" required="required">
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col">
                <label>Horário Inicial</label>
                  <input type="time" class="form-control" name="horai" required = "required">
                </div>
                
                <div class="col">
                <label>Horário Final</label>
                  <input type="time" class="form-control" name="horaf" required = "required">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Selecione o veículo</label>
              <select class="form-control" id="exampleFormControlSelect1" name="automoveis">
                <?php
                include "../../controle/conexao.php";
                $automoveis = "SELECT * FROM automoveis WHERE auto_tipo = '1' AND auto_cidade = '$cidade'";
                $executar = mysqli_query($conexao, $automoveis);
                while ($dados = mysqli_fetch_assoc($executar)) {
                  $id_auto = $dados['auto_id'];
                  $nome = $dados['auto_modelo'];
                  $placa = $dados['auto_placa'];
                  echo "<option value ='$id_auto'>$nome com a placa $placa</option>";
                }
                ?>
              </select>
            </div>

            <div class="form-group">
             <div class="row">
             <div class="col">

              <label for="exampleFormControlQuilometragem">Quilometragem Inicial</label>
              <input type="number" class="form-control" id="exampleFormControlQuilometragem" name="km" required="required">
             </div>
             <div class="col">
              <label for="exampleFormControlQuilometragem2">Quilometragem Final</label>
              <input type="number" class="form-control" id="exampleFormControlQuilometragem2" name="km2" required="required">
              </div>
             </div>
            </div>

            
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Observação</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="obs" maxlength="500"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <input type="submit" class="btn btn-primary" value="Enviar">
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Fim do Modal -->
  <!-- Modal Motorista-->
  <div class="modal fade" id="exampleModalLongMotorista" tabindex="-1" role="dialog" aria-labelledby="exampleModalLong" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitlePreencher">Preencha estes dados Motorista</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../../controle/inserir_modal.php" method="POST">
            <input type="hidden" name="usuario" value=<?php echo $id ?>></td>
            <input type="hidden" name="tipo" value="2">
            <div class="form-group">
              <label for="exampleFormControlData">Data</label>
              <input type="date" class="form-control" id="exampleFormControlInput1" name="data" required="required">
            </div>
            <div class="row">
                <div class="col">
                <label>Horário Inicial</label>
                  <input type="time" class="form-control" name="horai" required = "required">
                </div>
                
                <div class="col">
                <label>Horário Final</label>
                  <input type="time" class="form-control" name="horaf" required = "required">
                </div>
              </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Selecione o veículo</label>
              <select class="form-control" id="exampleFormControlSelect1" name="automoveis">
                <?php
                include "../../controle/conexao.php";
                $automoveis = "SELECT * FROM automoveis WHERE auto_tipo = '2' AND auto_cidade = '$cidade'";
                $executar = mysqli_query($conexao, $automoveis);
                while ($dados = mysqli_fetch_assoc($executar)) {
                  $id_auto = $dados['auto_id'];
                  $nome = $dados['auto_modelo'];
                  $placa = $dados['auto_placa'];
                  echo "<option value ='$id_auto'>$nome com a placa $placa</option>";
                }
                ?>
              </select>
            </div>
           <div class="form-group">
             <div class="row">
             <div class="col">

              <label for="exampleFormControlQuilometragem">Quilometragem Inicial</label>
              <input type="number" class="form-control" id="exampleFormControlQuilometragem" name="km" required="required">
             </div>
             <div class="col">
              <label for="exampleFormControlQuilometragem2">Quilometragem Final</label>
              <input type="number" class="form-control" id="exampleFormControlQuilometragem2" name="km2" required="required">
              </div>
             </div>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Observação</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="obs" maxlength="500"></textarea>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Fim do Modal -->
  <!-- Modal Auxiliar-->
  <div class="modal fade" id="exampleModalAuxiliar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLong" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitlePreencher">Preencha estes dados Auxiliar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../../controle/inserir_modal.php" method="POST">
            <input type="hidden" name="usuario" value=<?php echo $id ?>></td>
            <input type="hidden" name="tipo" value="3">
            <div class="form-group">
              <label for="exampleFormControlData">Data</label>
              <input type="date" class="form-control" id="exampleFormControlInput1" name="data" required="required">
            </div>
            <div class="row">
                <div class="col">
                <label>Horário Inicial</label>
                  <input type="time" class="form-control" name="horai" required = "required">
                </div>
                
                <div class="col">
                <label>Horário Final</label>
                  <input type="time" class="form-control" name="horaf" required = "required">
                </div>
              </div>
            <div class="form-group">
              <label for="SelectFormulario">Selecione o veículo</label>
              <select class="form-control" id="SelectFormulario" name="automoveis">
                <?php
                include "../../controle/conexao.php";
                $automoveis = "SELECT * FROM automoveis WHERE auto_tipo = '2' AND auto_cidade = '$cidade'";
                $executar = mysqli_query($conexao, $automoveis);
                while ($dados = mysqli_fetch_assoc($executar)) {
                  $id_auto = $dados['auto_id'];
                  $nome = $dados['auto_modelo'];
                  $placa = $dados['auto_placa'];
                  echo "<option value ='$id_auto'>$nome com a placa $placa</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Observação</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="obs"></textarea>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Fim do Modal -->
  <div class="py-5 text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <p class="mb-3">"Oferecemos Internet via Fibra Óptica. Qualidade e velocidade no acesso à Internet, para sua casa/empresa. Desfrute de filmes, series, chamadas de voz e vídeo, TV On-line, vídeo monitoramento, e qualquer outro serviço que exija super velocidades."</p>
          <a class="btn btn-primary" href="#">Ver Mais</a>
        </div>
      </div>
    </div>
  </div>
  <div class="text-white" style="	background-image: url(&quot;../../images/back_footer.jpg&quot;);	background-position: top left;	background-size: cover;	background-repeat: no-repeat;">
    <div class="container">
      <div class="row">
        <div class="p-4 col-md-3">
          <h2 class="mb-4">Sobralnet</h2>
          <p>Empresa especializada em telecomunicações, cabeamento estruturado e redes de computadores.</p>
        </div>
        <div class="p-4 col-md-3">
          <h2 class="mb-4">Mapsite</h2>
          <ul class="list-unstyled text-white"> <a href="#home" class="text-white">Home</a> <br> <a href="#sobre" class="text-white">Sobre nós</a> <br> <a href="#equipe" class="text-white">Equipe</a> <br> </ul>
        </div>
        <div class="p-4 col-md-3">
          <h2 class="mb-4">Contatos</h2>
          <p class="text-white"> <a href="#" class="text-white">
              <i class="fa d-inline mr-3 text-muted fa-phone"></i></a> </p>
          <p class="text-white"> <a href="#" class="text-white">
              <i class="fa d-inline mr-3 text-muted fa-envelope-o"></i>n</a>osobral@gmail.com</p>
          <p class="text-white"> <a href="#" class="text-white">
              <i class="fa d-inline mr-3 fa-map-marker text-muted"></i>C</a>anindé - CE</p>
        </div>
        <div class="p-4 col-md-3">
          <h2 class="mb-4 text-white">Alguma Sugestão?</h2>
          <form>
            <fieldset class="form-group"> <label for="exampleInputEmail1">Escreva para nós!</label> <input type="text" class="form-control" placeholder="Digite a sua sugestão, dúvida e relatos sobre o sistema&quot;"> </fieldset> <button type="submit" class="btn btn-outline-dark text-white">Enviar</button>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-3">
          <p class="text-center">© Copyright 2021 Sobralnet Júlio de Castro, Gustavo Francelino, Sabrini Freire, Andeson Silva- Todos os direitos reservados. </p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>