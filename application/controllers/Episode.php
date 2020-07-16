<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Episode extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('form', 'url'));
        $this->load->helper("thumb_helper");
        $this->load->database();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('EpisodeModel');
        $this->load->model('CourseModel');
        $this->load->helper('helper1');
        $this->load->library('pagination');
        $this->load->model('UploadModel');


    }

    public function episode_table()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(6,$this->session->userdata('roles'))){
            $course = $this->CourseModel->get_course_where_id_panel();
            $data ['Course'] = $course;
            $count = $this->EpisodeModel->get_episode_where_course_count();
            $total_rows = 20;
            $config = Array();
            if ($count > $total_rows) {
                $config['base_url'] = base_url() . 'admin/course/'.$this->uri->segment(3).'/episodes/page';
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
                $config['uri_segment'] = 6;

            }

            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
            $data['page'] = ($this->uri->segment(6)) ? $this->uri->segment(6) * 20 : 0;
            $data['Episode'] = $episode=$this->EpisodeModel->get_episode_where_course_panel(20, $data['page']);
            if($course != null){
                $data['title'] = "قائمة الحلقات";
            }
        else{
                $data['title'] = " الصفحة غير موجودة ";
                $data['Description'] = '';
                $data['image'] =" ";
            }
            $this->load->view('admin/partial/header',$data);
            $this->load->view('admin/partial/aside-menu');
            if($course != null)
            $this->load->view('admin/pages/dtableEpisode');
            else
            $this->load->view('admin/pages/err404');
            $this->load->view('admin/partial/footer');
        }else{
            redirect('admin/login');
        }

    }

    public function all_episodes()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(6,$this->session->userdata('roles'))){
            $count = $this->db->count_all_results('episode');
            $total_rows = 20;
            $config = Array();
            if ($count > $total_rows) {
                $config['base_url'] = base_url() . 'admin/allEpisodes/page';
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
            $data['Episodes'] = $episode=$this->EpisodeModel->get_all_episode(20, $data['page']);
            if($episode != null){
                $data['title'] = "قائمة الحلقات";
            }
            else{
                $data['title'] = " الصفحة غير موجودة ";
                $data['Description'] = '';
                $data['image'] =" ";
            }
            $this->load->view('admin/partial/header',$data);
            $this->load->view('admin/partial/aside-menu');
            if($episode != null)
                $this->load->view('admin/pages/allEpisodes');
            else
                $this->load->view('admin/pages/err404');
            $this->load->view('admin/partial/footer');
        }else{
            redirect('admin/login');
        }

    }

    public function add_episode()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(6,$this->session->userdata('roles'))){
            $data['title'] = "إضافة حلقة";
            $course = $this->CourseModel->get_course_where_active(100,0);
            $data ['Course'] = $course;

            $this->load->view('admin/partial/header', $data);
            $this->load->view('admin/partial/aside-menu');
            $this->load->view('admin/pages/addEpisode');
            $this->load->view('admin/partial/footer');
        }else{
            redirect('admin/login');
        }
    }



    public function saveEpisode()
    {

        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(6,$this->session->userdata('roles'))){
            $path=path_file($this->input->post('course'));
            date_default_timezone_set('Asia/Gaza');
            $date = date('Y-m-d H:i:s');
            $config['upload_path'] = $path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '200000';
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $this->load->library('session');

                    $u_rec_id = $this->session->userdata('user_id');
            if (isset($_FILES['episode_sound']) && !empty($_FILES['episode_sound']['name'])) {

                if (!$this->upload->do_upload('episode_sound')) {
                } else {

                    $uploadedFileData2 = $this->upload->data();
                    $randomName2 = md5(time()) . $uploadedFileData2['file_ext'];
                    //rename uploaded image to our new image name
                    rename($uploadedFileData2['full_path'], $uploadedFileData2['file_path'] . $randomName2);
                    $uploadedFileData2["file_name"] = $path . $randomName2;
                    $showhome = $this->input->post('show_home');
                    if ($showhome == null)
                        $showhome = 0;

                    $episode = array('name' => $this->input->post('episode_name'),
                        'info' => $this->input->post('txt'),
                        'audio' => $path.$randomName2,
                        'program_id' => $this->input->post('course'),
                        'show_home' => $showhome,
                        'user_id' => $u_rec_id,
                        'created_at' => $date);
                    if (isset($_FILES['episode_img']) && !empty($_FILES['episode_img']['name'])|| isset($_POST['img-archive'])) {

                        if (!$this->upload->do_upload('episode_img')) {
                            $episode['img']=$this->input->post('img-archive');
                        } else {
                            $uploadedFileData3 = $this->upload->data();
                            $randomName3 = md5(time()) . $uploadedFileData3['file_ext'];
                            //rename uploaded image to our new image name
                            rename($uploadedFileData3['full_path'], $uploadedFileData3['file_path'] . $randomName3);
                            $uploadedFileData3["file_name"] = $randomName3;
                            $img=$path. $randomName3;
                            $episode['img'] = $img;
                        }
                        if ($this->input->post('desc_img') != null ) {
                            $img_archive = array(
                                'name' => $this->input->post('desc_img'),
                                'path' => $img,
                                'admin_id' => $u_rec_id,
                                'created_at' => $date);
                            $this->UploadModel->addImgUpload($img_archive);
                        }
                    }
                    $insert_id=$this->EpisodeModel->addEpisode($episode);
                }
            }
            if ($this->input->post('link') != null || $this->input->post('fb_link') != null  || (isset($_FILES['video_file']) && !empty($_FILES['video_file']['name']))) {
                $video = array(
                    'link' => $this->input->post('link'),
                    'fb_link' => $this->input->post('fb_link'),
                    'episode_id' => $insert_id);

                if (!$this->upload->do_upload('video_file')) {
                } else {
                    $uploadedFileData = $this->upload->data();
                    $randomName = md5(time()) . $uploadedFileData['file_ext'];
                    //rename uploaded image to our new image name
                    rename($uploadedFileData['full_path'], $uploadedFileData['file_path'] . $randomName);
                    $uploadedFileData["file_name"] =  $randomName;
                    $video['local_video'] = $path . $randomName;

                }

                $this->EpisodeModel->addVideo($video);
            }
                    if($insert_id==true)
                        $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
                    else
            $this->session->set_flashdata('error','عذراً، فشلت العملية!');
                    redirect('admin/addEpisode');

        } else {
            redirect('admin/login');
        }


    }

    public function delVideoEpisode(){
        if ($this->session->userdata('user_id')) {
            $id=$this->input->post('id');
            $this->EpisodeModel->delVideoEpisode($id);
        }else{

        }
    }
    public
    function updateEpisode()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(6,$this->session->userdata('roles'))){
            $id = $this->uri->segment(3);

            $episode = $this->EpisodeModel->get_episode_id($id);
            $data ['Episode'] = $episode;
            if($episode != null){
                $data['title'] = "تعديل حلقة";
                $video = $this->EpisodeModel->get_videoEpisode($id);
                $data ['Video'] = $video;

                $course = $this->CourseModel->get_course_where_active(100,0);
                $data ['Course'] = $course;
            }
            else{
                $data['title'] = " الصفحة غير موجودة ";
                $data['Description'] = '';
                $data['image'] =" ";
            }

            $this->load->view('admin/partial/header', $data);
            $this->load->view('admin/partial/aside-menu');
            if($episode != null)
                $this->load->view('admin/pages/updateEpisode');
            else
                $this->load->view('admin/pages/err404');
            $this->load->view('admin/partial/footer');
        } else {
            redirect('admin/login');
        }

    }

    public function saveUpdateEpisode()
    {

        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(6,$this->session->userdata('roles'))){
            $path=path_file($this->input->post('course'));
            date_default_timezone_set('Asia/Gaza');
            $date = date('Y-m-d H:i:s');
            $config['upload_path'] = $path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '200000';
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $id = $this->uri->segment(3);
            $u_rec_id = $this->session->userdata('user_id');
            $showhome = $this->input->post('show_home');
            if ($showhome == null)
                $showhome = 0;
            if (isset($_FILES['episode_sound']) && !empty($_FILES['episode_sound']['name'])) {

                if (!$this->upload->do_upload('episode_sound')) {
                } else {

                    $uploadedFileData2 = $this->upload->data();
                    $randomName2 = md5(time()) . $uploadedFileData2['file_ext'];
                    //rename uploaded image to our new image name
                    rename($uploadedFileData2['full_path'], $uploadedFileData2['file_path'] . $randomName2);
                    $uploadedFileData2["file_name"] = $path . $randomName2;
                    $episode = array('name' => $this->input->post('episode_name'),
                        'info' => $this->input->post('txt'),
                        'audio' => $path.$randomName2,
                        'program_id' => $this->input->post('course'),
                        'show_home' => $showhome,
                        'updated_by' => $u_rec_id,
                        'updated_at' => $date);
                    if (isset($_FILES['episode_img']) && !empty($_FILES['episode_img']['name'])|| isset($_POST['img-archive'])) {

                        if (!$this->upload->do_upload('episode_img')) {
                            $episode['img']=$this->input->post('img-archive');
                        } else {
                            $uploadedFileData3 = $this->upload->data();
                            $randomName3 = md5(time()) . $uploadedFileData3['file_ext'];
                            //rename uploaded image to our new image name
                            rename($uploadedFileData3['full_path'], $uploadedFileData3['file_path'] . $randomName3);
                            $uploadedFileData3["file_name"] = $path . $randomName3;
                            $episode['img'] = $path . $randomName3;
                        }
                        if ($this->input->post('desc_img') != null ) {
                            $img_archive = array(
                                'name' => $this->input->post('desc_img'),
                                'path' => $path . $randomName3,
                                'admin_id' => $u_rec_id,
                                'created_at' => $date);
                            $this->UploadModel->addImgUpload($img_archive);
                        }
                    }
                    if($this->input->post('link')!=null || $this->input->post('fb_link') != null || (isset($_FILES['video_file']) && !empty($_FILES['video_file']['name']))) {
                        $video = array(
                            'link' => $this->input->post('link'),
                            'fb_link' => $this->input->post('fb_link'),
                            'episode_id' => $id);
                        if (!$this->upload->do_upload('video_file')) {
                        } else {
                            $uploadedFileData = $this->upload->data();
                            $randomName = md5(time()) . $uploadedFileData['file_ext'];
                            //rename uploaded image to our new image name
                            rename($uploadedFileData['full_path'], $uploadedFileData['file_path'] . $randomName);
                            $uploadedFileData["file_name"] =  $randomName;
                            $video['local_video'] = $path . $randomName;

                        }
                        $this->EpisodeModel->updateVideo($id, $video);

                    }else{

                    }
                    $is_exist_video=$this->EpisodeModel->get_videoEpisode($id);
                    if (count($is_exist_video) == 0){
                        if($this->input->post('link')!=null || $this->input->post('fb_link') != null || (isset($_FILES['video_file']) && !empty($_FILES['video_file']['name']))) {
                            $video = array(
                                'link' => $this->input->post('link'),
                                'fb_link' => $this->input->post('fb_link'),
                                'episode_id' => $id);
                            if (!$this->upload->do_upload('video_file')) {
                            } else {
                                $uploadedFileData = $this->upload->data();
                                $randomName = md5(time()) . $uploadedFileData['file_ext'];
                                //rename uploaded image to our new image name
                                rename($uploadedFileData['full_path'], $uploadedFileData['file_path'] . $randomName);
                                $uploadedFileData["file_name"] =  $randomName;
                                $video['local_video'] = $path . $randomName;

                            }
                            $this->EpisodeModel->addVideo($video);

                        }else{

                        }
                    }
                    $is_updated=$this->EpisodeModel->updateEpisode($id, $episode);
                }
            }else {
                    $episode = array('name' => $this->input->post('episode_name'),
                        'info' => $this->input->post('txt'),
                        'program_id' => $this->input->post('course'),
                        'show_home' => $showhome,
                        'updated_by' => $u_rec_id,
                        'updated_at' => $date);
                if (isset($_FILES['episode_img']) && !empty($_FILES['episode_img']['name'])|| isset($_POST['img-archive'])) {

                    if (!$this->upload->do_upload('episode_img')) {
                        $episode['img']=$this->input->post('img-archive');
                    } else {
                        $uploadedFileData3 = $this->upload->data();
                        $randomName3 = md5(time()) . $uploadedFileData3['file_ext'];
                        //rename uploaded image to our new image name
                        rename($uploadedFileData3['full_path'], $uploadedFileData3['file_path'] . $randomName3);
                        $uploadedFileData3["file_name"] = $path . $randomName3;
                        $episode['img'] = $path . $randomName3;
                    }
                    if ($this->input->post('desc_img') != null ) {
                        $img_archive = array(
                            'name' => $this->input->post('desc_img'),
                            'path' => $path . $randomName3,
                            'admin_id' => $u_rec_id,
                            'created_at' => $date);
                        $this->UploadModel->addImgUpload($img_archive);
                    }
                }
                if($this->input->post('link')!=null || $this->input->post('fb_link') != null || (isset($_FILES['video_file']) && !empty($_FILES['video_file']['name']))) {
                    $video = array(
                        'link' => $this->input->post('link'),
                        'fb_link' => $this->input->post('fb_link'),
                        'episode_id' => $id);
                    if (!$this->upload->do_upload('video_file')) {
                    } else {
                        $uploadedFileData = $this->upload->data();
                        $randomName = md5(time()) . $uploadedFileData['file_ext'];
                        //rename uploaded image to our new image name
                        rename($uploadedFileData['full_path'], $uploadedFileData['file_path'] . $randomName);
                        $uploadedFileData["file_name"] =  $randomName;
                        $video['local_video'] = $path . $randomName;

                    }
                    $this->EpisodeModel->updateVideo($id, $video);

                }else{

                }
                $is_exist_video=$this->EpisodeModel->get_videoEpisode($id);
                if (count($is_exist_video) == 0){
                    if($this->input->post('link')!=null || $this->input->post('fb_link') != null || (isset($_FILES['video_file']) && !empty($_FILES['video_file']['name']))) {
                        $video = array(
                            'link' => $this->input->post('link'),
                            'fb_link' => $this->input->post('fb_link'),
                            'episode_id' => $id);
                        if (!$this->upload->do_upload('video_file')) {
                        } else {
                            $uploadedFileData = $this->upload->data();
                            $randomName = md5(time()) . $uploadedFileData['file_ext'];
                            //rename uploaded image to our new image name
                            rename($uploadedFileData['full_path'], $uploadedFileData['file_path'] . $randomName);
                            $uploadedFileData["file_name"] =  $randomName;
                            $video['local_video'] = $path . $randomName;

                        }
                        $this->EpisodeModel->addVideo($video);

                    }else{

                    }
                }
                $is_updated=$this->EpisodeModel->updateEpisode($id, $episode);

            }
            if($is_updated==false)
                $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
            else
                $this->session->set_flashdata('error','عذراً، فشلت العملية!');
            $episode = $this->EpisodeModel->get_episode_id($id);
            $data ['Episode'] = $episode;
            redirect("admin/course/$episode->program_id/episodes");

        } else {
            redirect('admin/login');
        }
    }

    public function deleteEpisode()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(6,$this->session->userdata('roles'))){
            $id = $this->input->post('episodeID');
            $episode = array(

                'is_deleted' => 1,
                'deleted_by' => $this->session->userdata('user_id')
            );
            $this->EpisodeModel->updateEpisode($id,$episode);
        } else {
            redirect('admin/login');
        }

    }
    public function orderEpisode()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(6,$this->session->userdata('roles'))){
            $current_id = $this->input->post('current_id');
            $current = $this->input->post('current');
            $prev = $this->input->post('prev');
            $next = $this->input->post('next');
            $id=0;
            if($current>$prev && $prev!=-1){
                for($i= $prev; $i<$current ; ){
                    $effected=$this->EpisodeModel->get_episode_order_id($id,$i);
                    if($effected!=null) {

                        $this->EpisodeModel->updateOrder($id, $i,++$i);
                        $id = $effected->id;

                    }
                }


                $this->EpisodeModel->updateOrder2($current_id,$prev);
            }
            else{
                for($i= $next; $i>$current ; $i--){
                    $effected=$this->EpisodeModel->get_episode_order_id($id,$i);
                    if($effected!=null) {

                        $this->EpisodeModel->updateOrder($id, $i, $i - 1);
                        $id = $effected->id;

                    }
                }
                $this->EpisodeModel->updateOrder2($current_id,$next);
            }
//            var_dump($idArray);
//
        } else {
            redirect('admin/login');
        }

    }

}
