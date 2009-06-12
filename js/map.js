var bounds = new GLatLngBounds();

function showAddress(map, visitor, open) {
  var geocoder = new GClientGeocoder();
  geocoder.getLatLng(
    visitor['location'],
    function(point) {
      if (!point) {
        alert(visitor['location'] + " not found");
      } else {
        bounds.extend(point);
        map.setCenter(bounds.getCenter(), map.getBoundsZoomLevel(bounds));
        var marker = new GMarker(point);
        map.addOverlay(marker);
        body = "<p><h3>" + visitor['name'] + "</h3></p><p>" + visitor['message'] + "</p><p><a href='" + visitor['tinyurl'] + "'>My TinyUrl</a></p>";
        if(open) { marker.openInfoWindowHtml(body); } else { marker.bindInfoWindowHtml(body); } 
      }
    }
  );
}

function load(open) {
  if (GBrowserIsCompatible()) {
    var map = new GMap2(document.getElementById('map'));
    map.enableScrollWheelZoom();
    map.addControl(new GMapTypeControl());
    map.addControl(new GLargeMapControl());
    if(visitors.length == 0) { map.setCenter(new GLatLng('40.0160', '-105.2630'), 13); }
    for(var i in visitors) {
      showAddress(map, visitors[i], open);
    }  
    locBox = document.getElementById('location');
    if(locBox) locBox.value = sGeobytesLatitude + ", " + sGeobytesLongitude;
  } else {
    alert('Incompatible browser! You will not be able to see the pretty map!');
  }
}

function removeApostrophes(form) {
  form.name.value = form.name.value.replace("'", "");
  form.location.value = form.location.value.replace("'", "");
  form.message.value = form.message.value.replace("'", "");
}
