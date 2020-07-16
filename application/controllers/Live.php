<?php
class Live extends CI_Controller
{

    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('form', 'url'));
        $this->load->helper("thumb_helper");
        $this->load->helper('helper1');
        $this->load->database();
        $this->load->model('NewsModel');
        $this->load->model('BreakNewsModel');
        $this->load->model('CategoryModel');
        $this->load->library('session');
    }

    public function index()
    {
        //        get news ticker
        $news_ticker = $this->NewsModel->get_news_ticker();
        $data ['News_ticker']=$news_ticker;

        $category= $this->CategoryModel->get_category(20,0);
        $data ['Categorysearch'] = $category;

        //        get break news
        $break_news= $this->BreakNewsModel->get_breaknews();
        $data ['BreakNews']=$break_news;

        $data['title'] = "البث المباشر";
        $data['Description'] ="قناة القدس اليوم - البث المباشر";
        $data['image'] =" ";

        $this->load->view('partials/header',$data);
        $this->load->view('pages/live', $data);
        $this->load->view('partials/footer', $data);

    }
}