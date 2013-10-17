<?php include "header.php";?>
<div id="aaa"></div>

<div id="wp" class="wp">
 
  <!--中间内容-->
  <div class="contentmanage">
    <div class="developer">
       <div class="appTitle normalTitle2">
        <?php include bidcms_template("user_top");?>
        <div class="clr"></div>
      </div> 
      <div class="tableContent">
        <div class="content">

<div class="cLineB">
  <h4>模板管理 <span class="FAQ">选择适合您的模版风格，手机输入“首页”测试效果。</span></h4>
 </div>
         
 <div class="msgWrap form">
 <iframe name='childframe' style='display:none;'></iframe>
 <form method="post" action="index.php" target="childframe">
		 <input type="hidden" name="act" value="template">
		 <input type="hidden" name="con" value="user">
		 <INPUT TYPE="hidden" NAME="formhash" value="<?php echo formhash();?>">
		 <input type="hidden" name="commit" value="1">
<fieldset><legend><h4>1. 栏目首页模板风格</h4></legend>
         <ul class="cateradio">
<li class="<?php echo $info['index_tpl']==1?'active':'';?>"><label><img src="static/theme/default/img/cate1.png"><input class="radio" type="radio" name="optype" value="1" <?php echo $info['index_tpl']==1?'checked':'';?>> 模板1 </label></li>
<li class="<?php echo $info['index_tpl']==2?'active':'';?>"><label><img src="static/theme/default/img/cate2.png"><input class="radio" type="radio" name="optype" value="2" <?php echo $info['index_tpl']==2?'checked':'';?>> 模板2 </label></li>
<li class="<?php echo $info['index_tpl']==3?'active':'';?>"><label><img src="static/theme/default/img/cate3.png"><input class="radio" type="radio" name="optype" value="3" <?php echo $info['index_tpl']==3?'checked':'';?>> 模板3 </label></li>
<li class="<?php echo $info['index_tpl']==4?'active':'';?>"><label><img src="static/theme/default/img/cate4.png"><input class="radio" type="radio" name="optype" value="4" <?php echo $info['index_tpl']==4?'checked':'';?>> 模板4 </label></li>
</ul>
</fieldset>

<fieldset><legend><h4>2.图文列表模板风格</h4></legend>
 <ul class="cateradio2">
<li class="<?php echo $info['list_tpl']==1?'active':'';?>"><label><img src="static/theme/default/img/list1.png"><input class="radio2" type="radio" name="optype2" value="1"  <?php echo $info['list_tpl']==1?'checked':'';?>> 模板1(美观)</label></li>
<li class="<?php echo $info['list_tpl']==2?'active':'';?>"><label><img src="static/theme/default/img/list2.png"><input class="radio2" type="radio" name="optype2" value="2" <?php echo $info['list_tpl']==2?'checked':'';?>> 模板2(省流量) </label></li>
<li class="<?php echo $info['list_tpl']==3?'active':'';?>"><label><img src="static/theme/default/img/list3.png"><input class="radio2" type="radio" name="optype2" value="3" <?php echo $info['list_tpl']==3?'checked':'';?>> 模板3(类似首页模板4) </label></li>
<li class="<?php echo $info['list_tpl']==4?'active':'';?>"><label><img src="static/theme/default/img/list3.png"><input class="radio2" type="radio" name="optype2" value="4" <?php echo $info['list_tpl']==4?'checked':'';?>> 模板4(小清新) </label></li>
</ul>
</fieldset>

<fieldset><legend><h4>3.图文详细页模板风格</h4></legend>
 <ul class="cateradio3">
<li class="<?php echo $info['article_tpl']==1?'active':'';?>"><label><img src="static/theme/default/img/news2.png"><input class="radio3" type="radio" name="optype3" value="1"  <?php echo $info['article_tpl']==1?'checked':'';?>>模板1 </label></li>
</ul>
</fieldset>
<div style="margin:10px;"><button type="submit" class="btnGreen" id="saveSetting">保存</button></div>
</form>
        
          </div>
  
        </div>
        
        <!--左侧功能菜单-->
           <div class="sideBar">
          <div class="catalogList">
			<?php include bidcms_template("left");?>
          </div>
        </div> 
        <div class="clr"></div>
      </div>
    </div>
  </div> 
  <!--底部-->
  	</div>
<?php include "footer.php";?>