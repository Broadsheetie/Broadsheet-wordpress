<?php

/** Load WordPress Bootstrap */
require_once('./admin.php');
?>
<html>
<head>
<style>
body {
	margin: 0 auto;
	padding-top: 90px;
	
	background-repeat: no-repeat;
	cursor: pointer;
	padding-left: 0px;
	padding-right: 0px;
	background-attachment: fixed;
	background-postion: center top;
}

#container {
	margin: 0 auto;
	width: 980px;
	height: 100%;
	background-color: green;
	cursor: auto;
}
</style>
</head>
<body id="body_id">
<div id="container">
Skin: <input id="backuploader" type="file" /> <br />
Header height: <input type="text" id="skin-header-height" name="skin-header-height" value="90" size="3"/>px<br />
Skin link: <input type="text" name="link" id="link" value="http://google.com" /> <button id="view-link">View Link</button><br />
Background Colour: <input type="text" id="skin-background" name="skin-background" value="#ffffff" size="7"/> <br />
<button id="generate-skin">Generate</button>

<br />
<textarea id="skin-details" rows="80" cols="80">

</textarea>
</div>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery.html5uploader.js"></script>
<script type="text/javascript">
var imageurl = false;
$(document).ready(function(){
	$('#skin-header-height').blur(function() {
  		$('body').css('padding-top', $('#skin-header-height').val());
	});
	
	$('#skin-background').blur(function() {
  		$('body').css('background-color', $('#skin-background').val());
	});
	
	$('#view-link').click(function(){
		window.open($('#link').val(), '_blank');
	});
	
	$('body').click(function(e){ 
		var target = e.target;
		if (target.id == 'body_id')
		{
			window.open($('#link').val())
		} 
	});
	
	$('#generate-skin').click(function(){ 
		showSkinScript();
	});
});

function showSkinScript() {
	if(imageurl == false)
	{
		$('#skin-details').val("");
		alert("No skin uploaded!");
		return;
	}
		 var skinText = "<script type=\"text/javascript\">\n";
		skinText += "var bodyElement = window.parent.document.getElementById('body_id');\n";
		skinText += "bodyElement.style.backgroundImage = \"url(" + imageurl + ")\";\n"; 
		skinText += "bodyElement.style.backgroundAttachment = \"fixed\";\n";
		skinText += "bodyElement.style.backgroundRepeat = \"no-repeat\";\n";
		skinText += "bodyElement.style.backgroundPosition = \"center top\";\n";
		skinText += "bodyElement.style.backgroundColor = \"" + $('#skin-background').val() + "\";\n";
		skinText += "bodyElement.style.cursor = \"pointer\";\n";
		skinText += "bodyElement.style.paddingTop = \"" + $('#skin-header-height').val() + "px\";\n";
		skinText += "bodyElement.style.paddingLeft = \"0px\";\n";
		skinText += "bodyElement.style.paddingRight = \"0px\";\n";
		skinText += "window.parent.document.getElementById('page').style. cursor = \"auto\";\n";
		skinText += "bodyElement.addEventListener('click',function (e) {\n";
		skinText += "var target = e.target;\n";
		skinText += "if (target.id == 'body_id')\n";
		skinText += "		{\n";
		skinText += "			window.parent.open('%%CLICK_URL_UNESC%%" + $('#link').val() + "')\n";
		skinText += "		}\n"; 
		skinText += "},false)\n";
		skinText += "<\/script>";
		
		$('#skin-details').val(skinText);
}

$(function() {
console.log("loading uploader");
	$("#dropbox, #backuploader").html5Uploader({
		name: "campaignimage",
		postUrl: "hpto_uploader.php",
		onSuccess: function(a, b, response){
			console.log('testing' + a + b + response);
			var obj = $.parseJSON(response)
			console.log(obj.url);
			if (obj.status)
			{
				$("#body_id").css('background-image', 'url(' + obj.url + ')');
				imageurl = "/" + obj.path;
				$("#imagepath").val(obj.path);
				showSkinScript();
			}
		}
	});
});


</script>
</body>
</html>
