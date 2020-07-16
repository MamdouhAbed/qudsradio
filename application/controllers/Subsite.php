<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subsite extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->library('session');
        $this->load->helper('helper1');
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('SubsiteModel');
        $this->load->helper("thumb_helper");

    }

//    subsite
    public function add_Subsite()
    {
        if (in_array(1,$this->session->userdata('roles'))) {
            $data['title'] = "إضافة صفحة فرعية";
           
            $this->load->view('admin/partial/header', $data);
            $this->load->view('admin/partial/aside-menu');
            $this->load->view('admin/pages/addSubsite', $data);
            $this->load->view('admin/partial/footer');
        } else {
            redirect('admin/login');
        }

    }

    public function saveSubsite()
    {
        if (in_array(1,$this->session->userdata('roles'))) {
            $path = path_img('subsite');
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['overwrite'] = TRUE;
            date_default_timezone_set('Asia/Gaza');
            $date = date('Y-m-d H:i:s');
            $this->load->library('upload', $config);
            if (isset($_FILES['subsite_img']) && !empty($_FILES['subsite_img']['name'])) {

                if (!$this->upload->do_upload('subsite_img')) {
                } else {

                    $uploadedFileData = $this->upload->data();
                    $randomName = md5(time()) . $uploadedFileData['file_ext'];
                    rename($uploadedFileData['full_path'], $uploadedFileData['file_path'] . $randomName);
                    $uploadedFileData["file_name"] = $randomName;

                    $u_rec_id = $this->session->userdata('user_id');

                    $activat = $this->input->post('active_subsite');
                    if ($activat == null)
                        $activat = 0;

                    $subsite = array(
                        'name' => $this->input->post('subsite_name'),
                        'link' => $this->input->post('subsite_link'),
                        'created_at' => $date,
                        'activat_id' => $activat,
                        'img' => $path . $randomName,
                        'created_by' => $u_rec_id);

                    $is_inserted=$this->SubsiteModel->add_Subsite($subsite);
                    if($is_inserted==false)
                        $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
                    else
                        $this->session->set_flashdata('error','عذراً، فشلت العملية!');
                }
            }
            redirect('admin/addSubsite');
        } else {
            redirect('admin/login');
        }
    }

    public function Subsite_table()
    {
        if (in_array(1,$this->session->userdata('roles'))) {
            $data['title'] = "إدارة الصفحات الفرعية";
            $data['Subsite'] = $this->SubsiteModel->getSubsite();
            $this->load->view('admin/partial/header', $data);
            $this->load->view('admin/partial/aside-menu');
            $this->load->view('admin/pages/dtableSubsite');
            $this->load->view('admin/partial/footer');
        } else {
            redirect('admin/login');
        }

    }

    public function updateSubsite()
    {
        if (in_array(1,$this->session->userdata('roles'))) {
            $id = $this->uri->segment(3);
            $Subsite = $this->SubsiteModel->get_subsite_id($id);
            $data ['Subsite'] = $Subsite;
            if($Subsite != null){
                $data['title'] = "تعديل بيانات الصفحة ";
            }
            else{
                $data['title'] = " الصفحة غير موجودة ";
                $data['Description'] = '';
                $data['image'] =" ";
            }

            $this->load->view('admin/partial/header', $data);
            $this->load->view('admin/partial/aside-menu');
            if($Subsite != null)
                $this->load->view('admin/pages/updateSubsite');
            else
                $this->load->view('admin/pages/err404');
            $this->load->view('admin/partial/footer');
        } else {
            redirect('admin/login');
        }
    }

    public function saveUpdateSubsite()
    {
        if (in_array(1,$this->session->userdata('roles'))) {
            $path = path_img('subsite');
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'jpg|png|jpeg';
            date_default_timezone_set('Asia/Gaza');
            $date = date('Y-m-d H:i:s');
            $config['overwrite'] = TRUE;
            $u_rec_id = $this->session->userdata('user_id');
            $activat = $this->input->post('active_subsite');
            if ($activat == null)
                $activat = 0;
            $this->load->library('upload', $config);
            $id = $this->uri->segment(3);
            $Subsite = array(
                'name' => $this->input->post('subsite_name'),
                'link' => $this->input->post('subsite_link'),
                'updated_at' => $date,
                'activat_id' => $activat,
                'updated_by' => $u_rec_id);
            if (isset($_FILES['subsite_img']) && !empty($_FILES['subsite_img']['name'])) {

                if (!$this->upload->do_upload('subsite_img')) {
                } else {

                    $uploadedFileData = $this->upload->data();
                    $randomName = md5(time()) . $uploadedFileData['file_ext'];
                    rename($uploadedFileData['full_path'], $uploadedFileData['file_path'] . $randomName);
                    $uploadedFileData["file_name"] = $randomName;
                    $Subsite['img'] = $path . $randomName;
                }
            }
            $is_updated=$this->SubsiteModel->updateSubsite($id, $Subsite);
            if($is_updated==false)
                $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
            else
                $this->session->set_flashdata('error','عذراً، فشلت العملية!');
            redirect('admin/dtableSubsite');
        } else {
            redirect('admin/login');
        }
    }

    public function deleteSubsite()
    {
        if (in_array(1,$this->session->userdata('roles'))) {
            $id = $this->input->post('deptID');

            $this->SubsiteModel->delSubsite($id);
        } else {
            redirect('admin/login');
        }

    }

}