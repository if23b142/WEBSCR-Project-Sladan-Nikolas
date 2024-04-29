$(document ).ready(function()
{
    $.ajax({
        type: "GET",
        url: "../backend/serviceHandler.php",
        cache: false,
        data: {method: "queryAppointmentById", param: searchterm},
        dataType: "json",
        success: function (response) {
            var idsHtml = "";
            for (var i = 0; i < response.length; i++) {
                idsHtml += "<div>" + response[i][0].id + "</div>";
            }
            $("#appointment-list").html(idsHtml);
        }
    });
});
