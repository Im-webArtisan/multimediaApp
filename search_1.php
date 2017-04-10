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
        <h1 class="title">Search for your favorite videos</h1>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="input-group category">
                    <span class="input-group-addon category"><i class="fa fa-search" aria-hidden="true"></i></span>
                    <input type="text" name="search" id="search" placeholder="Search Videos" class="form-control category">
                </div>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="row">
            <div id="result"></div>
        </div>

    </div>
</section> <!--end cover-->


<?php
require 'includes/scripts.inc.php';
?>
<script>
    $(document).ready(function () {
        $('#search').keyup(function () {
            var txt = $(this).val();

            if(txt !== '')
            {
                $.ajax({
                    url: "data.php",
                    method: "post",
                    data: {search:txt},
                    dataType: "text",
                    success: function (data) {
                        $('#result').html(data);
                    }
                });
            }
            else
            {
                $('#result').html('');
            }
        });
    });
</script>
</body>
</html>