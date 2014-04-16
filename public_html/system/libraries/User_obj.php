<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CI_User_obj {

    public $id;
    public $email;
    public $firstname;
    public $lastname;
    public $birthdate;
    public $sex;
    public $balance;
    public $isadmin;

    function __construct($params) {
        $this->id = $params['id'];
        $this->firstname = $params['firstname'];
        $this->lastname = $params['lastname'];
        $this->email = $params['email'];
        $this->sex = $params['sex'];
        $this->balance = $params['balance'];
        $this->isadmin = $params['isadmin'];
        $this->birthdate = $params['birthdate'];
    }

    public function set_Field($name, $value) {
        try {
            if (isset($this->$name))
                $this->$name = $value;
            else
                throw new Exception('The property with this name not exist');
        } catch (Exception $e) {
            print($e->getMessage());
        }
    }

    public function get_Field($name) {
        try {
            if (isset($this->$name))
                return $this->$name;
            else
                throw new Exception('The property with this name not exist');
        } catch (Exception $e) {
            print($e->getMessage());
        }
    }

}

?>
