jQuery.ready(function($){
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
}(jQuery));