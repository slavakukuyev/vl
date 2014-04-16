<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Registration extends My_Controller {

    function __construct() {
        parent::__construct();
      $this->load_mod_lib();
    }

    private function load_mod_lib() {
        $this->load->library('users_obj');
    }

    private function registration_request(){
        $params=array(
            'password'=>$this->input->post('password'),
           'email'=>$this->input->post('email'),
            'firstname'=>$this->input->post('firstname'),
            'lastname'=>$this->input->post('lastname'),
            'birthdate'=>$this->input->post('birthdate')
        );
       return $this->users_obj->registration($params);
    }
    
    
    private function Login_request($email, $password){      
        $this->users_obj->set_single(array('Login'=>'1','email'=>$email,'password'=>$password));
        return $this->users_obj->get_single();
    }
    
    function index() {
        $data = null;
        if ($this->session->userdata('isLoggedIn')) {
            redirect('main', 'refresh');
        }      


        $this->form_validation->set_rules('firstname', 'First Name', 'required|trim|callback_valid_firstname');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required|trim|callback_valid_lastname');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email|callback_isemail_exist');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('passwordconfirm', 'Confirm Password', 'required|trim|callback_match_pass');
        $this->form_validation->set_rules('birthdate', 'Birth Date', 'required|trim');
        $this->form_validation->set_rules('captcha', 'Captcha', 'required|trim|callback_valid_captcha');


        if ($this->form_validation->run()) {            
            $data = null;
            if ($this->registration_request() === false) {
                $data['success'] = FALSE;
            } else {
                $data['success'] = TRUE;
            }
            $result = $this->Login_request($this->input->post('email'), $this->input->post('password'));
            #region set session
            $user = array(
                'isLoggedIn' => true,
                'id' => $result->id,
                'email' => $result->email,
                'firstname' => $result->firstname,
                'lastname' => $result->lastname,
                'isadmin' => $result->isadmin,
                'birthdate' => $result->birthdate,
                'sex' => $result->sex,
                'balance' => (int) $result->balance
            );
            $this->session->set_userdata($user);
            #endregion set_session
            $this->success($data);
        } else {            
        
        $data['captcha']= $this->create_my_captcha();

            if (isset($_POST['firstname'])) {
                $data['firstname'] = $_POST['firstname'];
            }
            if (isset($_POST['lastname'])) {
                $data['lastname'] = $_POST['lastname'];
            }
            if (isset($_POST['email'])) {
                $data['email'] = $_POST['email'];
            }

            if (isset($_POST['password'])) {
                $data['password'] = $_POST['password'];
            }
            if (isset($_POST['passwordconfirm'])) {
                $data['passwordconfirm'] = $_POST['passwordconfirm'];
            }

            if (isset($_POST['birthdate'])) {
                $data['birthdate'] = $_POST['birthdate'];
            }

            if (isset($_POST['sex'])) {
                $data['sex'] = $_POST['sex'];
            }
            $this->viewPage('registration', $data);
        }
    }

    function valid_captcha() {           
        if (strcmp( $this->session->userdata('captcha'), md5($this->input->post('captcha')))===0) {
               $this->session->unset_userdata('captcha');
            return true;
        } else {
            $this->form_validation->set_message('valid_captcha', 'Wrong text from image.');
            return false;
        }
    }

     function isemail_exist() {        
        if ($this->users_obj->isEmailExist($this->input->post('email'))===false)
            return true;
        else {
            $this->form_validation->set_message('isemail_exist', 'User with this email already registered.');
            return false;
        }
    }

     function match_pass() {
        if ($this->input->post('password') == $this->input->post('passwordconfirm'))
            return true;
        else {
            $this->form_validation->set_message('match_pass', "Password don't match.");
            return false;
        }
    }

     function valid_firstname() {
        if (ctype_alpha(str_replace(' ', '', $this->input->post('firstname'))) === true)
            return true;
        else {
            $this->form_validation->set_message('valid_firstname', "First name have wrong symbols");
            return false;
        }
    }

     function valid_lastname() {
        if (ctype_alpha(str_replace(' ', '', $this->input->post('lastname'))) === true)
            return true;
        else {
            $this->form_validation->set_message('valid_lastname', "Last name have wrong symbols");
            return false;
        }
    }

    function success($data) {
        $this->viewPage('registration_success', $data);
    }

}

?>
