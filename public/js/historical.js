"use strict";

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