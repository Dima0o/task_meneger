<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="shortcut icon" href="tmp/images/favicon_1.ico">
        <title>Авторизация</title>
        <link href="tmp/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="tmp/css/pages.css" rel="stylesheet" type="text/css">
        <link href="tmp/css/core.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading">
                    <h3 class="text-center m-t-10 text-white"> Авторизация <strong>Вектор</strong> </h3>
                </div>
                <div class="panel-body">
                <form class="form-horizontal m-t-20" action="scr/login.php" method="POST">
					<?php
						if(isset($_GET['act']) AND $_GET['act'] == "error"){
						echo '
							<div class="alert alert-danger">
							<span><b> Ошибка - </b> Логин или пароль не верный</span>
							</div>
							';
						}
					?>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input name="login" class="form-control input-lg" type="text" required="" placeholder="Логин">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input name="pass" class="form-control input-lg" type="password" required="" placeholder="Пароль">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Вход</button>
                        </div>
                    </div>
                </form> 
                </div>                                 
            </div>
        </div>
    	<script>
            var resizefunc = [];
        </script>
	</body>
</html>