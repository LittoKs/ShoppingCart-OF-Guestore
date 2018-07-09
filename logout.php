<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['f_name']);
unset($_SESSION['l_name']);
unset($_SESSION['id']);
unset($_SESSION['pass']);
header("location:index.php");

?>