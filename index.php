<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<?php 
session_start();
$keysPost = ['loginId', 'senhaId'];
$dataPost = [];

foreach ($keysPost as $keysPost)
{ $dataPost[$keysPost] = $_POST[$keysPost] ?? null; }

?>
<body>
    <form method="post">
    <label for="loginId">Login
        <input type="text" id="loginId" name="loginId">
    </label>
    <label for="senhaId">Senha
        <input type="password" id="senhaId" name="senhaId">
    </label>
    <input type="submit">
    </form>
    <a href="./Cadastro.php">Cadastre-se</a>
    <?php

     ?>
</body>
</html>