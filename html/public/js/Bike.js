function BorRetBike(BikeId){
	$("#"+BikeId).empty();
	$("#"+BikeId).append('<div class="spinner-border" role="status" style="color:#0d6efd;font-size:1.5vh;"></div>');
	jQuery.ajax({
		method: "GET",
		charset:"utf-8",
		dataType: "json",
		url:'/BikeConn/'+BikeId,
		success : function(borrowD) {
			let D = '';
			if(borrowD.type==200){ D = borrowD.Rent+'<br>'+borrowD.Return; }
			else{ D = borrowD.errT==undefined?'':borrowD.errT; }
			$("#"+BikeId).empty();
			$("#"+BikeId).append(D!=''?D:'YouBike伺服器異常...');
		}, 
		error: function(xhr, ajaxOptions, thrownError){
			$("#"+BikeId).empty();
			$("#"+BikeId).append('YouBike伺服器無回應.');
		}
	});
}