$(document).ready(function () {
    $("#searchResult").hide();
    loaddata();
    $(document).on("click", "#cancel_button", function() {
        $('#overlay_content').empty();
        $("#overlay").hide();
        console.log("Cancel Button gedrückt");
    });

    $("#new_appointment").click(function() {
        new_appointment();
    });
    $("#appointment_create").hide();
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
function loaddata() {
    $.ajax({
        type: "GET",
        url: "../backend/serviceHandler.php",
        cache: false,
        data: {method: "queryAppointmentById"},
        dataType: "json",
        success: function (response) {
            console.log("Hallo");
            $('#list-group').empty();
            response.forEach(function(appointment){
                $('#list-group').append(
                    '<a class="list-group-item list-group-action" aria-current="true">' +
                        '<div class="d-flex w-100 justify-content-between">' +
                            '<h5 class="mb-1">' + appointment.title + '</h5>' +
                            '<small>bis <strong>' + appointment.expire_date + '</strong></small>' +
                        '</div>' +
                        '<div class="content_from_list">' +
                            '<ul class="list-group list-group-horizontal">' +
                                '<li class="list-group-item list-group-item-dark">Ort</li>' +
                                '<li class="list-group-item flex-grow-1">' + appointment.location + '</li>' +
                            '</ul>' +
                        '<div>' +
                    '</a>'
                );
            });
        }
    });
}

function cancel_Button(){
    $("#cancel_button").click(function() {
        $('#overlay_content').empty();
        $("#overlay").hide();
    });
}

function new_appointment() {
    $("#appointment_create").toggle(300);
}