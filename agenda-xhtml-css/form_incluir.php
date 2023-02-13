<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
	<link type="text/css" rel="stylesheet" href="estilos.css" />
	<title>Incluir/Editar um contato.</title>
</head>

<body>
	<form id="form_contato" method="post" action="incluir.php">
	<div id="cabecalho">
	<?php
	if(isset($_GET["codigo"])){
  		include("./config.php");
  		$con = mysqli_connect($host, $login, $senha, $bd);
		?>
		<h2>Editar Contato</h2>
		<?php
  		$sql = "SELECT * FROM dados_pessoais WHERE codigo=".$_GET['codigo'];
  		$result = mysqli_query($con, $sql);
  		$vetor = mysqli_fetch_array($result, MYSQLI_ASSOC);
  		mysqli_close($con);
		?>
	  	<input type="hidden" name="codigo" value="<?php echo $_GET['codigo']; ?>" />
		<?php
	}else{
		?>
  		<h2>Cadastrar Novo Contato</h2>
		<?php
	}
	if(!isset($vetor)){
		$vetor['nome'] = '';
		$vetor['ddd'] = '';
		$vetor['telefone'] = '';
	}
	?>
	</div>
	<div id="principal">
	<table>
		<tr><td>Nome:</td>
    		<td>
	  			<input type="text" name="nome" value="<?php echo $vetor['nome']; ?>" maxlength="30" size="31" />
			</td>
		</tr>
		<tr><td class="celula">Telefone:</td>
    		<td><input type="text" name="ddd" value="<?php echo $vetor['ddd']; ?>" maxlength="2" size="3" />
        		<input type="text" name="telefone" value="<?php echo $vetor['telefone']; ?>" maxlength="8" size="9" />
    		</td>
		</tr>
	</table>
	<p class="centralizado">
		<input type="button" value="Cancelar" onclick="location.href='index.php'" />
		<input type="submit" value="Gravar" />
   	</p>
	</div>
	</form>
	<div id="rodape">
		<p> &copy; 2013 Ramon G. Costa</p>
		<p>
       		<img src="figuras/vcss.gif" alt="CSS válido!" />
   			<img src="figuras/valid-xhtml10.png" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
       		<img src="figuras/php-power-black.png" alt="PHP" />   			
       		<img src="figuras/powered-by-mysql-88x31.png" alt="MySQL 5.5" />  
		</p>
	</div>	
</body>
</html>