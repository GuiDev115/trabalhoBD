<?php
header("Content-Type: text/html; charset=iso-8859-1",true);
?>
<html>
<head><title>Incluir/Editar um contato.</title></head>
<body>
<form name="form1" method="POST" action="incluir.php">
<?php
if(isset($_GET["codigo"])){	
  include("./config.php");
  $con = mysqli_connect($host, $login, $senha, $bd);
?>
  <center><h3>Editar Contato</h3></center>
<?php
  $sql = "SELECT * FROM dados_pessoais WHERE codigo=".$_GET['codigo'];
  $result = mysqli_query($con, $sql);
  $vetor = mysqli_fetch_array($result, MYSQLI_ASSOC);
  mysqli_close($con);
?>
  <input type="hidden" name="codigo" value="<?php echo $_GET['codigo']; ?>">
<?php
}else{
?>
  <center><h3>Cadastrar Novo Contato</h3></center>
<?php
}
?>
<table border="0" align="center" width="35%">
<tr><td width="20%">Nome:</td>
    <td colspan="2" width="90%">
	  <input type="text" name="nome" value="<?php echo @$vetor['nome']; ?>" maxlength="50" size="31">
	</td>
</tr>
<tr><td>Telefone:</td>
    <td><input type="text" name="ddd" value="<?php echo @$vetor['ddd']; ?>" maxlength="2" size="3">
        <input type="text" name="telefone" value="<?php echo @$vetor['telefone']; ?>" maxlength="8" size="9">
    </td>
</tr>
<tr><td colspan="3" align="center">
      <input type="button" value="Cancelar" onclick="location.href='index.php'">
      <input type="submit" value="Gravar">
    </td>
</tr>
</table>
</form>
</body>
</html>