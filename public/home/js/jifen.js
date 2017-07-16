function getElementsByClassName(searchClass, node,tag) {
    if(document.getElementsByClassName){
        return  document.getElementsByClassName(searchClass);
    }else{
        node = node || document;
        tag = tag || "*";
        var classes = searchClass.split(" "),
        elements = (tag === "*" && node.all)? node.all : node.getElementsByTagName(tag),
        patterns = [],
        returnElements = [],
        current,
        match;
        var i = classes.length;
        while(--i >= 0){
            patterns.push(new RegExp("(^|\\s)" + classes[i] + "(\\s|$)"));
        }
        var j = elements.length;
        while(--j >= 0){
            current = elements[j];
            match = false;
            for(var k=0, kl=patterns.length; k<kl; k++){
                match = patterns[k].test(current.className);
                if (!match)  break;
            }
            if (match)  returnElements.push(current);
        }
        return returnElements;
    }
}

var jifen = {
	init : function  (config) {
		this.config = config;
		this.jifen_maxInterval = 10;
		this.jifen_IntervalCount =0;
		this.jifen_uids_elements =[];
		this.jifen_uids =[];
		if(typeof(user_jifen)!='undefined'){
			user_jifen = null;
		}
		var head=document.getElementsByTagName('head').item(0);
		var script=document.createElement('script');
		var elements = getElementsByClassName("jifen", document, "span");
		for(var i=0; i<elements.length;i++){
			var uid = elements[i].getAttribute('ref');
			this.jifen_uids_elements.push(elements[i]);
			this.jifen_uids.push(uid);
		}
		var paramStr = this.jifen_uids.join(',');
		script.src = 'http://exp.my.17173.com/get_jf.php?userid=' + paramStr;
		script.type='text/javascript';
		script.charset = "UTF-8";
		head.appendChild(script);
		this.show();
	},

	show : function  () {
		if(typeof(user_jifen)=='undefined' || !user_jifen){
			if(this.jifen_IntervalCount > this.jifen_maxInterval){
				return;
			}
			this.jifen_IntervalCount ++;
			setTimeout("jifen.show()", 500);
			return;
		}
		if(user_jifen['flag'] ==1){
			var user_jifen_arr = [];
			user_jifen_arr = user_jifen['jifen'].split(',');
			for(var i=0; i<this.jifen_uids.length; i++){
				var jifen_info = user_jifen_arr[i].split("|");
				var Rnd = Math.random();
				var rand = Math.round((9 * Rnd));
				if(rand ==0) rand =1;
				var html = '<a href="javascript:void(0);" class="toolTip1" target="_blank"><img src="http://i' + rand +'.17173.itc.cn/2009/lv2/'+ jifen_info[1] +'.gif" /><span class="tooltipInfo1">您的经验值：'+jifen_info[0]+'<br/>目前等级是：'+jifen_info[1]+'<br/><img style="margin-bottom:5px;" align="absmiddle"  altbg="#F7F7F7" src="http://i' + rand +'.17173.itc.cn/2009/lv2/'+ jifen_info[1] +'.gif" /><br/><font color="red" style="cursor:hand">&nbsp;&nbsp;经验值的获取和说明>></font></span><span class="tooltipInfo"><table border="0" cellpadding="0" cellspacing="0"><tr><td class="tooltipInfo_left" height="24"> </td><td class="tooltipInfo_content">等级:'+ jifen_info[1] + ' 经验:' + jifen_info[0] + ' 距离下一级还需:' + jifen_info[2] +'</td><td class="tooltipInfo_right">&nbsp;</td></tr></table></span></a>';
				this.jifen_uids_elements[i].innerHTML = html;
				var tipEle = this.jifen_uids_elements[i].childNodes[0];
				if(typeof(this.config)!='undefined' && this.config==1){
					jifen_Tooltip.setElement(tipEle);
					jifen_Tooltip.show();
					setTimeout("jifen_Tooltip.hidden()", 2000);
					return;
				}
				else{
					tipEle.onmouseover = function(){
						var tmpEle =  this.childNodes[2];
						tmpEle.style.display = "block";
					};
					tipEle.onmouseout = function(){
						var tmpEle =  this.childNodes[2];
						tmpEle.style.display = "none";
					};
				}
			}
		}
	}
}

var jifen_Tooltip = {
	setElement : function  (ele) {
		this.tipEle = ele;
	},

	show : function  () {
		this.tipEle.childNodes[1].style.display = 'block';
	},

	hidden : function  () {
		this.tipEle.childNodes[1].style.display = 'none';
		this.tipEle.onmouseover = function(){
			var tmpEle =  this.childNodes[2];
			tmpEle.style.display = "block";
		};
		this.tipEle.onmouseout = function(){
			var tmpEle =  this.childNodes[2];
			tmpEle.style.display = "none";
		};

	}
}