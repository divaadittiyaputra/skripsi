<!DOCTYPE html> 
<html> 
<head> 
<meta name=viewport content="user-scalable=no,width=device-width" />
<link rel="stylesheet" href="lib/jqm.css" />
<script src="lib/jq.js"></script>
<script src="lib/jqm.js"></script>
<script src="lib/twitter.js"></script>
<script src=http://maps.googleapis.com/maps/api/js?sensor=true></script>
</head> 

<body> 

<div data-role=page id=win2 data-add-back-btn=true>
  <div data-role=header>
    <h1>Map Jogja</h1>
    <div data-role="navbar">
		<ul>
			<li><a href="#win2" data-icon="home" data-theme="b" class="ui-btn-active">Map</a></li>
			<li><a href="#location" data-icon="star" data-theme="b" id="location">Location Info</a></li>
            <li><a href="#twitfic" data-icon="grid" data-theme="b">Tweet Traffic</a></li>
		</ul>
    </div>
    <a href="#direct" data-icon="gear" class="ui-btn-right" id="list">Direct</a>
  </div>

  <div data-role=content>
  </div>
</div>

<div data-role=page id=setlokasi data-add-back-btn=true>
  <div data-role=header>
    <h1>Lokasi</h1>
  </div>

  <div data-role=content>
    
  </div>
</div>

<div data-role=page id=input data-add-back-btn=true>
  <div data-role=header>
    <h1>Input Lokasi</h1>
  </div>

  <div data-role=content>
    <span> Latitude : </span> <input type=text id=lat />
    <span> Longitude : </span> <input type=text id=lng />
    <span> Nama Lokasi : </span> <input type=text id=nama />
    <span> Deskripsi : </span> <input type=text id=ket />
    <a data-role=button id=btn>Add Location</a>
  </div>
</div>

<!--tab 2-->
<div data-role="page" id="location">
    <header data-role="header">
        <h1>Jogja Way</h1>
        <div data-role="navbar">
		<ul>
			<li><a href="#win2" data-icon="home" data-theme="b">Map</a></li>
			<li><a href="#location" data-icon="star" data-theme="b" class="ui-btn-active" id="location">Location Info</a></li>
            <li><a href="#twitfic" data-icon="grid" data-theme="b">Tweet Traffic</a></li>
		</ul>
	</div>
    </header>
      
<div data-role="content"> 
		<div class="content-primary" >	
			<ul data-role="listview" data-filter="true" data-inset="true" id="listlokasi"> 
				<!--<li><a href="index.html">Jl Ahmad Yani</a></li> 
				<li><a href="index.html">Jl Abimanyu</a></li> 
				<li><a href="index.html">Jl Abu Bakar Ali</a></li> 
				<li><a href="index.html">Jl Achmad Jazuli</a></li> 
				<li><a href="index.html">Jl Affandy</a></li> 
				<li><a href="index.html">Jl Babaran</a></li> 
				<li><a href="index.html">Jl Babarsari</a></li> 
				<li><a href="index.html">Jl Balapan</a></li> 
				<li><a href="index.html">Jl C. Simanjuntak</a></li> 
				<li><a href="index.html">Jl Cik Ditiro</a></li> 
				<li><a href="index.html">Jl Dagen</a></li> 
				<li><a href="index.html">Jl Damai</a></li> 
				<li><a href="index.html">Jl Demangan</a></li> 
				<li><a href="index.html">Jl gadean</a></li> 
				<li><a href="index.html">Jl Gading</a></li> 
				<li><a href="index.html">Jl Gambiran</a></li> 
				<li><a href="index.html">Jl Gayam</a></li> 
				<li><a href="index.html">Jl Glagah sari</a></li> 
				<li><a href="index.html">Jl Hayam Wuruk</a></li> 
				<li><a href="index.html">Jl Hos Cokroaminoto</a></li> 
				<li><a href="index.html">Jl Imogiri</a></li> 
				<li><a href="index.html">Jl Janti</a></li> -->
			</ul> 
		  </div>
</div>     
</div>
<!--tab 3-->
<div data-role="page" id="twitfic">
    <header data-role="header">
        <h1>Jogja Way</h1>
        <div data-role="navbar">
		<ul>
			<li><a href="#win2" data-icon="home" data-theme="b">Map</a></li>
			<li><a href="#location" data-icon="star" data-theme="b" id="location">Location Info</a></li>
            <li><a href="#twitfic" data-icon="grid" data-theme="b" class="ui-btn-active">Tweet Traffic</a></li>
		</ul>
	</div>
    </header>
      
    <div data-role="content" id="tweets">
      
    </div>
</div>

