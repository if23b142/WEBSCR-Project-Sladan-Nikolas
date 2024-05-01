<?php
require_once('db.php'); // Include database connection
include("../models/appointment.php");
class DataHandler
{
    /*
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

    */

    public static function queryAppointmentByLocation($location) {
        global $conn;
        $sql = "SELECT * FROM Appointments WHERE location = '$location'";
        $result = $conn->query($sql);

        $appointments = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $appointment = new Appointment($row['aid'], $row['title'], $row['location'], $row['date'], $row['expiration_date']);
                $appointments[] = $appointment;
            }
        }
        return json_encode($appointments);
    }

    public static function queryAppointmentByName($name) {
        global $conn;
        $sql = "SELECT * FROM Appointments WHERE title = '$name'";
        $result = $conn->query($sql);

        $appointments = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $appointment = new Appointment($row['aid'], $row['title'], $row['location'], $row['date'], $row['expiration_date']);
                $appointments[] = $appointment;
            }
        }
        return json_encode($appointments);
    }

    public static function queryAppointments() {
        global $conn;
        $sql = "SELECT * FROM Appointments";
        $result = $conn->query($sql);

        $appointments = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $appointment = new Appointment($row['aid'], $row['title'], $row['location'], $row['date'], $row['expiration_date']);
                $appointments[] = $appointment;
            }
        }
        return json_encode($appointments);
    }

    public static function queryAppointmentById($id) {
        global $conn;
        $sql = "SELECT * FROM Appointments WHERE aid = '$id'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $appointment = new Appointment($row['aid'], $row['title'], $row['location'], $row['date'], $row['expiration_date']);
            return json_encode($appointment);
        } else {
            return null; // Appointment not found
        }
    }

    public static function insertUser($uid, $username, $comment) {
        global $conn;
        $sql = "INSERT INTO Users (uid, username, comment) VALUES ('$uid', '$username', '$comment')";
        return $conn->query($sql);
    }

    public static function insertAppointment($aid, $title, $location, $date, $expiration_date) {
        global $conn;
        $sql = "INSERT INTO Appointments (aid, title, location, date, expiration_date) VALUES ('$aid', '$title', '$location', '$date', '$expiration_date')";
        return $conn->query($sql);
    }
}
