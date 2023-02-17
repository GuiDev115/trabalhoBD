

<?php
header('Content-type: text/html; charset=utf-8');
?>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
	<link type="text/css" rel="stylesheet" href="estilos.css" />
	<title>Incluir/Editar um contato.</title>
</head>

  <body>
    <form name="form1" method="POST" action="incluir.php">
    <div id="cabecalho">

    <?php
      if(isset($_GET["idrestaurante"])){	
      include("./config.php");
      $con = mysqli_connect($host, $login, $senha, $bd);
    ?>

    <input type="hidden" name="idrestaurante" value="<?php echo $_GET['idrestaurante']; ?>">

    <?php
    }
    else{
    ?>

  <h2>Cadastrar Novo Contato</h2>
		<?php
	}

  if(!isset($vetor)){
		$vetor['nomeRest'] = '';
		$vetor['cnpj_rest'] = '';
		$vetor['horario_abre'] = '';
    $vetor['horario_fecha'] = '';
    $vetor['logradouro'] = '';
    $vetor['numero'] = '';
    $vetor['complemento'] = '';
    $vetor['cidade'] = '';
    $vetor['bairro'] = '';
    $vetor['estado'] = '';
    $vetor['cep'] = '';
	}
	?>

</div>
<div id="principal">
    <table>

      <tr>
        <td width="20%">Nome:</td>

        <td colspan="2" width="90%">
	        <input type="text" name="nomeRest" value="<?php echo @$vetor['nomeRest']; ?>" maxlength="30" size="40">

          <td>CPNJ:</td>
          <td>
            <input type="text" name="cnpj_rest" value="<?php echo @$vetor['cnpj_rest']; ?>" maxlength="14" size="15">
          </td>

        <td>Horario Abre:</td>
        <td>
          <input type="time" name="horario_abre" value="<?php echo @$vetor['horario_abre']; ?>" maxlength="10" size="15">
        </td>

	      </td>
      </tr>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------ !-->

      <tr>
        <td width="20%">Horario Fecha:</td>

        <td colspan="2" width="90%">
	        <input type="time" name="horario_fecha" value="<?php echo @$vetor['horario_fecha']; ?>" maxlength="50" size="40">

          <td>Logradouro:</td>
          <td>
            <input type="text" name="logradouro" value="<?php echo @$vetor['logradouro']; ?>" maxlength="40" size="15">
          </td>

        <td>Numero:</td>
        <td>
          <input type="text" name="numero" value="<?php echo @$vetor['numero']; ?>" maxlength="4" size="15">
        </td>

	      </td>
      </tr>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------ !-->


      <tr>
        <td width="20%">Complemento:</td>

        <td colspan="2" width="90%">
	        <input type="text" name="complemento" value="<?php echo @$vetor['complemento']; ?>" maxlength="30" size="40">

          <td>Cidade:</td>
          <td>
            <input type="text" name="cidade" value="<?php echo @$vetor['cidade']; ?>" maxlength="40" size="15">
          </td>

        <td>Bairro:</td>
        <td>
          <input type="text" name="bairro" value="<?php echo @$vetor['bairro']; ?>" maxlength="20" size="15">
        </td>

	      </td>
      </tr>

      <tr>
        <td width="20%">Estado:</td>

        <td colspan="2" width="90%">
        <select name="estados-brasil">
          <option value="AC">Acre</option>
          <option value="AL">Alagoas</option>
          <option value="AP">Amapá</option>
          <option value="AM">Amazonas</option>
          <option value="BA">Bahia</option>
          <option value="CE">Ceará</option>
          <option value="DF">Distrito Federal</option>
          <option value="ES">Espírito Santo</option>
          <option value="GO">Goiás</option>
          <option value="MA">Maranhão</option>
          <option value="MT">Mato Grosso</option>
          <option value="MS">Mato Grosso do Sul</option>
          <option value="MG">Minas Gerais</option>
          <option value="PA">Pará</option>
          <option value="PB">Paraíba</option>
          <option value="PR">Paraná</option>
          <option value="PE">Pernambuco</option>
          <option value="PI">Piauí</option>
          <option value="RJ">Rio de Janeiro</option>
          <option value="RN">Rio Grande do Norte</option>
          <option value="RS">Rio Grande do Sul</option>
          <option value="RO">Rondônia</option>
          <option value="RR">Roraima</option>
          <option value="SC">Santa Catarina</option>
          <option value="SP">São Paulo</option>
          <option value="SE">Sergipe</option>
          <option value="TO">Tocantins</option>
        </select>

          <td>CEP:</td>
          <td>
            <input type="text" name="cep" value="<?php echo @$vetor['cep']; ?>" maxlength="8" size="15">
          </td>

	      </td>
      </tr>

        <td colspan="3" align="left">
          <br>
          <input type="button" value="Cancelar" onclick="location.href='index.php'">
          <input type="submit" value="Gravar">
        </td>
      </tr>
    </table>
  </form>
</body>
</html>