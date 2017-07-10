/*jshint camelcase: false 1*/
$.fn.extend({
	reflect: function (parent, target) {
		return $(this).siblings(target).length ? $(this).siblings(target) : $(this).parents(parent).find(target);
	},
	serializeObject: function () {
		var o = {};
		var a = this.serializeArray();
		$.each(a, function () {
			if (o[this.name] !== undefined) {
				if (!o[this.name].push) {
					o[this.name] = [o[this.name]];
				}
				o[this.name].push(this.value || '');
			} else {
				o[this.name] = this.value || '';
			}
		});
		return o;
	}
});
$.extend({
	/**
	 * @name setCookie
	 * @function
	 *
	 * @description 写入cookie
	 * @param {String} name cookie名
	 * @param {String} value cookie值
	 * @param {Number} expires 过期时间(从设置值开始之后的毫秒数)
	 * @returns {undefined}
	 */
	setCookie: function (name, value, expires) {
		var cookieString = name + '=' + escape(value);
		//判断是否设置过期时间
		if (expires) {
			var date = new Date();
			date.setTime(date.getTime() + expires);
			cookieString += '; expires=' + date.toGMTString();
		}
		document.cookie = cookieString+ '; path=/';
	},
	/**
	 * @name getCookie
	 * @function
	 *
	 * @description 获取指定名称的cookie值
	 * @param {String} name cookie名称
	 * @returns {String} cookie值,找不到指定的key时,返回''
	 */
	getCookie: function (name) {
		var arr,
			reg = new RegExp('(^| )' + name + '=([^;]*)(;|$)');
		arr = document.cookie.match(reg);
		if (arr) {
			return unescape(arr[2]);
		}
		return '';
	},
	/**
	 * @name deleteCookie
	 * @function
	 *
	 * @description 删除指定名称的cookie值
	 * @param {String} name cooki名称.
	 * @returns {undefined}
	 */
	deleteCookie: function (name) {
		$.setCookie(name, 1, -1000);
	}
});
//通行证后缀处理
var handleSuffix = function (value, element) {
	var hasSuffix = !! $(element).reflect('.fbox', '.suffix').length;
	if (!hasSuffix) {
		value = value.split('@')[0];
	}
	return value;
};
//汉字长度二字节-字符串长度计算
var getLengthCNChar = function (str) {
	var len = str.length;
	var ret = 0;
	for (var i = 0; i < len; i++) {
		if (str.charCodeAt(i) < 27 || str.charCodeAt(i) > 126) {
			// 全角	
			ret += 2;
		} else {
			ret++;
		}
		//console.log(str, ret);
	}
	return ret;
};
//汉字长度二字节-字符串截取
var getSubStrCNChar = function (str, subLen) {
	var len = str.length;
	var ret = '';
	var count = 0;
	for (var i = 0; i < len; i++) {
		if (str.charCodeAt(i) < 27 || str.charCodeAt(i) > 126) {
			// 全角	
			count += 2;
		} else {
			count++;
		}
		if (count > subLen) {
			return ret;
		}
		ret += str.charAt(i);
	}
	return ret;
};
var getDomain = function (str) {
	return str.split('@')[1];
};
jQuery.validator.messages = {
	required: '此项必填',
	remote: '此项错误（Please fix this field.）',
	email: '必须为邮箱格式',
	url: 'URL格式错误',
	date: '日期格式错误',
	dateISO: '日期（ISO）格式错误',
	number: '请按要求输入数字',
	digits: '请输入数字',
	creditcard: '信用卡格式错误',
	equalTo: '重复输入不一致',
	maxlength: $.validator.format('至多 {0} 字符'),
	minlength: $.validator.format('至少 {0} 字符'),
	rangelength: $.validator.format('长度应为 {0}～{1} 个字符'),
	range: $.validator.format('此值应介于 {0}～{1}之间'),
	max: $.validator.format('此值应小于或等于 {0}'),
	min: $.validator.format('此值应大于或等于 {0}')
};
jQuery.validator.setDefaults({
	debug: true
});

