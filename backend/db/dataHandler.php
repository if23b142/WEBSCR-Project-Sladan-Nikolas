<?php
require_once('db.php');
include("models/appointment.php");
class DataHandler
{

    public static function queryAppointmentByLocation($location) {
        global $conn;
        $sql = "SELECT * FROM Appointments WHERE location = '$location'";
        $result = $conn->query($sql);

        $appointments = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $appointment = new Appointment($row['aid'], $row['title'], $row['location'], $row['date'], $row['expiration_date'], $row['vote1'], $row['vote2'], $row['vote3'], $row['status']);
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
                $appointment = new Appointment($row['aid'], $row['title'], $row['location'], $row['date'], $row['expiration_date'], $row['vote1'], $row['vote2'], $row['vote3'], $row['status']);
                $appointments[] = $appointment;
            }
        }
        return json_encode($appointments);
    }

    public static function queryAppointmentById($aid) {
        global $conn;
        $sql = "SELECT * FROM Appointments WHERE aid = '$aid'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $appointment = new Appointment($row['aid'], $row['title'], $row['location'], $row['date'], $row['expiration_date'], $row['vote1'], $row['vote2'], $row['vote3'], $row['status']);
            return json_encode($appointment);
        } else {
            return null;
        }
    }

    public static function queryAppointments() {
        global $conn;
        $sql = "SELECT * FROM Appointments";
        $result = $conn->query($sql);
    
        $appointments = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $appointments[] = array(
                    'aid' => $row['aid'],
                    'title' => $row['title'],
                    'location' => $row['location'],
                    'date' => $row['date'],
                    'expiration_date' => $row['expiration_date'],
                    'vote1' => $row['vote1'],
                    'vote2' => $row['vote2'],
                    'vote3' => $row['vote3'],
                    'status' => $row['status']
                );
            }
        }
        return $appointments;
    }

    /*
    public static function queryAppointments() {
        global $conn;
        $sql = "SELECT * FROM Appointments";
        $result = $conn->query($sql);

        $appointments = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $appointment = new Appointment($row['aid'], $row['title'], $row['location'], $row['date'], $row['expiration_date'], $row['vote1'], $row['vote2'], $row['vote3'], $row['status']);
                $appointments[] = $appointment;
            }
        }
        return json_encode($appointments);
    }
    */

    public static function insertAppointment($title, $location, $date, $expiration_date, $vote1, $vote2, $vote3, $status) {
        global $conn;
        $sql = "INSERT INTO Appointments (aid, title, location, date, expiration_date) VALUES ('$title', '$location', '$date', '$expiration_date', '$vote1', '$vote2', '$vote3', '$status')";
        return $conn->query($sql);
    }

    public static function votes_for_appointment($username) {
        $sql = "INSERT INTO Appointments (aid, title, location, date, expiration_date) VALUES ()";
    }
}
