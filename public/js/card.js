$(document).ready(function () {
    

    $('#card').click(function (e) { 
        e.preventDefault();
        var title = $('#title').val();
        $.get(`/admin/api/${title}`, data,
            function (data, textStatus, jqXHR) {
                $('#val').val(data);
            },
        );
    });

});