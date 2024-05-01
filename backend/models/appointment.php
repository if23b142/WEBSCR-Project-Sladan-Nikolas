<?php
class Appointment {
    public $aid;
    public $title;
    public $location;
    public $expire_date;
    public $status;

    function __construct($id, $ln, $nm, $ed, $st) {
        $this->id = $id;
        $this->location = $ln;
        $this->name = $nm;
        $this->expire_date = $ed;
        $this->status = $st;
      }
}
