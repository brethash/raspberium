<!-- Create the tabs -->
<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <li class="active"><a href="#control-sidebar-options-tab" data-toggle="tab"><i class="fa fa-wrench"></i></a></li>
    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
</ul>
<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="control-sidebar-options-tab">
        <h4 class="control-sidebar-heading">Options</h4>
        <form method="post" id="configurations">
            <h4 class="control-sidebar-heading">Configuration</h4>

            <div class="form-group">
                <label class="control-sidebar-subheading">
                    Target Temperature (&deg;C):
                    <input type="number" name="temperatureThreshold" value="{{ $temperatureThreshold }}" />
                </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
                <label class="control-sidebar-subheading">
                    Target Humidity (%):
                    <input type="number" name="humidityThreshold" value="{{ $humidityThreshold }}" />
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

            {{ csrf_field() }}

            <p class="saving">
                <img src="/img/gears.gif" width="30" style="margin-right: 10px"/><span>Saving...</span>
            </p>
        </form>

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
            <form method="post" id="devices">
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Light 1 GPIO Pin:
                        <input type="number" name="light1Pin" data-device="light1" value="{{ $light1['pin'] }}" />
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Light 2 GPIO Pin:
                        <input type="number" name="light2Pin" data-device="light2" value="{{ $light2['pin'] }}" />
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Fan 1 GPIO Pin:
                        <input type="number" name="fan1Pin" data-device="fan1" value="{{ $fan1['pin'] }}" />
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Misting System 1 GPIO Pin:
                        <input type="number" name="pump1Pin" data-device="pump1" value="{{ $pump1['pin'] }}" />
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        DHT22 GPIO Pin:
                        <input type="number" name="dht22Pin" data-device="dht22" value="{{ $dht22['pin'] }}" />
                    </label>
                </div>
                <!-- /.form-group -->

                {{ csrf_field() }}

                <p class="saving">
                    <img src="/img/gears.gif" width="30" style="margin-right: 10px"/><span>Saving...</span>
                </p>
            </form>
        </div>
    </div>
    <!-- /.tab-pane -->
</div>