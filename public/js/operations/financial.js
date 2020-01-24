var Financial = function () {

    var handleTable = function () {

        

        for(var i in financialcode){
            var url = $('meta[name=base_url]').attr('content')+'service/financial/get_financial';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var data = {
                'id':financialcode[i].id
            };
            $.ajax({
                url:url,
                method:'post',
                dataType:'json',
                async: false,
                data:data,
                success:function(resp){
                    //console.log(resp);
                    initTable1(resp['aaData'], resp['id']);
                },
                error:function(error){
                    console.log(error);
                }
            });
        }
        


        

        // var tableWrapper = $("#table_1_wrapper");

        // tableWrapper.find(".dataTables_length select").select2({
        //     showSearchInput: false //hide search box with special css class
        // }); // initialize select2 dropdown

        
    }

    var editRow  = function(oTable, nRow) {
        var aData = oTable.fnGetData(nRow);
        var jqTds = $('>td', nRow);
        jqTds[0].innerHTML = '<input type="text" class="form-control input-small" value="' + aData.tb_field + '">';
        jqTds[1].innerHTML = '<input type="text" class="form-control input-small" value="' + aData.cm_actual + '">';
        jqTds[2].innerHTML = '<input type="text" class="form-control input-small" value="' + aData.cm_budget + '">';
        jqTds[3].innerHTML = '<input type="text" class="form-control input-small" value="' + aData.cm_variance + '">';
        jqTds[5].innerHTML = '<input type="text" class="form-control input-small" value="' + aData.ytd_actual + '">';
        jqTds[6].innerHTML = '<input type="text" class="form-control input-small" value="' + aData.ytd_budget + '">';
        jqTds[7].innerHTML = '<input type="text" class="form-control input-small" value="' + aData.ytd_variance + '">';
        jqTds[9].innerHTML = '<input type="text" class="form-control input-small" value="' + aData.ytd_last + '">';
        jqTds[10].innerHTML = '<a class="edit" href="">Save</a>';
        jqTds[11].innerHTML = '<a class="cancel" href="">Cancel</a>';
    }

    var restoreRow = function(oTable, nRow) {
        var aData = oTable.fnGetData(nRow);
        var jqTds = $('>td', nRow);
        oTable.fnUpdate(aData, nRow);
        oTable.fnDraw();
    }

    var saveRow = function(oTable, nRow) {
        var jqInputs = $('input', nRow);
        oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
        oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
        oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
        oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
        oTable.fnUpdate(jqInputs[4].value, nRow, 5, false);
        oTable.fnUpdate(jqInputs[5].value, nRow, 6, false);
        oTable.fnUpdate(jqInputs[6].value, nRow, 7, false);
        oTable.fnUpdate(jqInputs[7].value, nRow, 9, false);
        oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 10, false);
        oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 11, false);
        oTable.fnDraw();
    }

    var cancelEditRow = function(oTable, nRow) {
        var jqInputs = $('input', nRow);
        oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
        oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
        oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
        oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
        oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 4, false);
        oTable.fnDraw();
    }

    var initTable1 = function(data, key) {
        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });
        var table = $('#table_'+key);
        var oTable = table.dataTable({
            'aaData':data,

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            "dom": 'T<"clear">lfrtip',
            //"bProcessing": true,
            "tableTools": {
                "sSwfPath": $('meta[name=base_url]').attr('content')+"plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
                "aButtons": [{
                    "sExtends": "pdf",
                    "sButtonText": "PDF"
                }, {
                    "sExtends": "csv",
                    "sButtonText": "CSV"
                }, {
                    "sExtends": "xls",
                    "sButtonText": "Excel"
                }, {
                    "sExtends": "print",
                    "sButtonText": "Print",
                    "sInfo": 'Please press "CTRL+P" to print or "ESC" to quit',
                    "sMessage": "Generated by DataTables"
                }, {
                    "sExtends": "copy",
                    "sButtonText": "Copy"
                }]
            },

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},

            // set the initial value
            "pageLength": 10,

            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            }],
            "order": [
                [0, "asc"]
            ], // set first column as a default sort by asc

            "aoColumns":[
                {
                    'mData':'tb_field'
                },
                {
                    'mData':'cm_actual',
                    'mRender':function(data, type, row){
                        if(parseInt(data)<0){
                            return '('+Math.abs(data)+')';
                        }
                        return data;
                    }
                },
                {
                    'mData':'cm_budget',
                    'mRender':function(data, type, row){
                        if(parseInt(data)<0){
                            return '('+Math.abs(data)+')';
                        }
                        return data;
                    }
                },
                {
                    'mData':'cm_variance',
                    'mRender':function(data, type, row){
                        if(parseInt(data)<0){
                            return '('+Math.abs(data)+')';
                        }
                        return data;
                    }
                },
                {
                    'mData':null,
                    'mRender':function(data, type, row){
                        if(parseInt(row['cm_budget'])==0||parseInt(row['cm_variance'])==0)
                            return 0;
                        else{
                            var value = parseInt(row['cm_variance']/row['cm_budget']*100);
                            if(value<0){
                                return '('+Math.abs(value)+')';
                            }
                            return value;
                        }
                    }
                },
                {
                    'mData':'ytd_actual',
                    'mRender':function(data, type, row){
                        if(parseInt(data)<0){
                            return '('+Math.abs(data)+')';
                        }
                        return data;
                    }
                },
                {
                    'mData':'ytd_budget',
                    'mRender':function(data, type, row){
                        if(parseInt(data)<0){
                            return '('+Math.abs(data)+')';
                        }
                        return data;
                    }
                },
                {
                    'mData':'ytd_variance',
                    'mRender':function(data, type, row){
                        if(parseInt(data)<0){
                            return '('+Math.abs(data)+')';
                        }
                        return data;
                    }
                },
                {
                    'mData':null,
                    'mRender':function(data, type, row){
                        if(parseInt(row['ytd_budget'])==0||parseInt(row['ytd_variance'])==0)
                            return 0;
                        else{
                            var value = parseInt((parseInt(row['ytd_variance'])/parseInt(row['ytd_budget']))*100);
                            if(value<0){
                                return '('+Math.abs(value)+')';
                            }
                            return value;
                        }
                    }
                },
                {
                    'mData':'ytd_last',
                    'mRender':function(data, type, row){
                        if(parseInt(data)<0){
                            return '('+Math.abs(data)+')';
                        }
                        return data;
                    }
                },
                {
                    'mData':null,
                    'bSortable':false,
                    'mRender':function(data, type, row){
                        return '<a class="edit">edit</a>';
                    }
                },
                {
                    'mData':null,
                    'bSortable':false,
                    'mRender':function(data, type, row){
                        return '<a class="delete" href="javascript:;">Delete </a>';
                    }
                }
            ],
            'initComplete':function(settings){
                //console.log(settings);
                var cm_actual_total = 0;
                var cm_budget_total = 0;
                var cm_variance_total = 0;
                var ytd_actual_total = 0;
                var ytd_budget_total = 0;
                var ytd_variance_total = 0;
                var ytd_last_total = 0;
                for(var i in settings.aoData){
                    cm_actual_total+=parseInt(settings.aoData[i]._aData.cm_actual);
                    cm_budget_total+=parseInt(settings.aoData[i]._aData.cm_budget);
                    cm_variance_total+=parseInt(settings.aoData[i]._aData.cm_variance);
                    ytd_actual_total+=parseInt(settings.aoData[i]._aData.ytd_actual);
                    ytd_budget_total+=parseInt(settings.aoData[i]._aData.ytd_budget);
                    ytd_variance_total+=parseInt(settings.aoData[i]._aData.ytd_variance);
                    ytd_last_total+=parseInt(settings.aoData[i]._aData.ytd_last);
                }
                if(cm_variance_total==0||cm_budget_total==0){
                    table.find('.cm_percentage_total').html(0);
                }else{
                    var value = Math.floor(cm_variance_total/cm_budget_total*100);
                    if(value<0){
                         table.find('.cm_percentage_total').html('('+Math.abs(value)+')');
                    }else{
                    table.find('.cm_percentage_total').html(value);}
                }

                if(ytd_variance_total==0||ytd_budget_total==0){
                    table.find('.ytd_percentage_total').html(0);
                }else{
                    var value = Math.floor(ytd_variance_total/ytd_budget_total*100);
                    if(value<0){
                         table.find('.ytd_percentage_total').html('('+Math.abs(value)+')');
                    }else{
                        table.find('.ytd_percentage_total').html(value);
                    }
                }

                cm_actual_total = cm_actual_total<0?'('+Math.abs(cm_actual_total)+')':cm_actual_total;
                table.find('.cm_actual_total').html(cm_actual_total);
                cm_budget_total = cm_budget_total<0?'('+Math.abs(cm_budget_total)+')':cm_budget_total;
                table.find('.cm_budget_total').html(cm_budget_total);
                cm_variance_total = cm_variance_total<0?'('+Math.abs(cm_variance_total)+')':cm_variance_total;
                table.find('.cm_variance_total').html(cm_variance_total);
                ytd_actual_total = ytd_actual_total<0?'('+Math.abs(ytd_actual_total)+')':ytd_actual_total;
                table.find('.ytd_actual_total').html(ytd_actual_total);
                ytd_budget_total = ytd_budget_total<0?'('+Math.abs(ytd_budget_total)+')':ytd_budget_total;
                table.find('.ytd_budget_total').html(ytd_budget_total);
                ytd_variance_total = ytd_variance_total<0?'('+Math.abs(ytd_variance_total)+')':ytd_variance_total;
                table.find('.ytd_variance_total').html(ytd_variance_total);
                ytd_last_total = ytd_last_total<0?'('+Math.abs(ytd_last_total)+')':ytd_last_total;
                table.find('.ytd_last_total').html(ytd_last_total);

                
            }
        });
        oTable.on('draw.dt', function(e, settings){
            //console.log(oTable.columns().footer());     
           //console.log(key);           
           //table.find('.cm_actual_total').html('aaa');
           var cm_actual_total = 0;
                var cm_budget_total = 0;
                var cm_variance_total = 0;
                var ytd_actual_total = 0;
                var ytd_budget_total = 0;
                var ytd_variance_total = 0;
                var ytd_last_total = 0;
                for(var i in settings.aoData){
                    cm_actual_total+=parseInt(settings.aoData[i]._aData.cm_actual);
                    cm_budget_total+=parseInt(settings.aoData[i]._aData.cm_budget);
                    cm_variance_total+=parseInt(settings.aoData[i]._aData.cm_variance);
                    ytd_actual_total+=parseInt(settings.aoData[i]._aData.ytd_actual);
                    ytd_budget_total+=parseInt(settings.aoData[i]._aData.ytd_budget);
                    ytd_variance_total+=parseInt(settings.aoData[i]._aData.ytd_variance);
                    ytd_last_total+=parseInt(settings.aoData[i]._aData.ytd_last);
                }
                if(cm_variance_total==0||cm_budget_total==0){
                    table.find('.cm_percentage_total').html(0);
                }else{
                    var value = Math.floor(cm_variance_total/cm_budget_total*100);
                    if(value<0){
                         table.find('.cm_percentage_total').html('('+Math.abs(value)+')');
                    }else{
                        table.find('.cm_percentage_total').html(value);
                    }
                }

                if(ytd_variance_total==0||ytd_budget_total==0){
                    table.find('.ytd_percentage_total').html(0);
                }else{
                    var value = Math.floor(ytd_variance_total/ytd_budget_total*100);
                    if(value<0){
                         table.find('.ytd_percentage_total').html('('+Math.abs(value)+')');
                    }else{
                        table.find('.ytd_percentage_total').html(value);
                    }
                }
                cm_actual_total = cm_actual_total<0?'('+Math.abs(cm_actual_total)+')':cm_actual_total;
                table.find('.cm_actual_total').html(cm_actual_total);
                cm_budget_total = cm_budget_total<0?'('+Math.abs(cm_budget_total)+')':cm_budget_total;
                table.find('.cm_budget_total').html(cm_budget_total);
                cm_variance_total = cm_variance_total<0?'('+Math.abs(cm_variance_total)+')':cm_variance_total;
                table.find('.cm_variance_total').html(cm_variance_total);
                ytd_actual_total = ytd_actual_total<0?'('+Math.abs(ytd_actual_total)+')':ytd_actual_total;
                table.find('.ytd_actual_total').html(ytd_actual_total);
                ytd_budget_total = ytd_budget_total<0?'('+Math.abs(ytd_budget_total)+')':ytd_budget_total;
                table.find('.ytd_budget_total').html(ytd_budget_total);
                ytd_variance_total = ytd_variance_total<0?'('+Math.abs(ytd_variance_total)+')':ytd_variance_total;
                table.find('.ytd_variance_total').html(ytd_variance_total);
                ytd_last_total = ytd_last_total<0?'('+Math.abs(ytd_last_total)+')':ytd_last_total;
                table.find('.ytd_last_total').html(ytd_last_total);

                
        });

        var nEditing = null;
        var nNew = false;

        $('#tab_'+key+'_new').click(function (e) {
            e.preventDefault();

            if (nNew && nEditing) {
                if (confirm("Previose row not saved. Do you want to save it ?")) {
                    saveRow(oTable, nEditing); // save
                    //$(nEditing).find("td:first").html("Untitled");
                    nEditing = null;
                    nNew = false;

                } else {
                    oTable.fnDeleteRow(nEditing); // cancel
                    nEditing = null;
                    nNew = false;
                    
                    return;
                }
            }
            var row  = { 
                'tb_field':'',
                'cm_actual':'',
                'cm_budget':'',
                'cm_variance':'',
                'ytd_actual':'',
                'ytd_budget':'',
                'ytd_variance':'',
                'ytd_last':''
            };
            var aiNew = oTable.fnAddData(row);
            var nRow = oTable.fnGetNodes(aiNew);
            //console.log(nRow);
            editRow(oTable, nRow);
            nEditing = nRow;
            nNew = true;
        });

        table.on('click', '.delete', function (e) {
            e.preventDefault();

            if (confirm("Are you sure to delete this row ?") == false) {
                return;
            }

            var nRow = $(this).parents('tr')[0];
            var aData = oTable.fnGetData(nRow);
                //console.log(aData);
                var url = $('meta[name=base_url]').attr('content')+'service/financial/delete_financial';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var data = {
                    'data':aData
                };
                $.ajax({
                    url:url,
                    method:'post',
                    dataType:'json',
                    data:data,
                    success:function(resp){
                        //console.log(resp);
                        initTable1(resp['aaData'], resp['id']);
                    },
                    error:function(error){
                        console.log(error);
                    }
                });
            oTable.fnDeleteRow(nRow);
            //alert("Deleted! Do not forget to do some ajax to sync with backend :)");
        });

        table.on('click', '.cancel', function (e) {
            e.preventDefault();
            if (nNew) {
                oTable.fnDeleteRow(nEditing);
                nEditing = null;
                nNew = false;
            } else {
                restoreRow(oTable, nEditing);
                nEditing = null;
            }
        });

        table.on('click', '.edit', function (e) {
            e.preventDefault();

            /* Get the row as a parent of the link that was clicked on */
            var nRow = $(this).parents('tr')[0];
            if (nEditing !== null && nEditing != nRow) {
                /* Currently editing - but not this row - restore the old before continuing to edit mode */
                restoreRow(oTable, nEditing);
                editRow(oTable, nRow);
                nEditing = nRow;
            } else if (nEditing == nRow && this.innerHTML == "Save") {
                /* Editing this row and want to save it */
                saveRow(oTable, nEditing);
                nEditing = null;
                //alert("Updated! Do not forget to do some ajax to sync with backend :)");
                //console.log(nRow);
                var aData = oTable.fnGetData(nRow);
                aData['tb_code'] = key;
                //console.log(aData);
                var url = $('meta[name=base_url]').attr('content')+'service/financial/update_financial';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var data = {
                    'data':aData
                };
                $.ajax({
                    url:url,
                    method:'post',
                    dataType:'json',
                    data:data,
                    success:function(resp){
                        //console.log(resp);
                        aData['id'] = resp;
                        oTable.fnUpdate(aData, nRow);
                    },
                    error:function(error){
                        console.log(error);
                    }
                });
            } else {
                /* No edit in progress - let's start one */
                editRow(oTable, nRow);
                nEditing = nRow;
            }
        });
        
    }

    return {

        //main function to initiate the module
        init: function () {
            handleTable();
        }

    };

}();