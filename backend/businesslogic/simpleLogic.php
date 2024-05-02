<?php
include("db/dataHandler.php");

class SimpleLogic
{
    private $dh;
    function __construct()
    {
        $this->dh = new DataHandler();
    }
    
//handles request(for output)
    function handleRequest($method, $param)
    {
        $res = $this->dh->queryAppointments();
        return $res;
    }

    //handles request2(for insertion)
    function handleRequest2($method, $title, $location, $date, $expiration_date)
    {
        $res = $this->dh->insertAppointment($title, $location, $date, $expiration_date);
        return $res;
    }
}
