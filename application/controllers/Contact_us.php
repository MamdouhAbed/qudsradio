<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->helper("thumb_helper");
        $this->load->helper('helper1');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('ContactModel');
        $this->load->model('BreakNewsModel');
        $this->load->model('AboutUsModel');
        $this->load->model('CategoryModel');

    }

    public function index()
    {
        $about = $this->AboutUsModel->get_Details();
        $data ['About'] = $about;

        $category= $this->CategoryModel->get_category(20,0);
        $data ['Categorysearch'] = $category;

        $data['title'] = "اتصل بنا";
        $data['Description'] = ' صوت القدس ';

        $this->load->view('partials/header',$data);
        $this->load->view('partials/aside-menu',$data);
        $this->load->view('pages/contact' , $data);
        $this->load->view('partials/footer' , $data);

    }
    public function contact_table()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))){
            $data['title'] = "اتصل بنا";
            $contact = $this->ContactModel->get_contacts();
            $data ['Contact'] = $contact;
            $this->load->view('admin/partial/header',$data);
            $this->load->view('admin/partial/aside-menu');
            $this->load->view('admin/pages/dtableContact');
            $this->load->view('admin/partial/footer');
        }else{
            redirect('admin/login');
        }

    }
    public function saveContact()
    {

        $config['overwrite'] = TRUE;
        date_default_timezone_set('Asia/Gaza');
        $date = date('Y-m-d H:i:s');
        $contact = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobile'),
            'subject' => $this->input->post('subject'),
            'text' => $this->input->post('text'),
            'created_at' => $date);

        $is_inserted=$this->ContactModel->add_contact($contact);
        if($is_inserted==false)
            $this->session->set_flashdata('success', 'شكراً &#9786;، لقد تم إضافة طلبك بنجاح!');
        else
            $this->session->set_flashdata('error','عذراً، فشلت العملية!');
        redirect('contact');

    }

}
