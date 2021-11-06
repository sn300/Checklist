<?php
//Incluir a conexão com banco de dados
require_once('../../../../controle/conexao.php');
$usuarios = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);
//Pesquisar no banco de dados nome do usuario referente a palavra digitada
$query = "SELECT * FROM usuarios WHERE usu_nome LIKE '%$usuarios%' AND usu_tipo = '2'";
$sql = mysqli_query($conexao, $query);

if (($sql) and ($sql->num_rows != 0)) {
  while ($dados = mysqli_fetch_assoc($sql)) {
    $id = $dados['usu_id'];
    $nome = $dados['usu_nome'];
    $cpf = $dados['usu_cpf'];
    $cidade = $dados['usu_cidade'];
    $contato = $dados['usu_contato'];
    $email = $dados['usu_email'];
    $contato = $dados['usu_contato'];
    echo "<tr>
           <td class='text-center'>$id</td>
           <td class='text-center'>$nome</td>
           <td class='text-center'>$cpf</td>
           <td class='text-primary text-center'>$email</td>
           <td class='text-center'>$contato</td>
           <td class='text-center'>$cidade</td>
           <td class='text-center'><a href='ver_funcionario.php?id=$id' target='_black'><i class='material-icons'>
           visibility
           </i>
           </a>
           </td>
           <td class='text-center'><a href='#' class='editar' id='$id'><i class='material-icons' aria-hidden='true'>
           manage_accounts
           </i></a></td>
          <td class='text-center'><a href='#'><i class='material-icons'>
          person_remove
          </i></a></td>
        </tr>";
  }
} else {
  echo "<center><td class='text-center'>Nenhum usuário encontrado ...</td></center>";
}
?>
