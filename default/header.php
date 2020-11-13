<?php
if (isset($_COOKIE["qq"])){//如果已经登录
  include("config.php");
  $dbname = "user";
  // 创建链接
  $conn = new mysqli($chainwon['mysql'], $chainwon['mysqlname'], $chainwon['mysqlpassword'], $dbname);
  $sql = "SELECT * FROM user where name='".$_COOKIE["name"]."'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
echo '<div class="useravatar"><img src="http://q1.qlogo.cn/g?b=qq&nk='.$_COOKIE["qq"].'&s=100"></div>'."\n";
echo '<ul class="userinformation">'."\n";
echo '<li class="name">'.$_COOKIE["name"].'</li>'."\n";
echo '<a href="user.php?uid='.$_COOKIE["uid"].'" target="_blank"><li><i class="fa fa-star"></i>空间</li></a>'."\n";
echo '<a href="user/setting.php" target="_blank"><li><i class="fa fa-cog"></i>设置</li></a>'."\n";
echo '<a href="logout.php"><li class="logout"><i class="fa fa-power-off"></i>注销</li></a>'."\n";
echo '</ul>';
}else{//否则
echo '<a href="login.php"><div class="useravatar"><img src="http://chainwon.com/assets/img/two/chainwonmusic.png"></div></a>';
}
?>
<style>
/* 用户自定义css */
<?php echo $row["css"]."\n"; ?>
</style>
<div class="menu menuicon hidden-xs">
        <i class="fa fa-bars"></i>
    </div>
    <div class="menubox">
       <div class="row">
           <div class="col-xs-12">
               <ul>
                   <center>
                       <li><a rel="nofollow" href="./">首页</a></li>
                       <li><a rel="nofollow" href="./?page=talk">交流</a></li>
                       <li><a rel="nofollow" href="./?page=about">关于</a></li>
                   </center>
               </ul>
           </div>
       </div>
       <a href="javascript:;" class="menu-close">&times;</a>
       </div>
       <div class="floatbar">
           <div class="floatbar-btn btn-rocket"><li class="fa fa-rocket" style="transform: rotate(-45deg);-ms-transform: rotate(-45deg);-moz-transform: rotate(-45deg);-webkit-transform: rotate(-45deg);-o-transform: rotate(-45deg);line-height: 58px;"></li></div>
           <a target="_blank" href="http://connect.qq.com/widget/shareqq/index.html?url=http://www.chainwon.com/&desc=%E8%BD%BB%E6%83%8B%E5%AF%BC%E8%88%AA&pics=http://www.chainwon.com/logo.png&site=qqcom">
             <div class="floatbar-btn"><li class="fa fa-share"></li></div></a>
       </div>

       <body style="margin:0px;">
<a href="./"><img class="logo" src="logo.png" alt="轻惋导航 - 永存的二次元"></a>
<div class="container">
    <form id="S" action="<?php
    if($row["search"] == '谷歌'){
      echo 'https://www.google.com/search';
    }elseif($row["search"] == '百度'){
      echo 'https://www.baidu.com/s';
    }elseif($row["search"] == '360'){
      echo 'https://www.so.com/s';
    }elseif($row["search"] == '中国搜索'){
      echo 'http://www.chinaso.com/search/pagesearch.htm';
    }elseif($row["search"] == '必应'){
      echo 'http://cn.bing.com/search';
    }else{echo 'https://www.baidu.com/s';
    }
    ?>" method="GET" target="_blank">
    	<div class="I" id="I">
    		<input type="search" id="search" class="bottom" name="<?php
        if($row["search"] == '谷歌'){
          echo 'as_q';
        }elseif($row["search"] == '百度'){
          echo 'wd';
        }elseif($row["search"] == '360'){
          echo 'q';
        }elseif($row["search"] == '中国搜索'){
          echo 'q';
        }elseif($row["search"] == '必应'){
          echo 'q';
        }else{echo 'wd';
        }
        ?>" autocomplete="off" placeholder="搜索╮(￣▽￣)╭">
    	</div>
    </form>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?41b04999ee3d67f2acc9ce741045e68d";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(hm, s);
})();
</script>
    <script type="text/javascript">
    var duoshuoQuery = {
        short_name: "chainwon"
    };
    (function() {
        var ds = document.createElement('script');
        ds.type = 'text/javascript';
        ds.async = true;
        ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//www.chainwon.com/assets/js/embed.js';
        ds.charset = 'UTF-8';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ds);
    })();
</script>
