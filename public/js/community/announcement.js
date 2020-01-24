var Announcement = function() {

    var addAction = function(a_id, update_id){
        var Str = '<a class="btn btn-circle btn-icon-only btn-edit btn-default" data-id="'+a_id+'" href="javascript:;">'+
                '<i class="icon-pencil"></i>'+
                '</a> '+
                '<a class="btn btn-circle btn-icon-only btn-trash btn-default" href="javascript:;">'+
                '<i class="icon-trash"></i>'+
                '</a> ';
        return Str;
    }

    var InitAnnouncements = function(type, data, role=null){
        var user_type = $('meta[name="user-type"]').attr('content');
        var user_id = $('meta[name="user-id"]').attr('content');
        $("."+type+"-body").html();
        var htmlStr = "";
        if(data){
            for(var key in data){
                htmlStr+= '<div class="col-md-12">'+
                    '<div class="portlet light bg-inverse">'+
                        '<div class="portlet-title">'+
                            '<div class="caption">'+
                                '<i class="icon-speech font-purple-plum"></i>'+
                                '<span class="caption-subject"> '+data[key].subject+'</span>'+
                                '<span class="caption-helper">  posted by '+data[key].given_name+' '+data[key].family_name+' on '+moment(data[key].datetime).format('MMM D, YYYY @ h:mm A')+'</span>'+
                            '</div>'+
                            '<div class="actions">';
                            if(type=="resident"){
                                if(role==1||role==2||role==3){
                                    htmlStr+=addAction(data[key].id, user_id);
                                }else if(user_id==data[key].publisher_id){
                                    htmlStr+=addAction(data[key].id, user_id);
                                }
                            }else{
                                if(role==1||role==2||role==3){
                                    htmlStr+=addAction(data[key].id, user_id);
                                }
                            }
                htmlStr+=
                            '</div>'+
                        '</div>'+
                        '<div class="portlet-body">'+                                
                                data[key].message+
                        '</div>'+
                    '</div>'+
                '</div>';
            }
        }
        $("."+type+"-body").html(htmlStr);

    }

    var AddAnnouncement = function(type, data){
        var htmlStr = "";
        htmlStr+= '<div class="col-md-12">'+
            '<div class="portlet light bg-inverse">'+
                '<div class="portlet-title">'+
                    '<div class="caption">'+
                        '<i class="icon-speech font-purple-plum"></i>'+
                        '<span class="caption-subject"> '+data.subject+'</span>'+
                        '<span class="caption-helper"> posted by '+data.given_name+' '+data.family_name+' on '+moment(data.datetime).format('MMM D, YYYY @ h:mm A')+'</span>'+
                    '</div>'+
                    '<div class="actions">'+
                        '<a class="btn btn-circle btn-icon-only btn-edit btn-default" data-id="'+data.id+'" href="javascript:;">'+
                        '<i class="icon-pencil"></i>'+
                        '</a> '+
                        '<a class="btn btn-circle btn-icon-only btn-trash btn-default" data-id="'+data.id+'" href="javascript:;">'+
                        '<i class="icon-trash"></i>'+
                        '</a> '+
                        '<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">'+
                        '</a> '+
                    '</div>'+
                '</div>'+
                '<div class="portlet-body">'+                                
                        data.message+
                '</div>'+
            '</div>'+
        '</div>';
        $("."+type+"-body").prepend(htmlStr);
    }

    var handleAnnouncement = function() {
        $('.resident-toggle').on('change',function(){
            var url = $('meta[name=base_url]').attr('content')+'community/announcement/get_announcements_'+$(this).val()+'_residents';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:url,
                method:'post',
                dataType:'json',                
                success:function(resp){
                    InitAnnouncements('resident', resp.data, resp.role.role_type);
                },
                error:function(error){
                    console.log(error);
                }
            });
        });

        $('.manager-toggle').on('change',function(){
            var url = $('meta[name=base_url]').attr('content')+'community/announcement/get_announcements_'+$(this).val()+'_managers';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:url,
                method:'post',
                dataType:'json',
                success:function(resp){
                    console.log(resp);
                    InitAnnouncements('manager', resp.data, resp.role.role_type);
                },
                error:function(error){
                    console.log(error);
                }
            });
        });
    }

    var handleModal = function(){
        $('#post-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                subject: {
                    required: true
                },
                message: {
                    required: true
                }
            },

            messages: {
                subject: {
                    required: "Subject is required."
                },
                message: {
                    required: "Subject is required."
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit   

            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },

            submitHandler: function(form) {
                form.submit();
            }
        });

        $('#edit-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                subject: {
                    required: true
                },
                message: {
                    required: true
                }
            },

            messages: {
                subject: {
                    required: "Subject is required."
                },
                message: {
                    required: "Subject is required."
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit   

            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },

            submitHandler: function(form) {
                form.submit();
            }
        });

        $('#create_announcement .btn-post').on('click', function(){
            if($('#post-form').validate().form()){
                var url = $('meta[name=base_url]').attr('content')+'community/announcement/set_announcement';
                var data = {
                    'subject': $('#create_announcement input[name=subject]').val(),
                    'message': $('#create_announcement textarea[name=message]').val(),
                    'publisher_id': $('meta[name="user-id"]').attr('content'),
                    'updated_by': $('meta[name="user-id"]').attr('content'),
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.post(url,data, function(resp){
                    data['id'] = resp['announcement_id'];
                    AddAnnouncement(resp['announcement_type'],data);
                }, 'json');
            }            
            $('#create_announcement').modal('hide');
        });

        $('.post-new').on('click', function(){
            $('#create_announcement .edited').val('');
            $('#create_announcement .edited').removeClass('edited');
            $('#create_announcement').modal('show');
        })
        var portlet = null;
        $('.portlet').on('click','.btn-edit', function(){
            portlet = $(this).closest('.portlet');
            if(!$('#edit_announcement .form-control').hasClass('edited')){
                $('#edit_announcement .form-control').addClass('edited');
            }
            $('#edit_announcement input[name=subject]').val($.trim(portlet.find('.caption-subject').text()));
            $('#edit_announcement textarea[name=message]').val($.trim(portlet.find('.portlet-body').text()));
            $('#edit_announcement .btn-post').attr('data-id', $(this).data('id'));
            $('#edit_announcement').modal('show');
        });

        $('#edit_announcement .btn-post').on('click', function(){
            if($('#edit-form').validate().form()){
                var url = $('meta[name=base_url]').attr('content')+'community/announcement/edit_announcement';
                data = {
                    'id': $(this).data('id'),
                    'subject': $('#edit_announcement input[name=subject]').val(),
                    'message': $('#edit_announcement textarea[name=message]').val(),
                    'updated_by': $('meta[name="user-id"]').attr('content')
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.post(url,data, function(resp){
                    //AddAnnouncement(data['announcement_type'],data);
                    if(resp.success){
                        portlet.find('.caption-subject').text(" "+$('#edit_announcement input[name=subject]').val());
                        portlet.find('.portlet-body').text($('#edit_announcement textarea[name=message]').val());
                    }
                }, 'json');
            }
            $('#edit_announcement').modal('hide');
        });
    }



    return {
        //main function to initiate the module
        init: function() {

            handleAnnouncement();
            handleModal();
        }

    };

}();