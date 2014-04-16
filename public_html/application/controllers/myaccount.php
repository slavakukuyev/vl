<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Myaccount extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load_mod_lib();
    }

    private function load_mod_lib() {
        $this->load->library('users_obj');
    }

    function index() {
        if ($this->session->userdata('isLoggedIn') === true) {
            $this->personal_details();
        }
        else
            redirect('main/login', 'refresh');
    }

    function personal_details() {
        $this->viewPage('personal_details', null);
    }

    private function update_user($id) {
        $user = array('email' => $this->input->post('email'),
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'sex' => $this->input->post('sex'),
            'birthdate' => $this->input->post('birthdate'),
            'id' => $id);
        return $this->users_obj->update_user($user);
    }

    function change_details() {
        $data = null;
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|callback_check_email');
        $this->form_validation->set_rules('birthdate', 'Birth Date', 'required|callback_valid_birthdate');
        $this->form_validation->set_rules('firstname', 'First Name', 'required|callback_valid_firstname');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required|callback_valid_lastname');
        if ($this->form_validation->run()) {
            if ($this->is_values_changed()) {
                if ($this->update_user($this->session->userdata('id')) === true) {
                    $data["message"] = "The Personal details successfully changed";
                }
                else
                    $data["message"] = "The Personal details Not saved. Please contact us";
            }
            else
                $data["message"] = "Nothing of personal details changed";

            $this->viewPage('personal_details', $data);
        } else {
            if ($this->input->post('form1') == 'form1') {
                $data['form1'] = validation_errors();
            }
            $this->viewPage('personal_details', $data);
        }
    }

    function is_values_changed() {
        //start changes
        $changed = false;

        if ($this->session->userdata('firstname') != $this->input->post('firstname')) {
            $this->session->set_userdata('firstname', $this->input->post('firstname'));
            $changed = true;
        }
        if ($this->session->userdata('lastname') != $this->input->post('lastname')) {
            $this->session->set_userdata('lastname', $this->input->post('lastname'));
            $changed = true;
        }
        if ($this->session->userdata('email') != $this->input->post('email')) {
            $this->session->set_userdata('email', $this->input->post('email'));
            $changed = true;
        }
        if ($this->session->userdata('sex') != $this->input->post('sex')) {
            $this->session->set_userdata('sex', $this->input->post('sex'));
            $changed = true;
        }
        if ($this->session->userdata('birthdate') != $this->input->post('birthdate')) {
            $this->session->set_userdata('birthdate', $this->input->post('birthdate'));
            $changed = true;
        }
        return $changed;
    }

    function valid_birthdate() {
        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $this->input->post('birthdate'))) {
            $age = $this->get_age($this->input->post('birthdate'));
            if ((int) (substr($this->input->post('birthdate'), 0, 4)) <= 1902 || $age < 18) {
                $this->form_validation->set_message('valid_birthdate', 'Please enter correct date of your birth');
                return false;
            } else {
                return true;
            }
        } else {
            $this->form_validation->set_message('valid_birthdate', 'The date format is wrong (need to be yyyy-mm-dd)');
            return false;
        }
    }

    function get_age($birthdate) {
        //date in yyyy-mm-dd format; or it can be in other formats as well        
        return intval(substr(date('Ymd') - date('Ymd', strtotime($birthdate)), 0, -4));
    }

    function check_email() {

        $id = $this->session->userdata('id');
        if ($this->users_obj->isEmailExistById(array('id'=>$id,'email'=>$this->input->post('email'))) === true)
            return true;
        else if ($this->users_obj->isEmailExistByOtherId(array('id'=>$id,'email'=>$this->input->post('email'))) === true) {
            $this->form_validation->set_message('check_email', 'Another User with this email already registered.');
            return false;
        } else {
            $this->form_validation->set_message('check_email', 'User with this email not registered yet.');
            return true;
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

    private function update_password() {
        $params = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'id' => $this->session->userdata('id')
        );
        return $this->users_obj->update_password($params);
    }

    function changepassword() {
        $data = null;
        $this->form_validation->set_rules('oldpassword', 'Old password', 'required|trim|min_length[6]|callback_valid_old_pass');
        $this->form_validation->set_rules('password', 'New Password', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('passwordconfirm', 'Confirm Password', 'required|trim|callback_match_pass');

        if ($this->form_validation->run()) {

            if ($this->update_password() === true) {
                $data["message2"] = "Your password successfully changed";
            } else {
                $data["message2"] = "Your password not changed. An unknown error has occurred.";
            }
            $this->viewPage('personal_details', $data);
        } else {
            if ($this->input->post('form2') == 'form2') {
                $data['form2'] = validation_errors();
            }
            $this->viewPage('personal_details', $data);
        }
    }

    private function check_pass_result() {
        $params = array('email' => $this->input->post('email'), 'password' => $this->input->post('oldpassword'));
        return $this->users_obj->check_pass($params);
    }

    function valid_old_pass() {

        if ($this->check_pass_result() === true)
            return true;
        else {
            $this->form_validation->set_message('valid_old_pass', "Wrong current password");
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

    private function get_user_balance() {
        return $this->users_obj->get_balance($this->session->userdata('id'));
    }

    function depositpage() {
        if ($this->session->userdata('isLoggedIn') === true) {

            $balance = $this->get_user_balance();
            $this->session->set_userdata('balance', $balance);
            $this->viewPage('deposit', null);
        }
        else
            redirect('main/login', 'refresh');
    }

    private function deposit_request() {
        return $this->users_obj->deposit(array('id' => $this->session->userdata('id'), 'amount' => $this->input->post('amount')));
    }

    function deposit() {

        $this->form_validation->set_rules('amount', 'Amount', 'required|trim|min_length[2]|callback_min_deposit');
        if ($this->form_validation->run()) {



            $result = $this->deposit_request();
            if ($result !== false) {
                $this->session->set_userdata('balance', $result);
                $data['message3'] = "Deposit success";
            }
            else
                $data['message3'] = "Deposit unsuccessfull";


            $this->viewPage('deposit', $data);
        }
        else {
            $data['form3'] = validation_errors();
            $this->viewPage('deposit', $data);
        }
    }

    function min_deposit() {
        if (is_numeric($this->input->post('amount'))) {
            if ((int) $this->input->post('amount') >= 50) {
                return true;
            } else {
                $this->form_validation->set_message('min_deposit', "The minimum amount is 50$");
                return false;
            }
        } else {
            $this->form_validation->set_message('min_deposit', "The amount value must be numeric");
            return false;
        }
    }

}

?>
