<?php
echo'
<div class="row frmc-add s1 inactive">
    <div class="col align-self-start">
        <!--<form>-->  
            <div class="input-group mb-3">
                <label>Добавить Комментарий</label>
				<input type="hidden" value="comm_name" id="nmrow">
            </div>        
            <div class="input-group mb-3">
                <textarea class="form-control" placeholder="Основная информация" id="nm_pcom" aria-label="With textarea" required></textarea>
            </div>            
            <div class="input-group mb-3">
                <button type="submit" class="btn btn-dark" id="add_ncomp">Добавить</button>
            </div>
        <!--</form>-->
    </div>
</div>
';
echo'
<div class="row frm-com c1 inactive">
    <div class="col align-self-start"> 
		<div class="row">
			<div class="input-group mb-3">
				<label class="title-block">Комментарии</label>
			</div> 
        </div>';
	$pred_cm = mysqli_query($link, "SELECT id FROM `t_comms` WHERE mast_id='{$company_id}' and pole_nm='comm_name'");
	$pred_ct = mysqli_num_rows($pred_cm);
	if($pred_ct > 0){
	echo'<div class="row" id="bl_ncom">';
	$ymn_commt = mysqli_query($link, "SELECT * FROM `t_comms` WHERE mast_id='{$company_id}' and pole_nm='comm_name' ORDER BY id DESC");
	while($ymn_temp = mysqli_fetch_array($ymn_commt)){
	$ycomm_text = $ymn_temp['comm_bl'];
	$ycomm_ud = $ymn_temp['user_id'];
	$ycomm_dt = $ymn_temp['data'];
	$ytemp_uid = mysqli_query($link, "SELECT id,login FROM `t_users` WHERE id='{$ycomm_ud}'");
	$ytemp_tk = mysqli_fetch_array($ytemp_uid);
	$u_proft = $ytemp_tk['login'];
	echo'	
	<div class="comm_bl">
		<div class="input-group mb-3">
			<div class="container text-start">
				<div class="row">
					<div class="col-3">
						<text class="user-name">'.$u_proft.'</text>
					</div>
					<div class="col-9">'.$ycomm_dt.'</div>
				</div>
			</div>
		</div>
		<div class="input-group mb-3">
				<div>'.$ycomm_text.'</div>
		</div>
	</div>';
	}
echo'</div>';
}else{
	echo'
	<div class="row" id="bl_ncom">
		<label>Здесь пока никто не оставил свой комментарий.</label>
	</div>';
}
	echo'
    </div>
</div>
';
?>