<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_us extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('form', 'url'));
        $this->load->helper("thumb_helper");
        $this->load->helper('helper1');
        $this->load->database();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('AboutUsModel');
        $this->load->model('CategoryModel');

    }

    public function index()
    {
        $about = $this->AboutUsModel->get_Details();
        $data ['About'] = $about;

        $category= $this->CategoryModel->get_category(20,0);
        $data ['Categorysearch'] = $category;

        $data['title'] = "من نحن";
        $data['Description'] = ' صوت القدس ';

        $this->load->view('partials/header',$data);
        $this->load->view('partials/aside-menu',$data);
        $this->load->view('pages/about' , $data);
        $this->load->view('partials/footer' , $data);

    }
    public function aboutUs()
    {
        if (in_array(1,$this->session->userdata('roles'))) {
            $data['title'] = "الاعدادات";
            $about = $this->AboutUsModel->get_Details();
            $data ['About'] = $about;
            $this->load->view('admin/partial/header',$data);
            $this->load->view('admin/partial/aside-menu');
            $this->load->view('admin/pages/aboutUs');
            $this->load->view('admin/partial/footer');
        }else{
            redirect('admin/login');
        }
    }
    public function updateDetails(){
        if (in_array(1,$this->session->userdata('roles'))) {
            $this->AboutUsModel->deleteDetails();
            $path=path_img('aboutUs');
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            date_default_timezone_set('Asia/Gaza');
            $date=date('Y-m-d H:i:s') ;
            $u_rec_id = $this->session->userdata('user_id');
            $about = array(
                'home_style' => $this->input->post('home_news'),
                'frequency' => $this->input->post('frequency'),
                'about_txt' => $this->input->post('txt'),
                'img' => $this->input->post('about_img'),
                'site' => $this->input->post('site'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'facebook_link' => $this->input->post('fb_name'),
                'instagram_link' => $this->input->post('insta_name'),
                'twitter_link' => $this->input->post('tw_name'),
                'tube_link' => $this->input->post('yt_name'),
                'whatsapp_link' => $this->input->post('wp_name'),
                'updated_at' => $date,
                'updated_by' => $u_rec_id);
            if (isset($_FILES['quds_img']) && !empty($_FILES['quds_img']['name'])) {
                if (!$this->upload->do_upload('quds_img')) {
                    $this->session->set_flashdata('error','عذراً، فشلت العملية!');
                    redirect('admin/aboutUs');
                } else {
                    $uploadedFileData = $this->upload->data();
                    //generate random image name
                    $randomName = md5(time()) . $uploadedFileData['file_ext'];
                    //rename uploaded image to our new image name
                    rename($uploadedFileData['full_path'], $uploadedFileData['file_path'] . $randomName);

                    $uploadedFileData["file_name"] = $randomName;
                    $about['img'] = $path. $randomName;

                }
            }
            $is_inserted=$this->AboutUsModel->updateDetails($about);
            if($is_inserted==false)
                $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
            else
                $this->session->set_flashdata('error','عذراً، فشلت العملية!');
            redirect('admin/aboutUs');
        }else{
            redirect('admin/login');
        }
    }

}
