function ajaxMrtTime(RID){
    let line = this.localHref();
    let LoadingUI = this.getLoadingUI(line);
    $("#"+RID).empty();
    $("#"+RID).append(LoadingUI);
    $.ajax({
        method: "GET",
        dataType: "JSON",
        url: "/MrtConn/"+RID+"/"+line,
        success : function(fomoRData){
            let D = '';
            if(fomoRData.type=='s'){ fomoRData.mrtD.forEach(v=>{ D += v.goTName+'： '+v.ConinTime+'<br>'; }); }
            else{ D = fomoRData.errT==undefined?'':fomoRData.errT; }
            $("#"+RID).empty();
            $("#"+RID).append(D==''?'高捷伺服器異常...':D);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
            $("#"+RID).empty();
            $("#"+RID).append('伺服器無回應...');
        }
    });
}
function getLoadingUI(colors){
    let loadingUI = '';
    if(colors=='r'){
        return loadingUI = this.loadingUI('color:#dc3545;');
    }
    else if(colors=='o'){
        return loadingUI = this.loadingUI('color:#ffc107;');
    }
    else if(colors=='c'){
        return loadingUI = this.loadingUI('color:#28a745;');
    }
    else{
        return loadingUI = this.loadingUI('color:#000;');
    }
}
function localHref(){
    return location.href.split('Mrt/')[1];
}
function loadingUI(colors){
    return '<div class="spinner-border" role="status" style="'+colors+'font-size:1.5vh;"></div>';
}
function errT(){
    return '高雄捷運局伺服器無回應.';
}

