<?php include bidcms_template("header");?>
<div id="aaa"></div>

<div id="wp" class="wp">

 
  <!--中间内容-->



<!-- ////////////////////////////////// -->
<!-- //      弹出窗口        // -->
<!-- ////////////////////////////////// -->

  <div class="contentmanage">
    <div class="developer">
       <div class="appTitle normalTitle2">
        <?php include bidcms_template("user_top");?>
        <div class="clr"></div>
      </div> 
      <div class="tableContent">
        <div class="content">
         
          <div class="cLineB">
              <h4 class="left">LBS商家 (0) 条</h4>
                  <div class="searchbar right">  
                  </div>
              <div class="clr"></div>
          </div>
          <div class="cLine">
            <div class="pageNavigator left">
  <a href="index.php?pluginid=lbs&act=modify" title="新增LBS商家" class="btnGrayS vm bigbtn"><img src="static/theme/default/img/index/text.png" class="vm">新增LBS商家</a>　
  <a class="btnGrayS vm bigbtn" onclick="location.href='index.php?con=tool&act=import';">批量导入</a>  <a class="btnGrayS vm bigbtn" onclick="location.href='index.php??con=tool&act=export';">批量导出</a>
              
            </div>
          
            <div class="clr"></div>
          </div>
          <div class="msgWrap">
          <form method="post" action="index.php" id="info">
          <input name="delall" type="hidden" value="del">
           <input name="wxid" type="hidden" value="gh_254a377c8ab7">
            <table class="ListProduct" border="0" cellspacing="0" cellpadding="0" width="100%">
              <thead>
                <tr>
			<th class="select">标题</th>
			<th class="keywords">电话</th>
			<th class="answer">地址</th>
			<th class="category">经纬度</th>
			<th class="time">标签</th>
			<th class="time">时间</th>
                     
<th class="edit norightborder">操作</th>
                </tr>
              </thead>
              <tbody>
			  <?php foreach($infolist['data'] as $k=>$v){?>
			  <tr>
			  <td><input type="checkbox"  name="del_id[]" value="<?php echo $v['id'];?>"></td>
			  <td><?php echo $v['title'];?></td>
			  <td><?php echo $v['tel'];?></td>
			  <td><?php echo $v['address'];?></td>
			  <td><?php echo $v['lat'];?>,<?php echo $v['lng'];?></td>
			  <td><?php echo date('Y-m-d H:i',$v['updatetime']);?></td>
			  <td>预览 <a href="index.php?pluginid=lbs&act=modify&updateid=<?php echo $v['id'];?>">编辑</a> <a href="index.php?pluginid=lbs&act=del&updateid=<?php echo $v['id'];?>" onclick="return checkdel();">删除</a></td>
			  </tr>
			  <?php }?>
			  <tr><td colspan="7"><?php echo $infolist['pageinfo'];?></td></tr>
                <tr>
                <td colspan="7"> <input type="checkbox" id="chkall" name="chkall" onclick="checkAll(this.form, 'del_id')"><label for="checkallBottom">全选</label>
				<input type="radio" name="optype" value="1">
				删除
				<a href="JavaScript:void(0);" class="btnGreens" onclick="if(confirm('您确定操作吗?')){checkvotethis();}"><span>确定</span></a>
				</td>
                </tr>
              </tbody>
            </table>
           </form> 
           
          </div>
            


 
          <div class="cLine">
            <div class="pageNavigator right">
                 <div class="pages"></div>
              </div>
            <div class="clr"></div>
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