<div data-role=page id=direct data-add-back-btn=true>
  <div data-role=header>
    <h1>Direction</h1>
  </div>

  <div data-role=content>
    <span> From : </span>
    <select id="darisel" name="darisel">
      <option value="0">Senopati</option>
      <option value="1">Mayor Suryotomo</option>
      <option value="2">Mataram</option>
      <option value="3">Abu Bakar Ali</option>
      <option value="4">Malioboro</option>
      <option value="5">Achmad Yani</option>
      <option value="6">sultan Agung</option>
      <option value="7">Trikora</option>
      <option value="8">Kleringan</option>
      <option value="9">Pangeran Mangkubumi</option>
    </select>
    <span> To : </span>
    <select id="kesel" name="kesel">
      <option value="0">Senopati</option>
      <option value="1">Mayor Suryotomo</option>
      <option value="2">Mataram</option>
      <option value="3">Abu Bakar Ali</option>
      <option value="4">Malioboro</option>
      <option value="5">Achmad Yani</option>
      <option value="6">sultan Agung</option>
      <option value="7">Trikora</option>
      <option value="8">Kleringan</option>
      <option value="9">Pangeran Mangkubumi</option>
    </select>
    <br>
    <a data-role=button id="dir">Found Direction</a>
  </div>
</div>
</body>
</html>

<script>



function kasihtanda(lokasi,peta){
    $("#lat").val(lokasi.lat());
    $("#lng").val(lokasi.lng());
    tanda = new google.maps.Marker({
        position: lokasi,
        map: peta
	});
	$.mobile.changePage($("#input"));
}

function map(lat,lng) {
   var latlng = new google.maps.LatLng (lat, lng);
  var options = { 
    zoom : 15, 
    center : latlng, 
    mapTypeId : google.maps.MapTypeId.ROADMAP 
  };
  var $content = $("#win2 div:jqmData(role=content)");
  $content.height (screen.height - 90);
  var map = new google.maps.Map ($content[0], options);
  $.mobile.changePage ($("#win2"));
  
  new google.maps.Marker ( 
  { 
    map : map, 
    animation : google.maps.Animation.DROP,
    position : latlng  
  });  
  
  /*var flightPlanCoordinates = [
            new google.maps.LatLng(-7.804537398024891, 110.40181961534427),
            new google.maps.LatLng(-7.798797452487451, 110.40246335450684),
	    new google.maps.LatLng(-7.798542341968503, 110.40999498842166),
        ];
  var flightPath = new google.maps.Polyline({
          path: flightPlanCoordinates,
          strokeColor: '#FF0000',
          strokeOpacity: 1.0,
          strokeWeight: 2
        });
   flightPath.setMap(map);*/
   
   google.maps.event.addListener(map,'click',function(event){
        kasihtanda(event.latLng,map);
    });
}

function setlokasi(lat,lng){
  var id = "#setlokasi";
  var lks = new google.maps.LatLng (lat, lng);
  var options = { 
    zoom : 15, 
    center : lks, 
    mapTypeId : google.maps.MapTypeId.ROADMAP 
  };
  var $content = $(id+" div:jqmData(role=content)");
  $content.height (screen.height - 20);
  var map = new google.maps.Map ($content[0], options);
  $.mobile.changePage ($(id));
  
  new google.maps.Marker ( 
  { 
    map : map, 
    animation : google.maps.Animation.DROP,
    position : lks  
  }); 
}

navigator.geolocation.getCurrentPosition (function (pos)
{
  var latm = pos.coords.latitude;
  var lngm = pos.coords.longitude;
  /*$("#latmap").val (lat);
  $("#lngmap").val (lng);*/
  map(latm,lngm)
});

$("#btn").bind ("click", function (event)
{
  $.post("http://192.168.1.101/gis/postlokasi.php",{lat: $("#lat").val(), lng: $("#lng").val(), nama: $("#nama").val(), ket: $("#ket").val(), post: "lokasi"},function(data){
    alert(data);
    $.mobile.changePage ($("#win2"));
    });
});

