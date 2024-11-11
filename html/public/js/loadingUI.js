let loadingDom = '<div class="loadingUI">';
let divE = '</div>';
let loadingUIDom = '<div style="padding-left:45%;padding-top:40vh;"><div class="spinner-border loadingUIPinner-border" role="status"></div><div class="loadingUIText">請稍後...</div></div>';
function loadingUI(str){
	// $(str).empty();
	$(str).append(loadingDom+loadingUIDom+divE);
	// $(str).append('<div style="z-index:99999;"><div class="container" style="padding-top:10%;padding-bottom:3vh;height:50%;font-size:2vh;"><div class="spinner-border" role="status" style="color:#5a5a5c;width:5vh;height:5vh;"></div><div style="color:#5a5a5c;padding-top:1vh;font-size:2.5vh;">請稍後...</div></div></div>');
}