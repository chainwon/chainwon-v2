
<?php
error_reporting(0);
$page = $_GET["page"];
$link = $_GET["link"];
if($page == 'talk'){
  include "./default/talk.php";
  $urls = array(
    'http://www.chainwon.com/?page=talk',
);
  $api = 'http://data.zz.baidu.com/urls?site=www.chainwon.com&token=7q4YIgtzCuMdGNce';
  $ch = curl_init();
  $options =  array(
    CURLOPT_URL => $api,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => implode("\n", $urls),
    CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
);
   curl_setopt_array($ch, $options);
   $result = curl_exec($ch);
}elseif($page == 'about'){
  include "./default/about.php";

}elseif($link != ''){
  echo'<div class="copyright"><i class="fa fa-cog fa-spin tiaolink"></i></div>';
  $content=file_get_contents($link);
  $pos = strpos($content,'utf-8');
  if($pos===false){$content = iconv("gbk","utf-8",$content);}
  $postb=strpos($content,'<title>')+7;
  $poste=strpos($content,'</title>');
  $length=$poste-$postb;
  echo'<title>'.substr($content,$postb,$length).'</title>';
  $urls = array(
    'http://www.chainwon.com/?link='.$link,
);
  $api = 'http://data.zz.baidu.com/urls?site=www.chainwon.com&token=7q4YIgtzCuMdGNce';
  $ch = curl_init();
  $options =  array(
    CURLOPT_URL => $api,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => implode("\n", $urls),
    CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
);
   curl_setopt_array($ch, $options);
   $result = curl_exec($ch);
  echo'<meta http-equiv="refresh" content="0;url='.$link.'">';
}else{
  include './default/home.php';
}
?>
