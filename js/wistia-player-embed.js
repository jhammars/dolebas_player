(function ($, Drupal) {
    Drupal.behaviors.wistiaUploadBehavior = {
        attach: function (context, settings) {
            window._wq = window._wq || [];
            console.log('test123');
            _wq.push({ id: settings.video_hid, onReady: function(video) {
                console.log("I got a handle to the video!", video);
            }});
            window.wistiaInit = function(W) {
                W.options({ playerColor: "ff0000" });
            };
        }
    };
})(jQuery, Drupal);