
jQuery(document).ready(function($){

  var channelTitle = 'MrBullitan';

  $.get('https://www.googleapis.com/youtube/v3/channels', {
      part:'contentDetails',
      forUsername:channelTitle,
      key: ''},//

      function(data){

        $.each(data.items, function(i, item){

          console.log(item);

          var pid = item.contentDetails.relatedPlaylists.uploads;

          getVids(pid);

        })//each
      }//function

  );//get

  function getVids(pid){
    $.get(
      "https://www.googleapis.com/youtube/v3/playlistItems",{
        part:'snippet',
        maxResults: 5,
        playlistId:pid,
        key:''},////Api Key

        function(data){

          var output;

          $.each(data.items, function( i, item){

            //console.log(item);

            var VideoId = item.snippet.resourceId.VideoId;
            var videTitle = item.snippet.title;
            var videDesc = item.snippet.description;
            var videThumb = item.snippet.thumbnails.default.url;

            output = '<article class="you_tube_box"><h1>' +videTitle+ 
            '</h1><figure class="you_tube_thumb"><img src="' +videThumb+ 
            '" alt=""><figcaption class="u_tube"><span class="u_tube_button"><a href="">View</a></span></li></figcaption></figure></article>';

            //<li><iframe src\"//www.youtube.cmo/embed/'+VideoId+'\"></iframe></li>
            //<p>' +videDesc+ '</p>

            //Append to results listStyleType
                    $('.results').append(output);


          })//each
        }//function

    );//get

  }//function


});



