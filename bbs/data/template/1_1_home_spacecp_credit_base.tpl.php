<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('spacecp_credit_base');
0
|| checktplrefresh('./template/default/home/spacecp_credit_base.htm', './template/default/common/header.htm', 1235670462, '1', './data/template/1_1_home_spacecp_credit_base.tpl.php', './template/default', 'home/spacecp_credit_base')
|| checktplrefresh('./template/default/home/spacecp_credit_base.htm', './template/default/home/spacecp_header.htm', 1235670462, '1', './data/template/1_1_home_spacecp_credit_base.tpl.php', './template/default', 'home/spacecp_credit_base')
|| checktplrefresh('./template/default/home/spacecp_credit_base.htm', './template/default/home/spacecp_credit_header.htm', 1235670462, '1', './data/template/1_1_home_spacecp_credit_base.tpl.php', './template/default', 'home/spacecp_credit_base')
|| checktplrefresh('./template/default/home/spacecp_credit_base.htm', './template/default/common/seccheck.htm', 1235670462, '1', './data/template/1_1_home_spacecp_credit_base.tpl.php', './template/default', 'home/spacecp_credit_base')
|| checktplrefresh('./template/default/home/spacecp_credit_base.htm', './template/default/home/spacecp_footer.htm', 1235670462, '1', './data/template/1_1_home_spacecp_credit_base.tpl.php', './template/default', 'home/spacecp_credit_base')
|| checktplrefresh('./template/default/home/spacecp_credit_base.htm', './template/default/common/footer.htm', 1235670462, '1', './data/template/1_1_home_spacecp_credit_base.tpl.php', './template/default', 'home/spacecp_credit_base')
|| checktplrefresh('./template/default/home/spacecp_credit_base.htm', './template/default/common/header_common.htm', 1235670462, '1', './data/template/1_1_home_spacecp_credit_base.tpl.php', './template/default', 'home/spacecp_credit_base')
|| checktplrefresh('./template/default/home/spacecp_credit_base.htm', './template/default/common/pubsearchform.htm', 1235670462, '1', './data/template/1_1_home_spacecp_credit_base.tpl.php', './template/default', 'home/spacecp_credit_base')
|| checktplrefresh('./template/default/home/spacecp_credit_base.htm', './template/default/home/spacecp_header_name.htm', 1235670462, '1', './data/template/1_1_home_spacecp_credit_base.tpl.php', './template/default', 'home/spacecp_credit_base')
|| checktplrefresh('./template/default/home/spacecp_credit_base.htm', './template/default/home/spacecp_header_name.htm', 1235670462, '1', './data/template/1_1_home_spacecp_credit_base.tpl.php', './template/default', 'home/spacecp_credit_base')
;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET;?>" />
<?php if($_G['config']['output']['iecompatible']) { ?><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE<?php echo $_G['config']['output']['iecompatible'];?>" /><?php } ?>
<title><?php if(!empty($navtitle)) { ?><?php echo $navtitle;?> - <?php } if(empty($nobbname)) { ?> <?php echo $_G['setting']['bbname'];?> - <?php } ?> Powered by Discuz!</title>
<?php echo $_G['setting']['seohead'];?>

<meta name="keywords" content="<?php if(!empty($metakeywords)) { echo dhtmlspecialchars($metakeywords); } ?>" />
<meta name="description" content="<?php if(!empty($metadescription)) { echo dhtmlspecialchars($metadescription); ?> <?php } if(empty($nobbname)) { ?>,<?php echo $_G['setting']['bbname'];?><?php } ?>" />
<meta name="generator" content="Discuz! <?php echo $_G['setting']['version'];?>" />
<meta name="author" content="Discuz! Team and Comsenz UI Team" />
<meta name="copyright" content="2001-2012 Comsenz Inc." />
<meta name="MSSmartTagsPreventParsing" content="True" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<base href="<?php echo $_G['siteurl'];?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_common.css?<?php echo VERHASH;?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_home_spacecp.css?<?php echo VERHASH;?>" /><?php if($_G['uid'] && isset($_G['cookie']['extstyle']) && strpos($_G['cookie']['extstyle'], TPLDIR) !== false) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['cookie']['extstyle'];?>/style.css" /><?php } elseif($_G['style']['defaultextstyle']) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['style']['defaultextstyle'];?>/style.css" /><?php } ?><script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STATICURL = '<?php echo STATICURL;?>', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>';</script>
<script src="<?php echo $_G['setting']['jspath'];?>common.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php if(empty($_GET['diy'])) { ?><?php $_GET['diy'] = '';?><?php } if(!isset($topic)) { ?><?php $topic = array();?><?php } ?>
<meta name="application-name" content="<?php echo $_G['setting']['bbname'];?>" />
<meta name="msapplication-tooltip" content="<?php echo $_G['setting']['bbname'];?>" />
<?php if($_G['setting']['portalstatus']) { ?><meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['1']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['portal']) ? 'http://'.$_G['setting']['domain']['app']['portal'] : $_G['siteurl'].'portal.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/portal.ico" /><?php } ?>
<meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['2']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['forum']) ? 'http://'.$_G['setting']['domain']['app']['forum'] : $_G['siteurl'].'forum.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/bbs.ico" />
<?php if($_G['setting']['groupstatus']) { ?><meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['3']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['group']) ? 'http://'.$_G['setting']['domain']['app']['group'] : $_G['siteurl'].'group.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/group.ico" /><?php } if(helper_access::check_module('feed')) { ?><meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['4']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['home']) ? 'http://'.$_G['setting']['domain']['app']['home'] : $_G['siteurl'].'home.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/home.ico" /><?php } if($_G['basescript'] == 'forum' && $_G['setting']['archiver']) { ?>
<link rel="archives" title="<?php echo $_G['setting']['bbname'];?>" href="<?php echo $_G['siteurl'];?>archiver/" />
<?php } if(!empty($rsshead)) { ?><?php echo $rsshead;?><?php } if(widthauto()) { ?>
<link rel="stylesheet" id="css_widthauto" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_widthauto.css?<?php echo VERHASH;?>" />
<script type="text/javascript">HTMLNODE.className += ' widthauto'</script>
<?php } if($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>forum.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } elseif($_G['basescript'] == 'home' || $_G['basescript'] == 'userapp') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>home.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } elseif($_G['basescript'] == 'portal') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>portal.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } if($_G['basescript'] != 'portal' && $_GET['diy'] == 'yes' && check_diy_perm($topic)) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>portal.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } if($_GET['diy'] == 'yes' && check_diy_perm($topic)) { ?>
<link rel="stylesheet" type="text/css" id="diy_common" href="data/cache/style_<?php echo STYLEID;?>_css_diy.css?<?php echo VERHASH;?>" />
<?php } ?>
</head>

