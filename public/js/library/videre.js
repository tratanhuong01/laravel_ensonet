// 
if (typeof Object.create !== "function") {
    Object.create = function (obj) {
        function F() {}
        F.prototype = obj;
        return new F();
    };
}

(function ($, window, document) {
	var dimensions = {
		740: [740, 400],
		492: [492, 208],
	}
		currentQuality = null;
		currentVolumeIcon = null;

	function kFormat ( num ) {
		if ( num >= 1000000 ) {
			return (num/1000000).toFixed(2) + 'M';
		}
		if ( num >= 100000 ) {
			return (num/1000).toFixed() + 'K';
		}
		if ( num >= 1000 ) {
			return (num/1000).toFixed(1) + 'K';
		}
		return num;
	};

	function pluralize ( string, count ) {
		return (count === 0 || count != 1) ? string + 's' : string;
	}

	var Video = {
		init : function (options, el) {
			var base = this;
				el = el[0];
			
            base.options = $.extend({}, $.fn.videre.options, options);

			if ($.inArray(base.options.dimensions, dimensions[base.options.dimensions]) === 0) {
				$('html head').append('</script><script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>');
				base.wrapPlayer(el);
			} else {
				alert("Dimension isn't included in Videre");
			};

		},
		wrapPlayer : function (el) {
			var base = this;
				if (base.options.video.viewCount) {
					viewCount = kFormat(base.options.video.viewCount);
				} else {
					viewCount = ''
				}
				pluralizeView = pluralize('view', base.options.video.viewCount);
				template = $(
								'<div class="vid-html5" id="vid-html5' + base.options.video.IDBaiDang + base.options.video.IDHinhAnh  + '">'+
									'<video src="'+base.options.video.quality[0].src+'" id="html-player'+ base.options.video.IDBaiDang + base.options.video.IDHinhAnh  +'" style="width: '+dimensions[base.options.dimensions][0]+'px; height: '+dimensions[base.options.dimensions][1]+'px;"></video>'+
								'</div>'+
								'<div class="vid-toggle-layer'+ base.options.video.IDBaiDang + base.options.video.IDHinhAnh  + '"></div>'+
								'<div class="vid-shadow-layer vid-shadow-layer'+ base.options.video.IDBaiDang + base.options.video.IDHinhAnh  +'"></div>'+
								'<div class="vid-info-layer vid-info-layer'+ base.options.video.IDBaiDang + base.options.video.IDHinhAnh  +'">'+
									'<div class="vid-info-wrapper vid-info-wrapper'+ base.options.video.IDBaiDang + base.options.video.IDHinhAnh  +' flex align-end">'+
										'<div class="main-info">'+
											'<p>You\'re watching</p>'+
											'<h1>'+base.options.video.title+'</h1>'+
										'</div>'+
										'<div class="view-count '+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+' vid-info-wrapper'+ base.options.video.IDBaiDang + base.options.video.IDHinhAnh  +' ">'+
											(viewCount != '' ?('<h2>'+viewCount.toLocaleString()+' '+pluralizeView+'</h2>') : '')+
										'</div>'+
									'</div>'+
								'</div>'+
								'<div class="vid-controls-bottom vid-controls-bottom'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+' flex align-center justify-center">'+
									'<div class="vid-controls-wrapper vid-controls-wrapper'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+'">'+
										'<div class="vid-controls-contents vid-controls-contents'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+' flex align-center justify-center">'+
											'<button class="vid-play-btn vid-play-btn'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+' item"><i class="ion-ios-play flex align-center"></i></button>'+
											'<div class="vid-volume-container vid-volume-container'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+' flex align-center">'+
												'<button class="vid-volume-control vid-volume-control'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+' item"><i class="ion-android-volume-up flex align-center"></i></button>'+
												'<div id="vol-control'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+'" class="vid-volume-slider"></div>'+
											'</div>'+
											'<span class="vid-current-time vid-current-time'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+'"></span>'+
											'<div class="vid-progress vid-progress'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+'">'+
												'<div class="progress-bg progress-bg'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+'"></div>'+
												'<div class="progress-loaded progress-loaded'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+'"></div>'+
												'<div class="progress-fg progress-fg'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+'"></div>'+
												'<div class="progress-hovertime progress-hovertime'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+'"></div>'+
											'</div>'+
											'<span class="vid-duration vid-duration'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+'"></span>'+
											'<button class="vid-request-fullscreen vid-request-fullscreen'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+' item"><i class="ion-android-expand flex align-center"></i></button>'+
										'</div>'+
									'</div>'+
								'</div>'+
								'<div class="vid-bottom-progress-bar vid-bottom-progress-bar'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+'">'+
									'<div class="progress-fg progress-fg'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+'"></div>'+
								'</div>'
							);
			
			currentQuality = base.options.video.quality.indexOf(base.options.video.quality[0]);
			$(el).css('width', dimensions[base.options.dimensions][0]+'px');
			$(el).addClass('vid-wrapper vid-wrapper'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+' videre-container'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+' mouse-entered'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh);
			$(el).append(template);
			base.decodeMedia(el);
		},

		decodeMedia : function (el) {
			var base = this;
				media = document.getElementById('html-player'+ base.options.video.IDBaiDang + base.options.video.IDHinhAnh);
				el = el;

			media.onloadedmetadata = function() {
				base.renderMediaData(el);
			};
			media.onwaiting = function() {
				// while video is waiting to load the next frame
			};
			media.onended = function() {
				// while video has ended
				$('.vid-wrapper' +base.options.video.IDBaiDang + base.options.video.IDHinhAnh).addClass('paused');
				$('.vid-play-btn'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).find('i').addClass('ion-ios-play').removeClass('ion-ios-pause');
			};
			media.oncanplaythrough = function() {
				// while video has loaded the next frame
			};

			// ondurationchange = Execute a function when the duration of a video has changed
		},

		renderMediaData : function(el) {
			var base = this;
				duration = base.toHHMMSS(media.duration);
				qualitySelectorTemplate = $('<div class="vid-quality-selector vid-quality-selector'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+' flex"></div>');

			for (let i = 0; base.options.video.quality.length > i; i++){
				var qualityArray = $(
										'<button data-index="'+i+'">'+base.options.video.quality[i].label+'</button>'
									);
				qualitySelectorTemplate.append(qualityArray);
			};

			media.volume = 0.5;

			$(el).append(qualitySelectorTemplate);
			$('.vid-duration'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).text(duration);

			setInterval(function(){
				base.renderProgress();
			}, 10);

			base.setControls();
			base.setQuality();
		},

		setQuality : function () {
			var base = this;

			$('.vid-quality-selector' +base.options.video.IDBaiDang + base.options.video.IDHinhAnh +' button').click(function(){
				var index = $(this).data('index');

				$('#html-player'+ base.options.video.IDBaiDang + base.options.video.IDHinhAnh).attr('src', base.options.video.quality[index].src);
				currentQuality = base.options.video.quality.indexOf(base.options.video.quality[index]);
				media.currentTime = base.options.currentTime;
				base.decodeMedia();
			});
			base.togglePlay();
			// set an active class for the current quality in buttons
			$('.vid-quality-selector'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+' button').removeClass();
			$('.vid-quality-selector'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+' button[data-index="'+currentQuality+'"]').addClass('active');
		},

		renderProgress : function ( ) {
			var base = this;
				currentTime = base.toHHMMSS(media.currentTime);

		 	base.options.currentTime = media.currentTime;
			$('.vid-current-time'+ base.options.video.IDBaiDang + base.options.video.IDHinhAnh).text('00:00');
			$('.progress-fg'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).css('width', (100 / media.duration) * media.currentTime+'%');
			if (media.duration)
				$('.progress-loaded'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).css('width', (100 / media.duration) * media.buffered.end(0)+'%');
		},

		setControls : function () {
			var base = this;

			$('.vid-play-btn'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).unbind().click(function(){
				console.log('clicked')
				base.togglePlay();
			});

			$('.vid-toggle-layer'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).unbind()

			$('.vid-toggle-layer'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).unbind().click(function(){
				base.togglePlay();
			}).dblclick(function(){
				var base = this;
				if ( media.requestFullscreen ) {
					media.requestFullscreen();
				} else if ( media.mozRequestFullScreen ) {
					media.mozRequestFullScreen();
				} else if ( media.webkitRequestFullscreen ) {
					media.webkitRequestFullscreen();
				};
				base.isFullscreen();
			});

			$('.vid-request-fullscreen'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).unbind().click(function(){
				if ( media.requestFullscreen ) {
					media.requestFullscreen();
				} else if ( media.mozRequestFullScreen ) {
					media.mozRequestFullScreen();
				} else if ( media.webkitRequestFullscreen ) {
					media.webkitRequestFullscreen();
				};
				base.isFullscreen();
			});


			$('.vid-volume-control'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).unbind().mouseenter(function(){
				base.setVolume();
			}).click(function(){
				base.toggleVolumeMute($(this));
			});
            
            $('.vid-progress'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).unbind().on('click', function(e){
                var position = base.seek(e);
                media.currentTime = position.value;
            });

            $('.progress-bg'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).unbind().mousemove(function(e){
                
                var hoverX, startX, width, result, offset;
                hoverX = e.clientX;
                offset = $('.progress-fg'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).offset();
                width = $('.vid-progress'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).width();
                result = (  base.toHHMMSS(base.seek(e).value));

                $('.progress-hovertime'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).addClass('hover');

                $('.progress-hovertime'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).css('left', hoverX - offset.left + 'px');
                $('.progress-hovertime'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).text(result);
            
            }).unbind().mouseleave(function(){
                $('.progress-hovertime'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).removeClass('hover');
            });

			base.mouseMovement();
		},

		seek : function ( event ) {
			var base = this;
            var offset = $('.progress-fg'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).offset();
                x = event.pageX - offset.left;
                y = event.pageY - offset.top;
                max = media.duration;
                value = x * max / $('.vid-progress'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).width();
            return {x: x, y: y, max: max, value: value};
		},

		toggleVolumeMute : function (element) {
			var base = this;

			if (media.volume != 0) {

				media.volume = 0;
				element.find('i').removeClass().addClass('ion-android-volume-off flex align-center');
				$('#vol-control'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).slider({value: 0});

			} else {

				if (currentVolumeIcon) {
					element.find('i').removeClass().addClass(currentVolumeIcon);
				} else {
					element.find('i').removeClass().addClass('ion-android-volume-up flex align-center');
				}
				media.volume = base.options.audio.volume / 100;
				$('#vol-control'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).slider({value: base.options.audio.volume});

			}
		},

		setVolume : function() {
			var base = this;

			$('#vol-control'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).css('width', '100px');
			$('#vol-control'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).slider({
			    min: 0,
			    max: 100,
			    value: media.volume === 0 ? 0 : base.options.audio.volume,
				range: "min",
				animate: false,
			    slide: function(event, ui) {
			      	media.volume = ui.value / 100;
			      	base.options.audio.volume = ui.value;
			      	if ( ui.value >= 50) {
			      		$('.vid-volume-control'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+' i').removeClass().addClass('ion-android-volume-up flex align-center');
			      		currentVolumeIcon = 'ion-android-volume-up flex align-center';
			      	} else if ( ui.value <= 50 ) {
			      		$('.vid-volume-control'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+' i').removeClass().addClass('ion-android-volume-down flex align-center');
			      		currentVolumeIcon = 'ion-android-volume-down flex align-center';
			      		if (ui.value === 0) {
			      			$('.vid-volume-control'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+' i').removeClass().addClass('ion-android-volume-mute flex align-center');
			      			currentVolumeIcon = 'ion-android-volume-mute flex align-center';
			      		}
			      	};
			    }
			});

			$('.vid-volume-container'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).mouseleave(function(){
				$('#vol-control'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).css('width', '0');
			});

		},

		mouseMovement : function () {
			var base = this;
				timeout = null;

			    clearTimeout(timeout);

		    timeout = setTimeout(function() {
		        // mouse is idle after 1.5s
		        base.toggleControls();
		    }, 2500);
			$(this).addClass('mouse-entered');
			$('.vid-wrapper'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).on('mousemove', function() {
			    clearTimeout(timeout);

			    timeout = setTimeout(function() {
			        // mouse is idle after 1.5s
			        base.toggleControls();
			    }, 2500);
				$(this).addClass('mouse-entered');
			}).mouseleave(function(){
			    clearTimeout(timeout);
			    timeout = setTimeout(function() {
			        // mouse is idle after 1.5s
			        base.toggleControls();
			    }, 2500);
			});;

		},

		toggleControls : function() {
			var base = this;
	        $('.vid-wrapper'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).removeClass('mouse-entered');
		},

		isFullscreen : function () {
			var base = this;
			if (!window.screenTop && !window.screenY) {
				$('.vid-wrapper'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).addClass('is-fullscreen');
				$('.vid-wrapper'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+' button.vid-request-fullscreen i').removeClass('.ion-android-expand').addClass('ion-arrow-shrink')
				base.exitFullscreen();
			} else {
				// if not fullscreen
				$('.vid-wrapper'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh+' button.vid-request-fullscreen i').addClass('.ion-android-expand').removeClass('ion-arrow-shrink')
				$('.vid-wrapper'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).removeClass('is-fullscreen');
			};

		},

		exitFullscreen : function ( ) {
			var base = this;
			$('.vid-request-fullscreen'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).click(function(){
		        if (media.exitFullscreen) {
		            media.exitFullscreen();
		        } else if (media.webkitExitFullscreen) {
		            media.webkitExitFullscreen();
		        } else if (media.mozCancelFullScreen) {
		            media.mozCancelFullScreen();
		        } else if (media.msExitFullscreen) {
		            media.msExitFullscreen();
		        };
			});
			$('.vid-toggle-layer'+base.options.video.IDBaiDang + base.options.video.IDHinhAnh).dblclick(function(){
		        if (media.exitFullscreen) {
		            media.exitFullscreen();
		        } else if (media.webkitExitFullscreen) {
		            media.webkitExitFullscreen();
		        } else if (media.mozCancelFullScreen) {
		            media.mozCancelFullScreen();
		        } else if (media.msExitFullscreen) {
		            media.msExitFullscreen();
		        };
			});
		},

		togglePlay : function() {
			var base = this;
			var isPlaying = media.currentTime > 0 && !media.paused && !media.ended && media.readyState > 2;
			if (!isPlaying){
				media.play();
				$('.vid-wrapper'+ base.options.video.IDBaiDang + base.options.video.IDHinhAnh).removeClass('paused');
				$('.vid-play-btn'+ base.options.video.IDBaiDang + base.options.video.IDHinhAnh).find('i').removeClass('ion-ios-play').addClass('ion-ios-pause');
			} else {
				$('.vid-wrapper'+ base.options.video.IDBaiDang + base.options.video.IDHinhAnh).addClass('paused').addClass('mouse-entered');
				$('.vid-play-btn'+ base.options.video.IDBaiDang + base.options.video.IDHinhAnh).find('i').addClass('ion-ios-play').removeClass('ion-ios-pause');
				media.pause();
			}
		},

        toHHMMSS : function (time) {
        	var base = this;
            	m=~~(time/60), s=~~(time % 60);
            return (m<10?"0"+m:m)+':'+(s<10?"0"+s:s);
        }

	};

	$.fn.videre = function(options){
		return Video.init(options, $(this[0]));
	};

	// default options
	$.fn.videre.options = {
		video: {
			quality: [{
				label: null,
				src: null
			}],
			title: null,
			viewCount: null,
			IDBaiDang : null,
			IDHinhAnh : null,
		},
		currentTime: null,
		audio: {
			volume: 50
		},
		dimensions: {
			1920: [1920, 1080]
		},
		bottomProgressBar: true
	};


}(jQuery, window, document));
