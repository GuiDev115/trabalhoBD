<?php

  include("./config.php");

  $con = mysqli_connect($host, $login, $senha, $bd);

  if(isset($_POST["idrestaurante"])){
    $sql = "SELECT idrestaurante FROM restaurante WHERE idrestaurante=".$_POST["idrestaurante"];

    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)!=0){
      $sql = "UPDATE restaurante SET nomeRest= '".$_POST["nomeRest"]."' ,cnpj=".$_POST["cnpj_rest"].",
                                     horario_abre=".$_POST["horario_abre"].", horario_fecha=".$_POST["horario_fecha"].",
                                     logradouro=".$_POST["logradouro"].", numero=".$_POST["numero"].",
                                     complemento=".$_POST["complemento"].", cidade=".$_POST["cidade"].", 
                                     bairro=".$_POST["bairro"].", estado=".$_POST["estado"].",
                                     cep=".$_POST["cep"]." WHERE idrestaurante=".$_POST["idrestaurante"];
    }
  }
  
  else{
    $sql = "INSERT INTO restaurante VALUES (null,'".$_POST["nomeRest"]."',".$_POST["cnpj_rest"].",".$_POST["horario_abre"].",
                                                  ".$_POST["horario_fecha"].", ".$_POST["logradouro"].", ".$_POST["numero"].", ".$_POST["complemento"].",
                                                  ".$_POST["cidade"].", ".$_POST["bairro"].", ".$_POST["estado"].", ".$_POST["cep"].")";
  }
  
  mysqli_query($con, $sql);
  mysqli_close($con);
  header("location: ./index.php");
?>