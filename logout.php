<?PHP
    session_start();
    session_unset();
    session_destroy();

    echo $_SESSION['username']
?>