<?php
class Appointment {
    public $aid;
    public $title;
    public $location;
    public $expire_date;
    public $status;

    function __construct($id, $location, $name, $expire_date, $status) {
        $this->id = $id;
        $this->location = $location;
        $this->name = $name;
        $this->expire_date = $expire_date;
        $this->status = $status;
      }
}
