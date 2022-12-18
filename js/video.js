jQuery(document).ready(($) => {
	const channelTitle = 'MrBullitan';

	$.get(
		'https://www.googleapis.com/youtube/v3/channels',
		{
			part: 'contentDetails',
			forUsername: channelTitle,
			key: '',
		}, //

		(data) => {
			$.each(data.items, (i, item) => {
				console.log(item);

				const pid = item.contentDetails.relatedPlaylists.uploads;

				getVids(pid);
			}); //each
		} //function
	); //get

	function getVids(pid) {
		$.get(
			'https://www.googleapis.com/youtube/v3/playlistItems',
			{
				part: 'snippet',
				maxResults: 5,
				playlistId: pid,
				key: '',
			}, ////Api Key

			(data) => {
				let output;

				$.each(data.items, (i, item) => {
					//console.log(item);

					const {VideoId} = item.snippet.resourceId;
					const videTitle = item.snippet.title;
					const videDesc = item.snippet.description;
					const videThumb = item.snippet.thumbnails.default.url;

					output =
						'<article class="you_tube_box"><h1>' +
						videTitle +
						'</h1><figure class="you_tube_thumb"><img src="' +
						videThumb +
						'" alt=""><figcaption class="u_tube"><span class="u_tube_button"><a href="">View</a></span></li></figcaption></figure></article>';

					//<li><iframe src\"//www.youtube.cmo/embed/'+VideoId+'\"></iframe></li>
					//<p>' +videDesc+ '</p>

					//Append to results listStyleType
					$('.results').append(output);
				}); //each
			} //function
		); //get
	} //function
});
