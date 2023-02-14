<?php

  include("./config.php");

  $con = mysqli_connect($host, $login, $senha, $bd);

  if(isset($_POST["idrestaurante"])){
    $sql = "SELECT idrestaurante FROM restaurante WHERE idrestaurente=".$_POST["idrestaurante"];

    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)!=0){
      $sql = "UPDATE restaurante SET nome='".$_POST["nomerestaurante"]."',cnpj=".$_POST["cnpj_rest"].
        ",numero=".$_POST["numero"]." WHERE codigo=".$_POST["idrestaurente"];
    }
  }
  
  else
    $sql = "INSERT INTO restaurante VALUES (null,'".$_POST["nomerestaurante"]."',".$_POST["cnpj_rest"].",".$_POST["numero"].")";
  
  mysqli_query($con, $sql);
  mysqli_close($con);
  header("location: ./index.php");
?>