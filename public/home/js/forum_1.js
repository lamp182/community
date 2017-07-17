


function lsSubmit(){
	Passport.Dialog.show({
		modal:true
	})
}

function showTopLinkNew() {
	var ft = $('hdc');
	if(ft){
		var scrolltop = $('scroll-back'),
			scrolltop1 = $('scrolltop1');
		var viewPortHeight = parseInt(document.documentElement.clientHeight);
		var scrollHeight = parseInt(document.body.getBoundingClientRect().top);
		var basew = parseInt(ft.clientWidth);
		var sw = scrolltop.clientWidth;
		
		var left = parseInt(fetchOffset(ft)['left']);
		left = left < sw ? left * 2 - sw : left;
		scrolltop.style.left = ( basew + left ) + 'px';
		if($('business_gamedownload_5')){
			$('business_gamedownload_5').style.left = ( basew + left - 80 ) + 'px';
		}
		
		if (BROWSER.ie && BROWSER.ie < 7) {
			scrolltop.style.top = viewPortHeight - scrollHeight - 200 + 'px';
		}
		if (scrollHeight < -100) {
			scrolltop1.style.display = 'block';
		} else {
			scrolltop1.style.display = 'none';
		}
	}
}

jQuery(function($){

	Passport.on(Passport.EVENTS.loginSuccess, function () {
		$('.pp-login2').hide();
		showWindow('login', 'member.php?mod=logging&action=login&loginsubmit=yes&infloat=yes&lssubmit=yes&inajax=1');
	});


	$('#logout').click(function(e){
		e.preventDefault();
		var logoutUrl = $(this).attr('href');
		Passport.on(Passport.EVENTS.logoutSuccess, function () {
			window.location = logoutUrl;
		});
		Passport.logout(e);
	})

	$('.hd-r').click(function(){
		if($('.sub-screen-hot').length){
			$('.sub-screen-hot').toggle();
			$('.sub-screen-hot').is(':hidden')?$(this).find('span').addClass('plus'):$(this).find('span').removeClass();
		} else {
			$('iframe').eq(0).toggle()
			$('iframe').eq(0).is(':hidden')?$(this).find('span').addClass('plus'):$(this).find('span').removeClass();
		}
	});

	$('.closeTip').click(function(e) {
		$('.advancemodeTip').remove();
	});
	if(getcookie('advancemodeTip') != '' &&  getcookie('advancemodeTip') < 0){
		$('.advancemodeTip').remove();
	}
	showTopLinkNew();
	$(".js-list1 li:even").addClass("even");
	$(".js-list2 li:even").addClass("even");
	$('.js-scroll-top').click(function(e){
		e.preventDefault();
		window.scrollTo('0','0');
	});
	$('.js-nav').hover(function(){
		$('.nav-list').show();
		
		var top = -($('.nav-list').height() - $('#scroll-back').height() + 12);
		$('.nav-list').css({top:top+'px'});
	},function(){
		$('.nav-list').hide();
	}).click(function(e){
		e.preventDefault();
	});

	$('.nav-list').hover(function(){
		$('.nav-list').show();
	},function(){
		$('.nav-list').hide();
	})
	$(".js-tab").each(function(){
		$(".mod-tab",$(this)).tabs($("div.mod-panes > div",$(this)),{event:'mouseover'});
	});	
	
	$(".js-tab-click").each(function(){
		$(".mod-tab",$(this)).tabs($("div.mod-panes > div",$(this)),{event:'click'});
	});	


	$(".js-hover").each(function(){
		$(this).children().each(function(){
			$(this).hover(
			  function () {
				$(this).addClass("hover");
			  },
			  function () {
				$(this).removeClass("hover");
			  }
			);
		});	
	});
	
	$(".js-odd").each(function(){
		$(this).children(":odd").addClass("odd");	
	});
	
	$(".js-even").each(function(){
		$(this).children(":even").addClass("even");	
	});	
	
	
	_attachEvent(window, 'scroll', function(){showTopLinkNew();});
	
	if(Passport.isLoggedIn()){
		$('.pp-login2').hide();
		$('#psptR').show()
	} else {
		$('.pp-login2').show();
		$('#psptR').hide();
	}

	$('.pp-login-bt1').click(function(e) {
		Passport.Dialog.show({
			modal:true
		})
	});
	$('.ppLogout').click(function(e) {
        Passport.logout(e);
		$('#psptR').hide();
    });

	if ($('.sslct_btn').size()>0) {
		if($('.sslct_btn').attr('title').indexOf('VR') > -1){
			$('.hdc h2 a').html('<img src="/template/17173_2013_2/style/t9/logo.png">');
		}
	}	

	$('.toggle-editor-actions').click(function(){
		var $action = $(this).prev('div')
		$action.toggle();
		$action.is(':visible') ? $(this).find('span').attr('class', 'actions-visible') : $(this).find('span').attr('class', 'actions-invisible');
	})

	if(typeof forumId != 'undefined' && typeof STYLEID != 'undefined' && STYLEID != 6 ){
		for(var prop in forums){
			var id = 'f' + forumId;
			if(prop.indexOf(id) > -1){
				$('#hdc h2 a').attr({'href': forums[prop][1], 'target': '_blank'});
			}
		}
	}

	// 添加APP广告
	$('.mn-main a[href="forum.php?gid=8702"]')
		.after('<a style="position:absolute; top:11px; left:100px;" href="http://a.17173.com/tg/channel/index.html?id=A0011502201" target="_blank"><img src="http://ue.17173cdn.com/a/bbs/index/2014/images/btn_app.gif"></a>');


	//大话西游2广告
	var dh2Id = '9465_9466_9467_9468';
	if(typeof forumId !== 'undefined' && forumId !== '' && forumId !== '0' && dh2Id.indexOf(forumId) > -1){
		$('<a href="http://act.17173.com/2014/08/dh20806/" target="_blank" style="width:710px; height:95px; margin-left:-320px; position:absolute; top:8px; left:50%; display:block;"></a>').appendTo('#hdc');
	}
	//问道广告
	var wdId = '9410_1723_1724';
	if(typeof forumId !== 'undefined' && forumId !== '' && forumId !== '0' && wdId.indexOf(forumId) > -1){
		$('<a href="http://act.17173.com/os/2014/09/wd0916" target="_blank" style="width:710px; height:95px; margin-left:-320px; position:absolute; top:8px; left:50%; display:block;"></a>').appendTo('#hdc');
	}


});

