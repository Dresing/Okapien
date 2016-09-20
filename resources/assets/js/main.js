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

