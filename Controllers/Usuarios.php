<?php

function connectDB(){
    $servidor = "192.168.3.35"; $usuario = "dalconito"; $senha = "HelloWorld"; $banco = "usuarios"; $porta = "3366";
    $conexao = mysqli_connect($servidor,$usuario,$senha,$banco);
    return $conexao;}

function getUsuarios($loginUsr){$conexao = connectDB();
    $selectDbQuery = "SELECT * FROM usuarios WHERE loginUsr = ?";
    $prepQuery = $conexao->prepare($selectDbQuery);
    if($prepQuery == false) {die("Erro na preparação da consulta");}
    $prepQuery->bind_param('s', $loginUsr); $prepQuery->execute();
    $resultDbQuery = $prepQuery->get_result();
    $resultQuery = $resultDbQuery->fetch_assoc();
    $conexao->close(); return $resultQuery;}

    function senhaUsuarios($loginUsr){$conexao = connectDB();
        $selectDbQuery = "SELECT senhaUsr FROM usuarios WHERE loginUsr = ?";
        $prepQuery = $conexao->prepare($selectDbQuery);
        if($prepQuery == false) {die("Erro na preparação da consulta");}
        $prepQuery->bind_param('s', $loginUsr); $prepQuery->execute();
        $resultDbQuery = $prepQuery->get_result();
        $resultQuery = $resultDbQuery->fetch_assoc();
        $conexao->close(); return $resultQuery;}

function adicionarUsr($loginUsr, $senhaUsr, $tipoUsr)
    {$conexao = connectDB();
        $consultDbQuery = getUsuarios($loginUsr);
        if($consultDbQuery) { echo "Usuario existente";}
        else {
            $sqlQuery = "INSERT INTO usuarios (loginUsr, senhaUsr, tipoUsr) VALUES (?, ?, ?)";
            $prepQuery = $conexao->prepare($sqlQuery);
            if($prepQuery == false) {die("Erro na preparação da consulta");}
            $prepQuery->bind_param("sss", $loginUsr, $senhaUsr, $tipoUsr);
            if($prepQuery->execute()) {echo "Usuario Adicionado";} else {echo "Erro: " . $prepQuery->error;}
            $prepQuery->close(); $conexao->close();}}

function validationUsr($loginUsr, $senhaUsr)
{   $retUsuarios = getUsuarios($loginUsr);
    $retSenha = senhaUsuarios($loginUsr);
    if($retUsuarios) 
        {
            if($retSenha['senhaUsr'] == $senhaUsr)
            {
                $_SESSION['loginUsr'] = $loginUsr;
                $_SESSION['tipoUsr'] = $retUsuarios['tipoUsr'];
                if($_SESSION['tipoUsr'] == "admin")
                header('location: ./home.php');
                else
                header('location: ./dashboard.php');
            }
        }
    else
    {echo("Usuario nao encontrado");} 
}