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
  <h4>文章分类管理 <span class="FAQ">设置好分类，在图文编辑的时候就可以选择分类，系统会自动生成一个3G网站。</span></h4>
     <a href="index.php?con=wap&act=index&wx_id=<?php echo $_SESSION['im61']['current_weixin_id'] ;?>" class="right btnGrayS vm" style="margin-top:0px;">预览微网站</a>
     <a href="index.php?con=user&act=catemodify" class="right btnGrayS vm" style="margin-top:0px;">添加分类</a>

  
 </div>
         
 <div class="msgWrap form">
<form method="post" action="index.php">
<input type="hidden" name="act" value="catemodify">
<input type="hidden" name="con" value="user">
<input type="hidden" name="commit" value="1">
<div class="bdrcontent">
<div id="div_ptype">
<table class="ListProduct" border="0" cellspacing="0" cellpadding="0" width="100%">
<thead>
<tr>
<th style=" width:120px;">分类名称</th>
<th style=" width:120px;">分类描述</th>
<th style=" width:70px;">显示顺序</th>
<th>分类图片外链地址</th>
<th>跳转外链网站地址</th>
<th style=" width:100px;" class="norightborder">操作</th>
</tr>
</thead>
                    
                      
<tbody>
<?php foreach($catelist as $k=>$v){?>
<tr id="cate_<?php echo $v['cate_id'];?>">
<td><?php echo $v['cate_name'];?></td>
<td><?php echo $v['cate_desc'];?></td>
<td><?php echo $v['sortorder'];?></td>
<td><a href="<?php echo $v['cate_face'];?>" target="_blank"><?php echo $v['cate_face'];?></a></td>
<td><?php echo $v['cate_url'];?></td>
<td class="norightborder"><a href="index.php?con=user&act=catemodify&updateid=<?php echo $v['cate_id'];?>">修改</a>　<a href="index.php?con=user&act=catedel&updateid=<?php echo $v['cate_id'];?>" onclick="return confirm('您确定要删除吗?');">删除</a></td>
</tr>
<?php }?>                  
</tbody>
</table>
<iframe name="selfiframe" style="display:none;"></iframe>
</div>
</div>
<div class="footactions" style="padding-left:10px">
  <div class="pages"></div>
</div>
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