<body id="nv_<?php echo $_G['basescript'];?>" class="pg_<?php echo CURMODULE;?><?php if($_G['basescript'] === 'portal' && CURMODULE === 'list' && !empty($cat)) { ?> <?php echo $cat['bodycss'];?><?php } ?>" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div><div id="ajaxwaitid"></div>
<?php if($_GET['diy'] == 'yes' && check_diy_perm($topic)) { include template('common/header_diy'); } if(check_diy_perm($topic)) { ?><?php
$__STATICURL = STATICURL;$diynav = <<<EOF

<a id="diy-tg" href="javascript:openDiy();" title="打开 DIY 面板" class="xi1 xw1" onmouseover="showMenu(this.id)"><img src="{$__STATICURL}image/diy/panel-toggle.png" alt="DIY" /></a>
<div id="diy-tg_menu" style="display: none;">
<ul>
<li><a href="javascript:saveUserdata('diy_advance_mode', '');openDiy();" class="xi2">简洁模式</a></li>
<li><a href="javascript:saveUserdata('diy_advance_mode', '1');openDiy();" class="xi2">高级模式</a></li>
</ul>
</div>

EOF;
?>
<?php } if(CURMODULE == 'topic' && $topic && empty($topic['useheader']) && check_diy_perm($topic)) { ?>
<?php echo $diynav;?>
<?php } if(empty($topic) || $topic['useheader']) { if($_G['setting']['mobile']['allowmobile'] && (!$_G['setting']['cacheindexlife'] && !$_G['setting']['cachethreadon'] || $_G['uid']) && ($_GET['diy'] != 'yes' || !$_GET['inajax']) && ($_G['mobile'] != '' && $_G['cookie']['mobile'] == '' && $_GET['mobile'] != 'no')) { ?>
<div class="xi1 bm bm_c">
    请选择 <a href="<?php echo $_G['siteurl'];?>forum.php?mobile=yes">进入手机版</a> <span class="xg1">|</span> <a href="<?php echo $_G['setting']['mobile']['nomobileurl'];?>">继续访问电脑版</a>
</div>
<?php } ?>

<div id="toptb" class="cl">
<?php if(!empty($_G['setting']['pluginhooks']['global_cpnav_top'])) echo $_G['setting']['pluginhooks']['global_cpnav_top'];?>
<div class="wp">
<div class="z"><?php if(is_array($_G['setting']['topnavs']['0'])) foreach($_G['setting']['topnavs']['0'] as $nav) { if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?><?php echo $nav['code'];?><?php } } ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_cpnav_extra1'])) echo $_G['setting']['pluginhooks']['global_cpnav_extra1'];?>
</div>
<div class="y">
<a id="switchblind" href="javascript:;" onclick="toggleBlind(this)" title="开启辅助访问" class="switchblind">开启辅助访问</a>
<?php if(!empty($_G['setting']['pluginhooks']['global_cpnav_extra2'])) echo $_G['setting']['pluginhooks']['global_cpnav_extra2'];?><?php if(is_array($_G['setting']['topnavs']['1'])) foreach($_G['setting']['topnavs']['1'] as $nav) { if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?><?php echo $nav['code'];?><?php } } if(empty($_G['disabledwidthauto']) && $_G['setting']['switchwidthauto']) { ?>
<a href="javascript:;" onclick="widthauto(this)"><?php if(widthauto()) { ?>切换到窄版<?php } else { ?>切换到宽版<?php } ?></a>
<?php } if($_G['uid'] && !empty($_G['style']['extstyle'])) { ?><a id="sslct" href="javascript:;" onmouseover="delayShow(this, function() {showMenu({'ctrlid':'sslct','pos':'34!'})});">切换风格</a><?php } if(check_diy_perm($topic)) { ?>
<?php echo $diynav;?>
<?php } ?>
</div>
</div>
</div>

<?php if(!IS_ROBOT) { if($_G['uid'] && !empty($_G['style']['extstyle'])) { ?>
<div id="sslct_menu" class="cl p_pop" style="display: none;">
<?php if(!$_G['style']['defaultextstyle']) { ?><span class="sslct_btn" onclick="extstyle('')" title="默认"><i></i></span><?php } if(is_array($_G['style']['extstyle'])) foreach($_G['style']['extstyle'] as $extstyle) { ?><span class="sslct_btn" onclick="extstyle('<?php echo $extstyle['0'];?>')" title="<?php echo $extstyle['1'];?>"><i style='background:<?php echo $extstyle['2'];?>'></i></span>
<?php } ?>
</div>
<?php } ?>

<div id="qmenu_menu" class="p_pop <?php if(!$_G['uid']) { ?>blk<?php } ?>" style="display: none;">
<?php if($_G['uid']) { ?>
<ul><?php if(is_array($_G['setting']['mynavs'])) foreach($_G['setting']['mynavs'] as $nav) { if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?>
<li><?php echo $nav['code'];?></li>
<?php } } ?>
</ul>
<?php } elseif($_G['connectguest']) { ?>
<div class="ptm pbw hm">
请先<br /><a class="xi2" href="member.php?mod=connect"><strong>完善帐号信息</strong></a> 或 <a href="member.php?mod=connect&amp;ac=bind" class="xi2 xw1"><strong>绑定已有帐号</strong></a><br />后使用快捷导航
</div>
<?php } else { ?>
<div class="ptm pbw hm">
请 <a href="javascript:;" class="xi2" onclick="lsSubmit()"><strong>登录</strong></a> 后使用快捷导航<br />没有帐号？<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" class="xi2 xw1"><?php echo $_G['setting']['reglinkname'];?></a>
</div>
<?php } ?>
</div>
<?php } ?><?php echo adshow("headerbanner/wp a_h");?><div id="hd">
<div class="wp">
<div class="hdc cl"><?php $mnid = getcurrentnav();?><h2><?php if(!isset($_G['setting']['navlogos'][$mnid])) { ?><a href="<?php if($_G['setting']['domain']['app']['default']) { ?>http://<?php echo $_G['setting']['domain']['app']['default'];?>/<?php } else { ?>./<?php } ?>" title="<?php echo $_G['setting']['bbname'];?>"><?php echo $_G['style']['boardlogo'];?></a><?php } else { ?><?php echo $_G['setting']['navlogos'][$mnid];?><?php } ?></h2>

<?php if($_G['uid']) { ?>
<div id="um">
<div class="avt y"><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>"><?php echo avatar($_G[uid],small);?></a></div>
<p>
<strong class="vwmy<?php if($_G['setting']['connect']['allow'] && $_G['member']['conisbind']) { ?> qq<?php } ?>"><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>" target="_blank" title="访问我的空间"><?php echo $_G['member']['username'];?></a></strong>
<?php if($_G['group']['allowinvisible']) { ?>
<span id="loginstatus">
<a id="loginstatusid" href="member.php?mod=switchstatus" title="切换在线状态" onclick="ajaxget(this.href, 'loginstatus');return false;" class="xi2"></a>
</span>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra1'])) echo $_G['setting']['pluginhooks']['global_usernav_extra1'];?>
<span class="pipe">|</span><?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra4'])) echo $_G['setting']['pluginhooks']['global_usernav_extra4'];?><a href="home.php?mod=spacecp">设置</a>
<span class="pipe">|</span><a href="home.php?mod=space&amp;do=pm" id="pm_ntc"<?php if($_G['member']['newpm']) { ?> class="new"<?php } ?>>消息</a>
<span class="pipe">|</span><a href="home.php?mod=space&amp;do=notice" id="myprompt"<?php if($_G['member']['newprompt']) { ?> class="new"<?php } ?>>提醒<?php if($_G['member']['newprompt']) { ?>(<?php echo $_G['member']['newprompt'];?>)<?php } ?></a><span id="myprompt_check"></span>
<?php if($_G['setting']['taskon'] && !empty($_G['cookie']['taskdoing_'.$_G['uid']])) { ?><span class="pipe">|</span><a href="home.php?mod=task&amp;item=doing" id="task_ntc" class="new">进行中的任务</a><?php } if(($_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle'] || $_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 6) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3))) { ?>
<span class="pipe">|</span><a href="portal.php?mod=portalcp"><?php if($_G['setting']['portalstatus'] ) { ?>门户管理<?php } else { ?>模块管理<?php } ?></a>
<?php } if($_G['uid'] && $_G['group']['radminid'] > 1) { ?>
<span class="pipe">|</span><a href="forum.php?mod=modcp&amp;fid=<?php echo $_G['fid'];?>" target="_blank"><?php echo $_G['setting']['navs']['2']['navname'];?>管理</a>
<?php } if($_G['uid'] && $_G['adminid'] == 1 && $_G['setting']['cloud_status']) { ?>
<span class="pipe">|</span><a href="admin.php?frames=yes&amp;action=cloud&amp;operation=applist" target="_blank">云平台</a>
<?php } if($_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)) { ?>
<span class="pipe">|</span><a href="admin.php" target="_blank">管理中心</a>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra2'])) echo $_G['setting']['pluginhooks']['global_usernav_extra2'];?>
<span class="pipe">|</span><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a>
</p>
<p>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra3'])) echo $_G['setting']['pluginhooks']['global_usernav_extra3'];?><?php $upgradecredit = $_G['uid'] && $_G['group']['grouptype'] == 'member' && $_G['group']['groupcreditslower'] != 999999999 ? $_G['group']['groupcreditslower'] - $_G['member']['credits'] : false;?><a href="home.php?mod=spacecp&amp;ac=credit&amp;showcredit=1" id="extcreditmenu"<?php if(!$_G['setting']['bbclosed']) { ?> onmouseover="delayShow(this, showCreditmenu);" class="showmenu"<?php } ?>>积分: <?php echo $_G['member']['credits'];?></a>
<span class="pipe">|</span>用户组: <a href="home.php?mod=spacecp&amp;ac=usergroup"<?php if($upgradecredit !== 'false') { ?> id="g_upmine" class="xi2" onmouseover="delayShow(this, showUpgradeinfo)"<?php } ?>><?php echo $_G['group']['grouptitle'];?></a>
</p>
</div>
<?php } elseif(!empty($_G['cookie']['loginuser'])) { ?>
<p>
<strong><a id="loginuser" class="noborder"><?php echo dhtmlspecialchars($_G['cookie']['loginuser']); ?></a></strong>
<span class="pipe">|</span><a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href)">激活</a>
<span class="pipe">|</span><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a>
</p>
<?php } elseif(!$_G['connectguest']) { include template('member/login_simple'); } else { ?>
<div id="um">
<div class="avt y"><?php echo avatar(0,small);?></div>
<p>
<strong class="vwmy qq"><?php echo $_G['member']['username'];?></strong>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra1'])) echo $_G['setting']['pluginhooks']['global_usernav_extra1'];?>
<span class="pipe">|</span><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a>
</p>
<p>
<a href="home.php?mod=spacecp&amp;ac=credit&amp;showcredit=1">积分: 0</a>
<span class="pipe">|</span>用户组: <?php echo $_G['group']['grouptitle'];?>
</p>
</div>
<?php } ?>
</div>

<div id="nv">
<a href="javascript:;" id="qmenu" onmouseover="showMenu({'ctrlid':'qmenu','pos':'34!','ctrlclass':'a','duration':2});">快捷导航</a>
<ul><?php if(is_array($_G['setting']['navs'])) foreach($_G['setting']['navs'] as $nav) { if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?><li <?php if($mnid == $nav['navid']) { ?>class="a" <?php } ?><?php echo $nav['nav'];?>></li><?php } } ?>
</ul>
<?php if(!empty($_G['setting']['pluginhooks']['global_nav_extra'])) echo $_G['setting']['pluginhooks']['global_nav_extra'];?>
</div>
<?php if(!empty($_G['setting']['plugins']['jsmenu'])) { ?>
<ul class="p_pop h_pop" id="plugin_menu" style="display: none"><?php if(is_array($_G['setting']['plugins']['jsmenu'])) foreach($_G['setting']['plugins']['jsmenu'] as $module) { ?> <?php if(!$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])) { ?>
 <li><?php echo $module['url'];?></li>
 <?php } } ?>
