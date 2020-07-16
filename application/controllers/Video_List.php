<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_List extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('form', 'url'));
        $this->load->helper("thumb_helper");
        $this->load->helper('helper1');
        $this->load->database();
        $this->load->model('NewsModel');
        $this->load->model('BreakNewsModel');
        $this->load->model('VideoModel');
        $this->load->model('CategoryModel');
        $this->load->library('pagination');

    }

    public function index()
    {
        $count = $this->db->count_all_results('videos');
        $total_rows = 12;
        $config= Array();
        if ( $count > $total_rows ) {
            $config['base_url'] = base_url() . 'videos/page';
//          $config['first_url'] = '1';
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
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3)*12 : 0;
        $data['Video'] = $this->VideoModel->get_video_activated(12,$data['page']);
        $count_video= $this->VideoModel->get_video_where_count();
        $data ['Count_Video']=$count_video;

        $category= $this->CategoryModel->get_category(20,0);
        $data ['Categorysearch'] = $category;

        $data['title'] = "قائمة الفيديو";
        $data['Description'] = ' صوت القدس ';

        $this->load->view('partials/header',$data);
        $this->load->view('partials/aside-menu',$data);
        $this->load->view('pages/video_playlist' , $data);
        $this->load->view('partials/footer' , $data);

    }

}
