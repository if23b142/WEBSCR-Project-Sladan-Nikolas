//Starting point for JQuery init
$(document).ready(function () {
    $("#searchResult").hide();
    $("#btn_Search").click(function (e) {
        loaddataByID($("#seachfield").val());
    });
});

function loaddataByID(searchterm) {
    $.ajax({
        type: "GET",
        url: "../serviceHandler.php",
        cache: false,
        data: {method: "queryAppointmentById", param: searchterm},
        dataType: "json",
        success: function (response) {
            var ids = "";
            for (var i = 0; i < response.length; i++) {
                ids += response[i][0].id + " ";
            }
            $("#noOfentries").val(response.length);
            $("#ids").val(ids);
            $("#searchResult").show(1000).delay(1000).hide(1000);
        }
    });
}