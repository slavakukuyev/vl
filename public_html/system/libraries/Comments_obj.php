<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CI_Comments_obj {

    private $list;

    public function __construct() {
        
    }

    function set_list($id) {
        $CI = & get_instance();
        $CI->load->model('comments');
        $this->list = $CI->comments->get_comments($id);
    }

    function get_list() {
        return $this->list;
    }

    function addCommentToDB($params) {
         $CI = & get_instance();
         $CI->load->model('comments');          
        return $CI->comments->add_comment($params);
    }

}

?>