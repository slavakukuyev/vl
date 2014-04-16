<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends My_Controller {

    function __construct() {
        parent::__construct();
          $this->load->library('users_obj');
           $this->load->library('movies_obj');
    }

    function index() {
        if (isset($_GET['popular'])) {
            $data['rows'] = $this->get_popular();
        } elseif (isset($_GET['new'])) {

            $data['rows'] = $this->newAddedMovies(9);
            $data['new'] = 'new';
        } elseif (isset($_GET['recommended'])) {
            if ($this->session->userdata('isLoggedIn') != false) {
                $data['rows'] = $this->get_recommended($this->session->userdata('id'));
                if ($this->session->userdata('maxs')) {
                    $data['recomendedCategory'] = $this->session->userdata('maxs');
                    $this->session->unset_userdata('maxs');
                } elseif ($this->session->userdata('mins')) {
                    $data['recomendedCategory'] = $this->session->userdata('mins');
                    $this->session->unset_userdata('mins');
                } else {
                    
                }
            } else {
                $data['rows'] = $this->get_popular();
            }
        } elseif (isset($_GET['category'])) {
            $category = $_GET['category'];
            $data['rows'] = $this->getMoviesByCategory($category);
            $data["category"] = $category;
        } else {


            $data['rows'] = $this->get_popular();
        }
//        
//        $this->load->library('pagination');
//        $config['base_url']=  base_url().'main/index';
//        $config['total_rows']=sizeof($data['rows']);
//        $config['per_page']=6;
//        $config['num_links']=10;
//        $this->pagination->initialize($config);


        $this->viewPage('main', $data);
    }

    private function newAddedMovies($count) {        
        $this->movies_obj->set_list(array('type' => 'New', 'count' => $count));
        return $this->movies_obj->get_list();
    }

    private function get_popular() {        
        $this->movies_obj->set_list(array('type' => 'Popular'));
        return $this->movies_obj->get_list();
    }

    private function get_recommended($id) {        
        $this->movies_obj->set_list(array('type' => 'Recommended', 'id' => $id));
        return $this->movies_obj->get_list();
    }

//    function allMovies() {
    //       return $this->movies->getAll();
    // }

    private function getMoviesByCategory($category) {        
        $this->movies_obj->set_list(array('type' => 'Category', 'category' => $category));
        return $this->movies_obj->get_list();
    }

    function login() {
        if ($this->session->userdata('isLoggedIn')) {
            redirect('main', 'refresh');
        }
        $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email|callback_isemail_exist');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|callback_check_pass');
        if ($this->form_validation->run()) {         
            $email = $_POST['email'];
            $password = $_POST['password'];
            if ($this->Login_request($email, $password) === false) {
                $this->load->view('pages/login');
            } else {
                $result = $this->Login_request($email, $password);
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
                    'balance' => $result->balance
                );
                $this->session->set_userdata($user);
                #endregion set_session
                //go to main page with all movies
                redirect('main', 'refresh');
            }
        }
        //for first passsing from main page to login
        else {
            $data = null;
            if (isset($_POST['email'])) {
                $data['email'] = $_POST['email'];
            }
            if (isset($_POST['password'])) {
                $data['password'] = $_POST['password'];
            }
            $this->load->view('pages/login', $data);
        }
    }

    private function Login_request($email, $password){      
        $this->users_obj->set_single(array('Login'=>'1','email'=>$email,'password'=>$password));
        return $this->users_obj->get_single();
    }
    
    function isemail_exist() {       
        if ($this->users_obj->isEmailExist($this->input->post('email')))
            return true;
        else {
            $this->form_validation->set_message('isemail_exist', 'User with this email not registered yet.');
            return false;
        }
    }

    function check_pass() {
        if ($this->users_obj->check_pass(array('email'=>$this->input->post('email'), 'password'=>$this->input->post('password'))) === false) {
            $this->form_validation->set_message('log_in', 'Incorrect password.');
        }
        else
            return true;
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('main', 'refresh');
    }

}

?>
