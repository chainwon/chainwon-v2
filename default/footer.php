  <div class="copyright">&copy; <a rel="nofollow" href="http://www.chainwon.com/">轻惋网络</a>丨鄂ICP备16000678号</div>
  <script src="//cdn.bootcss.com/jquery/1.7.2/jquery.min.js"></script>
  <script src="assets/js/min.js?v=1.0"></script>
  <script src="./assets/js/kaomoji.js?v=1.0"></script>
  <script src="./assets/js/top.js?v=1.0"></script>
  <script src="./assets/js/loading.js?v=1.0"></script>
  <script>
    (function() {
      var bp = document.createElement('script');
      var curProtocol = window.location.protocol.split(':')[0];
      if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
      } else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
      }
      var s = document.getElementsByTagName("script")[0];
      s.parentNode.insertBefore(bp, s);
    })();
  </script>
  <?php
if (isset($_COOKIE["qq"])){
echo '<script src="assets/js/user.js?v=1.0"></script>';
}
?>
    <script>
      $('.btn-rocket').toTop({
        position: false,
        offset: 1000,
      });
      $.QianLoad.PageLoading({
        sleep: 150
      });
    </script>
    <!--用户自定义js -->
    <?php echo '<script>'."\n".$row["js"]."\n"; ?>
    </script>
