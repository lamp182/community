!function($){
	if(typeof topListConfig === 'undefined'){
		return;
	}
	if(topListConfig.all && $.inArray(parseInt(forumId), topListConfig.exclude) > -1){ //在排除列表里
		return;
	}
	if(!topListConfig.all && $.inArray(parseInt(forumId), topListConfig.include) == -1){//不在展示列表里
		return;
	}

	var date = new Date().getFullYear() + '-' + (new Date().getMonth() + 1) + '-' + new Date().getDate();
	var isModerator = $('#threadlisttableid tbody:eq(0) tr').children().length == 6;
	var additionalTd = isModerator ? '<td class="o"></td>' : '';


	if($.isArray(topListConfig.forum)){
		var forumData = topListConfig.forum,
			forumHtml = [];
		$.each(forumData, function(i, val){
			forumHtml.push('<tbody><tr id="business_' + i + '"><td class="icn"><img src="http://ue.17173cdn.com/a/bbs/index/2016/img/bbs-ico-tg.png"></td>' + additionalTd + '<th class="common"><a target="_blank" href="' + val.url + '" style="font-weight: bold;" class="xst">' + val.title + '</a><span style="font-size:14px; color:#aaa; margin-left:2em;">推广</span></th><td class="by by-co1"><cite><a target="_blank" href="' + val.url + '">' + val.gamename + '</a></cite><em><span>' + val.date + '</span></em></td><td class="num num-co1"><a href="javascript:;" class="xi2">0</a><em> / 0</em></td><td class="by by-co2"><em>1&nbsp;秒前</span></a></em><cite>by:<a href="' + val.url + '" target="_blank">' + val.gamename + '</a></cite></td></tr></tbody>');
		});
		forumHtml = forumHtml.join('');
		$(forumHtml).insertBefore('#separatorline');
		window._jc_ping = window._jc_ping || [];
		_jc_ping.push([
		       '_trackModule',
		        $('#business_0'),
		       'bMnAVz'
		]);
		_jc_ping.push([
		       '_trackModule',
		        $('#business_1'),
		       'UJ3yAf'
		]);
		_jc_ping.push([
		       '_trackModule',
		        $('#business_2'),
		       'RZnEji'
		]);
		_jc_ping.push([
		       '_trackModule',
		        $('#business_3'),
		       '2AnE3a'
		]);	
	}

}(jQuery);

!(function($){
	if(typeof floorConfig === 'undefined'){
		return;
	}
	if(floorConfig.all && $.inArray(parseInt(forumId), floorConfig.exclude) > -1){ //在排除列表里
		return;
	}
	if(!floorConfig.all && $.inArray(parseInt(forumId), floorConfig.include) == -1){//不在展示列表里
		return;
	}

	
	var isThreadPage = location.href.indexOf('thread') > -1;
	var notFirstPage = isThreadPage && $('[name=page]').val() > 1;
	var style = '<style type="text/css">#gb_hao2:link,#gb_hao2:visited{text-decoration:none}#gb_hao2{text-align:center;line-height:1.5;font-family:"Microsoft Yahei";padding:15px 0 90px 20px}#gb_hao2 a{display:block;height:48px;padding:7px 5px 0;margin-bottom:10px}#gb_hao2 a span{display:block;_width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}#gb_hao2 .gb-hao-tit{font-size:16px;color:#fff}#gb_hao2 .gb-hao-txt{font-size:12px;color:#fff88a}#gb_hao2 .gb-hao1-gift{background:#ff6d55}#gb_hao2 .gb-hao1-gift:hover{background:#ff826e}#gb_hao2 .gb-hao1-dl{background:#63c245}#gb_hao2 .gb-hao1-dl-ex .gb-hao-tit{padding-top:9px}#gb_hao2 .gb-hao1-dl:hover{background:#6ecd51}#gb_hao2 .gb-hao1-offi{background:#57adfd;padding-top:0;height:55px;line-height:55px;margin:0}#gb_hao2 .gb-hao1-offi:hover{background:#6eb9ff}#gb_hao2.gb-hao1-ex{overflow:hidden;*zoom:1}#gb_hao2.gb-hao1-ex a{width:206px;float:left;margin:0 6px 0 0}#gb_hao2.gb-hao1-ex .gb-hao1-offi{margin:0}#gb_ginfo2{position:relative;*zoom:1}#gb_ginfo2 .cate{position:absolute;right:6px;top:10px;color:#999}#gb_ginfo2 .gb-ginfo-detail{padding:30px 0 0 20px}#gb_ginfo2 .gb-ginfo-detail h2,#gb_ginfo2 .gb-ginfo-detail p{width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}#gb_ginfo2 .gb-ginfo-detail h2{font-size:24px;font-weight:bold;line-height:2}#gb_ginfo2 .gb-ginfo-detail h2 a{color:#333}#gb_ginfo2 .gb-ginfo-detail h2 a span{font-size:22px;color:#999;margin-left:0.5em}#gb_ginfo2 .gb-ginfo-detail h2 a:hover{text-decoration:none}#gb_ginfo2 .gb-ginfo-detail p{font-size:14px;color:#777;line-height:1.857}#gb_hao2 a:hover{ text-decoration: none;}</style>';

	if(isThreadPage){
		$(style).appendTo('head');
	}
	if($.isPlainObject(floorConfig.thread)){
		var threadData = floorConfig.thread;
		var threadHtml = '<div><table cellspacing="0" cellpadding="0"><tbody><tr><td class="pls" rowspan="2"><div class="pi"><div class="authi"><a href="' + threadData.url + '" target="_blank" class="xw1 business-thread-link">' + threadData.gamename + '</a></div></div><div><div class="avatar"><a href="' + threadData.url + '" target="_blank" class="business-thread-link"><img src="' + threadData.avatar + '"></a></div></div></td><td class="plc"><div id="gb_ginfo2" class="gb-ginfo"><span class="cate">推广</span><div class="gb-ginfo-detail"><h2><a class="business-thread-link" href="' + threadData.url + '" target="_blank">' + threadData.gamename + '</a></h2><p>' + threadData.desc + '</p></div></div><div id="gb_hao2" class="gb-hao1 gb-hao1-ex"></div></td></tr><tr><td class="plc plm"></td></tr><tr><td class="pls"></td><td class="plc" style="overflow:visible;"></td></tr><tr class="ad"><td class="pls"></td><td class="plc"></td></tr></tbody></table></div>';
		var buttons = floorConfig.thread.buttons,
			buttonsHtml = [];
		$.each(buttons, function(i, val){
			buttonsHtml.push('<a id="business_button_' + i + '" href="' + val.url + '" target="_blank" class="gb-hao1-gift" style="background:' + val.background + '"><span class="gb-hao-tit">' + val.text + '</span><span class="gb-hao-txt">' + val.smallText + '</span></a>');
		})

		buttonsHtml = buttonsHtml.join('');
		$(threadHtml).insertBefore($('#postlist>[id*=post_]').eq(threadData.position));
		$('#gb_hao2').html(buttonsHtml);
		window._jc_ping = window._jc_ping || [];
		_jc_ping.push([
		       '_trackModule',
		        $('.business-thread-link'),
		       'MBf2uy'
		]);		
	    _jc_ping.push([
	           '_trackModule',
	           $('#business_button_0'),
	           'eaQjUf'
	    ]);
	    _jc_ping.push([
	           '_trackModule',
	           $('#business_button_1'),
	           'ARzIjy'
	    ]);
	    _jc_ping.push([
	           '_trackModule',
	           $('#business_button_2'),
	           'IbuARb'
	    ]);
	    _jc_ping.push([
	           '_trackModule',
	           $('#business_button_3'),
	           'aEBFJf'
	    ]);
	    _jc_ping.push([
	           '_trackModule',
	           $('#business_button_4'),
	           '7reEN3'
	    ]);
	}
})(jQuery)


