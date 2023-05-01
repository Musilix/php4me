<?php

class User
{
    public $auth;

    public function __construct($user_name, $hash_pass)
    {
        if ($user_name == "kareem" && $hash_pass == "1234") {
            $this->auth = true;
        } else {
            $this->auth = false;
        }
    }

    public function get_auth()
    {
        return $this->auth;
    }
}
