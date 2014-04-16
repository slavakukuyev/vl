<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Actor extends My_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        if (isset($_POST['actorid']) && $_POST['actorid']!=''){    
            $this->load->model('actors');
            $data['actor']=$this->actors->get_actor($_POST['actorid']);            
            $moviesOfActor=$this->actors->get_movies_of_actor($data['actor']->id);
            $data['moviesOfActor']=$moviesOfActor;
            $this->viewPage('actor', $data);
        }
        else{
            redirect('main','refresh');
        }
    }

}

?>
