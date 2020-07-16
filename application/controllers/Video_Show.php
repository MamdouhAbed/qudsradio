<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_Show extends CI_Controller {

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

    }

    public function index()
    {

        $video= $this->VideoModel->get_video_details();
        $data ['Video']=$video;

        $category= $this->CategoryModel->get_category(20,0);
        $data ['Categorysearch'] = $category;

        if ($video != null) {
            //        get more video
            $more_video = $this->VideoModel->get_more_video();
            $data ['More_Video'] = $more_video;
        }
//       get video count
        $count_video= $this->VideoModel->get_video_where_count();
        $data ['Count_Video']=$count_video;

        if ($video != null) {
            $data['title'] = $video->title;
            $data['Description'] = $video->title;
            $data['image'] = $video->imghome;
        }
        else{
            $data['title'] = "الصفحة غير موجودة";
            $data['Description'] = "";
            $data['image'] = "";
        }


        $this->load->view('partials/header',$data);
        $this->load->view('partials/aside-menu',$data);
        if ($video != null) {
            $this->load->view('pages/video_details' , $data);
        }else{
            $this->load->view('pages/err404');
        }
        $this->load->view('partials/footer' , $data);

    }

}
