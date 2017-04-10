<!DOCTYPE html>
<html>
<head>

    <?php
    require 'includes/links.inc.php';
    ?>
</head>

<body>
<table class="table" >
    <tbody>
    <?php
    require 'includes/conn.inc.php';

    //load videos
    $sql = 'SELECT video FROM videos ORDER BY RAND() LIMIT 1';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    foreach ($result as $row){
        echo "
        <tr><td>
        <video id=\"my-video\" class=\"video-js\" controls preload=\"auto\" width=\"850\" height=\"420\" data-setup=\"{}\">
        <source src='".$row['video']."' type='video/mp4' >
        <source src='".$row['video']."' type='video/webm'>
        <p class=\"vjs-no-js\">
            To view this video please enable JavaScript, and consider upgrading to a web browser that
            <a href=\"http://videojs.com/html5-video-support/\" target=\"_blank\">supports HTML5 video</a>
        </p>
        </video>
    ";
    }
    ?>
    </tbody>
</table>
</body>
</html><?php
/**
 * Created by PhpStorm.
 * User: jay
 * Date: 4/3/17
 * Time: 6:04 PM
 */