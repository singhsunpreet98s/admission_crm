function dd() {
    if (true)
        return;

    console.log(arguments);
}
function handlerFail(jqXHR, textStatus, errorThrown) {
    dd(jqXHR, textStatus, errorThrown);

    if (jqXHR.status == 401) {
        return window.location.reload();
    }

    if (jqXHR.status >= 500) {
        toastr.error("It looks like something went wrong", 'Error');
        return;
    }
}

function handlerFailModal(jqXHR, textStatus, errorThrown) {
    handlerFail(jqXHR, textStatus, errorThrown);

    modal = $modal.initModal('error-modal');
    modal.find('.contents').html(jqXHR.responseText);
    /*
        if (typeof jqXHR.responseJSON.errors) {
            var text = '';
    
            $.each( jqXHR.responseJSON.errors, function( key, value ) {
                text = text + value + '<br>';
            });
    
            console.log(text, jqXHR.responseJSON.errors);
            modal.find('.contents').html(text );
        }
    */
    modal.modal('show');

    initComponents(modal);
}
function initComponents(container) {
    container = container || 'body';

    dd('initComponents: ' + container);

    $container = $(container);
}