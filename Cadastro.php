<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<?PHP
require_once './Controllers/Usuarios.php'; session_start();?>
<body>
    <a href="index.php">Voltar</a>
    <form method="post">
        <label for="loginUsr">Login
            <input type="text" name="loginUsr" id="loginUsr" required>
        </label>
        <label for="senhaUsr">Senha
            <input type="password" name="senhaUsr" id="senhaUsr" required>
        </label>
        <label for="tipoUsr">Tipo de Usuario</label>
            <input list="tipoUsr" name="tipoUsr"  required/>
        <datalist id="tipoUsr">
            <option value="admin"></option>
            <option value="padrao"></option>
        </datalist>
        <input type="submit" value="Cadastrar">
    </form>
</body>
<?PHP

    $loginUsr = isset($_POST['loginUsr']) ? $_POST['loginUsr'] : null;
    $senhaUsr = isset($_POST['senhaUsr']) ? $_POST['senhaUsr'] : null;
    $tipoUsr = isset($_POST['tipoUsr']) ? $_POST['tipoUsr'] : null;
    isset($_POST['loginUsr']) ? adicionarUsr($loginUsr, $senhaUsr, $tipoUsr): null;
?>
</html>