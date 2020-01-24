var Calendar = function() {
    var handleDatetimePicker = function () {

        if (!jQuery().datetimepicker) {
            return;
        }

        $(".start_date").datetimepicker({
            isRTL: Metronic.isRTL(),
            format: "dd MM yyyy - HH:ii P",
            showMeridian: true,
            autoclose: true,
            pickerPosition: (Metronic.isRTL() ? "bottom-right" : "bottom-left"),
            todayBtn: true
        });
        $(".end_date").datetimepicker({
            isRTL: Metronic.isRTL(),
            format: "dd MM yyyy - HH:ii P",
            showMeridian: true,
            autoclose: true,
            pickerPosition: (Metronic.isRTL() ? "bottom-right" : "bottom-left"),
            todayBtn: true
        });

        //$('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
    }

    var initCalendar = function() {
            if (!jQuery().fullCalendar) {
                return;
            }

            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            var h = {};

            if (Metronic.isRTL()) {
                if ($('#calendar').parents(".portlet").width() <= 720) {
                    $('#calendar').addClass("mobile");
                    h = {
                        right: 'title, prev, next',
                        center: '',
                        left: 'agendaDay, agendaWeek, month, today'
                    };
                } else {
                    $('#calendar').removeClass("mobile");
                    h = {
                        right: 'title',
                        center: '',
                        left: 'agendaDay, agendaWeek, month, today, prev,next'
                    };
                }
            } else {
                if ($('#calendar').parents(".portlet").width() <= 720) {
                    $('#calendar').addClass("mobile");
                    h = {
                        left: 'title, prev, next',
                        center: '',
                        right: 'today,month,agendaWeek,agendaDay'
                    };
                } else {
                    $('#calendar').removeClass("mobile");
                    h = {
                        left: 'title',
                        center: '',
                        right: 'prev,next,today,month,agendaWeek,agendaDay'
                    };
                }
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            var global_event = null;
            $.ajax({
                url:'event_calendar/get_events',
                method:'post',
                dataType:'json',
                success:function(resp){
                    var mem = [];
                    for(var key in resp){
                        mem.push({title:resp[key].title,
                                start: new Date(resp[key].start),
                                end: new Date(resp[key].end),
                                backgroundColor: '#474747',
                                contact_person:resp[key].contact_person,
                                contact_number:resp[key].contact_number,
                                contact_email:resp[key].contact_email,
                                description:resp[key].description,
                                allDay:((resp[key].allDay==1)?true:false),
                                event_type:resp[key].event_type,
                                id:resp[key].id
                            });
                    }
                    $('#calendar').fullCalendar('destroy'); // destroy the calendar
                        $('#calendar').fullCalendar({ //re-initialize the calendar
                            header: h,
                            defaultView: 'month', // change default view with available options from http://arshaw.com/fullcalendar/docs/views/Available_Views/ 
                            slotMinutes: 15,
                            selectable:true,
                            editable: true,
                            droppable: true, // this allows things to be dropped onto the calendar !!!
                            events: mem,
                            eventClick: function(event, jsEvent, view) {                                                                
                                global_event = event;
                                $("#edit_event .start_date").datetimepicker('setDate', new Date(moment(event.start).format('YYYY-MM-DD hh:mm:ss')));
                                $("#edit_event .end_date").datetimepicker('setDate', new Date(moment(event.end).format('YYYY-MM-DD hh:mm:ss')));
                               
                                $("#edit_event").modal('show');
                                if(event.title){
                                    $('#edit_event input[name=title]').val(event.title).removeClass('edited').addClass('edited');
                                }else{
                                    $('#edit_event input[name=title]').val('').removeClass('edited');
                                }
                                if(event.contact_person){
                                    $('#edit_event input[name=contact_person]').val(event.contact_person).removeClass('edited').addClass('edited');
                                }else{
                                    $('#edit_event input[name=contact_person]').val('').removeClass('edited');
                                }
                                if(event.contact_number){
                                    $('#edit_event input[name=contact_number]').val(event.contact_number).removeClass('edited').addClass('edited');
                                }else{
                                    $('#edit_event input[name=contact_number]').val('').removeClass('edited');
                                }
                                if(event.contact_email){
                                    $('#edit_event input[name=contact_email]').val(event.contact_email).removeClass('edited').addClass('edited');
                                }else{
                                    $('#edit_event input[name=contact_email]').val('').removeClass('edited');
                                }
                                if(event.description){
                                    $('#edit_event textarea[name=description]').val(event.description).removeClass('edited').addClass('edited');
                                }else{
                                    $('#edit_event textarea[name=description]').val('').removeClass('edited');
                                }
                                $('#edit_event input[value='+event.event_type+']').attr('checked','');
                                if(event.allDay){
                                    $('#edit_event input[name=allDay]').attr('checked','');
                                }else{
                                    $('#edit_event input[name=allDay]').removeAttr('checked');
                                }
                                $('#edit_event .btn-remove').val(event.id);
                                $('#edit_event .btn-ok').val(event.id);
                            },
                            eventDrop: function(event,jsEvent, view) {
                                //console.log(event);
                                var url = 'event_calendar/update_event';
                                var data = {
                                    'id':event.id,
                                    'title':event.title,
                                    'contact_person':event.contact_person,
                                    'contact_number':event.contact_number,
                                    'contact_email':event.contact_email,
                                    'event_type':event.event_type,
                                    'description':event.description,
                                    'start':moment(event.start).format('YYYY-MM-DD hh:mm:ss'),
                                    'end':moment(event.end).format('YYYY-MM-DD hh:mm:ss'),
                                    'allDay':(event.allDay?1:0)
                                };
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
                                    },
                                    error:function(error){
                                        console.log(error);
                                    }
                                });
                            },
                            select: function(start,end, jsEvent, view) {
                                var currenttime = new Date();
                                var selecttime = new Date(start);
                                if (selecttime <= currenttime) 
                                    return;

                                var starttime = moment(start).format('MMMM Do YYYY h:mm a'); 
                                var endtime = moment(end).format('h:mm a'); 
                                var allDay = !start.hasTime() && !end.hasTime();
                                $("#new_event .start_date").datetimepicker('setDate', new Date(moment(start).format('YYYY-MM-DD hh:mm:ss')));
                                $("#new_event .end_date").datetimepicker('setDate', new Date(moment(end).format('YYYY-MM-DD hh:mm:ss')));
                                $('#new_event .edited').val('');
                                $('#new_event .edited').removeClass('edited');
                                $('#new_event input[value=public]').attr('checked','');
                                if(allDay){
                                    $('#new_event input[name=allDay]').attr('checked','');
                                }else{
                                    $('#new_event input[name=allDay]').removeAttr('checked');
                                }
                                
                                $('#new_event').modal('show');
                            },
                            eventResize: function(event, jsEvent, view){
                                //console.log(event);
                                var url = 'event_calendar/update_event';
                                var data = {
                                    'id':event.id,
                                    'title':event.title,
                                    'contact_person':event.contact_person,
                                    'contact_number':event.contact_number,
                                    'contact_email':event.contact_email,
                                    'event_type':event.event_type,
                                    'description':event.description,
                                    'start':moment(event.start).format('YYYY-MM-DD hh:mm:ss'),
                                    'end':moment(event.end).format('YYYY-MM-DD hh:mm:ss'),
                                    'allDay':(event.allDay?1:0)
                                };
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
                                    },
                                    error:function(error){
                                        console.log(error);
                                    }
                                });
                            }
                        });
                    console.log(mem);
                },
                error:function(error){
                    console.log(error);
                }
            });
            
            $('#post-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    contact_email: {
                        required: true,
                        email: true
                    }
                    
                },

                messages: { // custom messages for radio buttons and checkboxes
                    tnc: {
                        required: "Please accept TNC first."
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
                    //form.submit();
                    alert('submit');
                    
                }
            });

            $('#new_event').on('click','.btn-ok', function(){
                var url = 'event_calendar/add_event';           

                var data = {
                    'title':$('#new_event input[name=title]').val(),
                    'contact_person':$('#new_event input[name=contact_person]').val(),
                    'contact_number':$('#new_event input[name=contact_number]').val(),
                    'contact_email':$('#new_event input[name=contact_email]').val(),
                    'event_type':$('#new_event input[name=radio]:checked').val(),
                    'description':$('#new_event textarea[name=description]').val(),
                    'start':moment($("#new_event .start_date").datetimepicker().data("datetimepicker").getDate()).format('YYYY-MM-DD hh:mm:ss'),
                    'end':moment($("#new_event .end_date").datetimepicker().data("datetimepicker").getDate()).format('YYYY-MM-DD hh:mm:ss'),
                    'allDay':$('#new_event input[name=allDay]').attr('checked')?1:0
                };
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
                        data['id'] = resp['insert_id'];
                        $('#calendar').fullCalendar('renderEvent', data,true);
                        $('#new_event').modal('hide');
                    },
                    error:function(error){
                        console.log(error);
                        $('#new_event').modal('hide');
                    }
                });
               
            });

            $('#edit_event').on('click', '.btn-remove', function(){
                $('#calendar').fullCalendar('removeEvents', $(this).val());
                var url = 'event_calendar/remove_event';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:url,
                    method:'post',
                    dataType:'json',
                    data:{
                        'id':$(this).val()
                    },
                    success:function(resp){
                    },
                    error:function(error){
                    }
                });
                $('#edit_event').modal('hide');
            });

            $('#edit_event').on('click', '.btn-ok', function(){
                var url = 'event_calendar/update_event';
                var data = {
                    'id':$(this).val(),
                    'title':$('#edit_event input[name=title]').val(),
                    'contact_person':$('#edit_event input[name=contact_person]').val(),
                    'contact_number':$('#edit_event input[name=contact_number]').val(),
                    'contact_email':$('#edit_event input[name=contact_email]').val(),
                    'event_type':$('#edit_event input[name=radio]:checked').val(),
                    'description':$('#edit_event textarea[name=description]').val(),
                    'start':moment($("#edit_event .start_date").datetimepicker().data("datetimepicker").getDate()).format('YYYY-MM-DD hh:mm:ss'),
                    'end':moment($("#edit_event .end_date").datetimepicker().data("datetimepicker").getDate()).format('YYYY-MM-DD hh:mm:ss'),
                    'allDay':$('#edit_event input[name=allDay]').attr('checked')?1:0
                };
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                global_event['id'] = data['id'];
                global_event['title'] = data['title'];
                global_event['contact_person'] = data['contact_person'];
                global_event['contact_number'] = data['contact_number'];
                global_event['contact_email'] = data['contact_email'];
                global_event['event_type'] = data['event_type'];
                global_event['description'] = data['description'];
                global_event['allDay'] = data['allDay'];
                $.ajax({
                    url:url,
                    method:'post',
                    dataType:'json',
                    data:data,
                    success:function(resp){
                        $('#calendar').fullCalendar('renderEvent', global_event, true);
                        $('#edit_event').modal('hide');
                    },
                    error:function(error){
                        console.log(error);
                        $('#edit_event').modal('hide');
                    }
                });
            });
    }
    return {
        //main function to initiate the module
        init: function() {
            initCalendar();
            handleDatetimePicker();
        }
    };

}();