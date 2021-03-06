jQuery(function($) {
    $('#theme-selector').on('click',
    function(event) {
        event.preventDefault();
        $('#templates-wrapper').slideToggle(300);
        $('body').toggleClass('popup-open');
        $(this).toggleClass('active');
    });
    $('.popup-overlay').on('click',
    function(event) {
        event.preventDefault();
        $('#templates-wrapper').slideUp(300);
        $('body').removeClass('popup-open');
        $('#theme-selector').removeClass('active');
    });
    $('#demoframe').css('height', $(window).height() - 60);
    $('#demoframe').css('width', $(window).width());
    $(window).on('resize',
    function() {
        $('#demoframe').css({
            'height': $(window).height() - 60,
            'width': $(window).width(),
            'margin-top': 60
        });
        $('#demoframe').removeAttr('class');
        $('#responsive>a').removeClass('active');
        $('#responsive>#desktop').addClass('active');
    });

    $(document).on('click', '.demo-link',
    function(event) {
        event.preventDefault();
        var template_title = $(this).closest('.template-item').find('.template-title').clone().children().remove().end().text();
        $('.template-item.active').removeClass('active');
        $(this).closest('.template-item').addClass('active');
        window.history.replaceState("", "", $(this).closest('.template-item').data('slug'));
        $('.btn-purchase').attr('href', $(this).data('dlsrc'));
        $('#templates-wrapper').slideUp(300);
        $('body').removeClass('popup-open');
        $('#theme-selector').removeClass('active');
        document.title = template_title + ' - 在线演示 | 前端特效网';
        $('.theme-name').text(template_title);
        $('#demoframe > iframe').removeAttr('src').attr('src', $(this).data('demosrc'));
        $(document.body).addClass('loading');
        $(document.body).prepend('<div class="preloader"><div></div></div>');
    });

    $('#desktop').on('click',
    function(event) {
        event.preventDefault();
        $('#responsive>a').removeClass('active');
        $(this).addClass('active');
        $('#demoframe').removeAttr('class').css({
            'margin-top': 60,
            'width': $(window).width(),
            'height': $(window).height() - 51
        });
    });
    $('#tablet-landscape').on('click',
    function(event) {
        event.preventDefault();
        $('#responsive>a').removeClass('active');
        $(this).addClass('active');
        $('#demoframe').removeAttr('class').addClass('tablet-landscape').css({
            'margin-top': 60,
            'width': 1024,
            'height': $(window).height() - 51
        });
    });
    $('#tablet-portrait').on('click',
    function(event) {
        event.preventDefault();
        $('#responsive>a').removeClass('active');
        $(this).addClass('active');
        $('#demoframe').removeAttr('class').addClass('tablet-portrait').css({
            'margin-top': 60,
            'width': 768,
            'height': $(window).height() - 51
        });
    });
    $('#phone-landscape').on('click',
    function(event) {
        event.preventDefault();
        $('#responsive>a').removeClass('active');
        $(this).addClass('active');
        $('#demoframe').removeAttr('class').addClass('phone-landscape').css({
            'margin-top': 160,
            'width': 760,
            'height': 392
        });
    });
    $('#phone-portrait').on('click',
    function(event) {
        event.preventDefault();
        $('#responsive>a').removeClass('active');
        $(this).addClass('active');
        $('#demoframe').removeAttr('class').addClass('phone-portrait').css({
            'margin-top': 110,
            'width': 392,
            'height': 760
        });
    });
    $('#remove-frame').on('click',
    function(event) {
        event.preventDefault();
        var demo = $("#demoframe > iframe").attr('src');
        window.location = demo;
    });
    $(document).on('click', '.controls>ul>li:not(".control-nav")>a',
    function(event) {
        event.preventDefault();
        var curIndex, prev_index;
        if ($(this).parent().hasClass('active')) {
            return;
        }
        curIndex = $(this).parent().data('index');
        $('.controls>ul>li').removeClass('active');
        $(this).parent().addClass('active');
        $('.demo-list').find('>.active').fadeOut(300).promise().done(function() {
            $(this).removeClass('active');
            prev_index = $(this).index();
            $('.demo-list').find('>.row').eq(curIndex - 1).addClass('active').hide();
            $('.demo-list').find('>.active').find('.img-responsive').each(function() {
                $(this).attr('src', $(this).data('src'));
            });
            $('.demo-list').find('>.active').fadeIn(300);
        });
    });
    $(document).on('click', '.controls>ul>li.prev>a',
    function(event) {
        event.preventDefault();
        var prev_index = $('.controls>ul').find('>li.active').data('index');
        if (prev_index != 1 && prev_index != $('.controls>ul>li:not(".control-nav")').length + 1) {
            $('.controls>ul>li').removeClass('active');
            $('.controls>ul>li').eq(prev_index - 1).addClass('active');
            $('.demo-list').find('>.active').fadeOut(300).promise().done(function() {
                $(this).removeClass('active');
                prev_index = $(this).index();
                $('.demo-list').find('>.row').eq(prev_index - 1).addClass('active').hide();
                $('.demo-list').find('>.active').find('.img-responsive').each(function() {
                    $(this).attr('src', $(this).data('src'));
                });
                $('.demo-list').find('>.active').fadeIn(300);
            });
        }
    });
    $(document).on('click', '.controls>ul>li.next>a',
    function(event) {
        event.preventDefault();
        var prev_index = $('.controls>ul').find('>li.active').data('index');
        if (prev_index != 0 && prev_index != $('.controls>ul>li:not(".control-nav")').length) {
            $('.controls>ul>li').removeClass('active');
            $('.controls>ul>li').eq(prev_index + 1).addClass('active');
            $('.demo-list').find('>.active').fadeOut(300).promise().done(function() {
                $(this).removeClass('active');
                prev_index = $(this).index();
                $('.demo-list').find('>.row').eq(prev_index + 1).addClass('active').hide();
                $('.demo-list').find('>.active').find('.img-responsive').each(function() {
                    $(this).attr('src', $(this).data('src'));
                });
                $('.demo-list').find('>.active').fadeIn(300);
            });
        }
    });
    $('#demoframe > iframe').on('load',
    function() {
        $(document.body).removeClass('loading');
        $(document.body).find('.preloader').remove();
    });
});
