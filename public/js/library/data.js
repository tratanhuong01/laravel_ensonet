function loadVideo(url,id,dimen,IDBaiDang,IDHinhAnh){
	$('#' + id).videre({
		video: {
			IDBaiDang : IDBaiDang,
			IDHinhAnh : IDHinhAnh,
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
				},
				
			],
			
			title: ''
		},
		dimensions: dimen
	});
}