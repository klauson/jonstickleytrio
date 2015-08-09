// These are functions that we run on the first page load of any page...
$(function(){
  'use strict';

  // Lets declare some variables for smoothState
  var $body = $('html, body');

  var $main = $('#main');

var smoothStateOptions = {
        prefetch: true,
        pageCacheSize: 3,
        onStart: {
          duration: 750,
          render: function ($container) {
            
            
            $main.addClass('is-exiting');

            $('body').fadeOut(750);

            smoothState.restartCSSAnimations();
          }
        },
        onAfter: function ($container, $newContent) {
          $('body').fadeIn(220);

          $main.removeClass('is-exiting');
          
          $main.html($newContent);
          
          $body.css('cursor', 'auto');
          
          // I'd probably remove this...
          $body.find('a').css('cursor', 'auto');
          
          // Call our onAfter functions
          onAfterFunctions();
        }
      };

  // Variables for audioengine
  var scripts = document.getElementsByTagName("script");

  var jsFolder = "";

  for (var i= 0; i< scripts.length; i++) {
    if( scripts[i].src && scripts[i].src.match(/amazingaudioplayer\.js/i)) {
      jsFolder = scripts[i].src.substr(0, scripts[i].src.lastIndexOf("/") + 1);
    }
  }

  // Lets make some functions that need to be called after every onAfter page transition...
  var onAfterFunctions = function() {
    // Start the slider
    $('.slider').slider({
      indicators: false,
      height: 600,
      full_width: true
    });

    // Starts material box
    $('.materialboxed').materialbox();

    // Starts audioplayer
    $("#amazingaudioplayer-1").amazingaudioplayer({
      jsfolder:jsFolder,

      skinsfoldername:"",

      titleinbarwidthmode:"fixed",

      timeformatlive:"%CURRENT% / LIVE",

      volumeimagewidth:24,

      barbackgroundimage:"",

      showtime:true,

      titleinbarwidth:80,

      showprogress:true,

      random:false,

      titleformat:"%TITLE%",

      height:164,

      loadingformat:"Loading...",

      prevnextimage:"prevnext-48-48-0.png",

      showinfo:true,

      imageheight:100,

      skin:"MusicBox",

      loopimage:"loop-24-24-1.png",

      loopimagewidth:24,

      showstop:false,

      prevnextimageheight:48,

      infoformat:"%ARTIST% %ALBUM%<br />%INFO%",

      stopotherplayers:true,

      showloading:false,

      forcefirefoxflash:false,

      showvolumebar:true,

      imagefullwidth:false,

      width:300,

      showtitleinbar:false,

      showloop:false,

      volumeimage:"volume-24-24-1.png",

      playpauseimagewidth:48,

      loopimageheight:24,

      tracklistitem:10,

      tracklistitemformat:"%ID%. %TITLE% <span style='position:absolute;top:0;right:0;'>%DURATION%</span>",

      prevnextimagewidth:48,

      tracklistarrowimage:"tracklistarrow-48-16-0.png",

      playpauseimageheight:48,

      showbackgroundimage:false,

      imagewidth:100,

      stopimage:"stop-48-48-0.png",

      playpauseimage:"playpause-48-48-0.png",

      showprevnext:true,

      backgroundimage:"",

      autoplay:false,

      volumebarpadding:8,

      progressheight:8,

      showtracklistbackgroundimage:false,

      titleinbarscroll:true,

      showtitle:true,

      defaultvolume:-1,

      tracklistarrowimageheight:16,

      heightmode:"fixed",

      titleinbarformat:"%TITLE%",

      showtracklist:false,

      stopimageheight:48,

      volumeimageheight:24,

      stopimagewidth:48,

      volumebarheight:80,

      noncontinous:false,

      tracklistbackgroundimage:"",

      showbarbackgroundimage:false,

      showimage:true,

      tracklistarrowimagewidth:48,

      timeformat:"%CURRENT% / %DURATION%",

      showvolume:true,

      fullwidth:false,

      loop:1,

      preloadaudio:true
    });
  }

  // Starts sidenav
  $('.button-collapse').sideNav({
    menuWidth: 300, 
    edge: 'right', 
    closeOnClick: true
  });

  // Call our init functions
  onAfterFunctions();

  // Call smoothState!
  var smoothState = $main.smoothState(smoothStateOptions).data('smoothState');
});
