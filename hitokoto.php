<body style="margin:0px;">
<style>
.hitokotop{
width:880px;
height:80px;
line-height:80px;0px;
font-size:26px;
color:#fff;
font-family: "FangSong" !important;
text-shadow: 0 0 5px #fff, 0 0 5px #fff, 0 0 10px #ff95b8, 0 0 10px #ff95b8;
}
@media screen and (max-width:880px){
  .hitokotop{
  width:100%;
  height:80px;
  line-height:80px;0px;
  font-size:16px;
  color:#fff;
  text-shadow: 0 0 5px #fff, 0 0 5px #fff, 0 0 10px #ff95b8, 0 0 10px #ff95b8;
  }
}
</style>
<script language="JavaScript">
function myrefresh()
{
       window.location.reload();
}
setTimeout('myrefresh()',40000);
</script>
<?php
$html=file_get_contents("http://hitoapi.cc/s/");
$json=json_decode($html);
echo '
<center>
<a rel="nofollow" href="http://www.chainwon.com/sentence.php?id='.$json->id.'" style="text-decoration:none" target="_blank">
<h1 class="hitokotop">
『'.$json->text.'』
</h1>
</a>
</center>';
?>
<script>
var _hmt = _hmt || [];
(function() {
var hm = document.createElement("script");
hm.src = "//hm.baidu.com/hm.js?41b04999ee3d67f2acc9ce741045e68d";
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(hm, s);
})();
</script>
</body>
