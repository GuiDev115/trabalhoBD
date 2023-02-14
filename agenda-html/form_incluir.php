<?php
header('Content-type: text/html; charset=utf-8');
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
  $sql = "SELECT * FROM restaurante";
  $result = mysqli_query($con, $sql);
  $vetor = mysqli_fetch_array($result, MYSQLI_ASSOC);
  mysqli_close($con);
?>
  <input type="hidden" name="codigo" value="<?php echo $_GET['idrestaurante']; ?>">
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
	  <input type="text" name="nome" value="<?php echo @$vetor['nomeRest']; ?>" maxlength="50" size="40">

    <td>CNPJ:</td>
    <td>
        <input type="text" name="telefone" value="<?php echo @$vetor['cnph_rest']; ?>" maxlength="10" size="15">
    </td>

	</td>
</tr>

<tr><td>Horarios:</td>
    <td>
        <input type="time" name="numero" value="<?php echo @$vetor['horario_abre']; ?>" maxlength="10" size="5">
        <input type="time" name="telefone" value="<?php echo @$vetor['horario_fecha']; ?>" maxlength="10" size="5">
    </td>
</tr>


<tr><td>Endereço:</td> 
    <td>  
        <input type="text" name="logradouro" value="<?php echo @$vetor['horario_abre']; ?>" maxlength="50" size="40">

        <input type="text" name="numero" value="<?php echo @$vetor['horario_fecha']; ?>" maxlength="10" size="5">
        <input type="text" name="complemento" value="<?php echo @$vetor['horario_fecha']; ?>" maxlength="10" size="5">
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