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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
</head>

<body>
  <nav class="navbar navbar-expand-md fixed bg-light navbar-light" id="home">
    <div class="container"> <a class="navbar-brand" href="#">
        <!--<i class="fa d-inline fa-lg fa-stop-circle"></i>-->
        <!--<b> BRAND</b>-->
      </a><a class="navbar-brand" href="#"><img src="../../../images/logo_2.png"></a>
      <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar10">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar10">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"> <a class="nav-link" href="../index.php">Home</a> </li>
          <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Criar Relatório&nbsp;</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalLong">Motociclista</a> 
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalLongMotorista">Motorista</a> 
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalAuxiliar">Auxiliar</a>
            </div>
          </li>
          <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Checar</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> <a class="dropdown-item" href="ver_relatorios.php?pagina=1">Relatórios Enviados</a> <a class="dropdown-item" href="ver_perfil.php">Seu Perfil</a> </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../../controle/sair.php"><i class="fa fa-sign-out">&nbsp;Sair</i><br></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <!-- Modal Motociclista-->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLong" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitlePreencher">Preencha estes dados</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../../../controle/inserir_modal.php" method="POST">
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
                include "../../../controle/conexao.php";
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
              <label for="exampleFormControlQuilometragem">Quilometragem</label>
              <input type="text" class="form-control" id="exampleFormControlQuilometragem" name="km" required="required">
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Observação</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="obs"></textarea>
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
          <h5 class="modal-title" id="exampleModalLongTitlePreencher">Preencha estes dados</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../../../controle/inserir_modal.php" method="POST">
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
                include "../../../controle/conexao.php";
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
              <label for="exampleFormControlQuilometragem">Quilometragem</label>
              <input type="text" class="form-control" id="exampleFormControlQuilometragem" name="km" required="required">
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
  <!-- Modal Auxiliar-->
  <div class="modal fade" id="exampleModalAuxiliar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLong" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitlePreencher">Preencha estes dados</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../../../controle/inserir_modal.php" method="POST">
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
  <div class="p-2 mt-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center mt-2">Seus Dados</h2>
        </div>
      </div>
    </div>
    <?php
    include "../../../controle/conexao.php";
    $sql = "SELECT * FROM usuarios WHERE usu_id = '$id'";
    $executar = mysqli_query($conexao, $sql);
    while ($dados = mysqli_fetch_assoc($executar)) {
      $id = $dados['usu_id'];
      $nome = $dados['usu_nome'];
      $tipo = $dados['usu_tipo'];
      $email = $dados['usu_email'];
      $senha = $dados['usu_senha'];
      $usu_cpf = $dados['usu_cpf'];
      $foto = $dados['usu_foto'];
      $usu_contato = $dados['usu_contato'];
    }
    ?>
  </div>
  <div class="py-3 mb-3">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="image-upload">
            <?php if($foto != 0){?>
              <img id="fotoa" class="img img-responsive img-thumbnail"  src="../../../images/perfil/<?php echo $foto;?>">
             <?php } else{?>
              <img id="fotoa" class="img img-responsive img-thumbnail"  src="../../../images/perfil/foto.png">
            <?php }?> 
          </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <h3 class="mb-3">Funcionário</h3>
            <div>
              <form>
                <input type='hidden' type='hidden' id='id' value='<?php echo $id; ?>'>
                <label>Nome:</label>
                <div class="form-group"><input type="text" id="nome_a" class="form-control nome" value="<?php echo $nome; ?>" placeholder="<?php echo $nome; ?>" readonly></div>
                <label>Email:</label>
                <div class="form-row">
                  <div class="form-group col-md-12"> <input type="email" id="email_a" class="form-control" id="form36" value="<?php echo $email; ?>" placeholder="<?php echo $email; ?>" readonly> </div>
                </div>
                <label>CPF:</label>
                <div class="form-row">
                  <div class="form-group col-md-12"> <input type="text" id="cpf_a" class="form-control" value="<?php echo $usu_cpf; ?>" placeholder="<?php echo $usu_cpf; ?>" readonly> </div>
                </div>
                <label>Senha:</label>
                <div class="form-group"> <input type="password" class="form-control" id="senha_a" value="<?php echo $senha; ?>" placeholder="*****" readonly> </div>
                <!-- <div class="form-group"> </div> -->
                <div class="form-row">
                  <div class="form-group col-md-6"> <label>Contato:</label><input type="text" class="form-control" id="contato_a" value="<?php echo $usu_contato; ?>" placeholder="<?php echo $usu_contato; ?>" readonly> </div>
                  <div class="form-group col-md-6"> <label>Cidade:</label><input type="text" class="form-control" id="cidade_a" value="Canindé" placeholder="Canindé" readonly> </div>
                </div>
                <button type="button" class="editar btn btn-primary">Alterar</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- Modal Editar-->
  <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLong" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-center" id="exampleModalLongTitlePreencher">Atualizar</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="../../../controle/atualizar/atualizar.php?atualizar=editar_fun_perfil" enctype="multipart/form-data">
            <input type='hidden' id="id" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
              <label for="nome">Nome Completo</label>
              <input type="text" class="form-control custo" id="nome_e" required="required" placeholder="Nome completo" name="nome">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email_e" required="required" placeholder="Email" name="email">
            </div>
            <div class="form-group">
              <label for="cpf">Cpf</label>
              <input type="text" class="form-control" size="14" maxlength="14" required="" id="cpf_e" name="cpf">
            </div>
            <div class="form-group">
              <label for="foto">Foto</label>
              <input type="file" name="foto" id="fotoe" accept="image/*" class="form-control" required="required">
            </div>
            <div class="form-group">
              <label for="senha">Senha</label>
              <input type="password" class="form-control" id="senha_e" name="senha" required="required" maxlength="15" placeholder="******">
            </div>
            <div class="form-group">
              <label for="contato">Contato</label>
              <input type="number" class="form-control" id="contato_e" name="contato" required="required" maxlength="15">
            </div>
            <input type="hidden" class="form-control" id="contato_e" name="cidade" required="required" value="Canindé">
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
  <div class="text-white" style="	background-image: url(&quot;../../../images/back_footer.jpg&quot;);	background-position: top left;	background-size: cover;	background-repeat: no-repeat;">
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
              <i class="fa d-inline mr-3 text-muted fa-phone"></i>+246 - 542 550 5462</a> </p>
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
          <p class="text-center">© Copyright 2021 Sobralnet Julio de Castro, Gustavo Francelino, Sabrini Freire, Andeson Silva- Todos os direitos reservados. </p>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="../../../model/atualizar/editar.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>