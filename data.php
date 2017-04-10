<?php
session_start();
if(!empty($_SESSION['logged_in']))
{
    include "includes/conn.inc.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $output = '';
        $search = $_POST['search'];


//query
        $query = "SELECT `video`, `category` FROM `videos` WHERE video LIKE '%$search%' OR category LIKE '%$search%'";
        $sql = mysqli_query($conn, $query);

        if($sql == true)
        {
            if(mysqli_num_rows($sql) > 0)
            {
                while ($row = mysqli_fetch_array($sql))
                {
                    echo "
                        <video id=\"my-video\" controls preload=\"auto\" width=\"200\" height=\"200\" data-setup=\"{}\">
                        <source src='".$row['video']."' type='video/mp4' >
                        <source src='".$row['video']."' type='video/webm'>
                        <p class=\"vjs-no-js\">
                            To view this video please enable JavaScript, and consider upgrading to a web browser that
                            <a href=\"http://videojs.com/html5-video-support/\" target=\"_blank\">supports HTML5 video</a>
                        </p>
                        </video>
                        ";
                }
//            echo $output;
            }
            else
            {
                $error = '<h2 class="text-center"><i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> <sup> Video not found </sup></h2>';
                echo $error;
            }
        }
        else
        {
            die("ERROR::" .mysqli_error($conn));
        }

    }
}
else
{
    header('location: index.php');
}