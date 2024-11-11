function intos(str,type){
	let typeColor = type=='tra'?'#0014ff':'FF8040';
	if(str=='go'){
		$('#go').css('display','inline');
		$('#back').css('display','none');
		$('#g').css('color',typeColor);
		$('#b').css('color','#505050');
	}
	if(str=='back'){
		$('#go').css('display','none');
		$('#back').css('display','inline');
		$('#g').css('color','#505050');
		$('#b').css('color',typeColor);
	}
}
