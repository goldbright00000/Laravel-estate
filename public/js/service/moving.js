var EstateMoving = function () {

    //$.mockjaxSettings.responseTime = 500;

    var initAjaxMock = function () {
        //ajax mocks
        var node;
        $('#moving_tb').on('click', '.moving_status', function(){
            node = $(this).parents('tr')[0];
        });
        $.mockjax({
            url: '/post',
            response: function (settings) {
                var nodeInfo = $('#moving_tb').dataTable().fnGetData(node);
                nodeInfo['status'] = settings.data.value;
                $('#moving_tb').dataTable().fnUpdate(nodeInfo, node);
                //log(settings, this);
                var url = $('meta[name=base_url]').attr('content')+'service/moving/update_status';
                var data = {
                    'id' : settings.data.pk,
                    'status': settings.data.value
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:url,
                    method:'post',
                    dataType:'json',
                    data:data,              
                    success:function(resp){
                        console.log(resp);
                    },
                    error:function(error){
                        console.log(error);
                    }
                });
            }
        });
    }

    var initEditable = function() {
        $.fn.editable.defaults.inputclass = 'form-control';
        $.fn.editable.defaults.url = '/post';

        $('#moving_tb').dataTable().on('draw.dt', function(){
            $('.moving_status').editable({
                inputclass: 'form-control',
                source: [{
                        value: 'pending',
                        text: 'pending'
                    }, {
                        value: 'cancelled',
                        text: 'cancelled'
                    },{
                        value: 'completed',
                        text: 'completed'
                    }
                ],
                name: "moving_status"
            });
        })
    }
    var initTable = function () {
        var table = $('#moving_tb');

        table.dataTable({
            "sAjaxSource": "moving/get_requests",
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.

            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records",
                "paging": {
                    "previous": "Prev",
                    "next": "Next"
                }
            },
            "bProcessing": true,
            "aoColumns":[
                {
                    "mData":null,
                    "mRender": function(data, type, row){
                        return row['building']+'-'+row['level']+'-'+row['unit'];
                    }
                },
                {
                    "mData":'moving_date'
                },
                {
                    "mData": 'status',
                    'mRender':function(data,type,row){
                        
                        switch(data){
                            case 'pending':
                                return '<a href="javascript:;" data-type="select" data-pk="'+row['id']+'" class="moving_status label label-sm label-danger" data-value="'+data+'" data-original-title="Select Management"></a>';
                            break;
                            case 'cancelled':
                                return '<a href="javascript:;" data-type="select" data-pk="'+row['id']+'" class="moving_status label label-sm label-warning" data-value="'+data+'" data-original-title="Select Management"></a>';
                            break;
                            case 'completed':
                                return '<a href="javascript:;" data-type="select" data-pk="'+row['id']+'" class="moving_status label label-sm label-success" data-value="'+data+'" data-original-title="Select Management"></a>';
                            break;
                        }
                        
                    }
                }
            ]
        });

        var tableWrapper = jQuery('#moving_tb_wrapper');

        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
    }

    var initAdd = function() {
        $('.btn-new').on('click', function(){
            $('#new_request input').val('');
            $('#new_request').modal('show');
        });
        if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                rtl: Metronic.isRTL(),
                orientation: "left",
                autoclose: true
            });
            //$('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }

        $('#new_request').on('click', '.btn-ok', function(){
            var data = {
                'moving_date': moment($('#moving_date').datepicker('getDate')).format('YYYY-MM-DD'),
                'building':$('#new_request input[name=building]').val(),
                'level':$('#new_request input[name=floor]').val(),
                'unit':$('#new_request input[name=unit]').val()
            };
            var url = $('meta[name=base_url]').attr('content')+"service/moving/new_request";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url:url,
                method:'post',
                dataType:'json',
                data:data,
                success:function(resp){
                    console.log(resp);
                    $('#moving_tb').dataTable().fnAddData(resp);
                    $('#new_request').modal('hide');
                },
                error:function(error){
                    console.log(error);
                    $('#new_request').modal('hide');
                }
            });
            console.log(data);
        });
    }
    return {
        //main function to initiate the module
        init: function () {
            initTable();
            initAdd();
            initAjaxMock();
            initEditable();
        }

    };

}();