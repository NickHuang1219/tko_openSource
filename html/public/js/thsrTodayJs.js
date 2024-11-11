let span = '<span style="color:red;font-size:1.9vh;">';
let spanE = '</span>';
function queD(){
	loadingUI('.myUI');
	this.queDs();
}
function queDs(){
	let stationID=$('#stationID').val();
	let dom = '<div class="row justify-content-md-center" style="text-align:center;padding-top:1.5vh;"><div class="col col-lg-2" style="color:#000;font-size:3vh;" onclick=intos("go","thsr")><a style="text-decoration:none;color:#FF8040;" id="g">北&nbsp;&nbsp;上</a></div><div class="col col-lg-2" style="color:#000;font-size:3vh;" onclick=intos("back","thsr")><a style="text-decoration:none;color:#505050;" id="b">南&nbsp;&nbsp;下</a></div>';
	let go = '<div id="go" style="margin-top:2.5vh;text-align:center;">';
	let back = '<div id="back" style="margin-top:2.5vh;display:none;text-align:center;">';
	let endDiv = '</div>';
	let domEnd = '</div>';
	let noDS = '<div class="row" style="margin:5vh 0;"><div class="col"></div>';
	let noDC = '<div class="col-10" style="text-align:center;font-size:2.8vh;color:#f00;">';
	let noDE = '</div><div class="col"></div></div>';
	let todayTi = '<div style="font-size:2.8vh;text-align:center;margin-bottom:1.5vh;">';
	let Today = '';
	let togo = '';
	let toback = '';
	let errDiv = '<div style="text-align:center;margin-top:3vh;color:#f00;font-size:2.5vh;">';
	if(stationID!=''){
		emptyD('#Mline');
		loadingUI('.myUI');
		jQuery.ajax({
			method: "GET",
			charset:"utf-8",
			cache:"true",
			dataType: "json",
			async:true,
			url: "/stationToday/"+stationID,
			success: function(Data){
				Now = '';
				// console.log(Data)
				if(Data.type!=undefined&&(Data.type=='success'||(Data.N.length>0||Data.S.length>0))){
					if((Data.N==''&&Data.S=='')||(Data.N.length<1&&Data.S.length<1)){
						let noD = '<div class="col-10" align=center style="padding:10vh 0;font-size:2.8vh; width:90%;">';
						let noE = '<div>';
						Today = dom+go+noDS+noDC+"無北上列車停靠"+noDE+endDiv+back+noDS+noDC+"無南下列車停靠"+noDE+endDiv+endDiv;
						if(requStation==queStr){
							$("#Mline").empty();
							$("#Mline").append(Today);
							emptyD(".myUI");
						}
					}
					else{
						Today = dom+go;
						if(Data.N!=''){
							dn=Data.N;
							// togo += todayTi+'本日北上車次'+endDiv;
							togo += gobackDom(Data.N);
						}
						else{
							togo += noDS+noDC+'無列車北上停靠資訊.'+noDE;
						}
						Today += togo+endDiv+back;
						if(Data.S!=''){
							ds=Data.S;
							// toback += todayTi+'本日南下車次'+endDiv;
							toback += gobackDom(Data.S);
						}
						else{
							toback += noDS+noDC+'無列車南下停靠資訊.'+noDE;
						}
						Today += toback+endDiv+endDiv;
					}
				}
				else{ Today += dom+go+noDS+noDC+'無列車北上停靠資訊.'+noDE+togo+endDiv+back+noDS+noDC+'無列車南下停靠資訊.'+noDE+endDiv+endDiv; }
				$("#Mline").empty();
				$("#Mline").append(Today);
				emptyD(".myUI");
			},
			error: function(xhr, ajaxOptions, thrownError){
				// let Err = '<div class="row justify-content-md-center alert alert-danger"><div class="col-12">無網路、伺服器異常.</div></div>';
				let Err = errDiv+'無網路、伺服器異常.'+endDiv;
				emptyD('#Mline');
				showD('#Mline', Err);
				emptyD('.myUI');
	
			}
		});
	}
	else{
		let Err = '<div class="row justify-content-md-center alert alert-danger"><div class="col-12" style="color:#000;">請選擇站台.</div></div>';
		emptyD('#Mline');
		showD('#Mline', Err);
		emptyD('.myUI');
	}
}

function gobackDom(obj){
	let objDom = '';
	obj.forEach(d =>{
		let code = d.TrainStatusCode==0?'':'';
		let conn = d.TrainStatusCode==0?span+'(駛離)'+spanE:'';
		objDom += '<div class="row justify-content-center align-self-center" style="padding-bottom:2.5vh;">';
		objDom += '<div class="col-10" align=left onclick=ThsrStatus("'+d.TrainNo+'",'+d.TrainStatusCode+') style="background:#fff;padding-top:1vh;padding-bottom:1vh;border-color:#656464;border-width:0.17vh;border-style:solid;border-radius:0.5vh;color:#FF9224;font-size:2vh;")>'+d.DepartureTime+'&emsp;&nbsp;<br>'+d.StartingStationNameTW+'-'+d.EndingStationNameTW+'&emsp;&nbsp;車次: '+d.TrainNo+'&nbsp;&nbsp;'+conn+'<br><div id='+d.TrainNo+' style="margin-top:.3vh"></div></div></div>';
	});
	return objDom;
}
function ThsrStatus(No,type){
	return ; 
	if(type==1||type==2){}
	else{ console.log('---'); showD('#'+No,span+'無法查詢'+spanE); }
}

$(function(){
	$("#gotop").click(function(){
		$("html,body").animate({scrollTop:0}, 900);
		return false;
	});
});