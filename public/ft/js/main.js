(function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
    a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

jQuery(window).load(function () {

});

jQuery(document).ready(function ($) {
    ga('create', 'UA-61566700-2', 'auto');
    ga('send', 'pageview');
    $('.img-products-lazy').each(function () {
        var loadImage = $(this).attr('data-src');
        $(this).attr('data-src', $(this).attr('src'));
        $(this).attr('src', loadImage);
    });
    $('.products-image a img').unveil(200, function () {
        $(this).load(function () {
            this.style.opacity = 1;
        });
    });
    if ($('body.body-mobile').length) {
        $('#main-menu').mmenu({});

    }
    $('.categories-menu-list ul li a').bind('click',function(e){
        var label = $(this).text();
        ga('send', 'event', {
            'eventCategory': 'Danh mục sản phẩm',
            'eventAction': 'Bấm vào danh mục',
            'eventLabel': label
        });
    });

});
