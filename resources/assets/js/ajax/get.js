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