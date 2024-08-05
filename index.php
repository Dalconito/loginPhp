<?php 
require_once './Controllers/Usuarios.php'; session_start();
$loginId = isset($_POST['loginId']) ? $_POST['loginId'] : null;
$senhaId = isset($_POST['senhaId']) ? $_POST['senhaId'] : null;
$_SESSION['blabla'] = "opablza";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <a href="./Cadastro.php">Cadastre-se</a>
    <form method="post">
    <label for="loginId">Login
        <input type="text" id="loginId" name="loginId">
    </label>
    <label for="senhaId">Senha
        <input type="password" id="senhaId" name="senhaId">
    </label>
    <input type="submit">
    </form>
    <?php
    isset($loginId) ? validationUsr($loginId, $senhaId) : null;
     ?>
</body>
</html>