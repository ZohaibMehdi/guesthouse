<?php
session_start();

if(isset($_SESSION['loggedUser'])){
    $_SESSION = array();
    setcookie(session_name(), '', time() - 2592000, '/');
    session_destroy();
    header("Location: index.php");
}
else{
    header("Location: index.php");
}

?>
