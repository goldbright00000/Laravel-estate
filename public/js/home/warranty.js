var Warranty = function () {

    var handleProdcut = function(){
        var node;
        $('#warranty_tb').on('click','.btn-remove',function(){
            //console.log('bbb');
            node = $(this).parents('tr');
            $('#small').modal('show');
        });

        $('#small').on('click', '.btn-ok',function(){
            var info = $('#warranty_tb').dataTable().fnGetData(node);
            var url = $('meta[name=base_url]').attr('content')+'home/warranty/remove_warranty';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:url,
                method:'post',
                dataType:'json',
                data:info,
                success:function(resp){
                    //console.log(resp);
                    $('#warranty_tb').dataTable().fnDeleteRow(node);
                    $('#small').modal('hide');
                },
                error:function(error){
                    console.log(error);
                    $('#small').modal('hide');
                }
            });
        });
    }

    var initTable = function() {    
        var table = $('#warranty_tb');
        var url = $('meta[name=base_url]').attr('content')+'home/warranty/get_warranty';

        table.dataTable({
            "sAjaxSource": url,
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

            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 15,
            "language": {
                "lengthMenu": " _MENU_ records",
                "paging": {
                    "previous": "Prev",
                    "next": "Next"
                }
            },
            "aoColumnDefs" : [{
               'bSortable' : false,
               'aTargets' : [ 0,9 ]
             }],
             "aaSorting": [ [1,'asc'] ],
            "bProcessing": true,
            "aoColumns":[
                {
                    "mData":null,
                    "mRender": function(data, type, row){
                        if(row['image_name']){
                            var image_url = $('meta[name=base_url]').attr('content')+'uploads/images/products/'+row['image_name']+'.'+row['image_ext'];
                            return '<center><img src="'+image_url+'" height=45 alt=""/></center>';
                        }else{
                            var image_url = $('meta[name=base_url]').attr('content')+'img/icon-no-image.png';
                            return '<center><img src="'+image_url+'" height=45 alt=""/></center>';
                        }
                    }      
                },
                {
                    "mData":'brand'
                },
                {
                    "mData":'model'
                },
                {
                    "mData":'color'
                },
                {
                    "mData":'serial_number'
                },
                {
                    "mData":'merchant'
                },
                {
                    "mData":'purchase_date',
                    'mRender':function(data,type,row){
                        return moment(data).format('MMM D, YYYY');
                    }
                },
                {
                    "mData":'country_name'
                },
                {
                    "mData":'activation_date',
                    'mRender':function(data,type,row){
                        return moment(data).format('MMM D, YYYY');
                    }
                },
                {
                    "mData":null,
                    "mRender":function(data, type,row){
                        var linkurl = $('meta[name=base_url]').attr('content')+'home/warranty/edit_warranty/'+row['id'];
                        return '<a class="btn default btn-xs red-stripe btn-remove" href="javascript:;">Remove </a>'+
                                '<a class="btn default btn-xs green-stripe btn-edit" href="'+linkurl+'">Edit </a>';
                    }
                }
            ]
        });

        var tableWrapper = jQuery('#warranty_tb_wrapper');

        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
    }

    return {
        //main function to initiate the module
        init: function () {            
            handleProdcut();
            initTable();
        }
    };

}();