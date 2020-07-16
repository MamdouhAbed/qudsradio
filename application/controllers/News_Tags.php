<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_Tags extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('NewsModel');
        $this->load->helper("thumb_helper");
        $this->load->helper('helper1');
        $this->load->model('BreakNewsModel');
        $this->load->model('CategoryModel');
        $this->load->library('pagination');


    }


    public function index()
    {

        $count = $this->NewsModel->get_count_news_by_tags()[0]->count;
        $total_rows = 18;
        $config= Array();
        if ( $count > $total_rows ) {
            $config['base_url'] = base_url() . 'post_tags/'.$this->uri->segment(2).'/page';
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
        $news= $this->NewsModel->get_news_by_tags(20,$data['page']);
        $data['News_Tags'] =$news;


//        get break news
        $break_news= $this->BreakNewsModel->get_breaknews();
        $data ['BreakNews']=$break_news;

//        get tag name
        $tag_name= $this->NewsModel->get_tag_name();
        $data ['Tag_name']=$tag_name;

        $category= $this->CategoryModel->get_category(20,0);
        $data ['Categorysearch'] = $category;

//        get categories
        $tags= $this->NewsModel->get_tags();
        $data ['TAGS']=$tags;

        if(count($tag_name)>0){
        $data['title'] = "#" .$tag_name[0]->name;
        $data['Description'] = "";
        $data['image'] ="";
}else{
            $data['title'] = "الصفحة غير موجودة";
            $data['Description'] = "";
            $data['image'] ="";
        }

        $this->load->view('partials/header' , $data);
        $this->load->view('partials/aside-menu',$data);
        if(count($tag_name)>0) {
            $this->load->view('pages/news_tags', $data);
        }else{
            $this->load->view('pages/err404');
        }
        $this->load->view('partials/footer' , $data);


    }
}
