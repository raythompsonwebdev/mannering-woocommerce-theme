//audio-player
jQuery(document).ready(function($){

   //Stop if HTML5 video isn't supported
  if (!document.createElement('audio').canPlayType) {
    $("#audio_controls").hide();
    return;
  }

  var audio = document.getElementById("result_player");

  // Play/Pause ============================//
  $("#play_button").bind("click", function(){
    audio.play();
  });

  $("#pause_button").bind("click", function(){
    audio.pause();
  });

  $("#play_toggle").on("click", function(){
    if (audio.paused) {
      audio.play();
      $(this).html('<i class="fa fa-pause" aria-hidden="true"></i>');
    } else {
      audio.pause();
      $(this).html('<i class="fa fa-play-circle" aria-hidden="true"></i>');
    }
  });

  // Play Progress ============================//
  $(audio).bind("timeupdate", function(){
    var timePercent = (this.currentTime / this.duration) * 100;
    $("#play_progress").css({ width: timePercent + "%" })
  });

  // Load Progress ============================//
  $(audio).bind("progress", function(){
    updateLoadProgress();
  });
  $(audio).bind("loadeddata", function(){
    updateLoadProgress();
  });
  $(audio).bind("canplaythrough", function(){
    updateLoadProgress();
  });
  $(audio).bind("playing", function(){
    updateLoadProgress();
  });
  
  function updateLoadProgress() {
    if (audio.buffered.length > 0) {
      var percent = (audio.buffered.end(0) / audio.duration) * 100;
      $("#load_progress").css({ width: percent + "%" })
    }
  }
  
  // Time Display =============================//
  $(audio).bind("timeupdate", function(){
    $("#current_time").html(formatTime(this.currentTime));
  });
  $(audio).bind("durationchange", function(){
    $("#duration").html(formatTime(this.duration));
  });
  
  function formatTime(seconds) {
    var seconds = Math.round(seconds);
    var minutes = Math.floor(seconds / 60);
    // Remaining seconds
    seconds = Math.floor(seconds % 60);
    // Add leading Zeros
    minutes = (minutes >= 10) ? minutes : "0" + minutes;
    seconds = (seconds >= 10) ? seconds : "0" + seconds;
    return minutes + ":" + seconds;
  }


});
//end of jquery