$(document).ready(function(){
	$(".btn-readmore").click(function() {
		var src = $(this).attr('data-src');
		var title = $(this).attr('title');
		$('#myModalLabel a').attr('href',src);
		$('#myModalLabel a').text(title);
		$('#myModal .modal-body').load(src+' #entry');
		$('#myModalBtn').attr('href',src+'#comment-title');
		$(".progress-bar").css('width','0%');
	});
	$('#myModal').on('show.bs.modal', function (e) {
		$('#myModal .modal-body').html('');
	});
	$('#myModal').on('shown.bs.modal', function (e) {
		$(".progress-bar").animate({width:"100%"},4000);
	});
	$("#search .input-group-addon").click(function() {
		$("#search").submit();
	});
});
function siteLoading(){
	$(".progress-bar").animate({width:"100%"},4000);
	//setTimeout('LoadingHidden()', 5000);
};
function LoadingHidden() {
	$("#loading").fadeOut();
};

//内容页导航
$(function(){
	$.fn.scrollToTop2=function(){
		var scrollDiv2=$(this);
		$(window).scroll(function(){
			if($(window).scrollTop()<"900"){
				$(scrollDiv2).removeClass("navbar-fixed-top")
			}else{
				$(scrollDiv2).addClass("navbar-fixed-top")
			}
		});
	}
});
$(function() {
	$("#navbar-spy").scrollToTop2();
});

//平滑滚动到锚点
$(".pro-con-nav li a").click(function() {
        var gotop = $($(this).attr("href")).offset().top-80;
        $("html, body").animate({
            scrollTop: gotop + "px"
        }, {
            duration: 500,
            easing: "swing"
        });
        return false;
    });