//$("#location").click(function(){
$.post("http://192.168.1.101/gis/json.php",{q:"jalan"},function(data){
    var jalan = $.parseJSON(data);
    var srcjl = "";
    var j = 0;
    var desa = new Array();
    $.each(jalan,function(){
      srcjl += "<li><a href='javascript:setlokasi("+this['x']+","+this['y']+")'>"+this['nama']+"</a></li>";
      desa[j] = new Array(this['x'],this['y'],this['nama']);
      j++;
    });
    $("#listlokasi").html(srcjl);


  

  
	NilaiAcuan = 100;
	var jarak = new Array(9);
	var x = NilaiAcuan;
	var i;
	var radiusdesa = 10;
	// koordinat
	
	/*for (i=0; i < 10;i++) {
	  var idx = i + 1;
	  $.post("http://192.168.1.39/gis/json.php",{q:"jarak",id:idx},function(data){
	    jarak[i] = new Array(data);
	  });
	}*/
	
	/*
	var desa = new Array();
	desa[0] = new Array(550,610,"A Yani");
	desa[1] = new Array(450,580,"Gondomanan");
	desa[2] = new Array(680,825,"Mayor Suryatmo");
	desa[3] = new Array(560,830,"Mataram");
	desa[4] = new Array(390,420,"Malioboro");*/
	

	//data matriks jarak
	
	jarak[0] = new Array(0,0.5,1,1.8,2,2.7,1.4,0.9,3.5,3.9);
	jarak[1] = new Array(0.5,0,0.55,1.3,1.5,2.2,0.95,0.55,3.7,3.1);
	jarak[2] = new Array(1,0.55,0,0.75,0.95,1.7,1.5,1.1,3.2,2.5);
	jarak[3] = new Array(1.4,1.4,0.85,0,0.18,0.9,2.3,1.5,2.4,1.8);
	jarak[4] = new Array(1.3,1.8,1.6,0.75,0,0.7,2.6,1.3,2.6,2.5);
	jarak[5] = new Array(0.55,1.1,0.4,1.2,1.3,0,1.9,0.55,3,3.1);
	jarak[6] = new Array(1.4,1,1.4,2.2,2.4,3.1,0,0.95,4,3.3);
	jarak[7] = new Array(0.9,0.55,1.1,1.5,1.3,0.55,0.95,0,3.6,3.9);
	jarak[8] = new Array(1.8,1.7,1.1,0.35,0.55,1.3,2.1,1.8,0,2);
	jarak[9] = new Array(2.6,3.1,1.9,1.1,1.3,2,2.8,2.6,0.9,0);


	

	
	// ambil data dari matriks jarak
	function bobot(a,b)
	{
		return jarak[a][b];
	}
	
	function floydwarshall(Awal,Akhir)
	{
		

		Awal = parseInt(Awal);
		Akhir = parseInt(Akhir);
		JumlahVerteks = jarak.length;
		var Posisi= new Array(JumlahVerteks);
		var Kunjungan = new Array(JumlahVerteks);
		var Sebelum= new Array(JumlahVerteks);
		var TakTerdefinisi = -1;
		var i;
		var Verteks;
		var Berhenti;

		//inisialisasi array;
		for(i=0; i<JumlahVerteks; i++)
		{
			Posisi[i]= NilaiAcuan; //nilai acuan = 10000;
			Sebelum[i]= TakTerdefinisi; //tak terdefinisi = -1;
			Kunjungan[i]= false;
			
		}
		
		Posisi[Awal]=0;
				
		for (Verteks =0; Verteks < JumlahVerteks; Verteks++)
		{
			var JarakTerpendek = NilaiAcuan;
			Berhenti = -1;
			for (i=0; i < JumlahVerteks; i++)
			{
				if (!Kunjungan[i])
				{
					if (Posisi[i] <= JarakTerpendek)
					{
						JarakTerpendek = Posisi[i];
						Berhenti = i;
					}
				}
			}
			Kunjungan[Berhenti] = true;
			for (i=0; i < JumlahVerteks; i++)
			{
				if (!Kunjungan[i])
				{
					var w = bobot(Berhenti, i);
					if (Posisi[Berhenti]+w < Posisi[i])
					{
						Posisi[i] = Posisi[Berhenti] + w;
						Sebelum[i] = Berhenti;
					}
				}
			}
			
					
			
		}	
		
		i=Akhir;	
		
		if (Posisi[i] < NilaiAcuan)
		{
			var Lintasan = desa[i][2];
			var Verteks = i;
			var Asal = i;

			
			while (Verteks>=0)
			{	
				 p=
				Verteks = Sebelum[Verteks];
				if (Verteks>=0) 
				{
					Lintasan = desa[Verteks][2] + '->' + Lintasan;
					Asal = Verteks;
					
				}
				
				
			}
 
			alert("Jarak :" + Posisi[i]+' km ('+Lintasan+')');

			
		}else
		{
			alert("Tidak ada Jalur")
		}
	}
  
  
  $("#dir").click(function(){
  var dari = $("#darisel").val();
  var ke = $("#kesel").val();
  floydwarshall(dari,ke);
  //alert(jarak[0][1]);
  //alert(desa[1]);
  });

});  
</script>