</ul>
<?php } ?>
<?php echo $_G['setting']['menunavs'];?>
<div id="mu" class="cl">
<?php if($_G['setting']['subnavs']) { if(is_array($_G['setting']['subnavs'])) foreach($_G['setting']['subnavs'] as $navid => $subnav) { if($_G['setting']['navsubhover'] || $mnid == $navid) { ?>
<ul class="cl <?php if($mnid == $navid) { ?>current<?php } ?>" id="snav_<?php echo $navid;?>" style="display:<?php if($mnid != $navid) { ?>none<?php } ?>">
<?php echo $subnav;?>
</ul>
<?php } } } ?>
</div><?php echo adshow("subnavbanner/a_mu");?><?php if($_G['setting']['search']) { ?><?php $slist = array();?><?php if($_G['fid'] && $_G['forum']['status'] != 3 && $mod != 'group') { ?><?php
$slist[forumfid] = <<<EOF
<li><a href="javascript:;" rel="curforum" fid="{$_G['fid']}" >本版</a></li>
EOF;
?><?php } if($_G['setting']['portalstatus'] && $_G['setting']['search']['portal']['status'] && ($_G['group']['allowsearch'] & 1 || $_G['adminid'] == 1)) { ?><?php
$slist[portal] = <<<EOF
<li><a href="javascript:;" rel="article">文章</a></li>
EOF;
?><?php } if($_G['setting']['search']['forum']['status'] && ($_G['group']['allowsearch'] & 2 || $_G['adminid'] == 1)) { ?><?php
$slist[forum] = <<<EOF
<li><a href="javascript:;" rel="forum" class="curtype">帖子</a></li>
EOF;
?><?php } if(helper_access::check_module('blog') && $_G['setting']['search']['blog']['status'] && ($_G['group']['allowsearch'] & 4 || $_G['adminid'] == 1)) { ?><?php
$slist[blog] = <<<EOF
<li><a href="javascript:;" rel="blog">日志</a></li>
EOF;
?><?php } if(helper_access::check_module('album') && $_G['setting']['search']['album']['status'] && ($_G['group']['allowsearch'] & 8 || $_G['adminid'] == 1)) { ?><?php
$slist[album] = <<<EOF
<li><a href="javascript:;" rel="album">相册</a></li>
EOF;
?><?php } if($_G['setting']['groupstatus'] && $_G['setting']['search']['group']['status'] && ($_G['group']['allowsearch'] & 16 || $_G['adminid'] == 1)) { ?><?php
$slist[group] = <<<EOF
<li><a href="javascript:;" rel="group">{$_G['setting']['navs']['3']['navname']}</a></li>
EOF;
?><?php } ?><?php
$slist[user] = <<<EOF
<li><a href="javascript:;" rel="user">用户</a></li>
EOF;
?>
<?php } if($_G['setting']['search'] && $slist) { ?>
<div id="scbar" class="<?php if($_G['setting']['srchhotkeywords'] && count($_G['setting']['srchhotkeywords']) > 5) { ?>scbar_narrow <?php } ?>cl">
<form id="scbar_form" method="<?php if($_G['fid'] && !empty($searchparams['url'])) { ?>get<?php } else { ?>post<?php } ?>" autocomplete="off" onsubmit="searchFocus($('scbar_txt'))" action="<?php if($_G['fid'] && !empty($searchparams['url'])) { ?><?php echo $searchparams['url'];?><?php } else { ?>search.php?searchsubmit=yes<?php } ?>" target="_blank">
<input type="hidden" name="mod" id="scbar_mod" value="search" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="srchtype" value="title" />
<input type="hidden" name="srhfid" value="<?php echo $_G['fid'];?>" />
<input type="hidden" name="srhlocality" value="<?php echo $_G['basescript'];?>::<?php echo CURMODULE;?>" />
<?php if(!empty($searchparams['params'])) { if(is_array($searchparams['params'])) foreach($searchparams['params'] as $key => $value) { ?><?php $srchotquery .= '&' . $key . '=' . rawurlencode($value);?><input type="hidden" name="<?php echo $key;?>" value="<?php echo $value;?>" />
<?php } ?>
<input type="hidden" name="source" value="discuz" />
<input type="hidden" name="fId" id="srchFId" value="<?php echo $_G['fid'];?>" />
<input type="hidden" name="q" id="cloudsearchquery" value="" />

<style>
#scbar { overflow: visible; position: relative; }
#sg{ background: #FFF; width:456px; border: 1px solid #B2C7DA; }
.scbar_narrow #sg { width: 316px; }
#sg li { padding:0 8px; line-height:30px; font-size:14px; }
#sg li span { color:#999; }
.sml { background:#FFF; cursor:default; }
.smo { background:#E5EDF2; cursor:default; }
            </style>
            <div style="display: none; position: absolute; top:37px; left:44px;" id="sg">
                <div id="st_box" cellpadding="2" cellspacing="0"></div>
            </div>
<?php } ?>
<table cellspacing="0" cellpadding="0">
<tr>
<td class="scbar_icon_td"></td>
<td class="scbar_txt_td"><input type="text" name="srchtxt" id="scbar_txt" value="请输入搜索内容" autocomplete="off" x-webkit-speech speech /></td>
<td class="scbar_type_td"><a href="javascript:;" id="scbar_type" class="showmenu xg1 xs2" onclick="showMenu(this.id)" hidefocus="true">搜索</a></td>
<td class="scbar_btn_td"><button type="submit" name="searchsubmit" id="scbar_btn" sc="1" class="pn pnc" value="true"><strong class="xi2 xs2">搜索</strong></button></td>
<td class="scbar_hot_td">
<div id="scbar_hot">
<?php if($_G['setting']['srchhotkeywords']) { ?>
<strong class="xw1">热搜: </strong><?php if(is_array($_G['setting']['srchhotkeywords'])) foreach($_G['setting']['srchhotkeywords'] as $val) { if($val=trim($val)) { ?><?php $valenc=rawurlencode($val);?><?php
$__FORMHASH = FORMHASH;$srchhotkeywords[] = <<<EOF


EOF;
 if(!empty($searchparams['url'])) { 
$srchhotkeywords[] .= <<<EOF

<a href="{$searchparams['url']}?q={$valenc}&source=hotsearch{$srchotquery}" target="_blank" class="xi2" sc="1">{$val}</a>

EOF;
 } else { 
$srchhotkeywords[] .= <<<EOF

<a href="search.php?mod=forum&amp;srchtxt={$valenc}&amp;formhash={$__FORMHASH}&amp;searchsubmit=true&amp;source=hotsearch" target="_blank" class="xi2" sc="1">{$val}</a>

EOF;
 } 
$srchhotkeywords[] .= <<<EOF


EOF;
?>
<?php } } echo implode('', $srchhotkeywords);; } ?>
</div>
</td>
</tr>
</table>
</form>
</div>
<ul id="scbar_type_menu" class="p_pop" style="display: none;"><?php echo implode('', $slist);; ?></ul>
<script type="text/javascript">
initSearchmenu('scbar', '<?php echo $searchparams['url'];?>');
</script>
<?php } ?></div>
</div>

<?php if(!empty($_G['setting']['pluginhooks']['global_header'])) echo $_G['setting']['pluginhooks']['global_header'];?>
<?php } ?>

<div id="wp" class="wp"><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<a href="home.php?mod=spacecp">设置</a> <em>&rsaquo;</em><?php if($actives['profile']) { ?>
个人资料
<?php } elseif($actives['verify']) { ?>
认证
<?php } elseif($actives['avatar']) { ?>
修改头像
<?php } elseif($actives['credit']) { ?>
积分
<?php } elseif($actives['usergroup']) { ?>
用户组
<?php } elseif($actives['privacy']) { ?>
隐私筛选
<?php } elseif($actives['sendmail']) { ?>
邮件提醒
<?php } elseif($actives['password']) { ?>
密码安全
<?php } elseif($actives['promotion']) { ?>
访问推广
<?php } elseif($actives['plugin']) { ?>
<?php echo $_G['setting']['plugins'][$pluginkey][$_GET['id']]['name'];?>
<?php } ?></div>
</div>
<div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm bw0">
<h1 class="mt"><?php if($actives['profile']) { ?>
个人资料
<?php } elseif($actives['verify']) { ?>
认证
<?php } elseif($actives['avatar']) { ?>
修改头像
<?php } elseif($actives['credit']) { ?>
积分
<?php } elseif($actives['usergroup']) { ?>
用户组
<?php } elseif($actives['privacy']) { ?>
隐私筛选
<?php } elseif($actives['sendmail']) { ?>
邮件提醒
<?php } elseif($actives['password']) { ?>
密码安全
<?php } elseif($actives['promotion']) { ?>
访问推广
<?php } elseif($actives['plugin']) { ?>
<?php echo $_G['setting']['plugins'][$pluginkey][$_GET['id']]['name'];?>
<?php } ?></h1>
<!--don't close the div here--><?php if(!empty($_G['setting']['pluginhooks']['spacecp_credit_top'])) echo $_G['setting']['pluginhooks']['spacecp_credit_top'];?><ul class="tb cl">
<li <?php echo $opactives['base'];?>><a href="home.php?mod=spacecp&amp;ac=credit&amp;op=base">我的积分</a></li>
<?php if($_G['setting']['ec_ratio'] && ($_G['setting']['ec_account'] || $_G['setting']['ec_tenpay_opentrans_chnid'] || $_G['setting']['ec_tenpay_bargainor']) || $_G['setting']['card']['open']) { ?>
<li <?php echo $opactives['buy'];?>><a href="home.php?mod=spacecp&amp;ac=credit&amp;op=buy">充值</a></li>
<?php } if($_G['setting']['transferstatus'] && $_G['group']['allowtransfer']) { ?>
<li <?php echo $opactives['transfer'];?>><a href="home.php?mod=spacecp&amp;ac=credit&amp;op=transfer">转帐</a></li>
<?php } if($_G['setting']['exchangestatus']) { ?>
<li <?php echo $opactives['exchange'];?>><a href="home.php?mod=spacecp&amp;ac=credit&amp;op=exchange">兑换</a></li>
<?php } ?>
<li <?php echo $opactives['log'];?>><a href="home.php?mod=spacecp&amp;ac=credit&amp;op=log">积分记录</a></li>
<li <?php echo $opactives['rule'];?>><a href="home.php?mod=spacecp&amp;ac=credit&amp;op=rule">积分规则</a></li>
<?php if(!empty($_G['setting']['plugins']['spacecp_credit'])) { if(is_array($_G['setting']['plugins']['spacecp_credit'])) foreach($_G['setting']['plugins']['spacecp_credit'] as $id => $module) { if(!$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])) { ?><li<?php if($_GET['id'] == $id) { ?> class="a"<?php } ?>><a href="home.php?mod=spacecp&amp;ac=plugin&amp;op=credit&amp;id=<?php echo $id;?>"><?php echo $module['name'];?></a></li><?php } } } if($op == 'rule') { ?>
<li class="y">
<select onchange="location.href='home.php?mod=spacecp&ac=credit&op=rule&fid='+this.value"><option value="">全局规则</option><?php echo $select;?></select>
</li>
<?php } ?>
</ul><?php if(in_array($_GET['op'], array('base', 'buy', 'transfer', 'exchange'))) { ?>
<ul class="creditl mtm bbda cl"><?php $creditid=0;?><?php if($_GET['op'] == 'base' && $_G['setting']['creditstrans']) { ?><?php $creditid=$_G['setting']['creditstrans'];?><?php if($_G['setting']['extcredits'][$creditid]) { ?><?php $credit=$_G['setting']['extcredits'][$creditid];?><li class="xi1 cl"><em><?php if($credit['img']) { ?> <?php echo $credit['img'];?><?php } ?> <?php echo $credit['title'];?>: </em><?php echo getuserprofile('extcredits'.$creditid);; ?> <?php echo $credit['unit'];?> &nbsp; <?php if(($_G['setting']['ec_ratio'] && ($_G['setting']['ec_tenpay_opentrans_chnid'] || $_G['setting']['ec_tenpay_bargainor'] || $_G['setting']['ec_account'])) || $_G['setting']['card']['open']) { ?><a href="home.php?mod=spacecp&amp;ac=credit&amp;op=buy" class="xi2">立即充值&raquo;</a><?php } ?></li>
<?php } } if(is_array($_G['setting']['extcredits'])) foreach($_G['setting']['extcredits'] as $id => $credit) { if($id!=$creditid) { ?>
<li><em><?php if($credit['img']) { ?> <?php echo $credit['img'];?><?php } ?> <?php echo $credit['title'];?>: </em><?php echo getuserprofile('extcredits'.$id);; ?> <?php echo $credit['unit'];?></li>
<?php } } if($_GET['op'] == 'base') { ?>
<li class="cl"><em>积分: </em><?php echo $_G['member']['credits'];?> <span class="xg1">( <?php echo $creditsformulaexp;?> )</span></li>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['spacecp_credit_extra'])) echo $_G['setting']['pluginhooks']['spacecp_credit_extra'];?>
</ul>
<?php } if($_GET['op'] == 'base') { ?>
<table summary="转账与兑换" cellspacing="0" cellpadding="0" class="dt mtm">
<caption>
<h2 class="mbm xs2">
<a href="home.php?mod=spacecp&amp;ac=credit&amp;op=log" class="xi2 xs1 xw0 y">查看更多&raquo;</a>积分记录
</h2>
</caption>
<tr>
<th width="80">操作</th>
<th width="80">积分变更</th>
<th>详情</th>
<th width="100">变更时间</th>
</tr>
<?php if($loglist) { if(is_array($loglist)) foreach($loglist as $value) { ?><?php $value = makecreditlog($value, $otherinfo);?><tr>
<td><a href="home.php?mod=spacecp&amp;ac=credit&amp;op=log&amp;optype=<?php echo $value['operation'];?>"><?php echo $value['optype'];?></a></td>
<td><?php echo $value['credit'];?></td>
<td><?php echo $value['opinfo'];?></td>
<td><?php echo $value['dateline'];?></td>
</tr>
<?php } } else { ?>
<tr><td colspan="4"><p class="emp">目前没有积分交易记录</p></td></tr>
<?php } ?>
</table>

<?php } elseif($_GET['op'] == 'buy') { if(($_G['setting']['ec_ratio'] && ($_G['setting']['ec_account'] || $_G['setting']['ec_tenpay_opentrans_chnid'] || $_G['setting']['ec_tenpay_bargainor'])) || $_G['setting']['card']['open']) { ?>
<form id="addfundsform" name="addfundsform" method="post" autocomplete="off" action="home.php?mod=spacecp&amp;ac=credit&amp;op=buy" onsubmit="ajaxpost(this.id, 'return_addfundsform');">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="addfundssubmit" value="true" />
<input type="hidden" name="handlekey" value="buycredit" />
<table cellspacing="0" cellpadding="0" class="tfm mtn">
<tr>
<th>支付方式</th>
<td colspan="2">
<?php if($_G['setting']['ec_ratio'] && ($_G['setting']['ec_tenpay_bargainor'] || $_G['setting']['ec_tenpay_opentrans_chnid'])) { ?>
<div class="mbm pbn bbda cl">
<div id="div#tenpayBankList"></div><span id="#bank_type_value"></span>
<link rel="stylesheet" type="text/css" href="http://union.tenpay.com/bankList/css_col3.css" />
<script type="text/javascript">
$('div#tenpayBankList').html = function(){$('div#tenpayBankList').innerHTML = htmlString.replace(/<span.+?\/span>/g, ''); };
$("#bank_type_value").val = function(){<?php if($_G['setting']['card']['open']) { ?>$('cardbox').style.display='none';if($('card_box_sec')){$('card_box_sec').style.display='none';}$('paybox').style.display='';<?php } ?>};
appendscript('http://union.tenpay.com/bankList/bank.js', '');
</script>
</div>
<?php } ?>
<div class="long-logo mbw">
<ul>
<?php if($_G['setting']['ec_ratio'] && $_G['setting']['ec_account']) { ?>
<li class="z">
<input name="bank_type" type="radio" value="alipay" class="vm" id="apitype_alipay" <?php echo $ecchecked;?> onclick="checkValue(this)" /><label class="vm" style="margin-right:18px;width:135px;height:32px;background:#FFF url(<?php echo STATICURL;?>image/common/alipay_logo.gif) no-repeat;border:1px solid #DDD;display:inline-block;" onclick="<?php if($_G['setting']['card']['open']) { ?>$('cardbox').style.display='none';if($('card_box_sec')){$('card_box_sec').style.display='none';}$('paybox').style.display='';<?php } ?>" for="apitype_alipay"></label>
</li>
<?php } if($_G['setting']['card']['open']) { ?>
<li>
<input name="bank_type" type="radio" value="card" id="apitype_card" class="vm" <?php echo $ecchecked;?>  onclick="activatecardbox();" /><label class="vm" style="padding-left:10px;width:125px;height:32px;line-height:32px;background:#FFF;border:1px solid #DDD;display:inline-block;" onclick="activatecardbox();"><span class="xs2">充值卡充值</span></label>
</li>
<?php } ?>
</ul>
</div>
</td>
</tr>
<tr id="paybox" style="<?php if(($_G['setting']['ec_tenpay_bargainor'] || $_G['setting']['ec_tenpay_opentrans_chnid'] || $_G['setting']['ec_account']) && empty($ecchecked) ) { ?>display:;<?php } else { ?>display:none;<?php } ?>">
<th>充值</th>
<td class="pns">
<input type="text" size="5" class="px" style="width: auto;" id="addfundamount" name="addfundamount" value="0" onkeyup="addcalcredit()" />
&nbsp;<?php echo $_G['setting']['extcredits'][$_G['setting']['creditstrans']]['title'];?>&nbsp;
所需&nbsp;人民币 <span id="desamount">0</span> 元
</td>
<td width="300" class="d">
人民币现金 <strong>1</strong> 元 =  <strong><?php echo $_G['setting']['ec_ratio'];?></strong> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstrans']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstrans']]['title'];?>
<?php if($_G['setting']['ec_mincredits']) { ?><br />单次最低充值  <strong><?php echo $_G['setting']['ec_mincredits'];?></strong> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstrans']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstrans']]['title'];?><?php } if($_G['setting']['ec_maxcredits']) { ?><br />单次最高充值  <strong><?php echo $_G['setting']['ec_maxcredits'];?></strong> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstrans']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstrans']]['title'];?><?php } if($_G['setting']['ec_maxcreditspermonth']) { ?><br />最近 30 天最高充值  <strong><?php echo $_G['setting']['ec_maxcreditspermonth'];?></strong> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstrans']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstrans']]['title'];?><?php } ?>
</td>
</tr>
<?php if($_G['setting']['card']['open']) { ?>
<tr id="cardbox" style="<?php if($_G['setting']['card']['open'] && $ecchecked) { ?>display:;<?php } else { ?>display:none;<?php } ?>">
<th>充值卡</th>
<td colspan="2">
<input type="text" class="px" id="cardid" name="cardid" />
</td>
</tr>
<?php if($_G['setting']['seccodestatus'] & 16) { ?><?php
$sectpl = <<<EOF
<tr><th><sec></th><td colspan="2"><span id="sec<hash>" onclick="showMenu({'ctrlid':this.id,'win':'{$_GET['handlekey']}'})"><sec></span><div id="sec<hash>_menu" class="p_pop p_opt" style="display:none"><sec></div></td></tr>
EOF;
?>
<tbody id="card_box_sec" style="<?php if($_G['setting']['card']['open'] && $ecchecked) { ?>display:;<?php } else { ?>display:none;<?php } ?>"><?php $_G['sechashi'] = !empty($_G['cookie']['sechashi']) ? $_G['sechash'] + 1 : 0;
$sechash = 'S'.($_G['inajax'] ? 'A' : '').$_G['sid'].$_G['sechashi'];
$sectpl = !empty($sectpl) ? explode("<sec>", $sectpl) : array('<br />',': ','<br />','');
$sectpldefault = $sectpl;
$sectplqaa = str_replace('<hash>', 'qaa'.$sechash, $sectpldefault);
$sectplcode = str_replace('<hash>', 'code'.$sechash, $sectpldefault);
$secshow = !isset($secshow) ? 1 : $secshow;
$sectabindex = !isset($sectabindex) ? 1 : $sectabindex;?><?php
$__STATICURL = STATICURL;$seccheckhtml = <<<EOF

<input name="sechash" type="hidden" value="{$sechash}" />

EOF;
 if($sectpl) { if($secqaacheck) { 
$seccheckhtml .= <<<EOF

{$sectplqaa['0']}验证问答{$sectplqaa['1']}<input name="secanswer" id="secqaaverify_{$sechash}" type="text" autocomplete="off" style="width:100px" class="txt px vm" onblur="checksec('qaa', '{$sechash}')" tabindex="{$sectabindex}" />
<a href="javascript:;" onclick="updatesecqaa('{$sechash}');doane(event);" class="xi2">换一个</a>
<span id="checksecqaaverify_{$sechash}"><img src="{$__STATICURL}image/common/none.gif" width="16" height="16" class="vm" /></span>
{$sectplqaa['2']}<span id="secqaa_{$sechash}"></span>

EOF;
 if($secshow) { 
$seccheckhtml .= <<<EOF
<script type="text/javascript" reload="1">updatesecqaa('{$sechash}');</script>
EOF;
 } 
$seccheckhtml .= <<<EOF

{$sectplqaa['3']}

EOF;
 } if($seccodecheck) { 
$seccheckhtml .= <<<EOF

{$sectplcode['0']}验证码{$sectplcode['1']}<input name="seccodeverify" id="seccodeverify_{$sechash}" type="text" autocomplete="off" style="
EOF;
 if($_G['setting']['seccodedata']['type'] != 1) { 
$seccheckhtml .= <<<EOF
ime-mode:disabled;
EOF;
 } 
$seccheckhtml .= <<<EOF
width:100px" class="txt px vm" onblur="checksec('code', '{$sechash}')" tabindex="{$sectabindex}" />
<a href="javascript:;" onclick="updateseccode('{$sechash}');doane(event);" class="xi2">换一个</a>
<span id="checkseccodeverify_{$sechash}"><img src="{$__STATICURL}image/common/none.gif" width="16" height="16" class="vm" /></span>
{$sectplcode['2']}<span id="seccode_{$sechash}"></span>

EOF;
 if($secshow) { 
$seccheckhtml .= <<<EOF
<script type="text/javascript" reload="1">updateseccode('{$sechash}');</script>
EOF;
 } 
$seccheckhtml .= <<<EOF

{$sectplcode['3']}

EOF;
 } } 
$seccheckhtml .= <<<EOF


EOF;
?><?php unset($secshow);?><?php if(empty($secreturn)) { ?><?php echo $seccheckhtml;?><?php } ?></tbody>
<?php } } ?>
<tr>
<th>&nbsp;</th>
<td colspan="2">
<button type="submit" name="addfundssubmit_btn" class="pn" id="addfundssubmit_btn" value="true"><em>充值</em></button>
</td>
</tr>

