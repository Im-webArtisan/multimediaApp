<?php
/**
 * Created by PhpStorm.
 * User: jay
 * Date: 3/31/17
 * Time: 2:32 PM
 */

$db_host = 'localhost';
$db_user = 'Jay';
$db_psw = 'kajay';
$db_name = 'multimedia';

$conn = new mysqli($db_host, $db_user, $db_psw, $db_name);
if($conn ->connect_error){
    die( 'ERROR:'.mysqli_error($conn));
}

