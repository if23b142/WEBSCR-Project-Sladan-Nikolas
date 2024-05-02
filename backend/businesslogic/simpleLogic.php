<?php
include("db/dataHandler.php");

class SimpleLogic
{
    private $dh;
    function __construct()
    {
        $this->dh = new DataHandler();
    }

    function handleRequest($method, $param)
    {
        switch ($method) {
            case "queryAppointments":
                $res = $this->dh->queryAppointments();
                break;
            case "create_new_appointment":
                $res = $this->dh->create_new_appointment($title, $location, $date, $expiration_date, 'Y');
                break;
            case "vote_in_appointment":
                $res = $this->dh->votes_for_appointment();
                break;
            default:
                $res = null;
                break;
        }
        return $res;
    }
}
