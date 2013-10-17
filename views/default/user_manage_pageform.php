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
          <div class="cLineB"><h4>编辑page+自定义内容</h4><a href="javascript:history.go(-1);" class="right btnGrayS vm" style="margin-top:-27px">返回</a></div>
         
         <form method="post" action="index.php">
		 <input type="hidden" name="act" value="pagemodify">
		 <input type="hidden" name="con" value="user">
		 <input type="hidden" name="commit" value="1">
		 <INPUT TYPE="hidden" NAME="formhash" value="<?php echo formhash();?>">
		 <input type="hidden" name="updateid" value="<?php echo $info['id'];?>">
		 
		 <div class="msgWrap form">
            <table class="userinfoArea" border="0" cellspacing="0" cellpadding="0" width="100%">
              <tbody>
				<tr>
 
				 
				</tr>
               <tr>
                  <th><span class="red">*</span><label for="title">标题：</label></th>
                  <td><input type="input" class="px" id="title" value="<?php echo $info['title'];?>" name="title" style="width:580px;"> </td>
                </tr>
                <tr>
                  <th valign="top"><label for="text">简介：</label></th>
                  <td><textarea class="px" id="Hfcontent" name="text" style="width:580px;  height:100px"><?php echo $info['intro'];?></textarea><br>限制200字内
                   

</td>
                </tr>
                <tr>
                  <th valign="top"><label for="classid">文章所属类别：</label></th>
                  <td>
                   <select name="classid"> 
                    <option value="0">请选择</option>
                    <?php foreach($catelist as $k=>$v){?> 
                    <option value="<?php echo $v['cate_id'];?>" <?php echo $info['cateid']==$v['cate_id']?'selected':'';?>><?php echo $v['cate_name'];?></option>
                    <?php }?>       
                    </select>
                  </td>
                </tr>
                
                <tr>
                  <th valign="top"><label for="pic">封面图片地址：</label></th>
                  <td><input class="text textMiddle inputQ" name="pic" value="<?php echo $info['face'];?>" style="width:580px;"><br>
                  推荐将图片上传到腾讯微博或新浪微博再获取外链
</td>
                </tr>
               <tr>
                  <th valign="top"><label for="showpic">详细页是否显示封面：</label></th>
                  <td>是<input class="radio" type="radio" name="showpic" value="1" <?php echo $info['showindex']>0?'checked':'';?>> 否<input class="radio" type="radio" name="showpic" value="0" <?php echo $info['showindex']<1?'checked':'';?>>

                  
</td>
                </tr>
                <tr>
                  <th valign="top"><label for="info">图文详细页内容：</label></th>
                  <td><?php echo edit($info['content']);?></td>
                </tr>
                <tr>
                  <th valign="top"><label for="info">多图文：</label></th>
                  <td>
                  <ul id="vote_user_0" class="vote">
                  
				  </ul>
				  <script type="text/javascript">
				  <!--
					function initMutic(idval,check)
					{
						if(jq('#keyword1').val()!='' || idval!='')
						{
							jq.get("index.php",{con:'tool',act:'mutilpic',keywords:jq('#keyword1').val(),ids:idval},function(data){
								eval('var obj='+data);
								str='';
								for(i in obj)
								{
									str+='<li><input type="checkbox" name="ext_info[]" value="'+obj[i].id+'" '+(check>0?'checked':'')+'/>&nbsp;'+obj[i].title+'&nbsp;<button onclick="jq(this).parent().remove()">删除</button></li>';
								}
								jq('#vote_user_0').html(str);
							});
						}
					}
					function initRecommend(idval,check)
					{
						if(jq('#keyword2').val()!='' || idval!='')
						{
							jq.get("index.php",{con:'tool',act:'mutilpic',keywords:jq('#keyword2').val(),ids:idval},function(data){
								eval('var obj='+data);
								str='';
								for(i in obj)
								{
									str+='<li><input type="checkbox" name="ext_recommend[]" value="'+obj[i].id+'" '+(check>0?'checked':'')+'/>&nbsp;'+obj[i].title+'&nbsp;<button onclick="jq(this).parent().remove()">删除</button></li>';
								}
								jq('#vote_user_1').html(str);
							});
						}
					}
				  //-->
				  </script>
				  <p>关键词：<input type="text" class="px" id="keyword1">&nbsp;&nbsp;<button class="btnGreens" type="button" onclick="initMutic('',0);" id="smembers"><em>搜索</em></button></p>
				</td>
                </tr>
                <tr>
                  <th valign="top"><label for="info">推荐阅读：</label></th>
                  <td>
                  <ul id="vote_user_1" class="vote">
                  
                  </ul>
				  
				  <p>关键词：<input type="text" class="px" id="keyword2">&nbsp;&nbsp;<button class="btnGreens" type="button" onclick="initRecommend('',0);" id="smembers"><em>搜索</em></button></p>
				</td>
                </tr>
                 <tr>
                  <th valign="top"><label for="url">图文外链网址：</label></th>
                  <td><input type="input" class="px" id="url" value="<?php echo $info['url'];?>" name="url" style="width:580px;"><br><span class="red">如需跳转到其他网址，请在这里填写网址(例如：http://baidu.com，记住必须有http://)</span>如果填写了图文详细内容，这里请留空，不要设置！</td>
                </tr>
                <tr>
                  <th></th>
                  <td><button type="submit" name="button" class="btnGreen">保存</button>　<a href="index.php?con=user&act=page" class="btnGray vm">取消</a></td>
                </tr>
              </tbody>
            </table>
            <?php if($info['id']>0){?>
			  <script type="text/javascript">
			  <!--
				initMutic('<?php echo $info["ext_info"];?>',1);
				initRecommend('<?php echo $info["ext_recommend"];?>',1);
			  //-->
			  </script>
			  <?php }?>
          </div>
          </form>
          
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
<script type="text/javascript">
var selUser = {};

function addvotetouser(obj, type) {
var liid = 'votetouser_' + type + '_' + obj.value;
var userObj = $('vote_user_'+type);
if(obj.checked) {
if($(liid) == null) {
var newli = document.createElement("li");
newli.id = liid;

//创建隐含域
try {
var InputNode = document.createElement("<input type=\"hidden\" value=\""+ obj.value +"\" name=\"votetouser["+type+"]["+obj.getAttribute('user')+"]\">");
} catch(e) {
var InputNode = document.createElement("input");
InputNode.setAttribute("name", "votetouser["+type+"][]");
InputNode.setAttribute("type", "hidden");
InputNode.setAttribute("value", obj.value);
}
newli.appendChild(InputNode);
var newspan = document.createElement("span");
newspan.innerHTML ='<p>' + obj.getAttribute('user')+'</p> <a href="javascript:;" onclick="delSelUser(\''+liid+'\', \''+obj.value+'\');" title="删除" class="deltw">删除</a>';
newli.appendChild(newspan);
userObj.appendChild(newli);
selUser[obj.value] = obj.value;
}
} else {
userObj.removeChild($(liid));
delete selUser[obj.value];
}
}
function delSelUser(lid, uid) {
delete selUser[uid];
$(lid).parentNode.removeChild($(lid));
}

function setFlag(obj, utype) {
var uids = common = '';
obj.href = 'plugin.php?id=yb_vote:vote&ac=smember&gid=1&op=view&utype='+utype;
for(var key in selUser) {
if(parseInt(selUser[key])) {
uids = uids + common + selUser[key];
common = ',';
}
}
if(uids != '') {
obj.href += '&uids=' +  uids;
}
}





</script>
<!--底部-->
  	</div>
<?php include "footer.php";?>