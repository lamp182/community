


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



