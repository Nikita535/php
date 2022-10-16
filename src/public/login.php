<html lang="en" xmlns:th="http://www.thymeleaf.org">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="style.css" media="screen" rel="stylesheet">
</head>

<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <div id="content">
        <div class="container-fluid">
            <div class="lock-container">
                <h1>Вход</h1>
                <div class="panel panel-default text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-circle img-login">
                    <form class="panel-body" method="POST" action="/login" name="loginform">
                        <input class="form-control mb-3" required="true" type="text" placeholder="Введите имя" name="httpd_username" value="">
                        <input class="form-control mb-3" required="true" type="password" placeholder="Введите пароль" name="httpd_password" id="password" value="">
                        <button type="submit" class="btn btn-success">Войти <i class="fa fa-fw fa-unlock-alt"></i></button>
                        <a href="register.php" class="btn btn-primary">Зарегистрироваться</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- скрипт для логина  -->
<script src="login.js"></script>

</body>
</html>