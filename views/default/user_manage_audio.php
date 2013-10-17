<?php include bidcms_template("header");?>
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
              <h4 class="left">自定义回复信息 (0) 条</h4>
                  <div class="searchbar right">  <form method="get" action="index.php">
                  <input type="text" id="msgSearchInput" class="txt left" placeholder="输入关键词搜索" name="keyz" value="">
                  
                  <input type="hidden" name="ac" value="mp3list">
                  <input type="hidden" name="id" value="3699">
                  <input type="hidden" name="wxid" value="gh_254a377c8ab7">
                 
                  <input type="submit" value="搜索" id="msgSearchBtn" href="javascript:;" class="btnGrayS" title="搜索">
                  </form>
                  </div>
              <div class="clr"></div>
          </div>
          <div class="cLine">
            <div class="pageNavigator left">
  <a href="index.php?con=user&act=audiomodify" title="新增语音回复" class="btnGrayS vm bigbtn"><img src="static/theme/default/img/index/music.png" class="vm">新增语音回复</a>　

              
            </div>
          
            <div class="clr"></div>
          </div>
          <div class="msgWrap">
          <form method="post" action="index.php?ac=mp3list&amp;id=3699&amp;wxid=gh_254a377c8ab7" id="info">
          <input name="delall" type="hidden" value="del">
           <input name="wxid" type="hidden" value="gh_254a377c8ab7">
            <table class="ListProduct" border="0" cellspacing="0" cellpadding="0" width="100%">
              <thead>
                <tr>
				<th class="select">选择</th>
				<th class="keywords">关键词</th>
				<th class="keywords">标题</th>
				<th class="answer">试听</th>

				<th class="time">时间</th>
				<th class="edit norightborder">操作</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($infolist['data'] as $k=>$v){?>
			  <tr>
			  <td><input type="checkbox" name="del_id[]" value="<?php echo $v['id'];?>"></td>
			  <td><?php echo $v['keywords'];?></td>
			  <td><?php echo $v['title'];?></td>
			  <td><object type="application/x-shockwave-flash" data="http://swf123.sinaapp.com/dewplayer.swf?mp3=<?php echo urlencode($v['music']);?>&amp;autostart=0&amp;volume=100" width="200" height="20" id="dewplayer"><param name="wmode" value="Opaque"><param name="movie" value="dewplayer.swf?mp3=<?php echo urlencode($v['music']);?>&amp;autostart=0&amp;volume=100"></object></td>
			  <td><?php echo date('Y-m-d H:i',$v['updatetime']);?></td>
			  <td>预览 <a href="index.php?con=user&act=audiomodify&updateid=<?php echo $v['id'];?>">编辑</a> <a href="index.php?con=user&act=infodel&updateid=<?php echo $v['id'];?>" onclick="return checkdel();">删除</a></td>
			  </tr>
			  <tr><td colspan="6"><?php echo $infolist['pageinfo'];?></td></tr>
			  <?php }?>
 <tr>
                <td colspan="6" class="edit norightborder"> <input type="checkbox" id="chkall" name="chkall" onclick="checkAll(this.form, 'del_id')"><label for="checkallBottom">全选</label>
<input type="radio" name="optype" checked="checked" value="1">
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
                 <div class="pages"><?php echo $infolist['pageinfo'];?></div>
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
<?php include bidcms_template("footer");?>