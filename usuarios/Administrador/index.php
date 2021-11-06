<?php
session_start();
if (!$_SESSION['usu_email'] || !$_SESSION['usu_senha'] or $_SESSION['usu_tipo'] <> "1") {
    header('Location: ../../');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="../../images/icons/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Sobralnet - Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <!-- <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css"> -->
    <link rel="stylesheet" href="../../default/css/material-dashboard.css?v=2.1.2" >
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <!-- <link href="../assets/demo/demo.css" rel="stylesheet"> -->
</head>

<body>
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white">
            <div class="logo">
                <a href="#" class="simple-text logo-normal"><img class="img-responsive" src="../../images/logo_4.png"></a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="acoes/seu_perfil.php">
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
                <a class="nav-link dropdown-item" href="acoes/relatorios.php">
                  <i class="material-icons">
                    content_paste
                  </i>
                  <p>Todos</p>
                </a>
                <a class="nav-link dropdown-item" href="acoes/relatorios_can.php">
                  <i class="material-icons">
                    content_paste
                  </i>
                  <p>Canindé</p>
                </a>
                <a class="nav-link dropdown-item" href="acoes/relatorios_sob.php">
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
                            <div class="dropdown-menu" aria-labelledby="dropdownLink">
                                <a class="nav-link dropdown-item" href="acoes/epi.php">
                                    <i class="material-icons">
                                        engineering
                                    </i>
                                    <p>Epi</p>
                                </a>
                                <a class="nav-link dropdown-item" href="acoes/epc.php">
                                    <i class="material-icons">
                                        report
                                    </i>
                                    <p>Epc</p>
                                </a>
                                <a class="nav-link dropdown-item" href="acoes/ferramentas.php">
                                    <i class="material-icons">
                                        construction
                                    </i>
                                    <p>Ferramentas</p>
                                </a>
                                <a class="nav-link dropdown-item" href="acoes/pecas.php">
                                    <i class="material-icons">
                                        settings_suggest
                                    </i>
                                    <p>Peças automotivas</p>
                                </a>
                            </div>
                        </li>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link" href="acoes/equipe.php">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <p>Equipe</p>
                        </a>
                    </li>
                    <li class="nav-item active-pro ">
                        <a class="nav-link" href="../../controle/sair.php">
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
                        <a class="navbar-brand" href="javascript:;">Dashboard</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">
                           
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-warning card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">content_paste</i>

                                    </div>
                                    <?php $yesterday = date("Y-m-d", mktime(0, 0, 0, date("m") , date("d")-1,date("Y")));?>
                                    <p class="card-category">Relatórios : <?php echo $yesterday; ?></p>
                                    <h3 class="card-title">
                                        <?php

                                        $yesterday = date("Y-m-d", mktime(0, 0, 0, date("m") , date("d")-1,date("Y")));
                                      

                                        include "../../controle/conexao.php";
                                        $query = "SELECT COUNT(tra_id) FROM transacao WHERE tra_data = '$yesterday'";
                                        $sql = mysqli_query($conexao, $query) or die("Erro");
                                        while ($dados = mysqli_fetch_assoc($sql)) {
                                            $numero_funcionarios = $dados['COUNT(tra_id)'];
                                            echo $numero_funcionarios;
                                        } ?>
                                    </h3>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                     <i class="material-icons"> inbox </i>
                                        <a href="#" class='ml-1'>Todos os Relatórios </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                       


                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-danger card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">info_outline</i>
                                    </div>
                                    <p class="card-category">Pendências :<?php echo $yesterday;
                                        //$data hoje ?></p>
                                    
                                    <h3 class="card-title"><?php
                                        include "../../controle/conexao.php";
                                        // date_default_timezone_set('America/Fortaleza');
                                        // $data = date("Y-m-d");
                                        // Pendencia de ontem 
                                        $yesterday = date("Y-m-d", mktime(0, 0, 0, date("m") , date("d")-1,date("Y")));

                                        $query_pendencias_auto = "SELECT COUNT(tra_id), auto_modelo, tra_tipo, auto_placa, tra_data, usu_nome, pe_descricao, tran_pe_condicao FROM transacao INNER JOIN transacao_has_pecas ON transacao_tra_id = tra_id INNER JOIN pecas ON pe_id = pecas_pe_id INNER JOIN usuarios ON usu_id = usuarios_usu_id INNER JOIN automoveis ON automoveis_auto_id = auto_id WHERE tran_pe_condicao <> 'Conforme' AND tra_data = '$yesterday'";
                                        // condigo para selecionar as pendencias das condicoes dos veiculos SELECT tra_id, auto_modelo, tra_tipo, auto_placa, tra_data, usu_nome, pe_descricao, tran_pe_condicao FROM transacao INNER JOIN transacao_has_pecas ON transacao_tra_id = tra_id INNER JOIN pecas ON pe_id = pecas_pe_id INNER JOIN usuarios ON usu_id = usuarios_usu_id INNER JOIN automoveis ON automoveis_auto_id = auto_id WHERE tran_pe_condicao <> 'Conforme'
                                        $query_pendencias_ferramentas = "SELECT COUNT(tra_id), auto_modelo, tra_tipo, auto_placa, tra_data, usu_nome, fer_descricao, fer_has_transacao_descricao , fer_direcionamento FROM transacao INNER JOIN ferramentas_has_transacao ON transacao_tra_id = tra_id INNER JOIN ferramentas ON fer_id = ferramentas_fer_id INNER JOIN usuarios ON usu_id = usuarios_usu_id INNER JOIN automoveis ON automoveis_auto_id = auto_id WHERE fer_has_transacao_descricao <> 'Conforme' AND tra_data = '$yesterday'";
                                        // Codigo para selecionar as pendencias das ferramentas SELECT tra_id, auto_modelo, tra_tipo, auto_placa, tra_data, usu_nome, fer_descricao, fer_has_transacao_descricao , fer_direcionamento FROM transacao INNER JOIN ferramentas_has_transacao ON transacao_tra_id = tra_id INNER JOIN ferramentas ON fer_id = ferramentas_fer_id INNER JOIN usuarios ON usu_id = usuarios_usu_id INNER JOIN automoveis ON automoveis_auto_id = auto_id WHERE fer_has_transacao_descricao <> 'Conforme'
                                        $sql_pendencias_auto = mysqli_query($conexao, $query_pendencias_auto) or die("Erro");
                                        $sql_pendencias_fer = mysqli_query($conexao, $query_pendencias_ferramentas) or die("Erro");
                                        while ($dados = mysqli_fetch_assoc($sql_pendencias_auto)) {
                                        $numero_pendencias_auto = $dados['COUNT(tra_id)'];
                                        }
                                        while ($dados = mysqli_fetch_assoc($sql_pendencias_fer)) {
                                            $numero_pendencias_fer = $dados['COUNT(tra_id)'];
                                            }
                                            echo ($numero_pendencias_auto + $numero_pendencias_fer);
                                         ?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons text-danger">warning</i>
                                        
                                        <a href="acoes/pendencias.php">Todas  Pendências  </a>
                                    </div>
                                </div>
                            </div>
                        </div>



                         <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">
                                            group
                                        </i>
                                    </div>
                                    <p class="card-category">Funcionários</p>
                                    <h3 class="card-title">
                                        <?php
                                        include "../../controle/conexao.php";
                                        $query = "SELECT COUNT(usu_id) FROM usuarios WHERE usu_tipo = '2'";
                                        $sql = mysqli_query($conexao, $query) or die("Erro");
                                        while ($dados = mysqli_fetch_assoc($sql)) {
                                            $numero_funcionarios = $dados['COUNT(usu_id)'];
                                            echo $numero_funcionarios;
                                        } ?>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">
                                            contact_page
                                        </i>
                                        <a href="acoes/funcionarios.php">Ver todos os funcionários</a>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="fa fa-car" aria-hidden="true"></i>
                                    </div>
                                    <p class="card-category">Automóveis</p>
                                    <h3 class="card-title">
                                        <?php

                                        include "../../controle/conexao.php";
                                        $query = "SELECT COUNT(auto_id) FROM automoveis";
                                        $sql = mysqli_query($conexao, $query) or die("Erro");
                                        while ($dados = mysqli_fetch_assoc($sql)) {
                                            $numero_automoveis = $dados['COUNT(auto_id)'];
                                            echo $numero_automoveis;
                                        } ?>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">update</i>
                                        <a href="acoes/automoveis.php">Ver todos os automóveis</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <!--<img class="card-img-top" src="../../images/icons/img2.jpeg" alt="Card image cap">-->
                                <div class="card-body">
                                    <h5 class="card-title">Sobralnet</h5>
                                    <p class="card-text">O melhor provedor de internet de Sobral e região. Com variedades de planos de internet de banda larga. Atendimento especializado e plantão de assistência nós finais de semana.
                                    </p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Com variedades de planos de internet de banda larga;</li>
                                    <li class="list-group-item">Empresa com um bom serviço e ótimo atendimento ao cliente;</li>
                                    <li class="list-group-item">Trabalhamos com o que há de mais moderno no mundo no acesso à Internet: FIBRA ÓPTICA.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header card-header-warning">
                                    <h4 class="card-title">Outros Administradores</h4>
                                    <p class="card-category">Informações sobre os mesmos</p>
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-hover">
                                        <thead class="text-warning">
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>Email</th>
                                                <th>Contato</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            include "../../controle/conexao.php";
                                            $query = "SELECT * from usuarios WHERE usu_tipo = '1' and usu_id <> '1'";
                                            $sql = mysqli_query($conexao, $query) or die("Erro");
                                            while ($dados = mysqli_fetch_assoc($sql)) {
                                                $id = $dados['usu_id'];
                                                $nome = $dados['usu_nome'];
                                                $email = $dados['usu_email'];
                                                $contato = $dados['usu_contato'];
                                                echo "<tr>
                                                    <td>$id</td>
                                                    <td>$nome</td>
                                                    <td>$email</td>
                                                    <td>$contato</td>
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
            <footer class="footer">
                <div class="container-fluid text-center">
                    <div class="copyright">© Copyright 2021 Sobralnet Júlio de Castro, Gustavo Francelino, Sabrini Freire, Andeson Silva. </div>
                </div>
            </footer>
        </div>
    </div>
    <!--   Js   -->
    <script src="../../default/bootstrap/js/jquery.min.js"></script>
    <script src="../../default/bootstrap/js/popper.min.js"></script>
    <script src="../../default/bootstrap/js/bootstrap-material-design.min.js"></script>
    <script src="../../default/bootstrap/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Plugin para o momentoJs  -->
    <script src="../../default/bootstrap/js/plugins/moment.min.js"></script>
    <!--  Plugin para Sweet Alert -->
    <script src="../../default/bootstrap/js/plugins/sweetalert2.js"></script>
    <!-- Plugin de validação de formulários -->
    <script src="../../default/bootstrap/js/plugins/jquery.validate.min.js"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="../../default/bootstrap/js/plugins/jquery.bootstrap-wizard.js"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="../../default/bootstrap/js/plugins/bootstrap-selectpicker.js"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="../../default/bootstrap/js/plugins/bootstrap-datetimepicker.min.js"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="../../default/bootstrap/js/plugins/jquery.dataTables.min.js"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="../../default/bootstrap/js/plugins/bootstrap-tagsinput.js"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="../../default/bootstrap/js/plugins/jasny-bootstrap.min.js"></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="../../default/bootstrap/js/plugins/fullcalendar.min.js"></script>
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="../../default/bootstrap/js/plugins/jquery-jvectormap.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="../../default/bootstrap/js/plugins/nouislider.min.js"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="../../default/bootstrap/js/plugins/arrive.min.js"></script>
    <!-- Chartist JS -->
    <script src="../../default/bootstrap/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../../default/bootstrap/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../default/bootstrap/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="../../default/demo/demo.js"></script>

    <script>
        $(document).ready(function() {
            // O corpo dos métodos javascript pode ser encontrado em assets / js / demos.js
            md.initDashboardPageCharts();
        });
    </script>
</body>


</html>