/**
 * Author: yangguang
 * Email : seateng@sohu.com
 * Date  : 2009-8-11 17:25
 */

var is_gecko = /gecko/i.test(navigator.userAgent);
var is_ie    = /MSIE/.test(navigator.userAgent);
var is_ie6   = is_ie && ([/MSIE (\d)\.0/i.exec(navigator.userAgent)][0][1] == 6);
//overlay & dragdrop
function Each(list, fun) {
    for (var i = 0, len = list.length; i < len; i++) {
        fun(list[i], i);
    }
};
var _$ = function(id) {
    return "string" == typeof id ? document.getElementById(id) : id;
};
var Class = {
    create: function() {
        return function() {
            this.initialize.apply(this, arguments);
        }
    }
}
Object.extend = function(destination, source) {
    for (var property in source) {
        destination[property] = source[property];
    }
    return destination;
}
Function.prototype.bind = function(object) {
    var __method = this,
    args = Array.apply(null, arguments);
    args.shift();
    return function() {
        return __method.apply(object, args);
    }
}
var OverLay = Class.create();
OverLay.prototype = {
    initialize: function(overlay, options) {
        this.Lay = _$(overlay); //\u8986\u76d6\u5c42
        //ie6\u8bbe\u7f6e\u8986\u76d6\u5c42\u5927\u5c0f\u7a0b\u5e8f
        this._size = function() {};
        this.SetOptions(options);
        this.Color = this.options.Color;
        this.Opacity = parseInt(this.options.Opacity);
        this.zIndex = parseInt(this.options.zIndex);
        this.Set();
    },
    //\u8bbe\u7f6e\u9ed8\u8ba4\u5c5e\u6027
    SetOptions: function(options) {
        this.options = { //\u9ed8\u8ba4\u503c
            Color: "#fff",
            //\u80cc\u666f\u8272
            Opacity: 50,
            //\u900f\u660e\u5ea6(0-100)
            zIndex: 1000 //\u5c42\u53e0\u987a\u5e8f
        };
        Object.extend(this.options, options || {});
    },
    //\u521b\u5efa
    Set: function() {
        this.Lay.style.display = "none";
        this.Lay.style.zIndex = this.zIndex;
        this.Lay.style.left = this.Lay.style.top = 0;
        if (is_ie6) {
            this.Lay.style.position = "absolute";
            this._size = function() {
                this.Lay.style.width = Math.max(document.documentElement.scrollWidth, document.documentElement.clientWidth) + "px";
                this.Lay.style.height = Math.max(document.documentElement.scrollHeight, document.documentElement.clientHeight) + "px";
            }.bind(this);
            //\u906e\u76d6select
            this.Lay.innerHTML = '<iframe style="position:absolute;top:0;left:0;width:100%;height:100%;filter:alpha(opacity=0);"></iframe>'
        } else {
            this.Lay.style.position = "fixed";
            this.Lay.style.width = this.Lay.style.height = "100%";
        }
    },
    //\u663e\u793a
    Show: function() {
        //\u8bbe\u7f6e\u6837\u5f0f
        this.Lay.style.backgroundColor = this.Color;
        //\u8bbe\u7f6e\u900f\u660e\u5ea6
        if (is_ie) {
            this.Lay.style.filter = "alpha(opacity:" + this.Opacity + ")";
        } else {
            this.Lay.style.opacity = this.Opacity / 100;
        }
        //\u517c\u5bb9ie6
        if (is_ie6) {
            this._size();
            window.attachEvent("onresize", this._size);
        }
        this.Lay.style.display = "block";
    },
    //\u5173\u95ed
    Close: function() {
        this.Lay.style.display = "none";
        if (is_ie6) {
            window.detachEvent("onresize", this._size);
        }
    }
};
var LightBox = Class.create();
LightBox.prototype = {
    initialize: function(box, overlay, options) {
        this.Box = _$(box); //\u663e\u793a\u5c42
        this.OverLay = new OverLay(overlay, options); //\u8986\u76d6\u5c42
        this.SetOptions(options);
        this.Fixed = !!this.options.Fixed;
        this.Over = !!this.options.Over;
        this.Center = !!this.options.Center;
        this.onShow = this.options.onShow;
        this.Box.style.zIndex = this.OverLay.zIndex + 1;
        this.Box.style.display = "none";
        //\u517c\u5bb9ie6\u7528\u7684\u5c5e\u6027
        if (is_ie6) {
            this._top = this._left = 0;
            this._select = [];
        }
    },
    //\u8bbe\u7f6e\u9ed8\u8ba4\u5c5e\u6027
    SetOptions: function(options) {
        this.options = { //\u9ed8\u8ba4\u503c
            Fixed: false,
            //\u662f\u5426\u56fa\u5b9a\u5b9a\u4f4d
            Over: true,
            //\u662f\u5426\u663e\u793a\u8986\u76d6\u5c42
            Center: false,
            //\u662f\u5426\u5c45\u4e2d
            onShow: function() {} //\u663e\u793a\u65f6\u6267\u884c
        };
        Object.extend(this.options, options || {});
    },
    //\u517c\u5bb9ie6\u7684\u56fa\u5b9a\u5b9a\u4f4d\u7a0b\u5e8f
    _fixed: function() {
        var iTop = this.Box.offsetTop + document.documentElement.scrollTop - this._top,
        iLeft = this.Box.offsetLeft + document.documentElement.scrollLeft - this._left;
        //\u5c45\u4e2d\u65f6\u9700\u8981\u4fee\u6b63
        if (this.Center) {
            iTop += this.Box.offsetHeight / 2;
            iLeft += this.Box.offsetWidth / 2;
        }
        this.Box.style.top = iTop + "px";
        this.Box.style.left = iLeft + "px";
        this._top = document.documentElement.scrollTop;
        this._left = document.documentElement.scrollLeft;
    },
    //\u663e\u793a
    Show: function(options) {
        //\u56fa\u5b9a\u5b9a\u4f4d
        if (this.Fixed) {
            if (is_ie6) {
                //\u517c\u5bb9ie6
                this.Box.style.position = "absolute";
                this._top = document.documentElement.scrollTop;
                this._left = document.documentElement.scrollLeft;
                window.attachEvent("onscroll", this._fixed.bind(this));
            } else {
                this.Box.style.position = "fixed";
            }
        } else {
            this.Box.style.position = "absolute";
        }
        //\u8986\u76d6\u5c42
        if (this.Over) {
            //\u663e\u793a\u8986\u76d6\u5c42\uff0c\u8986\u76d6\u5c42\u81ea\u5e26select\u9690\u85cf
            this.OverLay.Show();
        } else {
            //ie6\u9700\u8981\u628a\u4e0d\u5728Box\u4e0a\u7684select\u9690\u85cf
            if (is_ie6) {
                this._select = [];
                var oThis = this;
                Each(document.getElementsByTagName("select"),
                function(o) {
                    if (oThis.Box.contains ? !oThis.Box.contains(o) : !(oThis.Box.compareDocumentPosition(o) & 16)) {
                        o.style.visibility = "hidden";
                        oThis._select.push(o);
                    }
                })
            }
        }
        this.Box.style.display = "block";
        //\u5c45\u4e2d
        if (this.Center) {
            this.Box.style.top = this.Box.style.left = "50%";
            //\u663e\u793a\u540e\u624d\u80fd\u83b7\u53d6
            var iTop = -this.Box.offsetHeight / 2,
            iLeft = -this.Box.offsetWidth / 2;
            //\u4e0d\u662ffixed\u6216ie6\u8981\u4fee\u6b63
            if (!this.Fixed || is_ie6) {
                iTop += document.documentElement.scrollTop+document.body.scrollTop;
                iLeft += document.documentElement.scrollLeft;
            }
            this.Box.style.marginTop = iTop + "px";
            this.Box.style.marginLeft = iLeft + "px";
        }
        this.onShow();
    },
    //\u5173\u95ed
    Close: function() {
        this.Box.style.display = "none";
        this.OverLay.Close();
        if (is_ie6) {
            window.detachEvent("onscroll", this._fixed);
            Each(this._select,
            function(o) {
                o.style.visibility = "visible";
            });
        }
    }
};
function addEventHandler(oTarget, sEventType, fnHandler) {
    if (oTarget.addEventListener) {
        oTarget.addEventListener(sEventType, fnHandler, false);
    } else if (oTarget.attachEvent) {
        oTarget.attachEvent("on" + sEventType, fnHandler);
    } else {
        oTarget["on" + sEventType] = fnHandler;
    }
};
function removeEventHandler(oTarget, sEventType, fnHandler) {
    if (oTarget.removeEventListener) {
        oTarget.removeEventListener(sEventType, fnHandler, false);
    } else if (oTarget.detachEvent) {
        oTarget.detachEvent("on" + sEventType, fnHandler);
    } else {
        oTarget["on" + sEventType] = null;
    }
};
if (!is_ie) {
    HTMLElement.prototype.__defineGetter__("currentStyle",
    function() {
        return this.ownerDocument.defaultView.getComputedStyle(this, null);
    });
}
//\u62d6\u653e\u7a0b\u5e8f
var Drag = Class.create();
Drag.prototype = {
    //\u62d6\u653e\u5bf9\u8c61,\u89e6\u53d1\u5bf9\u8c61
    initialize: function(obj, drag, options) {
        var oThis = this;
        this._obj = _$(obj); //\u62d6\u653e\u5bf9\u8c61
        this.Drag = _$(drag); //\u89e6\u53d1\u5bf9\u8c61
        this._x = this._y = 0; //\u8bb0\u5f55\u9f20\u6807\u76f8\u5bf9\u62d6\u653e\u5bf9\u8c61\u7684\u4f4d\u7f6e
        //\u4e8b\u4ef6\u5bf9\u8c61(\u7528\u4e8e\u79fb\u9664\u4e8b\u4ef6)
        this._fM = function(e) {
            oThis.Move(window.event || e);
        }
        this._fS = function() {
            oThis.Stop();
        }
        this.SetOptions(options);
        this.Limit = !!this.options.Limit;
        this.mxLeft = parseInt(this.options.mxLeft);
        this.mxRight = parseInt(this.options.mxRight);
        this.mxTop = parseInt(this.options.mxTop);
        this.mxBottom = parseInt(this.options.mxBottom);
        this.mxContainer = this.options.mxContainer;
        this.onMove = this.options.onMove;
        this.Lock = !!this.options.Lock;
        this._obj.style.position = "absolute";
        addEventHandler(this.Drag, "mousedown",
        function(e) {
            oThis.Start(window.event || e);
        });
    },
    //\u8bbe\u7f6e\u9ed8\u8ba4\u5c5e\u6027
    SetOptions: function(options) {
        this.options = { //\u9ed8\u8ba4\u503c
            Limit: false,
            //\u662f\u5426\u8bbe\u7f6e\u9650\u5236(\u4e3atrue\u65f6\u4e0b\u9762\u53c2\u6570\u6709\u7528,\u53ef\u4ee5\u662f\u8d1f\u6570)
            mxLeft: 0,
            //\u5de6\u8fb9\u9650\u5236
            mxRight: 0,
            //\u53f3\u8fb9\u9650\u5236
            mxTop: 0,
            //\u4e0a\u8fb9\u9650\u5236
            mxBottom: 0,
            //\u4e0b\u8fb9\u9650\u5236
            mxContainer: null,
            //\u6307\u5b9a\u9650\u5236\u5728\u5bb9\u5668\u5185
            onMove: function() {},
            //\u79fb\u52a8\u65f6\u6267\u884c
            Lock: false //\u662f\u5426\u9501\u5b9a
        };
        Object.extend(this.options, options || {});
    },
    //\u51c6\u5907\u62d6\u52a8
    Start: function(oEvent) {
        if (this.Lock) {
            return;
        }
        //\u8bb0\u5f55\u9f20\u6807\u76f8\u5bf9\u62d6\u653e\u5bf9\u8c61\u7684\u4f4d\u7f6e
        this._x = oEvent.clientX - this._obj.offsetLeft;
        this._y = oEvent.clientY - this._obj.offsetTop;
        //mousemove\u65f6\u79fb\u52a8 mouseup\u65f6\u505c\u6b62
        addEventHandler(document, "mousemove", this._fM);
        addEventHandler(document, "mouseup", this._fS);
        //\u4f7f\u9f20\u6807\u79fb\u5230\u7a97\u53e3\u5916\u4e5f\u80fd\u91ca\u653e
        if (is_ie) {
            addEventHandler(this.Drag, "losecapture", this._fS);
            this.Drag.setCapture();
        } else {
            addEventHandler(window, "blur", this._fS);
        }
    },
    //\u62d6\u52a8
    Move: function(oEvent) {
        //\u5224\u65ad\u662f\u5426\u9501\u5b9a
        if (this.Lock) {
            this.Stop();
            return;
        }
        //\u6e05\u9664\u9009\u62e9(ie\u8bbe\u7f6e\u6355\u83b7\u540e\u9ed8\u8ba4\u5e26\u8fd9\u4e2a)
        window.getSelection && window.getSelection().removeAllRanges();
        //\u5f53\u524d\u9f20\u6807\u4f4d\u7f6e\u51cf\u53bb\u76f8\u5bf9\u62d6\u653e\u5bf9\u8c61\u7684\u4f4d\u7f6e\u5f97\u5230offset\u4f4d\u7f6e
        var iLeft = oEvent.clientX - this._x,
        iTop = oEvent.clientY - this._y;
        //\u8bbe\u7f6e\u8303\u56f4\u9650\u5236
        if (this.Limit) {
            //\u5982\u679c\u8bbe\u7f6e\u4e86\u5bb9\u5668,\u56e0\u4e3a\u5bb9\u5668\u5927\u5c0f\u53ef\u80fd\u4f1a\u53d8\u5316\u6240\u4ee5\u6bcf\u6b21\u90fd\u8981\u8bbe
            if ( !! this.mxContainer) {
                this.mxLeft = this.mxTop = 0;
                this.mxRight = this.mxContainer.clientWidth;
                this.mxBottom = this.mxContainer.clientHeight;
            }
            //\u83b7\u53d6\u8d85\u51fa\u957f\u5ea6
            var iRight = iLeft + this._obj.offsetWidth - this.mxRight,
            iBottom = iTop + this._obj.offsetHeight - this.mxBottom;
            //\u8fd9\u91cc\u662f\u5148\u8bbe\u7f6e\u53f3\u8fb9\u4e0b\u8fb9\u518d\u8bbe\u7f6e\u5de6\u8fb9\u4e0a\u8fb9,\u53ef\u80fd\u4f1a\u4e0d\u51c6\u786e
            if (iRight > 0) iLeft -= iRight;
            if (iBottom > 0) iTop -= iBottom;
            if (this.mxLeft > iLeft) iLeft = this.mxLeft;
            if (this.mxTop > iTop) iTop = this.mxTop;
        }
        //\u8bbe\u7f6e\u4f4d\u7f6e
        //\u7531\u4e8eoffset\u662f\u628amargin\u4e5f\u7b97\u8fdb\u53bb\u7684\u6240\u4ee5\u8981\u51cf\u53bb
        this._obj.style.left = iLeft - (parseInt(this._obj.currentStyle.marginLeft) || 0) + "px";
        this._obj.style.top = iTop - (parseInt(this._obj.currentStyle.marginTop) || 0) + "px";
        //\u9644\u52a0\u7a0b\u5e8f
        this.onMove();
    },
    //\u505c\u6b62\u62d6\u52a8
    Stop: function() {
        //\u79fb\u9664\u4e8b\u4ef6
        removeEventHandler(document, "mousemove", this._fM);
        removeEventHandler(document, "mouseup", this._fS);
        if (is_ie) {
            removeEventHandler(this.Drag, "losecapture", this._fS);
            this.Drag.releaseCapture();
        } else {
            removeEventHandler(window, "blur", this._fS);
        }
    }
};

