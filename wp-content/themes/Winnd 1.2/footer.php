<footer id="footer">
    <p>©<a href="<?php bloginfo(’url’); ?>" title="<?php bloginfo(’name’); ?>"><?php bloginfo(’name’); ?></a> 
	   Powered by Wordpress | Theme by <a href="http://lizimu.net" title="子木">子木</a>
    </p>
</footer>

<a class="scrollTop" href="#"></a>

<!-- footer -->

<script type="text/javascript">

jQuery(document).ready(function($) {   
    var old_top = $("#archives").offset().top,   
        _year = parseInt($(".year:first").attr("id").replace("year-", ""));   
    $(".year:first, .year .month:first").addClass("selected");   
    $(".month.monthed").click(function() {   
        var _this = $(this),   
            _id = "#" + _this.attr("id").replace("mont", "arti");   
        if (!_this.hasClass("selected")) {   
            var _stop = $(_id).offset().top - 10,   
                _selected = $(".month.monthed.selected");   
            _selected.removeClass("selected");   
            _this.addClass("selected");   
            $("body, html").scrollTop(_stop)   
        }   
    });   
    $(".year-toogle").click(function(e) {   
        e.preventDefault();   
        var _this = $(this),   
            _thisp = _this.parent();   
        if (!_thisp.hasClass("selected")) {   
            var _selected = $(".year.selected"),   
                _month = _thisp.children("ul").children("li").eq(0);   
            _selected.removeClass("selected");   
            _thisp.addClass("selected");   
            _month.click()   
        }   
    });   
    $(window).scroll(function() {   
        var _this = $(this),   
            _top = _this.scrollTop();   
        if (_top >= old_top + 10) {   
            $(".archive-nav").css({   
                top: 10   
            })   
        } else {   
            $(".archive-nav").css({   
                top: old_top + 10 - _top   
            })   
        }   
        $(".archive-title").each(function() {   
            var _this = $(this),   
                _ooid = _this.attr("id"),   
                _newyear = parseInt(_ooid.replace(/arti-(\d*)-\d*/, "$1")),   
                _offtop = _this.offset().top - 40,   
                _oph = _offtop + _this.height();   
            if (_top >= _offtop && _top < _oph) {   
                if (_newyear != _year) {   
                    $("#year-" + _year).removeClass("selected");   
                    $("#year-" + _newyear).addClass("selected");   
                    _year = _newyear   
                }   
                var _id = _id = "#" + _ooid.replace("arti", "mont"),   
                    _selected = $(".month.monthed.selected");   
                _selected.removeClass("selected");   
                $(_id).addClass("selected")   
            }   
        })   
    })   
});  

$(document).on("click", ".st-tabs .tabs-title a",function(e) {
        e.preventDefault();
        $(this).parents('li').addClass('active').siblings('li.active').removeClass('active');
        var tab_id = $(this).parents('li').index();
        $(this).parents('.st-tabs').find('.tabs-content').eq(tab_id).show().siblings('.tabs-content').hide();
        return false;
    });

	$(window).bind('scroll', function(){
	
		if ($(this).scrollTop() > 230) { $('.scrollTop').show(); } else { $('.scrollTop').hide();}			
 
	});
	
	$('.scrollTop').click(function(e){
		e.stopPropagation();
		$('body,html').animate({scrollTop: 0}, 800);
		return false;
	});
$('.tga').click(function() {
	if ($(this).hasClass('icon-minus')) {
		$(this).removeClass('icon-minus');
		$(this).addClass('icon-plus');
	} else {
		$(this).removeClass('icon-plus');
		$(this).addClass('icon-minus');
	}
	return false;
});
$('.tga').click(function(){$(this).next('.tgb').slideToggle(400)}); 

</script>
</div><!--wrapper -->
<?php wp_footer(); ?>

</body>
</html>