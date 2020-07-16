<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('form', 'url'));
        $this->load->helper("thumb_helper");
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('helper1');
        $this->load->model('CourseModel');
        $this->load->model('EpisodeModel');
        $this->load->library('pagination');

    }

    public function course_table()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(5,$this->session->userdata('roles'))||in_array(6,$this->session->userdata('roles'))){
            $count = $this->db->count_all_results('programs');
            $total_rows = 20;
            $config = Array();
            if ($count > $total_rows) {
                $config['base_url'] = base_url() . 'admin/dtableCourse/page';
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
            $data['Course'] = $course=$this->CourseModel->get_course_panel(20, $data['page']);

            $data['title'] = "قائمة البرامج";
            $this->load->view('admin/partial/header',$data);
            $this->load->view('admin/partial/aside-menu');
            $this->load->view('admin/pages/dtableCourse');
            $this->load->view('admin/partial/footer');
        }else{
            redirect('admin/login');
        }

    }



    public function add_course()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(5,$this->session->userdata('roles'))){
            $data['title'] = "إضافة برنامج";
            $this->load->view('admin/partial/header', $data);
            $this->load->view('admin/partial/aside-menu');
            $this->load->view('admin/pages/addCourse');
            $this->load->view('admin/partial/footer');
        }else{
            redirect('admin/login');
        }
    }



    public function saveCourse(){
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(5,$this->session->userdata('roles'))){
            $path=path_img('imgCourses');
            date_default_timezone_set('Asia/Gaza');
            $date=date('Y-m-d H:i:s') ;
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'jpg|png|jpeg|';
//            $config['max_size'] = '50000';
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            if (isset($_FILES['course_img']) && !empty($_FILES['course_img']['name'])){

                if (!$this->upload->do_upload('course_img')) {
                    $this->session->set_flashdata('error','عذراً، فشلت العملية!');
                    redirect('admin/addCourse');
                } else {

                    $uploadedFileData = $this->upload->data();
                    $randomName = md5(time()) . $uploadedFileData['file_ext'];
                    //rename uploaded image to our new image name
                    rename($uploadedFileData['full_path'], $uploadedFileData['file_path'] . $randomName);

                    $uploadedFileData["file_name"] = $path.$randomName;
//                            $uploadedFileData["file_name"] = $_FILES['imghome']['name'];
                    $u_rec_id = $this->session->userdata('user_id');
                    $hide_home = $this->input->post('hide_home');
                    if ($hide_home == null)
                        $hide_home = 0;
                    $important = $this->input->post('important');
                    if ($important == null)
                        $important = 0;
                    $course = array('name' => $this->input->post('course_name'),
                        'img' => $path.$randomName,
                        'presenter_program' => $this->input->post('presenter_program'),
                        'description' => $this->input->post('description'),
                        'target_group' => $this->input->post('target_group'),
                        'important' => $important,
                        'presenter_img' => $this->input->post('presenter_img'),
                        'activated' => $hide_home,
                        'user_id' => $u_rec_id,
                        'created_at' => $date);
                    if (isset($_FILES['presenter_img']) && !empty($_FILES['presenter_img']['name'])) {

                        if (!$this->upload->do_upload('presenter_img')) {

                        } else {

                            $uploadedFileData2 = $this->upload->data();
                            $randomName2 = md5(time()) . $uploadedFileData2['file_ext'];
                            rename($uploadedFileData2['full_path'], $uploadedFileData2['file_path'] . $randomName2);
                            $uploadedFileData2["file_name"] = $randomName2;
                            $course['presenter_img'] = $path . $randomName2;
                        }
                    }
                    $insert_id=$this->CourseModel->addCourse($course);
                    for ($i = 1; $i < 100; $i++) {
                    if ($this->input->post("live_time$i")!=null){
                            $live = array(
                                'time' => $this->input->post("live_time$i"),
                                'day_id' => $this->input->post("day$i"),
                                'type' => $this->input->post("live_type$i"),
                                'program_id' => $insert_id
                            );
                            $this->CourseModel->addLive($live);
                        }
                    }

                    if($insert_id==true)
                        $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
                    else
                        $this->session->set_flashdata('error','عذراً، فشلت العملية!');
                    redirect('admin/addCourse');
                }}
        }else{
            redirect('admin/login');
        }





    }


    public function updateCourse()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(5,$this->session->userdata('roles'))){
            $id=$this->uri->segment(3);
            $course = $this->CourseModel->get_course_id($id);
            $data ['Course'] = $course;
            if($course != null){
                $data['title'] = "تعديل برنامج";
                $program_live= $this->CourseModel->get_live_where_course_panel();
                $data ['ProgramLive']=$program_live;
                $day= $this->CourseModel->get_days();
                $data ['Days']=$day;
            }
            else{
                $data['title'] = " الصفحة غير موجودة ";
                $data['Description'] = '';
                $data['image'] =" ";
            }
            $this->load->view('admin/partial/header',$data);
            $this->load->view('admin/partial/aside-menu');
            if($course != null)
                $this->load->view('admin/pages/updateCourse');
        else
            $this->load->view('admin/pages/err404');
            $this->load->view('admin/partial/footer');
        }else{
            redirect('admin/login');
        }

    }

    public function saveUpdateCourse(){

        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(5,$this->session->userdata('roles'))){
            $path=path_img('imgCourses');
            date_default_timezone_set('Asia/Gaza');
            $date=date('Y-m-d H:i:s') ;
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'jpg|png|jpeg|';
//            $config['max_size'] = '50000';
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $u_rec_id = $this->session->userdata('user_id');
            $hide_home = $this->input->post('hide_home');
            if ($hide_home == null)
                $hide_home = 0;
            $important = $this->input->post('important');
            if ($important == null)
                $important = 0;
            $id = $this->uri->segment(3);
            $course = array('name' => $this->input->post('course_name'),
                'presenter_program' => $this->input->post('presenter_program'),
                'description' => $this->input->post('description'),
                'target_group' => $this->input->post('target_group'),
                'important' => $important,
                'activated' => $hide_home,
                'updated_at' => $date,
                'updated_by' => $u_rec_id);
            if (isset($_FILES['course_img']) && !empty($_FILES['course_img']['name'])) {

                if (!$this->upload->do_upload('course_img')) {
                    $this->session->set_flashdata('error','عذراً، فشلت العملية!');
                    redirect('admin/dtableCourse');
                } else {

                    $uploadedFileData = $this->upload->data();
                    $randomName = md5(time()) . $uploadedFileData['file_ext'];
                    rename($uploadedFileData['full_path'], $uploadedFileData['file_path'] . $randomName);
                    $uploadedFileData["file_name"] = $randomName;
                    $course['img'] = $path . $randomName;
                }
            }
            if (isset($_FILES['presenter_img']) && !empty($_FILES['presenter_img']['name'])) {

                if (!$this->upload->do_upload('presenter_img')) {

                } else {

                    $uploadedFileData2 = $this->upload->data();
                    $randomName2 = md5(time()) . $uploadedFileData2['file_ext'];
                    rename($uploadedFileData2['full_path'], $uploadedFileData2['file_path'] . $randomName2);
                    $uploadedFileData2["file_name"] = $randomName2;
                    $course['presenter_img'] = $path . $randomName2;
                }
            }
            $is_updated=$this->CourseModel->updateCourse($id,$course);

                $this->CourseModel->deleteLive($id);
            for ($i = 1; $i < 100; $i++) {
                if ($this->input->post("live_time$i")!=null){
                    $live = array(
                        'time' => $this->input->post("live_time$i"),
                        'day_id' => $this->input->post("day$i"),
                        'type' => $this->input->post("live_type$i"),
                        'program_id' => $id
                    );
                    $this->CourseModel->addLive($live);
                }
            }
            if($is_updated==false)
                $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
            else
                $this->session->set_flashdata('error','عذراً، فشلت العملية!');
            redirect('admin/dtableCourse');

        }
        else{
            redirect('admin/login');
        }
    }

    public function deleteCourse() {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(5,$this->session->userdata('roles'))){
            $id = $this->input->post('courseID');
            $course = array(

                'is_deleted' => 1,
                'deleted_by' => $this->session->userdata('user_id')
            );
            $this->CourseModel->updateCourse($id,$course);
        }else{
            redirect('admin/login');
        }

    }



}
