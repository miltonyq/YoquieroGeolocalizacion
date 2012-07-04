/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

	var map;
	var markersArray = [];
	
	function localizar()
	{
		navigator.geolocation.getCurrentPosition(inicio,error);
	}
	
	function inicio(pos) 
	{
		var latitud = pos.coords.latitude;
		var longitud = pos.coords.longitude;
                
                var latitud = -16.514667;
                var longitud = -68.127755; 
                
		document.formulario.__latitud.value=latitud;
		document.formulario.__longitud.value=longitud;
	 	var myLatlng = new google.maps.LatLng(latitud,longitud);
	  	var myOptions = 
		{
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    
                    navigationControlOptions: {
                        style: google.maps.NavigationControlStyle.SMALL,
                        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                        position: google.maps.ControlPosition.CENTER_BOTTOM},
                        mapTypeControlOptions: {
                        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                        position: google.maps.ControlPosition.LEFT_BOTTOM
                    },
                    zoom: 20    
	 	}
	  	map = new google.maps.Map(document.getElementById("mapa"), myOptions);
	  
                var icono = new google.maps.MarkerImage(
                'http://www.maestrosdelweb.com/images/2011/04/sprite.png',
                new google.maps.Size(30,43),
                new google.maps.Point(0,0),
                new google.maps.Point(15,43)  
                );
                    
                var mkr = new google.maps.Marker({
                draggable: false,
                icon: icono,
                position: myLatlng,
                map: map,
                title: 'Yo Quiero'
                });
                
	  	google.maps.event.addListener(map, 'click', function(event) {
		placeMarker(event.latLng);
	  	});
		
	}
  
	function placeMarker(location) 
	{
		
		if(markersArray.length!=0)
		{
			for (i in markersArray) {
			  markersArray[i].setMap(null);
			}
			markersArray.length = 0;
		}
		var marker = new google.maps.Marker({
		 position: location, 
		 map: map
		});
		
		markersArray.push(marker);
		var markerLatLng = marker.getPosition();
              
		document.formulario.__latitud.value=markerLatLng.lat();
		document.formulario.__longitud.value=markerLatLng.lng();
	}
	
        function error(errorC)
	{
		if(errorC.code== 0)
		alert("Error desconocido");
		else if(errorC.code==1)
		alert("No me dejaste ubicarte");
		else if(errorC.code==2)
		alert("Posicion no disponible");
		else if(errorC.code==3)
		alert("Me rendi, no puedo Ubicarte");
	}
	function verifica()
	{
		
		document.formulario.submit();
	}



