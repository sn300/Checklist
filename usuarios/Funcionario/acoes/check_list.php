<?php
session_start();
if (!$_SESSION['usu_email'] || !$_SESSION['usu_senha'] or $_SESSION['usu_tipo'] <> "2") {
  header('Location: ../../');
} ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
</head>

<body>
  <div class="py-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table">
              <h3 class='text-center mt-3 mb-3'>Ferramentas</h3>
              <thead>

                <?php
                $tipo = $_GET['tipo'];
                $id_inserido = $_GET['id_inserido'];
                include "../../../controle/conexao.php";
                if ($tipo == '1') { ?>
                  <tr>
                    <th>#</th>
                    <th>Descrição</th>
                    <th>Condição</th>
                  </tr>
              </thead>
              <form action='gerar.php' method='POST'>
                <input type='hidden' name='id_inserido' value='<?php echo $id_inserido; ?>'>
                <input type='hidden' name='tipo' value='<?php echo $tipo; ?>'>
                <tbody>
                  <?php
                  $query = "SELECT * FROM ferramentas WHERE fer_tipo <> '2' and fer_tipo <> '4' and fer_direcionamento = 'Ferramentas'";
                  $sql = mysqli_query($conexao, $query);
                  while ($dados = mysqli_fetch_assoc($sql)) {
                    $id = $dados['fer_id'];
                    $nome = $dados['fer_descricao'];

                  ?>
                    <tr>
                      <th><?php echo $id; ?></th>
                      <td><?php echo $nome; ?></td>
                      <input type='hidden' name='ferramenta[]' value="<?php echo $id; ?>">
                      <td><select class="form-control" name="fer_situacao[]">
                          <option value="Conforme" class="text-success">Conforme</option>
                          <option value="Não Conforme" class="text-warning">Não Conforme</option>
                          <option value="Não Possui" class="text-danger">Não Possui</option>
                        </select></td>
                    </tr>
                  <?php } ?>
                </tbody>
            </table>
            <table class="table">
              <h3 class='text-center mt-3 mb-3'>Epi´s</h3>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Descrição</th>
                  <th>Condição</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = "SELECT * FROM ferramentas WHERE fer_tipo <> '2' and fer_tipo <> '4' and fer_direcionamento = 'Epi'";
                  $sql = mysqli_query($conexao, $query);
                  while ($dados = mysqli_fetch_assoc($sql)) {
                    $id = $dados['fer_id'];
                    $nome = $dados['fer_descricao'];

                ?>
                  <tr>
                    <th><?php echo $id; ?></th>
                    <td><?php echo $nome; ?></td>
                    <input type='hidden' name='epi[]' value='<?php echo $id; ?>'>
                    <td><select class="form-control" name="epi_situacao[]">
                        <option value="Conforme" class="text-success">Conforme</option>
                        <option value="Não Conforme" class="text-warning">Não Conforme</option>
                        <option value="Não Possui" class="text-danger">Não Possui</option>
                      </select></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <table class="table">
              <h3 class='text-center mt-3 mb-3'>Condições do Veículo</h3>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Descrição</th>
                  <th>Condição</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = "SELECT * FROM pecas WHERE pe_tipo <> '2'";
                  $sql = mysqli_query($conexao, $query);
                  while ($dados = mysqli_fetch_assoc($sql)) {
                    $id = $dados['pe_id'];
                    $nome = $dados['pe_descricao'];

                ?>
                  <tr>
                    <th><?php echo $id; ?></th>
                    <td><?php echo $nome; ?></td>
                    <input type='hidden' name='pecas[]' value='<?php echo $id; ?>'>
                    <td><select class="form-control" name="pecas_situacao[]">
                        <option value="Conforme" class="text-success">Conforme</option>
                        <option value="Não Conforme" class="text-warning">Não Conforme</option>
                        <option value="Não Possui" class="text-danger">Não Possui</option>
                      </select></td>
                  </tr>
                <?php } ?>

              </tbody>
            </table>
            <input type="submit" value="Enviar">
            </form>
          <?php } ?>
          <?php if ($tipo == '2') { ?>
            <tr>
              <th>#</th>
              <th>Descrição</th>
              <th>Condição</th>
            </tr>
            </thead>
            <form action='gerar.php' method='POST'>
              <input type='hidden' name='id_inserido' value='<?php echo $id_inserido; ?>'>
              <input type='hidden' name='tipo' value='<?php echo $tipo; ?>'>
              <tbody>
                <?php
                $query = "SELECT * FROM ferramentas WHERE fer_tipo <> '1'  and fer_direcionamento = 'Ferramentas'";
                $sql = mysqli_query($conexao, $query);
                while ($dados = mysqli_fetch_assoc($sql)) {
                  $id = $dados['fer_id'];
                  $nome = $dados['fer_descricao'];

                ?>
                  <tr>
                    <th><?php echo $id; ?></th>
                    <td><?php echo $nome; ?></td>
                    <input type='hidden' name='ferramenta[]' value="<?php echo $id; ?>">
                    <td><select class="form-control" name="fer_situacao[]">
                        <option value="Conforme" class="text-success">Conforme</option>
                        <option value="Não Conforme" class="text-warning">Não Conforme</option>
                        <option value="Não Possui" class="text-danger">Não Possui</option>
                      </select></td>
                  </tr>
                <?php } ?>
              </tbody>
              </table>
              <table class="table">
                <h3 class='text-center mt-3 mb-3'>Epi´s e Epc´s</h3>
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Descrição</th>
                    <th>Condição</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM ferramentas WHERE fer_tipo <> '1' and fer_direcionamento = 'Epi' OR fer_direcionamento = 'Epc'";
                  $sql = mysqli_query($conexao, $query);
                  while ($dados = mysqli_fetch_assoc($sql)) {
                    $id = $dados['fer_id'];
                    $nome = $dados['fer_descricao'];

                  ?>
                    <tr>
                      <th><?php echo $id; ?></th>
                      <td><?php echo $nome; ?></td>
                      <input type='hidden' name='epi[]' value='<?php echo $id; ?>'>
                      <td><select class="form-control" name="epi_situacao[]">
                          <option value="Conforme" class="text-success">Conforme</option>
                          <option value="Não Conforme" class="text-warning">Não Conforme</option>
                          <option value="Não Possui" class="text-danger">Não Possui</option>
                        </select></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
              <table class="table">
                <h3 class='text-center mt-3 mb-3'>Condições do Veículo</h3>
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Descrição</th>
                    <th>Condição</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM pecas WHERE pe_tipo <> '1'";
                  $sql = mysqli_query($conexao, $query);
                  while ($dados = mysqli_fetch_assoc($sql)) {
                    $id = $dados['pe_id'];
                    $nome = $dados['pe_descricao'];

                  ?>
                    <tr>
                      <th><?php echo $id; ?></th>
                      <td><?php echo $nome; ?></td>
                      <input type='hidden' name='pecas[]' value='<?php echo $id; ?>'>
                      <td><select class="form-control" name="pecas_situacao[]">
                          <option value="Conforme" class="text-success">Conforme</option>
                          <option value="Não Conforme" class="text-warning">Não Conforme</option>
                          <option value="Não Possui" class="text-danger">Não Possui</option>
                        </select></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                  </table>
                  <input type="submit" value="Enviar">
            </form>
          <?php } ?>
          <?php if ($tipo == '3') { ?>
            <tr>
              <th>#</th>
              <th>Descrição</th>
              <th>Condição</th>
            </tr>
            </thead>
           
            <form action='gerar.php' method='POST'>
              <input type='hidden' name='id_inserido' value='<?php echo $id_inserido; ?>'>
              <input type='hidden' name='tipo' value='<?php echo $tipo; ?>'>
              <tbody>
                <?php
                $query = "SELECT * FROM ferramentas WHERE fer_tipo = '4' OR fer_tipo = '5' and fer_direcionamento = 'Ferramentas'";
                $sql = mysqli_query($conexao, $query);
                while ($dados = mysqli_fetch_assoc($sql)) {
                  $id = $dados['fer_id'];
                  $nome = $dados['fer_descricao'];

                ?>
                  <tr>
                    <th><?php echo $id; ?></th>
                    <td><?php echo $nome; ?></td>
                    <input type='hidden' name='ferramenta[]' value="<?php echo $id; ?>">
                    <td><select class="form-control" name="fer_situacao[]">
                        <option value="Conforme" class="text-success">Conforme</option>
                        <option value="Não Conforme" class="text-warning">Não Conforme</option>
                        <option value="Não Possui" class="text-danger">Não Possui</option>
                      </select></td>
                  </tr>
                <?php } ?>
              </tbody>
              </table>
              <table class="table">
                <h3 class='text-center mt-3 mb-3'>Epi´s</h3>
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Descrição</th>
                    <th>Condição</th>
                  </tr>
                  
                </thead>
                <tbody>

                <!-- MD 21/04/21 -->
                  <?php
                  $query = "SELECT * FROM ferramentas WHERE fer_tipo = '4' and fer_direcionamento = 'Epi' OR fer_tipo = '5'  and fer_direcionamento = 'Epi'";
                  $sql = mysqli_query($conexao, $query);
                  while ($dados = mysqli_fetch_assoc($sql)) {
                    $id = $dados['fer_id'];
                    $nome = $dados['fer_descricao'];

                  ?>
                    <tr>
                      <th><?php echo $id; ?></th>
                      <td><?php echo $nome; ?></td>
                      <input type='hidden' name='epi[]' value='<?php echo $id; ?>'>
                      <td><select class="form-control" name="epi_situacao[]">
                          <option value="Conforme" class="text-success">Conforme</option>
                          <option value="Não Conforme" class="text-warning">Não Conforme</option>
                          <option value="Não Possui" class="text-danger">Não Possui</option>
                        </select></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
              <input type="submit" value="Enviar">
            </form>
              <?php }?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!-- <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 20px;right:20px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:220px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo Free&nbsp;&nbsp;<img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16"></pingendo> -->
</body>

</html>