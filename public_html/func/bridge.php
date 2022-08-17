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

if($dt_pr == 'add_mancom')
{
	mysqli_query ($link, "INSERT INTO `t_comms` (`mast_id`,`user_id`,`pole_nm`,`comm_bl`,`data`) VALUES ('{$dt_cm}','{$_SESSION['u_id']}','{$dt_ya}','{$dt_tx}','{$dt_dt}')");
	
	$mn_commt = mysqli_query($link, "SELECT * FROM `t_comms` WHERE mast_id='{$dt_cm}' and pole_nm='comm_all' ORDER BY id DESC");
	while($mn_temp = mysqli_fetch_array($mn_commt)){
	$comm_text = $mn_temp['comm_bl'];
	$comm_uid = $mn_temp['user_id'];
	$comm_dt = $mn_temp['data'];
	$temp_uid = mysqli_query($link, "SELECT id,login FROM `t_users` WHERE id='{$comm_uid}'");
	$temp_tk = mysqli_fetch_array($temp_uid);
	$u_prof = $temp_tk['login'];
	echo'
	<div class="comm_bl">
		<div class="input-group mb-3">
			<div class="container text-start">
				<div class="row">
					<div class="col-3">
						<text class="user-name">'.$u_prof.'</text>
					</div>
					<div class="col-9">
						'.$comm_dt.'
					</div>
				</div>
			</div>
		</div>
		<div class="input-group mb-3">
			<div>'.$comm_text.'</div>
		</div>
	</div>';
	}
}
if($dt_pr == 'add_ncom')
{
	mysqli_query ($link, "INSERT INTO `t_comms` (`mast_id`,`user_id`,`pole_nm`,`comm_bl`,`data`) VALUES ('{$dt_cm}','{$_SESSION['u_id']}','{$dt_ya}','{$dt_tx}','{$dt_dt}')");
	
	$mn_commt = mysqli_query($link, "SELECT * FROM `t_comms` WHERE mast_id='{$dt_cm}' and pole_nm='comm_name' ORDER BY id DESC");
	while($mn_temp = mysqli_fetch_array($mn_commt)){
	$comm_text = $mn_temp['comm_bl'];
	$comm_uid = $mn_temp['user_id'];
	$comm_dt = $mn_temp['data'];
	$temp_uid = mysqli_query($link, "SELECT id,login FROM `t_users` WHERE id='{$comm_uid}'");
	$temp_tk = mysqli_fetch_array($temp_uid);
	$u_prof = $temp_tk['login'];
	echo'
	<div class="comm_bl">
		<div class="input-group mb-3">
			<div class="container text-start">
				<div class="row">
					<div class="col-3">
						<text class="user-name">'.$u_prof.'</text>
					</div>
					<div class="col-9">
						'.$comm_dt.'
					</div>
				</div>
			</div>
		</div>
		<div class="input-group mb-3">
			<div>'.$comm_text.'</div>
		</div>
	</div>';
	}
}
if($dt_pr == 'add_icom')
{
	mysqli_query ($link, "INSERT INTO `t_comms` (`mast_id`,`user_id`,`pole_nm`,`comm_bl`,`data`) VALUES ('{$dt_cm}','{$_SESSION['u_id']}','{$dt_ya}','{$dt_tx}','{$dt_dt}')");

	$mn_commt = mysqli_query($link, "SELECT * FROM `t_comms` WHERE mast_id='{$dt_cm}' and pole_nm='comm_inn' ORDER BY id DESC");
	while($mn_temp = mysqli_fetch_array($mn_commt)){
	$comm_text = $mn_temp['comm_bl'];
	$comm_uid = $mn_temp['user_id'];
	$comm_dt = $mn_temp['data'];
	$temp_uid = mysqli_query($link, "SELECT id,login FROM `t_users` WHERE id='{$comm_uid}'");
	$temp_tk = mysqli_fetch_array($temp_uid);
	$u_prof = $temp_tk['login'];
	echo'
	<div class="comm_bl">
		<div class="input-group mb-3">
			<div class="container text-start">
				<div class="row">
					<div class="col-3">
						<text class="user-name">'.$u_prof.'</text>
					</div>
					<div class="col-9">
						'.$comm_dt.'
					</div>
				</div>
			</div>
		</div>
		<div class="input-group mb-3">
			<div>'.$comm_text.'</div>
		</div>
	</div>';
	}
}
if($dt_pr == 'add_gcom')
{
	mysqli_query ($link, "INSERT INTO `t_comms` (`mast_id`,`user_id`,`pole_nm`,`comm_bl`,`data`) VALUES ('{$dt_cm}','{$_SESSION['u_id']}','{$dt_ya}','{$dt_tx}','{$dt_dt}')");

	$mn_commt = mysqli_query($link, "SELECT * FROM `t_comms` WHERE mast_id='{$dt_cm}' and pole_nm='comm_gen' ORDER BY id DESC");
	while($mn_temp = mysqli_fetch_array($mn_commt)){
	$comm_text = $mn_temp['comm_bl'];
	$comm_uid = $mn_temp['user_id'];
	$comm_dt = $mn_temp['data'];
	$temp_uid = mysqli_query($link, "SELECT id,login FROM `t_users` WHERE id='{$comm_uid}'");
	$temp_tk = mysqli_fetch_array($temp_uid);
	$u_prof = $temp_tk['login'];
	echo'
	<div class="comm_bl">
		<div class="input-group mb-3">
			<div class="container text-start">
				<div class="row">
					<div class="col-3">
						<text class="user-name">'.$u_prof.'</text>
					</div>
					<div class="col-9">
						'.$comm_dt.'
					</div>
				</div>
			</div>
		</div>
		<div class="input-group mb-3">
			<div>'.$comm_text.'</div>
		</div>
	</div>';
	}
}
if($dt_pr == 'add_acom')
{
	mysqli_query ($link, "INSERT INTO `t_comms` (`mast_id`,`user_id`,`pole_nm`,`comm_bl`,`data`) VALUES ('{$dt_cm}','{$_SESSION['u_id']}','{$dt_ya}','{$dt_tx}','{$dt_dt}')");

	$mn_commt = mysqli_query($link, "SELECT * FROM `t_comms` WHERE mast_id='{$dt_cm}' and pole_nm='comm_adr' ORDER BY id DESC");
	while($mn_temp = mysqli_fetch_array($mn_commt)){
	$comm_text = $mn_temp['comm_bl'];
	$comm_uid = $mn_temp['user_id'];
	$comm_dt = $mn_temp['data'];
	$temp_uid = mysqli_query($link, "SELECT id,login FROM `t_users` WHERE id='{$comm_uid}'");
	$temp_tk = mysqli_fetch_array($temp_uid);
	$u_prof = $temp_tk['login'];
	echo'
	<div class="comm_bl">
		<div class="input-group mb-3">
			<div class="container text-start">
				<div class="row">
					<div class="col-3">
						<text class="user-name">'.$u_prof.'</text>
					</div>
					<div class="col-9">
						'.$comm_dt.'
					</div>
				</div>
			</div>
		</div>
		<div class="input-group mb-3">
			<div>'.$comm_text.'</div>
		</div>
	</div>';
	}
}
if($dt_pr == 'add_tcom')
{
	mysqli_query ($link, "INSERT INTO `t_comms` (`mast_id`,`user_id`,`pole_nm`,`comm_bl`,`data`) VALUES ('{$dt_cm}','{$_SESSION['u_id']}','{$dt_ya}','{$dt_tx}','{$dt_dt}')");

	$mn_commt = mysqli_query($link, "SELECT * FROM `t_comms` WHERE mast_id='{$dt_cm}' and pole_nm='comm_tel' ORDER BY id DESC");
	while($mn_temp = mysqli_fetch_array($mn_commt)){
	$comm_text = $mn_temp['comm_bl'];
	$comm_uid = $mn_temp['user_id'];
	$comm_dt = $mn_temp['data'];
	$temp_uid = mysqli_query($link, "SELECT id,login FROM `t_users` WHERE id='{$comm_uid}'");
	$temp_tk = mysqli_fetch_array($temp_uid);
	$u_prof = $temp_tk['login'];
	echo'
	<div class="comm_bl">
		<div class="input-group mb-3">
			<div class="container text-start">
				<div class="row">
					<div class="col-3">
						<text class="user-name">'.$u_prof.'</text>
					</div>
					<div class="col-9">
						'.$comm_dt.'
					</div>
				</div>
			</div>
		</div>
		<div class="input-group mb-3">
			<div>'.$comm_text.'</div>
		</div>
	</div>';
	}
}
if($dt_pr == 'add_dscom')
{
	mysqli_query ($link, "INSERT INTO `t_comms` (`mast_id`,`user_id`,`pole_nm`,`comm_bl`,`data`) VALUES ('{$dt_cm}','{$_SESSION['u_id']}','{$dt_ya}','{$dt_tx}','{$dt_dt}')");

	$mn_commt = mysqli_query($link, "SELECT * FROM `t_comms` WHERE mast_id='{$dt_cm}' and pole_nm='comm_desc' ORDER BY id DESC");
	while($mn_temp = mysqli_fetch_array($mn_commt)){
	$comm_text = $mn_temp['comm_bl'];
	$comm_uid = $mn_temp['user_id'];
	$comm_dt = $mn_temp['data'];
	$temp_uid = mysqli_query($link, "SELECT id,login FROM `t_users` WHERE id='{$comm_uid}'");
	$temp_tk = mysqli_fetch_array($temp_uid);
	$u_prof = $temp_tk['login'];
	echo'
	<div class="comm_bl">
		<div class="input-group mb-3">
			<div class="container text-start">
				<div class="row">
					<div class="col-3">
						<text class="user-name">'.$u_prof.'</text>
					</div>
					<div class="col-9">
						'.$comm_dt.'
					</div>
				</div>
			</div>
		</div>
		<div class="input-group mb-3">
			<div>'.$comm_text.'</div>
		</div>
	</div>';
	}
}
}
else{
header("Location: /");exit;
}
?>