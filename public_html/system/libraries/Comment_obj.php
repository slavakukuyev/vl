<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CI_Comment_obj {

    public $id;
    public $movieid;
    public $text;
    public $added;
    public $userid;
    public $userFirstName;
    public $userLastName;
    
            

    function __construct($params) {
        $this->id = $params['id'];
        $this->movieid = $params['movieid'];
        $this->text = $params['text'];
        $this->added = $params['added'];
        
        $this->userid = $params['userid'];
        $this->userFirstName = $params['userFirstName'];
        $this->userLastName = $params['userLastName'];
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
