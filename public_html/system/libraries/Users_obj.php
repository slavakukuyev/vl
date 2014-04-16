<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CI_Users_obj {

    private $list;
    private $single;
    private $CI;

    function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->model('users');
    }

    public function set_list($list) {
        $this->list = $list;
    }

    public function get_list() {
        return $this->list;
    }

    public function set_single($params) {
        if (isset($params['Login'])) {
            $result = $this->CI->users->Login($params['email'], $params['password']);
            if ($result === false) {
                $this->single = false;
                return;
            }
        }

        $user = array(
             'id' => $result->id,
                    'email' => $result->email,
                    'firstname' => $result->firstname,
                    'lastname' => $result->lastname,
                    'isadmin' => $result->isadmin,
                    'birthdate' => $result->birthdate,
                    'sex' => $result->sex,                    
                    'balance' => $result->balance
        );


        $this->CI->load->library('user_obj', $user);

        $this->single = $this->CI->user_obj;
    }

    public function get_single() {
        return $this->single;
    }

    public function get_user_balance($id) {
        return $this->CI->users->get_balance($id);
    }
    
    public function isEmailExist($email){
        return $this->CI->users->isEmailExist($email);
    }
     
    
    public function update_user($params){
          return $this->CI->users->update_user($params);
    }
    
    
    public function  isEmailExistById($params){
         return $this->CI->users->isEmailExistById($params);
    }
    
    public function isEmailExistByOtherId($params){
        return $this->CI->users->isEmailExistByOtherId($params);
    }
    
    function update_password($params){
        return $this->CI->users->update_password($params);
    }
    
    function check_pass($params){
        return $this->CI->users->check_pass($params);
    }
    
    
    function get_balance($id){
        return $this->CI->users->get_balance(array('id'=>$id));
    }
    
    function deposit($params){
        return $this->CI->users->deposit($params);
    }
    
    function registration($params){
         return $this->CI->users->registration($params);
    }
    

}

?>