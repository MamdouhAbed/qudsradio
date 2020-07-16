<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_Details extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('form', 'url'));
        $this->load->helper("thumb_helper");
        $this->load->database();
        $this->load->helper('helper1');
        $id=$this->uri->segment(2);
        $this->load->model('NewsModel');
        $this->load->model('BreakNewsModel');
        $this->load->model('CategoryModel');

    }

    public function index()
    {
//        get news where id
        $post = $this->NewsModel->get_post_details();
        $data ['Post']=$post;

        //        get news img
        $post_img = $this->NewsModel->get_post_img();
        $data ['Post_img']=$post_img;

//        get news video
        $post_video = $this->NewsModel->get_post_video();
        $data ['Post_video']=$post_video;

//        get category
        $this->load->model('CategoryModel');
        if($post != null) {
            $data ['Category'] = $this->CategoryModel->get_categoryById($post->category_id);
        }
////////////////////////////////////////////////////////////////////////////
        $category= $this->CategoryModel->get_category(20,0);
        $data ['Categorysearch'] = $category;


        //        get news tags
        $tags = $this->NewsModel->get_news_tags();
        $data ['Tags']=$tags;

            if($post != null) {
                $data['title'] = $post->title;
                $data['Description'] = $post->post_brief;
                $data['image'] = base_url() . $post->img;

            }else{
                $data['title'] = " الصفحة غير موجودة ";
                $data['Description'] = '';
                $data['image'] =" ";
            }

        $this->load->view('partials/header',$data);
        $this->load->view('partials/aside-menu',$data);
        if($post!=null)
        $this->load->view('pages/post' , $data);
        else
            $this->load->view('pages/err404');
        $this->load->view('partials/footer' , $data);

    }

}
