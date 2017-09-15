
window._wq = window._wq || [];
_wq.push({ id: "_all", onReady: function(video) {}});  


// (function ($, Drupal) {
//     Drupal.behaviors.wistiaFrontpageBehavior = {
//         attach: function (context, settings) {
            
            // var current_video = drupalSettings.frontpage_hid;
            
            // function myFunction(my_new_video) {
            //     console.log("myFunction called update");
            //     my_first_video = my_new_video;
            // }
            
            // function myPause() {
            //     video.pause();
            // };
            
            // window._wq = window._wq || [];
            // // console.log('test123');
            // _wq.push({
            //     id: previous_video, //settings.frontpage_hid,
            //     options: {
            //         playerColor: "000000",
            //         autoPlay: false,
            //         controlsVisibleOnLoad: true,
            //         playlistLoop: false,
            //         volume: 0,
            //         volumeControl: true,
            //         playbar: false,
            //         playButton: false,
            //         playbackRateControl: false,
            //         smallPlayButton: false
            //     },
            //     onReady: function(video) {
            //         console.log("I got a handle to the video!", video);
            //         //video.addToPlaylist("awvzl4xbx8", { playerColor: "00ff00" });
            //         var VideoDuration = video.duration();
            //         var DateNowInSec = Date.now()/1000;
            //         var TimesPlayedSinceInception = DateNowInSec/VideoDuration;
            //         var WhereFraction = TimesPlayedSinceInception - Math.floor(TimesPlayedSinceInception)
            //         var VideoStartHere = VideoDuration * WhereFraction;
            //         video.time(VideoStartHere);
            //         // video.play();
            //         var NextVideo = video.hashedId();
            //         video.bind("end", function(t) {
            //             console.log("the video ended here");
            //             video.addToPlaylist(NextVideo, { playerColor: "00ff00" });
            //     });
            //     video.bind("play", function() {
            //       console.log("the video played!");
            //     });
            //     // $("#custom_pause_button").click(function() {
            //     //   video.replaceWith("abcde12345");
            //     // });
            //     // jQuery("#custom_pause_button").click(function() {
                    
            //     //   video.play()
            //     // });

            // }});
            // window.wistiaInit = function(W) {
            //     W.options({ playerColor: "ffffff" });
            // };

//         }
//     };
// })(jQuery, Drupal);

        // var current_video = drupalSettings.frontpage_hid;

        // function myNewVideo(my_new_video) {

        //     // my_video = my_new_video;

        //     console.log("myNewVideo called" + my_new_video);
            
        //     window._wq = window._wq || [];            
        //     _wq.push({
        //         id: current_video,
        //         options: {
        //             playerColor: "000000",
        //             autoPlay: false,
        //             controlsVisibleOnLoad: true,
        //             playlistLoop: false,
        //             volume: 0,
        //             volumeControl: true,
        //             playbar: true,
        //             playButton: false,
        //             playbackRateControl: false,
        //             smallPlayButton: false
        //         },
        //         onReady: function(video) {
        //             console.log("onReady launched");
        //             console.log("Current video: " + current_video);
        //             console.log("New video: " + my_new_video);
        //             video.replaceWith(my_new_video);
                    
                    
        //             // video.play();

        //         }

        //     });
            
        //     current_video = my_new_video;
            
        // };

// (function ($, Drupal) {
//     Drupal.behaviors.wistiaFrontpageBehavior = {
//         attach: function (context, settings) {
            
// jQuery("#custom_pause_button").click(function() {
//     console.log("click");
//     var hashedId = '3n0y5bgvjl';
//     document.getElementById("thumbnail_test").className = "wistia_embed wistia_async_" + hashedId;
//     window._wq = window._wq || [];
//     _wq.push({ id: "_all", onReady: function(video) {
//         // video.replaceWith(hashedId);
//         video.play();
//     }});        
// });        

// var hashedId = 'agq9bn820x';
// document.getElementById("thumbnail_test").className = "wistia_embed wistia_async_" + hashedId;        
      


//         }
//     };
// })(jQuery, Drupal);