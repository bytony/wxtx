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
  <h4 class="left">已经开发的功能 <span class="FAQ">请勾选你要开启的功能</span></h4>
 </div>
<div>
<ul class="changeapp">
  <?php foreach($plugins as $k=>$v){?> 
  <li><label> <input type="checkbox" <?php echo in_array($v['plugins_id'],$myplugins)?'checked':'';?> <?php if( $plugins[$v['plugins_id']]['plugins_level']>$winfo['vip_level']){?>disabled<?php } else{?>onclick="changeapp(this);"<?php }?> value="<?php echo $v['plugins_id'];?>"> <?php echo $v['plugins_title'];?> <a href="#" class="vipimg vip-icon<?php echo $v['plugins_level'];?>" title=""></a></label><div><?php echo $v['plugins_intro'];?></div></li>
  <?php }?>
	 <div class="clr"></div>
</ul>
</div>
<div class="cLineB">
  <h4 class="left">待开发待的功能 <span class="FAQ">正在开发中，敬请期待！</span></h4>
 </div>
<div>
<ul class="changeapp">
  <li><label> <input type="checkbox"  value="16"> 公交查询 <a href="#" class="vipimg vip-icon0" title=""></a></label><div>城市+公交+车次 例如：<br>厦门公交92路：站点到站点 例如:厦门公交厦大医院到软件园二期 站点查询：厦门公交厦大医院站</div></li>
  <li><label> <input type="checkbox"  value="29"> 百度问答 <a href="#" class="vipimg vip-icon0" title=""></a></label><div>输入的问题超过5个字自动触发</div></li>
      <div class="clr"></div>
   </ul>
</div>

              <div class="clr"></div>
                
          </div>
         
          
           <script>
function changeapp(obj){
	
var image=new Image();
if(obj.checked==true){  
image.src='index.php?con=user&act=appmodify&type=add&id='+obj.value+'&r='+Math.random(); 

}else{   
image.src='index.php?con=user&act=appmodify&type=del&id='+obj.value+'&r='+Math.random(); 
}
}
</script>
        
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