<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('helper1');
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('news_Model');
        $this->load->model('CourseModel');

    }

    public function index()
    {

        if ($this->session->userdata('user_id')) {
        $data['title'] = "الصفحة الرئيسية";
        $news = $this->news_Model->get_news_limit_5();
        $data ['News'] = $news;

            $prog = $this->CourseModel->get_course_panel_(5,0);
            $data ['Prog'] = $prog;

        $this->load->view('admin/partial/header',$data);
        $this->load->view('admin/partial/aside-menu');
        $this->load->view('admin/pages/index');
        $this->load->view('admin/partial/footer');
    }else{
redirect('admin/login');
}

    }

}
