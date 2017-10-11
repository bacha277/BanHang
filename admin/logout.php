<?php
session_start();

if(isset($_SESSION['loginSession']))
{
    unset($_SESSION['loginSession']);
    unset($_SESSION['role']);
            
    header('location:login.php');
}
?>