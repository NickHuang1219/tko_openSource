let span = '<span style="color:red;font-size:1.9vh;">';
let spanE = '</span>';
function queD(){
	loadingUI('.myUI');
	this.queDs();
}
function queDs(){
	let start=$('#start').val();
	let final=$('#final').val();
	let errDiv = '<div style="text-align:center;margin-top:3vh;color:#f00;font-size:2.5vh;">';
	let endDiv = '</div>';
	console.log(final);
	if((start!=''&&final!='')&&(start!=final)){
		emptyD('#Mline');
		loadingUI('.myUI');
		jQuery.ajax({
			method: "GET",
			charset:"utf-8",
			cache:"true",
			dataType: "json",
			async:true,
			url: "/thsrOD/"+start+"/"+final,
			success: function(Data){
				Now = '';
				let errS = Data.errT==""?"高鐵伺服器異常.":Data.errT;
				if(Data.type=='success'){
					let err = Data.errT==""?"無列車資訊.":Data.errT;
					if(Data.all!=''&&Data.all.length>0){
						Now += '<div class="container">';
						Now += '<div style="font-size:2.8vh;text-align:center;padding:1.5vh 0;">列車時刻表.</div>';
						Data.all.forEach(d =>{
							Now += '<div class="alert alert-warning">';
							Now += '<div class="row"><div class="col-10" align=left style="font-size:2.1vh;">車次: '+d.TrainNo+'&emsp;&emsp;'+d.StartingStationNameTW+'-'+d.EndingStationNameTW+'</div></div>';
							Now += '<div class="row" style="margin-top:.5vh;"><div class="col-12 align-self-center" align=left style="font-size:2vh;display:inherit;"><div><span style="font-size:2.5vh">'+d.startStationNameTW+'</span><br>'+d.OriginStopTimeA+'</div><div style="padding-top:1.5vh;">&nbsp;&nbsp;到&nbsp;&nbsp;</div><div><span style="font-size:2.5vh">'+d.endStationNameTW+'</span><br>'+d.DestinationStopTimeA+'</div><div style="padding-top:1.5vh;">&emsp;&emsp;'+d.toTime+'</div></div></div>';
							Now += '<div class="row" style="margin-top:.5vh;"><div class="col-10" align=left style="font-size:2vh;"><button class="btn btn-primary" onclick=seatS("'+d.TrainNo+'") style="background:#FFC78E;color: #000;font-size: 1.5vh;">座位查詢.</button>'+'</div></div>';
							Now += '<span id="'+d.TrainNo+'"></span>';
							Now += '<div class="row" style="margin-top:.5vh;"><div class="col-10" align=left style="font-size:2vh;">'+'狀態: '+span+d.TrainStatus+spanE+'</div>';
							Now += '</div></div>';
						});
						Now += '</div>';
					}
					else{ Now += '<div style="font-size:2.8vh;text-align:center;padding:1.5vh 0;color:#f00;">'+err+'.</div>'; }
				}
				else{ Now += errS==undefined?'高鐵伺服器異常.':errDiv+errS+endDiv; }
				emptyD('#Mline');
				showD('#Mline', errDiv+Now+endDiv);
				emptyD('.myUI');
			},
			error: function(xhr, ajaxOptions, thrownError){
				let Err = errDiv+'無網路、伺服器異常.'+endDiv;
				emptyD('#Mline');
				showD('#Mline', Err);
				emptyD('.myUI');
	
			}
		});
	}
	else{
		let errT = '';
		if(start==''&&final==''){ errT='請選擇 起點站與終點站'; }
		else if(start==""){ errT='請選擇 起點站'; }
		else if(final==''){ errT='請選擇 終點站'; }
		else if(start==final){ errT='起點站與終點站不能相同'; }
		// let Err = '<div class="row justify-content-md-center alert alert-danger"><div class="col-12" style="color:#000;">'+errT+'</div></div>';
		let Err = errDiv+errT+endDiv;
		emptyD('#Mline');
		showD('#Mline', Err);
		emptyD('.myUI');
	}
}

function seatS(TrainNo){
	let start=$('#start').val();
	let final=$('#final').val();
	if((start!=''&&final!='')&&(start!=final)){
		emptyD('#'+TrainNo);
		$("#"+TrainNo).append('<div class="container" style="text-align:left;margin-top:1vh;font-size:1.5vh;"><div class="spinner-border" role="status" style="color:#5a5a5c;width:3.5vh;height:3.5vh;"></div><div style="color:#5a5a5c;padding-top:1vh;font-size:2vh;">請稍後...</div></div>');
		jQuery.ajax({
			method: "GET",
			charset:"utf-8",
			cache:"true",
			dataType: "json",
			async:true,
			url: "/thsrTrainSeat/"+start+"/"+final+"/"+TrainNo,
			success: function(Data){
				$("#"+TrainNo).empty();
				Now = '';
				let errDiv = '<div style="text-align:left;margin-top:1vh;color:#f00;font-size:2.3vh;">';
				let endDiv = '</div>';
				let errS = Data.errT==undefined?"高鐵伺服器異常.":Data.errT;
				if(Data.type=='success'){
					let err = Data.errT==""?"無列車資訊.":Data.errT;
					Now += '<div class="row" style="margin-top:.5vh;">';
					let StandardColor = Data.StandardSeatColor!=''?Data.StandardSeatColor:'#000';
					let BusinessColor = Data.BusinessSeatColor!=''?Data.BusinessSeatColor:'#000';
					Now += Data.StandardSeatStatus!=''?'<div class="col-12 align-self-center" align=left style="font-size:2vh;display:inherit;color:'+StandardColor+'">'+Data.StandardSeatStatus+'</div>':'';
					Now += Data.BusinessSeatStatus!=''?'<div class="col-12 align-self-center" align=left style="font-size:2vh;display:inherit;color:'+BusinessColor+'">'+Data.BusinessSeatStatus+'</div>':'';
					Now += '</div>';
				}
				else{ Now += errDiv+errS+endDiv; }
				emptyD('#'+TrainNo);
				showD('#'+TrainNo, Now);
			},
			error: function(xhr, ajaxOptions, thrownError){
				let Err = errDiv+'無網路、伺服器異常.'+endDiv;
				emptyD('#'+TrainNo);
				showD('#'+TrainNo, Err);
				$("#"+TrainNo).empty();
	
			}
		});
	}
	else{
		let errT = '';
		if(start==''&&final==''){ errT='請選擇 起點站與終點站'; }
		else if(start==""){ errT='請選擇 起點站'; }
		else if(final==''){ errT='請選擇 終點站'; }
		else if(start==final){ errT='起點站與終點站不能相同'; }
		let Err = '<div class="row justify-content-md-center alert alert-danger"><div class="col-12" style="color:#000;">'+errT+'</div></div>';
		emptyD('#Mline');
		showD('#Mline', Err);
		$("#"+TrainNo).empty();
	}
}


$(function(){
	$("#gotop").click(function(){
		$("html,body").animate({scrollTop:0}, 900);
		return false;
	});
});