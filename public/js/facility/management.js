var Management = function () {

    var handleInput = function () {
        var table = $('#book_tb');

        table.dataTable({
            "sAjaxSource": $('meta[name=base_url]').attr('content')+'facility/management/get_book',
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
                    "mData":'facility_name'
                },
                {
                    "mData": 'created_at',
                    "mRender": function(data, type, row){
                        return moment(data).format('MMM D, YYYY')+' at '+moment(data).format('h:mm A');
                    }
                },
                {
                    "mData": 'bookdate',
                    "mRender": function(data, type, row){
                        return moment(data).format('MMM D, YYYY');
                    }
                },
                {
                    "mData": null,
                    'mRender': function(data, type, row){
                        return moment(row['start'],"hh:mm:ss").format('h:mm A')+' - '+moment(row['end'],"hh:mm:ss").format('h:mm A');
                    }
                },
                {
                    "mData": 'given_name'
                },
                {
                    "mData": 'status',
                    'mRender':function(data,type,row){            

                        switch(Math.floor(data)){
                            case 0:
                                return '<a href="javascript:;" data-type="select" data-pk="'+row['id']+'" class="booking_status label label-sm label-danger" data-value="'+data+'" data-original-title="Select Status"></a>';
                            break;
                            case 1:
                                return 'Approved';//'<a href="javascript:;" data-type="select" data-pk="'+row['id']+'" class="booking_status label label-sm label-success" data-value="'+data+'" data-original-title="Select Status"></a>';
                            break;
                            case 2:
                                return 'Rejected';//<a href="javascript:;" data-type="select" data-pk="'+row['id']+'" class="booking_status label label-sm label-warning" data-value="'+data+'" data-original-title="Select Status"></a>';
                            break;
                            case 3:
                                return '<a href="javascript:;" data-type="select" data-pk="'+row['id']+'" class="booking_status label label-sm label-info" data-value="'+data+'" data-original-title="Select Status"></a>';
                            break;
                        }
                        
                    }
                }
            ]
        });

        var tableWrapper = jQuery('#maintenance_tb_wrapper');

        tableWrapper.find('.dataTables_length select').select2();
    }

    var initAjaxMock = function () {
        //ajax mocks
        var node;
        $('#book_tb').on('click', '.booking_status', function(){
            node = $(this).parents('tr')[0];
        });
        $.mockjax({
            url: '/post',
            response: function (settings) {
                var nodeInfo = $('#book_tb').dataTable().fnGetData(node);
                nodeInfo['status'] = Math.floor(settings.data.value);
                $('#book_tb').dataTable().fnUpdate(nodeInfo, node);
                //log(settings, this);
                var url = $('meta[name=base_url]').attr('content')+'facility/management/update_status';
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

        $('#book_tb').dataTable().on('draw.dt', function(){
            $('.booking_status').editable({
                inputclass: 'form-control',
                source: [{
                        value: 0,
                        text: 'pending'
                    }, {
                        value: 1,
                        text: 'approved'
                    },{
                        value: 2,
                        text: 'rejected'
                    },
                    {
                        value: 3,
                        text: 'cancelled'
                    }
                ],
                name: "booking_status"
            });
        })
    }
    
    var initAdd = function() {
        $('.btn-new').on('click', function(){
            $('#new_facility input').val('');
            $('#new_facility .fileinput-preview').html('');
            $('#new_facility .fileinput-exists').trigger('click');
            $('#new_facility').modal('show');
        });

        $('#new_facility').on('click', '.btn-ok', function(){
            var data = new FormData();
            data.append('building',$('#new_request input[name=building]').val());
            data.append('level',$('#new_request input[name=floor]').val());
            data.append('unit',$('#new_request input[name=unit]').val());
            data.append('subject',$('#new_request input[name=subject]').val());
            data.append('details',$('#new_request textarea[name=details]').val());
            data.append('priority',$('#new_request select[name=priority]').val());
            data.append('job_type',$('#new_request select[name=job_type]').val());
            var file1 = $('#new_request input[name=attach1]').get(0).files;
            if(file1&&file1.length>0){
                if(file1[0].type=='image/jpg'||file1[0].type=='image/png'||file1[0].type=='image/bmp'||file1[0].type=="image/jpeg"){
                    console.log(data);
                    data.append('file1',file1[0]);
                }else{
                    data.append('file1',null);
                }
            }else{
                data.append('file1',null);
            }
            var file2 = $('#new_request input[name=attach2]').get(0).files;
            if(file2&&file2.length>0){
                if(file2[0].type=='image/jpg'||file2[0].type=='image/png'||file2[0].type=='image/bmp'||file2[0].type=="image/jpeg"){
                    data.append('file2',file2[0]);
                }else{
                    data.append('file2',null);
                }
            }else{
                data.append('file2',null);
            }
            var file3 = $('#new_request input[name=attach3]').get(0).files;
            if(file3&&file3.length>0){
                if(file3[0].type=='image/jpg'||file3[0].type=='image/png'||file3[0].type=='image/bmp'||file3[0].type=="image/jpeg"){
                    data.append('file3',file3[0]);
                }else{
                    data.append('file3',null);
                }
            }else{
                data.append('file3',null);
            }
            var url = $('meta[name=base_url]').attr('content')+"service/maintenance/new_maintenance";
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
                        'building':$('#new_request input[name=building]').val(),
                        'level':$('#new_request input[name=floor]').val(),
                        'unit':$('#new_request input[name=unit]').val(),
                        'subject':$('#new_request input[name=subject]').val(),
                        'details':$('#new_request textarea[name=details]').val(),
                        'priority':$('#new_request select[name=priority]').val(),
                        'job_name':$('#new_request select[name=job_type] option:selected').data('text'),
                        'id':resp,
                        'date_assigned':null,
                        'status':0
                    };
                    $('#maintenance_tb').dataTable().fnAddData(data);
                    $('#new_request').modal('hide');
                },
                error:function(error){
                    console.log(error);
                    $('#new_request').modal('hide');
                }
            });
            //console.log(data);
        });

        $('.btn-new-job').on('click', function(){
            $('#new_job .edited').val('');
            $('#new_job .edited').removeClass('edited');
            $('#new_job').modal('show');
        });

        $('#new_job').on('click','.btn-ok', function(){
            var data = {
                'job_name':$('#new_job input[name=job_name]').val(),
                'description':$('#new_job textarea[name=description]').val()
            }
            var url = $('meta[name=base_url]').attr('content')+"service/maintenance/new_job";
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
                    $('#jobs_tb').dataTable().fnAddData(resp);
                    $('#new_job').modal('hide');
                },
                error:function(error){
                    console.log(error);
                    $('#new_job').modal('hide');
                }
            });
        });
    }

    return {
        //main function to initiate the module
        init: function () {            
            handleInput();
            initAjaxMock();
            initEditable();
            initAdd();
        }
    };

}();