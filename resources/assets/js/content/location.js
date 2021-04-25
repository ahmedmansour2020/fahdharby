$(document).ready(function() {
    $('#location').on('click', function() {
        $('.location').removeClass('hidden');
        $('.no-location').addClass('hidden');
    })
})

initMap();

function initMap() {
    var zoom;
    if (type == 1) {
        if ($('#lat').val() == "" || $('#lng').val() == "") {
            var myLatlng = {
                lat: $lat * 1,
                lng: $lng * 1
            };
            zoom = 8;
        } else {

            var myLatlng = {
                lat: $('#lat').val() * 1,
                lng: $('#lng').val() * 1
            };
            zoom = 12;
        }
    } else {
        var myLatlng = {
            lat: $lat * 1,
            lng: $lng * 1
        };
        zoom = 8;
    }


    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: zoom,
        center: myLatlng,
    });
    // Create the initial InfoWindow.
    let infoWindow = new google.maps.InfoWindow({
        content: JSON.stringify(myLatlng),
        position: myLatlng,
    });
    infoWindow.open(map);
    // Configure the click listener.
    map.addListener("click", (mapsMouseEvent) => {
        // Close the current InfoWindow.
        infoWindow.close();
        // Create a new InfoWindow.
        infoWindow = new google.maps.InfoWindow({
            position: mapsMouseEvent.latLng,
        });
        infoWindow.setContent(
            JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
        );
        infoWindow.open(map);
        $('#lat').val(mapsMouseEvent.latLng.toJSON().lat)
        $('#lng').val(mapsMouseEvent.latLng.toJSON().lng)
    });
}