<?php
/*
	[Phpup.Net!] (C)2009-2011 Phpup.net.
	This is NOT a freeware, use is subject to license terms

	$Id: common.php 2010-08-24 10:42 $
*/

if(!defined('IN_BIDCMS')) {
	exit('Access Denied');
}
header("Content-type:text/html;charset=".$GLOBALS['bidcmscharset']);

class common
{
	function common($table)
	{
		$this->table=$table;
	
	}
	//取出一条数据
	function GetOne($container='',$field=array(),$order='',$table='',$sql='')
	{
		$table=!empty($table)?$table:$this->table;
		if(empty($sql))
		{
			if($field)
			{
				$field="`".implode("`,`",$field)."`";
			}
			else
			{
				$field='*';
			}
			$sql="select ".$field." from ".tname($table)." where 1 ".$container." ".$order;
		}
		return $GLOBALS['db']->fetch_first($sql);
	}
	//其它分页
	function NormalPage($count,$showpage,$rows)
	{
		$page=new page($count);
		$page->pageSize=$showpage['pagesize'];
		$page->setPage();
		$page->url=$showpage['url'];
		$button=$page->setFormatPage();
		if($showpage['example']==2 || $showpage['example']==3)
		{
			
				$pageinfo.="<a href='".$page->parseurl(0)."'>首页</a> ";
				if($page->prevPage>-1)
				{
					$pageinfo.="<A HREF='".$page->parseurl($page->prevPage)."'>上一页</A> ";
				}
				
				foreach($button as $key=>$v)
				{
					if($v==$page->absolutePage)
					{
						$pageinfo.="<a class='thisclass' style='background:#eee;'>".($v+1)."</a> ";
					}
					else
					{
						$pageinfo.="<a href='".$page->parseurl($v)."'>".($v+1)."</a> ";
					}
				}
				if($page->nextPage<$page->total)
				{
					$pageinfo.="<A HREF='".$page->parseurl($page->nextPage)."'>下一页</A> ";
				}
				$pageinfo.="<A HREF='".$page->parseurl($page->total>1?$page->total-1:0)."'>末页</A>";
		}
		if($showpage['isshow']==1)
		{
			return array('page'=>$page,'pageinfo'=>$pageinfo,'data'=>$rows);
		}
		else
		{
			return array('page'=>0,'pageinfo'=>'','data'=>array());
		}
	}
	//数组分页
	function ArrayPage($pag=0,$data=array(),$pagesize=20,$url='')
	{
		$p=$pag*$pagesize;
		$a=array();
		for($i=$p;$i<$p+$pagesize;$i++)
		{
			if(!empty($data[$i]))
			{
				$a[]=$data[$i];
			}
		}
		$count=count($data);
		$total=intval($count/$pagesize)+1;
		$showpage=array('count'=>$count,'total'=>$total,'prevpage'=>($pag>0?$page-1:0),'nextpage'=>($pag<$total?$page+1:$total),'absolutepage'=>$pag,'url'=>$url);
		$pageinfo="<A HREF='".$showpage['url']."&page=".$showpage['prevpage']."'>上一页</A>　";
		for($v=0;$v<$total;$v++)
		{
			if($v==$showpage['absolutepage'])
			{
				$pageinfo.="<span class='current'>".($v+1)."</span>　";
			}
			else
			{
				$pageinfo.="<a href='".$showpage['url']."&page=".$v."'>".($v+1)."</a>　";
			}
		}
		$pageinfo.="<A HREF='".$showpage['url']."&page=".$showpage['nextpage']."'>下一页</A>　<A HREF='".$showpage['url']."&page=".$showpage['total']."'>尾页</A>";
		
		return array('data'=>$a,'pageinfo'=>$pageinfo);
	}
	//取出多条数据并带分页
	//$showpage=array('isshow'=>1,'currentpage'=>1,'pagesize'=>20,'url'=>'index.php','example'=>1);
	function GetPage($showpage,$container='',$limit='',$field=array(),$order='',$table='',$sql='')
	{
		$table=!empty($table)?$table:$this->table;
		if(empty($sql))
		{
			
			if($field)
			{
				$field="`".implode("`,`",$field)."`";
			}
			else
			{
				$field='*';
			}
			$sql="select ".$field." from ".tname($table)." where 1 ".$container." ".$order;
			if($showpage['isshow']==1)
			{
				$limit="limit ".abs(intval($showpage['currentpage'])*intval($showpage['pagesize'])).",".intval($showpage['pagesize']>0?$showpage['pagesize']:20);
			}
			$sql.=" ".$limit;
		}
		if($showpage['isshow']==1)
		{
			
			$count=$this->GetCount($container,'',$table);
			$page=new page($count);
			$page->pageSize=$showpage['pagesize'];
			$page->setPage();
			$page->url=$showpage['url'];
			$button=$page->setFormatPage();
			$pageinfo='';
			if($showpage['example']==1)
			{
				$pageinfo.="";
				if($page->prevPage>-1)
				{
					$pageinfo.="<a href=\"javascript:loadpage(".$page->prevPage.");\">上一页</A>";
				}
				
				foreach($button as $key=>$v)
				{
					if($v==$page->absolutePage)
					{
						$pageinfo.="<a href='javascript:;'>".($v+1)."</a>";
					}
					else
					{
						$pageinfo.="<a href='javascript:loadpage(".$v.");'>".($v+1)."</a>";
					}
				}
				if($page->nextPage<$page->total)
				{
					$pageinfo.="<a href='javascript:loadpage(".$page->nextPage.");'>下一页</A>";
				}
			}

			if($showpage['example']==2)
			{
				
					$pageinfo.="<a href='".$page->parseurl(0)."'>首页</a> ";
					if($page->prevPage>-1)
					{
						$pageinfo.="<A class='prev' HREF='".$page->parseurl($page->prevPage)."'>上一页<b></b></A> ";
					}
					foreach($button as $key=>$v)
					{
						if($v==$page->absolutePage)
						{
							$pageinfo.="<a class='current'>".($v+1)."</a> ";
						}
						else
						{
							$pageinfo.="<a href='".$page->parseurl($v)."'>".($v+1)."</a> ";
						}
					}
					if($page->nextPage<$page->total)
					{
						$pageinfo.="<A class='next' HREF='".$page->parseurl($page->nextPage)."'>下一页<b></b></A> ";
					}
					$pageinfo.="<A HREF='".$page->parseurl($page->total>1?$page->total-1:0)."'>末页</A>";
			}
		}
		$rows=array();	
		$query=$GLOBALS['db']->query($sql);
		
		while($result=$GLOBALS['db']->fetch_array($query))
		{
			$rows[]=$result;
		}
		if($showpage['isshow']==1)
		{
			return array('page'=>$page,'pageinfo'=>$pageinfo,'data'=>$rows);
		}
		else
		{
			return $rows;
		}
		
	}
	//取出总数
	function GetCount($container,$field='*',$table='')
	{
		$mytable=!empty($table)?tname($table):tname($this->table);
		$sql="select count(".($field?$field:'*').") as total from ".$mytable." where 1 ".$container;
		$count=$GLOBALS['db']->fetch_first($sql);
		return intval($count['total']);
	}
	//取出总和
	function GetSum($container,$field,$table='')
	{
		$mytable=!empty($table)?tname($table):tname($this->table);
		$sql="select sum(".$field.") as msum from ".$mytable." where 1 ".$container;
		
		$count=$GLOBALS['db']->fetch_first($sql);
		return intval($count['msum']);
	}
	//插入数据
	function InsertData($data,$check=false,$replace=false,$talbe='')
	{
		$mtable=!empty($talbe)?$talbe:$this->table;
		$sql=InsertSql($data,$mtable,$check,$replace);
		
		if($GLOBALS['db']->query($sql))
		{
				return $GLOBALS['db']->insert_id();
		}
		return false;
	}
	//更新数据
	function UpdateData($data,$container,$check=false,$table='',$add=false)
	{
		$mtable=!empty($table)?$table:$this->table;
		if($add)
		{
			$sql="update ".tname($mtable)." set `".$data['field']."`=`".$data['field']."`+".$data['value']." where 1 ".$container;
		}
		else
		{
			$sql=UpdateSql($data,$mtable,$container,$check);
		}
				
		if($GLOBALS['db']->query($sql))
		{
			return $GLOBALS['db']->affected_rows();
		}
		return false;
	}
	//删除数据
	function DeleteData($container,$table='')
	{
		if(!empty($container))
		{
			$mtable=!empty($talbe)?$talbe:$this->table;
			$sql="delete from ".tname($mtable)." where ".$container;
			
			if($GLOBALS['db']->query($sql))
			{
				return $GLOBALS['db']->affected_rows();
			}
		}
		return false;
	}
	//清空数据
	function ClearData($table='')
	{
		$mtable=!empty($talbe)?$talbe:$this->table;
		$sql="TRUNCATE ".tname($mtable);
		
		if($GLOBALS['db']->query($sql))
		{
			return true;
		}
		return false;
	}
}
