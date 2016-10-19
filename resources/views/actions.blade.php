@extends('layouts.master')
    @section('title', 'Raspberium - Actions')
    @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard - Actions
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Actions</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Actions</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div>
                        <h3>Lighting System Control</h3>
                        <ul>
                            <li><button id="light1On">Turn Light 1 On</button></li>
                            <li><button id="light1Off">Turn Light 1 Off</button></li>
                            <li><button id="light2On">Turn Light 2 On</button></li>
                            <li><button id="light2Off">Turn Light 2 Off</button></li>
                        </ul>
                    </div>
                    <div>
                        <h3>Misting System Control</h3>
                        <ul>
                            <li class="btn-group">
                                <button class="btn btn-default" id="pump1On" data-device="mistingSystem1" data-state="on">Turn Pump On</button>
                                <button class="btn btn-default" id="pump1Off" data-device="mistingSystem1" data-state="off">Turn Pump Off</button>
                            </li>
                        </ul>
                    </div>
                    <div class="button-box col-md-4">
                        <h3>Fan System Control</h3>
                        <ul>
                            <li class="btn-group">
                                <button class="btn btn-default" id="fan1On" data-device="fan1" data-state="on">Turn Fan On</button>
                                <button class="btn btn-default" id="fan1Off" data-device="fan1" data-state="off">Turn Fan Off</button>
                            </li>
                        </ul>
                    </div>

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