jQuery.validator.addMethod('startWithLetter', function (value, element, param) {
	var hasSuffix = !! $(element).reflect('.fbox', '.suffix').length;
	if (getDomain(value) !== '17173.com' && !hasSuffix) {
		return true;
	}
	return this.optional(element) || /^[a-zA-Z].*$/gi.test(value);
}, '需以英文字母开头');
/* jQuery.validator.addMethod('surfixCheck', function(value, element, param) {
//	console.log(arguments);
	var hasSuffix= !!$(element).reflect('.fbox', '.suffix').length;
	var reg_withSuffix= /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@(17173.com)$/i;
	
	var reg_withoutSuffix= /^((?!(@17173.com)).)*$/i; //不含@、中文、空格
	var reg= hasSuffix? reg_withoutSuffix: reg_withSuffix;
//	console.log(reg);
	return this.optional(element) || reg.test(value);
}, '格式有误(<strong style="font-weight:bold;">@17173.com</strong>)'); */
jQuery.validator.addMethod('lnOnly', function (value, element, param) {
	value = handleSuffix(value, element);
	//	console.log(value);
	return this.optional(element) || /^[a-zA-Z0-9_]+$/gi.test(value);
}, '需由字母、数字或下划线组成');
jQuery.validator.addMethod('mailOrPhone', function (value, element, param) {
	//console.log(value);
	return this.optional(element) || !(!/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test(value) && !(/^1[3|4|5|7|8][0-9]\d{8}$/.test(value)));
}, '通行证必须为手机号/ 邮箱格式');
jQuery.validator.addMethod('NOnly', function (value, element, param) {
	value = handleSuffix(value, element);
	//	console.log(value);
	return this.optional(element) || /^[0-9]+$/gi.test(value);
}, '请勿输入非数字字符');
jQuery.validator.addMethod('noCNChar', function (value, element, param) {
	return this.optional(element) || /^((?!([\u4E00-\u9FA5])).)*$/i.test(value);
}, '该项禁用中文字符');
jQuery.validator.addMethod('mobile', function (value, element, param) {
	return this.optional(element) || /^1[3|4|5|7|8][0-9]\d{8}$/.test(value);
}, '请填写正确的手机号');
jQuery.validator.addMethod('noSpace', function (value, element, param) {
	return this.optional(element) || /^((?!(\s)).)*$/i.test(value);
}, '请勿输入空格');
jQuery.validator.addMethod('rangelengthCNChar', function (value, element, param) {
	value = handleSuffix(value, element);

	var length = getLengthCNChar(value);
	return this.optional(element) || (length >= param[0] && length <= param[1]);
}, '长度应为 {0}～{1} 个字符');
jQuery.validator.addMethod('exclusive', function (value, element, param) {
	var isPass = true;
	for (var i = 0; i < param.length; i++) {
		if (param[i] === value) {
			isPass = false;
			//console.log(isPass);
		}
	}
	return this.optional(element) || isPass;
}, '该密码在弱密码特征库中');
jQuery.validator.addMethod('regTestNope', function (value, element, param) {
	return this.optional(element) || !param.test(value);
}, '格式不正确');
jQuery.validator.addMethod('pwstrength', function (value, element, param) {
	var strength = $.pwstrength ? $.pwstrength(value) : 1; //require: jquery.pwstrength.js
	return this.optional(element) || strength > 0 || /^[a-zA-Z]+$/.test(value) && !/^(\D)\1*$/gi.test(value); //1弱密码；2纯字母且不重复
}, '请勿使用纯数字、纯字符或同一字母');
jQuery.validator.addMethod('ajaxCheck', function (value, element, params) {
	this.settings.onkeyup = function () {};
	var name = $(element).data('name') || element.name;
	var form = $(element).parents('form');
	var isPass = false;
	var constRecomBox = function (_nicks) {
		var _html = '';
		for (var i = 0; i < _nicks.length; i++) {
			_html += '<span><input type="radio" name="recmd_nicks" id="' + _nicks[i] + '"/><label for="' + _nicks[i] + '">' + _nicks[i] + '</label></span>';
		}
		_html += '<a href="#" id="change-recomnick">都不喜欢？换一换</a>';
		if (form.find('#recmd_nicks').length) {
			form.find('#recmd_nicks').html(_html).show();
			form.find('p.nickname').css('height', '172px');
		}
		$('#change-recomnick').on('click', function (e) {
			e.preventDefault();
			$.ajax({
				url: '/register/recmdnicks',
				data: {
					nickname: value,
					domain: '17173.com'
				},
				dataType: 'json',
				method: 'get',
				success: function (res) {
					if (res.status === 1) {
						constRecomBox(res.data.recmd_nicks);
					} else {
						art.alert(res.msg);
					}
				}
			});
		});
	};
	var elSuffix = $(element).reflect('.fbox', '.suffix');
	if (elSuffix.length) {
		value += elSuffix.html();
	}
	var oData = {
		field: name,
		value: value
	};
	var elUN = form.find('[name="username"]');
	if (elUN.length) {
		oData.domain = elUN.val().split('@')[1] || '17173.com'; //默认域（快速注册页需要）
	}

	$.ajax({
		async: false,
		cache: false,
		url: params[0],
		dataType: 'json',
		data: oData,
		success: function (res) {
			if (res.status !== 0) {
				isPass = true;
				//console.log(isPass);
			} else {
				if (res.data && res.data.recmd_nicks) {
					constRecomBox(res.data.recmd_nicks);
					//Bug #3302(昵称推荐面板不消失) hack
					$(element).one('focusout', function () {
						if (form.find('#recmd_nicks').length) {
							form.find('#recmd_nicks').html('').hide();
							form.find('p.nickname').css('height', '42px'); //placeholda 重定位
							/* setTimeout(function(){
									$(window).trigger('resize');
								}, 0); */
						}
					});
					//placeholda 重定位
					/* setTimeout(function(){
							$(window).trigger('resize');
						}, 0); */
					//获取焦点隐藏昵称推荐 BY HZJ
					$(element).bind('focus', function () {
						$('#recmd_nicks').hide();
						$('p.nickname').removeAttr('style');
						//placeholda 重定位
						/* setTimeout(function(){
								$(window).trigger('resize');
							}, 0); */
					});
				} else {
					//Bug #5600 其他输入框的任何操作均不会对昵称推荐面板造成影响。
					/* if(form.find('#recmd_nicks').length){
							form.find('#recmd_nicks').html('').hide();
							form.find('p.nickname').css('height', '42px');
							//placeholda 重定位
							setTimeout(function(){
								$(window).trigger('resize');
							}, 0);
						} */
				}
			}
			if(res.msg){
				if($("form input[name=type]").eq(0).val() == "dialog" && res.msg.indexOf("直接登录") != -1){
					params[1] = "您填写的帐号已注册，请点击下方“已有账号登录”链接登录";
				}else{
				params[1] = res.msg; //messages定义 => res.msg => params[1]
				}
			}
		},
		error: function () {
			params[1] = '连接出错，请重试';
		}
	});
	//		$(this).data('last', +new Date);
	return this.optional(element) || isPass;
	//	}else{
	//		$(this).data('last', +new Date);
	//		return true
	//	}
}, jQuery.format('{1}'));

