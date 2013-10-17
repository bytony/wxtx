<?php if(!empty($picplayer)){?>
<script type="text/javascript">var myScroll;function loaded(){myScroll=new iScroll('wrapper',{snap:true,momentum:false,hScrollbar:false,onScrollEnd:function(){document.querySelector('#indicator > li.active').className='';document.querySelector('#indicator > li:nth-child('+(this.currPageX+1)+')').className='active';}});setInterval(function(){myScroll.scrollToPage('next',0,400,5);},3500);}document.addEventListener('DOMContentLoaded',loaded,false);</script>
<style type="text/css">
/*iscroll*/
.banner {	width:320px;	margin:0 auto;	padding:0;	background-color: #333333;}
#wrapper {	margin:0;	width:320px;	height:auto;	float:left;	position:relative;	
/* On older OS versions "position" and "z-index" must be defined, */	
z-index:1;			
/* it seems that recent webkit is less picky and works anyway. */	
overflow:hidden;	
}
#scroller{-webkit-transition-property: -webkit-transform; -webkit-transform-origin-x: 0px; -webkit-transform-origin-y: 0px; -webkit-transition-duration: 0ms; -webkit-transform: translate3d(-640px, 0px, 0px) scale(1);width:1600px;height:auto;float:left;padding:0;}

#scroller ul {	list-style:none;	display:block;	float:left;	width:100%;	height:auto;	padding:0;	margin:0;	text-align:left;}
#scroller li {		display:block; float:left;	width:320px; height:auto;	text-align:center;	font-size:0px;	padding:0;	position:relative;}
#scroller li a{		display:block;	padding:0;	margin:0;}
#scroller li p{	position:absolute;	z-index:2;	display:block;	width:100%;	bottom:0;	background-color:rgba(0, 0, 0, 0.5);	color:#F4F4F4;	font-size:14px;	text-indent: 55px;	line-height:24px;	text-align: left;    text-indent: 10px;    text-overflow: ellipsis;    white-space: nowrap;	padding:0;	margin:0;}
#nav {	float: right;    margin-top: -15px;    padding: 0;    position: relative;    width: auto;    z-index: 3;}
#prev, #next {	float:left;	font-weight:bold;	font-size:14px;	padding:5px 0;	width:80px;	display: none;}
#next {	float:right;	text-align:right;}
#indicator > li {	display:block; float:left;	list-style:none;	padding:0; margin:0;}
#indicator {	display: block;    margin: 0 8px;    padding: 0;    width: auto;}
#indicator > li {	text-indent:-9999em;	width:8px; height:8px;	-webkit-border-radius:4px;	-moz-border-radius:4px;	-o-border-radius:4px;	border-radius:4px;	background:#888;	overflow:hidden;	margin-right:4px;}
#indicator > li.active {	background:#DDDDDD;}
#indicator > li:last-child {	margin:0;}
#scroller li img{ width:320px; height:auto;}
</style>
<div class="banner">
<div id="wrapper">
<div id="scroller">
<ul id="thelist">
<?php $i=0;foreach($picplayer as $k=>$v){?>               
<li><p><?php echo $v['pic_title'];?></p><a href="<?php echo $v['pic_link'];?>"> <img src="<?php echo $v['pic_url'];?>"></a></li>
<?php $i++;}?>
</ul>
</div>
</div>
<div id="nav">
<div id="prev" onclick="myScroll.scrollToPage('prev', 0,400,5);return false">← prev</div>
<ul id="indicator"><?php for($j=0;$j<$i;$j++){?><li class="<?php echo $j==0?'active':'';?>"><?php echo $j+1;?></li><?php }?></ul>
<div id="next" onclick="myScroll.scrollToPage('next', 0);return false">next →</div>
</div>
<div class="clr"></div>
</div>
<?php }?>