function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 3,
        center: {lat: 48.6733, lng: 33.1106}
    });

    markers = [];
    bounds = new google.maps.LatLngBounds();
    infowindow = new google.maps.InfoWindow();

    refreshLocations();
}

function addMarker(location) {
    marker = new google.maps.Marker({
        position: location,
        map: map
    });

    bounds.extend(marker.position);
    markers.push(marker);

    return marker;
}

function removeAll() {
    for (let i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
    }

    markers = [];
    bounds = new google.maps.LatLngBounds();
}

function reCenter()
{
    map.fitBounds(bounds);
}

function refreshLocations() {
    if (!document.hidden) {
        $.ajax({
            url: "/markers/",
            method: "GET",
            success: function (newLocations) {
                //todo workaround because of returning text/html even if ->json();
                if (typeof newLocations === "string") {
                    newLocations = JSON.parse(newLocations);
                }
                let isSame = (newLocations.length === markers.length) && newLocations.every(function(element, index) {
                    return element[0] === markers[index].getPosition().lat()
                        && element[1] === markers[index].getPosition().lng();
                });

                if (isSame) {
                    return;
                }

                removeAll();
                for (let i = 0; i < newLocations.length; i++) {
                    addMarker(new google.maps.LatLng(newLocations[i][0], newLocations[i][1]));
                }
                reCenter();
            },
            error: function (error) {
                console.log(`Error ${error}`);
            }
        });
    }

    setTimeout(refreshLocations, 5000);
}

Livewire.on('markersChanged', locations => {
    removeAll();
    for (let i = 0; i < locations.length; i++) {
        addMarker(new google.maps.LatLng(locations[i][0], locations[i][1]));
    }
    reCenter();
})

