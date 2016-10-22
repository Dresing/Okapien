var monthNames = ["Januar", "Februar", "Marts", "April", "Maj", "Juni",
    "Juli", "August", "September", "Oktober", "November", "December"
];

function success(location, msg){
   $(location).html('<div class="alert alert-success fade in"> '+msg+' <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>');
}
function info(location, msg){
    $(location).html('<div class="alert alert-info fade in"> '+msg+' <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>');
}
function warning(location, msg){
    $(location).html('<div class="alert alert-warning fade in"> '+msg+' <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>');
}

function danger(location, msg){
    $(location).html('<div class="alert alert-danger fade in"> '+msg+' <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>');
}
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














function modalPost(button){
    var modal = $($(button).data('target'));
    var form = $(modal.data('form'));
    $.ajax({
        method: 'post',
        url: form.find('input[name="target"]').val(),
        dataType: 'json',
        data: form.serializeArray(),
        type: 'post',
        error: function() {
            warning(modal.find('.response'), "Der skete en fejl.");
        },
        success: function(data) {
            console.log(data.test);
            modal.modal('toggle');
            location.reload();
        },
    });
}
/**
 * Submits a form on a page with POST and handles the response.
 * The form makes some assumptions in how the form should look. In particular,
 * the form should have two mandatory fields: target and CRSF which will handle where to send the request and
 * handles the CRSF-token mechanism. All other fields are optional and will be send along the request. The values
 * be accessed in the backend with the name specified in the "name"-field as usual.
 *
 * @param formId Id of the form to submit
 * @param additional an array of fields that should be added to the request not specified in the form.
 * @param success In case of a successful request, this passed function will be executed.
 * @param failed In case of a failed request, this passed function will be executed.
 */
function formPost(formId, additional, success, failed){;
    var form = $(formId);
    var data = form.serializeArray();
    if (typeof additional === 'undefined') {
        additional = {};
    }
    data.push(additional);
    $.ajax({
        method: 'post',
        url: form.find('input[name="target"]').val(),
        dataType: 'json',
        data: data,
        type: 'post',
        error: function(xhr, status, error) {
            if (typeof failed !== 'undefined') {
                failed();
            }else{
                quickModal('Server fejl', error, 'danger');
            }

        },
        success: function(resp) {
            if(resp['status'] !== 'success'){
                if (typeof failed !== 'undefined') {
                    failed();
                }else{
                    quickModal('Adgang nægtet.', 'Der skete en fejl da du prøvede at få adgang.', 'warning');
                }
            }else{
                if (typeof success !== 'undefined') {
                    success();
                }
            }
        },
    });
}
function infiniteScroll(id, insert){
    var target = $($(id).data('target'));
    if(!$(id).data('tapped')) {
        if($(id).children('i').length <= 0) {
            getCall(id, {}, function (resp) {
                if (!jQuery.isEmptyObject(resp['data'])) {
                    insert(resp['data'], target);
                    var skip = parseInt($(id + ' input[name=skip]').val(), 10);
                    var take = parseInt($(id + ' input[name=take]').val(), 10);
                    $(id + ' input[name=skip]').val(skip + take);
                }
                else {
                    $(id).data('tapped', true);
                    $(id).hide();
                    console.log('empty');
                }
                target.append($(id));
            });
        }
    }
}
/**
 * Submits a form on a page with POST and handles the response.
 * The form makes some assumptions in how the form should look. In particular,
 * the form should have two mandatory fields: target and CRSF which will handle where to send the request and
 * handles the CRSF-token mechanism. All other fields are optional and will be send along the request. The values
 * be accessed in the backend with the name specified in the "name"-field as usual.
 *
 * @param formId Id of the form to submit
 * @param additional an array of fields that should be added to the request not specified in the form.
 * @param success In case of a successful request, this passed function will be executed.
 * @param failed In case of a failed request, this passed function will be executed.
 */
function getCall(formId, additional, success, failed) {
    var target = $($(formId).data('target'));
    $(formId).append('<i id="infiniteLoad" class="fa fa-refresh fa-spin button-text"></i>');

    var form = $(formId);
    var data = form.serializeArray();
    if (typeof additional === 'undefined') {
        additional = {};
    }
    data.push(additional);
    $.ajax({
        method: 'GET',
        url: form.find('input[name="target"]').val(),
        dataType: 'json',
        data: data,
        type: 'GET',
        error: function(xhr, status, error) {
            if (typeof failed !== 'undefined') {
                failed();
            }else{
                quickModal('Server fejl', error, 'danger');
            }
            $(formId + ' #infiniteLoad').remove();
        },
        success: function(resp) {
            if(resp['status'] !== 'success'){
                if (typeof failed !== 'undefined') {
                    failed(target);
                }else{
                    quickModal('Adgang nægtet.', 'Der skete en fejl da du prøvede at få adgang.', 'warning');
                }
            }else{
                if (typeof success !== 'undefined') {
                    success(resp, target);
                }
            }
            $(formId + ' #infiniteLoad').remove();
        }
    });
}
//Call this function before outputting content
function e(text) {
    var map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    };

    return text.replace(/[&<>"']/g, function(m) { return map[m]; });
}
//# sourceMappingURL=all.js.map
