<?php
session_start(); 
require_once ('func/tunel.php'); 
if (isset($_SESSION['login'])){
	header("Location: http://".$_SERVER['HTTP_HOST']);
}
if (isset($_POST['login'])){
	$u_login=($_POST['login']);
	$u_pass=(md5(md5($_POST['password'])));
	$autht = mysqli_query($link, "SELECT * FROM t_users WHERE login='$u_login' AND pass='$u_pass'");
if	($autht){
	$rowt = mysqli_fetch_assoc($autht);
	$_SESSION['u_id'] = $rowt['id'];
	$_SESSION['login'] = $rowt['login'];
	$_SESSION['password'] = $rowt['pass'];
	header("Location: http://".$_SERVER['HTTP_HOST']);
	}else{
		echo'
		<div class="toast err-mes" role="alert" aria-live="assertive" aria-atomic="true" style="display:block;">
		  <div class="toast-header">
			<img src="imgs/attention.png" class="rounded me-2" alt="...">
			<strong class="me-auto">Attention</strong>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		  </div>
		  <div class="toast-body">
			Неверно введены логин или пароль.
		  </div>
		</div>
		';
	}
}
if (isset($_REQUEST[session_name()])) session_start();if (isset($_SESSION['u_id'])) return; 
else {
echo'
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
	<header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-xl">
                <a class="navbar-brand" href="/">
                    <img src="https://pixy.org/src2/575/5754102.jpg" alt="" width="30" height="30" class="d-inline-block align-text-top">
                    Test
                </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link"></a>
                  </li>                  
                </ul>
                <div class="btn-group">
                    <a href="/new" class="btn btn-dark active" aria-current="page">Регистрация</a>
                    <a href="/login" class="btn btn-outline-secondary">Вход</a>
                </div>
              </div>
            </div>
          </nav>
    </header>
	<main>
		<section>
			<div class="container ss">
				<div class="row align-items-center">
					<div class="col align-self-center">
						<form method="post">
							<div class="mb-3">
							  <label for="exampleInputLogin" class="form-label">Логин</label>
							  <input type="text" class="form-control" name="login" id="exampleInputLogin">
							</div>
							<div class="mb-3">
							  <label for="exampleInputPassword1" class="form-label">Пароль</label>
							  <input type="password" class="form-control" name="password" id="exampleInputPassword1">
							</div>
							<div class="mb-3 form-check">
								<input type="checkbox" class="form-check-input" id="exampleCheck1">
								<label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
							</div>
							<button type="submit" class="btn btn-dark">Войти</button>
						</form>
					</div>
				  </div>
			</div>
		</section>
	</main>
<!-- JavaScript and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="/js/main.js"></script>
</body>
</html>
';
}
exit;
?>
