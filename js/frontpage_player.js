(function ($, Drupal) {
    Drupal.behaviors.wistiaFrontpageBehavior = {
        attach: function (context, settings) {
            window._wq = window._wq || [];
            // console.log('test123');
            _wq.push({
                id: settings.frontpage_hid,
                options: {
                    playerColor: "000000",
                    autoPlay: false,
                    controlsVisibleOnLoad: true,
                    playlistLoop: false,
                    volume: 0,
                    volumeControl: true,
                    playbar: false,
                    playButton: false,
                    playbackRateControl: false,
                    smallPlayButton: false
                },
                onReady: function(video) {
                    console.log("I got a handle to the video!", video);
                    //video.addToPlaylist("awvzl4xbx8", { playerColor: "00ff00" });
                    var VideoDuration = video.duration();
                    var DateNowInSec = Date.now()/1000;
                    var TimesPlayedSinceInception = DateNowInSec/VideoDuration;
                    var WhereFraction = TimesPlayedSinceInception - Math.floor(TimesPlayedSinceInception)
                    var VideoStartHere = VideoDuration * WhereFraction;
                    video.time(VideoStartHere);
                    // video.play();
                    var NextVideo = video.hashedId();
                    video.bind("end", function(t) {
                        console.log("the video ended here");
                        video.addToPlaylist(NextVideo, { playerColor: "00ff00" });
                });
            }});
            // window.wistiaInit = function(W) {
            //     W.options({ playerColor: "ffffff" });
            // };

        }
    };
})(jQuery, Drupal);

