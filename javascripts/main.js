
$('document').ready(function() {
    event.preventDefault();
    $('#tables').on('change', function() {
        showTable(this.value);
        this.value !== "" ? $('#newRow').removeAttr('disabled') : $('#newRow').attr('disabled', 'disabled');
        $('#inputForm').fadeOut(350, function() {
            $(this).html("");
        });
    });

    $('#newRow').on('click', function() {
        $('#inputForm').attr('action', '/etterem/addRow.php');
        getForm($('#tables').val());
    });

    $('#deleteRow').on('click', function() {
        $('#rowSelect').attr('action', '/etterem/deleteRow.php');
        $('#sendRow').trigger('click');
    });

    $('#updateRow').on('click', function() {
        $('#inputForm').attr('action', '/etterem/updateRow.php');
        var term = $('#rowSelect').serialize();
        $.get('/etterem/getRow.php', term)
                .done(function(data) {
                    $('#inputForm').html("");
                    $('#inputForm').fadeIn(350, function() {
                        $(this).append(data);
                    });
                    $('#inputForm').removeAttr('hidden');
                });
    });

    $('#inputForm').submit(function(event) {
        $('#inputForm').find(':input:disabled').removeAttr('disabled');
        event.preventDefault();
        var $form = $(this),
                term = $('#inputForm').serialize(),
                url = $form.attr('action');

        var post = $.post(url, term);

        post.done(function(data) {
            alert(data);
            $('#inputForm').fadeOut(350, function() {
                $(this).html("");
            });
            showTable($('#tables').val());
        });
    });

    $('#rowSelect').submit(function(event) {
        event.preventDefault();
        var form = $(this),
                term = form.serialize(),
                url = form.attr('action');

        var post = $.post(url, term);

        post.done(function(data) {
            alert("Row deleted successfuly " + data);
            showTable($('#tables').val());
        });
    });
});

function showTable(str) {
    if (str === "") {
        $("#content").html("");
        return;
    }

    var url = "/etterem/getTables.php";

    var get = $.get(url, {q: str});

    get.done(function(data) {
        $('.content').html(data);

        $('#rowSelect').on('change', function() {
            $('#updateRow').removeAttr('disabled');
            $('#deleteRow').removeAttr('disabled');
        });
    });

    get.always(function() {
        $('#updateRow').attr('disabled', 'disabled');
        $('#deleteRow').attr('disabled', 'disabled');
    });
}

function getForm(str) {
    if (str === "") {
        return;
    }

    $.get("/etterem/newForm.php", {table: str})
            .done(function(data) {
                $('#inputForm').html("");
                $('#inputForm').fadeIn(350, function() {
                    $(this).append(data);
                });
                $('#inputForm').removeAttr('hidden');
            });
}
