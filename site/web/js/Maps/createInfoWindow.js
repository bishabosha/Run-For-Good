function createInfoWindow(report, marker){
    
    var tableStart = "<table class='reportInfoWindow'>";
    var tableHeadStart = "<thead>";
    var tableHeadEnd = "</thead><tbody>";
    var tableEnd = "</tbody></table>";
    
    var sponsor = "<tr><td colspan='2'>" + report.sponsor + "</td></tr>";
    var img = "<tr><td colspan='2'><img src='" + report.img + "'/></td></tr>";
    
    var infoWindowContent;
   
        infoWindowContent = tableStart + tableHeadStart + sponsor + tableHeadEnd + img + tableEnd;
    
    marker.addListener('click', function() {
        infoWindow.setContent(infoWindowContent);
        infoWindow.open(map, marker);
    });
}