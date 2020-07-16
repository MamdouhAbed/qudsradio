<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advert extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->library('session');
        $this->load->helper('helper1');
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('mediaModel');
        $this->load->model('AdvertModel');
        $this->load->helper("thumb_helper");

    }

//    advert
    public function add_advert()
    {
            if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(10,$this->session->userdata('roles'))){
            $data['title'] = "إضافة إعلان";
            $place_adv = $this->AdvertModel->get_place_adv();
            $data ['PlaceAdv'] = $place_adv;
            $this->load->view('admin/partial/header', $data);
            $this->load->view('admin/partial/aside-menu');
            $this->load->view('admin/pages/addAdvert', $data);
            $this->load->view('admin/partial/footer');
        } else {
            redirect('admin/login');
        }

    }

    public function saveAdvert()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(10,$this->session->userdata('roles'))){
            $path = path_img('banner');
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'jpg|png|jpeg';
//            $config['max_size'] = '2000';
            $config['overwrite'] = TRUE;
            date_default_timezone_set('Asia/Gaza');
            $date = date('Y-m-d H:i:s');
            $this->load->library('upload', $config);
            if (isset($_FILES['banner_img']) && !empty($_FILES['banner_img']['name'])) {

                if (!$this->upload->do_upload('banner_img')) {
                } else {

                    $uploadedFileData = $this->upload->data();
                    $randomName = md5(time()) . $uploadedFileData['file_ext'];
                    rename($uploadedFileData['full_path'], $uploadedFileData['file_path'] . $randomName);
                    $uploadedFileData["file_name"] = $randomName;

                    $u_rec_id = $this->session->userdata('user_id');

                    $activat = $this->input->post('active_bnr');
                    $banner_place= $this->input->post('place_banner');
                    if ($activat == null)
                        $activat = 0;
//                    if ($banner_place == -1)
//                        $banner_place = null;
                    $banner = array(
                        'name' => $this->input->post('banner_name'),
                        'link' => $this->input->post('banner_link'),
                        'place_id' => $banner_place,
                        'created_at' => $date,
                        'activat_id' => $activat,
                        'img' => $path . $randomName,
                        'created_by' => $u_rec_id);

                    $is_inserted=$this->AdvertModel->add_banner($banner);
                    if($is_inserted==false)
                        $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
                    else
                        $this->session->set_flashdata('error','عذراً، فشلت العملية!');
                }
            }
            redirect('admin/addAds');
        } else {
            redirect('admin/login');
        }
    }

    public function advert_table()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(10,$this->session->userdata('roles'))){
            $data['title'] = "إدارة الإعلانات";
            $data['Banner'] = $this->AdvertModel->getBanner();
            $this->load->helper('url');
            $this->load->view('admin/partial/header', $data);
            $this->load->view('admin/partial/aside-menu');
            $this->load->view('admin/pages/dtableBanner');
            $this->load->view('admin/partial/footer');
        } else {
            redirect('admin/login');
        }

    }

    public function updateAdvert()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(10,$this->session->userdata('roles'))){
            $id = $this->uri->segment(3);
            $banner = $this->AdvertModel->get_banner_id($id);
            $data ['Banner'] = $banner;
            if($banner != null){
                $data['title'] = "تعديل بيانات الإعلان ";
                $place_adv = $this->AdvertModel->get_place_adv();
                $data ['PlaceAdv'] = $place_adv;
            }
            else{
                $data['title'] = " الصفحة غير موجودة ";
                $data['Description'] = '';
                $data['image'] =" ";
            }

            $this->load->view('admin/partial/header', $data);
            $this->load->view('admin/partial/aside-menu');
            if($banner != null)
                $this->load->view('admin/pages/updateBanner');
            else
                $this->load->view('admin/pages/err404');
            $this->load->view('admin/partial/footer');
        } else {
            redirect('admin/login');
        }
    }

    public function saveUpdateAdvert()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(10,$this->session->userdata('roles'))){
            $path = path_img('banner');
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'jpg|png|jpeg';
//            $config['max_size'] = '2000';
            $config['overwrite'] = TRUE;
            $activat = $this->input->post('active_bnr');
            $banner_place= $this->input->post('place_banner');
            if ($activat == null)
                $activat = 0;
            $this->load->library('upload', $config);
            $id = $this->uri->segment(3);
            $banner = array(
                'name' => $this->input->post('banner_name'),
                'link' => $this->input->post('banner_link'),
                'place_id' => $banner_place,
                'activat_id' => $activat,
            );
            if (isset($_FILES['banner_img']) && !empty($_FILES['banner_img']['name'])) {

                if (!$this->upload->do_upload('banner_img')) {
                } else {

                    $uploadedFileData = $this->upload->data();
                    $randomName = md5(time()) . $uploadedFileData['file_ext'];
                    rename($uploadedFileData['full_path'], $uploadedFileData['file_path'] . $randomName);
                    $uploadedFileData["file_name"] = $randomName;
                    $banner['img'] = $path . $randomName;
                }
            }
            $is_updated=$this->AdvertModel->updateBanner($id, $banner);
            if($is_updated==false)
                $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
            else
                $this->session->set_flashdata('error','عذراً، فشلت العملية!');
            redirect('admin/dtableBanner');
        } else {
            redirect('admin/login');
        }
    }

    public function deleteAdvert()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(10,$this->session->userdata('roles'))){
            $id = $this->input->post('deptID');

            $this->AdvertModel->delBanner($id);
        } else {
            redirect('admin/login');
        }

    }

}