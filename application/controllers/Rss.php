<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rss extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('form', 'url'));
        $this->load->helper("thumb_helper");
        $this->load->helper('helper1');
        $this->load->model('NewsModel');
    }

    public function index()
    {

        //        get news where id
        $post = $this->NewsModel->get_all_news_rss();
        $data ['Post']=$post;

        $this->load->view('pages/rss',$data);

    }

}
