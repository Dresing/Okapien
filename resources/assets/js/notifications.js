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