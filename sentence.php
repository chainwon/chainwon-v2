<!DOCTYPE html>
<html>
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "Lzj021272333";
	$dbname = "hitokoto";
	// 创建连接
	$conn = new mysqli($servername, $username, $password, $dbname);
  $id = $_GET["id"];
	$sql = "SELECT text, source, catname, author, date FROM hitokoto where id=$id";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
?>
<head>
	<meta charset="utf-8">
  <title><?php if ($result->num_rows > 0) {echo $row["text"];}else { echo '404 Not Found';} ?></title>
  <meta name="description" content="<?php if ($result->num_rows > 0) {echo $row["text"];}else { echo '404 Not Found';} ?>" />
  <meta name="keywords" content="<?php if ($result->num_rows > 0) {echo $row["text"];}else { echo '404 Not Found';} ?>" />
	<meta name="viewport" content="user-scalable=no,width=500">
	<link rel="stylesheet" href="./assets/css/hitokoto.css?v=1.3">
	<link href="//cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<div class="one fadeIn">
<?php
if ($result->num_rows > 0) {
	echo '<h2 class="nowrap">'.$row["text"].'</h2>'."\n";
	if($row["source"] != ''){
		echo '<p class="tags">';
		echo '<a href="http://bangumi.tv/subject_search/'.$row["source"].'?cat=all" target="_blank">';
		echo '<span>'.$row["source"].'</span>';
		echo '</p></a>'."\n";
	}
	echo '<script src="assets/js/baidu.js"></script>'."\n";
}else {
  include "./php/404.html";
}
?>
</div>
	 <div class="menu menuicon hidden-xs" onmouseenter="animateShow();" onmouseleave="animateHide();">
		 <i class="fa fa-plus"></i>
	 </div>
	 <div class="menubox">
	             <ul><center>
	             <li><p class="fa fa-copyright"> <?php if ($result->num_rows > 0) {echo $row["catname"];}else { echo '404 Not Found';} ?></p></li>
	             <li><p class="fa fa-user"> <?php if ($result->num_rows > 0) {echo $row["author"];}else { echo '404 Not Found';} ?></p></li>
	             <li><p class="fa fa-clock-o"> <?php if ($result->num_rows > 0) {echo $row["date"];}else { echo '404 Not Found';} ?></p></li>
	            </center></ul>
	 </div>
<div class="background"></div>
</body>
<footer>
	<script>
	var _hmt = _hmt || [];
	(function() {
	  var hm = document.createElement("script");
	  hm.src = "//hm.baidu.com/hm.js?41b04999ee3d67f2acc9ce741045e68d";
	  var s = document.getElementsByTagName("script")[0];
	  s.parentNode.insertBefore(hm, s);
	})();
	</script>
	<?php
	if ($result->num_rows > 0) {
		echo '<script type="text/javascript" src="//cdn.bootcss.com/jquery/1.7.2/jquery.min.js"></script>'."\n";
		echo '<script src="assets/js/top.js"></script>'."\n";
		$conn->close();
	}
	?>
</footer>
</html>