PassportSC._drawLoginForm = function()
{
	this.cElement.innerHTML='<form method="post" onsubmit="return PassportSC.doLogin();" name="loginform">'+
							'<div class="passportc_title" id="passportc_title"><div id="pp_title_left">17173\u4f1a\u5458\u767b\u5f55</div><div id="pp_title_right"><img onclick="box.Close();" src="http://ue1.17173.itc.cn/spp/u5/pp_close.gif" style="cursor:pointer" width="18" height="18" alt="" /></div></div>'+
							'<div class="passportc_content" id="ppcontid"><ul class="card"><div id="pperrmsg" class="err"></div><li>\u7528\u6237\u540d\uff1a '+
							'<input name="email" type="text" class="ppinput" autocomplete="off" disableautocomplete /></li>'+
							'<li>\u5bc6\u3000\u7801\uff1a '+
							'<input name="password" type="password" class="ppinput" autocomplete="off" disableautocomplete /></li>'+
							'<li class="loginSubimt"><span class="login"><input name="persistentcookie" type="checkbox" value="1" />\u8bb0\u4f4f\u5bc6\u7801</span><a href="'+this.registerUrl+'" target="_blank"><img src="http://ue1.17173.itc.cn/sy/loginicon.gif" width="60" height="24" class="passportc_register" alt="\u6ce8 \u518c"></img></a> <input type="image" src="http://ue1.17173.itc.cn/sy/loginicon.gif" class="passportc_login" width="60" height="24" value="\u767b \u5f55" alt="\u767b \u5f55" cache /></li>'+
							'</ul></div></form>';
};

