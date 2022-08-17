<?php
session_start();
require_once ('func/tunel.php'); 

if (isset($_GET['u'])) { 
	$logout = $_GET['u'];
	if ($logout == 0) {
		unset($_SESSION['login']);
		unset($_SESSION['password']);
		unset($_SESSION['u_id']); 
		header("Location: http://".$_SERVER['HTTP_HOST'].""); 
		session_destroy();
	}
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Только CSS -->
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
				<?php
					if (isset($_SESSION['u_id'])){
						echo'<div class="row justify-content-end">
								<div class="col-xl-6">
								  <a href="/" class="dip" aria-current="page"><label>Компании</label></a>
								</div>';
					if (isset($_GET['u'])){
						$us_id = $_GET['u'];
						if($us_id == $_SESSION['u_id']){
							echo'<div class="col-xl-6">
								  <a href="/profile/0" class=""><label>Выход</label></a>
								</div>';
						}else{
							echo'<div class="col-xl-6">
								  <a href="/profile/'.$_SESSION['u_id'].'" class=""><label>К себе</label></a>
								</div>';
						}
					}
						echo'</div>';
					}else{
						echo'<div class="btn-group">
								<a href="/new" class="btn btn-dark active" aria-current="page">Регистрация</a>
								<a href="/login" class="btn btn-outline-secondary">Вход</a>
							</div>';
					}
				?>
              </div>
            </div>
          </nav>
    </header>
    <main>
        <section>
		<?php
		if (isset($_GET['u'])){
			echo'<label>Профиль: '.$_GET['u'].'</label>';
		}
		?>
		</section>
    </main>
<!-- JavaScript and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="/js/main.js"></script>
</body>
</html>
