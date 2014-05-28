$('document').ready(function() {
    fajta();

    $('.fajtaList').submit(function(event) {
        event.preventDefault();

        var get = $.get("/etterem/zh/recept.php", {azonosito: $('#etel').val()});

        get.done(function(data) {
            $('#recept').html(data);
            $('#reset').on('click', function() {
                $('#recept').html("");
                fajta();
            });
        });
    });

});

function fajta() {
    var url = "/etterem/zh/fajtak.php";
    var get = $.get(url);
    $('.fajtaSel').html("");
    $('.fajtaList').html("");
    get.done(function(data) {
        $('.fajtaSel').html(data);
        $('.fajtak').on('click', function() {
            $('#fajtaVal').removeAttr('hidden', 'hidden');
            $('.fajtak, br').not($(this)).remove();
            var etel = $.get("/etterem/zh/etel.php", {tipus: $(this).attr('id')});
            etel.done(function(data) {
                $('.fajtaList').html(data);
            });
        });
    });
}
;