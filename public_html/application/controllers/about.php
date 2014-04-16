<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
class About extends My_Controller{
    function __construct() {
        parent::__construct();
    }
 
    function index(){
        $this->viewPage('about',null);
    }
}
?>
