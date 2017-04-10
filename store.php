<?php
session_start();
if(!empty($_SESSION['logged_in']))
{
    include 'store_1.php';
}
else
{
    header('location: index.php');
}
