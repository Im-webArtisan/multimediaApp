<?php
/**
 * Created by PhpStorm.
 * User: jay
 * Date: 4/8/17
 * Time: 7:28 PM
 */
session_start();
session_destroy();
header('location: index.php');