<?php
class My404 extends CI_Controller
{

    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('form', 'url'));
        $this->load->helper("thumb_helper");
        $this->load->helper('helper1');
        $this->load->database();
        $this->load->library('session');
        $this->load->model('CategoryModel');

    }

    public function index()
    {
        $category= $this->CategoryModel->get_category(20,0);
        $data ['Categorysearch'] = $category;

        $data['title'] = "الصفحة غير موجودة";
        $data['Description'] ="إذاعة القدس";
        $data['image'] =" ";

        $this->load->view('partials/header',$data);
        $this->load->view('partials/aside-menu',$data);
        $this->load->view('pages/err404', $data);
        $this->load->view('partials/footer', $data);

    }
}