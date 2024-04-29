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

    public function queryAppointmentByName($name)
    {
        $result = array();
        foreach ($this->queryAppointments() as $val) {
            if ($val[0]->name == $name) {
                array_push($result, $val);
            }
        }
        return $result;
    }

    public function queryAppointmentByLocation($location)
    {
        $result = array();
        foreach ($this->queryAppointments() as $val) {
            if ($val[0]->location == $location) {
                array_push($result, $val);
            }
        }
        return $result;
    }

    private static function getDemoData()
    {
        $demodata = [
            [new Appointment(1, "Wienurlaub", "Vienna")],
            [new Appointment(2, "Work trip NYC", "New York")],
            [new Appointment(3, "London sightseeing", "London")],
            [new Appointment(4, "wasauchimmermaninmoscowmacht", "Moscow")],
        ];
        return $demodata;
    }
}
