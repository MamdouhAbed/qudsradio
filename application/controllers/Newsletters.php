<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletters extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper("thumb_helper");
        $this->load->helper('helper1');
        $this->load->database();
        $this->load->library('pagination');
        $this->load->model('LetterModel');
        $this->load->model('CategoryModel');
    }

    public function index()
    {
        $count = $this->db->count_all_results('news_letters');
        $total_rows = 18;
        $config = Array();
        if ($count > $total_rows) {
            $config['base_url'] = base_url() . 'newsletters/page';
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
        $data['Letters'] = $letters=$this->LetterModel->getLetters_today(18, $data['page']);

        $category= $this->CategoryModel->get_category(20,0);
        $data ['Categorysearch'] = $category;


        $data['title'] = "نشرات الأخبار";
        $data['Description'] = ' صوت القدس ';

        $this->load->view('partials/header',$data);
        $this->load->view('partials/aside-menu',$data);
        $this->load->view('pages/newsletters' , $data);
        $this->load->view('partials/footer' , $data);

    }
    public function add_letter()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(8,$this->session->userdata('roles'))){
            $data['title'] = "إضافة نشرة أخبار";

            $this->load->view('admin/partial/header', $data);
            $this->load->view('admin/partial/aside-menu');
            $this->load->view('admin/pages/addLetter', $data);
            $this->load->view('admin/partial/footer');
        } else {
            redirect('admin/login');
        }

    }

    public function saveLetter()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(8,$this->session->userdata('roles'))){
            $path = path_img('newsletters');
            $config['upload_path'] = $path;
            $config['allowed_types'] = '*';
//            $config['max_size'] = '2000';
            $config['overwrite'] = TRUE;
            date_default_timezone_set('Asia/Gaza');
            $date = date('Y-m-d H:i:s');
            $this->load->library('upload', $config);
            if (isset($_FILES['letter_sound']) && !empty($_FILES['letter_sound']['name'])) {

                if (!$this->upload->do_upload('letter_sound')) {
                } else {

                    $uploadedFileData = $this->upload->data();
                    $randomName = md5(time()) . $uploadedFileData['file_ext'];
                    rename($uploadedFileData['full_path'], $uploadedFileData['file_path'] . $randomName);
                    $uploadedFileData["file_name"] = $randomName;

                    $u_rec_id = $this->session->userdata('user_id');

                    $letter = array(
                        'name' => $this->input->post('letter_name'),
                        'link' => $path . $randomName,
                        'user_id' => $u_rec_id,
                        'created_at' => $date);

                    $is_inserted=$this->LetterModel->add_letter($letter);
                    if($is_inserted==false)
                        $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
                    else
                        $this->session->set_flashdata('error','عذراً، فشلت العملية!');
                }
            }
            redirect('admin/addLetter');
        } else {
            redirect('admin/login');
        }
    }

    public function letters_table()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(8,$this->session->userdata('roles'))){
            $count = $this->db->count_all_results('news_letters');
            $total_rows = 20;
            $config = Array();
            if ($count > $total_rows) {
                $config['base_url'] = base_url() . 'admin/dtableLetters/page';
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
                $config['total_rows'] = $count / 20;
                $config['uri_segment'] = 4;

            }

            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
            $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) * 20 : 0;
            $data['Letters'] = $letters=$this->LetterModel->getLetters_today(20, $data['page']);

            $data['title'] = "إدارة نشرات الأخبار";
            $this->load->view('admin/partial/header', $data);
            $this->load->view('admin/partial/aside-menu', $data);
            $this->load->view('admin/pages/dtableLetters', $data);
            $this->load->view('admin/partial/footer', $data);
        } else {
            redirect('admin/login');
        }

    }

    public function updateLetter()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(8,$this->session->userdata('roles'))){
            $id = $this->uri->segment(3);
            $letters = $this->LetterModel->get_letter_id($id);
            $data ['Letters'] = $letters;
            if($letters != null){
                $data['title'] = "تعديل بيانات النشرة ";
            }
            else{
                $data['title'] = " الصفحة غير موجودة ";
                $data['Description'] = '';
                $data['image'] =" ";
            }
            $this->load->view('admin/partial/header', $data);
            $this->load->view('admin/partial/aside-menu');
            if($letters != null)
                $this->load->view('admin/pages/updateLetter');
            else
                $this->load->view('admin/pages/err404');
            $this->load->view('admin/partial/footer');
        } else {
            redirect('admin/login');
        }
    }

    public function saveUpdateLetter()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(8,$this->session->userdata('roles'))){
            $path = path_img('newsletters');
            date_default_timezone_set('Asia/Gaza');
            $date = date('Y-m-d H:i:s');
            $config['upload_path'] = $path;
            $config['allowed_types'] = '*';
//            $config['max_size'] = '2000';
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $id = $this->uri->segment(3);
            $u_rec_id = $this->session->userdata('user_id');
            $letter = array(
                'name' => $this->input->post('letter_name'),
                'updated_at' => $date,
                'updated_by' => $u_rec_id);
            if (isset($_FILES['letter_sound']) && !empty($_FILES['letter_sound']['name'])) {

                if (!$this->upload->do_upload('letter_sound')) {
                } else {

                    $uploadedFileData = $this->upload->data();
                    $randomName = md5(time()) . $uploadedFileData['file_ext'];
                    rename($uploadedFileData['full_path'], $uploadedFileData['file_path'] . $randomName);
                    $uploadedFileData["file_name"] = $randomName;
                    $letter['link'] = $path . $randomName;
                }
            }
            $is_updated=$this->LetterModel->updateLetter($id, $letter);
            if($is_updated==false)
                $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
            else
                $this->session->set_flashdata('error','عذراً، فشلت العملية!');
            redirect('admin/dtableLetters');
        } else {
            redirect('admin/login');
        }
    }

    public function deleteLetter()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(8,$this->session->userdata('roles'))){
            $u_rec_id = $this->session->userdata('user_id');
            $id = $this->input->post('LetterID');
            $letters = array(
                'is_deleted' => 1,
                'deleted_by' => $u_rec_id);
            $is_deleted=$this->LetterModel->updateLetter($id,$letters);
            if($is_deleted==false)
                $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
            else
                $this->session->set_flashdata('error','عذراً، فشلت العملية!');
        } else {
            redirect('admin/login');
        }

    }


}
