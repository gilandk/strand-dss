<?php
session_start();

require_once('../db.php');
$show = 'hidden';
$msg = '';
if (isset($_POST['submit'])) {
    $time = time() - 30;
    $ip_address = getIpAddr();
    // Getting total count of hits on the basis of IP
    $query = mysqli_query($conn, "SELECT COUNT(*) AS total_count FROM loginlogs WHERE TryTime > $time AND IpAddress='$ip_address'");
    $check_login_row = mysqli_fetch_assoc($query);
    $total_count = $check_login_row['total_count'];
    //Checking if the attempt 3, or youcan set the no of attempt her. For now we taking only 3 fail attempted
    if ($total_count == 3) {
        $msg = "To many failed login attempts. Please login after 30 sec";
    } else {
        //Getting Post Values
        $email = $_POST['email'];
        $password = $_POST['password'];
        // Coding for login
        $res = mysqli_query($conn, "SELECT * FROM admin WHERE admin_email='$email' AND  admin_pass='$password'");
        if (mysqli_num_rows($res)) {
            $_SESSION['IS_LOGIN'] = 'yes';
            mysqli_query($conn, "delete from loginlogs where IpAddress='$ip_address'");

            header('location:dashboard');
        } else {

            $total_count++;
            $rem_attm = 3 - $total_count;
            if ($rem_attm == 0) {
                $show = '';
                $msg = "To many failed login attempts. Please login after 30 sec";
            } else {
                $show = '';
                $msg = "Please enter valid login details.<br/>$rem_attm attempts remaining<br/>";
            }
            $try_time = time();
            mysqli_query($conn, "insert into loginlogs(IpAddress,TryTime) values('$ip_address','$try_time')");
        }
    }
}

// Getting IP Address
function getIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ipAddr = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipAddr = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ipAddr = $_SERVER['REMOTE_ADDR'];
    }
    return $ipAddr;
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Strand DSS | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Strand</b>DSS</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <div <?php echo $show ?> class="callout callout-danger text-center" id="result">
                    <?php echo $msg ?>
                </div>

                <form id="login-form" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->


                    </div>
                </form>

                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>

</body>

</html>