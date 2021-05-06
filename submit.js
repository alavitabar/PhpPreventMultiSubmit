(function () {
    $('.form-submit').on('submit', function () {
        $('button-submit').attr('disabled', true);
        $('.spinner').show();
    })
})