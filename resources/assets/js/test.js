$('#addQualitative .add').click(function() {
        var $modal = $(this).parent().parent();
        $.ajax({
            url: 'http://mysafeino.com/api/data?list=englishmonarchs&format=json',
            data: {
                format: 'json'
            },
            error: function() {
                $modal.find('.modal-body .response').html('<div class="alert alert-warning fade in"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Fejl!</strong> Vi kunne desværre ikke oprette din case. </div>');
            },
            dataType: 'json',
            success: function(data) {
                $modal.find('.modal-body .response').html('<div class="alert alert-success fade in"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Success!</strong> Din case blev oprettet. </div>');
            },
            type: 'GET'
        });
});
