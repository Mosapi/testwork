<?php
session_start();
require_once ('func/tunel.php'); 

if(isset($_POST['ncomp_add'])){
	$nw_coname = $_POST['ncomp_name'];
	$nw_coinn = $_POST['ncomp_inn'];
	$nw_cogendir = $_POST['ncomp_gendir'];
	$nw_codesc = $_POST['ncomp_desc'];
	$nw_coaddress = $_POST['ncomp_address'];
	$nw_cotel = $_POST['ncomp_tel'];
		$tmp_step = mysqli_query($link, "SELECT 1 FROM `t_company` WHERE co_name='{$nw_coname}'");
		$steck = mysqli_fetch_array($tmp_step);
		if(!$steck){
			$nw_comdsave = mysqli_query($link, "INSERT INTO `t_company` (`co_name`,`co_inn`,`co_gendir`,`co_addr`,`co_tel`,`co_desc`,`log_adduser`) VALUES ('{$nw_coname}','{$nw_coinn}','{$nw_cogendir}','{$nw_coaddress}','{$nw_cotel}','{$nw_codesc}','{$_SESSION['login']}')");
		}else{
			echo'<div class="toast err-mes" role="alert" aria-live="assertive" aria-atomic="true" style="display:block;">
				  <div class="toast-header">
					<img src="imgs/attention.png" class="rounded me-2" alt="...">
					<strong class="me-auto">Attention</strong>
					<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
				  </div>
				  <div class="toast-body">
					Компания с данным названием уже существует.
				  </div>
				</div>';
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
							  <a href="" class="dip" aria-current="page"><label>Компании</label></a>
							</div>
							<div class="col-xl-6">
							  <a href="/profile/'.$_SESSION['u_id'].'" class=""><label>'.$_SESSION['login'].'</label></a>
							</div>
						 </div>
					';
				}else{
					echo'<div class="btn-group">
							<a href="/new" class="btn btn-dark active" aria-current="page">Регистрация</a>
							<a href="/login" class="btn btn-outline-secondary">Вход</a>
						</div>
					';
				}
				?>
                
              </div>
            </div>
          </nav>
    </header>
    <main>
        <section>
			<div class="container man_block">
			</div>
        </section>
        <section>
            <div class="container text-center">
                <div class="row">
				<?php
				$prob = mysqli_query($link, "SELECT 1 FROM `t_company` WHERE co_id>'0'");
				$loi = mysqli_fetch_array($prob);
				if($loi){
				$query = mysqli_query($link, "SELECT * FROM `t_company` ORDER BY co_id");
				while($row = mysqli_fetch_array($query)){
					$id = $row['co_id'];
					$name =$row['co_name'];
					$logo = $row['co_logo'];
					echo'
					<div class="col">
                        <div class="card" style="width: 18rem;">
                            <img src="/imgs/'.$logo.'" class="card-img-top" alt="'.$name.'">
                            <div class="card-body">
                              <h5 class="card-title">'.$name.'</h5>
                              <p class="card-text">
								<a href="/company/'.$id.'" class="btn btn-dark">Подробно</a>
							  </p>                              
                            </div>
                          </div>
                    </div>
					';
				}
				}
				?>
                  </div>
              </div>
        </section>
		<?php
		if (isset($_SESSION['u_id'])) {
			echo'
		<section>
            <div class="container">
                <div class="row">
                    <div class="col align-self-start">
                        <button type="button" class="btn btn-dark" id="add_comp">Добавить компанию</button>
                    </div>
                </div>
                <div class="row frm-add  inactive">
                    <div class="col align-self-start">
                        <form method="post">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="ncomp_name" placeholder="Название" aria-label="CompanyName" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="ncomp_inn" placeholder="ИНН" aria-label="Inn" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <textarea class="form-control" placeholder="Основная информация" name="ncomp_desc" aria-label="With textarea"></textarea>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Ген. Директор" aria-label="PrimeDirector" name="ncomp_gendir" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="ncomp_address" placeholder="Адрес" aria-label="Address" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="ncomp_tel" placeholder="Телефон" aria-label="Telephone" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <button type="submit" name="ncomp_add" class="btn btn-dark" id="add_comp">Добавить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
			';
		}
		?>
    </main>
<!-- JavaScript and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/js/main.js"></script>
<script src="/js/services.js"></script>
</body>
</html>