<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


    public function __construct() {
        parent:: __construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('helper1');
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('userModel');
    }

    public function log()
    {

        if ($this->session->userdata('user_id')){
            redirect('admin');

    }else{
            $data['title'] = "تسجيل الدخول";
            $this->load->helper('url');
            $this->load->view('admin/login');
        }


    }

    public function logout()
    {

        $this->session->unset_userdata('user_id');
        redirect('admin/login');



    }

    public function testlogin()
    {
        $username=$this->input->post('username');
        $password=md5($this->input->post('password'));
        $value=$this->userModel->get_user_username($username);
        if(count($value)==0){
            $this->session->set_flashdata('error','عذراً، خطأ في اسم مستخدم أو كلمة مرور!');
            redirect('admin/login');
        }else{

            $value=$value[0];
            if($value->password==$password && $value->is_deleted==0){
                $roles = $this->userModel->get_role_id($value->id);
                $this->load->library('session');
                $this->session->set_userdata(array(
                    'user_id'       => $value->id,
                    'username'      => $value->name,
                    'email'       => $value->email,
                    'img_user' => $value->img_user,
                    'roles' => $roles

                ));

                    $this->session->set_flashdata('success', ' مرحباً بك يا '.$value->name.' في لوحة التحكم ');
                redirect('admin');
            }else{
                $this->session->set_flashdata('error','عذراً، خطأ في اسم مستخدم أو كلمة مرور!');
                redirect('admin/login');
            }
        }






    }

}