<!DOCTYPE html>
<html>
<head>

    <?php
    require 'includes/links.inc.php';
    ?>
</head>

<body>
<!-- cover -->
<section id="cover">
    <?php
    include 'includes/navbar.inc.php';
    ?>

    <!-- cover caption -->
    <div class="col-sm-12 cover-caption" >
        <h1 class="title">Videos Library</h1>
        <h3 class="intro"><i class="fa fa-television fa-2x" aria-hidden="true"></i> <sup>Watch all your videos </sup> </h3>
        <br>
        <hr>
        <br>
        <div class="row">
            <?php
            include 'includes/conn.inc.php';
            $query = 'SELECT COUNT(ID) as numRows from videos ';
            $sql = mysqli_query($conn, $query);
            $result = mysqli_fetch_array($sql);

            if ($result['numRows'] == 0)
            {
                $error = '<h2 class="text-center"><i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> <sup>No videos were found. Please Upload a video to start watching </sup></h2>';
                echo $error;
            }
            else
            {
                $retrieve = "SELECT video, category FROM videos ORDER BY ID DESC";
                $result = mysqli_query($conn, $retrieve);
                $row = mysqli_fetch_array($result);


                foreach ($result as $row){

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
            }

            ?>
        </div>

    </div>
</section> <!--end cover-->
</body>
</html>
