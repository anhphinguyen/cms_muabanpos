$(document).ready(function () {
    $('td.product-cat-img').hover(function () {
        // over
        $('.panel-product-cat').css({"display":" block","position":"fixed"});
        var data_img = $(this).attr('data-img');
        var icon = $("td.product-cat-img[data-img='"+data_img+"'] img").attr('src');
        var text = $("td.product-cat-img[data-img='"+data_img+"'] ~ td.product-cat-title").text();
        $("div.product-cat-icon-show img ~ p").css('display','none');
        $("div.product-cat-icon-show img").attr('src',icon);
        $("div.product-cat-text-show h2").html(text);
    }, function () {
        // out
    }
    );
});