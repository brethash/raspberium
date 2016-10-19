<!-- Create the tabs -->
<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <li class="active"><a href="#control-sidebar-options-tab" data-toggle="tab"><i class="fa fa-wrench"></i></a></li>
    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
</ul>
<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="control-sidebar-options-tab">
        <h4 class="control-sidebar-heading">Options</h4>
        <div class="form-group">
            <label class="control-sidebar-subheading">
                <input
                        type="checkbox"
                        class="pull-right"
                        id="kioskMode"
                @if (isset($kiosk) && $kiosk == "enabled")
                        checked="checked"
                @endif
                />
                Toggle kiosk mode
            </label>
        </div>
        <!-- /.form-group -->
    </div>
    <!-- Settings tab content -->
    <div class="tab-pane" id="control-sidebar-settings-tab">
        <div>
            <form method="post" id="configuration">
                <h4 class="control-sidebar-heading">Configuration</h4>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Target Temperature (&deg;C):
                        <input type="text" name="temperatureThreshold" value="{{ $temperatureThreshold }}" />
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Target Humidity (%):
                        <input type="text" name="humidityThreshold" value="{{ $humidityThreshold }}" />
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Light 1 On (HH:mm):
                        <input type="text" name="light1On" value="{{ $light1On }}" />
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Light 1 Off (HH:mm):
                        <input type="text" name="light1Off" value="{{ $light1Off }}" />
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Light 2 On (HH:mm):
                        <input type="text" name="light2On" value="{{ $light2On }}" />
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Light 2 Off (HH:mm):
                        <input type="text" name="light2Off" value="{{ $light2Off }}" />
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Light 1 GPIO Pin:
                        <input type="text" name="light1Pin" value="{{ $light1Pin }}" />
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Light 2 GPIO Pin:
                        <input type="text" name="light2Pin" value="{{ $light2Pin }}" />
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Fan 1 GPIO Pin:
                        <input type="text" name="fan1Pin" value="{{ $fan1Pin }}" />
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Misting System 1 GPIO Pin:
                        <input type="text" name="mistingSystem1Pin" value="{{ $mistingSystem1Pin }}" />
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        DHT22 GPIO Pin:
                        <input type="text" name="dht22Pin" value="{{ $dht22Pin }}" />
                    </label>
                </div>
                <!-- /.form-group -->

                {{ csrf_field() }}

                <p id="saving">
                    <img src="/img/gears.gif" width="30" style="margin-right: 10px"/><span>Saving...</span>
                </p>
            </form>
        </div>
    </div>
    <!-- /.tab-pane -->
</div>