<!DOCTYPE html>
<html>
<head>
    <title>Home</title>

    <?php
    require 'includes/links.inc.php';
    ?>
</head>

<body>
<!-- cover -->
<section id="cover">
    <?php
    include "includes/navbar.inc.php";
    ?>

    <!-- cover caption -->
    <div class="col-sm-12 cover-caption" >
        <h1 class="title">Redefine Music</h1>
        <h3 class="intro">Listen to the best music collection, just for you.Any place, anytime</h3>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                        <a href="#play" class="btn btn-success btn-block"><i class="fa fa-headphones" aria-hidden="true"></i> Start Watching </a>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <hr>
        <br>
        <div class="row">
            <div class="col-lg-4">
                <i class="fa fa-cc-discover fa-5x" aria-hidden="true"></i>
                <h3>New Music</h3>
                <p>Discover new music, artists & djs</p>
            </div>
            <div class="col-lg-4">
                <i class="fa fa-modx fa-5x" aria-hidden="true"></i>
                <h3>Listen Anywhere</h3>
                <p>Listen to your music anywhere on any device</p>
                <p></p>
            </div>
            <div class="col-lg-4">
                <i class="fa fa-upload fa-5x" aria-hidden="true"></i>
                <h3>Unlimited Uploads</h3>
                <p>Upload new music with NO limitations</p>
            </div>
        </div>
    </div>
</section> <!--end cover-->

<br>
<hr>
<br>

<div class="container-fluid jumbotron" id="play">
    <div class="row">
        <div class="col-lg-8">

            <?php
            include 'includes/conn.inc.php';

            $query = 'SELECT COUNT(ID) as numRows from videos ';
            $sql = mysqli_query($conn, $query);
            $result = mysqli_fetch_array($sql);

            if ($result['numRows'] == 0)
            {
                $error = '<h2 class="text-center"><i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> <sup>No videos were found. Please Upload a video to </sup></h2>';
                echo $error;
            }
            else
            {
                $data = '<h2 class="text-center"><i class="fa fa-play-circle fa-2x" aria-hidden="true"></i> <sup>Stream Online</sup></h2>';
                echo $data;
                include 'random.php';
            }
            ?>
        </div>
        <div class="col-lg-4">

            <?php
            $query = 'SELECT COUNT(ID) as numRows from videos ';
            $sql = mysqli_query($conn, $query);
            $result = mysqli_fetch_array($sql);

            if ($result['numRows'] == 0)
            {
                $error = '<h2 class=""><sup>watch</sup> <i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i></h2>';
                echo $error;
            }
            else
            {
                $data = '<h2 class="text-center"><i class="fa fa-tags fa-2x"  aria-hidden="true"></i> <sup>Recent Videos</sup></h2>';
                echo $data;
                include 'video.php';

                echo '
                            <br>
                            <a href="store.php" class="btn btn-primary btn-block"><i class="fa fa-refresh" aria-hidden="true"></i> Load More</a>
                            ';
            }
            ?>

        </div>
    </div>
</div>

<?php
require 'includes/scripts.inc.php';
?>
</body>
</html>