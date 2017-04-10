<?php
session_start();
if(!empty($_SESSION['logged_in']))
{
    include 'page.php';
}
else
{
    header('location: index.php');
}