/*将用户填写的字符串单次md5后取前8位，如果匹配则通过*/
jQuery.validator.addMethod('cipherCheck', function (value, element, params) {
	//if(value== 15555555555) return true;
	var sEA = $(element).data('cipher');
	var sA8 = md5(value).substring(0, 8);
	//console.log(sEA, sA8);
	//(sEA=== sA8)&& !!params[1]&& params[1].call(this);
	return this.optional(element) || sEA == sA8;
}, jQuery.format('{0}'));
/*将用户填写字符串 每一位取ascii码（是一个数字）相加 得到的值如果跟hash匹配 则通过*/
jQuery.validator.addMethod('hashCheck', function (value, element, params) {
	var sEA = $(element).data('hash');
	for (var i = $(element).val().length - 1, h = 0; i >= 0; --i){
		h += $(element).val().toLowerCase().charCodeAt(i);
	}
	//console.log(sEA, h);
	return this.optional(element) || sEA == h;
}, jQuery.format('{0}'));
jQuery.validator.addMethod('noSimilarTo', function (value, element, param) {
	var target = $(param);
	//console.log(target);
	if (target.length === 0) {
		return true;
	} else {
		if (this.settings.onfocusout) {
			target.unbind('.validate-equalTo').bind('blur.validate-equalTo', function () {
				$(element).valid();
			});
		}
		return (value !== handleSuffix(target.val(), target)
			/* &&  (value.indexOf(target.val())>0
				|| target.val().indexOf(value)>0) */
		);
	}
});
/* jQuery.validator.addMethod('math', function(value, element, params) { 
	params[2]= 3;
	return this.optional(element) || value == params[0] + params[1]; 
}, jQuery.format('Please enter the <i>correct</i> value for {0} + {1}={2}')); */

