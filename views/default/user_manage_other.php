<?php include "header.php";?>
<div id="aaa"></div>

<div id="wp" class="wp"><link href="index/css/style.css" rel="stylesheet" type="text/css">

 
  <!--中间内容-->
<script src="index/js/jq.mobi.min.js" type="text/javascript"></script>
<script src="index/js/jq.mobi.min.js" type="text/javascript"></script>
  <script src="index/audiojs/audio.min.js" type="text/javascript"></script>
   
    <script>
      audiojs.events.ready(function() {
        audiojs.createAll();
      });
    </script>

  <div class="contentmanage">
    <div class="developer">
       <div class="appTitle normalTitle2">
        <?php include bidcms_template("user_top");?>
        <div class="clr"></div>
      </div> 
      <div class="tableContent">
        <div class="content">
         
          <div class="cLineB">
              <h4 class="left">已融合接口数量(0) 条</h4>
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
  <a href="index.php?ac=keyapi&amp;id=3699" title="新增接口" class="btnGrayS vm bigbtn"><img src="static/theme/default/img/index/music.png" class="vm">新增接口</a>　

              
            </div>
          
            <div class="clr"></div>
          </div>
          <div class="msgWrap">
          <form method="post" action="index.php?ac=apilist&amp;id=3699&amp;wxid=gh_254a377c8ab7" id="info">
          <input name="delall" type="hidden" value="del">
           <input name="wxid" type="hidden" value="gh_254a377c8ab7">
            <table class="ListProduct" border="0" cellspacing="0" cellpadding="0" width="100%">
              <thead>
                <tr>
<th class="select">选择</th>
                    <th class="keywords">关键词</th>
<th class="keywords">接口地址</th>
                    <th class="time">接口类型</th>
<th class="time">状态</th>
                    
<th class="time">时间</th>
<th class="edit norightborder">操作</th>
                </tr>
              </thead>
              <tbody>
                <tr></tr>
                                 <tr>
                <td colspan="7" class="edit norightborder"> <input type="checkbox" id="chkall" name="chkall" onclick="checkAll(this.form, 'del_id')"><label for="checkallBottom">全选</label>
<input type="radio" name="optype" checked="checked" value="1">
删除


          <a href="JavaScript:void(0);" class="btnGreens" onclick="if(confirm('您确定操作吗?')){checkvotethis();}"><span>确定</span></a>
</td>
                </tr>
              </tbody>
            </table>
           </form> 
           <script>
   function checkvotethis() {
var aa=document.getElementsByName('del_id[]');
var mnum = aa.length;
j=0;
for(i=0;i<mnum;i++){
if(aa[i].checked){
j++;
}
}
if(j>0) {
document.getElementById('info').submit();
} else {
alert('未选中任何文章或回复！')
}
}

   </script>
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
  <script>

function checkAll(form, name) {
for(var i = 0; i < form.elements.length; i++) {
var e = form.elements[i];
if(e.name.match(name)) {
e.checked = form.elements['chkall'].checked;
}
}
}


  </script>
  <!--底部-->
  	</div>
<?php include "footer.php";?>