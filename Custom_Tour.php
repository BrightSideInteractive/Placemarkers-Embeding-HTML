<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Overlays within Street View</title>
    <link href="https://developers.google.com/maps/documentation/javascript/examples/default.css" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>


<?php 
    $tourID = $_GET["TID"];
	

?>

var map;
var panorama;
var StartPano = 'IpQnxY-zYMaUP9uiCRUxYA'

var VWPlace = new google.maps.LatLng(45.754529, -108.619166);
var VWIcon = "http://www.toursparkle.com/content/images/VWLogo.png";

var Finance = new google.maps.LatLng(45.75434,-108.61916);
var BDC = new google.maps.LatLng(45.75434,-108.619095);
var Parts = new google.maps.LatLng(45.75434,-108.6192);
var Beetle = new google.maps.LatLng(45.754558,-108.619285);
var CC = new google.maps.LatLng(45.75453,-108.61913);
var ServManager = new google.maps.LatLng(45.75451,-108.619356);

//Content
 var BDCcontent = '<div id="content">'+
      '<center><h2>BDC Internet Specialist</h2></center>'+
      '<div>'+
      '<p>Im here to help you find the vehicle of your choice. '+
	  'I can answer any questions you have and send any type of '+
	  'informational packets. If we dont have what you are looking '+
	  'for, its my job to find it for you. I look forward to hearing from you. </p>'+
      //'<iframe width="300" height="169" src="http://www.youtube.com/embed/z-9p-dyq81k" frameborder="0" allowfullscreen></iframe>'+
      '<object width="300" height="169"><param name="movie" value="http://www.youtube.com/v/z-9p-dyq81k?hl=en_US&amp;version=3"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/z-9p-dyq81k?hl=en_US&amp;version=3" type="application/x-shockwave-flash" width="300" height="169" allowscriptaccess="always" allowfullscreen="true"></embed></object>'+
	  '</div>'+
      '</div>';

 var Financecontent = '<div id="content">'+
      '<center><h2>Finance Department</h2></center>'+
      '<div>'+
      '<p>We are here to help you with your financial needs and decisions.</p>'+
      //'<iframe width="300" height="169" src="http://www.youtube.com/embed/kRK6kJymRDk" frameborder="0" allowfullscreen></iframe>'+
      '<object width="300" height="169"><param name="movie" value="http://www.youtube.com/v/kRK6kJymRDk?version=3&amp;hl=en_US"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/kRK6kJymRDk?version=3&amp;hl=en_US" type="application/x-shockwave-flash" width="300" height="169" allowscriptaccess="always" allowfullscreen="true"></embed></object>'+
	  '</div>'+
      '</div>';

 var Partscontent = '<div id="content">'+
      '<center><h2>Parts Department</h2></center>'+
      '<div>'+
      '<p>Your car. Your driver gear.Your life. Let us help you take care of your Volkswagen and accessories for your lifestyle.</p>'+
      //'<iframe width="300" height="169" src="http://www.youtube.com/embed/yf8NaB9oaR0" frameborder="0" allowfullscreen></iframe>'+
	  '<object width="300" height="169"><param name="movie" value="http://www.youtube.com/v/yf8NaB9oaR0?version=3&amp;hl=en_US"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/yf8NaB9oaR0?version=3&amp;hl=en_US" type="application/x-shockwave-flash" width="300" height="169" allowscriptaccess="always" allowfullscreen="true"></embed></object>'+
      '</div>'+
      '</div>';

 var Beetlecontent = '<div id="content">'+
      '<center><h2>2013 Volkswagen Beetle</h2></center>'+
      '<div>'+
      '<p>Just lower the top with a simple push of a button.  The Beetle Convertible'+
	  ' is open to anything, and now it comes with even more than you would expect from'+
	  'one of the most beloved cars of all time, both inside and out.</p>'+
      '</div>'+
	  '<div id="audioPlayer"><audio controls><source src="http://www.toursparkle.com/content/audio/volkswagen_beetle_engine.ogg" type="audio/ogg">'+
  	  '<source src="http://www.toursparkle.com/content/audio/volkswagen_beetle_engine.mp3" type="audio/mpeg">'+
	  'Your browser does not support the audio element.</audio>'+
	  '</div>'+
      '</div>';
	  

 var CCcontent = '<div id="content">'+
      '<center><h2>2013 Volkswagen CC</h2></center>'+
      '<div>'+
      '<p>The perfect car is that much closer.With an even more striking exterior,'+
	  ' youll fall for the CC all over again.</p>'+
      '</div>'+
	  '<div id="audioPlayer"><audio controls><source src="http://www.toursparkle.com/content/audio/volkswagen_CC_engine.ogg" type="audio/ogg">'+
  	  '<source src="http://www.toursparkle.com/content/audio/volkswagen_CC_engine.mp3" type="audio/mpeg">'+
	  'Your browser does not support the audio element.</audio>'+
	  '</div>'+
      '</div>';

 var CRMcontent = '<div id="content">'+
      '<center><h2>Customer Relations Manager</h2></center>'+
      '<div>'+
      '<p>Its my job to assist you with all your needs and to '+ 
	  'make sure you have an exceptional experience.</p>'+
      //'<iframe width="300" height="169" src="http://www.youtube.com/embed/LmzWTqNmhbc" frameborder="0" allowfullscreen></iframe>'+
	  '<object width="300" height="169"><param name="movie" value="http://www.youtube.com/v/LmzWTqNmhbc?hl=en_US&amp;version=3"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/LmzWTqNmhbc?hl=en_US&amp;version=3" type="application/x-shockwave-flash" width="300" height="169" allowscriptaccess="always" allowfullscreen="true"></embed></object>'+
      '</div>';


