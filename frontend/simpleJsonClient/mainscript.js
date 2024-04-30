
//DOCUMENT-START

$(document).ready(function () {
    $("#searchResult").hide();
    $("#btn_Search").click(function (e) {
        loaddata($("#seachfield").val());
    });

    //Delegierung des Klick-Events für den Abbruch-Button
    //FUNKTIONIERT NUR SO
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
    
    //Event-Delegation für das Klicken auf Elemente mit der Klasse "list-group-item"
    $(".list-group").on("click", ".list-group-item", function(e) {

        //Zeige das <small>-Element innerhalb des angeklickten list-group-items an
        //VIELLEICHT COOL DAS ANGEZEIGT WIRD--WENN ER ABGESTIMMT HAT
        //$(this).find("small").show();

        //$(".list-group .list-group-item small").show();

        //Formular in das overlay einfügen und anzeigen
        //$(".white-box").append($(this).find("form").show());
        $("#overlay_content").html($(this).find("form").clone().show());


        //$(this).find("form").show();

        $("#overlay").show();


        //Prevent event propagation to avoid immediate closing of the overlay
        e.stopPropagation();
    });

    //Close the overlay when clicking outside the white box
    $(document).on("click", function(e) {
        //console.log("hallo");
        if (!$(e.target).closest('.white-box').length) {
            $('#overlay_content').empty();
            $("#overlay").hide();
        }
    });
});

//FUNKTIONEN
function cancel_Button(){
    //Event-Handler für den Abbruch-Button zuweisen
    $("#cancel_button").click(function() {
        //Overlay-Inhalt leeren und Overlay ausblenden
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
        html += "<a href='#' class='list-group-item list-group-item-action'>";
        html += "<div class='d-flex w-100 justify-content-between'>";
        html += "<h5 class='mb-1'>" + appointment.name + "</h5>";
        html += "</div>";
        html += "<p class='mb-1'>von <strong>" + appointment.participant + "</strong></p>";
        html += "</a>";
    });
    $(".list-group").html(html);
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
