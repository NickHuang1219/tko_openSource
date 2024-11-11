function Toback(){
	$('#S1').css('display','none');
	$('#S2').css('display','inline');
}

function Togo(){
	$('#S1').css('display','inline');
	$('#S2').css('display','none');
}
function loadingUI(){
	return '<div style="padding-top:10%;"><div class="spinner-border" role="status" style="color:#fff;font-size:2vh;"></div><div style="color:#fff;padding-top:1vh;font-size:2.5vh;">請稍後...</div></div>';
}
function regetbustime(id){//即時動態重新整理
    this.closeBtn();
    $('#togo').empty();
	$('#togo').append('<div style="padding-top:10%;"><div class="spinner-border" role="status" style="color:#fff;font-size:2vh;"></div><div style="color:#fff;padding-top:1vh;font-size:2.5vh;">請稍後...</div></div>');
	$('#toback').empty();
	$('#toback').append('<div style="padding-top:10%;"><div class="spinner-border" role="status" style="color:#fff;font-size:2vh;"></div><div style="color:#fff;padding-top:1vh;font-size:2.5vh;">請稍後...</div></div>');
	let bus = '';
	bus = this.bustime(id);
	this.openBtn();
}
function closeBtn(){
   	$('#share_up').css({'display':'none',});
}
function openBtn(){
  	$('#share_up').css({'display':'flex',});
}
function bustime(id){//即時動態重新整理
    jQuery.ajax({
		method: "GET",
		charset:"utf-8",
		cache:"true",
		dataType: "json",
		async:true,
		url: "/public/reGetBusTime/"+id+'/P',
		success : function(data) { 
			let go;
			let back;
			if(data.conn!=undefined){
				let title='<table style="float:center; width:100%;" style="color:#000;"><tr><td style="width:25%;"><span style="color:#FFF;">狀態</span></td><td style="width:55%;"><span style="color:#FFF;">站牌名稱</span></td><td style="width:20%;" align="right"><span style="color:#FFF;">車牌</td></span></tr>';
				if(data.conn.togo!=''){
					go=title;
				   	data.conn.togo.forEach(conn=>{
						go+='<tr><td style="width:25%;"><span style="color:#FFF;font-size:1.9vh;">'+conn.time+'</span></td><td style="width:55%;"><span style="color:#FFF;font-size:55%*95%;">'+conn.StopName+'</span></td><td style="width:20%;" align="right"><span style="color:#FFF;font-size:80%;">'+conn.busCarId+'</td></span></tr>';
					});
					go+='</table>';
					$('#togo').empty();
					$('#togo').append(go);
				}
				else{
					$('#togo').empty();
					$('#togo').append('<div style="color:#FFF;margin-top:5vh;font-size:3.5vh;">無去程</div>');
				}
				if(data.conn.toback!=''){
					back=title;
				   	data.conn.toback.forEach(conn=>{
						back+='<tr><td style="width:25%;"><span style="color:#FFF;font-size:1.9vh;">'+conn.time+'</span></td><td style="width:55%;"><span style="color:#FFF;font-size:55%*95%;">'+conn.StopName+'</span></td><td style="width:20%;" align="right"><span style="color:#FFF;font-size:80%;">'+conn.busCarId+'</td></span></tr>';
					});
					back+='</table>';
					$('#toback').empty();
					$('#toback').append(back);
				}
				else{
					$('#toback').empty();
					$('#toback').append('<div style="color:#FFF;margin-top:5vh;font-size:3.5vh;">無返程</div>');
				}
				var timer = setTimeout(function(){ this.regetbustime(id); return ''; }, 20000);
			}
			else{
				$('#togo').empty();
				$('#toback').empty();
				let D = data.conn==undefined?'公車伺服器異常.':data.conn.errT;
				$('#togo').append('<div style="color:#FFF;margin-top:5vh;font-size:3.5vh;">'+D+'</div>');
				$('#toback').append('<div style="color:#FFF;margin-top:5vh;font-size:3.5vh;">'+D+'</div>');
			}
		},
        error: function(jqXHR, textStatus, errorThrown) {
			$('ToGo').empty();
			$('ToBack').empty();
			let E = '<div style="color:#FFF;margin-top:5vh;font-size:3.5vh;">連線異常...</div>';
			$('ToGo').append(E);
			$('ToBack').append(E);
		}
    });
    return 0;
}
function dad(d){
   	let da='';
   	d.forEach(conn=>{
		da+='<tr><td style="width:25%;"><span style="color:#FFF;font-size:1.9vh;">'+conn.coninT+'</span></td>';
		da+='<td style="width:55%;"><span style="color:#FFF;font-size:55%*95%;">'+conn.StopName+'</span></td>';
		da+='<td style="width:20%;" align="right"><span style="color:#FFF;font-size:80%;">'+conn.carId+'</td></span></tr>';
	});
	return da;
}
        
		