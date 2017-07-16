jQuery(function($){
function passportGetCookie(c_name){
	if (document.cookie.length>0){ 
		c_start=document.cookie.indexOf(c_name + "=")
			if (c_start!=-1){ 
						c_start=c_start + c_name.length+1;
						c_end=document.cookie.indexOf(";",c_start)
					if(c_end==-1){
							c_end=document.cookie.length
					}
		return decodeURIComponent(document.cookie.substring(c_start,c_end))
			} 
	}
return ""
}

//var appkey=156;

var uid = Passport.data("uid");

var cookieid = passportGetCookie("SUV");

var sessionid = passportGetCookie("sessionid");

var passportGetCookie = passportGetCookie("lastdomain17173");
if(passportGetCookie == ""){
	uname = ""
}else{
	var usernameCookie = passportGetCookie.split("|")[1];
	uname = Passport.util.base64Decode(usernameCookie).split("|")[0];
}

var url = encodeURIComponent(window.location.href);

if(!Passport.isLoggedIn() && uname !="" ){
	isvalid = 1;
}else{
	isvalid = 0;
}

var getReferrer = function() {
        var referrer = null;
        try {
            referrer = window.top.document.referrer;
        } catch(e) {
            if(window.parent) {
                try {
                    referrer = window.parent.document.referrer;
                } catch(e2) {
                    referrer = null;
                }
            }
        }
        if(referrer === null) {
            referrer = document.referrer;
        }
        if(referrer === '') {
            referrer = null;
        }
        return referrer;
    };
var	referer = encodeURIComponent(getReferrer())

$(".ppcontrol").mousedown(function(){

	var currevent;
	var dataCurrevent = $(this).attr("data-currevent");
	switch(dataCurrevent){
		case "even1":
			currevent=encodeURIComponent("register");
			break;
		case "even2":
			currevent=encodeURIComponent("login");
			break;
		case "even3":
			currevent=encodeURIComponent("忘记帐号按钮");
			break;
		case "even4":
			currevent=encodeURIComponent("找回帐号按钮");
			break;
		case "even5":
			currevent=encodeURIComponent("帐号保护按钮");
			break;
		case "even6":
			currevent=encodeURIComponent("Topbar按钮");
			break;
		case "even7":
			currevent=encodeURIComponent("激活成功按钮");
			break;
		case "even8":
			currevent=encodeURIComponent("邮箱注册成功用户");
			break;
		case "even9":
			currevent=encodeURIComponent("手机注册成功用户");
			break;
		}
		var psUpData = "//log1.17173.com/pv?appkey=156";
		psUpData += "&uid=" + uid;
		psUpData += "&uname=" +uname;
		psUpData+= "&cookieid=" +cookieid;
		psUpData+= "&sessionid=" +sessionid;
		psUpData+= "&referer=" +referer;
		psUpData+= "&url=" +url;
		psUpData+= "&isvalid=" +isvalid;
		psUpData+= "&currevent=" + currevent;
        $('<iframe />').css({"border":"0","width":"0","height":"0","overflow":"hidden"}).attr('src', psUpData).appendTo(document.body);
	})
})