(function($){
    $(document).ready(function($) {
        var $indicators = $('ol.carousel-indicators');
        var linkhash = '';
        var $filtering = $('#ioc-filter-data');
        var $avisos = $('.ioc-front-page .avisos');
        var numavisos = 0;
        var current = 0;
        var nodesavisos;
        var slidingleft = false;
        var slidingright = false;
        var $menu = $('.ioc-menu');
        var $filter = $('.filter-dropdown');

        $('[data-toggle="tooltip"]').tooltip();

        if ($filtering) {
            $filtering.removeClass('hidden');
        }

        if ($indicators) {
            $indicators.removeClass('hidden');
        }

        if ($menu) {
            $menu.css('height', '0');
        }

        if ($filter) {
            var togglefilter = function (node) {
                node.toggleClass('in');
                if (node.hasClass('in')) {
                    $('.filter-elements').attr('aria-hidden', false);
                } else {
                    $('.filter-elements').attr('aria-hidden', true);
                }
            };
            togglefilter($filter);
            $(document).on('click', '.filter-text', function(e) {
                togglefilter($filter);
            });
        }

        $(document).on('shown.bs.modal', '.modal', function(e) {
            $(this).find('[autofocus]').focus();
        });
        $(document).on('shown.bs.collapse', '.form-search', function(e) {
            if (e.currentTarget.id == 'search') {
                $(this).find('[type="search"]').focus();
            }
        });
        $(document).on('show.bs.collapse', '.ioc-menu', function(e) {
            $('header').addClass('bck-displayed');
        });
        $(document).on('hidden.bs.collapse', '.ioc-menu', function(e) {
            $('header').removeClass('bck-displayed');
        });
        $(document).on('shown.bs.collapse', '.ioc-menu', function(e) {
            $('.social, .ioc-languages').addClass('bck-displayed');
        });
        $(document).on('hide.bs.collapse', '.ioc-menu', function(e) {
            $('.social, .ioc-languages').removeClass('bck-displayed');
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
        $( window ).resize(function() {
            var $header = $('header');
            //var $menu = $('.ioc-menu');
            if ($(this).width() > 767 && $header.hasClass('bck-displayed')) {
                $header.removeClass('bck-displayed');
                $('.social, .ioc-languages').removeClass('bck-displayed');
            } else {
                if ($menu.hasClass('in') && $(this).width() < 768 && !$header.hasClass('bck-displayed')) {
                    $header.addClass('bck-displayed');
                    $('.social, .ioc-languages').addClass('bck-displayed');
                }
            }
        });
        $.ajax({
            url: '/campus/local/loggedinas.php',
            success: function(responseText){
                if (responseText){
                    if (responseText.length > 20){
                        responseText = responseText.substr(0,20) + '...';
                    }
                    $(".login-text").text(responseText);
                    $(".login-campus").attr('data-target', '').on('click', function() {window.location ='/campus/my';});
                    $(".login-clone-campus").attr('data-target', '').on('click', function() {window.location ='/campus/my';});
                    $(".tiny-clone-campus button").attr('data-target', '').on('click', function() {window.location ='/campus/my';});
                    $(".login-campus-mobile button").attr('title', responseText).attr('data-target', '').on('click', function() {window.location ='/campus/my';});
                }
            }
        });
        $(document).on('show.bs.collapse', '#collapse-tabs .panel-collapse', function (e) {
            $(e.currentTarget).closest('.panel').siblings().find('.panel-collapse').collapse('hide');

        });
        $(document).on('show.bs.collapse', '#footer-collapse .panel-collapse', function (e) {
            $('#footer-collapse').find('.panel-collapse').not(e.currentTarget).collapse('hide');

        });
        $(document).on('click', 'a', function(e) {
            $('.back-to-top').attr('href', '#');
        });
        $(document).on('click', '.study-buttons a[href*=#], .study-tabs .tab-content a[href*=#]', function(e) {
            e.preventDefault();
            linkhash = $(this).prop('hash');
            gotopanel(linkhash);
            if ($(this).closest('.study-tabs').length) {
                $('.back-to-top').attr('href', $('#tabs > li.active a').attr('href'));
                //$('.back-to-top span').removeClass('glyphicon-chevron-up').addClass('glyphicon-link');
            }
        });
        $(document).on('click', '#collapse-tabs .panel-title a[href*=#], #panel-sections .panel-title a[href*=#]', function(e) {
            e.preventDefault();
            linkhash = $(this).prop('hash');
        });
        $(document).on('shown.bs.collapse', '#collapse-other-info, #collapse-tabs, #panel-sections', function(e) {
            var position = $(linkhash).position();
            if (position) {
                $("html, body").animate({ scrollTop: position.top - 105}, 800);
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
            if (linkhash == '#matricula') {
                var position = $(linkhash).position();
                $("html, body").animate({ scrollTop: position.top}, 800);
            }
            if (!$('#collapse-more-info').hasClass('in') || !$(linkhash).hasClass('in')) {
                if (!$('#collapse-more-info').hasClass('in')) {
                    $('#collapse-other-info > .panel > .panel-heading a').trigger('click');
                }
                if (!$(linkhash).hasClass('in')) {
                    $('#panel-sections a[href="' + linkhash +'"]').trigger('click');
                }
            } else {
                var position = $(linkhash).position();
                $("html, body").animate({ scrollTop: position.top - 105}, 800);
            }
        };
        if ( $(document.location.hash).length ) {
            gotopanel(document.location.hash);
        }
        if ($('.avisos')) {
            $('.avisos').addClass('display');
        }
        var showavisos = function () {
            var next = ((current + 1) > numavisos - 1) ? 0 : current + 1;
            var prev = ((current - 1) < 0) ? numavisos - 1 : current - 1;

            if (current == 0) {
                $avisos.find('.prev').hide();
                $('.login-campus').addClass('first');
            } else {
                $avisos.find('.prev').show();
                $('.login-campus').removeClass('first');
            }
            $avisos.find('.prev div').remove();
            $avisos.find('.next div').remove();
            $(nodesavisos[prev]).appendTo($avisos.find('.prev'));
            $(nodesavisos[next]).appendTo($avisos.find('.next'));
        };
        if ($avisos) {
            nodesavisos = $avisos.find('.next div').detach();
            numavisos = nodesavisos.length;
            showavisos();
        }
        $('#myCarousel').on('slid.bs.carousel', function () {
            if (slidingleft) {
                current = ((current - 1) < 0) ? numavisos - 1 : current - 1;
                slidingleft = false;
            } else if (slidingright) {
                current = ((current + 1) > numavisos - 1) ? 0 : current + 1;
                slidingright = false;
            }
            showavisos();
        });
        $(document).on('click', '.carousel-control.left, .avisos .prev', function(e) {
            slidingleft = true;
        });
        $(document).on('click', '.carousel-control.right, .avisos .next', function(e) {
            slidingright = true;
        });
        $(document).on('click', '.carousel-indicators li', function(e) {
            current = parseInt($(this).data('slide-to'), 10);
        });

        $(document).on('click', '#header .navbar-toggle', function(e) {
            $(this).toggleClass('open');
        });
    });
})(jQuery);