var validateCfg = {
	errorElement: 'span',
	findVisual: function (element) {
		var elVisual = element.attr('data-visual') ? element.parents(element.attr('data-visual')) : element;
		return elVisual[0];
	},
	//确定错误容器
	errorPlacement: function (error, element) {
		element = this.findVisual(element);
		var elContainer = $(element.form).find('#errContainer');
		var elErrContainer = elContainer.length ? elContainer : $(element).reflect('.fbox', '.errContainer');
		//console.log(elErrContainer);
		elErrContainer.html(error).addClass('alarm');
	},
	//验证出错
	highlight: function (element, errorClass, validClass) {
		//console.log('hl');
		$(element).addClass(errorClass).removeClass(validClass);
		var elVailBoard = $(element).reflect('.fbox', '.js-validate-board');
		if (elVailBoard.html()) {
			elVailBoard.show();
		} else {
			elVailBoard.hide();
		}
		var elContainer = $(element.form).find('#errContainer');
		if (elContainer.length) {
			elContainer.addClass('alarm');
		} else {
			//console.log($(element.form).find('span[for="' + element.id + '"]'))
			
			$(element).reflect('.fbox', '.errContainer').removeClass('alarm-right');//$(element.form).find('span[for="' + element.id + '"]').parents('.errContainer').removeClass('alarm-right');
		}
	},
	onfocusout: function (element, event) {
		var bResult;
		if (!this.checkable(element) /* && (element.name in this.submitted || !this.optional(element)) */ ) {
			bResult = this.element(element);
		}
		//通过 data-disable 控制目标元素禁用状态
		var strDisable = $(element).data('disable');
		if (strDisable) {
			var elDisable = $(strDisable);
			if (bResult) {
				if(elDisable.length){
					elDisable.attr('disabled', false);
				}
			} else {
				if(elDisable.length){
					elDisable.attr('disabled', true);
				}
			}
		}
	},
	//验证通过
	unhighlight: function (element, errorClass, validClass) {
		//console.log('uhl');
		$(element).removeClass(errorClass).addClass(validClass).reflect('.fbox', '.js-validate-board').hide();
		var elContainer = $(element.form).find('#errContainer');
		if (elContainer.length) {
			elContainer.removeClass('alarm');
		} else {
			//通过elemnt.name区分placeholder插件产生的伪装 password元素
			if(element.name){
				$(element).reflect('.fbox', '.errContainer').addClass('alarm-right');//$(element.form).find('span[for="' + element.id + '"]').parents('.errContainer').addClass('alarm-right');
			}
		}
	},
	//成功提示
	success: function (label, element) {
		//console.log('succ')
		var elContainer = $(element.form).find('#errContainer');
		if (elContainer.length) {
			label.html('');
		} else {
			if(element.name){
				label.html('填写正确').parent('.errContainer').addClass('alarm-right');
			}
		}
	},
	submitHandler: function (form) {
		//console.log('验证无误，提交的表单信息：', decodeURI($(form).serialize()));
		var _this = this;
		var elResult = $(form).find('#result');
		var elMD5 = $(form).find('input.js-md5'); //md5加密
		if(elMD5.length){
			elMD5.data('oldValue', elMD5.val()).val(md5(elMD5.val()));
		}
		var elMobile = $(form).find('input.js-mobile'); //手机号反格式化
		if(elMobile.length){
			elMobile.data('oldValue', elMobile.val()).val(elMobile.val().replace(/(\+86|\s)/ig, '').replace('+86','').replace(' ',''));
		}

		var oData = $(form).serializeObject();
		/* var elUsername= $(form).find('[name="username"]');
		if (elUsername.length){
			var a= elUsername.val().split('@');
			oData.username= a[0];
			oData.domain= a[1];
		} */
		if ($(form).data('ajax') === 'no') { //非异步提交表单
			$(form).find('[type="submit"]').attr('disabled', true);
			form.submit();
			return;
		}
		var dataType = $(form).data('datatype') || 'json';
		var timer = setTimeout(function () {
			$(form).find('[type="submit"]').attr('disabled', false);
			art.alert('请求超时，请重试。');
		}, 10000); //超时时间（避免jsonp 请求错误后不响应）
		var href = window.location.href;
		$.ajax({
			url: form.action || href,
			type: $(form).attr('method') || 'post',
			data: oData,
			dataType: dataType,
			/* headers: {'X-Referer': href}, */
			beforeSend: function () {
				$(form).find('[type="submit"]').attr('disabled', true);
			},
			complete: function () {
				clearTimeout(timer);
				$(form).find('[type="submit"]').attr('disabled', false);
				elMD5.val(elMD5.data('oldValue')); //md5还原
				elMobile.val(elMobile.data('oldValue')); //md5还原
			},
			success: function (res) {
				clearTimeout(timer);
				$(form).find('.js-validcode-change').trigger('click'); //刷新验证码
				if (res.status === 1) {
					if (res.data && res.data.forward) { //用户注册页
						if (res.data.logout && Passport && Passport.logout){
                            Passport.logout();
                        }
						if ($(form).data('showmsg')) {
							var COUNTDOWN = 5;
							var okAction = function () {
									top.location.href = res.data.forward;
							};
							var dialog = art.dialog({
								content: res.msg,
								lock: true,
								button: [{
									id: 'button',
									value: '确定 (' + COUNTDOWN + ')',
									callback: okAction
								}]
							});

							var i = COUNTDOWN;
							var countDownTimer = setInterval(function () {
								i--;

								dialog.button({
									id: 'button',
									value: '确定 (' + i + ')'

								});
								//按 esc键停止倒计时
								$(document).on('keydown', function (e) {
									if (e.keyCode == 27){
										clearInterval(countDownTimer);
									}
								});
								if (i === 0) {
									clearInterval(countDownTimer);
									dialog.button({
										id: 'button',
										value: '确定'
									});
									okAction();
								}
							}, 1000);
						} else {
							form.reset();
						//	top.location.href = res.data.forward;
								if($("form input[name=type]").eq(0).val() == "dialog"){
									window.location.href = res.data.forward;
								}else{
									top.location.href = res.data.forward;
								}
						}
					}else if(res.data && res.data.pre_validation_success){
					//前置验证成功 关闭弹窗
						art.dialog.get('pre_validator').close();
					} else {
						art.alert(res.msg, function () {
							location.reload();
						});
					}
				} else if (res.status === 0 || res.status === -1) {
					if (res.data && res.data.err_field) {
						var o = {};
						o[res.data.err_field] = res.msg;
						//						console.log(o, _this);
						_this.showErrors(o);
						//$(form).find('[name="'+ res.data.err_field+ '"]').focus();
					}else if(res.data && res.data.pre_validator){
					// 找回密码前置验证弹窗
						$('#js-prompt .tcolor').html(res.data.pre_validator[1]);
						var prompt= art.dialog({
							id: 'pre_validator',
							content: document.getElementById('js-prompt'),
							lock: 1
						});
					} else {
						art.alert(res.msg);
					}
				} else if (res.status === 10) {
					//登录密码试错3次以上，需要验证码
					$('.js-validcode-change').click();
					if($('.safe-code').is(':visible')){
						art.alert(res.msg);
					}
					$('.safe-code').show();
				} else if (elResult.length) {
					elResult.html(res);
				} else {
					alert('未定义的返回参数，状态码:' + res.status + decodeURI($(form).serialize()));
				}
			},
			error: function () {
				clearTimeout(timer);
				$(form).find('[type="submit"]').attr('disabled', false);
				//alert('请求【submit】出错，类型：'+ arguments[2]+ '，请重试。');
			}
		});
	},
	/* focusCleanup: true, */
	focusInvalid: false,
	/* onfocusout: false, */
	/* errorLabelContainer: '#recmd_nicks', */
	/* invalidHandler: function(event, validator){
		console.log(validator.showErrors());
	}, */
	ignore: '.js-ignore', //避免 :hidden 元素被忽略
	rules: {
		username: {
			required: true,
			lnOnly: true,
			/*rangelengthCNChar: [6, 20],*/
			noSpace: true,
			mailOrPhone: true
		},
		nickname: {
			required: true,
			rangelengthCNChar: [6, 20]
		},
		password: {
			required: true,
			noCNChar: true,
			noSpace: true,
			minlength: 6,
			noSimilarTo: 'input[name="username"]'
		},
		password2: {
			required: true,
			noCNChar: true,
			noSpace: true,
			rangelength: [6, 20]
		},
		old_password: {
			required: true,
			noCNChar: true,
			noSpace: true,
			rangelength: [6, 20]
		},
		password_confirm: {
			required: true,
			noCNChar: true,
			rangelength: [6, 20],
			noSpace: true,
			equalTo: '#pw'
		},
		password_repeat: { // “别名”（/partner/activate?scenario=bind 页）
			required: true,
			noCNChar: true,
			rangelength: [6, 20],
			noSpace: true,
			equalTo: '#pw'
		},
		mobile: {
			mobile: true,
			required: true
		},
		email: {
			required: true,
			email: true
		},
		validcode: {
			required: true,
			hashCheck: '验证码错误'
		},
		agreement: {
			required: true
		},
		agreement2: {
			required: true
		},
		submit: {
			depends: function (element) {
				//console.log(arguments);
				return !!$('#agreement:checked').length;
			}
		},
		mobile_verify_code: {
			required: true,
			minlength: 6
		},
		email_verify_code: {
			required: true,
			minlength: 6
		},
		answer: {
			required: true
		}

	},
	messages: {
		password: {
			noSimilarTo: '密码不能与通行证相同'
		},
		password_confirm: {
			equalTo: '两次密码输入不一致'
		},
		agreement: '请接受服务条款',
		sex: '此项必选'
	}
};

