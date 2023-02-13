<?php
	include("./config.php");
	$con = mysqli_connect($host, $login, $senha, $bd);
	$sql = "DELETE FROM dados_pessoais WHERE codigo=".$_GET["codigo"];
	mysqli_query($con, $sql);
	header("location: ./index.php");
?>