PassportSC.drawPassportWait = function (str) 
{
    this.cElement.innerHTML=''+
							'<div class="passportc_title"><div id="pp_title_left">17173\u4f1a\u5458\u767b\u5f55</div><div id="pp_title_right"><img onclick="box.Close();" src="http://ue1.17173.itc.cn/spp/u5/pp_close.gif" style="cursor:pointer" width="18" height="18" alt="" /></div></div>'+
							'<div class="passportc_content" id="ppcontid">'+
							'<div class="ppWaitMsg">' + str + '</div></div>';
	//document.getElementById("ppcontid").innerHTML = '<div class="ppWaitMsg">' + str + '</div>';
};

PassportSC._drawPassportCard =  function () 
{
	var html = '<div class="passportc_title" id="passportc_title"><div id="pp_title_left">17173\u4f1a\u5458\u767b\u5f55</div><div id="pp_title_right"><img onclick="box.Close();" src="http://ue1.17173.itc.cn/spp/u5/pp_close.gif" style="cursor:pointer" width="18" height="18" alt="" /></div></div><div class="passportc_content" id="ppcontid"><div class="listContA"></div></div>';
    this.cElement.innerHTML = html;
	//bindPassport();
	//document.getElementById("ppcontid").innerHTML = '<div class="listContA"></div>';
};

