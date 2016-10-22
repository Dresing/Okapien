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