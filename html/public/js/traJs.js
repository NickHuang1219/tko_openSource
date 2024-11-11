let Counties = null;
let Trastationd = null;
let requStation = null;

function intos(str){
	if(str=='go'){
		$('#go').css('display','inline');
		$('#back').css('display','none');
		$('#g').css('color','#0014ff');
		$('#b').css('color','#505050');
	}
	if(str=='back'){
		$('#go').css('display','none');
		$('#back').css('display','inline');
		$('#g').css('color','#505050');
		$('#b').css('color','#0014ff');
	}
}

function createBtn(id){
	$("#Mline").empty();
	$("#TRABtn").empty();
	DOMS = '<div class="row justify-content-md-center" style="margin-top:3vh;text-align:center;"><div class="col col-lg-2">';
	DOMS1 = '</div><div class="col col-lg-2">';
	DOMS2 = '</div></div>';
	stationToday='stationToday';
	stationNow='stationNow';
	stationTodayBtn = '<button type="button" class="btn btn-primary btn-sm" onclick="queD('+stationToday+', '+id+')">本日列車</button>';
	stationNowBtn = '<button type="button" class="btn btn-primary btn-sm" onclick="queD('+stationNow+', '+id+')">即時動態</button>';
	All = DOMS+stationTodayBtn+DOMS1+stationNowBtn+DOMS2;
	$("#TRABtn").append(All);
}

function loadingUI(str){
	$("#"+str).empty();
	$("#Err").empty();
	$("#"+str).append('<div class="container" style="padding-top:10%;padding-bottom:3vh;height:50%;font-size:2vh;"><div class="spinner-border" role="status" style="color:#5a5a5c;width:5vh;height:5vh;"></div><div style="color:#5a5a5c;padding-top:1vh;font-size:2.5vh;">請稍後...</div></div>');
}
function queD(queStr, id){
	requStation = queStr;
	this.loadingUI('Mline');
	this.queDs(queStr, id);
}
function queDs(queStr, id){
	let dom = '<div class="row justify-content-md-center" style="text-align:center;padding-top:1.5vh;"><div class="col col-lg-2" style="color:#000;font-size:3vh;" onclick=intos("go")><a href="#" style="text-decoration:none;color:#0014ff;" id="g">順&nbsp;&nbsp;行</a></div><div class="col col-lg-2" style="color:#000;font-size:3vh;" onclick=intos("back")><a href="#" style="text-decoration:none;color:#505050;" id="b">逆&nbsp;&nbsp;行</a></div>';
	let go = '<div id="go" style="margin-top:1vh;">';//</div>
	let back = '<div id="back" style="margin-top:1vh;display:none;">';
	let endDiv = '</div>';
	let domEnd = '</div>';
	let noDS = '<div class="row" style="margin:5vh 0;"><div class="col"></div>';
	let noDC = '<div class="col-10" style="text-align:center;font-size:2.8vh;color:#f00;">';
	let noDE = '</div><div class="col"></div></div>';
	let todayTi = '<div style="font-size:2.8vh;text-align:center;margin-bottom:1.5vh;">';
	let errDiv = '<div style="text-align:center;margin-top:3vh;color:#f00;font-size:2.5vh;">';
	jQuery.ajax({
		method: "GET",
		charset:"utf-8",
		cache:"true",
		dataType: "json",
		async:true,
		url: "/TaiwanTRA/TRAD/"+queStr+"/"+id+"/P",
		success: function(Data){
			if(Data.type=='success'){
				if(queStr=='stationNow'){
					Now = '';
					if(Data.stationNow!=''){
						Now += '<div style="font-size:2.8vh;text-align:center;padding:1.5vh 0;">列車即時動態.</div>';
						Data.stationNow.forEach(d =>{
							Now += '<div class="row justify-content-md-center"><div class="col"></div>';
							Now += '<div class="col-10" align=left style="font-size:2.25vh;">--- '+d.ArrivalTime+' ---</div>';
							Now += '<div class="col"></div></div>';
							Now += '<div class="row"><div class="col"></div>';
							Now += '<div class="col-10" align=left style="font-size:2vh;">車次: '+d.TrainNo+'</div><div class="col"></div></div>';
							Now += '<div class="row"><div class="col"></div>';
							Now += '<div class="col-10" align=left style="font-size:2vh;">開往: '+d.GO+' - '+d.TrainTypeNameTW+'</div><div class="col"></div></div>';
							Now += '<div class="row"><div class="col"></div>';
							Now += '<div class="col-10" align=left style="font-size:2vh;">經由: '+d.TripLine+'</div><div class="col"></div>';
							Now += '</div><div class="row"><div class="col"></div>';
							Now += '<div class="col-10" align=left style="font-size:2vh;">狀態: <font color="'+d.color+'" >●'+d.RunningStatus+'&nbsp;&nbsp;'+d.DelayTime+'</font></div>';
							Now += '<div class="col"></div></div><br>';//</div>
						});
					}
					else{
						Now += '<div style="font-size:2.8vh;text-align:center;padding:1.5vh 0;">--- 無列車進站資訊. ---</div>';
					}
					if(requStation==queStr){
						$("#Mline").empty();
						$("#Mline").append(Now);
					}
					else{ $("#Mline").empty(); }
				}
				else if(queStr=='stationToday'){
					Today = '';
					togo = '';
					toback = '';
					if(Data.DS=='' && Data.DN==''){
						let noD = '<div class="col-10" align=center style="padding:10vh 0;font-size:2.8vh; width:90%;">';
						let noE = '<div>';
						Today = dom+go+noDS+noDC+"無順行列車停靠"+noDE+endDiv+back+noDS+noDC+"無逆行列車停靠"+noDE+endDiv+endDiv;
						if(requStation==queStr){
							$("#Mline").empty();
							$("#Mline").append(Today);
						}
					}
					else{
						Today = dom+go;
						if(Data.DN!=''){
							dn=Data.DN;
							togo += todayTi+'本日順行車次'+endDiv;
							dn.forEach(d =>{
								togo += '<div class="row" style="padding-bottom:3vh;color:#0d6efd;"><div class="col"></div>';
								togo += '<div class="col-10" align=left onclick=TraStatus("'+d.TrainNo+'") style="background:#fff;padding-top:.3vh;padding-bottom:.3vh;border-color:#d0d0d0;border-width:0.2vh;border-style:solid;border-radius:0.5vh;")><a style="text-decoration:none;">'+d.ArrivalTime+'&emsp;開往: '+d.DestinationStationNameTW+'&nbsp;&nbsp;車次: '+d.TrainNo+'<br>'+d.TrainTypeNameTW+'<div id='+d.TrainNo+' style="margin-top:.3vh"></div></div><div class="col"></div></a></div>';
							});
						}
						else{
							togo += noDS+noDC+'無列車順行停靠資訊.'+noDE;
						}
						Today += togo+endDiv+back;
						if(Data.DS!=''){
							ds=Data.DS;
							toback += todayTi+'本日逆行車次'+endDiv;
							ds.forEach(d =>{
								toback += '<div class="row" style="padding-bottom:3vh;color:#0d6efd;"><div class="col"></div>';
								toback += '<div class="col-10" align=left onclick=TraStatus("'+d.TrainNo+'") style="background:#fff;padding-top:.3vh;padding-bottom:.3vh;border-color:#d0d0d0;border-width:0.2vh;border-style:solid;border-radius:0.5vh;")><a style="text-decoration:none;">'+d.ArrivalTime+'&emsp;開往: '+d.DestinationStationNameTW+'&nbsp;&nbsp;車次: '+d.TrainNo+'<br>'+d.TrainTypeNameTW+'<div id='+d.TrainNo+' style="margin-top:.3vh"></div></div><div class="col"></div></a></div>';
							});
						}
						else{
							toback += noDS+noDC+'無列車逆行停靠資訊.'+noDE;
						}
						Today += toback+endDiv+endDiv;
						if(requStation==queStr){
							$("#Mline").empty();
							$("#Mline").append(Today);
						}
					}
				} 
			}
			else{
				let errTe = '';
				console.log('Data.errT:'+Data.errT)
				// dom+go+noDS+noDC+Data.errT+noDE+endDiv+back+noDS+noDC+Data.errT+noDE+endDiv+endDiv
				errTe = Data.errT==undefined?'台鐵伺服器異常.':Data.errT;
				if(requStation==queStr){
					$("#Mline").empty();
					$("#Err").append(errDiv+errTe+endDiv);
				}
			}
		},
		error: function(xhr, ajaxOptions, thrownError){
			$("#Mline").empty();
			$("#Err").append(errDiv+'伺服器異常.'+endDiv);
		}
	});
}

