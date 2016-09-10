"use strict";

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

var todayOptions = {
    title: 'Today\'s Averages',
    curveType: 'function',
    legend: { position: 'bottom' }
};

google.load("visualization", "1", {packages:["corechart"]});

// Initiate graphs
updateGraph('todayGraph', todayData, todayOptions);

// Update today graph every minute
setTimeout(updateGraph('todayGraph', todayData, todayOptions), 60000);

function updateGraph(id,newData,options) {

    var data = new google.visualization.DataTable();
    data.addColumn('datetime', 'Time');
    data.addColumn('number', 'Temperature');
    data.addColumn('number', 'Humidity');
    data.addRows(newData);

    google.load("visualization", "1", {packages:["corechart"]});
    var chart = new google.visualization.LineChart(document.getElementById(id));

    chart.draw(data, options);
}