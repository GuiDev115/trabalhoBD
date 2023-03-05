<?php

  include("./config.php");

  $con = mysqli_connect($host, $login, $senha, $bd);


  /*if(isset($_POST["idrestaurante"])){
    $sql = "SELECT idrestaurante FROM restaurante WHERE idrestaurante=".$_POST["idrestaurante"];

    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)!=0){
      $sql = "UPDATE restaurante SET nomeRest = '".$_POST["nomeRest"]."' WHERE idrestaurante=".$_POST["idrestaurante"];
    }
  }*/

  //echo $_POST["nome"], " ", $_POST["valor"], " ", $_POST["descricao"];


  $sql = "INSERT INTO restaurante 
  (idrestaurante, nomeRest, cnpj_rest, horario_abre, horario_fecha, logradouro, numero, complemento, cidade, bairro, estado, cep) 
  VALUES (null, '".$_POST["nomeRest"]."', '".$_POST["cnpj_rest"]."',
  '".$_POST["horario_abre"]."','".$_POST["horario_fecha"]."',
  '".$_POST["logradouro"]."','".$_POST["numero"]."',
  '".$_POST["complemento"]."','".$_POST["cidade"]."',
  '".$_POST["bairro"]."','".$_POST["estado"]."',
  '".$_POST["cep"]."')";


  if (mysqli_query($con, $sql)) {
    header("location: ./index.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

?>