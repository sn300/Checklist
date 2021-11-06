<?php
require_once('../../../../controle/conexao.php');
$auto = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);
//Pesquisar no banco de dados nome do usuario referente a palavra digitada
$query = "SELECT * FROM automoveis WHERE auto_modelo LIKE '%$auto%'";
$sql = mysqli_query($conexao, $query);

if (($sql) and ($sql->num_rows != 0)) {
    while ($dados = mysqli_fetch_assoc($sql)) {
        $id = $dados['auto_id'];
        $modelo = $dados['auto_modelo'];
        $marca = $dados['auto_marca'];
        $placa = $dados['auto_placa'];
        $cidade = $dados['auto_cidade'];
        echo "<tr>
                                 <td class='text-center'>$id</td>
                                 <td class='text-center'>$modelo</td>
                                 <td class='text-center'>$marca</td>
                                 <td class='text-center'>$placa</td>
                                 <td class='text-primary text-center'>$cidade</td>
                                 <td class='text-center'><a href='#' class='ver_auto' id='$id'><i class='material-icons'>
                                 visibility
                                 </i>
                                 </a>
                                 </td>
                                 <td class='text-center'><a href='#' class='editar_auto' id='$id'><i class='material-icons' aria-hidden='true'>
                                 mode_edit
                                 </i></a></td>
                                <td class='text-center'><a href='#' onClick= 'apagar_auto($id)'><i class='material-icons'>
                                delete
                                </i></a></td>
                              </tr>";
    }
} else {
    echo "<center><td class='text-center'>Nenhum usuário encontrado ...</td></center>";
}
