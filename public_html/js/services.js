$(document).ready(function(){

	$("#man_com").focus(function(){$('#man_com').removeClass('atte');});
	$("#nm_pcom").focus(function(){$('#nm_pcom').removeClass('atte');});
	$("#im_pcom").focus(function(){$('#im_pcom').removeClass('atte');});
	$("#gm_pcom").focus(function(){$('#gm_pcom').removeClass('atte');});
	$("#am_pcom").focus(function(){$('#am_pcom').removeClass('atte');});
	$("#tm_pcom").focus(function(){$('#tm_pcom').removeClass('atte');});
	$("#dsm_pcom").focus(function(){$('#dsm_pcom').removeClass('atte');});
		
	$('#adl_comp').on('click', function(){ //Обработчик общих комментариев
		var pr_op = 'add_mancom';
		var pr_ya = $('#hrow').val(); //получаем параметр, что это основная запись ячейка
		var pr_tx = $('#man_com').val(); //текст комментария
		var pr_cm = comp_pg; //что за компания ?
		if(pr_tx){
			$.ajax({
				type: 'post', 
				url: "/func/bridge.php", 
				data: ({
					val0: pr_op,
					val1: pr_ya,
					val2: pr_tx,
					val3: pr_cm,
				}),
				success: function(html){
					$('#man_com').val('');
					$("#blk_com").html(html);
				}
			})
		}else{
			$('#man_com').toggleClass('atte');
		}
	});
	$('#add_ncomp').on('click', function(){ //ajax для названия компании
		var pr_op = 'add_ncom';
		var pr_ya = $('#nmrow').val(); //получаем параметр, что это comm к названию
		var pr_tx = $('#nm_pcom').val(); //текст комментария
		var pr_cm = comp_pg; //что за компания ?
		if(pr_tx){
		$.ajax({
			type: 'post', 
			url: "/func/bridge.php", 
			data: ({
				val0: pr_op,
				val1: pr_ya,
				val2: pr_tx,
				val3: pr_cm,
			}),
			/*beforeSend: function(){
                $(".s1").html('<div class="ld_win"><div class="sub_w"><div class="spinner-border text-dark" role="status" style=""><span class="visually-hidden">Loading...</span></div></div></div>');
            },*/
			success: function(html){
				$("#bl_ncom").html(html);
				var vb_blok = $('#nm_pcom').parent().parent().parent();
				vb_blok.addClass('inactive');
				$('#nm_pcom').val('');
				var te_childs = $("#bl_ncom").children('.comm_bl').length;
				$("#sch_na").text(te_childs);
				
			}
		})
		}else{
			$('#nm_pcom').toggleClass('atte');
		}
	});
	$('#add_icomp').on('click', function(){ //ajax для ИНН компании
		var pr_op = 'add_icom';
		var pr_ya = $('#imrow').val(); //получаем параметр, что это comm к inn
		var pr_tx = $('#im_pcom').val(); //текст комментария
		var pr_cm = comp_pg; //что за компания ?
		if(pr_tx){
		$.ajax({
			type: 'post', 
			url: "/func/bridge.php", 
			data: ({
				val0: pr_op,
				val1: pr_ya,
				val2: pr_tx,
				val3: pr_cm,
			}),
			success: function(html){
				$("#bl_icom").html(html);
				var vb_blok = $('#im_pcom').parent().parent().parent();
				vb_blok.addClass('inactive');
				$('#im_pcom').val('');
				var te_childs = $("#bl_icom").children('.comm_bl').length;
				$("#sch_in").text(te_childs);
			}
		})
		}else{
			$('#im_pcom').toggleClass('atte');
		}
	});
	$('#add_gcomp').on('click', function(){ //ajax для ген. дира компании
		var pr_op = 'add_gcom';
		var pr_ya = $('#gmrow').val(); //получаем параметр, что это comm к гендиру
		var pr_tx = $('#gm_pcom').val(); //текст комментария
		var pr_cm = comp_pg; //что за компания ?
		if(pr_tx){
		$.ajax({
			type: 'post', 
			url: "/func/bridge.php", 
			data: ({
				val0: pr_op,
				val1: pr_ya,
				val2: pr_tx,
				val3: pr_cm,
			}),
			success: function(html){
				var vb_blok = $('#gm_pcom').parent().parent().parent();
				vb_blok.addClass('inactive');
				$("#bl_gcom").html(html);
				$('#gm_pcom').val('');
				var te_childs = $("#gm_pcom").children('.comm_bl').length;
				$("#sch_ge").text(te_childs);
			}
		})
		}else{
			$('#gm_pcom').toggleClass('atte');
		}
	});
	$('#add_acomp').on('click', function(){ //ajax для адреса компании
		var pr_op = 'add_acom';
		var pr_ya = $('#amrow').val(); //получаем параметр, что это comm к адресу
		var pr_tx = $('#am_pcom').val(); //текст комментария
		var pr_cm = comp_pg; //что за компания ?
		if(pr_tx){
		$.ajax({
			type: 'post', 
			url: "/func/bridge.php", 
			data: ({
				val0: pr_op,
				val1: pr_ya,
				val2: pr_tx,
				val3: pr_cm,
			}),
			success: function(html){
				var vb_blok = $('#am_pcom').parent().parent().parent();
				vb_blok.addClass('inactive');
				$('#am_pcom').val('');
				$("#bl_acom").html(html);
				var te_childs = $("#bl_acom").children('.comm_bl').length;
				$("#sch_ad").text(te_childs);
			}
		})
		}else{
			$('#am_pcom').toggleClass('atte');
		}
	});
	$('#add_tcomp').on('click', function(){ //ajax для телефона компании
		var pr_op = 'add_tcom';
		var pr_ya = $('#tmrow').val(); //получаем параметр, что это comm к адресу
		var pr_tx = $('#tm_pcom').val(); //текст комментария
		var pr_cm = comp_pg; //что за компания ?
		if(pr_tx){
		$.ajax({
			type: 'post', 
			url: "/func/bridge.php", 
			data: ({
				val0: pr_op,
				val1: pr_ya,
				val2: pr_tx,
				val3: pr_cm,
			}),
			success: function(html){
				var vb_blok = $('#tm_pcom').parent().parent().parent();
				vb_blok.addClass('inactive');
				$('#tm_pcom').val('');
				$("#bl_tcom").html(html);
				var te_childs = $("#bl_tcom").children('.comm_bl').length;
				$("#sch_te").text(te_childs);
			}
		})
		}else{
			$('#tm_pcom').toggleClass('atte');
		}
	});
	$('#add_dcomp').on('click', function(){ //ajax для описания компании
		var pr_op = 'add_dscom';
		var pr_ya = $('#dsmrow').val(); //получаем параметр, что это comm к описанию
		var pr_tx = $('#dsm_pcom').val(); //текст комментария
		var pr_cm = comp_pg; //что за компания ?
		if(pr_tx){
		$.ajax({
			type: 'post', 
			url: "/func/bridge.php", 
			data: ({
				val0: pr_op,
				val1: pr_ya,
				val2: pr_tx,
				val3: pr_cm,
			}),
			success: function(html){
				$("#bl_dscom").html(html);
				var vb_blok = $('#dsm_pcom').parent().parent().parent();
				vb_blok.addClass('inactive');				
				$('#dsm_pcom').val('');
				//$("#sch_te").load(location.href + " #sch_te"); рабочий вар но с задержкой
				var ds_childs = $("#bl_dscom").children('.comm_bl').length;
				$("#sch_ds").text(ds_childs);
			}
		})
		}else{
			$('#dsm_pcom').toggleClass('atte');
		}
	});
	setInterval(up_comm, 10000);
	function up_comm(){ //ajax для проверки новых комов
		var pr_op = 'lnew_com';
			$.ajax({
				type: 'post', 
				url: "/func/data.php", 
				data: ({
					val0: pr_op,
				}),
				success: function(html){
					$(".man_block").html(html);
					$(".btn_cls").on('click', function(){ $(".man_block").children().remove();});
				}
			})
	}
});