function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

$.ajax({
    url: 'index.php?r=site/training&id=' + getParameterByName('id'),
    dataType: 'json',
    success: function(result) {
        var date = [];
        var duration = [];
        var length = [];
        var avghr = [];
        for (var i = 0; i < result.length; i++) {
            date.push(result[i].Date);
            duration.push(result[i].Duration);
            length.push(result[i].Length);
            avghr.push(result[i].AvgHr);
        }
        var data = {
            labels: date,
            datasets: [
                {
                    label: "Length",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: length
                }
            ]
        };

        var ctx = document.getElementById("time-container").getContext("2d");
        new Chart(ctx).Line(data);

        var datax = {
            labels: date,
            datasets: [
                {
                    label: "Average Heartrate",
                    fillColor: "#372",
                    strokeColor: "#372",
                    pointColor: "#372",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "#372",
                    data: avghr
                }
            ]
        };

        var ctxx = document.getElementById("heartrate-container").getContext("2d");
        new Chart(ctxx).Line(datax);
    }
});