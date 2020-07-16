<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->helper(array('form', 'url'));
        $this->load->helper("thumb_helper");
        $this->load->helper('helper1');
        $this->load->database();
        $this->load->model('NewsModel');
        $this->load->model('BreakNewsModel');
        $this->load->model('CategoryModel');
        $this->load->model('VideoModel');
        $this->load->model('AboutUsModel');
        $this->load->model('AdvertModel');
        $this->load->model('CourseModel');
        $this->load->model('LetterModel');
        $this->load->model('EpisodeModel');

    }


    public function index()
    {
        $about = $this->AboutUsModel->get_Details();
        $data ['About'] = $about;

//        if($about->home_style!=2) {
//            $arr=$this->NewsModel->get_slider_news_id(5);
//
//            $arrvalue=Array(0);
//            foreach($arr as $obj){
//                array_push($arrvalue,$obj->id);
//            }
//        }else{
//            $arr=$this->NewsModel->get_slider_news_id(2);
//
//            $arrvalue=Array(0);
//            foreach($arr as $obj){
//                array_push($arrvalue,$obj->id);
//            }
//        }
        //       get more news
        $more_news = $this->NewsModel->more_news_limit12();
        $data ['More_News'] = $more_news;

        //        get video
        $video= $this->VideoModel->get_video_activated(8,0);
        $data ['Video']=$video;

        $programs=$this->CourseModel->get_course_where_active(8,0);
        $data ['Programs']=$programs;

        $important=$this->CourseModel->get_course_where_important(8,0);
        $data ['Important']=$important;

        $episodes=$this->EpisodeModel->get_episode_home(6);
        $data ['Episodes']=$episodes;

        $letters=$this->LetterModel->getLetters_today(4,0);
        $data ['Letters']=$letters;

        $category= $this->CategoryModel->get_category(20,0);
        $data ['Categorysearch'] = $category;

        $banner1= $this->AdvertModel->get_Banner_place1();
        $data ['Banner_place1']=$banner1;

        //        get banner 2
        $banner2= $this->AdvertModel->get_Banner_place2();
        $data ['Banner_place2']=$banner2;
        //        get banner 2
        $banner3= $this->AdvertModel->get_Banner_place3();
        $data ['Banner_place3']=$banner3;

        $data['title'] = "إذاعة صوت القدس";
        $data['Description'] = ' صوت القدس ';

        $this->load->view('partials/header',$data);
        $this->load->view('partials/aside-menu',$data);
        $this->load->view('index' , $data);
        $this->load->view('partials/footer' , $data);

    }
    public function load_more_news()
    {
        $arr=$this->NewsModel->get_slider_news_id(2);

        $arrvalue=Array(0);
        foreach($arr as $obj){
            array_push($arrvalue,$obj->id);
        }
        $offset= $this->input->get('offset');
        $txt= $this->input->get('txt');
        $all_news= $this->NewsModel->get_all_news2($offset,$txt,$arrvalue);

        echo json_encode($all_news);
    }
}









///////////////////////////////////////////////////////////////////////////////////


