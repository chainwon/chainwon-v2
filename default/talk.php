<html>
<head>
<title>轻惋导航 - 交流神域</title>
<?php include "./default/head.php"; ?>
</head>
<?php include "./default/header.php"; ?>
<div id="body">
<?php
require("ds.php");
$servername = "localhost";
$username = "root";
$password = "Lzj021272333";
$dbname = "user";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM user ORDER BY registertime DESC limit 10";
$result = $conn->query($sql);
?>
<div class="copyright" style="font-size:0;">
 <div style="width:calc(100% - 10px);margin-left:5px;margin-right:5px;">
  <div class="title">最新注册</div>
  <?php
  if ($result->num_rows > 0) {
      // 输出每行数据
      while($row = $result->fetch_assoc()) {
          $nname = $row["name"];
          echo '<div class="ranking">';
          echo '<a href="http://www.chainwon.com/user.php?uid='.$row["uid"].'" target="_blank">';
          echo '<img src="http://q1.qlogo.cn/g?b=qq&nk='.$row["qq"].'&s=100">';
          echo '</a><p>'.mb_substr($nname,0,4).'...</p>';
          echo '</div>';
      }
  }else{
    header('Location: http://bizhi.chainwon.com/404.php');
  }
  $conn->close();
  ?>
 </div>
</div>
<div class="copyright">
  <center>
  <div class="ds-thread" style="top:15px;padding-bottom:15px;" data-thread-key="chainwonemtalk" data-title="轻惋导航 - 交流区" data-url="http://www.chainwon.com/?page=about"></div>
</center>
</div>
<footer>
<script src="assets/js/tab.js"></script>
<?php include "./default/footer.php"; ?>
</footer>
</html>
