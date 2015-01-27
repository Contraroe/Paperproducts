			function init_map(){
			var
				myOptions = {
					zoom:12,
					center:new google.maps.LatLng(51.181964, 4.4370347000000265),mapTypeId: google.maps.MapTypeId.ROADMAP,
					zoomControl: false,
					scrollwheel: false,
					panControl: false,
					mapTypeControl: false,
					streetViewControl: false,
					styles: [
						{
							stylers: [
								{ visibility: "simplified" },
								{ color: "#000000"},
								{ lightness: 2}
							]
						},
						{
							featureType: 'road',
							elementType: 'geometry',
							stylers: [
								{ color: '#33241c'},
								{ lightness: 10}
							]
						},
					// 	{
					// 		featureType: 'road',
					// 		elementType: 'geometry.stroke',
					// 		stylers: [
					// 			{ color: '#000000'},
					// 			{ lightness: 25}
					// 		]
					// 	},
					// 	{
					// 		featureType: "road",
					// 		elementType: "labels",
					// 		stylers: [
					// 			{ visibility: "on" },
					// 		]
					// 	},
					// 	{
					// 		featureType: "road",
					// 		elementType: "labels.text",
					// 		stylers: [
					// 			{ visibility: "on" },
					// 			{ color: '#ffffff'}
					// 		]
					// 	},
					// 	{
					// 		featureType: "road",
					// 		elementType: "labels.text.stroke",
					// 		stylers: [
					// 			{ visibility: "off" },
					// 			{ color: '#000000' }
					// 		]
					// 	},
					// 	{
					// 		featureType: 'landscape',
					// 		elementType: 'all',
					// 		stylers: [
					// 			{ color: '#000000' },
					// 			{ gamma: 1.4 },
					// 			{ lightness: 100},
					// 			{ visibility: "on" }
					// 		]
					// 	},
					// 	{
					// 		featureType: 'landscape',
					// 		elementType: 'all',
					// 		stylers: [
					// 			{ visibility: "off" }
					// 		]
					// 	},
					// 	{
					// 		featureType: "transit",
					// 		elementType: "all",
					// 		stylers: [
					// 			{ visibility: "off" }
					// 		]
					// 	},
					// 	{
					// 		featureType: "poi",
					// 		elementType: "all",
					// 		stylers: [
					// 			{ visibility: "off" }
					// 		]
					// 	},
					// 	{
					// 		featureType: "administrative",
					// 		elementType: "all",
					// 		stylers: [
					// 			{ visibility: "on" },
					// 			{ color:'#ffffff' }
					// 		]
					// 	},
					// 	{
					// 		featureType: "administrative",
					// 		elementType: "labels.text.stroke",
					// 		stylers: [
					// 			{ visibility: "off" }
					// 		]
					// 	},
					// 	{
					// 		featureType: "water",
					// 		elementType: "all",
					// 		stylers: [
					// 			{ visibility: "off" }
					// 		]
					// 	}
					]
				};
				map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
				marker = new google.maps.Marker({
					map: map,
					position: new google.maps.LatLng(51.181964, 4.4370347000000265),
					icon: '_img/ico/logo.svg',
					animation: google.maps.Animation.DROP,
				draggable: false,
				});
				infowindow = new google.maps.InfoWindow({
					content:'<b>Bureau-Maurice</b> <br> Fruithoflaan 37 bus 3 <br> 26000 Bergem'
				});
				google.maps.event.addListener(marker, 'click', function(){
					infowindow.open(map,marker);
				})
			;}
			google.maps.event.addDomListener(window, 'load', init_map);