!function($){

	if(typeof gameDownloadConfig === 'undefined'){ //未配置
		return;
	}
	if(location.href.indexOf('thread') == -1){ // 非详情页
		return;
	}
	if(gameDownloadConfig.all && $.inArray(parseInt(forumId), gameDownloadConfig.exclude) > -1){ //在排除列表里
		return;
	}
	if(!gameDownloadConfig.all && $.inArray(parseInt(forumId), gameDownloadConfig.include) == -1){//不在展示列表里
		return;
	}



	var topHtml = '<a id="business_gamedownload_1" href="' + gameDownloadConfig.urls[0] + '" target="_blank" class="bbstg-btn-gift"><i class="bbstg-ico-gift"></i><span class="bbstg-txt"><span class="bbstg-t1">' + gameDownloadConfig.text + '</span><span class="bbstg-t2">' + gameDownloadConfig.smallText + '</span></span></a>',
		breadHtml1 = '<a id="business_gamedownload_2" href="' + gameDownloadConfig.urls[1] + '" target="_blank" class="bbstg-btn-download-s"><i class="bbstg-ico-download-s"></i></a>',
		breadHtml2 = '<a href="' + gameDownloadConfig.urls[2] + '" target="_blank" id="business_gamedownload_3" class="bbstg-btn-gift-s"><i class="bbstg-ico-gift-s"></i></a>',
		downloadHtml = '<a id="business_gamedownload_4" href="' + gameDownloadConfig.urls[3] + '" target="_blank" class="bbstg-btn-download">下载游戏</a>',
		floatHtml = '<a id="business_gamedownload_5" style="z-index: 9999;" href="' + gameDownloadConfig.urls[4] + '" target="_blank" class="bbstg-btn-chests"></a>';
	
	if(gameDownloadConfig.urls[0]){
		$(topHtml).insertAfter('#hdc h2');
	}		
	if(gameDownloadConfig.urls[1]){
		$(breadHtml1).insertBefore('#pt .z em:last');
	}
	if(gameDownloadConfig.urls[2]){
		$(breadHtml2).insertBefore('#pt .z em:last');
	}
	if(gameDownloadConfig.urls[3]){
		$(downloadHtml).appendTo('#pgt');
	}
	if(gameDownloadConfig.urls[4]){
		$(floatHtml).appendTo('body');
	}

	if(gameDownloadConfig.actId){
		$.ajax({
			url: 'http://p.act.17173.com/api/v2/activity/' + gameDownloadConfig.actId + '/info',
			dataType: 'jsonp',
			success: function(data){
				$('.bbstg-t2').text(data.joins + '人已领取');
			}
		});

		$('[id*=business_gamedownload_]').click(function(){
			$.getJSON('http://p.act.17173.com/api/v2/activity/' + gameDownloadConfig.actId + '/join?callback=?');
		});
	}

    window._jc_ping = window._jc_ping || [];
    _jc_ping.push([
           '_trackModule',
           $('#business_gamedownload_1'),
           'faQfaq'
    ]);
    _jc_ping.push([
           '_trackModule',
           $('#business_gamedownload_2'),
           'byEnMv'
    ]);
    _jc_ping.push([
           '_trackModule',
           $('#business_gamedownload_3'),
           'qAZZ7n'
    ]);
    _jc_ping.push([
           '_trackModule',
           $('#business_gamedownload_4'),
           'YB7VZ3'
    ]);
    _jc_ping.push([
           '_trackModule',
           $('#business_gamedownload_5'),
           'vYfAZr'
    ]);
}(jQuery)