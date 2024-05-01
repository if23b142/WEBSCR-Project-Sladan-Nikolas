<?php
class Appointment {
    public $aid;
    public $title;
    public $location;
    public $date;
    public $expiration_date;
    public $vote1;
    public $vote2;
    public $vote3;
    public $status;

    function __construct($aid, $title, $location, $date, $expiration_date, $vote1, $vote2, $vote3, $status) {
        $this->aid = $aid;
        $this->title = $title;
        $this->location = $location;
        $this->date = $date;
        $this->expiration_date = $expiration_date;
        $this->$vote1 = $vote1;
        $this->$vote2 = $vote2;
        $this->$vote3 = $vote3;
        $this->status = $status;
      }
}
