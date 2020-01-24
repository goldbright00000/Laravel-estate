var Registration = function () {

    var handleInput = function(){
        if (jQuery().datepicker) {

            $('.date-picker').datepicker({
                rtl: Metronic.isRTL(),
                orientation: "right",
                autoclose: true
            });
            $('.date-picker-purchase').datepicker({
                rtl: Metronic.isRTL(),
                orientation: "right",
                endDate: '+0d',
                autoclose: true
            });


            //$('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }
        $('.select2').select2({
            placeholder: "Select Country",
            allowClear: true
        });
    }

    return {
        //main function to initiate the module
        init: function () {            
            handleInput();
        }
    };

}();