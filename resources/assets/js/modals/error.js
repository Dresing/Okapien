function quickModal(title, resp, type){

    if (typeof type === 'undefined') {
        type = "danger";
    }
    if (typeof title === 'undefined') {
        title = "Fejl";
    }
    if (typeof resp === 'undefined') {
        resp = "Der skete en intern fejl.";
    }
    var randId = Math.random().toString(36).substr(2);
    $('html').append('<div id="'+randId+'" class="modal modal-'+type+'">' +
        '<div class="modal-dialog">' +
        '<div class="modal-content">' +
        '<div class="modal-header">' +
        '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
        '<span aria-hidden="true">×</span></button>' +
        '<h4 class="modal-title">'+title+'</h4>' +
        '</div>' +
        '<div class="modal-body">' +
        '<p>'+resp+'</p>' +
        '</div>' +
        '<div class="modal-footer">' +
        '<button type="button" class="btn btn-outline" data-dismiss="modal">Luk</button>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>');
    $('#'+randId).modal('toggle');
}













