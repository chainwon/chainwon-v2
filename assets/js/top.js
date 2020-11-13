/**
 * jQuery.toTop.js v1.1
 * Developed by: MMK Jony
 * Fork on Github: https://github.com/mmkjony/jQuery.toTop
 **/

! function(o) {
    "use strict";
    o.fn.toTop = function(t) {
        var i = this,
            e = o(window),
            s = o("html, body"),
            n = o.extend({
                autohide: !0,
                offset: 420,
                speed: 500,
                position: !0,
                right: 15,
                bottom: 30
            }, t);
        i.css({
            cursor: "pointer"
        }), n.autohide && i.css("display", "none"), n.position && i.css({
            position: "fixed",
            right: n.right,
            bottom: n.bottom
        }), i.click(function() {
            s.animate({
                scrollTop: 0
            }, n.speed)
        }), e.scroll(function() {
            var o = e.scrollTop();
            n.autohide && (o > n.offset ? i.fadeIn(n.speed) : i.fadeOut(n.speed))
        })
    }
}(jQuery);

/** menu **/
var isOpen = false;
function animateShow(){
	$(".menubox").animate({
		height:'162px',
		opacity:'1',
	},300);
}
function animateHide(){
	$(".menubox").animate({
		height:'0px',
		opacity:'0',
	},300);
}


//点击非菜单区域关闭菜单
$('body').on('click',function () {
	if (isOpen) {
		animateHide();
		isOpen = false;
		return;
	}
});


// 点击按钮区打开菜单
$('.menu').on('click',function (e) {
	e.stopPropagation();
	if (isOpen) {
		animateHide();
		isOpen = false;
		return;
	}
	isOpen = true;
	animateShow();
});


//点击菜单区域不能关闭菜单
$(".menubox").on('click',function(e){
	e.stopPropagation();
	if (isOpen)  return;
});


//点击close按钮关闭菜单
$(".menu-close").click(function(){
	if(isOpen){
		animateHide();
		isOpen = false;
		return;
	}
});