/* jQuery.validator.addClassRules({
	'js-passport': {
		required: true
	}
}); */
var logoutFn= function () {
	Passport.on(Passport.EVENTS.logoutSuccess, function () {
		$.deleteCookie('site_hide-modify-dialog');
		top.location.href = '/logout';
	});
	Passport.logout();
};
jQuery(function () {


	//增减表单字段 begin
	var addField = function (e) {
		var sName = $(this).data('field');
		var sHidden = '.js-field-' + sName + ':hidden';
		var i = $(sHidden).length;
		if (i === 0) {
			art.alert('请勿超过三项').follow(e.target);
		} else {
			elFirst = $(sHidden).first();
			if(!elFirst.find('input').last().val()){
				elFirst.find('.alarm').hide(); //隐藏绿勾
			}
			elFirst.show();

		}
	};
	var removeField = function () {
		var sName = $(this).data('field');
		var sField = '.js-field-' + sName;
		var elField = $(this).parents(sField);
		elField.find('input').val('');
		elField.find('.js-select-container').trigger('reset');
		$(elField).hide();
	};
	var clearField = function () {
		var sFor = $(this).data('target');
		var elForm = $(this).parents('form');
		var elField = elForm.find(sFor).length ? elForm.find(sFor) : $(this).reflect('.fbox', 'input'); //  //不指定 target 则清除兄弟input节点内容
		elField.attr('value', '').focus();
	};
	var replaceField = function (target, template) {
		var sField = '.js-field-' + target;
		var elField = $(sField);
		var fTpl = $.validator.format($.trim($('#template-' + template).val()));
		elField.replaceWith(fTpl());
	};
	//增减表单字段 end

	var initForm = function () {
		/* var ipts= $(this).find('input, textarea');
		ipts.each(function(){
			this.id= this.name;
			console.log(this)
		}) */
		//elContainer事件初始化 start
		$('.js-select-container').each(function (i, el) {
			/* 下拉栏绑定事件 */
			var elContainer = $(el);
			var outclick = function (e) {
				e.stopPropagation();
				if (!elContainer.has(e.target).length) {
					//console.log(e.target, 'outclick', elContainer);
					elContainer.trigger('dropup');
				}
			};
			if (!elContainer.data('eventAttached')) {
				//container (TODO: class modify)
				elContainer
					.on('dropdown', function () {
						//console.log('dropdown fired');
						$('.arrow', $(this)).addClass('arrow-on');
						$('.list-select', $(this)).show();
						elContainer.data('dropdownStatus', true);
						$(this).addClass('input-txt-on');
						$('body').one('mousedown', outclick);
					})
					.on('dropup', function () {
						//console.log('dropup fired');
						$('.arrow', $(this)).removeClass('arrow-on');
						$('.list-select', $(this)).hide();
						elContainer.data('dropdownStatus', false);
						$(this).removeClass('input-txt-on');
						$('body').unbind('mousedown', outclick);
					})
					.on('reset', function () {
						elContainer.trigger('dropup')
							.find('.js-select-name').html('请选择');
						elContainer.find('.js-select-value').val('');
					});
				elContainer.data('eventAttached', true);
			}
		});
		//elContainer事件初始化 end
	};

	var clickContainer = function (e) {
		e.stopPropagation();
		var elContainer = $(this);
		var elDropdown = elContainer.find('.js-select-dropdown');
		var elValue = elContainer.find('.js-select-value');
		var listSelectHeight = function () {
			$('form .box-select .list-select').each(function () {
				var $this = $(this);
				var thisH = parseInt($this.height(), 10);
				if (thisH > 200) {
					$this.height(200);
				}
			});
		};
		var initDropdown = function (data) {
			var html = '';
			for (var i in data) {
				html += '<li data-value="' + i + '">' + data[i] + '</li>';
			}
			//console.log(html);
			elDropdown.html(html);
			listSelectHeight();
		};

		var _data = $.parseJSON(elValue.attr('data-json')) || elContainer.data('json'); //attr-> dom-> request
		//		console.log(_data);
		var _url = elValue.data('url') || '/'; //ie hack
		var _querystring = elValue.attr('data-querystring'); //request data


		/* 下拉栏判断状态 bug fix:点击下拉图标多次后无法收缩的问题 */
		//console.log(elContainer.data('dropdownStatus'))
		if (!elContainer.data('dropdownStatus')) {
			elContainer.trigger('dropdown');
		} else {
			elContainer.trigger('dropup');
		}

		//		console.log(_querystring, _data);
		//dropdown
		if (_data && !_querystring) { //don't use cached data
			initDropdown(_data);
		} else {
			$.ajax({
				url: _url,
				data: _querystring,
				dataType: 'json',
				success: function (res) {
					elContainer.data('json', res);
					//					console.log(res);
					initDropdown(res);
					elValue.removeAttr('data-querystring');
				}
			});
		}

	};
	var clickDropdown = function (e) {
		e.stopPropagation();
		var elContainer = $(this).parents('.js-select-container');
		/* var elDropdown= elContainer.find('.js-select-dropdown');
		elContainer.removeClass('input-txt-on');
		elDropdown.hide(); */
		var elValue = elContainer.find('.js-select-value');
		var elName = elContainer.find('.js-select-name');

		elValue.attr('value', $(this).data('value'));
		elName.html($(this).html());
		var _effect = elValue.data('effect');
		var sName = elValue.data('name') || elValue.attr('name').replace(/\[.*\]$/ig, '');
		$(_effect).attr('data-querystring', sName + '=' + elValue.attr('value')).trigger('reset');
		//console.log(elValue, $(this).attr('data-value'));
		elContainer.trigger('dropup');
		elValue.trigger('blur');
	};


	var elsForm = $('form.js-validateMe');
	/* for(var i= 0; i< elsForm.length; i++){
		var form= elsForm[i];
	}; */
	elsForm.each(function (i, form) {
		$(form).validate(validateCfg);
		var elUN = $(form).find('input[name="username"]');
		if (elUN.length && elUN.data('maillist')) {
			//补全
			elUN.emailMatch({
				aEmail: elUN.data('maillist'),
				className: 'smartBox'
				/* ,
				wrapLayer: form */
			});
			//隐藏“安全邮箱”字段
			setInterval(function () {
				if (elUN.val()) {
					//console.log('s')
					var strDomain = getDomain(elUN.val());
					var elEmailField = $('.js-field-email');
					var elEmail = elEmailField.find('input[name="email"]');
					if (strDomain && strDomain !== '17173.com') {
						elEmail.addClass('js-ignore');
						elEmail.val(elUN.val());
						elEmailField.hide();
					} else {
						elEmail.removeClass('js-ignore');
						if (elEmailField.css('display') === 'none') {
							//elEmail.val('').blur();
							elEmail.val('');
//							elEmailField.show();
						} if(strDomain && strDomain === '17173.com'){
						elEmailField.show();

					}
					}
				}
			}, 100);
		}
	});

	elsForm
		.on('init', initForm)
		.on('resetForm', function(){ //validator可通过触发resetForm事件清除所有字段验证提示信息。
			var $me= $(this);
			$me.data('validator').resetForm();
			$me.find('.errContainer').hide();
		})
		.on('click', '.js-addField', addField)
		.on('click', '.js-removeField', removeField)
		.on('click', '.js-clear', clearField)
		.on('click', '.js-select-container', clickContainer)
	//更换验证码
	.on('click', '.js-validcode-change', function (e) {
		e.preventDefault();
		var $form = $(e.delegateTarget);
		var elVCimg = $form.find('.js-validcode');
		var elVCInput = $form.find('input[name="validcode"]');
		var elerrContainer = elVCInput.reflect('.fbox', '.errContainer');
		$.ajax({
			url: elVCimg.data('src'),
			data: {
				refresh: 1
			},
			dataType: 'json',
			success: function (res) {
				elVCimg.attr('src', res.url);
				elVCInput.data('hash', res.hash1).val('');
				$form.find('.js-validcode-container').show();
			},
			complete: function () {
				elerrContainer.removeClass('alarm alarm-right').html('');
				//placeholda 重定位
				/* $(window).trigger('resize'); */
			}
		});
	})
	//显示验证码
	/* .one('focus', '[name="validcode"]', function(e){
		var elContainer= $(e.delegateTarget).find('.js-validcode-container');
		elContainer.find;
		
	}) */
	//通过下拉栏替换表单字段
	.on('click', 'li[data-value]', function (e) {
		e.preventDefault();
		var elContainer = $(this).parents('.js-select-container');
		var elValue = elContainer.find('.js-select-value');
		var nOld = '' + elValue.val();
		var nNew = '' + $(this).data('value');
		//console.log(nOld, nNew);
		replaceField(nOld, nNew);
	})
	//下拉菜单鼠标经过效果
	.on({
			'mouseenter': function () {
				$(this).addClass('on');
			},
			'mouseleave': function () {
				$(this).removeClass('on');
			},
			'click': clickDropdown
		},
		'.js-select-dropdown li')
	//倒计时按钮
	.on('click', '.js-btn-countdown', function (e) {
		e.preventDefault();
		var elBtn = $(this);
		var elForm = elBtn.parents('form.js-validateMe');
		var elInput = elBtn.reflect('form.js-validateMe', elBtn.data('input'));
		var dataType = elBtn.data('datatype') || 'json';
		var validator = elForm.data('validator');
		var _data = {};
		_data[elInput.attr('name')] = elInput.val()
			.replace(/(\+86|\s)/ig, '').replace('+86','').replace(' ',''); //临时方案：处理手机号格式;
		_data.random_license = elForm.find('[name="random_license"]').val();
		//TODO anvycn
		
		_data.password = elForm.find('[name="password"]').val();
		_data.validcode = elForm.find('[name="validcode"]').val();
		
		//elInput.blur(); //会导致多个单项检测请求
		if (validator.element(elInput)) {
			elBtn.addClass('btn-get-code-disabled').attr('disabled', true);
			var timer = setTimeout(function () {
				elBtn.removeClass('btn-get-code-disabled').attr('disabled', false);
				art.alert('请求超时，请重试。');
			}, 10000); //超时时间（避免jsonp 请求错误后不响应）
			$.ajax({
				url: elBtn.data('url'),
				data: _data,
				dataType: dataType,
				cache: false,
				type: 'post',
				success: function (res) {
					clearTimeout(timer);
					if (res.status == 1) {
						if(res.data && res.data.pre_validation_success){
						//前置验证成功 关闭弹窗
							art.dialog.get('pre_validator').close();
						}
						var secs = 120;
						elBtn.html('重新获取(' + secs + 'S)');
						elInput.addClass('input-disabled').attr('readonly', true);
						var countdown = setInterval(function () {
							elBtn.html('重新获取(' + (--secs) + 'S)');
							if (secs === 0) {
								elBtn.html('重新获取').removeClass('btn-get-code-disabled').attr('disabled', false);
								elInput.removeClass('input-disabled').attr('readonly', false);
								clearInterval(countdown);
							}
						}, 1000);
						art.alert('发送成功，请查收。');
					} else if (res.status == 3 || res.status === 0) {
						if(res.data && res.data.pre_validator){
							// 找回密码前置验证弹窗
							$('#js-prompt .tcolor').html(res.data.pre_validator[1]);
							var prompt= art.dialog({
								id: 'pre_validator',
								content: document.getElementById('js-prompt'),
								lock: 1
							});
						}else{
							var str;
							var err = {};
							err[elInput.attr('name')] = str;
							if (res.data && res.data.err_field) {
								str = res.msg;
								delete(err[elInput.attr('name')]); //后台指定
								err[res.data.err_field] = str;
							} else if (res.msg) {
								str = res.msg;
							} else {
								str = '发送失败，请稍后再试';
							}
							err[elInput.attr('name')] = str;
							elInput.blur();
							validator.showErrors(err);
						}
						elBtn.removeClass('btn-get-code-disabled').attr('disabled', false);
					} else {
						elBtn.removeClass('btn-get-code-disabled').attr('disabled', false);
						art.alert(res.msg);
					}
				},
				error: function () {
					clearTimeout(timer);
					elBtn.removeClass('btn-get-code-disabled').attr('disabled', false);
					//alert('请求出错，类型：'+ arguments[2]+ '，请重试。');
				}
			});
		}
	})
	//禁止粘贴密码
	.on({
		'paste': function (e) {
			e.preventDefault();
			alert('禁止粘贴密码');
		},
		'focus': function () {
			if($(this).val()){
				$('.tip-block').show();
			}
		},
		'blur': function () {
			$('.tip-block').hide();
		},
		'keyup': function () {
			if ( !! $(this).val()) {
				$('.tip-block').show();
			} else {
				$('.tip-block').hide();
			}
		}
	}, 'input[name="password"]')
	//注册页tip显/隐
	.on({
		'focus': function () {
			//console.log('focus');
			var elTip = $(this).reflect('.fbox', '.tip');
			var elErr = $(this).reflect('.fbox', '.errContainer');
			if(elTip.length){
				elTip.show();
			}
			if(elErr.length){
				elErr.hide();
			}
		},
		'blur': function () {
			var elTip = $(this).reflect('.fbox', '.tip');
			var elErr = $(this).reflect('.fbox', '.errContainer');
			if(elTip.length){
				elTip.hide();
			}
			if(elErr.length){
				elErr.show();
			}
		}
	}, '.js-validateMe input')
	//选择推荐后隐藏面板
	.on('click', '#recmd_nicks input', function (e) {
		var $nickname = $(e.delegateTarget).find('#nickname');
		$nickname.attr('value', this.id);
		setTimeout(function () {
			$nickname.trigger('focusout');
		}, 50);
	})
	//弹窗打开条款页
	.on('click', 'a[href="/register/clause"]', function (e) {
		//		alert('fs')
		e.preventDefault();
		var win = window.open('/register/clause', +new Date(), 'location=yes,left=200,top=100,width=1000,height=600,resizable=yes,scrollbars=yes,scrollbars=1');
		//		win.focus();
	})
	//显示密码按钮
	/* .on('click', '.js-showpassword', function(e){
		$(this).reflect('.fbox', '[name="password"]').togglePassword();
	}) */
	//直接登录链接，记录用户名供登录页使用
	.on({
		'mousedown': function () {
			var str= $('form:visible input[name="username"]').val()|| $('form:visible input[name="mobile"]').val();
			$.setCookie('username', str);
		}
	}, '.login_directly')
	.on('click', '.reg-tab-link', function (e) {
		e.preventDefault();
		var elForm = $(this).parents('.js-validateMe');
		elForm.hide();
		elForm.siblings('.js-validateMe').show();
	})
	.on('submit', function () {
		//$('#reg-page .fbox-tip .tip').hide(); //避免placeholda错位
		$(this).find('.tip').hide();
		$(this).find('.errContainer').show();
	});
	//隐藏tip
	/* elsForm.find('p .tip').hide(); */
	elsForm.trigger('init');

	//$('input, textarea').placeholder();

	//字符截取
	$('[data-clip]').each(function (i, el) {
		var LEN = $(el).data('clip');
		var str = $.trim($(el).html());
		el.title = str;
		var strDisplay = (getLengthCNChar(str) <= LEN) ? str : (getSubStrCNChar(str, LEN) + '…'); //超长截取
		el.innerHTML = strDisplay;
	});
	//直接加载验证码，而不是focus到验证码输入栏
	$('.js-validcode-change').trigger('click');
	$('.border-passport, .ui-passport-input-txt').on({
		'mouseenter': function(e){
			$(e.delegateTarget).addClass('input-txt-hover');
		},
		'mouseleave': function(e){
			$(e.delegateTarget).removeClass('input-txt-hover');
		},
		'focus': function(e){
			$(e.delegateTarget).addClass('input-txt-focus');
		},
		'blur': function(e){
			var el= $(e.delegateTarget);
			el.removeClass('input-txt-focus');
			if($(this).val()){
				el.addClass('input-txt-blur');
			}else{
				el.removeClass('input-txt-blur');
			}
		}
	}, 'input[type="text"], input[type="password"], input.placeholder');
	//页面弹窗
	var elPrompt= document.getElementById('js-prompt');
	if(elPrompt){
		var prompt= art.dialog({
			id: 'pre_validator',
			content: elPrompt,
			lock: 1,
			beforeunload: function(){
				//parent.Passport.Guide.hide();
			}
		});
		$('#hide-dialog').on('click', function(e){
			e.preventDefault();
			prompt.hidden();
		});
	}
});








