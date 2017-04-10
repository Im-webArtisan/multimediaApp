<?php
require 'includes/conn.inc.php';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['upload']))
    {
        if($_POST['category'] == null || $_POST['category'] == '')
        {
            echo '<script>alert("Please fill the category name");</script>';
        }
        else {
            $query = null;

            $file = $_FILES['file'];
            $file_name = $file['name'];
            $file_type = $file['type'];
            $file_size = $file['size'];
            $file_path = $file['tmp_name'];
            $video = 'videos/';
            $category = $_POST['category'];

            if($file_name != '' && ($file_type = 'video/webm' || $file_type = 'video/mp4' || $file_type = 'video/ogv') && $file_size <= 2147483648)
            {
                if(file_exists($video.$file_name)){
                    echo '<script>alert("File Exists");</script>';
                }
                else {
                    move_uploaded_file($file_path, $video.$file_name);
                    $time = date('Y-m-d H:i:s');
//                $sql = "INSERT INTO `test`(`ID`, `photo`) VALUES ('','$video$file_name')";
                    $sql = "INSERT INTO `videos`(`ID`, `video`, `category`, `timestamp_created`) VALUES ('','$video$file_name','$category','$time')";

                    $query = mysqli_query($conn, $sql);

                    if($query == true)
                    {
                        echo '<script>alert("Video Uploaded Successfully");</script>';
                    }
                    else
                    {
                        die('ERROR:'.mysqli_error($conn));
                    }

                }
            }
            else
            {
                echo '<script>alert("File not Supported");</script>';
            }
        }

    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload</title>

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
        <h1 class="title">Upload Music, videos and DJ Mixes</h1>
        <h3 class="intro">Unlimited uploads, unlimited storage </h3>
        <br>
        <hr>
        <br>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                <form action="upload.php" method="post" enctype="multipart/form-data" id="form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <label for="name" class="sr-only">Category</label>
                                <input type="text" name="category" class="form-control category" id="category" placeholder="Category">
                            </div>
                            <div class="col-lg-9">
                                <label for="upload" class="sr-only">Upload</label>
                                <input type="file" name="file" class="form-control file">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" value="Upload" name="upload">
                    </div>
                </form>
            </div>
        </div>

    </div>
</section> <!--end cover-->


<?php
require 'includes/scripts.inc.php';
?>

</body>
</html>

