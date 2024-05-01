<?php
include("../models/appointment.php");
class DataHandler
{
    public function queryAppointments()
    {
        $res =  $this->getDemoData();
        return $res;
    }

    public function queryAppointmentById($id)
    {
        $result = array();
        foreach ($this->queryAppointments() as $val) {
            if ($val[0]->id == $id) {
                array_push($result, $val);
            }
        }
        return $result;
    }

    private static function getDemoData()
    {
        $demodata = [
            [new Appointment(1, "Wienurlaub", "Vienna", "01.01.2001", "expired")],
            [new Appointment(2, "Work trip NYC", "New York", "01.01.2002", "active")],
            [new Appointment(3, "London sightseeing", "London", "01.01.2003", "active")],
            [new Appointment(4, "wasauchimmermaninmoscowmacht", "Moscow", "01.01.2004", "expired")],
        ];
        return $demodata;
    }
}