</table>
</form>
<span style="display: none" id="return_addfundsform"></span>
<script type="text/javascript">
function addcalcredit() {
var addfundamount = $('addfundamount').value.replace(/^0/, '');
var addfundamount = parseInt(addfundamount);
$('desamount').innerHTML = !isNaN(addfundamount) ? Math.ceil(((addfundamount / <?php echo $_G['setting']['ec_ratio'];?>) * 100)) / 100 : 0;
}
<?php if($_G['setting']['card']['open']) { ?>
function activatecardbox() {
$('apitype_card').checked=true;
$('cardbox').style.display='';
if($('card_box_sec')){
$('card_box_sec').style.display='';
}
$('paybox').style.display='none';
}
<?php } ?>
</script>
<?php } } elseif($_GET['op'] == 'transfer') { if($_G['setting']['transferstatus'] && $_G['group']['allowtransfer']) { ?>
<form id="transferform" name="transferform" method="post" autocomplete="off" action="home.php?mod=spacecp&amp;ac=credit&amp;op=transfer" onsubmit="ajaxpost(this.id, 'return_transfercredit');">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="transfersubmit" value="true" />
<input type="hidden" name="handlekey" value="transfercredit" />
<table cellspacing="0" cellpadding="0" class="tfm mtn">
<tr>
<th>转账</th>
<td class="pns">
<input type="text" name="transferamount" id="transferamount" class="px" size="5" style="width: auto;" value="0" />
&nbsp;<?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['9']]['title'];?>&nbsp;
给&nbsp;
<input type="text" name="to" id="to" class="px" size="15" style="width: auto;" />
</td>
<td width="300" class="d">
转账后最低余额 <?php echo $_G['setting']['transfermincredits'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['9']]['unit'];?><br />
<?php if(intval($taxpercent) > 0) { ?>积分交易税 <?php echo $taxpercent;?><?php } ?>
</td>
</tr>
<tr>
<th><span class="rq">*</span>登录密码</th>
<td><input type="password" name="password" class="px" value="" /></td>
</tr>
<tr>
<th>转账留言</th>
<td><input type="text" name="transfermessage" class="px" size="40" /></td>
</tr>
<tr>
<th>&nbsp;</th>
<td colspan="2">
<button type="submit" name="transfersubmit_btn" id="transfersubmit_btn" class="pn" value="true"><em>转账</em></button>
<span style="display: none" id="return_transfercredit"></span>
</td>
</tr>
</table>
</form>
<?php } } elseif($_GET['op'] == 'exchange') { if($_G['setting']['exchangestatus'] && ($_G['setting']['extcredits'] || $_CACHE['creditsettings'])) { ?>
<form id="exchangeform" name="exchangeform" method="post" autocomplete="off" action="home.php?mod=spacecp&amp;ac=credit&amp;op=exchange&amp;handlekey=credit" onsubmit="showWindow('credit', 'exchangeform', 'post');">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="operation" value="exchange" />
<input type="hidden" name="exchangesubmit" value="true" />
<input type="hidden" name="outi" value="" />
<table cellspacing="0" cellpadding="0" class="tfm mtn">
<tr>
<th>兑换</th>
<td class="pns">
<input type="text" id="exchangeamount" name="exchangeamount" class="px" size="5" style="width: auto;" value="0" onkeyup="exchangecalcredit()" />
<select name="tocredits" id="tocredits" class="ps" onChange="exchangecalcredit()"><?php if(is_array($_G['setting']['extcredits'])) foreach($_G['setting']['extcredits'] as $id => $ecredits) { if($ecredits['allowexchangein'] && $ecredits['ratio']) { ?>
<option value="<?php echo $id;?>" unit="<?php echo $ecredits['unit'];?>" title="<?php echo $ecredits['title'];?>" ratio="<?php echo $ecredits['ratio'];?>"><?php echo $ecredits['title'];?></option>
<?php } } ?><?php $i=0;?><?php if(is_array($_CACHE['creditsettings'])) foreach($_CACHE['creditsettings'] as $id => $data) { ?><?php $i++;?><?php if($data['title']) { ?>
<option value="<?php echo $id;?>" outi="<?php echo $i;?>"><?php echo $data['title'];?></option>
<?php } } ?>
</select>
&nbsp;所需&nbsp;
<input type="text" id="exchangedesamount" class="px" size="5" style="width: auto;" value="0" disabled="disabled" />
<select name="fromcredits" id="fromcredits_0" class="ps" style="display: none" onChange="exchangecalcredit();"><?php if(is_array($_G['setting']['extcredits'])) foreach($_G['setting']['extcredits'] as $id => $credit) { if($credit['allowexchangeout'] && $credit['ratio']) { ?>
<option value="<?php echo $id;?>" unit="<?php echo $credit['unit'];?>" title="<?php echo $credit['title'];?>" ratio="<?php echo $credit['ratio'];?>"><?php echo $credit['title'];?></option>
<?php } } ?>
</select><?php $i=0;?><?php if(is_array($_CACHE['creditsettings'])) foreach($_CACHE['creditsettings'] as $id => $data) { ?><?php $i++;?><select name="fromcredits_<?php echo $i;?>" id="fromcredits_<?php echo $i;?>" class="ps" style="display: none" onChange="exchangecalcredit()"><?php if(is_array($data['creditsrc'])) foreach($data['creditsrc'] as $id => $ratio) { ?><option value="<?php echo $id;?>" unit="<?php echo $_G['setting']['extcredits'][$id]['unit'];?>" title="<?php echo $_G['setting']['extcredits'][$id]['title'];?>" ratiosrc="<?php echo $data['ratiosrc'][$id];?>" ratiodesc="<?php echo $data['ratiodesc'][$id];?>"><?php echo $_G['setting']['extcredits'][$id]['title'];?></option>
<?php } ?>
</select>
<?php } ?>
<script type="text/javascript">
var tocredits = $('tocredits');
var fromcredits = $('fromcredits_0');
if(fromcredits.length > 1 && tocredits.value == fromcredits.value) {
fromcredits.selectedIndex = tocredits.selectedIndex + 1;
}
</script>
</td>
<td width="300" class="d">
<?php if($_G['setting']['exchangemincredits']) { ?>
兑换后最低余额 <?php echo $_G['setting']['exchangemincredits'];?><br />
<?php } ?>
<span id="taxpercent">
<?php if(intval($taxpercent) > 0) { ?>
积分交易税 <?php echo $taxpercent;?>
<?php } ?>
</span>
</td>
</tr>
<tr>
<th><span class="rq">*</span>登录密码</th>
<td colspan="2"><input type="password" name="password" class="px" value="" size="20" /></td>
</tr>
<tr>
<th>&nbsp;</th>
<td colspan="2">
<button type="submit" name="exchangesubmit_btn" id="exchangesubmit_btn" class="pn" value="true" tabindex="2"><em>兑换</em></button>
</td>
</tr>
</table>
</form>
<script type="text/javascript">
function exchangecalcredit() {
with($('exchangeform')) {
tocredit = tocredits[tocredits.selectedIndex];
if(!tocredit) {
return;
}<?php $i=0;?><?php if(is_array($_CACHE['creditsettings'])) foreach($_CACHE['creditsettings'] as $id => $data) { ?><?php $i++;?>$('fromcredits_<?php echo $i;?>').style.display = 'none';
<?php } ?>
if(tocredit.getAttribute('outi')) {
outi.value = tocredit.getAttribute('outi');
fromcredit = $('fromcredits_' + tocredit.getAttribute('outi'));
$('taxpercent').style.display = $('fromcredits_0').style.display = 'none';
fromcredit.style.display = '';
fromcredit = fromcredit[fromcredit.selectedIndex];
$('exchangeamount').value = $('exchangeamount').value.toInt();
if($('exchangeamount').value != 0) {
$('exchangedesamount').value = Math.floor( fromcredit.getAttribute('ratiosrc') / fromcredit.getAttribute('ratiodesc') * $('exchangeamount').value);
} else {
$('exchangedesamount').value = '';
}
} else {
outi.value = 0;
$('taxpercent').style.display = $('fromcredits_0').style.display = '';
fromcredit = fromcredits[fromcredits.selectedIndex];
$('exchangeamount').value = $('exchangeamount').value.toInt();
if(fromcredit.getAttribute('title') != tocredit.getAttribute('title') && $('exchangeamount').value != 0) {
if(tocredit.getAttribute('ratio') < fromcredit.getAttribute('ratio')) {
$('exchangedesamount').value = Math.ceil( tocredit.getAttribute('ratio') / fromcredit.getAttribute('ratio') * $('exchangeamount').value * (1 + <?php echo $_G['setting']['creditstax'];?>));
} else {
$('exchangedesamount').value = Math.floor( tocredit.getAttribute('ratio') / fromcredit.getAttribute('ratio') * $('exchangeamount').value * (1 + <?php echo $_G['setting']['creditstax'];?>));
}
} else {
$('exchangedesamount').value = '';
}
}
}
}
String.prototype.toInt = function() {
var s = parseInt(this);
return isNaN(s) ? 0 : s;
}
exchangecalcredit();
</script>
<?php } } else { ?><?php $_TPL['cycletype'] = array(
'0' => '一次性',
'1' => '每天',
'2' => '整点',
'3' => '间隔分钟',
'4' => '不限周期'
);?><div class="tbmu bw0">
<p>进行以下事件动作，会得到积分奖励。不过，在一个周期内，您最多得到的奖励次数有限制 </p>
</div>
<table cellspacing="0" cellpadding="0" class="dt valt">
<tr>
<th class="xw1">动作名称</th>
<th class="xw1">周期范围</th>
<th class="xw1">周期内最多奖励次数</th><?php if(is_array($_G['setting']['extcredits'])) foreach($_G['setting']['extcredits'] as $key => $value) { ?><th class="xw1"><?php echo $value['title'];?></th>
<?php } ?>
</tr><?php $i = 0;?><?php if(is_array($list)) foreach($list as $key => $value) { ?><?php $i++;?><tr<?php if($i % 2 == 0) { ?> class="alt"<?php } ?>>
<td><?php echo $value['rulename'];?></td>
<td><?php echo $_TPL['cycletype'][$value['cycletype']];?></td>
<td><?php if($value['rewardnum']) { ?><?php echo $value['rewardnum'];?><?php } else { ?>不限次数<?php } ?></td><?php if(is_array($_G['setting']['extcredits'])) foreach($_G['setting']['extcredits'] as $key => $credit) { ?><?php $creditkey = 'extcredits'.$key;?><td><?php if($value[$creditkey] > 0) { ?>+<?php echo $value[$creditkey];?><?php } elseif($value[$creditkey] < 0) { ?><?php echo $value[$creditkey];?><?php } else { ?>0<?php } ?></td>
<?php } ?>
</tr>
<?php } ?>
</table>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['spacecp_credit_bottom'])) echo $_G['setting']['pluginhooks']['spacecp_credit_bottom'];?>
</div>
</div>
<div class="appl"><div class="tbn">
<h2 class="mt bbda">设置</h2>
<ul>
<li<?php echo $actives['avatar'];?>><a href="home.php?mod=spacecp&amp;ac=avatar">修改头像</a></li>
<li<?php echo $actives['profile'];?>><a href="home.php?mod=spacecp&amp;ac=profile">个人资料</a></li>
<?php if($_G['setting']['verify']['enabled'] && allowverify() || $_G['setting']['my_app_status'] && $_G['setting']['videophoto']) { ?>
<li<?php echo $actives['verify'];?>><a href="<?php if($_G['setting']['verify']['enabled']) { ?>home.php?mod=spacecp&ac=profile&op=verify<?php } else { ?>home.php?mod=spacecp&ac=videophoto<?php } ?>">认证</a></li>
<?php } ?>
<li<?php echo $actives['credit'];?>><a href="home.php?mod=spacecp&amp;ac=credit">积分</a></li>
<li<?php echo $actives['usergroup'];?>><a href="home.php?mod=spacecp&amp;ac=usergroup">用户组</a></li>
<li<?php echo $actives['privacy'];?>><a href="home.php?mod=spacecp&amp;ac=privacy">隐私筛选</a></li>

