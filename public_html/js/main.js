document.addEventListener("DOMContentLoaded", function(event){ 
    btn_add = document.querySelector("#add_comp");
    frm_add = document.querySelector(".frm-add");
    frmc_add = document.querySelectorAll(".frmc-add");
    frm_com = document.querySelectorAll(".frm-com");
    btn_pls = document.querySelectorAll(".btn");
    cm_vis = document.querySelectorAll(".visio");
    //btn_closed = document.querySelector(".btn-close");
	hd_errfrm = document.querySelector(".err-mes");
	btn_mcom = document.querySelector("#adl_comp");


	/*if(btn_closed){
		btn_closed.addEventListener('click', e => {
			ParentForm = btn_closed.parentElement.parentElement;
			ParentForm.style.display = null;
		});
	}*/
	if(hd_errfrm){
		setTimeout(function hide_err(){
			hd_errfrm.remove();
			//hd_errfrm.style.display = null;
		}, 2000);
	}
	
	
	Array.from(btn_pls, el => el.addEventListener('click', e => {add_comform(e);}));//плюсики/минусики
	Array.from(cm_vis, el => el.addEventListener('click', e => {vis_comform(e);}));//комментарии

    function add_comform(e){
        btn_know = e.target;
        btn_prov = e.target.getAttribute('id');
		if(btn_prov){
			if(btn_prov == 'add_comp'){
				frm_add.classList.toggle('inactive');
			}
		}else{
			var obr = btn_know.classList.contains('plus');
			if(obr){
				btn_pr = btn_know.getAttribute('tag');
				var cont_s = document.querySelector(".s"+btn_pr);
				//var cont_c = document.querySelector(".c"+btn_pr);
				cont_s.classList.remove('inactive');
				//cont_c.classList.remove('inactive');
			}else{
				var mbr = btn_know.classList.contains('minus');
				if(mbr){
					btn_mr = btn_know.getAttribute('tag');
					var cont_s = document.querySelector(".s"+btn_mr);
					//var cont_c = document.querySelector(".c"+btn_mr);
					cont_s.classList.add('inactive');
					//cont_c.classList.add('inactive');					
				}
			}
		}
    }
	function vis_comform(e){
        com_know = e.target;
        com_kow = e.target.getAttribute('tag');
		var comt_c = document.querySelector(".c"+com_kow);
		comt_c.classList.toggle('inactive');
    }
});