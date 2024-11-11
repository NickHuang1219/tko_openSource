$(function(){
	$("#gotop").click(function(){ 
		$("html,body").animate({scrollTop:0}, 0);//'slow'//900
		return false;
	});
	/* 偵測卷軸滑動時，往下滑超過400px就讓GoTop按鈕出現 */
	$(window).scroll(function() {
		if ( $(this).scrollTop() > 80){
			$('#gotop').fadeIn();
		} else {
			$('#gotop').fadeOut();
		}
	});
});
$(function(){
	$('#BackTop').click(function(){ 
	  $('html,body').animate({scrollTop:0}, 0);
	});
	$(window).scroll(function() {
	  if ( $(this).scrollTop() > 80 ){
		$('#BackTop').fadeIn(222);
	  } else {
		$('#BackTop').stop().fadeOut(222);
	  }
	}).scroll();
  });