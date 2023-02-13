<?php
  include("./config.php");
  $con = mysqli_connect($host, $login, $senha, $bd);
  if(isset($_POST["codigo"])){
    $sql = "SELECT codigo FROM dados_pessoais WHERE codigo=".$_POST["codigo"];
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result)!=0){
      $sql = "UPDATE dados_pessoais SET nome='".$_POST["nome"]."',ddd=".$_POST["ddd"].",telefone=".$_POST["telefone"]." WHERE codigo=".$_POST["codigo"];
    }
  }else{
    $sql = "INSERT INTO dados_pessoais VALUES (null,'".$_POST["nome"]."',".$_POST["ddd"].",".$_POST["telefone"].")";
  }
  mysqli_query($con, $sql);
  mysqli_close($con);
  header("location: ./index.php");
?>