<?php

/* locationpruebaBundle:Geolocation:locacion.html.twig */
class __TwigTemplate_8bcd130fd05a404105516b549d9eda1d extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        ob_start();
        // line 3
        echo "<!DOCTYPE html>
<html lang=\"es\">
    <head>
        <title>Geolocalizacion</title>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
     
        <script type=\"text/javascript\" src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("http://HTML5shim.googlecode.com/svn/trunk/HTML5.js"), "html", null, true);
        echo "\"></script>    
        <script type=\"text/javascript\" src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("http://maps.googleapis.com/maps/api/js?sensor=false"), "html", null, true);
        echo "\"></script>
    
        ";
        // line 13
        echo "        <script> 
       
\tvar markersArray = [];
        var vlatlon = new Array();
        var cont = 1;
        var cont1 = 1;
        
        
\tfunction localizar()
\t{
\t\tnavigator.geolocation.getCurrentPosition(inicio,error);
\t}
\t
\tfunction inicio(pos) 
\t{
\t\t
                   
                ";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "latlong"));
        foreach ($context['_seq'] as $context["_key"] => $context["latlon"]) {
            echo "                   
                    var latitud = ";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "latlon"), "latitud"), "html", null, true);
            echo ";
                    var longitud = ";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "latlon"), "longitud"), "html", null, true);
            echo ";
                    vlatlon[cont] = new google.maps.LatLng(latitud,longitud);
                    cont = cont + 1;
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['latlon'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 35
        echo " 
                
\t\tdocument.formulario.__latitud.value = latitud;
\t\tdocument.formulario.__longitud.value = longitud;
\t \t
                var myLatlng = new google.maps.LatLng(latitud,longitud);
                
\t  \tvar myOptions = {
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
\t \t}
\t  \tmap = new google.maps.Map(document.getElementById(\"mapa\"), myOptions);
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
                
\t  \tgoogle.maps.event.addListener(map, 'click', function(event) {
\t\tplaceMarker(event.latLng);
\t  \t});
                
\t\t
\t}
  
\tfunction placeMarker(location) 
\t{
\t\t
\t\tif(markersArray.length!=0)
\t\t{
\t\t\tfor (i in markersArray) {
\t\t\t  markersArray[i].setMap(null);
\t\t\t}
\t\t\tmarkersArray.length = 0;
\t\t}
\t\tvar marker = new google.maps.Marker({
\t\t position: location, 
\t\t map: map
\t\t});
\t\t
\t\tmarkersArray.push(marker);
\t\tvar markerLatLng = marker.getPosition();
              
\t\tdocument.formulario.__latitud.value=markerLatLng.lat();
\t\tdocument.formulario.__longitud.value=markerLatLng.lng();
\t}
\t
        function error(errorC)
\t{
\t\tif(errorC.code== 0)
\t\talert(\"Error desconocido\");
\t\telse if(errorC.code==1)
\t\talert(\"No me dejaste ubicarte\");
\t\telse if(errorC.code==2)
\t\talert(\"Posicion no disponible\");
\t\telse if(errorC.code==3)
\t\talert(\"Me rendi, no puedo Ubicarte\");
\t}
\tfunction verifica()
\t{
\t\t
\t\tdocument.formulario.submit();
\t}
    </script>
  
    </head>    
    <body onload=\"localizar()\">
        <div id=\"mapa\" style=\"width: 600px; height: 500px; margin: 0 auto\"></div>
        
        <form name=\"formulario\" method=\"POST\" >
            ";
        // line 129
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