//倒计时120s开始
var codeTiming = 120;
var codeTimeDo;

function codeTime() {
	var codeTimeText = "点击获取验证码(" + codeTiming +"s)";
	$(".zg-code-btn").text(codeTimeText);
	if (codeTiming == 0){
		clearInterval(codeTimeDo);
		$(".zg-code-btn").text("点击获取验证码");
		codeTiming = 121;
//	$("#safe-code").removeAttr("readonly");
//	$("#codeDo .txt").show();
	}
	codeTiming--;
//	$("#codeDo .txt").hide();
}
//end


$(document).ready(function(){
	//通用滑门
$(".reg-tab-nav").each(function(i){
	$(this).click(function(){
			$(".login-form").eq(i).show().siblings(".login-form").hide(0);
			$(".reg-do-list").eq(i).show().siblings(".reg-do-list").hide(0);
			$(this).addClass("on").siblings("").removeClass("on");
			$("#reg-page .input-passport").eq(i).focus();
	})
});

//			$("#reg-page .input-passport").eq(0).focus();

//end
//$("#safe-code-mobile").attr("readonly","readonly");//禁止输入手机验证码
$("#safe-code-mobile").attr("disabled","disabled");//禁止输入手机验证码

$(".quickdo").click(function(){
	$(".quick-login").toggleClass("quick-login-do");
})

//滑门切换时请求ajax	
$(".reg-tab-nav").eq(1).click(function(){
	$(".content-reg-mobile .fbox").eq(1).after($("#codeDo"));
	$("#codeDo .box-safe-code").css("display","inline");
	$(".js-validcode-change").eq(0).click();
	$.ajax({
		type: "GET",
		url: "/register/mobilescene",
		dataType: 'json',
		cache: false,//禁止取缓存
		success: function(data){
			if(data.msg == "sms"){
				$(".content-reg-mobile").empty().append("<div class='mobileUpDo'><p>请编辑短信：<span>53#TN#您所需要设置的密码</span>发送到<strong>1069013317173</strong></p><p>TN与密码之间使用<span>#</span>隔开</p><p class='c999'>密码格式：6~20个字符，纯字母、数字、标点为弱密码，不可使用</p></div>")
			}
			
		}
});
})
//end

$(".reg-tab-nav").eq(0).click(function(){
	$(".content-reg-mail .fbox").eq(2).after($("#codeDo"));
		$(".js-validcode-change").eq(0).click();
})

//注册阻隔策略
$(".zg-code-btn").click(function(){
	$(".content-reg-mobile #passport, .content-reg-mobile  #safe-code, .content-reg-mobile  #pw").focus().blur();
	if(($(".content-reg-mobile .error").eq(0).text() == "填写正确"||$(".content-reg-mobile .error").eq(0).text() == "短信发送失败，请稍后再试") && $(".content-reg-mobile .error").eq(1).text() == "填写正确" && codeTiming == 120){
		$("#codeDo").addClass("codeDoTip");
		$(".codeDoTip-bg").show();
		$(".js-validcode-change").eq(0).click();
//		$("#safe-code").focus();
	}	
});

$(".mobile-em-none").click(function(){
		$("#codeDo").removeClass("codeDoTip");
		$(".codeDoTip-bg").hide();
	}
)


$(".mobile-strong-none").click(function(){
	$(".content-reg-mobile #passport, .content-reg-mobile  #safe-code, .content-reg-mobile  #pw").focus().blur();
	if(($(".content-reg-mobile .error").eq(0).text() == "填写正确"||$(".content-reg-mobile .error").eq(0).text() == "短信发送失败，请稍后再试") && $(".content-reg-mobile .error").eq(1).text() == "填写正确" && $("#codeDo .error").eq(0).text() == "填写正确" && codeTiming == 120){
		$(".zg-code-box").append("<button data-input='input[name=\"mobile\"]' data-url='" + regSetUrl + "'  class='btn btn-get-code js-btn-countdown' id='btn-get-code'>获取短信验证码</button>");
//		$("#safe-code").attr("readonly","readonly");
		codeTimeDo = setInterval("codeTime()", 1000);
		$("#codeDo").removeClass("codeDoTip");
		$(".codeDoTip-bg").hide();
			//	$(".zg-code-btn").eq(0).next(".js-btn-countdown").click().remove();
		$("#btn-get-code").click().remove();
		$("#safe-code-mobile").removeAttr("disabled");
	}else if(($(".content-reg-mobile .error").eq(0).text() == "填写正确"||$(".content-reg-mobile .error").eq(0).text() == "短信发送失败，请稍后再试") && $(".content-reg-mobile .error").eq(1).text() == "填写正确" &&$("#codeDo .error").eq(0).text() == "填写正确" && codeTiming != 120){
		$(".mobile-em-none").click();
	}
});
//end



$(".btn-submit").mouseup(function(){
	if($("#safe-code").val() =="" && ($(".content-reg-mobile .error").eq(0).text() == "填写正确"||$(".content-reg-mobile .error").eq(0).text() == "短信发送失败，请稍后再试") && $(".content-reg-mobile .error").eq(1).text() == "填写正确" && ($(".content-reg-mobile .error").eq(3).text()=="填写正确" || $(".content-reg-mobile .error").eq(4).text()=="填写正确") ){
		$("#codeDo").addClass("codeDoTip");
		$(".codeDoTip-bg").show();
		$("#safe-code").focus();
	}
})

//验证码3次之后自动点击start
	var safeCodeEnterNum = 0;
$("#safe-code").blur(function(){
	if($("#codeDo .fbox-tip .error").eq(0).text() == "验证码错误"){
		safeCodeEnterNum++
	}if(safeCodeEnterNum == 3){
		$(".js-validcode-change").eq(0).click();
	    safeCodeEnterNum = 0;
	}
})
//end

})