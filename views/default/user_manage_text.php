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
              <h4 class="left">自定义回复信息 (0) 条</h4>
                  <div class="searchbar right">  <form method="get" action="index.php">
                  <input type="text" id="msgSearchInput" class="txt left" placeholder="输入关键词搜索" name="keyz" value="">
                  <select name="type">  <option selected="selected" value="0">全部</option><option value="1">文本</option><option value="3">机器人学习</option></select> 
                  <input type="hidden" name="ac" value="importtxt">
                  <input type="hidden" name="id" value="3699">
                  <input type="hidden" name="wxid" value="gh_254a377c8ab7">
                 
                  <input type="submit" value="搜索" id="msgSearchBtn" href="javascript:;" class="btnGrayS" title="搜索">
                  </form>
                  </div>
              <div class="clr"></div>
          </div>
          <div class="cLine">
            <div class="pageNavigator left">
  <a href="index.php?con=user&act=textmodify" title="新增文本自定义回复" class="btnGrayS vm bigbtn"><img src="static/theme/default/img/index/text.png" class="vm">新增文本自定义回复</a>　
  <a href="index.php?con=user&act=imagemodify" title="新增图文自定义回复" class="btnGrayS vm bigbtn"><img src="static/theme/default/img/index/pic.png" class="vm">新增图文自定义回复</a>　
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
			<th class="select">选择</th>
			<th class="keywords">关键词</th>
			<th class="answer">回答</th>
			<th class="category">分类</th>
			<th class="time">浏览次数</th>
			<th class="time">时间</th>
                     
<th class="edit norightborder">操作</th>
                </tr>
              </thead>
              <tbody>
			  <?php foreach($infolist['data'] as $k=>$v){?>
			  <tr>
			  <td><input type="checkbox"  name="del_id[]" value="<?php echo $v['id'];?>"></td>
			  <td><?php echo $v['keywords'];?></td>
			  <td><?php echo $v['content'];?></td>
			  <td><?php echo $v['cateid'];?></td>
			  <td><?php echo $v['viewtimes'];?></td>
			  <td><?php echo date('Y-m-d H:i',$v['updatetime']);?></td>
			  <td>预览 <a href="index.php?con=user&act=textmodify&updateid=<?php echo $v['id'];?>">编辑</a> <a href="index.php?con=user&act=infodel&updateid=<?php echo $v['id'];?>" onclick="return checkdel();">删除</a></td>
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