function TraStatus(TrainNo){
	$("#"+TrainNo).empty();
	$("#"+TrainNo).append('<div class="spinner-border" role="status" style="color:#5a5a5c;width:3vh;height:3vh;font-size:1.3vh;"></div><div style="color:#5a5a5c;padding-top:1vh;font-size:2.3vh;">請稍後...</div>');
	jQuery.ajax({
		method: "GET",
		charset:"utf-8",
		cache:"true",
		dataType: "json",
		async:true,
		url: "/TaiwanTRA/TrainStatus/"+TrainNo,
		success: function(Data){
			if(Data.type=='success'){
				$("#"+TrainNo).empty();
				$("#"+TrainNo).append('<span style="color:'+Data.RunningStatusColor+';">'+Data.RunningStatus+'&emsp;'+Data.TrainStatusD.statusD+'</span>');
			}
			else{
				$("#"+TrainNo).empty();
				$("#"+TrainNo).append('<span style="color:'+Data.RunningStatusColor+';">'+Data.errT+'</span>');
			}
		},
		error: function(xhr, ajaxOptions, thrownError){
				$("#"+TrainNo).empty();
				$("#"+TrainNo).append('伺服器異常.');
		}
	});
}




function TD(id){
	$("#TRABtn").empty();
	$("#Mline").empty();
	jQuery.ajax({
		method: "GET",
		charset:"utf-8",
		cache:"true",
		dataType: "json",
		async:false,
		url: "/public/TaiwanTRA/Trastationd/0"+id,
		success:function(Data){
			Trastationd = '<select onchange="createBtn(this.value)" class="btn btn-outline-primary" style="text-align:left;">'
			Trastationd += '<option value="z" selected>請 選 站 別</option>'
			Data.forEach(d=>{
				Trastationd += '<option value="'+d["StationID"]+'">'+d["StationNameTW"]+'</option>'
			});
			Trastationd += '</select>';
			$("#Trastationd").empty();
			$("#Trastationd").append(Trastationd);
		},
		error: function(xhr, ajaxOptions, thrownError){
			$("#Mline").append('<div style="font-color:#000;">資料錯誤...</div>');
		}
	});
	// */
}

$(function(){
	$("#gotop").click(function(){
		$("html,body").animate({scrollTop:0}, 900);
		return false;
	});
});