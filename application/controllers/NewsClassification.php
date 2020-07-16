<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewsClassification extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->library('session');
        $this->load->helper('helper1');
        $this->load->helper(array('form','url'));
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('deptNewsModel');
    }


    public function add_subDept()
    {
        if (in_array(1,$this->session->userdata('roles'))){
        $data['title'] = "إضافة قسم أخبار فرعي";

        $subdept = $this->deptNewsModel->get_subDept();
        $data ['SubDept'] = $subdept;
//        $maindept = $this->DeptNewsModel->get_mainDept();
//        $data ['MainDept'] = $maindept;
        $this->load->view('admin/partial/header',$data);
        $this->load->view('admin/partial/aside-menu');
        $this->load->view('admin/pages/addSubDept');
        $this->load->view('admin/partial/footer');
    }else{
    redirect('admin/login');
}
    }
    public function saveSubDept(){
        if (in_array(1,$this->session->userdata('roles'))){
        $subnews=array('cat_name'=>$this->input->post('subnews'),
//            'main_category_id'=>$this->input->post('category'),
//            'color'=>$this->input->post('colordept'),
            'activat_id'=>1);
        $is_inserted=$this->deptNewsModel->addSubDept($subnews);
        if($is_inserted==false)
            $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
        else
            $this->session->set_flashdata('error','عذراً، فشلت العملية!');
        redirect('admin/addSubDept');
}else{
    redirect('admin/login');
}
    }

    public function deleteSubDept() {
        if (in_array(1,$this->session->userdata('roles'))){
        $id = $this->input->post('deptID');
        $this->deptNewsModel->delSubDept($id);
}else{
    redirect('admin/login');
}

    }

    public function updateSubDept()
    {
        if (in_array(1,$this->session->userdata('roles'))){
        $id = $this->input->post('deptID');
        $textbox = $this->input->post('textbox');
        //$data1['data'] = $data;

        $this->deptNewsModel->updtSubDept($id,$textbox);
}else{
    redirect('admin/login');
}

    }
}
