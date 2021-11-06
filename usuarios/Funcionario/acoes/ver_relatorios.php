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
        <div class="container">
            <a class="navbar-brand" href="#">
                <!--<i class="fa d-inline fa-lg fa-stop-circle"></i>-->
                <!--<b> BRAND</b>-->
            </a>
            <a class="navbar-brand" href="#"><img src="../../../images/logo_2.png"></a>
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
    <div class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center mt-2">Relatórios Enviados por Você</h3>
                </div>
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
                                    <input type="time" class="form-control" name="horai" required="required">
                                </div>

                                <div class="col">
                                    <label>Horário Final</label>
                                    <input type="time" class="form-control" name="horaf" required="required">
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
                                <input type="time" class="form-control" name="horai" required="required">
                            </div>

                            <div class="col">
                                <label>Horário Final</label>
                                <input type="time" class="form-control" name="horaf" required="required">
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
                                <input type="time" class="form-control" name="horai" required="required">
                            </div>

                            <div class="col">
                                <label>Horário Final</label>
                                <input type="time" class="form-control" name="horaf" required="required">
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
    <div class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table ">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">Código</th>
                                    <th class="text-center">Nome</th>
                                    <th class="text-center">Data</th>
                                    <th class="text-center">Tipo</th>
                                    <th class="text-center">Automóvel</th>
                                    <th class="text-center">(Km) Inicial</th>
                                    <th class="text-center">(Km) Final</th>
                                    <th class="text-center">Ver</th>
                                    <th class="text-center">Deletar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "../../../controle/conexao.php";
                                $id_usuario = $_SESSION['usu_id'];
                                $query = "SELECT usu_nome, auto_modelo, auto_placa, tra_data,tra_id, tra_tipo,tra_quilometragem, tra_quilometragemf FROM transacao INNER JOIN usuarios ON usuarios_usu_id = usu_id INNER JOIN automoveis ON auto_id = automoveis_auto_id WHERE usuarios_usu_id = '$id_usuario' ORDER BY `transacao`.`tra_id` DESC";
                                // Quantidade de registros por página
                                $registros = "10";
                                // Pagina Atual
                                $pagina = $_GET['pagina'];
                                if (!$pagina) {
                                    $pc = "1";
                                } else {
                                    $pc = $pagina;
                                }
                                $inicio = $pc - 1;
                                $inicio = $inicio * $registros;
                                $limite = mysqli_query($conexao, "$query LIMIT $inicio,$registros");
                                $todos = mysqli_query($conexao, "$query");
                                $tr = mysqli_num_rows($todos);
                                $total_paginas = ceil($tr / $registros);
                                $anterior = $pc - 1;
                                $proximo = $pc + 1;
                                $sql = mysqli_query($conexao, $query);
                                $sql = mysqli_query($conexao, $query);
                                while ($dados = mysqli_fetch_assoc($limite)) {
                                    $id = $dados['tra_id'];
                                    $nome = $dados['usu_nome'];
                                    $tipo = $dados['tra_tipo'];
                                    $data = $dados['tra_data'];
                                    $automovel = $dados['auto_modelo'];
                                    $placa = $dados['auto_placa'];
                                    $km = $dados['tra_quilometragem'];
                                    $km2 = $dados['tra_quilometragemf'];
                                    $array = array(
                                        1 => 'Motociclista',
                                        2 => 'Motorista',
                                        3 => 'Auxiliar'
                                    );
                                    $aux;
                                    if ($tipo == '1') {
                                        $aux = 'moto';
                                    } elseif ($tipo == '2') {
                                        $aux = 'carro';
                                    } elseif ($tipo == '3') {
                                        $aux = 'aux';
                                    }
                                    echo "<tr>
						<th scope='row' class='text-center'>$id</th>
							<td class='text-center'>$nome</td>
							<td class='text-center'>$data</td>
							<td class='text-center'>$array[$tipo]</td>
                            <td class='text-center'>$automovel com a placa: $placa</td>
                            <td class='text-center'>$km</td>
                            <td class='text-center'>$km2</td>
							<td class='text-center'><a href='relatorios/ver_relatorio_$aux.php?id=$id' target='black'><i class='fa fa-eye' aria-hidden='true'></i></a></td>
							<td class='text-center'><a href='#' onClick='apagar_relatorio_$aux($id)'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
						</tr>";
                                }
                                ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <ul class="pagination mx-auto">
                            <?php if ($pc > 1) { ?>
                                <li class="page-item"> <a class="page-link" href="?pagina=<?php echo $anterior ?>">Anterior</a> </li>
                            <?php } ?>
                            <?php for ($i = 1; $i <= $total_paginas; $i++) {
                                $style = NULL;
                                if ($i == $pc) {
                                    $style = "active";
                                }
                            ?>
                                <li class="page-item <?php echo $style ?>"> <a class="page-link" href="?pagina=<?php echo $i ?>"><?php echo $i; ?></a> </li>
                            <?php } ?>
                            <?php if ($pc < $total_paginas) { ?>
                                <li class="page-item"> <a class="page-link" href="?pagina=<?php echo $proximo ?>">Próximo</a> </li>
                            <?php } ?>
                        </ul>
                    </center>
                </div>
            </div>
        </div>
    </div>
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
                    <p class="text-white">
                        <a href="#" class="text-white">
                            <i class="fa d-inline mr-3 text-muted fa-phone"></i></a>
                    </p>
                    <p class="text-white">
                        <a href="#" class="text-white">
                            <i class="fa d-inline mr-3 text-muted fa-envelope-o"></i>nosobral@gmail.com</a>
                    </p>
                    <p class="text-white">
                        <a href="#" class="text-white">
                            <i class="fa d-inline mr-3 fa-map-marker text-muted"></i>Canindé - CE</a>
                    </p>
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
    <script src="../../../model/deletar/js/deletar.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>