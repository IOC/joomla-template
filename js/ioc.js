(function($){
    $(document).ready(function($){
        var $indicators = $('ol.carousel-indicators');
        var $moreinfo = $('#collapse-more-info');
        var linkhash = '';

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

        $(document).on('click', '.study-term a[href*=#], .study-tabs .tab-content a[href*=#]', function(e) {
            e.preventDefault();
            linkhash = $(this).prop('hash');
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
    });
})(jQuery);