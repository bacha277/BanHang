<?php

if(isset($_SESSION['userLoginSession']))
{
    unset($_SESSION['userLoginSession']);
            
    header('location:index.php');
}
?>