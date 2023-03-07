<?php
header('Content-type: text/html; charset=utf-8');
?>
<html>

  <head>
    <title>Franquia de restaurante </title>
  </head>

  

  <body>
    <center><h3>Franquia de restaurante</h3></center>
    <form name="form1" method="POST" action="form_incluir.php">
    <table border="0" align="center" width="60%">

    <?php
      include("./config.php");
      $con = mysqli_connect($host, $login, $senha, $bd);
      
      $entre1 = $_POST["entre01"];
      $entre2 = $_POST["entre02"];
      //echo $entre1;
      $sql = "SELECT * FROM pedido WHERE valor_total BETWEEN $entre1 AND $entre2";
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


<tr bgcolor="1CB9E7">
        <td width="33%">Serie</td>
        <td width="33%">Valor Total</td>
        <td width="33%">Forma de Pagamento</td>

      </tr>
      
        <tr>
          <td><?php echo $dados[1]; ?></td>
          <td><?php echo $dados[2]; ?></td>
          <td><?php echo $dados[3]; ?></td>
	        <td align="center">
	        </td>
        </tr>
    <?php
    }}
  
    ?>

    <tr bgcolor="grey"><td colspan="3" height="5"></td></tr>

    <?php
      mysqli_close($con);
    ?>

<tr><td colspan="3" align="left">
      <input type="submit" value="Novo Cadastro">
      <BR><BR>

    </table>
    </form>

<!-------------------------------------------------------------------------------------------------------------->

<form name="form1" method="POST" action="select02.php">
    </table></br>

<table border="0" align="center" width="60%">
<tr>
  <td width="16%">Digite os valores entre:<input type="text" name="entre01" value="<?php echo @$vetor['entre01']; ?>" maxlength="8" size="10" >
        <input type="text" name="entre02" value="<?php echo @$vetor['entre02'] ?>" maxlength="8" size="10" ></td>

  <tr><td colspan="3" align="left">
      <input type="submit" value="Atualizar">
</table>

<!-------------------------------------------------------------------------------------------------------------->

    </form>

    <form name="form1" method="POST" action="select01.php">
    </table></br>

<table border="0" align="center" width="60%">
<tr>
  <td width="16%">Selecione uma Tabela:</td>

  <td colspan="2" width="90%">
  <select name="tabela" value="<?php echo @$vetor['tabela']; ?>">
    <option value="restaurante">Restaurante</option>
    <option value="produto">Produto</option>
    <option value="pedido">Pedido</option>
    <option value="ingrediente">Ingrediente</option>
  </select>
  <tr><td colspan="3" align="left">
      <input type="submit" value="Atualizar">
</table>
  </body>

</html>