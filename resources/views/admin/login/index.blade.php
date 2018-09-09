<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>H+ 后台主题UI框架 - 登录</title>
    <link href="/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/admin/css/animate.css" rel="stylesheet">
    <link href="/admin/css/style.css" rel="stylesheet">
    <link href="/admin/css/login.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>
        if (window.top !== window.self) {
            window.top.location = window.location;
        }
    </script>

</head>

<body class="signin">
<div class="signinpanel">
    <div class="row">
        <div class="col-sm-7">
            <div class="signin-info">
                <div class="logopanel m-b">
                    <h1>[ laravel5.4-janebook]</h1>
                </div>
                <div class="m-b"></div>
                <h4>欢迎使用 <strong>laravel5.4-janebook</strong></h4>
            </div>
        </div>
        <div class="col-sm-5">
            <form class="form-signin" method="POST" action="login">
                {{csrf_field()}}
                <h4 class="no-margins">登录：</h4>
                <p class="m-t-md">登录到laravel5.4-janebook后台 </p>
                <input type="text" class="form-control uname" placeholder="用户名" name="name" />
                <input type="password" class="form-control pword m-b" placeholder="密码" name="password" />
                <button class="btn btn-success btn-block">登录</button>
            </form>
        </div>
    </div>
    <div class="signup-footer">
        <div class="pull-left">
            &copy; 2018 All Rights Reserved. H+
        </div>
    </div>
</div>
</body>

</html>
