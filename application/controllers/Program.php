<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('form', 'url'));
        $this->load->helper("thumb_helper");
        $this->load->helper('helper1');
        $this->load->database();
        $this->load->library('pagination');
        $this->load->model('CourseModel');
        $this->load->model('EpisodeModel');
        $this->load->model('CategoryModel');

    }

    public function index()
    {
        $count = $this->CourseModel->get_course_where_active_count();
        $total_rows = 12;
        $config = Array();
        if ($count > $total_rows) {
            $config['base_url'] = base_url() . 'programs/page';
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
            $config['total_rows'] = $count / 12;
            $config['uri_segment'] = 3;

        }

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) * 12 : 0;
        $data['Programs'] = $programs=$this->CourseModel->get_course_where_active(12, $data['page']);

        $category= $this->CategoryModel->get_category(20,0);
        $data ['Categorysearch'] = $category;

        $data['title'] = "البرامج";
        $data['Description'] = ' صوت القدس ';

        $this->load->view('partials/header',$data);
        $this->load->view('partials/aside-menu',$data);
        $this->load->view('pages/programs' , $data);
        $this->load->view('partials/footer' , $data);

    }
    public function programArchive()
    {
        $count = $this->db->count_all_results('programs');
        $total_rows = 12;
        $config = Array();
        if ($count > $total_rows) {
            $config['base_url'] = base_url() . 'programs_archive/page';
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
            $config['total_rows'] = $count / 12;
            $config['uri_segment'] = 3;

        }

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) * 12 : 0;
        $data['Programsall'] = $programs2=$this->CourseModel->get_course_panel(12, $data['page']);

        $category= $this->CategoryModel->get_category(20,0);
        $data ['Categorysearch'] = $category;


        $data['title'] = "البرامج";
        $data['Description'] = ' صوت القدس ';

        $this->load->view('partials/header',$data);
        $this->load->view('partials/aside-menu',$data);
        $this->load->view('pages/programs_archive' , $data);
        $this->load->view('partials/footer' , $data);
    }
    public function programName()
    {
        $programs= $this->CourseModel->get_course_where_id();
        $data ['Program']=$programs;
        if($programs!=null){
            $count = $this->EpisodeModel->get_episode_where_course_count_site();
            $total_rows = 12;
            $config= Array();
            if ( $count > $total_rows ) {
                $config['base_url'] = base_url() . 'program/' .$this->uri->segment(2).'/page';
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
                $config['total_rows'] = $count / 12;
                $config['uri_segment'] = 4;

            }

            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
            $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4)*12 : 0;
            $data['ProgramEpsd'] = $this->EpisodeModel->get_episode_where_course(12,$data['page']);

            $program_live= $this->CourseModel->get_live_where_course(1);
            $data ['ProgramLive']=$program_live;

            $program_live= $this->CourseModel->get_live_where_course(2);
            $data ['ProgramLive1']=$program_live;

            $program_live= $this->CourseModel->get_live_where_course(3);
            $data ['ProgramLive2']=$program_live;

            $program_live= $this->CourseModel->get_live_where_course(4);
            $data ['ProgramLive3']=$program_live;

            $program_live= $this->CourseModel->get_live_where_course(5);
            $data ['ProgramLive4']=$program_live;

            $type_live= $this->CourseModel->get_type_where_course();
            $data ['TypeLive']=$type_live;


            $category= $this->CategoryModel->get_category(20,0);
            $data ['Categorysearch'] = $category;


            $data['title'] = "إذاعة القدس - " . $programs->name;
            $data['Description'] = " ";
            $data['image'] = " ";

        }else{
            $data['title'] = "الصفحة غير موجودة" ;
            $data['Description'] = " ";
            $data['image'] = " ";
        }



        $this->load->view('partials/header' , $data);
        $this->load->view('partials/aside-menu',$data);
        if($programs!=null)
            $this->load->view('pages/program' , $data);
        else
            $this->load->view('pages/err404' );
        $this->load->view('partials/footer' , $data);


    }
    public function episode()
    {

        $programs= $this->EpisodeModel->get_episode_id_r();
        $data ['Program']=$programs;

        $episode= $this->EpisodeModel->get_episode_details();
        $data ['Episode']=$episode;

        $category= $this->CategoryModel->get_category(20,0);
        $data ['Categorysearch'] = $category;


        if ($episode != null) {
            //        get episode video
            $episode_video = $this->EpisodeModel->get_episode_video();
            $data ['Episode_video']=$episode_video;

            $data['title'] = "إذاعة القدس - " . $episode->name;
            $data['Description'] = " ";
            $data['image'] = " ";
        }else{
            $data['title'] = "الصفحة غير موجودة" ;
            $data['Description'] = " ";
            $data['image'] = " ";
        }


        $this->load->view('partials/header' , $data);
        $this->load->view('partials/aside-menu',$data);
        if($episode!=null)
            $this->load->view('pages/episode' , $data);
        else
            $this->load->view('pages/err404' );
        $this->load->view('partials/footer' , $data);


    }


}
