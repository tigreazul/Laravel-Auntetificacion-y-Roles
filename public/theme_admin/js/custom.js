var i = 0;
<<<<<<< HEAD
function AjaxSendForm(url, placeholder, form, append) {
    var data = $(form).serialize();
=======
function AjaxSendForm(idForm, placeholder, form, append) {
    var data = $(form).serialize();
    let url = $(idForm).attr('action');
>>>>>>> 49eb0b2baf3f9b0824b92dae3836a2e3fcbfec73
    append = (append === undefined ? false : true); // whatever, it will evaluate to true or false only
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        beforeSend: function() {
            // setting a timeout
<<<<<<< HEAD
            $(placeholder).addClass('loading');
=======
            // $(placeholder).addClass('loading');
            $('.loader-cards').parents('.card').addClass("card-load");
            $('.loader-cards').parents('.card').append('<div class="card-loader"><i class="feather icon-radio rotate-refresh"></div>');
>>>>>>> 49eb0b2baf3f9b0824b92dae3836a2e3fcbfec73
            i++;
        },
        success: function(data) {
            if (append) {
                $(placeholder).append(data);
            } else {
                $(placeholder).html(data);
            }
        },
        error: function(xhr) { // if error occured
            alert("Error occured.please try again");
            $(placeholder).append(xhr.statusText + xhr.responseText);
            $(placeholder).removeClass('loading');
        },
        complete: function() {
            i--;
            if (i <= 0) {
                $(placeholder).removeClass('loading');
            }
        },
        dataType: 'html'
    });
}