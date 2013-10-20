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
          <div class="msgWrap">
          <form method="post" action="index.php" id="info">
            <table class="ListProduct" border="0" cellspacing="0" cellpadding="0" width="100%">
              <thead>
        <tr>
        <th class="answer">会员姓名</th>
        <th class="answer">会员联系方式</th>
        <th class="answer">会员等级</th>
        <th class="answer">编辑会员等级</th>
        <th class="answer">白金会员剩余次数</th>
        <th class="answer">操作</th>
                </tr>
              </thead>
              <tbody>
        <?php  foreach($catelist as $k=>$v){?>
        <tr>   
        <td><?php echo $v['weixin_open_name'];?></td>
        <td><?php echo $v['weixin_open_tel'];?></td>
        <td><?php if(!$v['weixin_open_rank']) echo "普通";else echo $v['weixin_open_rank'];?><td><a href="index.php?con=user&act=vipcard&rank=半年卡&tel=<?php echo $v['weixin_open_tel'];?>" target="_blank">半年卡用户</a> 
          <a href="index.php?con=user&act=vipcard&rank=年卡&tel=<?php echo $v['weixin_open_tel'];?>">年卡用户</a></td>
        <td><?php if(!$v['weixin_open_times']) echo "0";else echo $v['weixin_open_times'];?><td><a href="index.php?con=user&act=vipcard&times=<?php echo $v['weixin_open_times']-1;?>&tel=<?php echo $v['weixin_open_tel'];?>" target="_blank">消费一次</a> 
 
       <!--  <td><a href="index.php?con=wap&act=item&id=<?php echo $v['id'];?>&cid=<?php echo $v['cateid'];?>" target="_blank">预览</a> <a href="index.php?con=user&act=imagemodify&updateid=<?php echo $v['id'];?>">编辑</a> <a href="index.php?con=user&act=infodel&updateid=<?php echo $v['id'];?>" onclick="return checkdel();">删除</a></td> -->
        </tr>
        <?php }?>
        <tr><td colspan="8"><?php echo $infolist['pageinfo'];?></td></tr>
 
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