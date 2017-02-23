@extends('layouts.master')
    @section('title', 'Raspberium - Home')
    @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard - Home
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Home</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <h3 class="box-title">Monitoring</h3>
                    <div class="gauges">
                        <div id="humidityGauge" class="home-gauge"></div>
                        <div id="temperatureGauge" class="home-gauge"></div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    @stop
    @section('scripts')
        <!-- Google Graphs API -->
        <script src="/js/jsapi.js"></script>
        <script src="/js/home.js"></script>
    @stop