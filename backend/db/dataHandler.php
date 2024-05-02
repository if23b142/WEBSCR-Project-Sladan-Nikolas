<?php
require_once('db.php');
include("models/appointment.php");
class DataHandler
{
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

    public static function insertAppointment($title, $location, $date, $expiration_date) {
        global $conn;
        $sql = "INSERT INTO Appointments (title, location, date, expiration_date, vote1, vote2, vote3, status) VALUES ('$title', '$location', '$date', '$expiration_date', 0, 0, 0, 'Y')";
        return $conn->query($sql);
    }

    public static function votes_for_appointment($username) {
        $sql = "INSERT INTO Appointments (aid, title, location, date, expiration_date) VALUES ()";
    }
}