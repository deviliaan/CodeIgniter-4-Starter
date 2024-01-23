$(document).ready(function () {
    

    $("#card").click(function (e) { 
        e.preventDefault();
        var title = $("#title").text();
        $.ajax({
            type: "GET",
            url: `/admin/api/${title}`,
            success: function (response) {
                $('#card').html(JSON.stringify(response));
            }
        });
    });

});