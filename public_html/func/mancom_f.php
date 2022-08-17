<?php
echo'
				<div class="row frm-com">
                        <div class="col align-self-start"> 
							<div class="row">
								<div class="input-group mb-3">
									<label class="title-block">Комментарии</label>
								</div> 
                            </div>';
							$mn_com = mysqli_query($link, "SELECT 1 FROM `t_comms` WHERE mast_id='{$company_id}' and pole_nm='comm_all'");
							$mn_comst = mysqli_fetch_array($mn_com);
							if($mn_comst){
							echo'<div class="row" id="blk_com">';
								$mn_commt = mysqli_query($link, "SELECT * FROM `t_comms` WHERE mast_id='{$company_id}' and pole_nm='comm_all' ORDER BY id DESC");
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
							echo'</div>';
							}else{
								echo'
								<div class="row" id="blk_com">
									<label>Здесь пока никто не оставил свой комментарий. Будьте первыми.</label>
								</div>';
								if (isset($_SESSION['u_id'])){}else{
									echo'
									<label>Авторизуйтесь.</label>';
								}
							}
						echo'
                        </div>
                </div>';
?>
