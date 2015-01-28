			function init_map(){
			var
				myOptions = {
					zoom:11,
					center:new google.maps.LatLng(50.9923273, 3.322021),mapTypeId: google.maps.MapTypeId.ROADMAP,
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
								{ lightness: 5}
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
						// {
						// 	featureType: "road",
						// 	elementType: "labels",
						// 	stylers: [
						// 		{ visibility: "on" },
						// 		{ color: '#00c8c8'},
						// 		{ lightness: 0}
						// 	]
						// },
						// {
						// 	featureType: "road.arterial",
						// 	elementType: "labels.text",
						// 	stylers: [
						// 		{ visibility: "on" },
						// 		{ color: '#ffffff'}
						// 	]
						// },
						// {
						// 	featureType: "road",
						// 	elementType: "labels.text",
						// 	stylers: [
						// 		{ visibility: "on" },
						// 		{ color: '#ffffff'}
						// 	]
						// },
						{
							featureType: "road",
							elementType: "labels.text.stroke",
							stylers: [
								{ visibility: "off" }
							]
						},
						{
							featureType: "transit",
							elementType: "all",
							stylers: [
								{ visibility: "on" }
							]
						},
						{
							featureType: "poi",
							elementType: "all",
							stylers: [
								{ visibility: "on" }
							]
						},
						{
							featureType: "administrative",
							elementType: "all",
							stylers: [
								{ visibility: "on" },
								{ color:'#00c8c8' }
							]
						},
						{
							featureType: "administrative",
							elementType: "labels.text.stroke",
							stylers: [
								{ visibility: "off" }
							]
						},
						{
							featureType: "water",
							elementType: "all",
							stylers: [
								{ visibility: "off" }
							]
						}
					]
				};
				map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
				marker = new google.maps.Marker({
					map: map,
					position: new google.maps.LatLng(50.9923273, 3.322021),
					icon: '_img/ico/locator.png',
					animation: google.maps.Animation.DROP,
				draggable: false,
				});
				infowindow = new google.maps.InfoWindow({
					content:'<b>Lannoo Drukkerij nv</b> <br> Kasteelstraat 97 <br> 8700 Tielt'
				});
				google.maps.event.addListener(marker, 'click', function(){
					infowindow.open(map,marker);
				})
			;}
			google.maps.event.addDomListener(window, 'load', init_map);