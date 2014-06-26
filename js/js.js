document.createElement('header');
document.createElement('nav');
document.createElement('section');
document.createElement('article');
document.createElement('aside');
document.createElement('footer');

$(function () {
    $('.popup-button').click(function(){
        $("#contact-form").trigger("submit");
        console.log($("#contact-form"));
    });

    var sliderIndex = 1;
    var slide = ['air-bg', 'summer-bg', '']

    $('.question a').click(function () {
        $('#popup1, .black-bg').show();
        return false
    });
    $('.price-work a').click(function () {
        $('#popup2, .black-bg').show();
        return false
    });
    $('.scheme .close').click(function () {
        $(this).parents('.scheme').hide();
        $('.black-bg').hide();
    });
    $('.popup .close').click(function () {
        $(this).parents('.popup').hide();
        $('.black-bg').hide();
    });
    /*
    $('.adress a').click(function () {
        $('.scheme').show();
        return false
    })
    */
    if ($.browser.msie && $.browser.version == '8.0') {
        $('body').addClass('ie')
    }

    var animationInProgress = false;

    if ($('.slider').length) {
        $('.bottom-text').hide().eq(0).show();
        $('.prev').click(function () {
            if (animationInProgress) return;
            var slid = parseInt($('.slid').css('margin-left'));
            if (slid == 0) return;
            slid += 650;
            sliderIndex--;
            animationInProgress = true;
            $('.slid').animate({
                    'margin-left': slid
                }, 500,
                function () {
                    animationInProgress = false;
                }
            );
            $('.slider-wrap nav a.active').removeClass('active')
                .prev()
                .addClass('active');
            $('#main header').attr('class', slide[sliderIndex - 1]);
            $('.bottom-text').hide().eq(sliderIndex - 1).show();
        });

        $('.next').click(function () {
            if (animationInProgress) return;
            var slid = parseInt($('.slid').css('margin-left'));
            if (slid == -1300) return;
            slid -= 650;
            sliderIndex++;
            animationInProgress = true;
            $('.slid').animate({
                    'margin-left': slid
                }, 500,
                function () {
                    animationInProgress = false;
                }
            );
            $('.slider-wrap nav a.active').removeClass('active')
                .next()
                .addClass('active');

            $('#main header').attr('class', slide[sliderIndex - 1]);
            $('.bottom-text').hide().eq(sliderIndex - 1).show();

        });
        $('.slider-wrap nav a').click(function () {
            var index = $(this).attr('index');
            var left = 650 * index;
            $('.slider-wrap nav a').removeClass('active');
            $(this).addClass('active');
            $('.slid').animate({'margin-left': -left}, 500);

            sliderIndex = index * 1 + 1;

            $('#main header').attr('class', slide[sliderIndex - 1]);
            $('.bottom-text').hide().eq(sliderIndex - 1).show();

            return false
        });
    }

    if ($('.photo-slider-wrap').length) {
        $('.slider-top').click(function () {
            var parent = $(this).parent();
            var slid = parseInt($('.photo-block', parent).css('margin-top'));
            if (slid == 0) return;
            slid += 93;
            $('.photo-block', parent).animate({'margin-top': slid}, 500);
            /*$('a.active', parent).removeClass('active')
             .prev()
             .addClass('active');*/
        });
        $('.slider-bottom').click(function () {
            var parent = $(this).parent();
            var slid = parseInt($('.photo-block', parent).css('margin-top'));
            var length = parseInt($('.photo-block a', parent).length / 3) - 3;
            if (slid == -(93 * length)) {
                console.log(slid);
            }
            slid -= 93;
            $('.photo-block', parent).animate({'margin-top': slid}, 500);
            /*$('a.active', parent).removeClass('active')
             .next()
             .addClass('active');*/
        });

        $('.arrow-next').click(function () {
            var parent = $(this).parent();

            if (!$('a.active', parent).next().length) return false

            $('a.active', parent).removeClass('active')
                .next()
                .addClass('active');

            $('.slider-big-img img', parent).attr('src', $('a.active', parent).attr('href'));

            return false;
        });
        $('.arrow-prev').click(function () {
            var parent = $(this).parent();

            if (!$('a.active', parent).prev().length) return false

            $('a.active', parent).removeClass('active')
                .prev()
                .addClass('active');

            $('.slider-big-img img', parent).attr('src', $('a.active', parent).attr('href'));

            return false;
        });


        $('.photo-slider a').click(function () {
            var parent = $(this).parents('.photo-slider-wrap');

            $('a.active', parent).removeClass('active');
            $(this).addClass('active');
            $('.slider-big-img img', parent).attr('src', $(this).attr('href'));

            return false;
        })

    }

    $('.popup').each(function () {
        var left = $(window).width() / 2 - ($(this).width() / 2)
        $(this).css('left', left)
    });

    $('.top').click(function () {
        $.scrollTo('0', 500);
    });

    $('.prog-button').click(function () {
        $('#popup2, .black-bg').show();
        return false
    });

    $('.video').click(function(){
        var idx = $(this).index();
        $(".videoFrame").hide().eq(idx - 1).show();

            var parent = $(this).parents('.photo-slider-wrap');

            $('a.active', parent).removeClass('active');
            $(this).addClass('active');
            $('.slider-big-img img', parent).attr('src', $(this).attr('href'));

    })
});
