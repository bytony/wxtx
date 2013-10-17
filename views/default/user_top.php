<div class="vipuser">
	<div class="logo">
	<img src="<?php echo $winfo['weixin_avatar'];?>" width="100" height="100">
	</div>
	<div id="nickname">
	<strong><?php echo $winfo['weixin_name'];?></strong><a href="#" target="_blank" class="vipimg vip-icon0" title=""></a></div>
	<div id="weixinid">微信号:<?php echo $winfo['weixin_num'];?></div>
</div>

<!-- <div class="accountInfo">
	<table class="vipInfo" width="100%" border="0" cellpadding="0" cellspacing="0">
	<tbody><tr>
	<td><strong>VIP有效期：</strong><?php echo date("Y-m-d",$winfo['lasttime']);?></td>
	<td><strong>文本自定义：</strong><?php echo 2000-$winfo['text_count'];?>/2000</td>
	<td><strong>图文自定义：</strong><?php echo 2000-$winfo['image_count'];?>/2000</td>
	<td><strong>语音自定义：</strong><?php echo 2000-$winfo['audio_count'];?>/2000</td>
	</tr>
	<tr>
	<td><strong>付费资源剩余：</strong><?php echo $winfo['price_count'];?></td>
	<td><strong>当月赠送请求数：</strong><?php echo $winfo['given_count'];?></td>
	<td><strong>总请求数：</strong>6</td>
	<td><strong>当月剩余请求数<?php echo $winfo['free_count'];?></strong></td>
	</tr>
	</tbody></table>
</div> -->