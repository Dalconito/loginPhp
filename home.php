<?PHP
    require_once './Controllers/Usuarios.php'; session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php
        !isset($_SESSION['loginUsr']) ? header('location: ./index.php'):null;
    ?>
    <a href="index.php">Voltar para login</a>
    <h1>Home Page</h1>
    <h2>  Bem Vindo <?php echo $_SESSION['loginUsr'] . "<br>" . "Logado como: " . $_SESSION['tipoUsr']; ?> </h2>
    <a href="logout.php">Logout</a>
</body>
</html>