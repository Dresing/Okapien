
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