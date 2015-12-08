$(document).ready(function() {
    $('#buy-buy').on('keyup', function(event) {
        $('#buy-for').val($(this).val() * 50);
    });

    $('#datePicker')
        .datepicker({
            format: 'yyyy-mm-dd'
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#eventForm').formValidation('revalidateField', 'date');
        });
});