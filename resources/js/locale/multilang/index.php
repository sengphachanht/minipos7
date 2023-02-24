<?php
$pathLang=(!isset($_COOKIE['ck_lang']) || $_COOKIE['ck_lang']=="")?"en":$_COOKIE['ck_lang'];
include($pathLang."/index.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>


<div style="margin:auto;width:600px;">
<br />
<a href="javascript:setLang('th');">Thai</a>
<a href="javascript:setLang('en');">Eng</a>
<br />
<br />
<br />
<a href="#"><?=_Home?></a> |  
<a href="#"><?=_About_Us?></a> |  
<a href="#"><?=_Contact_Us?></a> 

 </div>




<script type="text/javascript">
function setLang(langID){
	var days=365; // กำหนดจำนวนวันที่ต้องการให้จำค่า  
	var date = new Date();  
	date.setTime(date.getTime()+(days*24*60*60*1000));  
	var expires = "; expires="+date.toGMTString();  
	document.cookie = "ck_lang=" +langID+ "; expires=" + expires + "; path=/";  
	window.location.reload()
}
</script>
 
</body>
</html>