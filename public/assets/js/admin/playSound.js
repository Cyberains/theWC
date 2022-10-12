(function ($) {
    $.extend({
        playSound: function () {
            return $(
                '<audio class="sound-player" loop autoplay=true style="display:none;">'
                + '<source src="' + arguments[0] + '" />'
                + '</audio>'
            ).appendTo('.c-wrapper');
        },
        stopSound: function () {
            $(".sound-player").remove();
        }
    });
})(jQuery);
