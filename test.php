<?php
/**
 * Created by PhpStorm.
 * User: jay
 * Date: 4/8/17
 * Time: 1:00 PM
 */
include 'includes/conn.inc.php';

$res = mysqli_query($conn, 'SELECT COUNT(ID) as numRows from users');
$data = mysqli_fetch_array($res);

if($data['numRows'] == 0){
    echo 'Empty';
}
else{
    echo 'Not Empty';
}