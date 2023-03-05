<?php
include("./config.php");

$con = mysqli_connect($host, $login, $senha, $bd);

$sql = "DELETE FROM restaurante WHERE idrestaurante=".$_GET["idrestaurante"];

mysqli_query($con, $sql);

header("location: ./index.php");

?>