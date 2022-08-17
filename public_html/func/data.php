<?php
session_start();
//require_once ('tunnel.php');*/
$link = mysqli_connect( 
            'localhost',
            'user', 
            'M2Vh6jn5aGpKW5UA',
            'test_company');
mysqli_query($link, "SET NAMES utf8");
if (!$link) { 
   printf("Connection is lost. Error:: %s\n", mysqli_connect_error()); 
   exit; 
}

if (isset($_POST['val0']))
{
$dt_pr = $_POST['val0']; //действие
//$dt_ya = $_POST['val2']; //ячейка общая или нет?
//$dt_tx = $_POST['val3']; //текст коммента
//$dt_cm = $_POST['val4']; //что за компания
$dt_dt = date("H:i d-m-Y"); //дата
if(@$_POST['val1']){$dt_ya = $_POST['val1'];}
if(@$_POST['val2']){$dt_tx = $_POST['val2'];}
if(@$_POST['val3']){$dt_cm = $_POST['val3'];}

if($dt_pr == 'lnew_com')
{
	if(@$_SESSION['u_id']){
			$fin_co = '';
			$dt_dt = date("H:i d-m-Y");
			$nn_com = mysqli_query($link, "SELECT 1 FROM `t_comms` WHERE data='{$dt_dt}' and user_id!='{$_SESSION['u_id']}'");
			$nn_rst = mysqli_fetch_array($nn_com);
			if($nn_rst){
				$nnd_commt = mysqli_query($link, "SELECT data,mast_id FROM `t_comms` WHERE data='{$dt_dt}' and user_id!='{$_SESSION['u_id']}'");
				while($nnd_tmp = mysqli_fetch_array($nnd_commt)){
				$ncom_mast = $nnd_tmp['mast_id'];
				$temp_uid = mysqli_query($link, "SELECT co_id,co_name FROM `t_company` WHERE co_id='{$ncom_mast}'");
				$temp_tk = mysqli_fetch_array($temp_uid);
				$u_prof = $temp_tk['co_name'];
					$fin_co = $fin_co.' '.$u_prof;
					$proba = 1;
				}
				if($proba == 1){
					echo'
					<div class="toast err-mes" role="alert" aria-live="assertive" aria-atomic="true" style="display:block;">
						<div class="toast-header">
							<img src="/imgs/mess2.png" class="rounded me-2" alt="New mess">
							<strong class="me-auto">Новое сообщение!</strong>
							<button type="button" class="btn-close btn_cls" data-bs-dismiss="toast" aria-label="Close"></button>
						</div>
						<div class="toast-body">
							Новые сообщения у:'.$fin_co.'.
						</div>
					</div>';
				}
				
			}
	}
}
}
else{
header("Location: /");exit;
}
?>