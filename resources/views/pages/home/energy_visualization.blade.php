@include('includes/head')
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo">
@include('includes/header')
{{Html::style('css/home/home.css')}}
{{ Html::style('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}
{{ Html::style('plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css') }}
{{ Html::style('plugins/bootstrap-datepicker/css/datepicker3.css') }}

<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    @include('includes/sidebar')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content row">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title">
            Connected Energy <small></small>
            </h3>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-child"></i>
                        <a>Home Net</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a>Connected Energy</a>
                    </li>
                </ul>
                <div class="page-toolbar">                    
                    <a type="button" href="{{url('home/energy/config')}}" class="btn btn-success btn-add-facaility">Next</a>        
                </div>
            </div>
            <div class="row">
            	<ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_compare_multiple" data-toggle="tab">COMPARE MULTIPLE SERIES</a>
                    </li>
                    <li>
                        <a href="#tab_line" data-toggle="tab">LINE CHART</a>
                    </li>
                </ul>
				<div class="tab-content">	
					<div class="tab-pane fade active in" id="tab_compare_multiple">					    
	                    <div class="portlet light portlet-fit bordered col-md-12">
	                        <div class="portlet-title">
	                            <div class="caption">
	                                <i class=" icon-layers font-green"></i>
	                                <span class="caption-subject font-green bold uppercase">Compare Multiple Series</span>
	                            </div>
	                            <div class="actions">
	                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
	                                    <i class="icon-cloud-upload"></i>
	                                </a>
	                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
	                                    <i class="icon-wrench"></i>
	                                </a>
	                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
	                                    <i class="icon-trash"></i>
	                                </a>
	                            </div>
	                        </div>
	                        <div class="portlet-body">
	                            <div id="highstock_1" style="height:500px;"></div>
	                        </div>
	                    </div>
	                	
	                </div>
	                <div class="tab-pane fade" id="tab_line">	                	 
                        <div class="portlet light portlet-fit bordered col-md-12">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class=" icon-layers font-green"></i>
                                    <span class="caption-subject font-green bold uppercase">Line Chart</span>
                                </div>
                                <div class="actions">
                                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                        <i class="icon-cloud-upload"></i>
                                    </a>
                                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                        <i class="icon-wrench"></i>
                                    </a>
                                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                        <i class="icon-trash"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div id="highchart_1" style="height:500px;"></div>
                            </div>
                        </div>      

	                </div>
                </div>
            </div>          
        </div>
    <!-- END CONTENT -->
    <div>
</div>
<!-- END CONTAINER -->
@include('includes/footer')
@include('includes/foot')
{{ Html::script('plugins/datatables/media/js/jquery.dataTables.min.js') }}
{{ Html::script('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}
{{ Html::script('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}
{{ Html::script('js/helpers/highstock.js') }}
{{ Html::script('js/helpers/highcharts.js') }}

<script type="text/javascript">
jQuery(document).ready(function() {    

   //line charts
   $('#highchart_1').highcharts({
        chart : {
            style: {
                fontFamily: 'Open Sans'
            }
        },
		title: {
			text: 'Monthly Average Temperature',
			x: -20 //center
		},
		subtitle: {
			text: 'Source: WorldClimate.com',
			x: -20
		},
		xAxis: {
			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
				'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
		},
		yAxis: {
			title: {
				text: 'Temperature (°C)'
			},
			plotLines: [{
				value: 0,
				width: 1,
				color: '#808080'
			}]
		},
		tooltip: {
			valueSuffix: '°C'
		},
		legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'middle',
			borderWidth: 0
		},
		series: [{
			name: 'Tokyo',
			data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
		}, {
			name: 'New York',
			data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
		}, {
			name: 'Berlin',
			data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
		}, {
			name: 'London',
			data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
		}]
	});

   //stock charts
     	var seriesOptions = [],
        seriesCounter = 0,
        names = ['MSFT', 'AAPL', 'GOOG'],
        // create the chart when all data is loaded
        createChart = function () {

        $('#highstock_1').highcharts('StockChart', {
            chart : {
                style: {
                    fontFamily: 'Open Sans'
                }
            },

            rangeSelector: {
                selected: 4
            },

            yAxis: {
                labels: {
                    formatter: function () {
                        return (this.value > 0 ? ' + ' : '') + this.value + '%';
                    }
                },
                plotLines: [{
                    value: 0,
                    width: 2,
                    color: 'silver'
                }]
            },

            plotOptions: {
                series: {
                    compare: 'percent'
                }
            },

            tooltip: {
                pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.change}%)<br/>',
                valueDecimals: 2
            },

            series: seriesOptions
        });
    };

    $.each(names, function (i, name) {

        $.getJSON('http://www.highcharts.com/samples/data/jsonp.php?filename=' + name.toLowerCase() + '-c.json&callback=?',    function (data) {

            seriesOptions[i] = {
                name: name,
                data: data
            };

            // As we're loading the data asynchronously, we don't know what order it will arrive. So
            // we keep a counter and create the chart when all the data is loaded.
            seriesCounter += 1;

            if (seriesCounter === names.length) {
                createChart();
            }
        });
    });
}); 
</script>
</body>
<!-- END BODY -->
</html>