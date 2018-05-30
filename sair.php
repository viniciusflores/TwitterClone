<?php 
    session_start();
    unset($_SESSION['usuario']);
    unset($_SESSION['email']);
    
    header(header('Location: index.php?logout'));
?>