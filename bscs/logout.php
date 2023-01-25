<?php
session_start();
unset($_SESSION['id'] );
unset($_SESSION['username']);
unset($_SESSION['password']);
echo header("Location: index.php");
?>