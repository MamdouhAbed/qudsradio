<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cookie_Test extends CI_Controller {
    
        public function __construct() {
        parent:: __construct();
        $this->load->helper(array('cookie', 'url'));
        $this->load->database();
        $this->load->model('BreakNewsModel');



    }

    public function index()
    {
        date_default_timezone_set("Asia/Gaza");
        $response=Array();
//    get break news
        $break_news= $this->BreakNewsModel->get_breaknews();
        if(count($break_news)>0){
            //$break_new=$break_news[0];
            $arr=Array();
            foreach ($break_news as $break_new) {

                $now = date('Y-m-d H:i:s');
                $break_time = date($break_new->created_at);
                $diff = strtotime($now) - strtotime($break_time);


                set_cookie('break_id', $break_new->id, '' . (600 - $diff) . '');
                set_cookie('break_text', $break_new->text, '' . (600 - $diff) . '');
                // $response['break_text'] = $break_new->text;

                if ($diff < 600) {
                    $break_new->status=1;
                    $arr[]=$break_new;

                    //  $response['status']=1;
                } else {
                    //  $response['status']=0;
                }
            }
            $response['data']=$arr;
        }else{
            $response['data']='';
            //    $response['status']=0;

        }

        echo json_encode($response);

    }


// old
//     public function __construct() {
//         parent:: __construct();
//         $this->load->helper(array('cookie', 'url'));
//         $this->load->database();
//         $this->load->model('BreakNewsModel');



//     }

//     public function index()
//     {
//         date_default_timezone_set("Asia/Gaza");
//         $response=Array();
// //    get break news
//         $break_news= $this->BreakNewsModel->get_breaknews();
//         if(count($break_news)>0){
//              $break_new=$break_news[0];


//             $now=date('Y-m-d H:i:s');
//             $break_time=date($break_new->created_at);
//             $diff = strtotime($now)-strtotime($break_time)  ;
//           // echo $diff;

//             set_cookie('break_id',$break_new->id,''.(400-$diff).'');
//             set_cookie('break_text',$break_new->text,''.(400-$diff).'');
//             $response['break_text']=$break_new->text;
//             //$id=get_cookie('break_id');
//           //  if($id!=$break_new->id){
//             if($diff<400){
//                  //echo $diff;

//                 $response['status']=1;
//             }else{
//                 $response['status']=0;
//             }
//           /*}else{
//                 $response['status']=0;
//             }
// */
//         }else{
//             $response['break_text']='';
//             $response['status']=0;

//         }

//         echo json_encode($response);

//     }
}
