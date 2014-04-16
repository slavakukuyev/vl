<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CI_Movie_obj {

    public $id;
    public $name;
    public $about;
    public $year;
    public $imgUrl;
    public $vidUrl;
    public $added;
    public $categories;
    public $price;
    public $copies;
    public $instock;
    public $actors;
    public $comments;

    function __construct($params) {
        $this->id = $params['id'];
        $this->name = $params['name'];
        $this->about = $params['about'];
        $this->year = $params['year'];
        $this->imgUrl = $params['imgUrl'];
        $this->vidUrl = $params['vidUrl'];
        $this->added = $params['added'];
        $this->categories = $params['categories'];
        $this->price = $params['price'];
        $this->copies = $params['copies'];
        $this->instock = ((int) $this->copies > 0) ? 1 : 0;
        $this->actors = $params['actors'];
        $this->comments = $params['comments'];
    }

    
    public function set_Movie(){
        
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
