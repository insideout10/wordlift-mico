$(function(){
  ('video').playbackRate = 0.5;
});

$(function(){
    $('video').on('mouseenter', function(){
        if( this.paused ) this.play().playbackRate = 0.5;
    }).on('mouseleave', function(){
        if( !this.paused ) this.pause();
    });
});
