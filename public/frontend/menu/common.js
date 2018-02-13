$(document).ready(function(){
   $(".dm-sp-home ul.block_category").addClass("menu_slim_1 f_submenu_list"); 
});
$(document).ready(function(){
   $(".dm-sp-home ul.block_category li ul").addClass("f_menu_sub_2"); 
});
$(document).ready(function(){
 $('.menu_slim_1').slimScroll({
	height: '340px'
});
$(document).ready(function(){
       var i = 0;
       $('ul.block_dm_tc').find('li').each(function(){
            if(i < 9){
                i++;
            }
            else{
                i = 1;
            }
            $(this).addClass('item-block-' + i);
       });
        
    });

$(".hmb_content").hover(function(){
	clearTimeout(time_menu);
	$(".f_menu_2").show();
 $(this).addClass("hmb_content_acive");
},function(){
	time_menu  = setTimeout(function(){
		$(".f_menu_2").hide();
	$(".hmb_content").removeClass("hmb_content_acive");
		$('.f_menu_item').removeClass('f_menu_list_active');
	},200);
});
	$(".f_menu_2").hover(function(){
		clearTimeout(time_menu);
	},function(){
		time_menu  = setTimeout(function(){
			$(".f_menu_2").hide();
		$(".hmb_content").removeClass("hmb_content_acive");
			$('.f_menu_item').removeClass('f_menu_list_active');
		},200);
	});


	$(".f_menu_item").hover(function(){
		$('.f_menu_item').removeClass('f_menu_list_active');
		$(this).addClass("f_menu_list_active");
		$(this).find('.f_menu_sub').show();
	},function(){
		$(".f_menu_sub").hide();
		$('.f_menu_item').removeClass('f_menu_list_active');
	});
	$(".f_submenu_list > li").hover(function(){
		$('.f_menu_list_active_2').removeClass('f_menu_list_active_2');
		$(this).addClass("f_menu_list_active_2");
		$(this).find('.f_menu_sub_2').show();
	},function(){
		$(".f_menu_sub_2").hide();
		$('.f_menu_list_active_2').removeClass('f_menu_list_active_2');
	});
	$(".f_submenu_list_2 li a").hover(function(){
		$('.f_menu_item_active_3').removeClass('f_menu_item_active_3');
		$(this).addClass("f_menu_item_active_3");
	},function(){
		$('.f_menu_item_active_3').removeClass('f_menu_item_active_3');
	});
    
});
$(document).ready(function(){
    $(".sp-hot").insertBefore($(".combo")); 
});
$("#slider-top1").andSelf().add("#sp-hot")
          .wrapAll("<div class='slider-sp-hot'></div>");
          

