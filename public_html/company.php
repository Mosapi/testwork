<?php
session_start();
require_once ('func/tunel.php'); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company</title>
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
	<?php
	if (isset($_GET['id'])){
		$company_id = $_GET['id'];
		$prob = mysqli_query($link, "SELECT 1 FROM `t_company` WHERE co_id='{$company_id}'");
		$loi = mysqli_fetch_array($prob);
		if($loi){
		$query = mysqli_query($link, "SELECT * FROM `t_company` WHERE co_id='{$company_id}'");
		$row = mysqli_fetch_array($query);
			$c_id = $row['co_id'];
			$c_name = $row['co_name'];
			$c_inn = $row['co_inn'];
			$c_gendir = $row['co_gendir'];
			$c_addr = $row['co_addr'];
			$c_tel = $row['co_tel'];
			$c_desc = $row['co_desc'];
			$c_logo = $row['co_logo'];
			echo'
		<section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="col">
                            <img src="/imgs/'.$c_logo.'" class="img-thumbnail" alt="'.$c_name.'">
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="col">';
							//company name start here
							echo'
                            <div class="row justify-content-end" data-tag="comp_name">
                                <div class="col">
                                    '.$c_name.'
                                </div>';
								if (isset($_SESSION['u_id'])){
								$vn_comm = mysqli_query($link, "SELECT id FROM `t_comms` WHERE mast_id='{$company_id}' and pole_nm='comm_name'");
								$vn_tik = mysqli_num_rows($vn_comm);
								echo'
                                <div class="col text-end">
                                    <div class="row">
                                        <div class="col">
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                <button type="button" class="btn btn-outline-dark plus" tag="1"> + </button>
                                                <button type="button" class="btn btn-outline-dark minus" tag="1"> - </button>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="visio" tag="1">Комментарии</label>
											<text id="sch_na">'.$vn_tik.'</text>
                                        </div>  
                                    </div>                                                                      
                                </div>';
								}
							echo'
                            </div>';
							require_once('func/cpname_f.php');
							//inn start here
							echo'
                            <div class="row justify-content-end" data-tag="comp_inn">
                                <div class="col">
                                    '.$c_inn.'
                                </div>
								';
								if (isset($_SESSION['u_id'])){
								$vi_comm = mysqli_query($link, "SELECT id FROM `t_comms` WHERE mast_id='{$company_id}' and pole_nm='comm_inn'");
								$vi_tik = mysqli_num_rows($vi_comm);
								echo'
                                <div class="col text-end">
                                    <div class="row">
                                        <div class="col">
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                <button type="button" class="btn btn-outline-dark plus" tag="2"> + </button>
                                                <button type="button" class="btn btn-outline-dark minus" tag="2"> - </button>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="visio" tag="2">Комментарии</label>
											<text id="sch_in">'.$vi_tik.'</text>
                                        </div>  
                                    </div>
                                </div>
								';
								}
							echo'
                            </div>';
							require_once('func/cpinn_f.php');
							//gen director start here
							echo'
                            <div class="row justify-content-end" data-tag="comp_gen">
                                <div class="col">
                                    '.$c_gendir.'
                                </div>
								';
								if (isset($_SESSION['u_id'])){
								$vg_comm = mysqli_query($link, "SELECT id FROM `t_comms` WHERE mast_id='{$company_id}' and pole_nm='comm_gen'");
								$vg_tik = mysqli_num_rows($vg_comm);
								echo'
                                <div class="col text-end">
                                    <div class="row">
                                        <div class="col">
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                <button type="button" class="btn btn-outline-dark plus"  tag="3"> + </button>
                                                <button type="button" class="btn btn-outline-dark minus" tag="3"> - </button>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="visio" tag="3">Комментарии</label>
											<text id="sch_ge">'.$vg_tik.'</text>
                                        </div>  
                                    </div>
                                </div>';
								}
							echo'
                            </div>';
							require_once('func/gendir_f.php');
							// adress start here
							echo'
                            <div class="row justify-content-end" data-tag="comp_adr">
                                <div class="col">
                                    '.$c_addr.'
                                </div>
								';
								if (isset($_SESSION['u_id'])){
								$va_comm = mysqli_query($link, "SELECT id FROM `t_comms` WHERE mast_id='{$company_id}' and pole_nm='comm_adr'");
								$va_tik = mysqli_num_rows($va_comm);
								echo'
                                <div class="col text-end">
                                    <div class="row">
                                        <div class="col">
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                <button type="button" class="btn btn-outline-dark plus" tag="4"> + </button>
                                                <button type="button" class="btn btn-outline-dark minus" tag="4"> - </button>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="visio" tag="4">Комментарии</label>
											<text id="sch_ad">'.$va_tik.'</text>
                                        </div>  
                                    </div>
                                </div>
								';
								}							
							echo'
                            </div>';
							require_once('func/address_f.php');
							//telephone info start here
							echo'
                            <div class="row justify-content-end" data-tag="comp_tel">
                                <div class="col">
                                    '.$c_tel.'
                                </div>';
								if (isset($_SESSION['u_id'])){
								$vt_comm = mysqli_query($link, "SELECT id FROM `t_comms` WHERE mast_id='{$company_id}' and pole_nm='comm_tel'");
								$vt_tik = mysqli_num_rows($vt_comm);
								echo'
                                <div class="col text-end">
                                    <div class="row">
                                        <div class="col">
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                <button type="button" class="btn btn-outline-dark plus" tag="5"> + </button>
                                                <button type="button" class="btn btn-outline-dark minus" tag="5"> - </button>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="visio" tag="5">Комментарии</label>
											<text id="sch_te">'.$vt_tik.'</text>
                                        </div>  
                                    </div>
                                </div>';
								}
							echo'
                            </div>';
							require_once('func/tel_f.php');
							//description start here
							echo'
                            <div class="row justify-content-end" data-tag="comp_des">
                                <div class="col">
                                    '.$c_desc.'
                                </div>
								';
								if (isset($_SESSION['u_id'])){
								$vd_comm = mysqli_query($link, "SELECT id FROM `t_comms` WHERE mast_id='{$company_id}' and pole_nm='comm_desc'");
								$vd_tik = mysqli_num_rows($vd_comm);
								echo'
                                <div class="col text-end">
                                    <div class="row">
                                        <div class="col">
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                <button type="button" class="btn btn-outline-dark plus" tag="6"> + </button>
                                                <button type="button" class="btn btn-outline-dark minus" tag="6"> - </button>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="visio" tag="6">Комментарии</label>
											<text id="sch_ds">'.$vd_tik.'</text>
                                        </div>  
                                    </div>
                                </div>
								';
								}
							echo'
                            </div>';
							require_once('func/desc_f.php');
							echo'
                        </div>
                    </div>
                </div>               
            </div>
        </section>';
		echo'
		<section>
			<div class="container ">';
			if (isset($_SESSION['u_id'])){
			echo'
                <div class="row">
                    <div class="col">
						<div class="row frmc-add">
                            <div class="col align-self-start">
                                <!--<form method="post">-->
									<div class="input-group mb-3">
                                        <label>Добавить Комментарий</label>
										<input type="hidden" value="comm_all" id="hrow">
                                    </div>                                    
                                    <div class="input-group mb-3">
                                        <textarea class="form-control" placeholder="Основная информация" id="man_com" aria-label="With textarea" required></textarea>
                                    </div>                                        
                                    <div class="input-group mb-3">
                                        <button type="button" class="btn btn-dark" id="adl_comp">Добавить</button>
                                    </div>
                                <!--</form>-->
                            </div>
                        </div>
					</div>
				</div>';
			}
			require_once('func/mancom_f.php');
			echo'
			</div>
		</section>
		';
		}
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
<script src="/js/desk.js"></script>
<script>
	comp_pg = '<? echo $_GET['id']; ?>'; 
</script>
</body>
</html>