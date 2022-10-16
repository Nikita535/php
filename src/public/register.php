<?php
if(isset($_POST["register"])){
    if(!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $connection = new mysqli("MYSQL", "user", "password", "appDB");
        $email=htmlspecialchars($_POST['email']);
        $username=htmlspecialchars($_POST['username']);
        $password=htmlspecialchars($_POST['password']);
        $query_result = $connection->query("SELECT * FROM users WHERE username='".$username."'");
        $result = $query_result->fetch_row();
        if (!empty($result)){
            echo '<script language="javascript">';
            echo 'alert("User with this username already exists")';
            echo '</script>';
        } else {
            $password = crypt($password);
            $stmt = $connection->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
            $stmt->bind_param('sss', $username, $password, $email);
            $stmt->execute();
            echo '<script language="javascript">';
            echo 'window.location.replace("login.php");';
            echo '</script>';
        }
    }}
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>social network</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!--  css для логина  -->
    <link href="style.css" rel="stylesheet">
</head>

<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <div id="content">
        <div class="container-fluid">
            <div class="lock-container">
                <h1>Регистрация</h1>
                <div class="panel panel-default text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-circle img-login">
                    <form class="panel-body" action="register.php" method="post">
                        <input class="form-control" type="text" id="username" name="username" placeholder="Введите имя">
                        <input class="form-control" type="email" id="email" name="email"placeholder="Введите почту">
                        <input class="form-control" type="password" id="password" name="password" placeholder="Введите пароль">
                        <button class="button login__submit">
                            <span class="button__text">Sign up Now</span>
                            <i class="button__icon fas fa-chevron-right"><input type="submit" id="register" name="register"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- скрипт для логина  -->
<script src="login.js"></script>
</body>
</html>
<!--<!DOCTYPE HTML>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="utf-8">-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--    <title>Register</title>-->
<!--    <link href="style.css" media="screen" rel="stylesheet">-->
<!--</head>-->
<!--<body>-->
<!--<div class="container">-->
<!--    <div class="screen">-->
<!--        <div class="screen__content">-->
<!--            <form class="login" action="register.php" method="post">-->
<!--                <div class="login__field">-->
<!--                    <i class="login__icon fas fa-user"></i>-->
<!--                    <input type="text" id="username" name="username" class="login__input" placeholder="User name">-->
<!--                </div>-->
<!--                <div class="login__field">-->
<!--                    <i class="login__icon fas fa-lock"></i>-->
<!--                    <input type="text" class="login__input" id="email" name="email" placeholder="Email">-->
<!--                </div>-->
<!--                <div class="login__field">-->
<!--                    <i class="login__icon fas fa-lock"></i>-->
<!--                    <input type="password" id="password" name="password" class="login__input" placeholder="Password">-->
<!--                </div>-->
<!--                <button class="button login__submit">-->
<!--                    <span class="button__text">Sign up Now</span>-->
<!--                    <i class="button__icon fas fa-chevron-right"><input type="submit" id="register" name="register"></i>-->
<!--                </button>-->
<!--            </form>-->
<!--        </div>-->
<!--        <div class="screen__background">-->
<!--            <span class="screen__background__shape screen__background__shape4"></span>-->
<!--            <span class="screen__background__shape screen__background__shape3"></span>-->
<!--            <span class="screen__background__shape screen__background__shape2"></span>-->
<!--            <span class="screen__background__shape screen__background__shape1"></span>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--</body>-->
<!--</html>-->

