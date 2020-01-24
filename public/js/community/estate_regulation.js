var EstateRegulation = function () {

    var initByLaws = function () {
        var table = $('#bylaws_tb');

        table.dataTable({
            "sAjaxSource": "estate_regulation/get_bylaws",
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
            "bServerSide": true,
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
            "iDisplayLength": 5,
            "iDisplayStart": 10,
            "aoColumns":[
                {
                    "mData":'id',
                    'bVisible':false
                },
                {
                    "mData":'title'
                },
                {
                    "mData":null,
                    "mRender": function(data, type, row) {
                        return row['given_name']+" "+row['family_name'];
                    }
                },
                {
                    "mData": 'created_at'
                },
                {
                    "mData":null,
                   "mRender": function ( data, type, row ) {
                      return '<a href="/download/'+row['type']+'/'+row['file_name']+'.'+row['file_ext']+'"class="btn btn-danger btn-xs btn-download"><i class="fa fa-download"></i> Download</a>';
                    } 
                }
            ]
        });

        var tableWrapper = jQuery('#bylaws_tb_wrapper');

        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
    }

    var initHandbook = function () {

        var table = $('#handbook_tb');

        table.dataTable({
            "sAjaxSource": "estate_regulation/get_byhandbook",
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
            "bServerSide": true,
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "iDisplayLength": 10,
            "iDisplayStart": 20,
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
                    "mData":'id',
                    'bVisible':false
                },
                {
                    "mData":'title'
                },
                {
                    "mData":null,
                    "mRender": function(data, type, row) {
                        return row['given_name']+" "+row['family_name'];
                    }
                },
                {
                    "mData": 'created_at'
                },
                {
                    "mData":null,
                   "mRender": function ( data, type, row ) {
                      return '<a href="/download/'+row['type']+'/'+row['file_name']+'.'+row['file_ext']+'"class="btn btn-danger btn-xs btn-download"><i class="fa fa-download"></i> Download</a>';
                    }     
                }
            ]
        });

        var tableWrapper = jQuery('#handbook_tb_wrapper');

        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
    }

    var initAGM = function () {

        var table = $('#agm_tb');

        table.dataTable({
            "sAjaxSource": "estate_regulation/get_byagm",
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
            "bServerSide": true,
            "iDisplayLength": 10,
            "iDisplayStart": 20,
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
                    "mData":'id',
                    'bVisible':false
                },
                {
                    "mData":'title'
                },
                {
                    "mData":null,
                    "mRender": function(data, type, row) {
                        return row['given_name']+" "+row['family_name'];
                    }
                },
                {
                    "mData": 'created_at'
                },
                {
                    "mData":null,
                   "mRender": function ( data, type, row ) {
                      return '<a href="/download/'+row['type']+'/'+row['file_name']+'.'+row['file_ext']+'"class="btn btn-danger btn-xs btn-download"><i class="fa fa-download"></i> Download</a>';
                    }     
                }
            ]
        });

        var tableWrapper = jQuery('#agm_tb_wrapper');

        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
    }

    var uploadDocs = function() {
        $('input[name=file]').on('change', function(){
            var file = $(this).get(0).files;
            if(file.length>0){
                if(file[0].type=='application/vnd.openxmlformats-officedocument.wordprocessingml.document'||file[0].type=='application/pdf'){
                    if($(this).parent().next().hasClass('disabled')){
                        $(this).parent().next().removeClass('disabled');
                    }
                }else{
                    if(!$(this).parent().next().hasClass('disabled')){
                        $(this).parent().next().addClass('disabled');
                    }
                }
            }else{
                if(!$(this).parent().next().hasClass('disabled')){
                    $(this).parent().next().addClass('disabled');
                }
            }
        });
    }

    var sendAjax = function(url, data) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:url,
            method:'get',
            dataType:'json',
            data:data,
            success:function(resp){
                return resp;
            },
            error:function(error){
                return error;
            }
        });
    }
    return {
        //main function to initiate the module
        init: function () {
            initByLaws();
            initHandbook();
            initAGM();
            uploadDocs();
        }

    };

}();