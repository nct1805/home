function render_html_products(data, type, key){
    var length  = data.length;
    var html = '';
    if(length > 0){
        for(var i=0;i<length;i++){   
            var get_date = data[i]['created_at'].split(' ');
            var date = get_date[0].split('-');
            var day = date[2];
            var month = date[1];
            var year = date[0];
            var strDate = day+'/'+month+'/'+year;
            var price = data[i]['price'].toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") + "đ";
            var id = data[i]['id'];
            var alias = data[i]['alias'];
            var image = data[i]['image'];
            var name = data[i]['name'];
            var shop_name = data[i]['shop_name'];
            html += '<figure class="item-product">';
            html += '<div class="box-item">';
            html += '<a href="https://www.5giay.vn/threads/'+alias+'.'+id+'">';
            html += '<picture>';
            html += '<source media="(max-width: 1199px)" srcset="public/uploads/san-pham/'+image+'">';
            html += '<source media="(min-width: 1200px)" srcset="public/uploads/san-pham/'+image+'">';
            html += '<img class="lazyload img-responsive image-default" src="public/uploads/san-pham/'+image+'" alt="#">';
            html += '</picture><picture>';
            html += '<source media="(max-width: 1199px)" srcset="public/uploads/san-pham/'+image+'">';
            html += '<source media="(min-width: 1200px)" srcset="public/uploads/san-pham/'+image+'">';
            html += '<img class="img-responsive image-hover" src="public/uploads/san-pham/'+image+'" alt="#">';
            html += '</picture></a></div>';
            html += '<figcaption>';
            html += '<div class="home-store">'+shop_name+'</div>';
            html += '<div class="date">'+strDate+'</div>';
            html += '<h2 class="title_h2"><a href="#">'+name+'</a></h2>';
            html += '<div class="price"><i class="fa fa-tags"></i>'+price+'đ</div>';
            html += '</figcaption></figure>';
        }
        if(type == 'html')
            $('#list_product_'+key).html(html);
        else
            $('#list_product_'+key).append(html);
    }
}
$(document).ready(function(){
    $('.category_2').on('click', function(e){
        e.preventDefault();
        var cate_id = $(this).data('cate'); 
        var type = $(this).data('type'); 
        var key     = $(this).data('key'); 
		
        $.ajax({
            type : "get",
            dataType : "json", //parse json
            url : "get_product_by_cate_ajax/"+cate_id+"/"+type,
            success : function( data )
            {
                render_html_products(data['products'], 'html', key);
                
                $('#total_page_'+key).val(data['total_page']);
                $('#page_'+key).val(3);
				if(data['total_page'] == 1)
					$('.btn_load_more_'+key).hide();
				else
					$('.btn_load_more_'+key).show();
				
				if(type == 2)
					$('#cate_id_'+key).val(cate_id);
				else
					$('#cate_id_'+key).val(0);
            }
        });
    });
    
    $('.lear_more').on('click', function(){
        var key = $(this).data('key');
        var page = parseInt($('#page_'+key).val());
        var cate_id = $(this).data('cate');
        var cate_2_id = $('#cate_id_'+key).val();
        var total_page = $('#total_page_'+key).val();
        if(page == total_page)
            $(this).hide();
        $.ajax({
            type : "get",
            dataType : "json",
            url : "get_product_ajax/"+page+"/"+cate_id+"/"+cate_2_id,
            success : function( data )
            {
                render_html_products(data, 'append', key);
                page+=1;
                if(data.length > 0)
                    $('#page_'+key).val(page);
            }
        });
    });
    
    $('.redirect_detail').on('click', function(){
        var product_id = $(this).data('id');
        var alias = $(this).data('alias');
		var url = url_5giay+'/'+'threads'+alias+'.'+product_id;
        $.ajax({
            type : "get",
            dataType : "json",
            url : "push_array_cookie/"+product_id,
            success : function( data )
            {
				window.location.href = url;
            }
        });
    });
	
	//backt-to-top
    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            $('.back-top-btn').fadeIn();
        } else {
            $('.back-top-btn').fadeOut();
        }
    });
    $('.back-top-btn').click(function(event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, 300);
    });
});
