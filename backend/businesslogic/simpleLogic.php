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
                if(isset($param['title'], $param['location'], $param['date'], $param['expiration_date'])) {
                    $res = $this->dh->insertAppointment(
                        $param['title'],
                        $param['location'], 
                        $param['date'], 
                        $param['expiration_date'], 
                        null, 
                        null, 
                        null, 
                        'Y'
                    );
                } 
                break;
            case "votes_for_appointment":
                $res = $this->dh->votes_for_appointment();
                break;
            default:
                $res = null;
                break;
        }
        return $res;
    }
}
