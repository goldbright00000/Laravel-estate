var AccessCardManagement = function () {

    //$.mockjaxSettings.responseTime = 500;

    var initAjaxMock = function () {
        //ajax mocks
        var node;
        $('#access_cards_tb').on('click', '.access_card', function(){
            node = $(this).parents('tr')[0];
        });
        /*
        $.mockjax({
            url: '/post',
            response: function (settings) {
                var nodeInfo = $('#maintenance_tb').dataTable().fnGetData(node);
                nodeInfo['status'] = Math.floor(settings.data.value);
                console.log(nodeInfo);
                $('#maintenance_tb').dataTable().fnUpdate(nodeInfo, node);
                // //log(settings, this);
                var url = $('meta[name=base_url]').attr('content')+'service/maintenance/update_status';
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
        });*/
    }

    var initEditable = function() {
        $.fn.editable.defaults.inputclass = 'form-control';
        $.fn.editable.defaults.url = '/post';

        $('#access_cards_tb').dataTable().on('draw.dt', function(){
            /*$('.access_card').editable({
                inputclass: 'form-control',
                source: [{
                        value: 0,
                        text: 'pending'
                    }, {
                        value: 2,
                        text: 'cancelled'
                    },{
                        value: 1,
                        text: 'completed'
                    },{
                        value: 3,
                        text: 'rejected'
                    }
                ],
                name: "access_card"
            });*/
        })
    }
    var initTable = function () {
        var table = $('#access_cards_tb');

        table.dataTable({
            "sAjaxSource": $('meta[name=base_url]').attr('content')+'security/accesscardmanagement/getAccessCard',
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
            //"bProcessing": true,
            "aoColumns":[
                {
                    "mData": 'card_no'                   
                },
                {
                    "mData": 'requested_by'
                },
                {
                    "mData": 'issued_to'
                },
                {
                    "mData": 'requested_on',
                    "mRender": function(data, type, row){
                        return moment(data).format('MM-DD-YYYY');
                    }
                },
                {
                    "mData": 'activated_on',
                    "mRender": function(data, type, row){
                        return moment(data).format('MM-DD-YYYY');
                    }
                },
                {
                    "mData": 'expiry_date',
                    "mRender": function(data, type, row){
                        return moment(data).format('MM-DD-YYYY');
                    }
                },                
                {
                    "mData": 'status'   
                },
                {
                    "mData":null,
                    "mRender":function(data, type, row){
                        //return '<a type="button" class="btn btn-primary btn-xs btn-view" href="'+$('meta[name=base_url]').attr('content')+'security/accesscardmanagement/view_access_card/'+row['id']+'"><i class="fa fa-eye"></i> Details</a>';
                        return '<a type="button" class="btn btn-primary btn-xs btn-view" href="#" onclick="showIssueCard('+ row['unit_no']+')"><i class="fa fa-eye"></i> Details</a>';
                    }
                },
                {
                   "mData": 'report_action'                     
                }
            ]
        });

        var tableWrapper = jQuery('#access_cards_tb_wrapper');

        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdowns

     
    }
    
    var initAdd = function() {
        $('.btn-new').on('click', function(){
            $('#new_request input').val('');
            $('#new_request .fileinput-preview').html('');
            $('#new_request .fileinput-exists').trigger('click');
            $('#new_request').modal('show');

        });

        $('#new_request').on('click', '.btn-ok', function(){
            var data = new FormData();
            data.append('requested_by',$('#new_request input[name=requested_by]').val());  // name (Owner/Tenant)
            data.append('unit_no',$('#new_request input[name=unit_no]').val()); //BIK & Unit No
            data.append('contact_no',$('#new_request input[name=contact_no]').val());
            data.append('document_type',$('#new_request select[name=document_type]').val());
            data.append('exception_type',$('#new_request select[name=exception_type]').val());
            data.append('card_charge',$('#new_request input[name=card_charge]').val());
            data.append('exception_card_no',$('#new_request input[name=exception_card_no]').val());
            data.append('card_quantity',$('#new_request input[name=card_quantity]').val());
            data.append('card_no',$('#new_request input[name=card_no]').val());
            data.append('amount_collected',$('#new_request input[name=amount_collected]').val());
            
            var url = $('meta[name=base_url]').attr('content')+"security/accesscardmanagement/new_accesscard";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url:url,
                method:'post',
                contentType:false,
                processData:false,
                data:data,
                success:function(resp){
                    var data = {
                        'card_no':$('#new_request input[name=card_no]').val(),
                        'requested_by':$('#new_request input[name=requested_by]').val(),
                        'issued_to': '',
                        'requested_on':resp.requested_on,
                        'activated_on':'',
                        'expiry_date':'',
                        'status':'',
                        'activty': '',
                        'report_action':''
                    };
                    $('#access_cards_tb').dataTable().fnAddData(data);
                    $('#new_request').modal('hide');
                },
                error:function(error){
                    console.log(error);
                    $('#new_request').modal('hide');
                }
            });
            //console.log(data);
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