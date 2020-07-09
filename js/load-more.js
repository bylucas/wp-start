jQuery(function ($) {

    $('.post-feed').append('<span class="load-more"></span>');
    var button = $('.post-feed .load-more');
    var page = 2;
    var loading = false;
    var scrollHandling = {
        allow: true,
        reallow: function () {
            scrollHandling.allow = true;
        },
        delay: 400 //(milliseconds) adjust to the highest acceptable value
    };

    $(window).scroll(function () {
        if (!loading && scrollHandling.allow) {
            scrollHandling.allow = false;
            setTimeout(scrollHandling.reallow, scrollHandling.delay);
            var offset = $(button).offset().top - $(window).scrollTop();
            if (3000 > offset) {
                loading = true;
                var data = {
                    action: 'start_ajax_load_more',
                    nonce: startloadmore.nonce,
                    page: page,
                    query: startloadmore.query,
                };
                $.post(startloadmore.url, data, function (res) {
                    if (res.success) {
                        $('.post-feed').append(res.data);
                        $('.post-feed').append(button);
                        page = page + 1;
                        loading = false;
                    } else {
                        //console.log(res);
                    }
                }).fail(function (xhr, textStatus, e) {
                    //console.log(xhr.responseText);
                });

            }
        }
    });
});