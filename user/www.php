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
$search = $row["search"];
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
                                <li>
                                    <a href="setting.php"><i class="icon-user"></i> 我的信息</a>
                                </li>
                                <li>
                                    <a href="account.php"><i class="icon-globe"></i> 账号相关</a>
                                </li>
                                <li class="active">
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
                                            <label for="cname" class="control-label col-lg-2">搜索引擎</label>
                                            <div class="col-lg-2">
                                                <div class="task-option" style="float:left;">
                                                    <select name="select" style="width: 130px; height: 39px; font-size: 12px;">
                                                        <option <?php if($search == '谷歌'){echo 'selected="selected"';} ?>>谷歌</option>
                                                        <option <?php if($search == '百度'){echo 'selected="selected"';} ?>>百度</option>
                                                        <option <?php if($search == '360'){echo 'selected="selected"';} ?>>360</option>
                                                        <option <?php if($search == '中国搜索'){echo 'selected="selected"';} ?>>中国搜索</option>
                                                        <option <?php if($search == '必应'){echo 'selected="selected"';} ?>>必应</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <label for="cname" class="control-label col-lg-8 pull-right">&nbsp;&nbsp;<span class="badge bg-important">！</span>&nbsp;导航搜索引擎设置</label>
                                        </div>
                                        <div class="form-group">
                                          <div style="margin-top:8px;">
                                          <div class="col-sm-3 text-center">
                                            <label class="label_check" style="height:25px;" for="checkbox-01">
                                                <input name="sample-checkbox-01" id="checkbox-01" value="1" type="checkbox" checked /> 一言一句
                                            </label>
                                          </div>
                                            <div class="col-sm-3 text-center">
                                              <label class="label_check" style="height:25px;" for="checkbox-02">
                                                  <input name="sample-checkbox-02" id="checkbox-02" value="1" type="checkbox" checked /> 网址导航
                                              </label>
                                            </div>
                                            <div class="col-sm-3 text-center">
                                              <label class="label_check" style="height:25px;" for="checkbox-03">
                                                  <input name="sample-checkbox-03" id="checkbox-03" value="1" type="checkbox" checked /> Ｂ站日榜
                                              </label>
                                            </div>
                                            <div class="col-sm-3 text-center">
                                              <label class="label_check" style="height:25px;" for="checkbox-04">
                                                  <input name="sample-checkbox-04" id="checkbox-04" value="1" type="checkbox" checked /> 每日一句
                                              </label>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                          <div  style="margin-left:15px;margin-right:15px;">
                                                <textarea class="form-control" style="height:200px;" id="textcss" name="textcss"><?php echo $row["css"]; ?></textarea>
                                          </div>
                                        </div>
                                <?php
                                         if (isset($_REQUEST['save'])){
                                           $nowcss = $_POST["textcss"];
                                           $uid = $_COOKIE["uid"];
                                           $nowsearch = $_POST['select'];
                                           $conwrite=mysqli_connect("localhost","root","Lzj021272333", "user");
                                           mysqli_query($conwrite,"UPDATE user SET css = '".$nowcss."', search = '".$nowsearch."' WHERE uid = $uid");
                                           echo "<script> location.replace(location.href);</script>";
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
                        </aside>



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
        <script src="../bootstrap/js/form-component.js"></script>
    </body>

    </html>
