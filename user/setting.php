<!DOCTYPE html>
<?php
if (isset($_COOKIE["qq"])){
  $dbname = "user";
  // 创建链接
  $conn = new mysqli("localhost", "root", "Lzj021272333", $dbname);
  $sql = "SELECT * FROM user where name='".$_COOKIE["name"]."'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
}else{
  echo '<script>location.href="/login.php"</script>';
}
  ?>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>设置中心</title>
        <!-- Bootstrap core CSS -->
        <link rel="shortcut icon" href="http://chainwon.com/favicon.ico">
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../bootstrap/css/bootstrap-reset.css" rel="stylesheet">
        <!--external css-->
        <link href="../bootstrap/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="../bootstrap/assets/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template -->
        <link href="../bootstrap/css/style.css" rel="stylesheet">
        <link href="../bootstrap/css/style-responsive.css" rel="stylesheet" />

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
      <script src="../bootstrap/js/html5shiv.js"></script>
      <script src="../bootstrapjs/respond.min.js"></script>
    <![endif]-->
    </head>

    <body>

        <section id="container" class="">
            <?php error_reporting(0);include '/user/head.php'; ?>
            <!--main content start-->
            <section id="main-content" style="margin-left:calc(50% - 550px);margin-right:calc(50% - 550px);">
                <section class="wrapper">
                    <!--mail inbox start-->
                    <div class="mail-box">
                        <aside class="sm-side">
                            <div class="user-head">
                                <h3 style="text-align: center;">设置中心</h3>
                            </div>
                            <ul class="inbox-nav inbox-divider">
                                <li class="active">
                                    <a href="setting.php"><i class="icon-user"></i> 我的信息</a>
                                </li>
                                <li>
                                    <a href="account.php"><i class="icon-globe"></i> 账号相关</a>
                                </li>
                                <li>
                                  <a href="www.php"><i class="icon-sun"></i> 导航设置</a>
                               </li>
                                <?php if($row["usertype"] == '内团'){
                                  echo '<li>';
                                  echo '<a href="krypton.php"><i class="icon-cny"></i> 氪金功能</a>';
                                  echo '</li>';
                                }
                                ?>
                            </ul>
                        </aside>
                        <aside class="lg-side">
                            <div class="inbox-head">
                            </div>
                            <div class="panel-body">
                                <div class=" form">
                                    <form class="cmxform form-horizontal tasi-form" method="POST" action="">
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-2">昵称</label>
                                            <div class="col-lg-10">
                                                <input class=" form-control" id="name" name="name" type="text" value="<?php echo $row["name"]; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="cemail" class="control-label col-lg-2">UID</label>
                                            <div class="col-lg-10">
                                                <input class="form-control " name="uid" value="<?php echo $row["uid"]; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-2">网站地址</label>
                                            <div class="col-lg-10">
                                                <input class=" form-control" id="link" name="link" type="text" value="<?php echo $row["link"]; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="ccomment" class="control-label col-lg-2">我的签名</label>
                                            <div class="col-lg-10">
                                                <textarea class="form-control" id="userwrite" name="userwrite"><?php echo $row["userwrite"]; ?></textarea>
                                            </div>
                                        </div>
                                        <?php
                                                              if (isset($_REQUEST['save'])){
                                                                if(mb_strlen($_POST['name'], 'UTF-8') >= 2 && mb_strlen($_POST['name'], 'UTF-8') <= 10){
                                                                  $nowwrite = $_POST["userwrite"];
                                                                  $nowlink = $_POST["link"];
                                                                  $uid = $row["uid"];
                                                                  $conwrite=mysqli_connect("localhost","root","Lzj021272333", "user");
                                                                  mysqli_query($conwrite,"UPDATE user SET userwrite = '".$nowwrite."', link = '".$nowlink."'  WHERE uid = $uid");
                                                                  echo "<script> location.replace(location.href);</script>";
                                                                }else{
                                                                  echo '<div class="form-group"><center>昵称不规范</center></div>';
                                                                }
                                                              }
                                                            ?>
                                            <div class="form-group">
                                                <center>
                                                    <button class="btn btn-danger" name="save" type="submit">保存设置</button>
                                                </center>
                                            </div>
                                    </form>
                                </div>

                            </div>


                            <!--mail inbox end-->
                </section>
            </section>
            <!--main content end-->
        </section>
        <script src="/assets/js/baidu.js"></script>
        <script src="../bootstrap/js/jquery.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../bootstrap/js/jquery.scrollTo.min.js"></script>
        <script src="../bootstrap/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="../bootstrap/assets/jquery-knob/js/jquery.knob.js"></script>
        <!--common script for all pages-->
        <script src="../bootstrap/js/common-scripts.js"></script>
    </body>

    </html>
