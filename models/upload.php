<?php
/*
	[Bidcms.com!] (C)2009-2011 Bidcms.com.
	This is NOT a freeware, use is subject to license terms
	$author limengqi
	$Id: upload.php 2010-08-24 10:42 $
*/
include '../inc/common.simple.php';
include '../inc/upload.class.php';
$uid=$session->get('uid');
$up=_upload('file');
$file=$up->insertid;
if($file['file_id']>0)
{
	$session->set('fileid',$file['file_id']);
	$img=array('key'=>$file['key'],'width'=>$file['width'],'height'=>$file['height'],'type'=>$file['type']);
	$img['farm']="farm1";
	$img['bucket']="hbimg";
	
}
else
{
	$img=$up->error;	
}
echo bidcms_encode($img);
