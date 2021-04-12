function loadVideo(url,id,dimen){
	$('#' + id).videre({
		video: {
			quality: [
				{
					label: '720p',
					src: url
				},
				{
					label: '360p',
					src: url
				},
				{
					label: '240p',
					src: url
				}
			],
			title: ''
		},
		dimensions: dimen
	});
}