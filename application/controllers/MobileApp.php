<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MobileApp extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('form', 'url'));
        $this->load->helper("thumb_helper");

    }

    public function index()
    {

        $data['title'] = "تطبيق موبايل";
        $data['Description'] = ' صوت القدس ';

        $this->load->view('pages/mobileapp' , $data);

    }


}
