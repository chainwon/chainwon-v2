/*
 * @Author: fanqian
 * @Date:   2016-06-15 12:34:55
 * @Website:   Administrator
 * @使用请注明作者和网站
 */
$.QianLoad = {
    PageLoading: function(options) {
        var defaults = {
            delayTime: 500,
            sleep: 0,
        };
        var options = $.extend(defaults, options);
        $('head').append(defaults.css);
        var _LoadingHtml = '<div class="load-wrap"><div id="pre-load">' + '<span></span>' + '</div></div>';
        $("body").append(_LoadingHtml);
        document.onreadystatechange = PageLoaded;

        function PageLoaded() {
            var loadingMask = $('#pre-load');
            $({
                property: 0
            }).animate({
                property: 98
            }, {
                duration: 1000,
                step: function() {
                    var percentage = Math.round(this.property);
                    loadingMask.css('width', percentage + "%");
                    if (document.readyState == "complete") {
                        loadingMask.css('width', 100 + "%");
                        setTimeout(function() {
                            loadingMask.animate({
                                "opacity": 0
                            }, options.delayTime, function() {
                                $(this).remove();
                                console.log('Loading has been successful')
                            })
                        }, options.sleep)
                    }
                }
            })
        }
    }
}
