<?php
include("businesslogic/simpleLogic.php");

$param = "";
$method = "";
isset($_GET["method"]) ? $method = $_GET["method"] : false;
isset($_GET["param"]) ? $param = $_GET["param"] : false;

isset($_POST["method2"]) ? $method = $_POST["method2"] : false;

//instantiates object of type SimpleLigic
$logic = new SimpleLogic();

//handles GET-method "method" to queryAppointments form server
if( isset($_GET["method"]) && $_GET["method"] == "queryAppointments" ) {
    $result = $logic->handleRequest($method, $param );
    if ($result == null) {
        response("GET", 400, null);
    } else {
        response("GET", 200, $result);
    }
}

//handles POST-method "method2" to insert new appointments into database
if (isset($_POST["method2"]) && $_POST["method2"] == "insertAppointment") {
    $result = $logic->handleRequest2( $_POST["method2"], $_POST["title"], $_POST["location"], $_POST["date"], $_POST["expiration_date"]);
    if ($result == null) {
        response("POST", 400, null);
    } else {
        response("POST", 200, $result);
    }
}

//sends HTTP responses in JSON format based on the provided parameters
function response($method, $httpStatus, $data)
{
    header('Content-Type: application/json');
    switch ($method) {
        case "GET":
            http_response_code($httpStatus);
            echo (json_encode($data));
            break;
        case "POST":
            http_response_code($httpStatus);
            echo (json_encode($data));
            break;
        default:
            http_response_code(405);
            echo ("Method not supported yet!");
    }
}