@extends('layouts.master')
    @section('title', 'Raspberium - Actions')
    @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Historical
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Historical</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @if($today != '')
            <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <h3 class="box-title">Today</h3>
                    <div id="todayGraph"></div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            @endif
            @if($weekly != '')
            <div class="box">
                <div class="box-body">
                    <h3 class="box-title">Weekly</h3>
                    <div id="weeklyGraph"></div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            @endif
            @if($monthly != '')
            <div class="box">
                <div class="box-body">
                    <h3 class="box-title">Monthly</h3>
                    <div id="todayGraph"></div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            @endif
            @if($yearly != '')
            <div class="box">
                <div class="box-body">
                    <h3 class="box-title">Yearly</h3>
                    <div id="todayGraph"></div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            @endif
        </section>
        <!-- /.content -->
    @stop
    @section('scripts')
    <!-- Google Graphs API -->
    <script src="/js/jsapi.js"></script>
    <script>
        google.load("visualization", "1", {packages:["corechart"]});
        @if($today != '')
        var todayData = [ {!! $today !!} ];
        @endif

        @if($weekly != '')
        var weeklyData = [ {!! $weekly !!} ];
        @endif

        @if($monthly != '')
        var montlyData = [ {!! $monthly !!} ];
        @endif

        @if($yearly != '')
        var yearlyData = [ {!! $yearly !!} ];
        @endif
    </script>
    <script src="/js/historical.js"></script>

    @stop