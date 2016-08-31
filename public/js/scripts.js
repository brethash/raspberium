var temperatureOptions = {
    width: 400, height: 200,
    yellowFrom: 0, yellowTo: 20,
    greenFrom: 20, greenTo: 30,
    redFrom: 30, redTo: 50,
    minorTicks: 5,
    min: 0,
    max: 50
};

var humidityOptions = {
    width: 400, height: 200,
    redFrom: 10, redTo: 30,
    yellowFrom: 30, yellowTo: 55,
    greenFrom: 55, greenTo: 100,
    minorTicks: 5,
    min: 10,
    max: 100
};

$(function(){

    updateGauge('humidityGauge', 'Humidity', 10, humidityOptions);
    updateGauge('temperatureGauge', 'Temp', 0, temperatureOptions);
    //getTemperatureHumidity();

    var interval = setInterval(getTemperatureHumidity, 7000);

    $('#checkTemperatureHumidity').click(function(e){
        e.preventDefault();
        getTemperatureHumidity();
    });

    function getTemperatureHumidity() {
        $.get({
            url: '/sensors/temperature-humidity',
            dataType: 'json',
            success: function(data){
                if (data != '') {
                    updateGauge('humidityGauge', 'Humidity', data['humidity'], humidityOptions);
                    updateGauge('temperatureGauge', 'Temp', data['temperature'], temperatureOptions);
                }
            }
        })
    }

});



google.load("visualization", "1", {packages:["gauge"]});

function updateGauge(id,label,newData,options) {

    var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        [label, parseFloat(newData)]
    ]);

    google.load("visualization", "1", {packages:["gauge"]});
    var chart = new google.visualization.Gauge(document.getElementById(id));

    chart.draw(data, options);
}