PassportSC.drawPassportInfo = function ()
{
    html = '<div class="spp_app_info"><ul><li>' + this.cookie['userid'] + '</li><li><p>\u6b22\u8fce\u60a8\uff0c\u60a8\u5df2\u7ecf\u6210\u529f\u767b\u5f55\u641c\u72d0\u901a\u884c\u8bc1\uff01 </p></li>\u73b0\u5728\u5373\u53ef\u7545\u6e38\u641c\u72d0\u6240\u6709\u670d\u52a1\u3002</li></ul></div>';
    this.iElement.innerHTML = html;
};
PassportSC.app17173 = [["http://bbs.17173.com",  "\u793e\u533a"],
                       ["http://club.17173.com", "\u516c\u4f1a"],
                       ["http://blog.17173.com", "\u535a\u5ba2"],
                       ["http://vlog.17173.com", "\u64ad\u5ba2"],
                       ["http://pic.17173.com",  "\u622a\u56fe"]];
PassportSC.app17173UserInfoUrl = "";

var Request = new Object();
Request.send = function(url, method, callback, data, urlencoded) {
	var req;
	if(window.XMLHttpRequest){
		req = new XMLHttpRequest();
	}else if(window.ActiveXObject){
		req = new ActiveXObject("Microsoft.XMLHTTP");
	}
	req.onreadystatechange = function() {
		if(req.readyState == 4){
			if (req.status < 400) {
				(method=="POST") ? callback(req) : callback(req,data);
			}else{
				//alert("\u670d\u52a1\u5668\u7e41\u5fd9\u8bf7\u7a0d\u540e\u518d\u8bd5!");
			}
		}
	}
	if (method=="POST") {
		req.open("POST", url, true);
		if (urlencoded) req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		req.send(data);
	} else {
		req.open("GET", url, true);
		req.send(null);
	}
	return req;
}
Request.sendRawPOST = function(url, data, callback) {
	Request.send(url, "POST", callback, data, false);
}
Request.sendPOST = function(url, data, callback) {
	Request.send(url, "POST", callback, data, true);
}
Request.sendGET = function(url, callback, args) {
	return Request.send(url, "GET", callback, args);
}
function drawAppInfo(ele) {
    var html = '<div id="spp_app_block"><ul class="spp_app_behavior">';
    for(var i=0; i<PassportSC.app17173.length; i++)
    {
        html += '<li';
        if(PassportSC.app17173[i][0].match(document.domain))
            html += ' class="spp_current_app"';
        html += '><a href="'+PassportSC.app17173[i][0]+'" target="_blank">'+PassportSC.app17173[i][1]+'</a></li>';
    }
    html += '</ul>';
    if(PassportSC.app17173LogoutUrl == "" || PassportSC.app17173UserInfoUrl == "") 
	{
		html += '<div id="spp_app_info" class="spp_app_info"><ul><li>' + PassportSC.cookie['userid'] + '</li><li>'+PassportSC.loginInfo+'</li>';
		html += '<li class="passportc_logout"><a href="javascript:PassportSC.doLogout();">\u9000\u51fa</a></li>';
		html += '</ul></div>';
	}else{
		html += '<div id="spp_app_info" class="spp_app_info"> <span class="hightlight">\u7528\u6237\u4fe1\u606f\u52a0\u8f7d\u4e2d.....</span><img src="http://bbs.17173.com/images/userinfo_loading.gif" width=16 height=16 align="bottom" /></div>';
		Request.sendGET(PassportSC.app17173UserInfoUrl, infoUpdater);
    }
    html += '</div>';
    ele.innerHTML = html;
	spp_login_callback();
	//setTimeout("spp_login_callback", 5000);
}
