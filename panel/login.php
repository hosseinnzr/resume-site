<?php 
session_start();
require('../controler/conection.php');
require('../controler/config.php');

include_once 'controllers/main.php';
include_once 'controllers/router.php';
$USER_PANEL_INFO = getPanelUserInfo();

date_default_timezone_set("Iran");
$your_ip =  $_SERVER['REMOTE_ADDR'];
$date = date("Y/m/d");
$time = date("h:i:s a");

$stmt = $con->prepare("INSERT INTO `ip` (`ip`, `time`, `date`) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $your_ip, $time, $date);
$stmt->execute();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <br><br><br><br>

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-4">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="username" placeholder="Enter username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="Enter Password">
                                        </div>
                                        <br><br>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="login" name="btnLogin">
                                        <?php 
                                        if(postParam("btnLogin")){
                                            $username = postParam("username") != null ? postParam("username") : '';
                                            $password = postParam("password") != null ? postParam("password") : '';
                                            $password = hashPass($password);

                                            $stmt = $con->prepare("SELECT `id` FROM `users` WHERE `username` = ? AND `password` = ?");
                                            $stmt->bind_param("ss", $username, $password);
                                            $stmt->execute();
                                            $stmt->bind_result($id);
                                            $stmt->fetch();

                                            if($id){
                                                $_SESSION['userLogin'] = true;
                                                header("Location: index.php?modules=main");
                                                //success
                                            }else{
                                                echo '<br><div style="font-size: 12px; " class="alert alert-danger">login Failed!</div>';
                                                //failed
                                            }

                                            $stmt->close();
                                        }// click at btnLogin
                                        ?>
                                    </form>
                                    <!-- <hr> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>
