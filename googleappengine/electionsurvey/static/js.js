$(function(){
    //$('#container').hide(750) testing
    
    if ($('form#electionsurvey').length) {
        var more_explanation_label_unfolded = $('ul.questions > li div.more_explanation label').html();
        var more_explanation_label_folded = "After you answer, optional space for a short explanation is available.";

        // Enable/disable more explanation fields at start according to status of radio buttons
        $('ul.questions textarea').attr('disabled', 'disabled').addClass('disabled').hide();
        $('ul.questions div.more_explanation label').html(more_explanation_label_folded);
        $('ul.questions > li').has('input:radio:checked').find('textarea').removeAttr('disabled').removeClass('disabled').show();
        $('ul.questions > li').has('input:radio:checked').find('div.more_explanation label').html(more_explanation_label_unfolded);
        // Allow editing of more explanations when radio button has been pressed
        $('input:radio').change(function(){
            $(this).closest('ul.questions > li').find('textarea').removeAttr('disabled').removeClass('disabled').show(600);
            $(this).closest('ul.questions > li').find('div.more_explanation label').html(more_explanation_label_unfolded);
        });

        // Autosave the form when any part of it changes
        $('input:radio').add('ul.questions textarea').change(autosave_survey_form);
        // Autosave if they close the window (in case in middle of typing in textarea)
        window.onbeforeunload = autosave_survey_form;
        // Autosave when the submit button is clicked (although this will do an onbeforeunload also?)
        $('form#electionsurvey').submit(autosave_survey_form);

        // Prevent too much text in the more explanation fields
        $('ul.questions').find('textarea').textLimiter(250, { limitColor: '#FF0000' });
    }

    $('table.answers tr.what-you-think a').click(function() {
	    $(this).css('background-color', '#eee');
	    var table = $(this).parents('table.answers');
	    var cell = $(this).parent();
	    $('tr > td', table).css('background-color', '#fff');
	    column = cell.parent("tr").children().index(cell) + 1;
	    $('tr > td:nth-child('+column+')[class!=explanation]', table).css('background-color', '#ffc');
	    var colindex = $.inArray($(this).parents('td'), $('td', $(this).parents('tr')));
	    table.find('tr.what-they-think').fadeIn(600);
	    table.find('.explanation').css('visibility', 'visible');
	    table.find('.you').html('<strong>You</strong>');

	    var li = $(this).closest('li.answer');
	    $('html,body').animate({ 'scrollTop': li.offset().top });
	    return false;
	});

    if ($('form#postcode_form').length) {
        $('form#postcode_form #id_postcode').focus()
    }
});

// Store form data on server so can come back to it later
function autosave_survey_form() {
    var token = $('input#token').val();
    // see if the form is modified at all, i.e. we have
    // some fields in it other than token / questions_submitted
    var fields = $('form#electionsurvey').serializeArray();
    var filled_in = false;
    jQuery.each(fields, function(i, field){
        if (field.name != 'token' && field.name != 'questions_submitted') {
            filled_in = true;
        }
    });
    if (filled_in) {
        // store all the form data
        var ser = $('form#electionsurvey').serialize();
        // submit it to the server
        $.ajax({ url: "/survey/autosave/" + token, context: document.body, type: 'POST', data: { 'ser': ser }, success: function(){
            $('div#autosave').stop(true, true).show().fadeOut(2000);
        }});
    }
}

