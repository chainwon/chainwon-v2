<html>
<head>
<title>轻惋导航 - 关于我们</title>
<?php include "./default/head.php"; ?>
</head>
<?php include "./default/header.php"; ?>
<div id="body">
<style>
    .fengexian {
        border-radius: 3px;
        background-color: #ff95b8;
        width: 250px;
        height: 2px;
        margin-top: 8px;
        margin-bottom: 8px;
        box-shadow: 0px 0px 10px #ff95b8;
    }
    .aboutchainwon th,
    .aboutchainwon td {
        width: 33.333333333%;
        text-align: center;
    }
    table {width:380px;border-collapse: collapse;}
    table,th,td {color:#ff95b8;padding:5px;border: 1px solid#ff95b8;box-shadow:0px 0px 3px #ff95b8;}
    @media screen and (max-width:1081px) {
      table{
        width:calc(100% - 8px);
        margin:4px;
      }
    }
</style>
<div class="link-other" style="margin-top:-10;">
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "Lzj021272333";
    $dbname = "links";

    // 创建连接
    $conn = new mysqli($servername, $username, $password, $dbname);
    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }

    $sql = "SELECT name, link, logo, introduce FROM links";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // 输出每行数据
        while($row = $result->fetch_assoc()) {
            echo '<a title="'.$row["introduce"].'" href="http://www.chainwon.com/?link='.$row["link"].'" style="text-decoration:none" target="_blank">';
            echo $row["name"];
            echo '</a>'."\n";
        }
    } else {
        echo "0 个结果";
    }
    $conn->close();
    ?>
</div>
<?php require("ds.php"); ?>
<div class="copyright">
    <center>
        <div class="aboutchainwon">
            <br/>
            <h1>关于轻惋</h1>
            <div class="fengexian"></div>
            <p>轻轻的叹惋着曾经所获得的成功…
                <br/>旗下域名：chainwon.com&chainwon.cn<br/>
              一切不是此域名及带有<s>魔帆</s>字样的都与本站无关
              </p>
            <br/>
            <h1 id="showsectime"></h1>
            <div class="fengexian"></div>
            <p>建于：2016年4月29日
                <br/>五一前的最后一个星期五</p>
            <br/>
            <h1>轻惋导航</h1>
            <div class="fengexian"></div>
            <p>主页UI、代码等等由轻梦独立完成
            <br/>
            <h1>赞助榜</h1>
            <table>
                <tr>
                    <th>时间</th>
                    <th>捐助人</th>
                    <th>金额</th>
                </tr>
                <tr>
                    <td>2016-05-21</td>
                    <td>冷亦</td>
                    <td>66.66</td>
                </tr>
                <tr>
                    <td>2016-07-04</td>
                    <td>矢量</td>
                    <td>8.64</td>
                </tr>
                <tr>
                    <td>2016-07-04</td>
                    <td>温馨の小霸王</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>2016-07-05</td>
                    <td>Enyoh</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td>2016-07-06</td>
                    <td>哈哩哈哩</td>
                    <td>29.99</td>
                </tr>
                <tr>
                    <td>2016-09-17</td>
                    <td>Corps</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>2016-10-01</td>
                    <td>哈哩哈哩</td>
                    <td>10</td>
                </tr>
            </table>
            <br/>
            <h1>联系我</h1>
            <div class="fengexian"></div>
            <br/>
            <h4>QQ群:482634342</h4>
            <img src="./assets/img/about/qqqun.png" width="300px">
            <h1>支持我</h1>
            <div class="fengexian"></div>
            <h4>支付宝:15971559170</h4>
            <br/>
            <img src="./assets/img/about/zfb.png" width="250px">
            <br/>
            <br/>
            <h4>腾讯QQ：776194970</h4>
            <br/>
            <img src="./assets/img/about/qq.png" width="250px">
            <br/>
            <br/>
            <br/>
        </div>
    </center>
    <script type="text/javascript">
        function NewDate(str) {
            str = str.split('-');
            var date = new Date();
            date.setUTCFullYear(str[0], str[1] - 1, str[2]);
            date.setUTCHours(0, 0, 0, 0);
            return date;
        }

        function showsectime() {
            var birthDay = NewDate("2016-4-29");
            var today = new Date();
            var timeold = today.getTime() - birthDay.getTime();

            var sectimeold = timeold / 1000
            var secondsold = Math.floor(sectimeold);
            var msPerDay = 24 * 60 * 60 * 1000;

            var e_daysold = timeold / msPerDay;
            var daysold = Math.floor(e_daysold);
            var e_hrsold = (daysold - e_daysold) * -24;
            var lifeday = daysold + 1;
            document.getElementById("showsectime").innerHTML = "第" + lifeday + "天";
            setTimeout(showsectime, 1000);
        }
        showsectime();
    </script>
</div>
<div class="copyright">
    <center>
        <div class="ds-thread" data-thread-key="chainwonembody" data-title="轻惋导航 - 关于我们" data-url="http://www.chainwon.com/?page=about"></div>
    </center>
</div>
<footer>
<script src="assets/js/tab.js"></script>
<?php include "./default/footer.php"; ?>
</footer>
</html>
