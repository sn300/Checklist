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
  <title>Sobralnet - Relatórios</title>
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
          <li class="nav-item ">
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
            <li class="nav-item active">
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
              <div class="dropdown-menu" aria-labelledby="dropdownLink">
                <a class="nav-link dropdown-item" href="epi.php">
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
            <a class="navbar-brand" href="#">Relatórios gerados</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form" method="POST" id="form-pesquisa" action="pesquisar/pesquisar_relatorio.php">
              <div class="input-group no-border">
              <input type="date" name="pesquisa" id="pesquisa" class="form-control" placeholder="Pesquisar..." required>
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
           <a class="nav-link" >                  
                </a>
    <ul class="navbar-nav">
            <li class="nav-item">              
              <form class="navbar-form" method="POST" id="form-pesquisa2" action="pesquisar/pesquisar_relatorio_carro.php">
              <div class="input-group no-border">
              <input type="text" name="pesquisa2" id="pesquisa2" class="form-control" placeholder="PLACA" required>
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
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
                  <h4 class="card-title ">Relatórios de Canindé</h4>
                  <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th class='text-center'>
                          ID
                        </th>
                        <th class='text-center'>
                          Nome do Funcionário
                        </th>
                        <th class='text-center'>
                          Data
                        </th>
                        <th class='text-center'>
                          Automóvel
                        </th>
                        <th class='text-center'>
                          (Km) Inicial
                        </th>
                        <th class='text-center'>
                          (Km) Final
                        </th>
                        <th class='text-center'>
                          Placa
                        </th>
                        <th class='text-center'>
                          Tipo Funcionário
                        </th>

                        <th class='text-center'>
                          OBS
                        </th>

                        <th class='text-center'>
                          Ver Mais
                        </th>
                        <!--<th class='text-center'>
                          Deletar
                        </th>-->
                      </thead>
                      <tbody  class='result'>
                        <?php
                        include "../../../controle/conexao.php";
                        $query = "SELECT usu_nome,tra_data, tra_id, tra_tipo, tra_quilometragem, tra_quilometragemf, auto_modelo, auto_placa, tra_obs FROM transacao INNER JOIN usuarios ON usuarios_usu_id = usu_id 
                        INNER JOIN automoveis ON automoveis_auto_id = auto_id WHERE usu_cidade = 'Canindé' ORDER BY `transacao`.`tra_data` DESC";

// ------------

  // Quantidade de registros por página
                                $registros = "200";
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

// ------------



                        $sql = mysqli_query($conexao, $query);
                        if(($query) AND ($sql->num_rows != 0 )){
                        while ($dados = mysqli_fetch_assoc($limite)) {
                          $id = $dados['tra_id'];
                          $nome = $dados['usu_nome'];
                          $tipo = $dados['tra_tipo'];
                          $automovel = $dados['auto_modelo'];
                          $km = $dados['tra_quilometragem'];
                          $km2 = $dados['tra_quilometragemf'];
                          $placa = $dados['auto_placa'];
                          $data = $dados['tra_data'];
                          $obs = $dados['tra_obs'];
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
              <td class='text-center'>$automovel</td>
              <td class='text-center'>$km</td>
              <td class='text-center'>$km2</td>
              
              <td class='text-center'>$placa</td>
						    <td class='text-center'>$array[$tipo]</td>
                            <td class='text-center'>$obs</td>

							<td class='text-center'><a href='relatorios/ver_relatorio_$aux.php?id=$id' target='black'><i class='fa fa-eye' aria-hidden='true'></i></a></td>
							<!--<td class='text-center'><a href='#' onClick='apagar_relatorio($id)'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
						</tr>-->";
          }
        }else{
          echo "<tr><th>Nenhum relatório feito</th></tr>";
        }
                        ?>
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

<!-- pagination -->
     <div class="py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <ul class="pagination mx-auto">
                            <?php if ($pc > 1) { ?>
                                <li class="page-item"> <a class="page-link" href="?pagina=<?php echo $anterior ?>">Anterior</a> </li>
                            <?php } ?>
                            
                            <?php
                            /*$max_links = 10;
                            $links_laterais = ceil($max_links / 2);

                            $inicio = $pagina - $links_laterais;
                          
                            $limite2 = $pagina + $links_laterais;*/
                            
                             for ($i = $pagina - 3 , $limiteDeLinks = $i + 6; $i <= $limiteDeLinks ; $i++) {
                                 if($i < 1){
                                    $i = 1;
                                    $limiteDeLinks = 7;}

                                  // $i = $inicio + 5 ; $i <= $limite2 ; $i++
                                //($i = ($pc-1)-4; $i < ($total_paginas + 1); $i++)
                                //($i = 1; $i <= $total_paginas; $i++)
                                $style = NULL;
                                if ($i == $pc) {
                                    $style = "active";
                                }
                            ?>
                                <li class="page-item <?php echo $style ?>"> <a class="page-link" href="?pagina=<?php echo $i ?>">
                                <?php echo $i; ?></a> </li>
                            <?php }                           
                                                    
                             ?>
                            <?php if ($pc < $total_paginas) { ?>
                                <li class="page-item"> <a class="page-link" href="?pagina=<?php echo $proximo ?>">Próximo</a> </li>
                            <?php } ?>
                        </ul>
                    </center>
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
</body>

</html>