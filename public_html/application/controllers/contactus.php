<?php

class Contactus extends My_Controller {

    function __construct() {
        parent::__construct();
    }

    function index(){
        $data=null;
        if ($this->session->userdata('message')) {
            $data['message']=$this->session->userdata('message');
            $this->session->unset_userdata('message');
        }
        $data['captcha']= $this->create_my_captcha();
        $this->viewPage('contactus', $data);
        
    }
    function send() {                
        $this->form_validation->set_rules('message', 'Message', 'required|trim|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email');
        $this->form_validation->set_rules('fullname', 'Full Name', 'required|xss_clean|callback_valid_fullname');
        $this->form_validation->set_rules('captcha', 'Captcha', 'required|trim|callback_valid_captcha');
        if ($this->form_validation->run()) {
            
            $messageToSupport="<p>Please contact with ".$this->input->post('fullname'). ' by email: '.$this->input->post('email').' .</p>'.
                    '<h3>Message from User:</h3>' .           
                    '<p>'.$this->input->post('message').'</p>';
            
            $messageToClient="Dear ".$this->input->post('fullname').", your request successfully recieved by our support team. We will contact with you as soon as will be possible.";
            
            if($this->email(null,array('email'=>'slavak@spotoption.com','name'=>'suppoerter'),'Contact Us Request', $messageToSupport)){
                if ($this->email(null,array('email'=>$this->input->post('email'),'name'=>$this->input->post('fullname')),'Contact Us Report', $messageToClient)) {                
                $this->session->set_userdata('message',"Your contact details has successfully sent to our support center!");
                redirect('contactus');
                }
                
                
            }
            
           
            
        } else {
            $data['message'] = validation_errors();
        }
        $data['captcha']= $this->create_my_captcha();
        $this->viewPage('contactus', $data);
    }

    function valid_fullname() {
        $regex = '/^[a-zA-Z][a-zA-Z ]*$/';
        if (preg_match($regex,$this->input->post('fullname')))
            return true;
        else {
            $this->form_validation->set_message('valid_fullname', "Full name have wrong symbols");
            return false;
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

}

?>
