<!-- Create the tabs -->
<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
</ul>
<!-- Tab panes -->
<div class="tab-content">
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
                        Target Humidity (&deg;C):
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

                <p id="saving">
                    <img src="/img/gears.gif" width="30" style="margin-right: 10px"/>Saving...
                </p>
            </form>
        </div>
    </div>
    <!-- /.tab-pane -->
</div>