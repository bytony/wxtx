var map = new BMap.Map("allmap");
map.centerAndZoom(new BMap.Point(116.404, 39.915), 11);
/*//创建小狐狸
var pt = new BMap.Point(116.417, 39.909);
var myIcon = new BMap.Icon("fox.gif", new BMap.Size(300,157));
var marker2 = new BMap.Marker(pt,{icon:myIcon});  // 创建标注
map.addOverlay(marker2);              // 将标注添加到地图中

//让小狐狸说话（创建信息窗口）
var infoWindow2 = new BMap.InfoWindow("<p style='font-size:14px;'>哈哈，你看见我啦！我可不常出现哦！</p><p style='font-size:14px;'>赶快查看源代码，看看我是如何添加上来的！</p>");
marker2.addEventListener("click", function(){this.openInfoWindow(infoWindow2);});*/
var ac = new BMap.Autocomplete({"input" : "suggestId","location" : map});

/*ac.addEventListener("onhighlight", function(e) {  //鼠标放在下拉列表上的事件
	var str = "";
	var _value = e.fromitem.value;
	var value = "";
	if (e.fromitem.index > -1) {
		value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
	}    
	str = "FromItem<br />index = " + e.fromitem.index + "<br />value = " + value;
	
	value = "";
	if (e.toitem.index > -1) {
		_value = e.toitem.value;
		value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
	}    
	str += "<br />ToItem<br />index = " + e.toitem.index + "<br />value = " + value;
	document.getElementById("searchResultPanel").innerHTML = str;
});
*/
var myValue;
ac.addEventListener("onconfirm", function(e) {    //鼠标点击下拉列表后的事件
	var _value = e.item.value;
	myValue = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
	//document.getElementById("searchResultPanel").innerHTML ="onconfirm<br />index = " + e.item.index + "<br />myValue = " + myValue;
	setPlace();
});
function G(id)
{
	return document.getElementById(id);
}
function setPlace(){
	map.clearOverlays();    //清除地图上所有覆盖物
	function myFun(){
		var pp = local.getResults().getPoi(0).point;    //获取第一个智能搜索的结果
		map.centerAndZoom(pp, 18);
		map.addOverlay(new BMap.Marker(pp));    //添加标注
	}
	var local = new BMap.LocalSearch(map, { //智能搜索
	  onSearchComplete: myFun
	});
	local.search(myValue);
}
map.addEventListener("click", showInfo);
function showInfo(e){
	document.getElementById('lng').value=e.point.lng;
	document.getElementById('lat').value=e.point.lat;
	var gc = new BMap.Geocoder();
	pt=e.point;
	gc.getLocation(pt, function(rs){
        var addComp = rs.addressComponents;
        document.getElementById('address').value=addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber;
    }); 
}