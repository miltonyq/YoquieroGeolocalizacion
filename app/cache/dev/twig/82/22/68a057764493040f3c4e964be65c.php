<?php

/* locationpruebaBundle:Geolocation:locacion.html.twig */
class __TwigTemplate_822268a057764493040f3c4e964be65c extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 6
        ob_start();
        // line 7
        echo "<!DOCTYPE html>
<html lang=\"es\">
    <head>
        <title>Geolocalizacion</title>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">

        <script type=\"text/javascript\" src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("http://HTML5shim.googlecode.com/svn/trunk/HTML5.js"), "html", null, true);
        echo "\"></script>    
        <script type=\"text/javascript\" src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("http://maps.googleapis.com/maps/api/js?sensor=false"), "html", null, true);
        echo "\"></script>

        ";
        // line 17
        echo "        <script> 
       
        var markersArray = [];
        var vlatlon = new Array();
        var cont = 1;
        var cont1 = 1;
        
        
        function localizar()
        {
                navigator.geolocation.getCurrentPosition(inicio,error);
        }
\t
        function inicio(pos) 
        {
\t\t
                   
                ";
        // line 34
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "latlong"));
        foreach ($context['_seq'] as $context["_key"] => $context["latlon"]) {
            echo "                   
                    var latitud = ";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "latlon"), "latitud"), "html", null, true);
            echo ";
                    var longitud = ";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "latlon"), "longitud"), "html", null, true);
            echo ";
                    vlatlon[cont] = new google.maps.LatLng(latitud,longitud);
                    cont = cont + 1;
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['latlon'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 39
        echo " 
                
                if (vlatlon.length == 0){   
                    var latitud = pos.coords.latitude;
                    var longitud = pos.coords.longitude;
                }
                
                
                document.formulario.__latitud.value = latitud;
                document.formulario.__longitud.value = longitud;
\t \t
                var myLatlng = new google.maps.LatLng(latitud,longitud);
                
                var myOptions = {
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
                map = new google.maps.Map(document.getElementById(\"mapa\"), myOptions);
\t  
                var icono = new google.maps.MarkerImage(
                'http://www.maestrosdelweb.com/images/2011/04/sprite.png',
                new google.maps.Size(30,43),
                new google.maps.Point(0,0),
                new google.maps.Point(15,43)  
                );
                
 
                for (cont1 in vlatlon)
                { 
                   var marker = new google.maps.Marker({
                   draggable: false,
                   position: vlatlon[cont1],
                   map: map,
                   title: cont1,
                   icon: icono
                   });
                   cont1 = cont1 + 1;
                }

                google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(event.latLng);
                });
                
\t\t
        }
  
        function placeMarker(location) 
        {
\t\t
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
\t\t
                markersArray.push(marker);
                var markerLatLng = marker.getPosition();
              
                document.formulario.__latitud.value=markerLatLng.lat();
                document.formulario.__longitud.value=markerLatLng.lng();
        }
\t
        function error(errorC)
        {
                if(errorC.code== 0)
                alert(\"Error desconocido\");
                else if(errorC.code==1)
                alert(\"No me dejaste ubicarte\");
                else if(errorC.code==2)
                alert(\"Posicion no disponible\");
                else if(errorC.code==3)
                alert(\"Me rendi, no puedo Ubicarte\");
        }
        function verifica()
        {
\t\t
                document.formulario.submit();
        }
            </script>

        </head>    
        <body onload=\"localizar()\">
            <div id=\"mapa\" style=\"width: 600px; height: 500px; margin: 0 auto\"></div>

            <form name=\"formulario\" method=\"POST\" >
                ";
        // line 140
        echo $this->env->getExtension('form')->renderRest($this->getContext($context, "form"));
        echo "
                <input type=\"submit\">    
            </form>
            </body>
        </html>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "locationpruebaBundle:Geolocation:locacion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
