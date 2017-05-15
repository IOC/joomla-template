(function($){
    $(document).ready(function($){
        var $indicators = $('ol.carousel-indicators');
        var $moreinfo = $('#collapse-more-info');
        var linkhash = '';
        var $filtering = $('#ioc-filter-data');

        $('[data-toggle="tooltip"]').tooltip();

        if ($filtering) {
            $filtering.removeClass('hidden');
        }

        if ($indicators) {
            $indicators.removeClass('hidden');
        }

        // Hide content from more info panel.
        if ($moreinfo) {
            $moreinfo.removeClass('in');
        }

        $(document).on('shown.bs.modal', '.modal', function(e) {
            $(this).find('[autofocus]').focus();
        });
        $(document).on('shown.bs.collapse', '.form-search', function(e) {
            if (e.currentTarget.id == 'search') {
                $(this).find('[type="search"]').focus();
            }
        });
        $(document).on('click', '.btn-reset-search', function(e) {
            $('#mod-search-searchword').val('');
            $('#mod-search-searchword').focus();
        });
        $(document).on('click', '.panel-heading a', function(e) {
            $('.panel-heading').removeClass('active');
            var $parent = $(this).parent().parent();
            if ($parent.siblings('.panel-collapse').attr('aria-expanded') == 'true') {
                $parent.addClass('active');
            }
        });
        $(window).scroll(function() {
            if ($(this).scrollTop() > 220) {
                $('#search').removeClass('search-top');
            } else {
                $('#search').addClass('search-top');
            }
        });
        $.ajax({
            url: '/campus/local/loggedinas.php',
            success: function(responseText){
                if (responseText){
                    if (responseText.length > 20){
                        responseText = responseText.substr(0,20) + '...';
                    }
                    $("#login-text").text(responseText);
                    $("#frm-login-campus button").attr('data-target', '').on('click', function() {window.location ='/campus/my';});
                    $("#frm-login-campus-mobile button").attr('title', responseText).attr('data-target', '').on('click', function() {window.location ='/campus/my';});
                }
            }
        });
        $(document).on('show.bs.collapse', '.panel-collapse', function (e) {
            $(e.currentTarget).closest('.panel').siblings().find('.panel-collapse').collapse('hide');
        });
        $(document).on('click', 'a', function(e) {
            $('.back-to-top').attr('href', '#');
            $('.back-to-top span').removeClass('glyphicon-link').addClass('glyphicon-chevron-up');
        });
        $(document).on('click', '.study-term a[href*=#], .study-tabs .tab-content a[href*=#]', function(e) {
            e.preventDefault();
            linkhash = $(this).prop('hash');
            gotopanel(linkhash);
            if ($(this).closest('.study-tabs').length) {
                $('.back-to-top').attr('href', $('#tabs > li.active a').attr('href'));
                $('.back-to-top span').removeClass('glyphicon-chevron-up').addClass('glyphicon-link');
            }
        });
        $(document).on('click', '#panel-sections .panel-title a[href*=#]', function(e) {
            e.preventDefault();
            linkhash = $(this).prop('hash');
        });
        $(document).on('shown.bs.collapse', '#collapse-other-info, #panel-sections', function(e) {
            var position = $(linkhash).position();
            if (position) {
                $("html, body").animate({ scrollTop: position.top }, 800);
            }
            linkhash = '';
        });
        $(document).on('click', '#ioc-filter-data li', function(e) {
            e.preventDefault();
            var keyword = $(this).data("meta-keyword");
            $(this).siblings().removeClass('ioc-keyword-selected');
            $(this).toggleClass('ioc-keyword-selected');
            if ($(this).hasClass('ioc-keyword-selected') && keyword) {
                var $nodes = $('.substudies .nav.navbar-nav');
                var $selected = $nodes.find("li[data-meta-keyword='" + keyword + "']");
                $nodes.find('li').not($selected).hide(800, function(){
                    $selected.show(800);
                });
            } else {
                $('.substudies .nav.navbar-nav li').show(800);
            }
        });
        var gotopanel = function (linkhash) {
            window.location.hash = linkhash;
            if (!$('#collapse-more-info').hasClass('in') || !$(linkhash).hasClass('in')) {
                if (!$('#collapse-more-info').hasClass('in')) {
                    $('#collapse-other-info > .panel > .panel-heading a').trigger('click');
                }
                if (!$(linkhash).hasClass('in')) {
                    $('#panel-sections a[href="' + linkhash +'"]').trigger('click');
                }
            } else {
                var position = $(linkhash).position();
                $("html, body").animate({ scrollTop: position.top }, 800);
            }
        };
        if ( $(document.location.hash).length ) {
            gotopanel(document.location.hash);
        }
    });
})(jQuery);