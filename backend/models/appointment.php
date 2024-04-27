<?php
class Appointment {
    public $id;
    public $name;
    public $location;

    function __construct($id, $ln, $nm) {
        $this->id = $id;
        $this->location = $ln;
        $this->name = $nm;
      }
}
