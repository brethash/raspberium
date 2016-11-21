@extends('layouts.master')
    @section('title', 'Raspberium - Actions')
    @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Actions
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
                <div class="box-body">
                    <div class="alert-box">
                        <h2></h2>
                    </div>
                    <div class="button-box col-md-4">
                        <h3>Lighting System Control</h3>
                        <ul>
                            <li class="btn-group">
                                <button class="btn btn-default
                                        @if ($light1['state'] == 'on')
                                        btn-primary
                                        @endif
                                        "
                                        id="light1On"
                                        data-device="light1"
                                        data-state="on"

                                >Turn Light 1 On</button>
                                <button class="btn btn-default
                                        @if ($light1['state'] == 'timer')
                                        btn-primary
                                        @endif
                                        "
                                        id="light1Timer"
                                        data-device="light1"
                                        data-state="timer"
                                >Timer</button>
                                <button class="btn btn-default
                                        @if ($light1['state'] == 'off')
                                        btn-primary
                                        @endif
                                        "
                                        id="light1Off"
                                        data-device="light1"
                                        data-state="off"
                                >Turn Light 1 Off</button>
                            </li>
                        </ul>
                        <ul>
                            <li class="btn-group">
                                <button class="btn btn-default
                                        @if ($light2['state'] == 'on')
                                        btn-primary
                                        @endif
                                        "
                                        id="light2On"
                                        data-device="light2"
                                        data-state="on"
                                >Turn Light 2 On</button>
                                <button class="btn btn-default
                                        @if ($light2['state'] == 'timer')
                                        btn-primary
                                        @endif
                                        "
                                        id="light2Timer"
                                        data-device="light2"
                                        data-state="timer"
                                >Timer</button>
                                <button class="btn btn-default
                                        @if ($light2['state'] == 'off')
                                        btn-primary
                                        @endif
                                        "
                                        id="light2Off"
                                        data-device="light2"
                                        data-state="off"
                                >Turn Light 2 Off</button>
                            </li>
                        </ul>
                    </div>
                    <div class="button-box col-md-4">
                        <h3>Misting System Control</h3>
                        <ul>
                            <li class="btn-group">
                                <button class="btn btn-default
                                        @if ($pump1['state'] == 'on')
                                        btn-primary
                                        @endif
                                        "
                                        id="pump1On"
                                        data-device="mistingSystem1"
                                        data-state="on"
                                >Turn Pump On</button>
                                <button class="btn btn-default
                                        @if ($pump1['state'] == 'timer')
                                        btn-primary
                                        @endif
                                        "
                                        id="pump1Timer"
                                        data-device="mistingSystem1"
                                        data-state="timer"
                                >Timer</button>
                                <button class="btn btn-default
                                        @if ($pump1['state'] == 'off')
                                        btn-primary
                                        @endif
                                        "
                                        id="pump1Off"
                                        data-device="mistingSystem1"
                                        data-state="off"
                                >Turn Pump Off</button>
                            </li>
                        </ul>
                    </div>
                    <div class="button-box col-md-4">
                        <h3>Fan System Control</h3>
                        <ul>
                            <li class="btn-group">
                                <button class="btn btn-default
                                        @if ($fan1['state'] == 'on')
                                        btn-primary
                                        @endif
                                        "
                                        id="fan1On"
                                        data-device="fan1"
                                        data-state="on"
                                >Turn Fan On</button>
                                <button class="btn btn-default
                                        @if ($fan1['state'] == 'timer')
                                        btn-primary
                                        @endif
                                        "
                                        id="fan1Timer"
                                        data-device="fan1"
                                        data-state="timer"
                                >Timer</button>
                                <button class="btn btn-default
                                        @if ($fan1['state'] == 'off')
                                        btn-primary
                                        @endif
                                        "
                                        id="fan1Off"
                                        data-device="fan1"
                                        data-state="off"
                                >Turn Fan Off</button>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    @stop
    @section('scripts')
        <script src="/js/actions.js"></script>
    @stop