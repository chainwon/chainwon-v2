<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>轻惋登录</title>

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
      <form class="form-signin" style="top: calc(50% - 155px);left: calc(50% - 175px);" method="post" action="">
        <h2 class="form-signin-heading">登录</h2>
        <div class="login-wrap">
            <input name="name" type="text" class="form-control" placeholder="昵称">
            <input name="password" type="password" class="form-control" placeholder="密码">
            <?php
            include("config.php");
            $dbname = "user";
            // 创建链接
            $conn = new mysqli($chainwon['mysql'], $chainwon['mysqlname'], $chainwon['mysqlpassword'], $dbname);
            // 检测连接
            if ($conn->connect_error) {
                die("连接失败: " . $conn->connect_error);
            }
            if (isset($_COOKIE["qq"])){
              echo '<script>location.href="./"</script>';
            }else{
            if (isset($_REQUEST['login'])){
              session_start();
              $nowname=$_POST['name'];
              $sql = "SELECT name, password,qq,uid,usertype FROM user where name='".$nowname."'";
              $result = $conn->query($sql);
              $row = $result->fetch_assoc();
              if ($row["name"] == $nowname) {
                if($row["password"] == MD5($_POST['password'].'chainwonuser1')){
                  $cookietime=time()+60*60*24*30;
                  setcookie("name", $row["name"], $cookietime, "/", ".chainwon.com");
                  setcookie("qq", $row["qq"], $cookietime, "/", ".chainwon.com");
                  setcookie("uid", $row["uid"], $cookietime, "/", ".chainwon.com");
                  setcookie("usertype", $row["usertype"], $cookietime, "/", ".chainwon.com");
                  echo'<label class="checkbox"><span class="pull-right">登录成功！</span></label>';
                  echo '<script>location.href="./"</script>';
                }else{
                  echo'<label class="checkbox"><span class="pull-right">账号或密码错误！</span></label>';
                }
              }else{
                echo'<label class="checkbox"><span class="pull-right">此账号未注册</span></label>';
              }
            }

            }
            ?>
            <input name="login" class="btn btn-lg btn btn-info btn-block" type="submit" value="立即登陆">
            <a href="register.php" class="btn btn-lg btn btn-info-border btn-block" style="margin-top:15px;">立即注册</a>
          </div>
            </form>
  </body>
  <script src="/assets/js/baidu.js"></script>
</html>
