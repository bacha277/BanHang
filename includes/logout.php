<?php

if(isset($_SESSION['userLoginSession']))
{
    unset($_SESSION['userLoginSession']);
    
    unset($_SESSION['cart']);
            
    header('location:index.php');
}
?>