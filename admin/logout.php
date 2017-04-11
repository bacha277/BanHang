<?php
session_start();

if(isset($_SESSION['loginSession']))
{
    unset($_SESSION['loginSession']);
            
    header('location:login.php');
}
?>