<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class My_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    protected function viewPage($page, $data) {
        $folder = "";
        if (!$page ||
                !file_exists('application/views/' . $page . '.php')) {
            $folder = "pages/";
            if (!file_exists('application/views/pages/' . $page . '.php')) {
                show_404();
            }
        } else {
            
        }

        $this->load->model('categories');
        $data['categories'] = $this->categories->getAll();

        $data['title'] = ucfirst($page); // Capitalize title
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view($folder . $page, $data);
        $this->load->view('templates/footer', $data);
    }

    protected function create_my_captcha() {
        $this->load->helper('string');
        $string = random_string('alnum', 4);
        $this->load->helper('captcha');
        $vals = array(
            'word' => $string,
            'img_path' => 'media/img/captcha/',
            'img_url' => 'http://localhost/vl/public_html/media/img/captcha/',
            'font_path' => 'system/fonts/texb.ttf',
            'img_width' => 100,
            'img_height' => 30,
            'expiration' => 3600
        );
        $cap = create_captcha($vals);
        $this->session->set_userdata('captcha', md5($cap['word']));
        return $cap['image'];
    }

    protected function email($from, $to, $subject, $message) {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'mx1.hostinger.ru',
            'smtp_user' => 'admin@slby.url.ph',
            'smtp_pass' => 'XYjnpFWKy4',
            'smtp_port' => '2525',
            'mailtype' => 'html',
            'charset' => 'utf-8'
        );

        $this->load->library('email');
        $this->email->initialize($config);

        if ($from == null) {
            $this->email->from('admin@slby.url.ph', 'VL admin');
        } else {
            $this->email->from($from['email'], $from['name']);
        }

        $this->email->to($to['email'], $to['name']);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send())
            return true;
        else
            return false;
    }

}

?>
