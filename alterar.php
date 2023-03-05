<?php

    include("./config.php");

    $con = mysqli_connect($host, $login, $senha, $bd);


    $sql = "UPDATE restaurante SET
    nomeRest = '".$_POST["nomeRest"]."',
    
    bairro = '".$_POST["bairro"]."',

    cep = '".$_POST["cep"]."',
    cidade = '".$_POST["cidade"]."',
    numero = '".$_POST["numero"]."',
    complemento = '".$_POST["complemento"]."',
    numero = '".$_POST["numero"]."',
    complemento = '".$_POST["complemento"]."',
    estado = '".$_POST["estado"]."',
    cnpj_rest = '".$_POST["cnpj_rest"]."',
    logradouro = '".$_POST["logradouro"]."',
    horario_fecha = '".$_POST["horario_fecha"]."',
    horario_abre = '".$_POST["horario_abre"]."'


    WHERE idrestaurante = ".$_POST["idrestaurante"];


    if (mysqli_query($con, $sql)) 
        header("location: ./index.php");
    
    else 
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    
?>