$(document).ready(function () {
    $("#searchResult").hide();
    $("#btn_Search").click(function (e) {
        loaddata($("#seachfield").val());
    });

    $(document).on("click", "#cancel_button", function() {
        $('#overlay_content').empty();
        $("#overlay").hide();
        console.log("Cancel Button gedrückt");
    });

    $("#new_appointment").click(function() {
        new_appointment();
    });
    $("#appointment_create").hide();
    
    $(".list-group .list-group-item form").hide();
    
    $(".list-group").on("click", ".list-group-item", function(e) {
        $("#overlay_content").html($(this).find("form").clone().show());

        $("#overlay").show();

        e.stopPropagation();
    });

    $(document).on("click", function(e) {
        if (!$(e.target).closest('.white-box').length) {
            $('#overlay_content').empty();
            $("#overlay").hide();
        }
    });
});

//FUNKTIONEN
function cancel_Button(){
    $("#cancel_button").click(function() {
        console.log("DIES IST EIN TEST 2")
        $('#overlay_content').empty();
        $("#overlay").hide();
    });
}
function new_appointment() {
    $("#appointment_create").toggle(300);
}
function displayAppointments(appointments) {
    var html = "";
    appointments.forEach(function (appointment) {
        html += "<a href='#' class='list-group-item list-group-item-action'>" + 
                "<div class='d-flex w-100 justify-content-between'>" +
                "<h5 class='mb-1'>" + appointment.name + "</h5>" +
                "</div>" +
                "<p class='mb-1'>von <strong>" + appointment.participant + "</strong></p>" +
                "</a>";
    });
    $("#list-group").html(html);
}

//AJAX-CALLS
$(document).ready(function() {
    function loaddata(searchterm) {
        $.ajax({
            type: "GET",
            url: "../backend/serviceHandler.php",
            cache: false,
            //METHODE ÄNDERN
            data: {method: "queryAppointmentById", param: searchterm},
            dataType: "json",
            success: function (response) {
                displayAppointments(response);
            }
        });
    }
});
