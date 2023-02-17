<?php
header('Content-type: text/html; charset=utf-8');
?>
<html>

  <head>
    <title>Agenda Telefônica.</title>
  </head>

  <body>
    <center><h3>Agenda Telefônica</h3></center>
    <form name="form1" method="POST" action="form_incluir.php">
    <table border="0" align="center" width="60%">

    <?php
      include("./config.php");
      $con = mysqli_connect($host, $login, $senha, $bd);

      $sql = "SELECT * FROM restaurante";
      $tabela = mysqli_query($con, $sql);
      if(mysqli_num_rows($tabela)==0){
    ?>  

      <tr>
        <td align="center">Não há nenhum contato cadastrado.</td>
      </tr>

      <tr>
        <td align="center"><input type="submit" value="incluir Contato"></td>
      </tr>

    <?php
      }
      
      else{
    ?>

    <?php
      while($dados = mysqli_fetch_row($tabela)){
    ?>

	    <tr bgcolor="grey">
        <td width="16%">Nome</td>
        <td width="16%">CNPJ</td>
        <td width="16%">Horario Abre</td>
        <td width="16%">Horario Fecha</td>
        <td width="16%">Logradouro</td>
        <td width="16%">Numero</td>
      </tr>
      
        <tr>
          <td><?php echo $dados[1]; ?></td>
          <td><?php echo $dados[2]; ?></td>
          <td><?php echo $dados[3]; ?></td>
          <td><?php echo $dados[4]; ?></td>
          <td><?php echo $dados[5]; ?></td>
          <td><?php echo $dados[6]; ?></td>
	        <td align="center">
	        </td>
        </tr>


      <tr bgcolor="grey">
        <td width="20%">Complemento</td>
        <td width="20%">Cidade</td>
        <td width="20%">Bairro</td>
        <td width="20%">Estado</td>
        <td width="20%">CEP</td>
      </tr>

        <tr>
          <td><?php echo $dados[7]; ?></td>
          <td><?php echo $dados[8]; ?></td>
          <td><?php echo $dados[9]; ?></td>
          <td><?php echo $dados[10]; ?></td>
          <td><?php echo $dados[11]; ?></td>
          <td><?php echo $dados[12]; ?></td>
          <td><input type="button" value="Excluir" onclick="location.href='excluir.php?idrestaurante=<?php echo $dados[0]; ?>'"></td>
	        <td align="center">
	        </td>
        </tr>

    <?php
    }
    ?>

    <tr bgcolor="grey"><td colspan="3" height="5"></td></tr>

    <?php
      mysqli_close($con);
    ?>

    <tr><td colspan="3" align="left">
      <input type="submit" value="Incluir Cadastro">
      <input type="button" value="Alterar Cadastro" onclick="location.href='alterar.php'">
    <?php
      }
    ?>
      </table>
    </form>
  </body>
</html>