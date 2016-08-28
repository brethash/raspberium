@extends('layouts.master')
    @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Fixed Layout
                <small>Blank example to the fixed layout</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Layout</a></li>
                <li class="active">Fixed</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="callout callout-info">
                <h4>Tip!</h4>

                <p>Add the fixed class to the body tag to get this layout. The fixed layout is your best option if your sidebar
                    is bigger than your content because it prevents extra unwanted scrolling.</p>
            </div>
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Title</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="viv1temp_div"></div>
                    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                    <script type="text/javascript">
                        google.load("visualization", "1", {packages:["gauge"]});
                        google.setOnLoadCallback(drawChart);
                        function drawChart() {

                            var data = google.visualization.arrayToDataTable([
                                ['Label', 'Value'],
                                ['1 TMP', 80]
                            ]);

                            var options = {
                                width: 400, height: 200,
                                redFrom: 26.6, redTo: 100,
                                yellowFrom:20, yellowTo: 25.5,
                                minorTicks: 5
                            };

                            var chart = new google.visualization.Gauge(document.getElementById('viv1temp_div'));

                            chart.draw(data, options);


                        }
                    </script>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Footer
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    @stop