function addContent() {

  // Set up the map
  var mapOptions = {
    center: VWPlace,
    zoom: 15,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    streetViewControl: true
  };

  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  // We set the map's default panorama and set up some defaults.
  // Note that we don't yet set it visible.
  panorama = map.getStreetView();
  //panorama.setPosition(VWPlace);
  panorama.setPano(StartPano);
  panorama.setPov(/** @type {google.maps.StreetViewPov} */({
    heading: 200,
    pitch: 3,
	zoom: 1
  }));


panorama.setVisible(true);


// Setup the markers and info windows on the map
  
var BDCwindow = new google.maps.InfoWindow({
      content: BDCcontent,
	  disableAutoPan: true,
      maxWidth: 320
  });

var BDCmarker = new google.maps.Marker({
      position: BDC,
      map: map,
	  icon: VWIcon,
      title: 'BDC'
  });

google.maps.event.addListener(BDCmarker, 'click', function() {
    BDCwindow.open(panorama,BDCmarker);
  });

var Partswindow = new google.maps.InfoWindow({content: Partscontent, disableAutoPan: true, maxWidth: 320});
  
var PartsMarker = new google.maps.Marker({
      position: Parts,
      map: map,
      icon: VWIcon,
      title: 'Parts'
  });

google.maps.event.addListener(PartsMarker, 'click', function() {
    Partswindow.open(panorama,PartsMarker);});


var Financewindow = new google.maps.InfoWindow({
	  disableAutoPan: true, 
      content: Financecontent,
      maxWidth: 320
  });
  
var FinanceMarker = new google.maps.Marker({
      position: Finance,
      map: map,
      icon: VWIcon,
	  title: 'Finance'
  });

google.maps.event.addListener(FinanceMarker, 'click', function() {
    Financewindow.open(panorama,FinanceMarker);
  });


var Beetlewindow = new google.maps.InfoWindow({
      content: Beetlecontent,
	  disableAutoPan: true, 
      maxWidth: 320
  });
  
var BeetleMarker = new google.maps.Marker({
      position: Beetle,
      map: map,
      icon: VWIcon,
	  title: 'Beetle'
  });
  
google.maps.event.addListener(BeetleMarker, 'click', function() {
    Beetlewindow.open(panorama,BeetleMarker);
});

var CCwindow = new google.maps.InfoWindow({
      content: CCcontent,
	  disableAutoPan: true, 
      maxWidth: 320
  });

var CCmarker = new google.maps.Marker({
      position: CC,
      map: map,
	  icon: VWIcon,
      title: 'CC'
  });

google.maps.event.addListener(CCmarker, 'click', function() {
    CCwindow.open(panorama,CCmarker);
  });


var CRMwindow = new google.maps.InfoWindow({
      content: CRMcontent,
	  disableAutoPan: true, 
      maxWidth: 320
  });
  
var CRMmarker = new google.maps.Marker({
      position: ServManager,
      map: map,
	  icon: VWIcon,
      title: 'Customer Service Manager',
	  visible: true
  });
  
google.maps.event.addListener(CRMmarker, 'click', function() {
    CRMwindow.open(panorama,CRMmarker);
  });

//markervisibility and persepective moves

function markervis(){

	if (panorama.getPano() == "IpQnxY-zYMaUP9uiCRUxYA")
			{

			CRMmarker.setVisible(true);
			CCmarker.setVisible(true);
			BeetleMarker.setVisible(true);
			FinanceMarker.setVisible(true);
			BDCmarker.setVisible(true);
			PartsMarker.setVisible(true);
			
			BeetleMarker.setPosition(new google.maps.LatLng(45.754558,-108.619285));
			CCmarker.setPosition(new google.maps.LatLng(45.75453,-108.61913));
			FinanceMarker.setPosition(new google.maps.LatLng(45.75434,-108.61916));
			BDCmarker.setPosition(new google.maps.LatLng(45.75435,-108.619097));
			PartsMarker.setPosition(new google.maps.LatLng(45.75434,-108.6192));
			CRMmarker.setPosition(ServManager);
			
			}

	if (panorama.getPano() == "zA-i2S6HSQPZhrAbSpAsAw")
			{
			
			CRMmarker.setVisible(false);
			CCmarker.setVisible(true);
			BeetleMarker.setVisible(true);
			FinanceMarker.setVisible(true);
			BDCmarker.setVisible(true);
			PartsMarker.setVisible(true);
			
			BeetleMarker.setPosition(new google.maps.LatLng(45.75452,-108.61933));
			CCmarker.setPosition(new google.maps.LatLng(45.75453,-108.61913));
	
			}

	if (panorama.getPano() == "n0BdfkayWK0I6IUMxPmejg")
			{
			
			CRMmarker.setVisible(false);
			CCmarker.setVisible(true);
			BeetleMarker.setVisible(true);
			FinanceMarker.setVisible(true);
			BDCmarker.setVisible(true);
			PartsMarker.setVisible(true);
			
			BeetleMarker.setPosition(new google.maps.LatLng(45.75458,-108.61925));
			CCmarker.setPosition(CC);
			FinanceMarker.setPosition(Finance);
			BDCmarker.setPosition(BDC);
			PartsMarker.setPosition(Parts);
	
			}
			
	if (panorama.getPano() == "lmarwPhA8A2MIbpZpyt8IQ")
			{
			
			CRMmarker.setVisible(false);
			CCmarker.setVisible(true);
			BeetleMarker.setVisible(true);
			FinanceMarker.setVisible(true);
			BDCmarker.setVisible(true);
			PartsMarker.setVisible(true);
			
			BeetleMarker.setPosition(new google.maps.LatLng(45.75457,-108.61928));
			CCmarker.setPosition(new google.maps.LatLng(45.754585,-108.6191));
			FinanceMarker.setPosition(new google.maps.LatLng(45.754355,-108.61913));
			BDCmarker.setPosition(new google.maps.LatLng(45.754355,-108.61906));
			PartsMarker.setPosition(new google.maps.LatLng(45.754355,-108.61919));
			CRMmarker.setPosition(ServManager);
			
	
			}
			
	if (panorama.getPano() == "HqPq-ViSl-gnWg6vNrc8sQ")
			{
			
			CRMmarker.setVisible(false);
			CCmarker.setVisible(true);
			BeetleMarker.setVisible(true);
			FinanceMarker.setVisible(true);
			BDCmarker.setVisible(true);
			PartsMarker.setVisible(true);
			
			BeetleMarker.setPosition(new google.maps.LatLng(45.75458,-108.61925));
			CCmarker.setPosition(CC);
	
			}
	
	if (panorama.getPano() == "jMSNqFAMQfCwKeSDH3tf5w")
			{
			
			CRMmarker.setVisible(false);
			CCmarker.setVisible(true);
			BeetleMarker.setVisible(true);
			FinanceMarker.setVisible(true);
			BDCmarker.setVisible(true);
			PartsMarker.setVisible(true);
			
			CCmarker.setPosition(CC);
			FinanceMarker.setPosition(new google.maps.LatLng(45.754355,-108.61913));
			BDCmarker.setPosition(new google.maps.LatLng(45.754355,-108.61906));
			PartsMarker.setPosition(new google.maps.LatLng(45.754355,-108.61919));
	
			}
			
	if (panorama.getPano() == "YifbVvUR9eUmWUGsvpqgEw")
			{
			
			CRMmarker.setVisible(false);
			CCmarker.setVisible(true);
			BeetleMarker.setVisible(true);
			FinanceMarker.setVisible(true);
			BDCmarker.setVisible(true);
			PartsMarker.setVisible(true);
			
			CCmarker.setPosition(CC);
	
			}
			
	if (panorama.getPano() == "0BybWe4R0GIZGX8uY7GyjA")
			{
			
			CRMmarker.setVisible(false);
			CCmarker.setVisible(true);
			BeetleMarker.setVisible(true);
			FinanceMarker.setVisible(false);
			BDCmarker.setVisible(false);
			PartsMarker.setVisible(false);
			
			CCmarker.setPosition(new google.maps.LatLng(45.75456,-108.61915));
			BeetleMarker.setPosition(new google.maps.LatLng(45.7546,-108.61928));
	
			}
		
	if (panorama.getPano() == "k2cm_S8QtT8LwalOJaRVEQ")
			{
			
			CRMmarker.setVisible(false);
			CCmarker.setVisible(true);
			BeetleMarker.setVisible(true);
			FinanceMarker.setVisible(true);
			BDCmarker.setVisible(true);
			PartsMarker.setVisible(false);
			
			CCmarker.setPosition(new google.maps.LatLng(45.75456,-108.61915));
			FinanceMarker.setPosition(new google.maps.LatLng(45.75434,-108.6191));
			BDCmarker.setPosition(new google.maps.LatLng(45.754355,-108.61904));
			BeetleMarker.setPosition(new google.maps.LatLng(45.75459,-108.61928));
	
			}

	if (panorama.getPano() == "608jwJq8FTsb1b0HUjq7PQ")
			{
			
			CRMmarker.setVisible(true);
			CCmarker.setVisible(true);
			BeetleMarker.setVisible(true);
			FinanceMarker.setVisible(false);
			BDCmarker.setVisible(false);
			PartsMarker.setVisible(false);
			
			BeetleMarker.setPosition(new google.maps.LatLng(45.75458,-108.61923));
			CCmarker.setPosition(new google.maps.LatLng(45.75456,-108.61912));
			CRMmarker.setPosition(new google.maps.LatLng(45.7544,-108.61938));
			
			}
			
	if (panorama.getPano() == "hnyRDxk9ZRUBhVG3Q1wb1A")
			{
			
			CRMmarker.setVisible(true);
			CCmarker.setVisible(true);
			BeetleMarker.setVisible(true);
			FinanceMarker.setVisible(false);
			BDCmarker.setVisible(false);
			PartsMarker.setVisible(false);
	
			BeetleMarker.setPosition(new google.maps.LatLng(45.75458,-108.61915));
			CCmarker.setPosition(new google.maps.LatLng(45.75456,-108.6191));
			CRMmarker.setPosition(new google.maps.LatLng(45.75448,-108.61931));

			}

			
	if (panorama.getPano() == "CqGrAXSMaE-shexy0TpoIQ")
			{

			CRMmarker.setVisible(true);
			CCmarker.setVisible(false);
			BeetleMarker.setVisible(false);
			FinanceMarker.setVisible(false);
			BDCmarker.setVisible(false);
			PartsMarker.setVisible(false);

			CRMmarker.setPosition(new google.maps.LatLng(45.75457,-108.6193));

			}
			
	if (panorama.getPano() == "wjJKOjM7pcJYhXq_d_dJuA")
			{

			CRMmarker.setVisible(false);
			CCmarker.setVisible(false);
			BeetleMarker.setVisible(false);
			FinanceMarker.setVisible(false);
			BDCmarker.setVisible(false);
			PartsMarker.setVisible(false);
	
			}			

	if (panorama.getPano() == "mRjmJ0cxp0KhAizrCQwg7g")
			{

			CRMmarker.setVisible(false);
			CCmarker.setVisible(false);
			BeetleMarker.setVisible(false);
			FinanceMarker.setVisible(false);
			BDCmarker.setVisible(false);
			PartsMarker.setVisible(false);
	
			}

	if (panorama.getPano() == "dvW1f8t2d10mLx9XwEhF0w")
			{

			CRMmarker.setVisible(true);
			CCmarker.setVisible(true);
			BeetleMarker.setVisible(true);
			FinanceMarker.setVisible(true);
			BDCmarker.setVisible(true);
			PartsMarker.setVisible(true);
	
			}

	if (panorama.getPano() == "JOUAnAL9DVyT7Q98KCAT2Q")
			{

			CRMmarker.setVisible(true);
			CCmarker.setVisible(true);
			BeetleMarker.setVisible(true);
			FinanceMarker.setVisible(true);
			BDCmarker.setVisible(true);
			PartsMarker.setVisible(true);
	
			}
			
	if (panorama.getPano() == "RFPr6WSJUFg8vupd6qVNPw")
			{

			CRMmarker.setVisible(true);
			CCmarker.setVisible(true);
			BeetleMarker.setVisible(true);
			FinanceMarker.setVisible(true);
			BDCmarker.setVisible(true);
			PartsMarker.setVisible(true);

			CCmarker.setPosition(new google.maps.LatLng(45.75458,-108.61915));

			}
			
	if (panorama.getPano() == "NBQw5QLxXFLBjsFC51bBgA")
			{

			CRMmarker.setVisible(true);
			CCmarker.setVisible(true);
			BeetleMarker.setVisible(true);
			FinanceMarker.setVisible(true);
			BDCmarker.setVisible(true);
			PartsMarker.setVisible(true);
	
			}		

	if (panorama.getPano() == "CJ3a2kWd2gEL-toAJoTJrA")
			{

			CRMmarker.setVisible(true);
			CCmarker.setVisible(true);
			BeetleMarker.setVisible(true);
			FinanceMarker.setVisible(true);
			BDCmarker.setVisible(true);
			PartsMarker.setVisible(true);
	
			}		

	if (panorama.getPano() == "_a7qkEmXxLUhsr1Inyn-kQ")
			{

			CRMmarker.setVisible(true);
			CCmarker.setVisible(true);
			BeetleMarker.setVisible(true);
			FinanceMarker.setVisible(true);
			BDCmarker.setVisible(true);
			PartsMarker.setVisible(true);
	
			}
			
	if (panorama.getPano() == "VrrVVEs95nOlPumxX9TQ9g")
			{

			CRMmarker.setVisible(true);
			CCmarker.setVisible(true);
			BeetleMarker.setVisible(true);
			FinanceMarker.setVisible(true);
			BDCmarker.setVisible(true);
			PartsMarker.setVisible(true);
			
			
			CRMmarker.setPosition(new google.maps.LatLng(45.75450,-108.6194));
			BeetleMarker.setPosition(new google.maps.LatLng(45.75456,-108.61935));
	
			}

	if (panorama.getPano() == "q620QztFfPbI9ogwKcgsNQ")
			{

			CRMmarker.setVisible(true);
			CCmarker.setVisible(true);
			BeetleMarker.setVisible(true);
			FinanceMarker.setVisible(true);
			BDCmarker.setVisible(true);
			PartsMarker.setVisible(true);
	
			}	
			
	if (panorama.getPano() == "AeR3KMX9_LFVse1zg4-goQ")
			{

			CRMmarker.setVisible(true);
			CCmarker.setVisible(true);
			BeetleMarker.setVisible(true);
			FinanceMarker.setVisible(true);
			BDCmarker.setVisible(true);
			PartsMarker.setVisible(true);
			
			CRMmarker.setPosition(new google.maps.LatLng(45.75449,-108.6194));
			BeetleMarker.setPosition(new google.maps.LatLng(45.7546,-108.61927));

	
			}		
	
	if (panorama.getPano() == "GNT5XCBRc7DGGnCvE7HZvA" ||
		panorama.getPano() == "ibIUsIR9EeR-WZkgIoS2og" ||
		panorama.getPano() == "u9WKLC_DetSfLLh3jomTjw" || 
		panorama.getPano() == "ADMbp-G8SMOLwfH4OdiZaQ" || 
		panorama.getPano() == "9rZ6OY6fHlh_RmMA4pCFlQ" || 
		panorama.getPano() == "jPvwL3Ccvn6L7SDWz-Yb2A" || 
		panorama.getPano() == "6GHqfZA389OLtfabSl09Yg" ||
		panorama.getPano() == "mZ82qqu2YmnBAjjlKQRcWw" ||
		panorama.getPano() == "s6mHLmmyREGVarKpASKDMA" ||
		
		panorama.getPano() == "UshAngUqT0ckYqKrCbX0BA" ||
		panorama.getPano() == "VyhHJ-KWdfxWlZDWje28Mw" ||
		panorama.getPano() == "FeVSkGJGqJNQJvEKuMkCYA" ||
		panorama.getPano() == "vOBO0eU-aLo-jobiG0p6TA"
		
		)
			{

			CRMmarker.setVisible(false);
			CCmarker.setVisible(false);
			BeetleMarker.setVisible(false);
			FinanceMarker.setVisible(false);
			BDCmarker.setVisible(false);
			PartsMarker.setVisible(false);
	
			}		
	
}

// event listeners
  google.maps.event.addListener(panorama, 'pano_changed', function() {
	  markervis();
  });

}


google.maps.event.addDomListener(window, 'load', addContent);

</script>
  
</head>
<body>

<div id="map-canvas" style="width:100%; height: 100%;"></div>

  </body>
</html>