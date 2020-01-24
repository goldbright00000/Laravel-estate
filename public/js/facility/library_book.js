var Library_Book = function () {
    var facility_id = $('input[name=facility_id]').val();
    var handleInput = function () {
        if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                rtl: Metronic.isRTL(),
                orientation: "left",
                autoclose: true
            });
            //$('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }

        $('.date-picker').datepicker().on('changeDate', function(ev){
            //console.log(moment(ev.date).weekday());
            $('input[name=weekday]').val(moment(ev.date).weekday());
            var url = $('meta[name=base_url]').attr('content')+"facility/library/get_available";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var data = {
                'facility_id': facility_id,
                'weekday':moment(ev.date).weekday(),
                'bookdate':ev.format('yyyy-mm-dd')
            }
            $.ajax({
                url:url,
                method:'post',
                dataType:'json',
                data:data,
                success:function(resp){
                    console.log(resp);
                    $(".available-list").show();
                    if(resp.based==0){
                        $('#book_hours').show();
                        var htmlstr = "";
                        for(var key in resp.available){
                            htmlstr+=moment(resp.available[key].start,"hh:mm:ss").format('h:mm A')+' - '+moment(resp.available[key].end,"hh:mm:ss").format('h:mm A')+'<br>';
                        }
                        $('.time-list').html(htmlstr);
                    }else{
                        $('#book_hours').hide();
                        var htmlstr = "<select class='form-control' name='select_book_hour'>";
                        for(var key in resp.available){
                            htmlstr+='<option data-start="'+moment(resp.available[key].start,"hh:mm:ss").format('h:mm A')+'" data-end="'+moment(resp.available[key].end,"hh:mm:ss").format('h:mm A')+'">'+moment(resp.available[key].start,"hh:mm:ss").format('h:mm A')+' - '+moment(resp.available[key].end,"hh:mm:ss").format('h:mm A')+'</option>';
                        }
                        htmlstr+="</select>";
                        $('.time-list').html(htmlstr);
                    }
                    
                    //$('.available-list').show();
                },
                error:function(error){
                    console.log(error);
                }
            });
        });

        if (jQuery().timepicker) {
            $('.timepicker-default').timepicker({
                autoclose: true,
                showSeconds: false,
                minuteStep: 1
            });
        }

        $('form').on('change', 'select[name=select_book_hour]', function(){
            $('input[name=start]').timepicker('setTime', $('select[name=select_book_hour] option:selected').data('start'));
            $('input[name=end]').timepicker('setTime', $('select[name=select_book_hour] option:selected').data('end'));
            console.log($('select[name=select_book_hour] option:selected').data('start'));
        });
        
    }

    return {
        //main function to initiate the module
        init: function () {            
            handleInput();
        }
    };

}();