// request functions
$(document).ready(function() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(timeToFlySimpleGotPosition, timeToFlyRequestSimpleNoPosition);
  } else {
    console.log("No geolocation functionality found in browser");
    timeToFlyRequestSimpleNoPosition();
  }
});

function timeToFlyRequestList() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(timeToFlyListGotPosition, timeToFlyRequestListNoPosition);
  } else {
    console.log("No geolocation functionality found in browser");
    timeToFlyRequestListNoPosition();
  }
}

// no personalize position request functions
function timeToFlyRequestSimpleNoPosition( error=null ) {
  $.getJSON( "/api/timetofly/get/simple", function( data ) {
    console.log("Got data for simple without personalized location");
    timeToFlyDisplaySimple(data);
  });
}

function timeToFlyRequestListNoPosition( error=null ) {
  $.getJSON( "/api/timetofly/get/list", function( data ) {
    console.log("Got data for list without personalized location");
    timeToFlyDisplayList(data);
  });
}

// personalize position request functions
function timeToFlySimpleGotPosition(position) {
  $.getJSON( "/api/timetofly/get/simple", {long: position.coords.longitude, lat: position.coords.latitude}, function( data ) {
    console.log("Got data for simple with personalized location");
    timeToFlyDisplaySimple(data);
  });
}

function timeToFlyListGotPosition(position) {
  $.getJSON( "/api/timetofly/get/list", {long: position.coords.longitude, lat: position.coords.latitude}, function( data ) {
    console.log("Got data for list with personalized location");
    timeToFlyDisplayList(data);
  });
}

// display functions
function timeToFlyDisplaySimple(data) {
  $("#timeToFlySimple").html("<abbr title='" + data.location + "'>" + data.day + " <b>in " + data.duration + "</b> at " + data.time + " it will be <b>" + data.event + "</b>.");
}

function timeToFlyDisplayList(data) {
  $('#timeToFlyList').html("");
  $('#timeToFlyList').append('<table id="timeToFlyListTable"></table>');
    var table = $('#timeToFlyList').children();
    table.append('<tr><th>Date</th><th>Day</th><th>Sunrise</th><th>Sunset</th><th>Duration</th></tr>');
    for(var i = 0; i < data.length; i++) {
      table.append( "<tr><td>" + data[i].date + "</td><td>" + data[i].day + "</td><td>" + data[i].sunrise + "</td><td>" + data[i].sunset + "</td><td>" + data[i].duration + "</td></tr>" );
    }
}
