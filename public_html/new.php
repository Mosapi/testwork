<?php
session_start(); 
require_once ('func/tunel.php'); 
if(isset($_SESSION['login'])){
	header("Location: http://".$_SERVER['HTTP_HOST']);
}
echo'
<!DOCTYPE html>
	<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>New User</title>
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
';
if(isset($_POST['new_login'])){
	$err = array();
	if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['new_login'])){
	  $err[] = "Login can consist only of letters of the English alphabet and numbers";
	  echo'<main>
			<section>
				<div class="container ss">
					<div class="row align-items-center">
						<div class="col align-self-center">
							<p class="text-center">Login can consist only of letters of the English alphabet and numbers</p>
							<a href="/new.php"><button type="button" class="btn btn-dark">Вернуться</button></a>
						</div>
					 </div>
				</div>
			</section>
		</main>
	  ';
	}
	if(strlen($_POST['new_login']) < 4 or strlen($_POST['new_login']) > 12){
	$err[] = "Login must be at least 4 characters and not more than 12";
	echo'<main>
			<section>
				<div class="container ss">
					<div class="row align-items-center">
						<div class="col align-self-center">
							<p class="text-center">Login must be at least 4 characters and not more than 12</p>
							<a href="/new.php"><button type="button" class="btn btn-dark">Вернуться</button></a>
						</div>
					 </div>
				</div>
			</section>
		</main>
	';
	}
	if(strlen($_POST['new_pass']) < 8 or strlen($_POST['new_login']) > 20){
	$err[] = "Password must be at least 8 characters and not more than 20";
	echo'<main>
			<section>
				<div class="container ss">
					<div class="row align-items-center">
						<div class="col align-self-center">
							<p class="text-center">Password must be at least 8 characters and not more than 20</p>
							<a href="/new.php"><button type="button" class="btn btn-dark">Вернуться</button></a>
						</div>
					 </div>
				</div>
			</section>
		</main>
	';
	}
	$queryz = mysqli_query($link, "SELECT 1 FROM t_users WHERE login='".mysqli_real_escape_string($link, $_POST['new_login'])."'");
	$xxxx = mysqli_num_rows($queryz);
	if($xxxx != 0){
	$err[] = "A user with this login already exists";
	echo'<main>
			<section>
				<div class="container ss">
					<div class="row align-items-center">
						<div class="col align-self-center">
							<p class="text-center">A user with this login already exists</p>
							<a href="/new.php"><button type="button" class="btn btn-dark">Вернуться</button></a>
						</div>
					 </div>
				</div>
			</section>
		</main>
	';
	}
	if(count($err) == 0){
		$new_pass = (md5(md5($_POST['new_pass'])));
		$new_log = $_POST['new_login'];
		$new_data = date("Y-m-d");
		$iq_aa = mysqli_query($link, "SELECT 1 FROM t_users WHERE login='{$new_log}'");
		$_mora = mysqli_num_rows($iq_aa);
		if($_mora == 0){
		$query = mysqli_query ($link, "INSERT INTO `t_users` (`login`,`pass`,`level`,`data`) VALUES ('{$new_log}','{$new_pass}','1','{$new_data}')");

	echo'<main>
			<section>
				<div class="container ss">
					<div class="row align-items-center">
						<div class="col align-self-center">
							<p class="text-center">Регистрация прошла успешно. Теперь вы можете авторизоваться.</p>
							<a href="/"><button type="button" class="btn btn-dark">На главную</button></a>
					  </div>
				</div>
			</section>
		</main>
	';
		}	
	}
}else{
	echo'
		<main>
			<section>
				<div class="container ss">
					<div class="row align-items-center">
						<div class="col align-self-center">
							<form method="post">
								<div class="mb-3">
								  <label for="exampleInputLogin" class="form-label">Логин</label>
								  <input type="text" class="form-control" name="new_login" id="exampleInputLogin">
								</div>
								<div class="mb-3">
								  <label for="exampleInputPassword1" class="form-label">Пароль</label>
								  <input type="password" class="form-control" name="new_pass" id="exampleInputPassword1">
								  <div id="passwordHelpBlock" class="form-text">
									Ваш пароль должен состоять из 8-20 символов, содержать буквы и цифры и не должен содержать пробелов, специальных символов или эмодзи.
								  </div>
								</div>
								<button type="submit" class="btn btn-dark">Отправить</button>
							  </form>
						</div>
					  </div>
				</div>
			</section>
		</main>
	';
}
?>
	<!-- JavaScript and dependencies -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<script src="/js/main.js"></script>
	</body>
</html>