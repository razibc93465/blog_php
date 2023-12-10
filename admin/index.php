<?php
session_start();
if (isset($_SESSION['admin_id'])) {
    if ($_SESSION['admin_id'] != NULL) {
        header('Location:dashboard.php');
    } else {
        header('Location:index.php');
    }
}
$message = '';

if (isset($_POST['btn'])) {
    require '../class/login.php';
    $login = new Login();
    $message = $login->admin_login_check($_POST);
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Template for Bootstrap</title>
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="well" style="margin-top: 150px; padding: 50px;">
                    <h3 class="text-center text-success">Please Use valid email address & password to login </h3>
                    <h3 class="text-center text-danger"><?php echo $message; ?></h3>
                    <hr>
                    <form class="form-horizontal" action="" method="POST">
                        <div class="form-group">
                            <label class="control-label col-md-3">Email Address</label>
                            <div class="col-md-9">
                                <input type="email" name="email_address" class="form-control" required="" placeholder="Enter Your email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Password</label>
                            <div class="col-md-9">
                                <input type="password" name="password" class="form-control" required="" placeholder="Enter Your password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-9">
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Login">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../asset/js/jquery-3.4.1.min.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
</body>

</html>