<?php
session_start();
if (!$_SESSION['usu_email'] || !$_SESSION['usu_senha'] or $_SESSION['usu_tipo'] <> "1") {
    header('Location: ../../../');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../../images/icons/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Sobralnet - Epi´s</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="../../../default/css/material-dashboard.css?v=2.1.2" rel="stylesheet">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <!-- <link href="../assets/demo/demo.css" rel="stylesheet" /> -->
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white">
            <div class="logo">
                <a href="#" class="simple-text logo-normal"><img class="img-responsive" src="../../../images/logo_4.png"></a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="seu_perfil.php">
                            <i class="material-icons">person</i>
                            <p>Seu Perfil</p>
                        </a>
                    </li>
                    

                    <div class="dropdown show">
            <li class="nav-item">
              <a class="nav-link" href='#' id="dropdownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">content_paste</i>
                <p>Relatórios</p>
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownLink">
                <a class="nav-link dropdown-item" href="relatorios.php">
                  <i class="material-icons">
                    content_paste
                  </i>
                  <p>Todos</p>
                </a>
                <a class="nav-link dropdown-item" href="relatorios_can.php">
                  <i class="material-icons">
                    content_paste
                  </i>
                  <p>Canindé</p>
                </a>
                <a class="nav-link dropdown-item" href="relatorios_sob.php">
                  <i class="material-icons">
                    content_paste
                  </i>
                  <p>Sobral</p>
                </a>
                
              </div>
            </li>
          </div> 



                    <div class="dropdown show">
                        <li class="nav-item ">
                            <a class="nav-link" href='#' id="dropdownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">library_books</i>
                                <p>Verificar</p>
                            </a>
                            <div class="dropdown-menu active" aria-labelledby="dropdownLink">
                                <a class="nav-link dropdown-item" href="epi.html">
                                    <i class="material-icons">
                                        engineering
                                    </i>
                                    <p>Epi</p>
                                </a>
                                <a class="nav-link dropdown-item" href="epc.php">
                                    <i class="material-icons">
                                        report
                                    </i>
                                    <p>Epc</p>
                                </a>
                                <a class="nav-link dropdown-item" href="ferramentas.php">
                                    <i class="material-icons">
                                        construction
                                    </i>
                                    <p>Ferramentas</p>
                                </a>
                                <a class="nav-link dropdown-item" href="pecas.php">
                                    <i class="material-icons">
                                        settings_suggest
                                    </i>
                                    <p>Peças automotivas</p>
                                </a>
                            </div>
                        </li>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link" href="equipe.php">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <p>Equipe</p>
                        </a>
                    </li>
                    <li class="nav-item active-pro ">
                        <a class="nav-link" href="../../../controle/sair.php">
                        <i class="fa fa-power-off" aria-hidden="true"></i>
                            <p>Sair</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:;">Epi´s</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <form class="navbar-form" method="POST" id="form-pesquisa" action="">
                            <div class="input-group no-border">
                                <input type="text" name="pesquisa" id="pesquisa" class="form-control" placeholder="Pesquisar..." required>
                                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                
                            </li>
                            <li class="nav-item dropdown">
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a class="dropdown-item" href="seu_perfil.php">Seu Perfil</a>
                                    <a class="dropdown-item" href="../../../controle/sair.php">Sair</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">Epi´s</h4>
                                    <p class="card-category">Descrição e autorizações</p>
                                    <div class="float-right">
                                        <a href="#" data-toggle="modal" data-target="#exampleModalLongEpis">
                                            <i class="material-icons">
                                                add_circle
                                            </i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-dark">
                                                <th class='text-center'>
                                                    ID
                                                </th>
                                                <th class='text-center'>
                                                    Descrição
                                                </th>
                                                <th class='text-center'>
                                                    Autorização
                                                </th>
                                                <th class="text-center">
                                                    Editar
                                                </th>
                                                <th class='text-center'>
                                                    Deletar
                                                </th>
                                            </thead>
                                            <tbody class='result'>
                                                <?php
                                                include "../../../controle/conexao.php";
                                                $query = "SELECT * FROM `ferramentas` WHERE fer_direcionamento = 'Epi'";
                                                $sql = mysqli_query($conexao, $query) or die("Erro");
                                                while ($dados = mysqli_fetch_assoc($sql)) {
                                                    $id = $dados['fer_id'];
                                                    $descricao = $dados['fer_descricao'];
                                                    $tipo = $dados['fer_tipo'];
                                                    $aux = array(
                                                        1 => "Motociclista",
                                                        2 => "Motorista",
                                                        3 => "Motoristas",
                                                        4 => "Motorista e Auxiliar",
                                                        5 => "Todos usam"
                                                    );
                                                    echo "<tr>
                                 <td class='text-center'>$id</td>
                                 <td class='text-center'>$descricao</td>
                                 <td class='text-center'>$aux[$tipo]</td>
                                 <td class='text-center'><a href='#' class='editar_epi' id='$id'><i class='fa fa-pencil-square' aria-hidden='true'></i></a></td>
					<td class='text-center'>
                    <a href='#' onClick='apagar_epi($id)'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
                              </tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal  adicionar Epi´s-->
            <div class="modal fade" id="exampleModalLongEpis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLong" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-center" id="exampleModalLongTitlePreencher">Adicionar Epi´s</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="../../../controle/adicionar/adicionar_epis.php" method="POST">
                            <div class="form-group">
                                    <label for="descricao">Descrição do Epi</label>
                                    <input type="text" class="form-control" id="descricao" required="required" placeholder="Descrição" name="descricao">
                                </div>
                                <div class="form-group">
                                    <label for="tipo">Autorização</label>
                                    <select class="form-control" id="tipo" name="tipo">
                                        <option value="1">Motociclista</option>
                                        <option value="2">Motorista</option>
                                        <option value="3">Motoristas</option>
                                        <option value="4">Motorista e Auxiliar</option>
                                        <option value="5">Todos utilizam</option>
                                    </select>
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
            <!-- Modal editar Epi´s-->
            <div class="modal fade" id="EditarModalEpi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLong" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-center" id="exampleModalLongTitlePreencher">Editar Epi</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="../../../controle/atualizar/atualizar.php?atualizar=epi" method="POST">
                            <div id="retornar_epi">
                                
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
            <footer class="footer">
                <div class="container-fluid text-center">
                    <div class="copyright">© Copyright 2021 Sobralnet Júlio de Castro, Gustavo Francelino, Sabrini Freire, Andeson Silva. </div>
                </div>
            </footer>
        </div>
    </div>
    <!--   Js   -->
    <script src="../../../model/deletar/js/deletar.js"></script>
    <script src="../../../default/bootstrap/js/jquery.min.js"></script>
    <script src="../../../default/bootstrap/js/popper.min.js"></script>
    <script src="../../../default/bootstrap/js/bootstrap-material-design.min.js"></script>
    <script src="../../../default/bootstrap/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Plugin para o momentoJs  -->
    <script src="../../../default/bootstrap/js/plugins/moment.min.js"></script>
    <!--  Plugin para Sweet Alert -->
    <script src="../../../default/bootstrap/js/plugins/sweetalert2.js"></script>
    <!-- Plugin de validação de formulários -->
    <script src="../../../default/bootstrap/js/plugins/jquery.validate.min.js"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="../../../default/bootstrap/js/plugins/jquery.bootstrap-wizard.js"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="../../../default/bootstrap/js/plugins/bootstrap-selectpicker.js"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="../../../default/bootstrap/js/plugins/bootstrap-datetimepicker.min.js"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="../../../default/bootstrap/js/plugins/jquery.dataTables.min.js"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="../../../default/bootstrap/js/plugins/bootstrap-tagsinput.js"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="../../../default/bootstrap/js/plugins/jasny-bootstrap.min.js"></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="../../../default/bootstrap/js/plugins/fullcalendar.min.js"></script>
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="../../../default/bootstrap/js/plugins/jquery-jvectormap.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="../../../default/bootstrap/js/plugins/nouislider.min.js"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="../../../default/bootstrap/js/plugins/arrive.min.js"></script>
    <!-- Chartist JS -->
    <script src="../../../default/bootstrap/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../../../default/bootstrap/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../../default/bootstrap/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="../../../default/demo/demo.js"></script>
    <script>
        $(function() {
            $("#pesquisa").keyup(function() {
                //Recuperar o valor do campo
                var pesquisa = $(this).val();

                //Verificar se há algo digitado
                if (pesquisa != '') {
                    var dados = {
                        palavra: pesquisa
                    }
                    $.post('pesquisar/pesquisar_epi.php', dados, function(retorna) {
                        //Mostra dentro da ul os resultado obtidos 
                        $(".result").html(retorna);
                    });
                }
            });
        });
        $(document).ready(function() {
            $(document).on('click', '.editar_epi', function() {
                var epi_id = $(this).attr("id");
                // alert(epi_id);
                // Verificar se há valor na variável "user_id".
                if (epi_id!== '') {
                    var dados = {
                        epi_id: epi_id
                    };
                    $.post('dados/dados_epi.php', dados, function(retorna) {
                        //Carregar o conteúdo para o usuário
                        $("#retornar_epi").html(retorna);
                        $('#EditarModalEpi').modal('show');
                    });
                }
            });
        });
    </script>
</body>

</html>