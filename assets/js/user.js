var userisOpen = false;
function userShow(){
	$(".userinformation").animate({
		opacity:'1',
	},300);
}
function userHide(){
	$(".userinformation").animate({
		opacity:'0',
	},300);
}

//点击非菜单区域关闭菜单
$('body').on('click',function () {
	if (userisOpen) {
		userHide();
		userisOpen = false;
		return;
	}
});


// 点击头像区打开菜单
$('.useravatar').on('click',function (ue) {
	ue.stopPropagation();
	if (userisOpen) {
		userHide();
		userisOpen = false;
		return;
	}
	userisOpen = true;
	userShow();
});


//点击菜单区域不能关闭菜单
$(".useravatar").on('click',function(ue){
	ue.stopPropagation();
	if (userisOpen)  return;
});
