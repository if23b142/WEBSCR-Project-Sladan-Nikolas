<?php
require_once('db/db.php');
class user
{
    public $uid;
    public $username;
    public $comment;

    function __construct($uid, $username, $comment)
    {
        $this->uid = $uid;
        $this->username = $username;
        $this->comment = $comment;
    }

}