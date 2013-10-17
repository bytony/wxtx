<?php include "header.php";?>
<div id="aaa"></div>

<div id="wp" class="wp"><link href="index/css/style.css" rel="stylesheet" type="text/css">

 
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
              <h4 class="left">无匹配时回复 (0) 条</h4>
                  <div class="searchbar right">  <form method="get" action="index.php">
                  <input type="text" id="msgSearchInput" class="txt left" placeholder="输入关键词搜索" name="keyz" value="">
				  <input type="submit" value="搜索" id="msgSearchBtn" href="javascript:;" class="btnGrayS" title="搜索">
                  </form>
                  </div>
              <div class="clr"></div>
          </div>
          <div class="cLine">
            <div class="pageNavigator left">
  <a href="index.php?con=user&act=nonemodify" title="新增无匹配时回复" class="btnGrayS vm bigbtn"><img src="static/theme/default/img/index/text.png" class="vm">新增无匹配时回复</a>　
  
              
            </div>
          
            <div class="clr"></div>
          </div>
          <div class="msgWrap">
          <form method="post" action="index.php" id="info">
            <table class="ListProduct" border="0" cellspacing="0" cellpadding="0" width="100%">
              <thead>
                <tr>
			<th class="select">选择</th>
			<th class="answer">回答</th>
			<th class="time">时间</th>
                     
<th class="edit norightborder">操作</th>
                </tr>
              </thead>
              <tbody>
			  <?php foreach($infolist['data'] as $k=>$v){?>
			  <tr>
			  <td><input type="checkbox"  name="del_id[]" value="<?php echo $v['id'];?>"></td>
			  <td><?php echo $v['content'];?></td>
			  <td><?php echo date('Y-m-d H:i',$v['updatetime']);?></td>
			  <td>预览 <a href="index.php?con=user&act=nonemodify&updateid=<?php echo $v['id'];?>">编辑</a> <a href="index.php?con=user&act=randinfodel&updateid=<?php echo $v['id'];?>" onclick="return checkdel();">删除</a></td>
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