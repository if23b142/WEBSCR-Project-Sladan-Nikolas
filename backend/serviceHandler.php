<?php
include("businesslogic/simpleLogic.php");

$param = "";
$method = "";

isset($_GET["method"]) ? $method = $_GET["method"] : false;
isset($_GET["param"]) ? $param = $_GET["param"] : false;

$logic = new SimpleLogic();
$result = $logic->handleRequest($method, $param);
if ($result == null) {
    response("GET", 400, null);
} else {
    response("GET", 200, $result);
}

function response($method, $httpStatus, $data)
{
    header('Content-Type: application/json');
    switch ($method) {
        case "GET":
            http_response_code($httpStatus);
            echo (json_encode($data));
            break;
        default:
            http_response_code(405);
            echo ("Method not supported yet!");
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Read the raw POST data
    $postData = file_get_contents("php://input");
    // Decode the JSON data
    $postDataArray = json_decode($postData, true);

    // Check if method and param exist in the JSON data
    if (isset($postDataArray["method"])) {
        $method = $postDataArray["method"];
    }
    if (isset($postDataArray["param"])) {
        $param = $postDataArray["param"];
    }
}
