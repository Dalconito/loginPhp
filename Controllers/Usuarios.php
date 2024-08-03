<?php
function connectDB(){
    $servidor = "192.168.3.35"; $usuario = "dalconito"; $senha = "HelloWorld"; $banco = "usuarios"; $porta = "3366";
    $conexao = mysqli_connect($servidor,$usuario,$senha,$banco);
    return $conexao;}

function getUsuarios($loginUsr){$conexao = connectDB();
    $selectDbQuery = "SELECT * FROM usuarios WHERE loginUsr = $loginUsr";
    $resultdbQuery = mysqli_query($conexao, $selectDbQuery);
    $resultQuery = mysqli_fetch_assoc($resultdbQuery);
    $conexao->close(); return $resultQuery;}

function adicionarUsr($loginUsr, $senhaUsr, $tipoUsr)
    {$conexao = connectDb();
        $consultDbQuery = getUsuarios($loginUsr);
        if($consultDbQuery) { echo "Código de Produto Existente";}
        else {
            $sqlQuery = "INSERT INTO usuarios (loginUsr, senhaUsr, tipoUsr) VALUES (?, ?, ?)";
            $prepQuery = $conexao->prepare($sqlQuery);
            if($prepQuery == false) {die("Erro na preparação da consulta");}
            $prepQuery->bind_param("sss", $loginUsr, $senhaUsr, $tipoUsr);
            if($prepQuery->execute()) {echo "Usuario Adicionado";} else {echo "Erro: " . $prepQuery->error;}
            $prepQuery->close(); $conexao->close();}}