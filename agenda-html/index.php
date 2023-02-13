<?php
header("Content-Type: text/html; charset=iso-8859-1",true);
?>
<html>
<head><title>Agenda Telef�nica.</title></head>
<body>
<center><h3>Agenda Telef�nica</h3></center>
<form name="form1" method="POST" action="form_incluir.php">
<table border="0" align="center" width="60%">

<?php
include("./config.php");
$con = mysqli_connect($host, $login, $senha, $bd);


$sql = "SELECT * FROM restaurante";
$tabela = mysqli_query($con, $sql);
if(mysqli_num_rows($tabela)==0){
?>  

  <tr><td align="center">N�o h� nenhum contato cadastrado.</td></tr>
  <tr><td align="center"><input type="submit" value="incluir Contato"></td></tr>

<?php
}else{
?>
	<tr bgcolor="grey"><td width="50%">Nome</td><td width="20%">Telefone</td><td width="30%"></td></tr>
<?php
  while($dados = mysqli_fetch_row($tabela)){
?>


  <tr><td><?php echo $dados[1]; ?></td>
      <td><?php echo "(".$dados[2].") ".$dados[3]; ?></td>
	  <td align="center">
	    <input type="button" value="Excluir" onclick="location.href='exclu7ir.php?codigo=<?php echo $dados[0]; ?>'">
	    <input type="button" value="Editar" onclick="location.href='form_incluir.php?codigo=<?php echo $dados[0]; ?>'">
	  </td>
  </tr>

<?php
  }
?>

<tr bgcolor="grey"><td colspan="3" height="5"></td></tr>


<?php
mysqli_close($con);
?>
<tr><td colspan="3" align="center"><input type="submit" value="Incluir Novo Contato"></td></tr>
<?php
}


?>
</table>
</form>
</body>
</html>