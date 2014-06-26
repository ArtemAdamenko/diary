$(function () {
    var html = '<div class="reviews-slide">';

    var j = 0;
    for (var i in reviews) {
        html += '<div index="' + reviews[i].id + '" class="reviews-block ' + (j == 0 ? 'active' : '') + '">'
            + '<img width="128" height="176" src="' + (imgPath + reviews[i].img) + '" alt="">'
            + '<div class="reviews-text">'
            + '<h4>' + reviews[i].name + '</h4>'
            + '<p>' + reviews[i].body + '</p>'
            + '</div>'
            + '</div>'
        j++
    }
    html += '</div>';
    $('.reviews h2').after(html);
    $('.amount-reviews').html('<span>1</span> / ' + countComment + ' отзывов')

    if ($('.reviews-prev').length) {
        $('.reviews-prev').click(function () {
            if ($('.reviews-block.active').attr('index') == '1') return false

            $('.reviews-block.active').removeClass('active')
                .prev()
                .addClass('active');
            $('.reviews-slide').animate({'opacity':0}, 300, function () {
                var top = -183 * ($('.reviews-block.active').attr('index') * 1 - 1);
                $('.reviews-block').css('top', top);
                $('.reviews-slide').animate({'opacity':1}, 500)
            })
            $('.amount-reviews span').html($('.reviews-block.active').attr('index'))

            return false
        });
        $('.reviews-next').click(function () {
            if ($('.reviews-block.active').attr('index') == countComment) return false

            $('.reviews-block.active').removeClass('active')
                .next()
                .addClass('active');
            $('.reviews-slide').animate({'opacity':0}, 300, function () {
                var top = -183 * ($('.reviews-block.active').attr('index') * 1 - 1);
                $('.reviews-block').css('top', top);
                $('.reviews-slide').animate({'opacity':1}, 500)
            })
            $('.amount-reviews span').html($('.reviews-block.active').attr('index'))

            return false
        });
    }
});