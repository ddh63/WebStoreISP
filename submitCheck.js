$(document).ready(function() {
   
    $('input').keyup(function() {

        var empty = false;
        
        $('#fname').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });

        $('#lname').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });
        
        $('#address').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });
        
        $('#zip').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });
        
        $('#city').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });
        
        $('#cc').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });

        if (empty) {
            $('#submit').attr('disabled', 'disabled');
        } else {
            $('#submit').removeAttr('disabled');
        }
    });

});