<?php if($_G['setting']['sendmailday']) { ?><li<?php echo $actives['sendmail'];?>><a href="home.php?mod=spacecp&amp;ac=sendmail">邮件提醒</a></li><?php } ?>
<li<?php echo $actives['password'];?>><a href="home.php?mod=spacecp&amp;ac=profile&amp;op=password">密码安全</a></li>

<?php if($_G['setting']['creditspolicy']['promotion_visit'] || $_G['setting']['creditspolicy']['promotion_register']) { ?>
<li<?php echo $actives['promotion'];?>><a href="home.php?mod=spacecp&amp;ac=promotion">访问推广</a></li>
<?php } if(!empty($_G['setting']['plugins']['spacecp'])) { if(is_array($_G['setting']['plugins']['spacecp'])) foreach($_G['setting']['plugins']['spacecp'] as $id => $module) { if(!$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])) { ?><li<?php if($_GET['id'] == $id) { ?> class="a"<?php } ?>><a href="home.php?mod=spacecp&amp;ac=plugin&amp;id=<?php echo $id;?>"><?php echo $module['name'];?></a></li><?php } } } ?>
</ul>
</div></div>
</div>	</div>
<?php if(empty($topic) || ($topic['usefooter'])) { ?><?php $focusid = getfocus_rand($_G[basescript]);?><?php if($focusid !== null) { ?><?php $focus = $_G['cache']['focus']['data'][$focusid];?><?php $focusnum = count($_G['setting']['focus'][$_G[basescript]]);?><div class="focus" id="sitefocus">
<div class="bm">
<div class="bm_h cl">
<a href="javascript:;" onclick="setcookie('nofocus_<?php echo $_G['basescript'];?>', 1, <?php echo $_G['cache']['focus']['cookie'];?>*3600);$('sitefocus').style.display='none'" class="y" title="关闭">关闭</a>
<h2>
<?php if($_G['cache']['focus']['title']) { ?><?php echo $_G['cache']['focus']['title'];?><?php } else { ?>站长推荐<?php } ?>
<span id="focus_ctrl" class="fctrl"><img src="<?php echo IMGDIR;?>/pic_nv_prev.gif" alt="上一条" title="上一条" id="focusprev" class="cur1" onclick="showfocus('prev');" /> <em><span id="focuscur"></span>/<?php echo $focusnum;?></em> <img src="<?php echo IMGDIR;?>/pic_nv_next.gif" alt="下一条" title="下一条" id="focusnext" class="cur1" onclick="showfocus('next')" /></span>
</h2>
</div>
<div class="bm_c" id="focus_con">
</div>
</div>
</div><?php $focusi = 0;?><?php if(is_array($_G['setting']['focus'][$_G['basescript']])) foreach($_G['setting']['focus'][$_G['basescript']] as $id) { ?><div class="bm_c" style="display: none" id="focus_<?php echo $focusi;?>">
<dl class="xld cl bbda">
<dt><a href="<?php echo $_G['cache']['focus']['data'][$id]['url'];?>" class="xi2" target="_blank"><?php echo $_G['cache']['focus']['data'][$id]['subject'];?></a></dt>
<?php if($_G['cache']['focus']['data'][$id]['image']) { ?>
<dd class="m"><a href="<?php echo $_G['cache']['focus']['data'][$id]['url'];?>" target="_blank"><img src="<?php echo $_G['cache']['focus']['data'][$id]['image'];?>" alt="<?php echo $_G['cache']['focus']['data'][$id]['subject'];?>" /></a></dd>
<?php } ?>
<dd><?php echo $_G['cache']['focus']['data'][$id]['summary'];?></dd>
</dl>
<p class="ptn cl"><a href="<?php echo $_G['cache']['focus']['data'][$id]['url'];?>" class="xi2 y" target="_blank">查看 &raquo;</a></p>
</div><?php $focusi ++;?><?php } ?>
<script type="text/javascript">
var focusnum = <?php echo $focusnum;?>;
if(focusnum < 2) {
$('focus_ctrl').style.display = 'none';
}
if(!$('focuscur').innerHTML) {
var randomnum = parseInt(Math.round(Math.random() * focusnum));
$('focuscur').innerHTML = Math.max(1, randomnum);
}
showfocus();
var focusautoshow = window.setInterval('showfocus(\'next\', 1);', 5000);
</script>
<?php } if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && $_G['setting']['showpatchnotice'] == 1) { ?>
<div class="focus patch" id="patch_notice"></div>
<?php } ?><?php echo adshow("footerbanner/wp a_f/1");?><?php echo adshow("footerbanner/wp a_f/2");?><?php echo adshow("footerbanner/wp a_f/3");?><?php echo adshow("float/a_fl/1");?><?php echo adshow("float/a_fr/2");?><?php echo adshow("couplebanner/a_fl a_cb/1");?><?php echo adshow("couplebanner/a_fr a_cb/2");?><?php echo adshow("cornerbanner/a_cn");?><?php if(!empty($_G['setting']['pluginhooks']['global_footer'])) echo $_G['setting']['pluginhooks']['global_footer'];?>
<div id="ft" class="wp cl">
<div id="flk" class="y">
<p>
<?php if($_G['setting']['site_qq']) { ?><a href="http://wpa.qq.com/msgrd?V=3&amp;Uin=<?php echo $_G['setting']['site_qq'];?>&amp;Site=<?php echo $_G['setting']['bbname'];?>&amp;Menu=yes&amp;from=discuz" target="_blank" title="QQ"><img src="<?php echo IMGDIR;?>/site_qq.jpg" alt="QQ" /></a><span class="pipe">|</span><?php } if(is_array($_G['setting']['footernavs'])) foreach($_G['setting']['footernavs'] as $nav) { if($nav['available'] && ($nav['type'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1)) ||
!$nav['type'] && ($nav['id'] == 'stat' && $_G['group']['allowstatdata'] || $nav['id'] == 'report' && $_G['uid'] || $nav['id'] == 'archiver' || $nav['id'] == 'mobile'))) { ?><?php echo $nav['code'];?><span class="pipe">|</span><?php } } ?>
<strong><a href="<?php echo $_G['setting']['siteurl'];?>" target="_blank"><?php echo $_G['setting']['sitename'];?></a></strong>
<?php if($_G['setting']['icp']) { ?>( <a href="http://www.miitbeian.gov.cn/" target="_blank"><?php echo $_G['setting']['icp'];?></a> )<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_footerlink'])) echo $_G['setting']['pluginhooks']['global_footerlink'];?>
<?php if($_G['setting']['statcode']) { ?><?php echo $_G['setting']['statcode'];?><?php } ?>
</p>
<p class="xs0">
GMT<?php echo $_G['timenow']['offset'];?>, <?php echo $_G['timenow']['time'];?>
<span id="debuginfo">
<?php if(debuginfo()) { ?>, Processed in <?php echo $_G['debuginfo']['time'];?> second(s), <?php echo $_G['debuginfo']['queries'];?> queries
<?php if($_G['gzipcompress']) { ?>, Gzip On<?php } if(C::memory()->type) { ?>, <?php echo ucwords(C::memory()->type); ?> On<?php } ?>.
<?php } ?>
</span>
</p>
</div>
<div id="frt">
<p>Powered by <strong><a href="http://www.discuz.net" target="_blank">Discuz!</a></strong> <em><?php echo $_G['setting']['version'];?></em><?php if(!empty($_G['setting']['boardlicensed'])) { ?> <a href="http://license.comsenz.com/?pid=1&amp;host=<?php echo $_SERVER['HTTP_HOST'];?>" target="_blank">Licensed</a><?php } ?></p>
<p class="xs0">&copy; 2001-2012 <a href="http://www.comsenz.com" target="_blank">Comsenz Inc.</a></p>
</div><?php updatesession();?><?php if($_G['uid'] && $_G['group']['allowinvisible']) { ?>
<script type="text/javascript">
var invisiblestatus = '<?php if($_G['session']['invisible']) { ?>隐身<?php } else { ?>在线<?php } ?>';
var loginstatusobj = $('loginstatusid');
if(loginstatusobj != undefined && loginstatusobj != null) loginstatusobj.innerHTML = invisiblestatus;
</script>
<?php } ?>
</div>

<?php if($upgradecredit !== false) { ?>
<div id="g_upmine_menu" class="tip tip_3" style="display:none;">
<div class="tip_c">
积分 <?php echo $_G['member']['credits'];?>, 距离下一级还需 <?php echo $upgradecredit;?> 积分
</div>
<div class="tip_horn"></div>
</div>
<?php } } if(!$_G['setting']['bbclosed']) { if($_G['uid'] && !isset($_G['cookie']['checkpm'])) { ?>
<script src="home.php?mod=spacecp&ac=pm&op=checknewpm&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } if($_G['uid'] && helper_access::check_module('follow') && !isset($_G['cookie']['checkfollow'])) { ?>
<script src="home.php?mod=spacecp&ac=follow&op=checkfeed&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } if(!isset($_G['cookie']['sendmail'])) { ?>
<script src="home.php?mod=misc&ac=sendmail&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && !isset($_G['cookie']['checkpatch'])) { ?>
<script src="misc.php?mod=patch&action=checkpatch&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } } if($_GET['diy'] == 'yes') { if(check_diy_perm($topic) && (empty($do) || $do != 'index')) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>common_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script src="<?php echo $_G['setting']['jspath'];?>portal_diy<?php if(!check_diy_perm($topic, 'layout')) { ?>_data<?php } ?>.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } if($space['self'] && CURMODULE == 'space' && $do == 'index') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>common_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script src="<?php echo $_G['setting']['jspath'];?>space_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } } if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && $_G['setting']['showpatchnotice'] == 1) { ?>
<script type="text/javascript">patchNotice();</script>
<?php } if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && empty($_G['cookie']['pluginnotice'])) { ?>
<div class="focus plugin" id="plugin_notice"></div>
<script type="text/javascript">pluginNotice();</script>
<?php } if($_G['member']['newprompt'] && (empty($_G['cookie']['promptstate_'.$_G['uid']]) || $_G['cookie']['promptstate_'.$_G['uid']] != $_G['member']['newprompt']) && $_GET['do'] != 'notice') { ?>
<script type="text/javascript">noticeTitle();</script>
<?php } ?><?php userappprompt();?><?php if($_G['basescript'] != 'userapp') { ?>
<span id="scrolltop" onclick="window.scrollTo('0','0')">回顶部</span>
<script type="text/javascript">_attachEvent(window, 'scroll', function(){showTopLink();});checkBlind();</script>
<?php } ?><?php output();?></body>
</html>
