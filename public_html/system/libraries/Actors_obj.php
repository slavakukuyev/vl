<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CI_Actors_obj {

    private $list;
    private $CI;

    public function __construct() {
         $this->CI = & get_instance();
         $this->CI->load->model('actors');
         $this->CI->load->model('movies');
    }

    function set_list($list) {
        $this->list = $list;
    }

    function get_list() {
        return $this->list;
    }

    function get_All() {       
        $list = $this->CI->actors->get_all_actors();
        $this->set_list($list);
        return $this->get_list();
    }

    function get_actors_of_the_movie($id) {
        $list = $this->CI->actors->get_actors_by_movieid($id);
        $this->set_list($list);
        return $this->get_list();
    }
    
    function is_actor_of_movie($params){
               return $this->CI->movies->is_actor_of_movie($params);
    }

}

?>