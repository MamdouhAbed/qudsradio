<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrivateFiles extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper("thumb_helper");
        $this->load->helper('helper1');
        $this->load->database();
        $this->load->library('pagination');
        $this->load->model('PrivateFilesModel');
        $this->load->model('CategoryModel');
    }

    public function files_table()
    {
        if(!$this->session->userdata('user_id')){
            redirect('admin/login');}
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(15,$this->session->userdata('roles'))){

            $count = $this->db->count_all_results('special_files');
        $total_rows = 18;
        $config = Array();
        if ($count > $total_rows) {
            $config['base_url'] = base_url() . 'admin/dtablePrivateFiles/page';
            $config['per_page'] = 1;
            $config['full_tag_open'] = '<ul class="pagination pagination_primary">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = true;
            $config['last_link'] = true;
            $config['first_link'] = 'الأولى';
            $config['last_link'] = 'الأخيرة';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = 'السابق';
            $config['prev_tag_open'] = '<li class="prev">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = 'التالي';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['total_rows'] = $count / 18;
            $config['uri_segment'] = 3;

        }

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) * 18 : 0;
        $data['PrivateFiles'] = $private_files=$this->PrivateFilesModel->get_private_files(18, $data['page']);

        $category= $this->CategoryModel->get_category(20,0);
        $data ['Categorysearch'] = $category;


        $data['title'] = "الملف الخاص";
        $data['Description'] = ' صوت القدس ';

        $this->load->view('admin/partial/header', $data);
        $this->load->view('admin/partial/aside-menu', $data);
        $this->load->view('admin/pages/dtablePrivateFiles', $data);
        $this->load->view('admin/partial/footer', $data);
        } else {
            redirect('admin/login');
        }

    }
    public function add_file()
    {
        if(!$this->session->userdata('user_id')){
            redirect('admin/login');}
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(15,$this->session->userdata('roles'))){
            $data['title'] = "إضافة ملف خاص";

            $this->load->view('admin/partial/header', $data);
            $this->load->view('admin/partial/aside-menu');
            $this->load->view('admin/pages/addPrivateFile', $data);
            $this->load->view('admin/partial/footer');
        } else {
            redirect('admin/login');
        }

    }
    public function updatePrivateFile()
    {
        if(!$this->session->userdata('user_id')){
            redirect('admin/login');}
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(15,$this->session->userdata('roles'))){
            $id = $this->uri->segment(3);
            $files = $this->PrivateFilesModel->get_file_id($id);
            $data ['PrivateFile'] = $files;
            if($files != null){
                $data['title'] = "تعديل بيانات الملف ";
            }
            else{
                $data['title'] = " الصفحة غير موجودة ";
                $data['Description'] = '';
                $data['image'] =" ";
            }
            $this->load->view('admin/partial/header', $data);
            $this->load->view('admin/partial/aside-menu');
            if($files != null)
                $this->load->view('admin/pages/updatePrivateFile');
            else
                $this->load->view('admin/pages/err404');
            $this->load->view('admin/partial/footer');
        } else {
            redirect('admin/login');
        }
    }

    public function savePrivateFile()
    {
        if(!$this->session->userdata('user_id')){
            redirect('admin/login');}
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(15,$this->session->userdata('roles'))){
            $path = path_img('specialfiles');
            $config['upload_path'] = $path;
            $config['allowed_types'] = '*';
            $config['overwrite'] = TRUE;
            date_default_timezone_set('Asia/Gaza');
            $date = date('Y-m-d H:i:s');
            $this->load->library('upload', $config);
            if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {

                if (!$this->upload->do_upload('image')) {
                } else {

                    $uploadedFileData = $this->upload->data();
                    $randomName = md5(time()) . $uploadedFileData['file_ext'];
                    rename($uploadedFileData['full_path'], $uploadedFileData['file_path'] . $randomName);
                    $uploadedFileData["file_name"] = $randomName;
                    $showhome = $this->input->post('show_home');
                    if ($showhome == null)
                        $showhome = 0;
                    $activated = $this->input->post('activat_id');
                    if ($activated == null)
                        $activated = 0;
                    $u_rec_id = $this->session->userdata('user_id');

                    $privatefile = array(
                        'name' => $this->input->post('name'),
                        'image' => $path . $randomName,
                        'show_home' => $showhome,
                        'activat_id' => $activated,
                        'created_by' => $u_rec_id,
                        'created_at' => $date);
                    if (isset($_FILES['banner']) && !empty($_FILES['banner']['name'])) {

                        if (!$this->upload->do_upload('banner')) {
                        } else {
                            $uploadedFileData2 = $this->upload->data();
                            $randomName2 = md5(time()) . $uploadedFileData2['file_ext'];
                            //rename uploaded image to our new image name
                            rename($uploadedFileData2['full_path'], $uploadedFileData2['file_path'] . $randomName2);
                            $uploadedFileData2["file_name"] = $randomName2;
                            $banner=$path. $randomName2;
                            $privatefile['banner'] = $banner;
                        }
                    }

                    $is_inserted=$this->PrivateFilesModel->add_private_file($privatefile);
                    if($is_inserted==false)
                        $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
                    else
                        $this->session->set_flashdata('error','عذراً، فشلت العملية!');
                }
            }
            redirect('admin/addPrivateFile');
        } else {
            redirect('admin/login');
        }
    }

    public function saveUpdatePrivateFile()
    {
        if(!$this->session->userdata('user_id')){
            redirect('admin/login');}
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(15,$this->session->userdata('roles'))){
            $path = path_img('specialfiles');
            $config['upload_path'] = $path;
            $config['allowed_types'] = '*';
            $config['overwrite'] = TRUE;
            date_default_timezone_set('Asia/Gaza');
            $date = date('Y-m-d H:i:s');
            $this->load->library('upload', $config);
            $id = $this->uri->segment(3);
            $showhome = $this->input->post('show_home');
            if ($showhome == null)
                $showhome = 0;
            $activated = $this->input->post('activat_id');
            if ($activated == null)
                $activated = 0;
            $u_rec_id = $this->session->userdata('user_id');
            $privatefile = array(
                'name' => $this->input->post('name'),
                'show_home' => $showhome,
                'activat_id' => $activated,
                'updated_by' => $u_rec_id,
                'updated_at' => $date);
            if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {

                if (!$this->upload->do_upload('image')) {
                } else {

                    $uploadedFileData = $this->upload->data();
                    $randomName = md5(time()) . $uploadedFileData['file_ext'];
                    rename($uploadedFileData['full_path'], $uploadedFileData['file_path'] . $randomName);
                    $uploadedFileData["file_name"] = $randomName;
                    $privatefile['image'] = $path . $randomName;
                }
            }
            if (isset($_FILES['banner']) && !empty($_FILES['banner']['name'])) {

                if (!$this->upload->do_upload('banner')) {
                } else {
                    $uploadedFileData2 = $this->upload->data();
                    $randomName2 = md5(time()) . $uploadedFileData2['file_ext'];
                    //rename uploaded image to our new image name
                    rename($uploadedFileData2['full_path'], $uploadedFileData2['file_path'] . $randomName2);
                    $uploadedFileData2["file_name"] = $randomName2;
                    $banner=$path. $randomName2;
                    $privatefile['banner'] = $banner;
                }
            }
            $is_updated=$this->PrivateFilesModel->updatePrivateFile($id, $privatefile);
            if($is_updated==false)
                $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
            else
                $this->session->set_flashdata('error','عذراً، فشلت العملية!');
            redirect('admin/dtablePrivateFiles');
        } else {
            redirect('admin/login');
        }
    }
    
    public function deletePrivateFile()
    {
        if(!$this->session->userdata('user_id')){
            redirect('admin/login');}
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(15,$this->session->userdata('roles'))){
            $u_rec_id = $this->session->userdata('user_id');
            date_default_timezone_set('Asia/Gaza');
            $date = date('Y-m-d H:i:s');
            $id = $this->input->post('FileID');
            $files = array(
                'is_delete' => 1,
                'deleted_at' => $date,
                'deleted_by' => $u_rec_id);
            $is_deleted=$this->PrivateFilesModel->updatePrivateFile($id,$files);
            if($is_deleted==false)
                $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
            else
                $this->session->set_flashdata('error','عذراً، فشلت العملية!');
        } else {
            redirect('admin/login');
        }

    }


}
