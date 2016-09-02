<!-- Create the tabs -->
<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
</ul>
<!-- Tab panes -->
<div class="tab-content">
    <!-- Home tab content -->
    <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>

    </div>
    <!-- /.tab-pane -->
    <!-- Stats tab content -->
    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
    <!-- /.tab-pane -->
    <!-- Settings tab content -->
    <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post" id="thresholds">
            <h3 class="control-sidebar-heading">Thresholds</h3>

            <div class="form-group">
                <label class="control-sidebar-subheading">
                    Target Temperature:
                    <input type="text" name="temperatureThreshold" value="{{ $temperatureThreshold }}" />
                </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
                <label class="control-sidebar-subheading">
                    Target Humidity:
                    <input type="text" name="humidityThreshold" value="{{ $humidityThreshold }}" />
                </label>
            </div>
            <!-- /.form-group -->
        </form>
        <form id="timing">
            <h3 class="control-sidebar-heading">Timing</h3>

            <div class="form-group">
                <label class="control-sidebar-subheading">
                    Light 1 On (HH:mm):
                    <input type="text" name="light1on" value="{{ $light1on }}" />
                </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
                <label class="control-sidebar-subheading">
                    Light 1 Off (HH:mm):
                    <input type="text" name="light1off" value="{{ $light1off }}" />
                </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
                <label class="control-sidebar-subheading">
                    Light 2 On (HH:mm):
                    <input type="text" name="light2on" value="{{ $light2on }}" />
                </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
                <label class="control-sidebar-subheading">
                    Light 2 Off (HH:mm):
                    <input type="text" name="light2off" value="{{ $light2off }}" />
                </label>
            </div>
            <!-- /.form-group -->
        </form>
    </div>
    <!-- /.tab-pane -->
</div>