<!--header start-->
<header class="header white-bg">
    <div class="nav notify-row" id="top_menu" style="margin-left:calc(50% - 536px);">
        <ul class="nav top-menu">
          <li class="dropdown" data-original-title="主站">
              <a href="/">
                  <i class="icon-home"></i>
              </a>
          </li>
            <li id="header_inbox_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="icon-envelope-alt"></i>
                    <span class="badge bg-important">1</span>
                </a>
                <ul class="dropdown-menu extended inbox">
                    <div class="notify-arrow notify-arrow-red"></div>
                    <li>
                        <p class="red">你有 1 个消息</p>
                    </li>
                    <li>
                        <a href="#">
                            <span class="photo"><img alt="avatar" src="http://chainwon.com/logo.png"></span>
                            <span class="subject">
                            <span class="from">轻惋网络</span>
                            </span>
                            <span class="message">
                                后台完善中……
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="top-nav">

        <ul class="nav pull-right top-menu">
            <!-- user login dropdown start-->
            <li><form method="GET" target="_blank" action="user.php?"><input type="text" class="form-control search" name="uid" placeholder="UID"></form></li>
            <li class="dropdown" onclick="<?php if (isset($_COOKIE["qq"])){}else{echo "javascript:window.location.href='./login.php'";} ?>">
                <a <?php if (isset($_COOKIE["qq"])){ echo 'data-toggle="dropdown" class="dropdown-toggle"';} ?> href="#">
                    <img style="width:30px;height:30px;border-radius:50%;" src="<?php if(isset($_COOKIE["qq"])){echo 'http://q1.qlogo.cn/g?b=qq&nk='.$_COOKIE["qq"].'&s=100';}else{echo 'http://chainwon.com/assets/img/two/chainwonmusic.png';} ?>">
                    <span class="username"><?php if (isset($_COOKIE["qq"])){echo $_COOKIE["name"];}else{echo '未登录';} ?></span>
                    <?php if (isset($_COOKIE["qq"])){ echo '<b class="caret"></b>'."\n";} ?>
                </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <li><a href="/user.php?uid=<?php echo $_COOKIE["uid"]; ?>"><i class=" icon-star"></i> 空间</a></li>
                    <li><a href="/user/setting.php"><i class="icon-cog"></i> 设置</a></li>
                    <li><a href="#"><i class="icon-bell-alt"></i> 消息</a></li>
                    <li style="background-color: #ff6c60;"><a href="/logout.php"><i class="icon-power-off"></i> 注销</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
    </div>
</header>
<!--header end-->
