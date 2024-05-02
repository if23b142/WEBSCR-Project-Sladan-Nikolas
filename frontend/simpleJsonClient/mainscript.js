$(document).ready(function () {
    $("#searchResult").hide();
    loaddata();
    $(document).on("click", "#cancel_button", function() {
        $('#overlay_content').empty();
        $("#overlay").hide();
        console.log("Cancel Button gedrückt");
    });

    $(".new_appointment").click(function() {
        new_appointment();
    });

    $("#appointment_create").hide();
    $(".list-group .list-group-item .content_from_list").hide();
    $(".voting_button").click(function() {
        show_form();
    });

    $(".statistic_button").hide();
    $(".statistic_button").click(function() {
        show_statistic();
    });
    
    $(".list-group").on("click", ".list-group-item", function(e) {
        $("#overlay_content").html($(this).find(".content_from_list").clone().show());
        $("#overlay_content .form_from_list").hide();
        $('.white-box h4').text($(this).find('h5:first').text());
        $("#overlay").show();
        e.stopPropagation();
    });

    $(document).on("click", function(e) {
        if (!$(e.target).closest('.white-box').length) {
            $('#overlay_content').empty();
            $("#overlay").hide();
            show_statistic();
        }
    });

    $('.form_from_appointment_create').submit(function(event) {
        create_new_appointment();
    });

    $('.form_from_list').submit(function(event) {
        event.preventDefault();
        
        vote_in_appointment();
    });
});

function cancel_Button(){
    $("#cancel_button").click(function() {
        $('#overlay_content').empty();
        $("#overlay").hide();
        show_statistic();
    });
}

function show_form(){
        $(".statistic_button").show(200);
        $(".voting_button").hide(200);
        $("#overlay_content .form_from_list").show(200);
        $("#overlay_content .statistic_from_list").hide(200);
}

function show_statistic(){
        $(".statistic_button").hide(200);
        $(".voting_button").show(200);
        $("#overlay_content .form_from_list").hide(200);
        $("#overlay_content .statistic_from_list").show(200);
}

function new_appointment() {
    $("#appointment_create").toggle(300);
}

