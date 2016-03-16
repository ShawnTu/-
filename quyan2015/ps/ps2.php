<?php
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
//&& ($_FILES["file"]["size"] < 20000)
   )
  {
  if ($_FILES["file"]["error"] > 0)
    {
      //echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
      //echo "Upload: " . $_FILES["file"]["name"] . "<br />";
      //echo "Type: " . $_FILES["file"]["type"] . "<br />";
      //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
      //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
     
      $filename = $_FILES["file"]["name"];
      date_default_timezone_set('PRC');
      $D = date("YmdHis");
      $filetype = substr(strrchr($filename,"."),1);
      $newname = $D.".".$filetype; 
      
      if (file_exists("uploadImage/" . $newname))
      {
          //echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "uploadImage/" . $newname);
        //echo "Stored in: " . "uploadImage/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
    //echo "Invalid file";
  }

$para = "uploadImage/" .$newname;

echo "<script>
var para=\"$para\"; 
window.onload = function(){ 
   			var imgTag2 = document.getElementById(\"followingPhoto\");
   			imgTag2.alt = \"处理后照片\";
   			imgTag2.src = para;	
   			imgTag2.crossOrigin = \"Anonymous\";   							 
         	pic = document.getElementById(\"followingPhoto\");
        	pic.onload = function(){
         		AlloyImageObj = AlloyImage(pic);
         	};       		 
    		};
</script>"
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		<meta http-equiv="Access-Control-Allow-Origin" content="*">
		<title>趣颜</title>
		<link rel="stylesheet" href="css/common.css" type="text/css" charset="utf-8"/>
		<link rel="stylesheet" href="css/mui.css" type="text/css" charset="utf-8"/>
   		<link rel="stylesheet" href="css/app.css" type="text/css" charset="utf-8"/>
   		<style>
   			body{
   				background: url(img/page-background.jpg);
   			}
   		</style>
   		<script src="js/jquery-1.11.1.min.js"></script>
   		<script src="js/mui.min.js"></script>
   		<script src="js/alloyimage-1.1.js"></script>
   		<script type="text/javascript" charset="utf-8"> 			 
    		function originalPhoto(){
    			var AlloyImageObj2 = AlloyImageObj.clone();
        		AlloyImageObj2.replace(pic);
    		}
    		
    		function softenFace(){
    			var AlloyImageObj2 = AlloyImageObj.clone();
        		AlloyImageObj2.ps("softenFace").replace(pic);
    		}
    
    		function sketch(){
    			var AlloyImageObj2 = AlloyImageObj.clone();
        		AlloyImageObj2.ps("sketch").replace(pic);
    		}
    
    		function softEnhancement(){
    			var AlloyImageObj2 = AlloyImageObj.clone();
        		AlloyImageObj2.ps("softEnhancement").replace(pic);
    		}
    
    		function purpleStyle(){
    			var AlloyImageObj2 = AlloyImageObj.clone();
        		AlloyImageObj2.ps("purpleStyle").replace(pic);
    		}
    
    		function soften(){
    			var AlloyImageObj2 = AlloyImageObj.clone();
        		AlloyImageObj2.ps("soften").replace(pic);
    		}
    
    		function vintage(){
    			var AlloyImageObj2 = AlloyImageObj.clone();
        		AlloyImageObj2.ps("vintage").replace(pic);
    		}
    
    		function gray(){
    			var AlloyImageObj2 = AlloyImageObj.clone();
        		AlloyImageObj2.ps("gray").replace(pic);
    		}
    
    		function lomo(){
    			var AlloyImageObj2 = AlloyImageObj.clone();
        		AlloyImageObj2.ps("lomo").replace(pic);
    		}
    
    		function strongEnhancement(){
    			var AlloyImageObj2 = AlloyImageObj.clone();
        		AlloyImageObj2.ps("strongEnhancement").replace(pic);
    		}
    
    		function strongGray(){
    			var AlloyImageObj2 = AlloyImageObj.clone();
        		AlloyImageObj2.ps("strongGray").replace(pic);
    		}
    
    		function lightGray(){
    			var AlloyImageObj2 = AlloyImageObj.clone();
        		AlloyImageObj2.ps("lightGray").replace(pic);
    		}
    
    		function warmAutumn(){
    			var AlloyImageObj2 = AlloyImageObj.clone();
        		AlloyImageObj2.ps("warmAutumn").replace(pic);
    		}
    
    		function carveStyle(){
    			var AlloyImageObj2 = AlloyImageObj.clone();
        		AlloyImageObj2.ps("carveStyle").replace(pic);
    		}
    
    		function rough(){
    			var AlloyImageObj2 = AlloyImageObj.clone();
        		AlloyImageObj2.ps("rough").replace(pic);
    		}    
    		
    		function promptSavePhoto(){
   				alert("亲，长按图片可以保存哦~")
   			}
   </script>
	</head>
	<body>
		<header>
			<div class="nvtt">
				<a class="mui-action-back mui-pull-left">
					<img src="img/backButton.png" />
				</a>
				趣颜
				<a class="mui-pull-right">
					<img src="img/saveButton.png" onclick="promptSavePhoto()"/>
				</a>
			</div>
		</header>
		<div id="dcontent" class="dcontent">
				<!--			
				<div id="followingPhotoContainer">
					<img id="followingPhoto" src="../quyan/img/1.jpg" />
				</div>
				-->	
				
			<div id="followingPhotoContainer" class="mui-content">
				<div class="mui-slider-item">
		            <ul class="mui-table-view mui-grid-view">
		                <li class="mui-table-view-cell mui-media mui-col-xs-12"><img id="followingPhoto" class="mui-media-object" src="img/2-originalPhoto.png" />
		                </li>
		            </ul>
		          </div>
			</div>
				
					
			<div id="filterThumb" class="mui-content2">
				<div class="mui-slider">
					<div class="mui-slider-group mui-slider-loop">
					<!-- 额外增加的一个节点(循环轮播：第一个节点是最后一个图文表格) -->
		            <div class="mui-slider-item mui-slider-item-duplicate">
		                <ul class="mui-table-view mui-grid-view">
		                    <li class="mui-table-view-cell mui-media mui-col-xs-2"><img class="mui-media-object" src="img/2-strongGray.png" onclick="strongGray()">
		                            <div class="mui-media-body">灰白</div></li>
		                    <li class="mui-table-view-cell mui-media mui-col-xs-2"><img class="mui-media-object" src="img/2-lightGray.png" onclick="lightGray()">
		                            <div class="mui-media-body">灰色</div></li>
		                    <li class="mui-table-view-cell mui-media mui-col-xs-2"><img class="mui-media-object" src="img/2-warmAutumn.png" onclick="warmAutumn()">
		                            <div class="mui-media-body">暖秋</div></li>
		                    <li class="mui-table-view-cell mui-media mui-col-xs-2"><img class="mui-media-object" src="img/2-carveStyle.png" onclick="carveStyle()">
		                            <div class="mui-media-body">木雕</div></li>
		                    <li class="mui-table-view-cell mui-media mui-col-xs-2"><img class="mui-media-object" src="img/2-rough.png" onclick="rough()">
		                            <div class="mui-media-body">粗糙</div></li>
		                </ul>
		            </div>
		          
		            <div class="mui-slider-item">
		                <ul class="mui-table-view mui-grid-view">
		                    <li class="mui-table-view-cell mui-media mui-col-xs-2"><img class="mui-media-object" src="img/2-originalPhoto.png" onclick="originalPhoto()">
		                            <div class="mui-media-body">原图</div></li>
		                    <li class="mui-table-view-cell mui-media mui-col-xs-2"><img class="mui-media-object" src="img/2-softenFace.png" onclick="softenFace()">
		                            <div class="mui-media-body">美肤</div></li>
		                    <li class="mui-table-view-cell mui-media mui-col-xs-2"><img class="mui-media-object" src="img/2-sketch.png" onclick="sketch()">
		                            <div class="mui-media-body">素描</div></li>
		                    <li class="mui-table-view-cell mui-media mui-col-xs-2"><img class="mui-media-object" src="img/2-softEnhancement.png" onclick="softEnhancement()">
		                            <div class="mui-media-body">自然增强</div></li>
		                    <li class="mui-table-view-cell mui-media mui-col-xs-2"><img class="mui-media-object" src="img/2-purpleStyle.png" onclick="purpleStyle()">
		                            <div class="mui-media-body">紫调</div></li>
		                </ul>
		            	</div>
		            	 
		            	<div class="mui-slider-item">
		                <ul class="mui-table-view mui-grid-view">
		                    <li class="mui-table-view-cell mui-media mui-col-xs-2"><img class="mui-media-object" src="img/2-soften.png" onclick="soften()">
		                            <div class="mui-media-body">柔焦</div></li>
		                    <li class="mui-table-view-cell mui-media mui-col-xs-2"><img class="mui-media-object" src="img/2-vintage.png" onclick="vintage()">
		                            <div class="mui-media-body">复古</div></li>
		                    <li class="mui-table-view-cell mui-media mui-col-xs-2"><img class="mui-media-object" src="img/2-gray.png" onclick="gray()">
		                            <div class="mui-media-body">黑白</div></li>
		                    <li class="mui-table-view-cell mui-media mui-col-xs-2"><img class="mui-media-object" src="img/2-lomo.png" onclick="lomo()">
		                            <div class="mui-media-body">仿lomo</div></li>
		                    <li class="mui-table-view-cell mui-media mui-col-xs-2"><img class="mui-media-object" src="img/2-strongEnhancement.png" onclick="strongEnhancement()">
		                            <div class="mui-media-body">亮白增强</div></li>
		                </ul>
		            	</div>
		            	
		            	<div class="mui-slider-item">
		                <ul class="mui-table-view mui-grid-view">
		                    <li class="mui-table-view-cell mui-media mui-col-xs-2"><img class="mui-media-object" src="img/2-strongGray.png" onclick="strongGray()">
		                            <div class="mui-media-body">灰白</div></li>
		                    <li class="mui-table-view-cell mui-media mui-col-xs-2"><img class="mui-media-object" src="img/2-lightGray.png" onclick="lightGray()">
		                            <div class="mui-media-body">灰色</div></li>
		                    <li class="mui-table-view-cell mui-media mui-col-xs-2"><img class="mui-media-object" src="img/2-warmAutumn.png" onclick="warmAutumn()">
		                            <div class="mui-media-body">暖秋</div></li>
		                    <li class="mui-table-view-cell mui-media mui-col-xs-2"><img class="mui-media-object" src="img/2-carveStyle.png" onclick="carveStyle()">
		                            <div class="mui-media-body">木雕</div></li>
		                    <li class="mui-table-view-cell mui-media mui-col-xs-2"><img class="mui-media-object" src="img/2-rough.png" onclick="rough()">
		                            <div class="mui-media-body">粗糙</div></li>
		                </ul>
		            	</div>
		            	
		            <!-- 额外增加的一个节点(循环轮播：最后一个节点是第一个图文表格) -->
		            <div class="mui-slider-item mui-slider-item-duplicate">
		                <ul class="mui-table-view mui-grid-view">
		                    <li class="mui-table-view-cell mui-media mui-col-xs-2"><img class="mui-media-object" src="img/2-originalPhoto.png" onclick="originalPhoto()">
		                            <div class="mui-media-body">原图</div></li>
		                    <li class="mui-table-view-cell mui-media mui-col-xs-2"><img class="mui-media-object" src="img/2-softenFace.png" onclick="softenFace()">
		                            <div class="mui-media-body">美肤</div></li>
		                    <li class="mui-table-view-cell mui-media mui-col-xs-2"><img class="mui-media-object" src="img/2-sketch.png" onclick="sketch()">
		                            <div class="mui-media-body">素描</div></li>
		                    <li class="mui-table-view-cell mui-media mui-col-xs-2"><img class="mui-media-object" src="img/2-softEnhancement.png" onclick="softEnhancement()">
		                            <div class="mui-media-body">自然增强</div></li>
		                    <li class="mui-table-view-cell mui-media mui-col-xs-2"><img class="mui-media-object" src="img/2-purpleStyle.png" onclick="purpleStyle()">
		                            <div class="mui-media-body">紫调</div></li>
		                </ul>
		            </div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
