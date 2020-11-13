<!DOCTYPE html>
<html>
<?php
  $useruid = $_GET["uid"];
  include("config.php");
  $dbname = "user";
  // 创建链接
  $conn = new mysqli($chainwon['mysql'], $chainwon['mysqlname'], $chainwon['mysqlpassword'], $dbname);
  if($useruid != ''){
    $sql = "SELECT * FROM user where uid=$useruid";
  }else{
     if (isset($_COOKIE["qq"])){
       $nowuseruid=$_COOKIE["uid"];
       $sql = "SELECT * FROM user where uid=$nowuseruid";
  }else{
    echo '<script>location.href="/login.php"</script>';
  }
  }
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  if ($result->num_rows > 0){} else {
      echo '<script>location.href="./404.html"</script>';
  }
  ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title><?php echo $row["name"].'的个人空间'; ?></title>
    <link rel="shortcut icon" href="http://q1.qlogo.cn/g?b=qq&nk=<?php echo $row["qq"]; ?>&s=100">

    <!-- Bootstrap core CSS -->
    <link href="./bootstrap/css/bootstrap.min.css?v=1.0" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="./bootstrap/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="./bootstrap/css/style.css?v=1.0" rel="stylesheet">
    <link href="./bootstrap/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="./bootstrap/js/html5shiv.js"></script>
      <script src="./bootstrap/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <section id="container" class="">
      <?php include './user/head.php'; ?>
        <!--main content start-->
        <section id="main-content" style="margin-left:calc(50% - 550px);margin-right:calc(50% - 550px);">
            <section class="wrapper">
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-8">
                        <section class="panel">
                            <header class="panel-heading tab-bg-dark-navy-blue">
                                <ul class="nav nav-tabs nav-justified ">
                                    <!--<li>
                                        <a href="#popular" data-toggle="tab">
                                                设置1
                                            </a>
                                    </li>-->
                                    <li class="active">
                                        <a href="#css" data-toggle="tab">
                                                CSS
                                            </a>
                                    </li>
                                    <li class="">
                                        <a href="#js" data-toggle="tab">
                                                JS
                                            </a>
                                    </li>
                                    <!--<li class="">
                                        <a href="#recent4" data-toggle="tab">
                                                设置4
                                            </a>
                                    </li>-->
                                </ul>
                            </header>
                            <div class="panel-body">
                                <div class="tab-content tasi-tab">
                                    <!--<div class="tab-pane" id="popular">

                                    </div>-->

                                    <div class="tab-pane active" id="css">
                                      <form class="cmxform form-horizontal tasi-form col-lg-12" method="POST" action="">
                                      <div class="form-group ">
                                      <textarea class="form-control" style="height:400px;" id="textcss" name="textcss"><?php echo $row["css"]; ?></textarea>
                                      </div>
                                      <?php
                                      if($_COOKIE["qq"] == $row["qq"]){
                                        echo '<div class="form-group "><center><button class="btn btn-info" name="savecss" type="submit">保存设置</button></center></div>';
                                      }else{
                                        echo '<div class="form-group "><center><button class="btn btn-info" name="savecss" type="submit">保存他的CSS</button></center></div>';
                                      }
                                      if (isset($_REQUEST['savecss'])){
                                        $nowcss = $_POST["textcss"];
                                        $uid = $_COOKIE["uid"];
                                        $conwrite=mysqli_connect("localhost","root","Lzj021272333", "user");
                                        mysqli_query($conwrite,"UPDATE user SET css = '".$nowcss."' WHERE uid = $uid");
                                        echo "<script> location.replace(location.href);</script>";
                                      }
                                      ?>
                                      </form>
                                    </div>

                                    <div class="tab-pane " id="js">
                                      <form class="cmxform form-horizontal tasi-form col-lg-12" method="POST" action="">
                                      <div class="form-group ">
                                      <textarea class="form-control" style="height:400px;" id="textjs" name="textjs"><?php echo $row["js"]; ?></textarea>
                                      </div>
                                      <?php
                                      if($_COOKIE["qq"] == $row["qq"]){
                                        echo '<div class="form-group "><center><button class="btn btn-info" name="savejs" type="submit">保存设置</button></center></div>';
                                      }else{
                                        echo '<div class="form-group "><center><button class="btn btn-info" name="savejs" type="submit">保存他的js</button></center></div>';
                                      }
                                      if (isset($_REQUEST['savejs'])){
                                        $nowjs = $_POST["textjs"];
                                        $uid = $_COOKIE["uid"];
                                        $conwrite=mysqli_connect("localhost","root","Lzj021272333", "user");
                                        mysqli_query($conwrite,"UPDATE user SET js = '".$nowjs."' WHERE uid = $uid");
                                        echo "<script> location.replace(location.href);</script>";
                                      }
                                      ?>
                                      </form>
                                      </div>
                                    <!--<div class="tab-pane " id="recent4">

                                    </div>-->
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-4">
                        <section class="panel">
                            <div class="twt-feed blue-bg">
                                <a <?php $nowlink=$row["link"]; if($nowlink != ''){echo 'href="'.$nowlink.'"';} ?> target="_blank" style="margin-top:30px;">
                                    <img src="http://q1.qlogo.cn/g?b=qq&nk=<?php echo $row["qq"]; ?>&s=0">
                                </a>
                            </div>
                            <div class="weather-category twt-category">
                              <?php
                              if($row["usertype"] == '内团'){
                                $color='#58c9f3';
                              }elseif($row["usertype"] == '站长'){
                                $color='#ff95b8';
                              }elseif($row["usertype"] == '用户'){
                                $color='#a1a1a1';
                              }else{
                                $color='#ff6c60';
                              }
                              echo '<div class="usertype">';
                              echo '<a>'.$row["name"].'</a></div>';
                               ?>
                                <ul>
                                    <li><h5><?php echo $row["usergrade"]; ?></h5> 等级</li>
                                    <li><h5><?php echo $row["uid"]; ?></h5> UID</li>
                                    <li><h5><?php echo $row["coin"]; ?></h5> 轻萌币</li>
                                </ul>
                            </div>
                            <div class="twt-write col-sm-12" style="padding-bottom:10px;">
                                <p class="userwrite"><?php echo $row["userwrite"]; ?></p>
                            </div>
                        </section>
                        <div class="progress progress-striped active progress-sm" style="background:#fff;height:20px;">
                          <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>
                        </div>
                    </div>
                    </div>
                    <!-- page end-->
            </section>
            <!--main content end-->
        </section>
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="./bootstrap/js/jquery.js"></script>
    <script src="/assets/js/baidu.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./bootstrap/js/jquery.scrollTo.min.js"></script>
    <script src="./bootstrap/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="./bootstrap/assets/jquery-knob/js/jquery.knob.js"></script>


    <!--common script for all pages-->
    <script src="./bootstrap/js/common-scripts.js"></script>

    <script>
        //knob
        $(".knob").knob();
    </script>

</body>

</html>
