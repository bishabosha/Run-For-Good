function createMarker(location, type, report) {
    
    var iconURL = getIcon(type);
    
    var image = {
        url: iconURL,
        size: new google.maps.Size(50, 50),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(26, 48)
    };
    
    var marker = new google.maps.Marker({
        position: location,
        title: 'Sponsored by: ' + report.sponsor,
        icon: image
    });
    
    createInfoWindow(report, marker);
    marker.setMap(map);
    
    return marker;
}