var Question = function() {

    var option_index = 0;
    var handleModal = function() {
        $('.add-survey').on('click', function(){
            $('#new_survey .edited').val('');
            $('#new_survey .edited').removeClass('edited');
            $('#new_survey').modal('show');
        });

        $('#new_survey').on('click', '.btn-ok', function(){
            var data = {
                'question':$('#new_survey textarea[name=survey]').val()
            }
            var url = 'vote_survey/add_survey_question';
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
                    data['id'] = resp['id'];
                    data['count'] = $('.add-survey').data('count');
                    data['count']++;
                    $('.add-survey').attr('data-count', data['count']);
                    addSurveyHtml(data);
                    $('#new_survey').modal('hide');
                },
                error:function(error){
                    console.log(error);
                    $('#new_survey').modal('hide');
                }
            });
        });

        $('.add-poll').on('click', function(){

            $('#new_poll .edited').val('');
            $('#new_poll .edited').removeClass('edited');
            $('#new_poll ul.poll-options').html('');
            option_index = 0;
            $('#new_poll').modal('show');
        });

        $('#new_poll').on('click', '.add-option', function(){
            var option = $('#new_poll input[name=poll-option]').val();
            if(option.length>0){
                var html = '<li value="'+option_index+'"><span>'+option+'</span> <a href="#" class="select2-search-choice-close option-remove" tabindex="-1"></a></li>';
                $('ul.poll-options').append(html);
                $('#new_poll input[name=poll-option]').val('');
                option_index++;
            }
        });

        $('#new_poll').on('click', '.option-remove', function(){
            var parent = $(this).parents('li');
            parent.remove();
        });

        $('#new_poll').on('click', '.btn-ok', function(){
            var options = [];
            $(' #new_poll ul.poll-options li').each(function(){
                options.push({
                    'option':$(this).find('span').text(),
                    'option_value':$(this).val()
                });
            });
            var data = {
                'question':$('#new_poll textarea[name=poll]').val(),
                'options':options
            }
            //console.log(data);
            var url = 'vote_survey/add_poll_question';
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
                    data['id'] = resp['id'];
                    data['count'] = $('.add-poll').data('count');
                    data['count']++;
                    $('.add-poll').attr('data-count', data['count']);
                    addPollHtml(data);
                    $('#new_poll').modal('hide');
                },
                error:function(error){
                    console.log(error);
                    $('#new_poll').modal('hide');
                }
            });
        });
    }

    var addSurveyHtml = function(data){
        var htmlStr = '<div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title">'+             
        '<a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" href="#collapse_survey_'+data['count']+'" aria-expanded="false"> '+data['count']+'. '+data['question']+'</a>'+
                '</h4></div>'+
        '<div id="collapse_survey_'+data['count']+'" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">'+
            '<div class="panel-body">'+
                '<div class="form">'+
                    '<form role="form" id="post-form" data-id="'+data['id']+'">'+
                        '<div class="form-body">'+
                            '<div class="form-group form-md-line-input form-md-floating-label has-info">'+
                                '<textarea class="form-control" rows="3" name="answer"></textarea>'+
                                '<label for="form_control_1">Answer</label>'+
                            '</div>'+
                        '</div>'+
                        '<div class="form-actions noborder">'+
                            '<button type="button" class="btn blue btn-circle btn-submit">Submit</button>'+
                        '</div>'+
                '</form></div></div></div></div>';
        $('#tab1 .panel-group').append(htmlStr);
    }

    var addPollHtml = function(data){
        var htmlStr = '<div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title">'+             
        '<a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" href="#collapse_poll_'+data['count']+'" aria-expanded="false"> '+data['count']+'. '+data['question']+'</a>'+
                '</h4></div>'+
        '<div id="collapse_poll_'+data['count']+'" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">'+
                '<div class="panel-body">'+
                    '<div class="form">'+
                        '<form role="form" id="post-form" data-id="'+data['id']+'">'+
                            '<div class="form-body">';
                                for(var key in data['options']){
                                htmlStr+='<div class="md-radio-list">'+
                                    '<div class="md-radio">'+
                                        '<input type="radio" id="radio_'+data['count']+'_'+key+'" name="option_radio_'+data['count']+'" class="md-radiobtn" value="'+data['options'][key]['option_value']+'" data-text="'+data['options'][key]['option']+'">'+
                                        '<label for="radio_'+data['count']+'_'+key+'">'+
                                        '<span class="inc"></span>'+
                                        '<span class="check"></span>'+
                                        '<span class="box"></span> '+
                                        data['options'][key]['option']+' </label>'+
                                    '</div>'+                                                             
                                '</div>';
                            }
                             htmlStr+='</div>'+
                            '<div class="form-actions noborder">'+
                                '<button type="button" class="btn blue btn-circle btn-vote">VOTE</button>'+
                            '</div></form></div></div></div></div>';
        $('#tab2 .panel-group').append(htmlStr);
    }

    var handleSurvey = function() {
        $('#tab1').on('click', '.btn-submit', function(){
            var form = $(this).parents('form');
            var data = {
                'answer':form.find('textarea[name=answer]').val(),
                'survey_id':form.data('id')
            }

            var url = 'vote_survey/add_survey_answer';
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
                    //console.log(resp);
                    form.parent().html('<p>'+data.answer+'</p>');
                },
                error:function(error){
                    console.log(error);
                }
            });
        });

        $('#tab2').on('click', '.btn-vote', function(){
            var form = $(this).parents('form');
            var data = {
                'answer':form.find('input:checked').val(),
                'poll_id':form.data('id')
            }
            var url = 'vote_survey/add_poll_answer';
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
                    //console.log(resp);
                    form.parent().html('<p>'+form.find('input:checked').data('text')+'</p>');
                },
                error:function(error){
                    console.log(error);
                }
            });
        });
    }

    return {
        //main function to initiate the module
        init: function() {

            handleModal();
            handleSurvey();
        }

    };

}();