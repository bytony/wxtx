<?php include "header.php";?>
<div id="aaa"></div>

<div id="wp" class="wp"><link href="index/css/style.css" rel="stylesheet" type="text/css">

 
<script src="index/js/jquery.min.js" type="text/javascript"></script>


 <!--中间内容-->
<div class="contentmanage">
    <div class="developer">
       <div class="appTitle normalTitle2">
        <?php include bidcms_template("user_top");?>
        <div class="clr"></div>
      </div> 
      <div class="tableContent">
      	
        <div class="content">
          <div class="cLineB"><h4>编辑分类</h4><a href="javascript:history.go(-1);" class="right btnGrayS vm" style="margin-top:-27px">返回</a></div> 
<div class="msgWrap">
  <form method="post" action="index.php">
 <input type="hidden" name="act" value="catemodify">
 <input type="hidden" name="con" value="user">
 <input type="hidden" name="commit" value="1">
 <INPUT TYPE="hidden" NAME="formhash" value="<?php echo formhash();?>">
 <input type="hidden" name="updateid" value="<?php echo $info['cate_id'];?>">
<table class="userinfoArea" style=" margin:20px 0 0 0;" border="0" cellspacing="0" cellpadding="0" width="100%">
  <thead>

 <tr>
  <th valign="top"><span class="red">*</span><label for="keyword">分类名称：</label></th>
  <td><input type="input" class="px" value="<?php echo $info['cate_name'];?>" name="cate_name" style="width:600px"></td>
</tr>

<tr>
  <th valign="top"><span class="red">*</span><label for="cate_face">分类图片：</label></th>
  <td><input type="input" class="px" id="cate_face" value="<?php echo $info['cate_face'];?>" name="cate_face" style="width:600px"><br>
                  </td>
</tr>
<tr>
  <th valign="top"><label for="sortorder">分类排序：</label></th>
  <td><input type="input" class="px" id="sortorder" value="<?php echo $info['sortorder'];?>" name="sortorder" style="width:100px"></td>
</tr>
<tr>
  <th valign="top"><label for="cate_url">分类自定义链接：</label></th>
  <td><input type="input" class="px" id="cate_url" value="<?php echo $info['cate_url'];?>" name="cate_url" style="width:600px"><br>可留空，系统将自动生成地址</td>
</tr>
  </thead>
  <tbody>
<tr>
  <th valign="top"><label for="cate_desc">分类描述：</label></th>
  <td><textarea class="px" id="cate_desc" name="cate_desc" style="width:600px;"><?php echo $info['cate_desc'];?></textarea><br>请不要多于300字!


</td>
   
</tr><tr>
  <th></th>
  <td><button type="submit" name="button" class="btnGreen left">保存</button>　<a href="index.php?con=user&act=cate" class="btnGray vm">取消</a>
  <div class="clr"></div>
</td>
</tr>
  </tbody>
</table>
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