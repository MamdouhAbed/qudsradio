<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {


    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('form', 'url'));
        $this->load->helper("thumb_helper");
        $this->load->helper('helper1');
        $this->load->database();
        $this->load->library('session');
        $this->load->model('NewsModel');
        $this->load->model('BreakNewsModel');
        $this->load->model('SearchModel');


    }

    public function index()
    {

        $keyword =$this->input->get('keyword');
        $data['Keyword']    = $keyword;
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3)*18 : 0;
        $data['r_news'] = $this->SearchModel->searchnews($keyword, 18, $data['page']);
        $data['r_programs'] = $this->SearchModel->searchprogram($keyword,18,$data['page']);
        $data['r_episodes'] = $this->SearchModel->searchepisode($keyword,18,$data['page']);
        $data['r_videos'] = $this->SearchModel->searchvideos($keyword,18,$data['page']);
        $data['r_letters'] = $this->SearchModel->searchletters($keyword,18,$data['page']);

        //        get break news
        $break_news= $this->BreakNewsModel->get_breaknews();
        $data ['BreakNews']=$break_news;

        $data['title'] = "إذاعة صوت القدس - نتائج البحث";
        $data['Description'] = "";
        $data['image'] ="";


        $this->load->view('partials/header',$data);
        $this->load->view('partials/aside-menu',$data);
        $this->load->view('pages/search', $data);
        $this->load->view('partials/footer', $data);

    }
    public function s_program()
    {
        $keyword =$this->input->get('keyword');
        $data['Keyword']    = $keyword;
        $count = $this->SearchModel->count_programs($keyword)[0]->count;
        $total_rows = 20;
        $config= Array();
        if ( $count > $total_rows ) {
            $config['base_url'] = base_url() . 'admin/search/page';
//            $config['first_url'] = '1';
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
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4)*20 : 0;
        $data['Result'] = $this->SearchModel->searchprogram($keyword,20,$data['page']);



        $data['title'] = "البرامج - نتائج البحث";
        $data['Description'] = "";
        $data['image'] ="";

        $this->load->view('admin/partial/header',$data);
        $this->load->view('admin/partial/aside-menu',$data);
        $this->load->view('admin/pages/searchProgram', $data);
        $this->load->view('admin/partial/footer', $data);
    }
}
