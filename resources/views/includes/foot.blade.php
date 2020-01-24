<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
{{ Html::script('plugins/jquery.min.js') }}
{{ Html::script('js/helpers/simpleWeather.js') }}
{{ Html::script('plugins/jquery-migrate.min.js') }}
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
{{ Html::script('plugins/jquery-ui/jquery-ui.min.js') }}
{{ Html::script('plugins/bootstrap/js/bootstrap.min.js') }}
{{ Html::script('plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}
{{ Html::script('plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}
{{ Html::script('plugins/jquery.blockui.min.js') }}
{{ Html::script('plugins/select2/select2.min.js') }}
{{ Html::script('plugins/jquery.cokie.min.js') }}
{{ Html::script('plugins/uniform/jquery.uniform.min.js') }}
{{ Html::script('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}
{{ Html::script('plugins/jquery-validation/js/jquery.validate.min.js') }}
{{ Html::script('plugins/moment.min.js') }}
{{ Html::script('plugins/bootstrap-modal/js/bootstrap-modalmanager.js') }}
{{ Html::script('plugins/bootstrap-modal/js/bootstrap-modal.js') }}

<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
{{ Html::script('js/metronic.js') }}
{{ Html::script('js/layout.js') }}
{{ Html::script('js/demo.js') }}
{{ Html::script('js/quick-sidebar.js') }}
{{ Html::script('js/helpers/tabNavManager.js') }}

<!-- END PAGE LEVEL SCRIPTS -->
<script>
  jQuery(document).ready(function () {
    Metronic.init(); // init metronic core componets
    Layout.init(); // init layout
    QuickSidebar.init(); // init quick sidebar
    Demo.init(); // init demo features
    TabNavManager.init();

	//getting weather    
  @if($estate)
    var city = '{{$estate->city}}';
    var country= '{{$estate->country}}';
    @else
   var city = 'Singapore';
    var country= 'Singapore'; 
  @endif
    $.simpleWeather({
        location:  city + "," + country,
        woeid: '',
        unit: 'c',
        success: function(weather) {
          html = '<h2><i class="icon-'+weather.code+'"></i> '+weather.temp+'&deg;'+weather.units.temp+'</h2>';
          html += '<li><a href="#">'+weather.city+', '+weather.region+'</a></li>';
          html += '<li><a href="#">'+weather.currently+'</a></li>';
          html += '<li><a href="#">'+weather.wind.direction+' '+weather.wind.speed+' '+weather.units.speed+'</a></li>';

          $("#weather").html(html);
        },
        error: function(error) {
          $("#weather").html('<p>'+error+'</p>');
        }
    });


  });
</script>
<!-- END JAVASCRIPTS -->