<SCRIPT LANGUAGE="JavaScript">
<!--
	var i=0;
	var count=<?php echo $count;?>;
	function dodata()
	{
		window.location='index.php?step=5&dostep='+i;
		if(i<count)
		{
			i++;
			setTimeout('dodata',10000);
		}
	}
	dodata();
//-->
</SCRIPT>