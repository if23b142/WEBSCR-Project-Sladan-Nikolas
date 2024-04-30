<?php
class Appointment {
    public $aid;
    public $title;
    public $location;
    public $date;
    public $expiration_date;
    function __construct($aid, $title, $location, $date, $expiration_date) {
        $this->aid = $aid;
        $this->title= $title;
        $this->location = $location;
        $this->date = $date;
        $this->expiration_date = $expiration_date;
      }
}
