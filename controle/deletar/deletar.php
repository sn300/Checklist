<?php
if (isset($_GET['id']) || isset($_GET['tipo'])) {
   include "../conexao.php";
   $id = $_GET['id'];
   $tipo = $_GET['tipo'];
   switch ($tipo) {
      case $tipo == 'ferramenta':
         $query = "DELETE FROM ferramentas where fer_id = $id";
         $sql = mysqli_query($conexao, $query);
         echo "<script>alert('Ferramenta apagada com sucesso');
        	window.location.href='../../usuarios/Administrador/acoes/ferramentas.php';
        </script>";
         break;
      case $tipo == 'funcionario':
         $query = "DELETE FROM usuarios where usu_id = $id";
         $sql = mysqli_query($conexao, $query);
         echo "<script>alert('Funcionário deletado com sucesso');
        	window.location.href='../../usuarios/Administrador/acoes/funcionarios.php';
        </script>";
         break;
      case $tipo == 'epi':
         $query = "DELETE FROM ferramentas where fer_id = $id";
         $sql = mysqli_query($conexao, $query);
         echo "<script>alert('Epi deletado com sucesso');
        	window.location.href='../../usuarios/Administrador/acoes/epi.php';
        </script>";
         break;
      case $tipo == 'auto':
         $query = "DELETE FROM automoveis where auto_id = $id";
         $sql = mysqli_query($conexao, $query);
         echo "<script>alert('Automóvel deletado com sucesso');
        	window.location.href='../../usuarios/Administrador/acoes/automoveis.php';
        </script>";
         break;
      case $tipo == 'epc':
         $query = "DELETE FROM ferramentas where fer_id = $id";
         $sql = mysqli_query($conexao, $query);
         echo "<script>alert('Epc deletado com sucesso');
        	window.location.href='../../usuarios/Administrador/acoes/epc.php';
        </script>";
         break;
      case $tipo == 'pecas':
         $query = "DELETE FROM pecas where pe_id = $id";
         $sql = mysqli_query($conexao, $query);
         echo "<script>alert('Peça deletada com sucesso');
              window.location.href='../../usuarios/Administrador/acoes/pecas.php';
           </script>";
         break;
      case $tipo == 'relatorio':
         $transacao = "DELETE FROM transacao WHERE tra_id = $id";
         $ferramentas = "DELETE FROM `ferramentas_has_transacao` WHERE transacao_tra_id = $id";
         $pecas = "DELETE FROM `transacao_has_pecas` WHERE transacao_tra_id = $id";
         $executar_tra = mysqli_query($conexao, $transacao);
         $executar_fer = mysqli_query($conexao, $ferramentas);
         $executar_pecas = mysqli_query($conexao, $pecas);
         echo "<script>alert('Relatório deletado com sucesso');
            window.location.href='../../usuarios/Administrador/acoes/relatorios.php';
         </script>";
         break;
      case $tipo == 'relatorio_moto':
         $transacao = "DELETE FROM transacao WHERE tra_id = $id";
         $ferramentas = "DELETE FROM `ferramentas_has_transacao` WHERE transacao_tra_id = $id";
         $pecas = "DELETE FROM `transacao_has_pecas` WHERE transacao_tra_id = $id";
         $executar_tra = mysqli_query($conexao, $transacao);
         $executar_fer = mysqli_query($conexao, $ferramentas);
         $executar_pecas = mysqli_query($conexao, $pecas);
         echo "<script>alert('Relatório deletado com sucesso');
               window.location.href='../../usuarios/Funcionario/acoes/ver_relatorios.php;
            </script>";
         break;
      case $tipo == 'relatorio_carro':
         $transacao = "DELETE FROM transacao WHERE tra_id = $id";
         $ferramentas = "DELETE FROM `ferramentas_has_transacao` WHERE transacao_tra_id = $id";
         $pecas = "DELETE FROM `transacao_has_pecas` WHERE transacao_tra_id = $id";
         $executar_tra = mysqli_query($conexao, $transacao);
         $executar_fer = mysqli_query($conexao, $ferramentas);
         $executar_pecas = mysqli_query($conexao, $pecas);
         echo "<script>alert('Relatório deletado com sucesso');
                  window.location.href='../../usuarios/Funcionario/acoes/ver_relatorios.php';
               </script>";
         break;
      case $tipo == 'relatorio_aux':
         $transacao = "DELETE FROM transacao WHERE tra_id = $id";
         $ferramentas = "DELETE FROM `ferramentas_has_transacao` WHERE transacao_tra_id = $id";
         $pecas = "DELETE FROM `transacao_has_pecas` WHERE transacao_tra_id = $id";
         $executar_tra = mysqli_query($conexao, $transacao);
         $executar_fer = mysqli_query($conexao, $ferramentas);
         $executar_pecas = mysqli_query($conexao, $pecas);
         echo "<script>alert('Relatório deletado com sucesso');
                     window.location.href='../../usuarios/Funcionario/acoes/ver_relatorios.php';
                  </script>";
         break;
   }
} else {
   header('Location: ../../');
}
