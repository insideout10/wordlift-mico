// AUTOPLAY MOUSEOVER
$(function(){
  $('video.wl-video-autoplay').on('mouseenter', function(){
      if( this.paused ) this.play();
        this.playbackRate = 0.5;
  }).on('mouseleave', function(){
    if( !this.paused ) this.pause();
  });
});

// PLAY ON CLICK
$(function(){
  $('.wl-mock-190-s2-play').on('click', function () {
    $('video.wl-video-onclick').get(0).play();
    $('.wl-mock-190-s2-play').hide();
  });
});

$(function(){
  $('video.wl-video-onclick').on('click', function () {
    $('video.wl-video-onclick').get(0).pause();
    $('.wl-mock-190-s2-play').show();
  });
});
