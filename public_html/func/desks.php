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
$dt_pr = $_POST['val0']; //действие desk_man
//$dt_ya = $_POST['val1']; //компания 1
$dt_dt = date("H:i d-m-Y"); //дата
if(@$_POST['val1']){$dt_ya = $_POST['val1'];}


if($dt_pr == 'desk_upn'){ //name
	$dd_upd = mysqli_query($link, "SELECT 1 FROM `t_comms` WHERE mast_id='{$dt_ya}' and pole_nm='comm_name'");
	$dd_rst = mysqli_fetch_array($dd_upd);
	if($dd_rst){
		$mn_commt = mysqli_query($link, "SELECT * FROM `t_comms` WHERE mast_id='{$dt_ya}' and pole_nm='comm_name' ORDER BY id DESC");
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
if($dt_pr == 'desk_upi'){
	$dd_upd = mysqli_query($link, "SELECT 1 FROM `t_comms` WHERE mast_id='{$dt_ya}' and pole_nm='comm_inn'");
	$dd_rst = mysqli_fetch_array($dd_upd);
	if($dd_rst){
		$mn_commt = mysqli_query($link, "SELECT * FROM `t_comms` WHERE mast_id='{$dt_ya}' and pole_nm='comm_inn' ORDER BY id DESC");
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
if($dt_pr == 'desk_upg'){
	$dd_upd = mysqli_query($link, "SELECT 1 FROM `t_comms` WHERE mast_id='{$dt_ya}' and pole_nm='comm_gen'");
	$dd_rst = mysqli_fetch_array($dd_upd);
	if($dd_rst){
		$mn_commt = mysqli_query($link, "SELECT * FROM `t_comms` WHERE mast_id='{$dt_ya}' and pole_nm='comm_gen' ORDER BY id DESC");
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
if($dt_pr == 'desk_upa'){
	$dd_upd = mysqli_query($link, "SELECT 1 FROM `t_comms` WHERE mast_id='{$dt_ya}' and pole_nm='comm_adr'");
	$dd_rst = mysqli_fetch_array($dd_upd);
	if($dd_rst){
		$mn_commt = mysqli_query($link, "SELECT * FROM `t_comms` WHERE mast_id='{$dt_ya}' and pole_nm='comm_adr' ORDER BY id DESC");
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
if($dt_pr == 'desk_upt'){
	$dd_upd = mysqli_query($link, "SELECT 1 FROM `t_comms` WHERE mast_id='{$dt_ya}' and pole_nm='comm_tel'");
	$dd_rst = mysqli_fetch_array($dd_upd);
	if($dd_rst){
		$mn_commt = mysqli_query($link, "SELECT * FROM `t_comms` WHERE mast_id='{$dt_ya}' and pole_nm='comm_tel' ORDER BY id DESC");
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
if($dt_pr == 'desk_upd'){
	$dd_upd = mysqli_query($link, "SELECT 1 FROM `t_comms` WHERE mast_id='{$dt_ya}' and pole_nm='comm_desc'");
	$dd_rst = mysqli_fetch_array($dd_upd);
	if($dd_rst){
		$mn_commt = mysqli_query($link, "SELECT * FROM `t_comms` WHERE mast_id='{$dt_ya}' and pole_nm='comm_desc' ORDER BY id DESC");
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
if($dt_pr == 'desk_man'){
	$dd_upd = mysqli_query($link, "SELECT id FROM `t_comms` WHERE mast_id='{$dt_ya}' and pole_nm='comm_all'");
	$dd_rst = mysqli_fetch_array($dd_upd);
	if($dd_rst){
		$dmn_commt = mysqli_query($link, "SELECT * FROM `t_comms` WHERE mast_id='{$dt_ya}' and pole_nm='comm_all' ORDER BY id DESC");
		while($dmn_temp = mysqli_fetch_array($dmn_commt)){
		$dcomm_text = $dmn_temp['comm_bl'];
		$dcomm_uid = $dmn_temp['user_id'];
		$dcomm_dt = $dmn_temp['data'];
		$dtemp_uid = mysqli_query($link, "SELECT id,login FROM `t_users` WHERE id='{$dcomm_uid}'");
		$dtemp_tk = mysqli_fetch_array($dtemp_uid);
		$du_prof = $dtemp_tk['login'];
		echo'
		<div class="comm_bl">
			<div class="input-group mb-3">
				<div class="container text-start">
					<div class="row">
						<div class="col-3">
							<text class="user-name">'.$du_prof.'</text>
						</div>
						<div class="col-9">
							'.$dcomm_dt.'
						</div>
					</div>
				</div>
			</div>
			<div class="input-group mb-3">
				<div>'.$dcomm_text.'</div>
			</div>
		</div>';
		}
	}
}

}
else{
header("Location: /");exit;
}
?>