//FUNKTIONEN
function loaddata() {
    $.ajax({
        type: "GET",
        url: "../backend/serviceHandler.php",
        cache: false,
        data: {method: "queryAppointments", param: 0},
        dataType: "json",
        success: function (response) {
            
            $("#noOfentries").val(response.length);
            $("#searchResult").show(1000).delay(1000).hide(1000);

            response.forEach(element => {
                var vote1 = element.vote1 ? element.vote1 + 'Votes' : ''
                var vote2 = element.vote2 ? element.vote2 + 'Votes' : ''
                var vote3 = element.vote3 ? element.vote3 + 'Votes' : ''
                $('.thisIsCool').append(
                '<a class="list-group-item list-group-item-action" aria-current="true">' +
                    '<div class="d-flex w-100 justify-content-between">' +
                        '<h5 class="mb-1">' + element.title +'</h5>' +
                        '<small>am <strong>' + element.date + '</strong></small>' +
                        '<small>voting bis <strong>' + element.expiration_date + '</strong></small>' +
                    '</div>' +
                    '<div class="content_from_list">' +

                        '<div class="statistic_from_list">' +
                            '<ul class="list-group list-group-horizontal">' +
                                '<li class="list-group-item list-group-item-dark">Ort</li>' +
                                '<li class="list-group-item flex-grow-1">'+ element.location +'</li>' +
                            '</ul>' +
                            
                            '<br>' +
                            '<h5>Abstimmung:</h5>' +
                            '<ol class="list-group list-group-numbered">' +
                                '<li class="list-group-item d-flex justify-content-between align-items-start">' +
                                    '<div class="fw-bold ms-2 me-auto">9:00 - 12:00</div>' +
                                    '<span class="badge bg-primary rounded-pill">' + vote1 + '</span>' +
                                '</li>' +
                                '<li class="list-group-item d-flex justify-content-between align-items-start">' +
                                    '<div class="fw-bold ms-2 me-auto">12:30 - 15:00</div>' +
                                    '<span class="badge bg-primary rounded-pill">' + vote2 + '</span>' +
                                '</li>' +
                                '<li class="list-group-item d-flex justify-content-between align-items-start">' +
                                    '<div class="fw-bold ms-2 me-auto">15:00 - 18:00</div>' +
                                    '<span class="badge bg-primary rounded-pill">' + vote3 + '</span>' +
                                '</li>' +
                            '</ol>' +
                            '<br>' +
                            /*
                            '<h5>Kommentare:</h5>' +
                            '<ul class="list-group list-group-horizontal">' +
                                '<li class="list-group-item list-group-item-dark">Niki</li>' +
                                '<li class="list-group-item flex-grow-1">Ein tolles Meeting!</li>' + 
                            '</ul>' +
                            */
                        '</div>' +
                        '<form class="form_from_list">' +
                            '<div class="input-group mb-3">' +
                                '<span class="input-group-text" id="basic-addon1">Name</span>' +
                                '<input type="text" class="form-control" placeholder="zB.: Max Mustermann" aria-label="Username" aria-describedby="basic-addon1">' +
                            '</div>' +
                            '<h5>Termine</h5>' +
                            '<div class="form-check">' +
                                '<input type="checkbox" class="form-check-input" value="" id="exampleCheck1">' +
                                '<label class="form-check-label" for="exampleCheck1">12:00 - 12:30</label>' +
                            '</div>' +
                            '<div class="form-check">' +
                                '<input type="checkbox" class="form-check-input" value="" id="exampleCheck2">' +
                                '<label class="form-check-label" for="exampleCheck2">13:00 - 14:00</label>' +
                            '</div>' +
                            '<div class="form-check">' +
                                '<input type="checkbox" class="form-check-input" value="" id="exampleCheck3">' +
                                '<label class="form-check-label" for="exampleCheck3">15:00 - 16:00</label>' +
                            '</div>' +
                            '<div class="mb-3">' +
                                '<label for="exampleFormControlTextarea1" class="form-label"><h5>Kommentare</h5></label>' +
                                '<textarea class="form-control form-control-sm" id="exampleFormControlTextarea1" rows="3"></textarea>' +
                            '</div>' +
                            '<button type="submit" class="btn btn-primary">Submit</button>' +
                            '<button type="button" class="btn btn-outline-danger" id="cancel_button">Cancel</button>' +
                        '</form>' +
                    '</div>' +
                '</a>'
                );
            });
            $(".list-group .list-group-item .content_from_list").hide();
        } , error: function(){
            console.log("FEHLER1");
        }
    });
}

$('.appointment_form').submit(function(event) {
    // Prevent default form submission
    event.preventDefault();

    // Capture form data
    var appointmentName = $('#appointmentName').val();
    var appointmentLocation = $('#appointmentLocation').val();
    var appointmentDate = $('#appointmentDate').val();
    var appointmentExpirationDate = $('#appointmentExpirationDate').val();

    // Send data to server using AJAX
    $.ajax({
        type: "POST",
        url: "../backend/serviceHandler.php",
        data: {
            method2: "insertAppointment",
            title: appointmentName,
            location: appointmentLocation,
            date: appointmentDate,
            expiration_date: appointmentExpirationDate
        },
        dataType: "json",
        success: function(response) {
            // Handle success response from the server (if any)
            console.log("Appointment created successfully!");
            // You can perform further actions here, such as showing a success message or redirecting the user.
        },
        error: function(response) {
            // Handle errors (if any)
            console.log("Error creating appointment!");
        }
    });
});

function votes_for_appointment(){
    $.ajax({
        type: "GET",
        url: "../backend/serviceHandler.php",
        cache: false,
        data: {method: "votes_for_appointment", param: 0},
        dataType: "json",
        success: function (response) {
            alert("VOTE APPOINTMENT FUNKTIONIERT");
            insertAppointment($aid, $title, $location, $date, $expiration_date);
        } , error: function(){
            console.log("FEHLER IM VOTE APPOINTMENT");
        }
    });
}
