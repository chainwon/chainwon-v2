<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>轻惋注册</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="bootstrap/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="bootstrap/css/style.css" rel="stylesheet">
    <link href="bootstrap/css/style-responsive.css" rel="stylesheet" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="bootstrap/js/html5shiv.js"></script>
    <script src="bootstrap/js/respond.min.js"></script>
    <![endif]-->
</head>
  <body>
    <?php include './user/head.php'; ?>
      <form class="form-signin" style="top: calc(50% - 237px);left: calc(50% - 175px);" method="post" action="">
        <h2 class="form-signin-heading">注册账号</h2>
        <div class="login-wrap">
            <input name="name" type="text" class="form-control" placeholder="昵称">
            <input name="password" type="password" class="form-control" placeholder="密码">
            <input name="password2" type="password" class="form-control" placeholder="重复密码">
            <input name="qq" type="text" class="form-control" placeholder="QQ号">
            <input name="email" type="text" class="form-control" placeholder="邮箱">
            <?php
            include("config.php");
            $dbname = "user";
            // 创建链接
            $conn = new mysqli($chainwon['mysql'], $chainwon['mysqlname'], $chainwon['mysqlpassword'], $dbname);
            // 检测连接
            if ($conn->connect_error) {
                die("连接失败: " . $conn->connect_error);
            }
            if (isset($_REQUEST['register'])){

                if($_POST['name'] != '' && $_POST['password'] != '' && $_POST['qq'] != '' && $_POST['email'] != ''){
                  if(mb_strlen($_POST['name'], 'UTF-8') >= 2 && mb_strlen($_POST['name'], 'UTF-8') <= 10){
                  if(mb_strwidth($_POST['password']) >= 6){
                  if($_POST['password'] == $_POST['password2']){
                  if(mb_strwidth($_POST['qq']) >= 5 && is_numeric($_POST['qq'])){
                  $nowname=$_POST['name'];
                  echo '"'.$nowname.'"';
                  $sql = "SELECT name FROM user where name='".$nowname."'";
                  $result = $conn->query($sql);
                  $row = $result->fetch_assoc();
                  if ($row["name"] == $nowname) {
                    echo'<label class="checkbox"><span class="pull-right">这个账号已注册</span></label>';
                  }else{
                    $stmt = $conn->prepare("INSERT INTO user (name, password, registertime, usergrade, usertype, ip, qq, email) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("ssssssss", $name, $password, $registertime, $usergrade, $usertype, $ip, $qq, $email);
                    $name = $_POST['name'];
                    $password = MD5($_POST['password'].'chainwonuser1');
                    $registertime = date('Y-m-d H:i:s');
                    $usergrade = 'Lv.1';
                    $usertype = '用户';
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
                    $qq = $_POST['qq'];
                    $email = $_POST['email'];
                    $stmt->execute();
                    $stmt->close();
                    $conn->close();
                    echo '<label class="checkbox"><span class="pull-right">账号注册成功</span></label>';
                  }
                }else{
                  echo'<label class="checkbox"><span class="pull-right">请填写正确的QQ号码！</span></label>';
                }
                }else{
                  echo'<label class="checkbox"><span class="pull-right">两次密码输入不相同</span></label>';
                }
                }else{
                  echo'<label class="checkbox"><span class="pull-right">密码请大于6个字符</span></label>';
                }
                }else{
                  echo'<label class="checkbox"><span class="pull-right">昵称请大于2个字符且小于10个字符</span></label>';
                }
                }else{
                  echo'<label class="checkbox"><span class="pull-right">不可用空白项</span></label>';
                }

            }
            ?>
            <input name="register" class="btn btn-lg btn btn-danger btn-block" type="submit" value="立即注册">
            <a href="login.php" class="btn btn-lg btn btn-danger-border btn-block" style="margin-top:13px;">返回登陆</a>
          </div>
            </form>
  </body>
</html>
