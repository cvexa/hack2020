<?php
    include 'php/db_connect.php';
    include 'php/functions-registration.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>e-Чакалня</title>
    <script src="js/script-registration.js"></script>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="./bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="./bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="./plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="./index2.html"><b>e-Чакалня</b></a>
    </div>

    <div class="register-box-body">
        <p id="nodeUnderErrorMessage" class="login-box-msg">Регистрация</p>

        <form method="POST" enctype="multipart/form-data">
            <div class="form-group has-feedback">
                <input type="text" name="nameFirst" class="form-control" placeholder="Име">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="nameLast" class="form-control" placeholder="Фамилия">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Електронна поща">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Парола">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="passwordRepeat" class="form-control" placeholder="Повтори паролата">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input name="checkbox" type="checkbox"> съгласен съм <a href="#">GDPR</a>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <?php 
            if (isset($_POST['submit'])){
                $register_data = add_values_to_register_data();
                if ($register_data[sizeof($register_data) - 1] === false){
                    ?>
                    <script type="text/javascript">
                        printError('Моля попълнете всички полета');
                    </script>
                    <?php
                } elseif ($register_data[3] != $register_data[4]){
                    // Съобщение, че паролите не съвпадат
                    ?>
                    <script type="text/javascript">
                        printError('Паролите не съвпадат');
                    </script>
                    <?php
                } elseif (strlen($register_data[3]) < 6){
                    ?>
                    <script type="text/javascript">
                        printError('Паролата ви е твърде кратка');
                    </script>
                    <?php
                } elseif (strlen($register_data[3]) > 12){
                    ?>
                    <script type="text/javascript">
                        printError('Паролата ви е твърде дълга');
                    </script>
                    <?php
                } elseif (isset($_POST['checkbox']) == false || $_POST['checkbox'] != 'on'){
                     ?>
                    <script type="text/javascript">
                        printError('Необходимо е вашето съгласие по GDPR');
                    </script>
                    <?php
                } else {
                    // Когато базата се оправи мейлите да са UNIQUE трябва да се оправи и грешката, че вече има регистриран потребител с този мейл
                   $registrationResult = registration($register_data, $conn);
                   if ($registrationResult == 'registration'){
                        header("location: login.php");    
                        exit; 
                   } elseif ($registrationResult == 'duplicate'){
                   		?>
                        	<script type="text/javascript">
                            	printError('Вече има потребител с тази електронна поща');
                        	</script>
                    	<?php
                   } else {
                     ?>
                        <script type="text/javascript">
                            printError('Възникна грешка. Моля опитайте отново.');
                        </script>
                    <?php
                   }
                }
            }  
        ?>
       
        <div class="social-auth-links text-center">

        </div>

        <a href="login.php" class="text-center">Вход</a>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="./bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="./plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
