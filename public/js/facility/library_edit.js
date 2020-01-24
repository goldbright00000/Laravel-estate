var Library_Edit = function () {

    var handleInput = function () {

        $('#facility_type').select2({
            placeholder: "Select an option",
            allowClear: true
        });

        if (!jQuery().tagsInput) {
            return;
        }
        $('#equipment').tagsInput({
            width: 'auto',
            defaultText:'Enter',
            'onAddTag': function () {
                //alert(1);
            }
        });

        if (jQuery().timepicker) {
            $('.timepicker-default').timepicker({
                autoclose: true,
                showSeconds: false,
                minuteStep: 1,
                defaultTime: 'value'
            });
        }

        if (!jQuery().wysihtml5) {
            return;
        }

        if ($('.wysihtml5').size() > 0) {
            $('.wysihtml5').wysihtml5({
                "stylesheets": [$('meta[name=base_url]').attr('content')+"plugins/bootstrap-wysihtml5/wysiwyg-color.css"]
            });
        }

        $("#charge1").TouchSpin({
            buttondown_class: 'btn green',
            buttonup_class: 'btn green',
            min: 0,
            step: 0.01,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '$'
        }); 

        $("#charge2").TouchSpin({
            buttondown_class: 'btn green',
            buttonup_class: 'btn green',
            min: 0,
            step: 0.01,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '$'
        });

        $("#charge3").TouchSpin({
            buttondown_class: 'btn green',
            buttonup_class: 'btn green',
            min: 0,
            step: 0.01,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '$'
        });

        $('#rule_session').on('ifChecked', function(){
            $('#session_based').show();
        });
        $('#rule_session').on('ifUnchecked', function(){
            $('#session_based').hide();
        });
    }

    var changeInput = function() {
    	$('input[name=start]').timepicker().on('change', function(){
    		$('input[name=special]').each(function(e){
    			if(!$(this).attr('checked'))
    				//console.log('ok');
    				$('input[name=start_'+$(this).val()+']').timepicker('setTime', $('input[name=start]').val());
    		});
    	});
    	$('input[name=end]').timepicker().on('change', function(){
    		$('input[name=special]').each(function(e){
    			if(!$(this).attr('checked'))
    				//console.log('ok');
    				$('input[name=end_'+$(this).val()+']').timepicker('setTime', $('input[name=end]').val());
    		});
    	});

    	$('input[name=special]').on('ifChecked', function(event){
		  	$('#special_'+$(this).val()).show();
    	});

    	$('input[name=special]').on('ifUnchecked', function(event){
    		$('#special_'+$(this).val()).hide();
    		$('input[name=start_'+$(this).val()+']').timepicker('setTime', $('input[name=start]').val());
    		$('input[name=end_'+$(this).val()+']').timepicker('setTime', $('input[name=end]').val());
    	});
    }

    return {
        //main function to initiate the module
        init: function () {            
            handleInput();
            changeInput();
        }
    };

}();