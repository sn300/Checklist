<?php
session_start();
if (!isset($_SESSION['usu_email']) or !isset($_SESSION['usu_senha']) || $_SESSION['usu_tipo'] <> "1" || !isset($_POST['pesquisa'])) {
  header('Location: ../../../../');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="../../../../images/icons/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Sobralnet - Pesquisar Pendencias</title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../../../../default/css/material-dashboard.css?v=2.1.2" rel="stylesheet">
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!-- <link href="../assets/demo/demo.css" rel="stylesheet" /> -->
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <div class="logo">
        <a href="#" class="simple-text logo-normal"><img class="img-responsive" src="../../../../images/logo_4.png"></a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="../../index.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../seu_perfil.php">
              <i class="material-icons">person</i>
              <p>Seu Perfil</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../relatorios.php">
              <i class="material-icons">content_paste</i>
              <p>Relatórios</p>
            </a>
          </li>
          <div class="dropdown show">
            <li class="nav-item ">
              <a class="nav-link" href='#' id="dropdownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">library_books</i>
                <p>Verificar</p>
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownLink">
                <a class="nav-link dropdown-item" href="../epi.php">
                  <i class="material-icons">
                    engineering
                  </i>
                  <p>Epi</p>
                </a>
                <a class="nav-link dropdown-item" href="../epc.php">
                  <i class="material-icons">
                    report
                  </i>
                  <p>Epc</p>
                </a>
                <a class="nav-link dropdown-item" href="../ferramentas.php">
                  <i class="material-icons">
                    construction
                  </i>
                  <p>Ferramentas</p>
                </a>
                <a class="nav-link dropdown-item" href="../pecas.php">
                  <i class="material-icons">
                    settings_suggest
                  </i>
                  <p>Peças automotivas</p>
                </a>
              </div>
            </li>
          </div>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa fa-users" aria-hidden="true"></i>
              <p>Equipe</p>
            </a>
          </li>
          <li class="nav-item active-pro ">
            <a class="nav-link" href="../../../../controle/sair.php">
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
          <a href="../pendencias.php"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
            <a class="navbar-brand" href="#">Pesquisar Pendências</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form" method="POST" id="form-pesquisa" action="pesquisar_pendencias.php">
              <div class="input-group no-border">
              <input type="date" name="pesquisa" id="pesquisa" class="form-control" placeholder="Pesquisar..." required>
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
                  <a class="dropdown-item" href="../seu_perfil.php">Seu Perfil</a>
                  <a class="dropdown-item" href="../../../../controle/sair.php">Sair</a>
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
                  <h4 class="card-title ">Todas as pendencias do dia: <?php echo $_POST['pesquisa'];?></h4>
                  <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <tr>
                          <th class='text-center'>
                            Datas
                          </th>
                          <th class='text-center'>
                            Quantidade de Pendências
                          </th>
                          <th class='text-center'>
                            Ver
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        include "../../../../controle/conexao.php";
                        $data_tra = $_POST['pesquisa'];
                          echo "<tr>
						<th scope='row' class='text-center'>$data_tra</th>";
                          $query_pendencias_auto = "SELECT COUNT(tra_id), auto_modelo, tra_tipo, auto_placa, tra_data, usu_nome, pe_descricao, usu_cidade, tran_pe_condicao FROM transacao INNER JOIN transacao_has_pecas ON transacao_tra_id = tra_id INNER JOIN pecas ON pe_id = pecas_pe_id INNER JOIN usuarios ON usu_id = usuarios_usu_id INNER JOIN automoveis ON automoveis_auto_id = auto_id WHERE tran_pe_condicao <> 'Conforme' AND tra_data = '$data_tra'";
                          $query_pendencias_ferramentas = "SELECT COUNT(tra_id), auto_modelo, tra_tipo, auto_placa, tra_data, usu_nome, usu_cidade, fer_descricao, fer_has_transacao_descricao , fer_direcionamento FROM transacao INNER JOIN ferramentas_has_transacao ON transacao_tra_id = tra_id INNER JOIN ferramentas ON fer_id = ferramentas_fer_id INNER JOIN usuarios ON usu_id = usuarios_usu_id INNER JOIN automoveis ON automoveis_auto_id = auto_id WHERE fer_has_transacao_descricao <> 'Conforme' AND tra_data = '$data_tra'";
                          $sql_pendencias_auto = mysqli_query($conexao, $query_pendencias_auto) or die("Erro");
                          $sql_pendencias_fer = mysqli_query($conexao, $query_pendencias_ferramentas) or die("Erro");
                          while ($dados = mysqli_fetch_assoc($sql_pendencias_auto)) {
                            $numero_pendencias_auto = $dados['COUNT(tra_id)'];
                          }
                          while ($dados = mysqli_fetch_assoc($sql_pendencias_fer)) {
                            $numero_pendencias_fer = $dados['COUNT(tra_id)'];
                          }
                          $total = ($numero_pendencias_auto + $numero_pendencias_fer);
                          if ($total == 0){
                            echo "<td class='text-center'>Nenhuma Pendência</td>";
                          }else{
                            echo "<td class='text-center'>".$total." Pendência(s)</td>";
                          }
                          
                           echo "<td class='text-center'><a href='../relatorios/todas_pendencias.php?tra_data=$data_tra' target='_black'><i class='fa fa-eye' aria-hidden='true'></i></a></td></tr>";

                    
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
      <footer class="footer">
        <div class="container-fluid text-center">
          <div class="copyright">© Copyright 2021 Sobralnet Júlio de Castro, Gustavo Francelino, Sabrini Freire, Andeson Silva. </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Js   -->
  <script src="../../../../default/bootstrap/js/jquery.min.js"></script>
  <script src="../../../../default/bootstrap/js/popper.min.js"></script>
  <script src="../../../../default/bootstrap/js/bootstrap-material-design.min.js"></script>
  <script src="../../../../default/bootstrap/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin para o momentoJs  -->
  <script src="../../../../default/bootstrap/js/plugins/moment.min.js"></script>
  <!--  Plugin para Sweet Alert -->
  <script src="../../../../default/bootstrap/js/plugins/sweetalert2.js"></script>
  <!-- Plugin de validação de formulários -->
  <script src="../../../../default/bootstrap/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../../../../default/bootstrap/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../../../../default/bootstrap/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../../../../default/bootstrap/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../../../../default/bootstrap/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../../../../default/bootstrap/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../../../../default/bootstrap/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../../../../default/bootstrap/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../../../../default/bootstrap/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../../../../default/bootstrap/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../../../../default/bootstrap/js/plugins/arrive.min.js"></script>
  <!-- Chartist JS -->
  <script src="../../../../default/bootstrap/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../../../../default/bootstrap/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../../../../default/bootstrap/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../../../../default/demo/demo.js"></script>
</body>

</html>