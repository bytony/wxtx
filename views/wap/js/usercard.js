/// <reference path="jquery-1.10.0.min.js" />
/// <reference path="jquery.mobile-1.3.1.js" />

(function (window, $, undefined) {
    $(function () {
        var $page = $('#cardPage').on('pageinit', function (event) {

        });

        var $divLoadRecords = $('#divLoadRecords').tap(function () {
            var $this = $(this).addClass('loading');
            var submitData = {
                weixin_open_id: $('#cardBox').attr('data-weixin-open-id'),
                page: $(this).attr('data-record-page'),                
                per_page: $(this).attr('data-record-per-page')
            };
            $.post(
            	'/vipcard/more_record', 
            	submitData,
            	function(data) {
	                if (data.success == 1) {
	                	$this.removeClass('loading');
	                	var record_list = data.record_list;
	                	$.each(record_list, function(i, item){
	                        var listItem = '<li>'+ item.dt_add + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + item.title +'</li>';
	                        $recordsList.append(listItem).listview('refresh');	                		
	                	});
	                	$('#divLoadRecords').attr('data-record-page', data.page);
	                	$('#divLoadRecords').attr('data-record-per-page', data.per_page)
	                } else if (data.success == 0) {//已经加载完
	                	$this.removeClass('loading');
	                	var record_list = data.record_list;
	                	$.each(record_list, function(i, item){
	                        var listItem = '<li>'+ item.dt_add + ' ' + item.title +'</li>';
	                        $recordsList.append(listItem).listview('refresh');	                		
	                	});	                	
	                	$('#divLoadRecords').remove();
	                }
            	}
            )
        });

        var $recordsList = $('#recordsList');

        var addRecordTo = function () {
            var listItem = '<li>'+ Math.random() +'</li>';
            $recordsList.append(listItem).listview('refresh');
        };

        initCardFlip();

        //初始化会员卡翻转效果
        function initCardFlip(cardBodySelector, sideASelector, sideBSelector) {
            var $card = $(cardBodySelector ? cardBodySelector : '.card'),
                $sideA = $(sideASelector ? sideASelector : '.sideA'),
                $sideB = $(sideBSelector ? sideBSelector : '.sideB'),
                $front, $back, runStep1, runStep2, flgFliping = false,
                cssTransform3d = $.support.cssTransform3d;

            //根据是否支持css3D效果，绝对采取什么动画
            if (cssTransform3d) {
                $card.addClass('viewport-flip');
                $sideA.addClass('flip');
                $sideB.addClass('flip');
                runStep1 = function () {
                    flgFliping = true;
                    $front.addClass('out').removeClass('in').animationComplete(runStep2);
                };
                runStep2 = function () {
                    $front.removeClass('Curr');
                    $back.addClass('Curr').addClass('in').removeClass('out').animationComplete(onAllEnd);
                };
            }
            else {
                runStep1 = function () {
                    flgFliping = true;
                    $front.fadeOut(runStep2);
                };
                runStep2 = function () {
                    $front.removeClass('Curr');
                    $back.addClass('Curr').fadeIn(onAllEnd);
                };
            }

            //动画全部结束
            var onAllEnd = function () {
                flgFliping = false;

                $back.addClass('Curr');
            },

            fnFlipCard = function (event) {
                if(!event || (event && event.target.tagName!=='A')){
                    if (!flgFliping) {
                        if ($sideA.hasClass('Curr')) {
                            $front = $sideA;
                            $back = $sideB;
                        }
                        else {
                            $front = $sideB;
                            $back = $sideA;
                        }
                        runStep1();
                        if(event){
                            event.stopPropagation();
                        }                        
                        return false;
                    }
                }
            };
            
            //绑定点击           
            $card.bind('tap', fnFlipCard);
            fnFlipCard();
        }

        var $confirmDialog = $('#confirmDialog').on('tap', '.button', function (e) {
            $confirmDialog.popup('close');
            e.stopPropagation();
            return false;
        });
        var $alertDialog = $('#alertDialog').on('tap', '.button', function (e) {
            $alertDialog.popup('close');
            e.stopPropagation();
            return false;
        });
        
        //自定义alert对话框(text=内容标题,title=对话框标题)
        function customAlert(text, tilte, fnOK) {
            if ($alertDialog.length) {
                $alertDialog = $('#alertDialog');
            }

            $alertDialog.one('popupafterclose', function (e) {
                if (typeof fnOK === 'function') {
                    window.setTimeout(fnOK,1);
                }
            });

            $('.alert_title', $alertDialog).html(tilte || '提示');
            $('.alert_content', $alertDialog).html(text || '这家伙很懒，什么也没留下。');

            $alertDialog.popup('open');
        }

        //自定义确认对话框(text=内容标题,title=对话框标题,fnOK=点确定要执行的方法,fnCancel=点取消要执行的方法)
        function customConfirm(text, tilte, fnOK, fnCancel) {
            if ($confirmDialog.length) {
                $confirmDialog = $('#confirmDialog');
            }

            var flgOk = false;

            $confirmDialog.one('tap', '.button', function (event) {
                var $this = $(this);
                if ($this.hasClass('click_ok')) {
                    flgOk = true;
                } else if ($this.hasClass('click_cancel')) {
                    flgOk = false;
                }
            }).one('popupafterclose', function (e) {
                if (!flgOk && typeof fnCancel === 'function') {
                    window.setTimeout(fnCancel, 1);

                } else if (flgOk && typeof fnOK === 'function') {
                    window.setTimeout(fnOK, 1);

                }
            });

            $('.confirm_title', $confirmDialog).html(tilte || '请确认');
            $('.confirm_content', $confirmDialog).html(text || '这家伙很懒，什么也没留下。');

            $confirmDialog.popup('open');
        }

        //自定义confirm        
        //商家验证
        $('.button-ver').click(function(){
        	var coupon_item = $(this).parents('.coupon-item');
            var datatype = $(this).attr('data-type');
            var marketing_id = $(this).attr('data-marketing-id');           
            var weixin_open_id = $('#cardBox').attr('data-weixin-open-id');
            var vercode = $('#coupon-verbox-'+marketing_id+' input[name="vercode"]').val();
            if(vercode == ''){
            	customAlert('验证码不能为空!');
                return false;
            }            
            var submitdata = {
            	type: 2,
            	marketing_id: marketing_id,
            	weixin_open_id: weixin_open_id,
            	vercode: vercode
            };
            $.post(
            	'/vipcard/use_coupon/',
            	submitdata,
            	function(data){
                    if (data.success == 1) {
                        if(data.type == 2){
                        	$('#coupon-verbox-'+marketing_id).hide();
                            $('#success-'+marketing_id).show();
                        }else{
                        	customAlert(data.msg);
                        }
                        var per_page = $('#divLoadRecords').attr('data-record-per-page');
                        if($('#recordsList li').length == per_page){
                        	//删除最后条消费记录
                        	$('#recordsList li').last().remove();
                        }

                        //增加消费记录到顶部
                        var recordhtml = '<li>'+ data.time + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+ data.title +'</li>';
                        $('#recordsList').prepend(recordhtml).listview('refresh');
                        
                        var remain_chance = $('#remain-chance-'+marketing_id).html() - 1;
                        $('#remain-chance-'+marketing_id).html(remain_chance);
                        
                        if(remain_chance == 0){
                        	coupon_item.remove();
                        }                        
                        return;
                    } else {
                    	customAlert(data.msg);
                        return false;
                    }
            	}
             );        	
        });

        $('.button-use').tap(function () {
        	var coupon_item = $(this).parents('.coupon-item');
            var datatype = $(this).attr('data-type');
            var marketing_id = $(this).attr('data-marketing-id');          
            var weixin_open_id = $('#cardBox').attr('data-weixin-open-id'); 
            customConfirm('你确定要使用这个优惠券？', '使用优惠券', function () {        
	            var submitdata = {
	            	type: 1,
	            	marketing_id: marketing_id,
	            	weixin_open_id: weixin_open_id
	            };
	            $.post(
	            	'/vipcard/use_coupon/',
	            	submitdata,
	            	function(data){
	                    if (data.success == 1) {
	                        if(data.type == 2){
	                        	$('#coupon-verbox-'+marketing_id).hide();
	                            $('#success-'+marketing_id).show();
	                        }else{
	                        	customAlert(data.msg);	                            
	                        }
	                        var per_page = $('#divLoadRecords').attr('data-record-per-page');
	                        if($('#recordsList li').length == per_page){
	                        	//删除最后条消费记录
	                        	$('#recordsList li').last().remove();
	                        }
	                        //增加消费记录到顶部
	                        var recordhtml = '<li>'+ data.time + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+ data.title +'</li>';
	                        $('#recordsList').prepend(recordhtml).listview('refresh');
	                        
	                        var remain_chance = $('#remain-chance-'+marketing_id).html() - 1;
	                        $('#remain-chance-'+marketing_id).html(remain_chance);

							$('.noRecords').remove();
	                        
	                        if(remain_chance == 0){
	                        	coupon_item.remove();
	                        }
	                        return;
	                    } else {
	                    	customAlert(data.msg);
	                        return false;
	                    }
	            	}
	             );
            }, function () {

            })
        });
        
        //继续使用
        $('.button-ok').click(function(){
        	var marketing_id = $(this).attr('data-marketing-id');
            $('#coupon-verbox-'+marketing_id).show();
            $('#success-'+marketing_id).hide();        	
        });
        
        //增加浏览次数
        $('.coupon-item').bind('expand', function () {
        	if(!$(this).hasClass('coupon-viewed')){
        		var marketing_id = $(this).attr('data-marketing-id');
        		$.post(
                	'/vipcard/add_view', 
                	{marketing_id: marketing_id},
                	function(data) {
                		
                	}
                )        		
	            $(this).addClass('coupon-viewed');
        	}
        }).bind('collapse', function () {
        	
        });

		//领取发放型优惠码
		$('.button-get').tap(function () {
			var datatype = $(this).attr('data-type');
			var marketing_id = $(this).attr('data-marketing-id');
			var weixin_open_id = $('#cardBox').attr('data-weixin-open-id');
			customConfirm('你确定要领取优惠码？', '领取优惠码', function () {
				var submitdata = {
					type: 3,
					mid: marketing_id,
					wxid: weixin_open_id
				};
				$.post(
					'/vipcard/getCouponCode/',
					submitdata,
					function(data){
						if(data.ret == 0){
							customAlert('领取成功');
							var html = '<div>您的优惠码是：</div><div style="font-size:26px; text-align:center; font-weight:bold;color:#6F9F0A;">'+ data.data.coupon_code +'</div>';
							$('.coupon-code').html(html);

							var remain_chance = $('#remain-chance-'+marketing_id).html() - 1;
							$('#remain-chance-'+marketing_id).html(remain_chance);
							$('.noRecords').remove();

							var per_page = $('#divLoadRecords').attr('data-record-per-page');
							if($('#recordsList li').length == per_page){
								//删除最后条消费记录
								$('#recordsList li').last().remove();
							}
							//增加消费记录到顶部
							var recordhtml = '<li>'+ data.data.time + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+ '('+ data.data.coupon_code +')' + data.data.title +'</li>';
							$('#recordsList').prepend(recordhtml).listview('refresh');

							return false;
						}else{
							customAlert(data.data);
							return false;
						}
					}
				)
			});

		});
    });

})(window,$,undefined);