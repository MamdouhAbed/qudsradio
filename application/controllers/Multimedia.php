<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Multimedia extends CI_Controller
{
    public function __construct() {
        parent:: __construct();
        $this->load->library('session');
        $this->load->helper('helper1');
        $this->load->model('multimediaModel');
        $this->load->helper(array('form','url'));
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('mediaModel');
        $this->load->model('VideoModel');
        $this->load->library('pagination');
    }



    public function deleteImagesAlbum() {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(7,$this->session->userdata('roles'))){
            $id = $this->input->post('deptID');

            $this->multimediaModel->delAlbum($id);
        }else{
            redirect('admin/login');
        }

    }

    public function report_table()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(7,$this->session->userdata('roles'))){
            $data['title'] = "إدارة التقارير المصورة";
            $reports = $this->multimediaModel->get_video_reports();
            $data ['Reports'] = $reports;
            $this->load->view('admin/partial/header', $data);
            $this->load->view('admin/partial/aside-menu');
            $this->load->view('admin/pages/dtableReports');
            $this->load->view('admin/partial/footer');
        }else{
            redirect('admin/login');
        }

    }

    public function video_table()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(7,$this->session->userdata('roles'))){
            $count = $this->db->count_all_results('videos');
            $total_rows = 20;
            $config = Array();
            if ($count > $total_rows) {
                $config['base_url'] = base_url() . 'admin/dtableVideos/page';
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
            $data['Video'] = $videos=$this->VideoModel->get_video(20, $data['page']);

            $data['title'] = "إدارة الفيديو";
        $this->load->view('admin/partial/header', $data);
        $this->load->view('admin/partial/aside-menu');
        $this->load->view('admin/pages/dtableVideos');
        $this->load->view('admin/partial/footer');
    }else{
redirect('admin/login');
}

    }

    public function add_video()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(7,$this->session->userdata('roles'))){
        $data['title'] = "إضافة فيديو";
        $this->load->view('admin/partial/header', $data);
        $this->load->view('admin/partial/aside-menu');
        $this->load->view('admin/pages/addVideo');
        $this->load->view('admin/partial/footer');
    }else{
redirect('admin/login');
}

    }

    public function saveVideo()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(7,$this->session->userdata('roles'))){
            date_default_timezone_set('Asia/Gaza');
            $date = date('Y-m-d H:i:s');
            $path = path_img('videos');
            $config['upload_path'] = $path;
            $config['allowed_types'] = '*';
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $u_rec_id = $this->session->userdata('user_id');

            if (isset($_FILES['video_file']) && !empty($_FILES['video_file']['name'])) {

                if (!$this->upload->do_upload('video_file')) {
                } else {

                    $uploadedFileData2 = $this->upload->data();
                    $randomName2 = md5(time()) . $uploadedFileData2['file_ext'];
                    //rename uploaded image to our new image name
                    rename($uploadedFileData2['full_path'], $uploadedFileData2['file_path'] . $randomName2);
                    $uploadedFileData2["file_name"] =  $randomName2;
                    $activated = $this->input->post('activated');
                    if ($activated == null)
                        $activated = 0;
                    $videos = array(
                        'title' => $this->input->post('videoname'),
                        'local_video' => $path.$randomName2,
                        'created_at' => $date,
                        'main_media_id' => 1,
                        'activated' => $activated,
                        'created_by'=>$u_rec_id);

                    if (isset($_FILES['video_img']) && !empty($_FILES['video_img']['name'])) {

                        if (!$this->upload->do_upload('video_img')) {
                        } else {
                            $uploadedFileData3 = $this->upload->data();
                            $randomName3 = md5(time()) . $uploadedFileData3['file_ext'];
                            //rename uploaded image to our new image name
                            rename($uploadedFileData3['full_path'], $uploadedFileData3['file_path'] . $randomName3);
                            $uploadedFileData3["file_name"] = $randomName3;
                            $videos['imghome'] =$path . $randomName3;
                        }
                    }
                            $is_inserted=$this->multimediaModel->addVideo($videos);
                }
            }else{
                $randomName = md5(time()).'.PNG';
                $img_path = $this->input->post('url-imghome');
                @ $get_img = file_get_contents($img_path);
                file_put_contents($path.$randomName, $get_img);
                $activated = $this->input->post('activated');
                if ($activated == null)
                    $activated = 0;
            $videos = array(
                'title' => $this->input->post('videoname'),
                'link_youtube' => $this->input->post('url'),
                'imghome' => $path.$randomName,
                'created_at' => $date,
                'main_media_id' => 1,
                'activated' => $activated,
                'created_by'=>$u_rec_id);
            $is_inserted=$this->multimediaModel->addVideo($videos);
            }
            if($is_inserted==false)
                $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
            else
                $this->session->set_flashdata('error','عذراً، فشلت العملية!');
            redirect('admin/addVideo');
        }else{
            redirect('admin/login');
        }
    }

    public function updateVideo()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(7,$this->session->userdata('roles'))){
            $id=$this->uri->segment(3);
            $videos = $this->multimediaModel->get_video_id($id);
            $data ['videos'] = $videos;
            if($videos != null){
                $data['title'] = "تعديل بيانات الفيديو ";
            }
            else{
                $data['title'] = " الصفحة غير موجودة ";
                $data['Description'] = '';
                $data['image'] =" ";
            }
            $this->load->view('admin/partial/header',$data);
            $this->load->view('admin/partial/aside-menu');
            if($videos != null)
                $this->load->view('admin/pages/updateVideo');
            else
                $this->load->view('admin/pages/err404');
            $this->load->view('admin/partial/footer');
        }else{
            redirect('admin/login');
        }
    }

    public function saveUpdateVideo(){
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(7,$this->session->userdata('roles'))){
            $id=$this->uri->segment(3);
            date_default_timezone_set('Asia/Gaza');
            $date = date('Y-m-d H:i:s');
            $path = path_img('videos');
            $config['upload_path'] = $path;
            $config['allowed_types'] = '*';
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $u_rec_id = $this->session->userdata('user_id');
            if (isset($_FILES['video_file']) && !empty($_FILES['video_file']['name'])) {

                if (!$this->upload->do_upload('video_file')) {
                } else {

                    $uploadedFileData2 = $this->upload->data();
                    $randomName2 = md5(time()) . $uploadedFileData2['file_ext'];
                    //rename uploaded image to our new image name
                    rename($uploadedFileData2['full_path'], $uploadedFileData2['file_path'] . $randomName2);
                    $uploadedFileData2["file_name"] =  $randomName2;
                    $activated = $this->input->post('activated');
                    if ($activated == null)
                        $activated = 0;
                    $videos = array(
                        'title' => $this->input->post('videoname'),
                        'link_youtube' => null,
                        'local_video' => $path.$randomName2,
                        'updated_at' => $date,
                        'main_media_id' => 1,
                        'activated' => $activated,
                        'updated_by'=>$u_rec_id);

                    if (isset($_FILES['video_img']) && !empty($_FILES['video_img']['name'])) {

                        if (!$this->upload->do_upload('video_img')) {
                        } else {
                            $uploadedFileData3 = $this->upload->data();
                            $randomName3 = md5(time()) . $uploadedFileData3['file_ext'];
                            //rename uploaded image to our new image name
                            rename($uploadedFileData3['full_path'], $uploadedFileData3['file_path'] . $randomName3);
                            $uploadedFileData3["file_name"] =  $randomName3;
                            $videos['imghome'] = $path . $randomName3;
                        }
                    }
                    $is_updated=$this->multimediaModel->updateVideo($id, $videos);
                }
            }else{

            $randomName = md5(time()).'.PNG';
            $url = $this->input->post('url');
            $img_path = $this->input->post('url-imghome');
                $activated = $this->input->post('activated');
                if ($activated == null)
                    $activated = 0;
            if($url==null || $img_path==null) {
                $videos = array('title' => $this->input->post('videoname'),
                    'updated_at' => $date,
                    'main_media_id' => 1,
                    'activated' => $activated,
                    'updated_by'=>$u_rec_id);
                $this->multimediaModel->updateVideo($id, $videos);
            }
            else{
                @ $get_img = file_get_contents($img_path);
                file_put_contents($path.$randomName, $get_img);
                $activated = $this->input->post('activated');
                if ($activated == null)
                    $activated = 0;
                $videos = array('title' => $this->input->post('videoname'),
                    'link_youtube' => $this->input->post('url'),
                    'local_video' => null,
                    'imghome' => $path . $randomName,
                    'updated_at' => $date,
                    'main_media_id' => 1,
                    'activated' => $activated,
                    'updated_by'=>$u_rec_id);

                $is_updated=$this->multimediaModel->updateVideo($id, $videos);
            }
            }
            if($is_updated==false)
                $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
            else
                $this->session->set_flashdata('error','عذراً، فشلت العملية!');
            redirect('admin/dtableVideos');
        }else{
            redirect('admin/login');
        }
    }

    public function deleteVideo() {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(7,$this->session->userdata('roles'))){
            $id = $this->input->post('videoID');

            $this->multimediaModel->delVideo($id);
        }else{
            redirect('admin/login');
        }

    }

}