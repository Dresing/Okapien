$(function() {
    $( "#newCaseModal .action" ).click(function() {
        var modal = $($(this).data('target'));
        var output = $(modal.data('output'));
        var form = $(modal.data('form'));
        $.ajax({
            method: 'post',
            url: form.find('input[name="target"]').val(),
            dataType: 'json',
            data: form.serialize(),
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
    });

    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'DD/MM-YYYY', language: 'da'});
    $('#daterange-btn').daterangepicker(
        {
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        },
        function (start, end) {
            $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );


});


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

var Modal = function(data) {

    // ID of the modal, should be the same as the button target.
    this.id = typeof data.id !== 'undefined' ? data.id : 'modal';

    // Title on the modal
    this.title = typeof data.title !== 'undefined' ? data.title : 'Modal';

    // Text on the close button
    this.close = typeof data.close !== 'undefined' ? data.close : 'Luk';

    // Text on the close button
    this.actionText = typeof data.actionText !== 'undefined' ? data.actionText : 'Opret';

    // Should the modal close when the action was successful?
    this.closeOnSuccess = typeof data.closeOnSuccess !== 'undefined' ? data.closeOnSuccess : true;

    // What should the input fields look like?
    this.input = typeof data.input !== 'undefined' ? data.input : '';

    this.inputID = data.inputID;
    this.data = {};



    this.init = function() {
        $('body').append(
            '<div class="modal fade" id="'+this.id+'" tabindex="-1" role="dialog" aria-labelledby="Kvailitativ" aria-hidden="true"> ' +
            +   '<div class="modal-dialog" role="document">'
            +      '<div class="modal-content">'
            +          '<div class="modal-header">'
            +              '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'
            +                  '<span aria-hidden="true">&times;</span>'
            +              '</button>'
            +              '<h4 class="modal-title" id="exampleModalLabel">'+this.title+'</h4>'
            +          '</div>'
            +          '<div class="modal-body">'
            +              '<form>'
            +                  '<div class="form-group">'
            +                       this.input
            +                  '</div>'
            +              '</form>'
            +              '<div class="response"></div>'
            +          '</div>'
            +          '<div class="modal-footer">'
            +              '<button type="button" class="btn btn-secondary" data-dismiss="modal">Luk</button>'
            +              '<button type="button" onClick="" class="btn btn-primary add">Opret</button>'
            +          '</div>'
            +      '</div>'
            +   '</div>'
            +'</div>');
        for(var i = 0; i < this.inputID.length; i++){
            this.data[$(this.inputID[i]).attr('name')] = $(this.inputID[i]).attr('value');
        }
        console.log(this.data);
    };




};
/*

 */
function ajaxPost(url){



}
//# sourceMappingURL=all.js.map
