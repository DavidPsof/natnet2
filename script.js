$(function () {
    $('form').submit(function (e) {
        var $form = $(this);
        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize()
        }).done(function (data) {
            console.log(data);
        }).fail(function () {
            console.log('fail');
        });
        e.preventDefault();
    });
    $('#push').on('click',function (e) {
        var $form = $(this);
        $.ajax({
            type: 'POST',
            url: '/ajax/insertInGoogleDocs.php',
            data: $form.serialize()
        }).done(function (data) {
            console.log(data);
        }).fail(function () {
            console.log('fail');
        });
        e.preventDefault();
    });
});