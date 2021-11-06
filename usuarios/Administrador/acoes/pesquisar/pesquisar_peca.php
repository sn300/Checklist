
<?php
include_once '../../../../controle/conexao.php';

$descricao = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

//Pesquisar no banco de dados nome do usuario referente a palavra digitada
$result_user = "SELECT * FROM pecas WHERE pe_descricao LIKE '%$descricao%'";
$resultado_user = mysqli_query($conexao, $result_user);

if(($resultado_user) AND ($resultado_user->num_rows != 0 )){
	while($dados = mysqli_fetch_assoc($resultado_user)){
        $id = $dados['pe_id'];
        $descricao = $dados['pe_descricao'];
        $tipo = $dados['pe_tipo'];
        $aux = array(
            1 => "Moto",
            2 => "Carro",
            3 => "Moto e Carro"
        );
        echo "<tr>
<td class='text-center'>$id</td>
<td class='text-center'>$descricao</td>
<td class='text-center'>$aux[$tipo]</td>
<td class='text-center'><a href='#' class='editar_pe' id='$id''><i class='fa fa-pencil-square' aria-hidden='true'></i></a></td>
<td class='text-center'><a href='#' onClick='apagar_peca($id)'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
</tr>";
                        }
                    }else{
	echo "<center><td class='text-center'>Nenhum registro encontrado ...</td></center>";
}
?>
   

