jQuery(function ($) {
    function hotdiscussResize(width) {
        if (width > 1279) {
            $('.hot-discuss,.hot-discuss-c2').show();
            $('.hot-discuss-c1,.sch-co02 .bbs-news-list').removeAttr('style');
        }
        else if (width < 1280 && width > 1168) {
            $('.hot-discuss').show();
            $('.hot-discuss-c2').hide();
            $('.hot-discuss-c1').css({
                float: 'none',
                margin: '0 auto',
                width: '140px'
            });
            $('.sch-co02 .bbs-news-list').removeAttr('style');
        }
        else if (width < 1169) {
            $('.hot-discuss').hide();
            $('.sch-co02 .bbs-news-list').css({
                float: 'none',
                margin: '0 auto'
            });
        }
    }
    $(function () {
        var w = $('#wp').width();
        hotdiscussResize(w);
    })
    $('#widthauto-btn').click(function () {
        setTimeout(function () {
            var w = $('#wp').width();
            hotdiscussResize(w);
        }, 50)
    })
    $(window).resize(function () {
        var w = $('#wp').width();
        hotdiscussResize(w);
    })
})