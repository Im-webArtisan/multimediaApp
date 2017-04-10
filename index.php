<?php
session_start();
?>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        include 'includes/conn.inc.php';
        if(isset($_POST['sign']))
        {
            $email = $_POST['email'];
            $user = $_POST['userName'];
            $password = $_POST['password'];
            $pass = md5($password);

            if(!empty($user) && !empty($password) && !empty($email))
            {
                $query = "INSERT INTO `Users`(`ID`, `email`, `userName`, `password`) VALUES ('','$email', '$user', '$pass')";
                $sql = mysqli_query($conn, $query);

                if($sql == true)
                {
                    $_SESSION['logged_in'] = true;
                    header('location: home.php');
                }
                else{
                    die('ERROR:'.mysqli_error($conn));
                }
            }
            else
            {
                echo '
                    <script>alert("Please fill all fields")</script>
                ';
            }
        }
        else if (isset($_POST['login']))
        {
            $user = $_POST['userName'];
            $password = $_POST['password'];
            $pass = md5($password);

            if (!empty($user) && !empty($password))
            {
                $query = "SELECT `userName`, `password` FROM `Users` WHERE `userName` = '$user' AND `password` = '$pass'";
                $sql = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($sql);

                if($sql == true)
                {
                    if($row['userName'] == $user && $row['password'] == $pass )
                    {
                        $_SESSION['logged_in'] = true;
                        header('location: home.php');
                    }
                    else{
                        echo '
                    <script>alert("Incorrect username or password!!")</script>
                    ';
                    }
                }
                else
                {
                    die('ERROR:'.mysqli_error($conn));
                }
            }
            else
            {
                echo '
                    <script>alert("Please fill all fields")</script>
                ';
            }
        }

    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <?php
    require 'includes/links.inc.php';
    ?>
</head>
<body>
<!-- cover -->
<section id="cover">

    <!-- cover caption -->
    <div class="col-sm-12 cover-caption" >
        <h1 class="title">Welcome to Artisans Entertainment</h1>
        <h3 class="intro">Please Login or Register to Enjoy our Services </h3>
        <br>
        <hr>
        <br>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="btn-group" role="group" aria-label="...">
                    <button type="button" class="btn btn-primary btn-lg" id="signUp">Sign Up (New Users)</button>
                    <button type="button" class="btn btn-success btn-lg" id="login">Sign In (Existing Users)</button>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3" id="signUpForm">
                        <form action="index.php" method="post">
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" placeholder="Email Address*" class="form-control category">
                            </div>
                            <div class="form-group">
                                <label for="username" class="sr-only">Username</label>
                                <input type="text" name="userName" id="userName" placeholder="Username*" class="form-control category">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="password" placeholder="Password*" class="form-control category">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="sign" class="btn btn-primary btn-block" value="Get Started">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-lg-offset-3" id="loginForm">
                        <form action="#" method="post" name="signUp">
                            <div class="form-group">
                                <label for="username" class="sr-only">Username</label>
                                <input type="text" name="userName" id="userName" placeholder="Username*" class="form-control category">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="password" placeholder="Password*" class="form-control category">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="login" class="btn btn-success btn-block"  value="Start Uploading">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section> <!--end cover-->


<?php
require 'includes/scripts.inc.php';
?>
<script>
$(function () {
    var loginForm = $('#loginForm');
    var signUpForm = $('#signUpForm');
    var login = $('#login');
    var signUp = $('#signUp');

    //hide classes
    loginForm.hide();

    //login clicked
    login.on('click', function (e) {
        e.preventDefault();
        console.log('Login Clicked');
        loginForm.show();
        signUpForm.hide();
    });

    //signUp clicked
    signUp.on('click', function (e) {
        e.preventDefault();
        console.log('SignUp Clicked');
        signUpForm.show();
        loginForm.hide();
    });
});
</script>

</body>
</html>

