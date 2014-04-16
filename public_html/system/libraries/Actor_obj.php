<?php

class CI_Actor_obj {

    private $id;
    private $fullname;
    private $imgUrl;
    private $yearbirth;

    function __construct($id, $fullname, $imgUrl, $yearbirth) {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->imgUrl = $imgUrl;
        $this->yearbirth = $yearbirth;
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
