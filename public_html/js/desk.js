$(document).ready(function(){
	setInterval(up_namk, 10000);
	function up_namk(){ //ajax update desks
		var pr_cm = comp_pg;
		if(pr_cm){
		
			$.ajax({
				type: 'post', 
				url: "/func/desks.php", 
				data: ({
					val0: 'desk_upn',
					val1: pr_cm,
				}),
				success: function(html){
					$("#bl_ncom").html(html);
				}
			});
		}
	}
	setInterval(up_innk, 20000);
	function up_innk(){
		var pr_cm = comp_pg;
		if(pr_cm){
			$.ajax({
				type: 'post', 
				url: "/func/desks.php", 
				data: ({
					val0: 'desk_upi',
					val1: pr_cm,
				}),
				success: function(html){
					$("#bl_icom").html(html);
				}
			});
		}
	}
	setInterval(up_genk, 20000);
	function up_genk(){
		var pr_cm = comp_pg;
		if(pr_cm){
			$.ajax({
				type: 'post', 
				url: "/func/desks.php", 
				data: ({
					val0: 'desk_upg',
					val1: pr_cm,
				}),
				success: function(html){
					$("#bl_gcom").html(html);
				}
			});
		}
	}
	setInterval(up_adrk, 20000);
	function up_adrk(){
		var pr_cm = comp_pg;
		if(pr_cm){
			$.ajax({ //address
				type: 'post', 
				url: "/func/desks.php", 
				data: ({
					val0: 'desk_upa',
					val1: pr_cm,
				}),
				success: function(html){
					$("#bl_acom").html(html);
				}
			});
		}
	}
	setInterval(up_telk, 20000);
	function up_telk(){
		var pr_cm = comp_pg;
		if(pr_cm){
			$.ajax({ //tell
				type: 'post', 
				url: "/func/desks.php", 
				data: ({
					val0: 'desk_upt',
					val1: pr_cm,
				}),
				success: function(html){
					$("#bl_tcom").html(html);
				}
			});
		}
	}
	setInterval(up_desk, 20000);
	function up_desk(){
		var pr_cm = comp_pg;
		if(pr_cm){
			$.ajax({ //desc
				type: 'post', 
				url: "/func/desks.php", 
				data: ({
					val0: 'desk_upd',
					val1: pr_cm,
				}),
				success: function(html){
					$("#bl_dscom").html(html);
				}
			});
		}
	}
	setInterval(up_mank, 20000);
	function up_mank(){
		var pr_cm = comp_pg;
		if(pr_cm){
			$.ajax({ //man desk
				type: 'post', 
				url: "/func/desks.php", 
				data: ({
					val0: 'desk_man',
					val1: pr_cm,
				}),
				success: function(html){
					$("#blk_com").html(html);
				}
			});
		}
	}
});