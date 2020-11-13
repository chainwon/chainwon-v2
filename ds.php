<style>
<?php
  include("config.php");
  $dbname = "user";
  // 创建链接
  $conn = new mysqli($chainwon['mysql'], $chainwon['mysqlname'], $chainwon['mysqlpassword'], $dbname);
  $con=mysqli_connect("localhost","root","Lzj021272333","user");
  $ds1="#ds-thread #ds-reset a.ds-user-name[data-user-id='";
  $ds2="']:after";

  $nsql = "SELECT * FROM user where usertype='内团'";
  $nresult = $conn->query($nsql);
  $ncha="SELECT * FROM user WHERE usertype='内团'";
  $ncha_result=mysqli_query($con,$ncha);
  $nall=mysqli_num_rows($ncha_result) - 1;
  $n = 0;

  $usql = "SELECT * FROM user where usertype='用户'";
  $uresult = $conn->query($usql);
  $ucha="SELECT * FROM user WHERE usertype='用户'";
  $ucha_result=mysqli_query($con,$ucha);
  $uall=mysqli_num_rows($ucha_result) - 1;
  $u = 0;

  $vip1sql = "SELECT * FROM user where usertype='VIP1'";
  $vip1result = $conn->query($vip1sql);
  $vip1cha="SELECT * FROM user WHERE usertype='VIP1'";
  $vip1cha_result=mysqli_query($con,$vip1cha);
  $vip1all=mysqli_num_rows($vip1cha_result) - 1;
  $vip1 = 0;
  ?>
#ds-thread #ds-reset a.ds-user-name[data-user-id='13895227']:after {
    content: "站长";
    margin-left: 6px;
    font-size: 12px;
    color: #fff;
    background: #ff95b8;
    border-radius: 2px;
    padding: 0 3px;
    box-shadow: 0px 0px 8px #ff95b8;
    opacity: 0.8;
}

<?php while($nrow = $nresult->fetch_assoc()) {
  if($n < $nall){
  echo $ds1.$nrow["dsuserid"].$ds2.", \n";
  $n += 1;
}else{
  echo $ds1.$nrow["dsuserid"].$ds2;
}
  }
?>
{
    content: "内团";
    margin-left: 6px;
    font-size: 12px;
    color: #fff;
    background: #58c9f3;
    border-radius: 2px;
    padding: 0 3px;
    box-shadow: 0px 0px 8px  #58c9f3;
    opacity: 0.8;
}

<?php while($urow = $uresult->fetch_assoc()) {
  if($u < $uall){
  echo $ds1.$urow["dsuserid"].$ds2.", \n";
  $u += 1;
}else{
  echo $ds1.$urow["dsuserid"].$ds2;
}
  }
?>
{
    content: "用户";
    margin-left: 6px;
    font-size: 12px;
    color: #fff;
    background: #a1a1a1;
    border-radius: 2px;
    padding: 0 3px;
    box-shadow: 0px 0px 8px  #a1a1a1;
    opacity: 0.8;
}

<?php while($vip1row = $vip1result->fetch_assoc()) {
  if($vip1 < $vip1all){
  echo $ds1.$vip1row["dsuserid"].$ds2.", \n";
  $vip1 += 1;
}else{
  echo $ds1.$vip1row["dsuserid"].$ds2;
}
  }
?>
{
    content: "VIP1";
    margin-left: 6px;
    font-size: 12px;
    color: #fff;
    background: #F64848;
    border-radius: 2px;
    padding: 0 3px;
    box-shadow: 0px 0px 8px  #F64848;
    opacity: 0.8;
}
</style>
