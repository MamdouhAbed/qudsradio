<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->library('session');
        $this->load->model('AuthorModel');
        $this->load->helper('helper1');
        $this->load->model('news_Model');
        $this->load->model('NewsModel');
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('deptNewsModel');
        $this->load->model('UploadModel');

    }


    public function news_table()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(4,$this->session->userdata('roles'))
            ||in_array(11,$this->session->userdata('roles'))||in_array(12,$this->session->userdata('roles'))){
        $data['title'] = "قائمة الأخبار";
            $subdept = $this->deptNewsModel->get_subDept();
            $data ['SubDept'] = $subdept;
        $this->load->view('admin/partial/header',$data);
        $this->load->view('admin/partial/aside-menu');
        $this->load->view('admin/pages/dtableNews');
        $this->load->view('admin/partial/footer');
    }else{
redirect('admin/login');
}

    }
    
        function news_table_ajax(){
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        function ArabicDate($date1) {

            $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
            $your_date = date('y-m-d h:i  a',strtotime($date1)); // The Current Date

            $en_month = date("M", strtotime($your_date));
            foreach ($months as $en => $ar) {
                if ($en == $en_month) { $ar_month = $ar; }
            }

            $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
            $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
            $ar_day_format = date('D',strtotime($your_date)); // The Current Day
            $ar_day = str_replace($find, $replace, $ar_day_format);

            $find1 = array ("am", "pm");
            $replace1 = array ("ص", "م");
            $ar_day_format1 = date('a',strtotime($date1)); // The Current Day
            $ar_day1 = str_replace($find1, $replace1, $ar_day_format1);

            header('Content-Type: text/html; charset=utf-8');
            $standard = array("0","1","2","3","4","5","6","7","8","9");
            $eastern_arabic_symbols = array("0","1","2","3","4","5","6","7","8","9");
            $current_date = date('h:i ',strtotime($your_date)) . $ar_day1 .' - ' .$ar_day.' '.date('d',strtotime($your_date)).' / '.$ar_month.' / '.date('Y',strtotime($your_date));
            $data = str_replace($standard , $eastern_arabic_symbols , $current_date);

            return $data;
        }
        $news= $this->news_Model->get_news();

        $data = array();
         foreach($news->result() as $r) {
            if(in_array(1,$this->session->userdata('roles'))) {
            $data[] = array(
                $r->id,
                $r->title,
                $r->cat_name,
                $r->view_count,
                $r->name,
                $r->updated,
                ArabicDate($r->created_at),
                '<a class="facebook" href="http://www.facebook.com/share.php?v=4&amp;u='.base_url().'post/'.$r->id.'&t='. $r->title.'" onclick="window.open(this.href,\'sharer\', \'toolbar=0,status=0,width=626,height=436\'); return false;" rel="nofollow" target="_blank" title="مشاركة عبر الفيسبوك"><i style="font-size: 12px; width: 20px;height: 25px; line-height: 25px; background: #3a579a; color: #fff;text-align:center;" class="fa fa-facebook"></i></a>
                <a href=\'http://twitter.com/home?status='.$r->title. base_url().'post/'.$r->id.'\' onclick="window.open(this.href,\'sharer\', \'toolbar=0,status=0,width=626,height=436\'); return false;" rel=\'nofollow\' target=\'_blank\' title="مشاركة عبر تويتر" class="social-icon"> <i style="font-size: 12px; width: 20px;height: 25px; line-height: 25px; background: #00abf0; color: #fff; text-align:center;" class="fa fa-twitter"></i></a>
                <a href="https://plus.google.com/share?url='.base_url().'post/'.$r->id.'" rel=\'nofollow\' target=\'_blank\' onclick="window.open(this.href,\'sharer\', \'toolbar=0,status=0,width=626,height=436\'); return false;" class="social-icon" title="مشاركة عبر جوحل بلس"> <i style="font-size: 12px; width: 20px;height: 25px; line-height: 25px; background: #df4a32; color: #fff; text-align:center;" class="fa fa-google-plus"></i></a>
               ',
                '<a  href="'.base_url().'admin/updateNews/'.$r->id.'"><i class="fa fa-pencil info" title="Edit" style="font-size: 20px;"></i></a>
                                        <a class="btndelete"><i class="fa fa-trash danger" title="Delete" style="font-size: 20px; margin-right: 10px;"></i></a>
                               '
            );
            }else{
                $data[] = array(
                    $r->id,
                    $r->title,
                    $r->cat_name,
                    $r->view_count,
                    $r->name,
                    ArabicDate($r->created_at),
                    '<a class="facebook" href="http://www.facebook.com/share.php?v=4&amp;u='.base_url().'post/'.$r->id.'&t='. $r->title.'" onclick="window.open(this.href,\'sharer\', \'toolbar=0,status=0,width=626,height=436\'); return false;" rel="nofollow" target="_blank" title="مشاركة عبر الفيسبوك"><i style="font-size: 15px; width: 25px;height: 25px; line-height: 25px; background: #3a579a; color: #fff;text-align:center;" class="fa fa-facebook"></i></a>
                <a href=\'http://twitter.com/home?status='.$r->title. base_url().'post/'.$r->id.'\' onclick="window.open(this.href,\'sharer\', \'toolbar=0,status=0,width=626,height=436\'); return false;" rel=\'nofollow\' target=\'_blank\' title="مشاركة عبر تويتر" class="social-icon"> <i style="font-size: 15px; width: 25px;height: 25px; line-height: 25px; background: #00abf0; color: #fff; text-align:center;" class="fa fa-twitter"></i></a>
                <a href="https://plus.google.com/share?url='.base_url().'post/'.$r->id.'" rel=\'nofollow\' target=\'_blank\' onclick="window.open(this.href,\'sharer\', \'toolbar=0,status=0,width=626,height=436\'); return false;" class="social-icon" title="مشاركة عبر جوحل بلس"> <i style="font-size: 15px; width: 25px;height: 25px; line-height: 25px; background: #df4a32; color: #fff; text-align:center;" class="fa fa-google-plus"></i></a>
               ',
                    '<a  href="'.base_url().'admin/updateNews/'.$r->id.'"><i class="fa fa-pencil info" title="Edit" style="font-size: 20px;"></i></a>
                                        <a class="btndelete"><i class="fa fa-trash danger" title="Delete" style="font-size: 20px; margin-right: 10px;"></i></a>
                               '
                );
            }
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $news->num_rows(),
            "recordsFiltered" => $news->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }



    public function add_news()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(4,$this->session->userdata('roles'))
            ||in_array(11,$this->session->userdata('roles'))||in_array(12,$this->session->userdata('roles'))){
            $data['title'] = "إضافة خبر";
            $tags= $this->NewsModel->get_tags_add_news();
            $data ['TAGS']=$tags;
            $subdept = $this->deptNewsModel->get_subDept();
            $data ['SubDept'] = $subdept;
            $authors = $this->AuthorModel->get_authors();
            $data ['Authors'] = $authors;
            $this->load->view('admin/partial/header', $data);
            $this->load->view('admin/partial/aside-menu');
            $this->load->view('admin/pages/addNews');
            $this->load->view('admin/partial/footer');
        }else{
            redirect('admin/login');
        }
    }
    
    
    
     public function archive2()
    {
        $offset= $this->input->get('offset');
        $txt= $this->input->get('txt');
        $all_news= $this->NewsModel->get_all_news($offset,$txt);

        echo json_encode($all_news);
    }



    public function saveNews(){
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(4,$this->session->userdata('roles'))
            ||in_array(11,$this->session->userdata('roles'))||in_array(12,$this->session->userdata('roles'))){
           date_default_timezone_set('Asia/Gaza');
           $date=date('Y-m-d H:i:s');
        $path = path_img('imgnews');
        $config['upload_path'] = $path;
        $config['allowed_types'] = '*';
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        $this->load->library('session');
        if($this->input->post('category') == 15){
            $newshome = $this->input->post('newshome');
            if ($newshome == null)
                $newshome = 2;
            $news_ticker_id = $this->input->post('ticker');
            if ($news_ticker_id == null)
                $news_ticker_id = 2;
            $pinhome = $this->input->post('pinhome');
                if ($pinhome == null)
                    $pinhome = 0;
            $special = $this->input->post('special');
            if ($special == null)
                $special = 0;
                $more_news = $this->input->post('more_news');
                if ($more_news == null)
                    $more_news = 0;
            //  var_dump($newshome." ".$news_ticker_id);
            $u_rec_id = $this->session->userdata('user_id');

            $authors = $this->AuthorModel->get_author_id($this->input->post('author'));

            $new = array('title' => $this->input->post('title'),
                'caption'=>$this->input->post('caption'),
                'category_id' => $this->input->post('category'),
                'post_brief' => $this->input->post('comments'),
                'author_id' => $this->input->post('author'),
                'post_text' => $this->input->post('txt'),
                'img' => $authors[0]->img,
                'user_id' => $u_rec_id,
                'news_ticker_id' => $news_ticker_id,
                'show_home_id' => $newshome,
                'pin_home' => $pinhome,
                'created_at' => $date,
                'updated_at' => $date,
                'more_news' => $more_news);
            if (isset($_FILES['sound_news']) && !empty($_FILES['sound_news']['name'])) {

                if (!$this->upload->do_upload('sound_news')) {
                } else {
                    $uploadedFileData4 = $this->upload->data();
                    //generate random image name
                    $randomName4 = md5(time()) . $uploadedFileData4['file_ext'];
                    //rename uploaded image to our new image name
                    rename($uploadedFileData4['full_path'], $uploadedFileData4['file_path'] . $randomName4);

                    $uploadedFileData4["file_name"] = $randomName4;
                    $new['sound'] = $path. $randomName4;

                }
            }
            $insert_id = $this->news_Model->addNews($new);
            if($insert_id==true)
                $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
            else
                $this->session->set_flashdata('error','عذراً، فشلت العملية!');
            $arr=$this->input->post('tags');
            if($arr!=null) {
                foreach ($arr as $ar) {
                    $is_exist = $this->news_Model->is_tagExist($ar);
                    if (count($is_exist) > 0)
                        $tag = Array('news_id' => $insert_id,
                            'tag_id' => $ar);
                    else {
                        $data = Array('name' => $ar);
                        $tag_id = $this->news_Model->addnewTags($data);
                        $tag = Array('news_id' => $insert_id,
                            'tag_id' => $tag_id);
                    }
                    $this->news_Model->addTags($tag);
                }
            }
            redirect('admin/addNews');
        }else if(!isset($_FILES['userfile']) && !isset($_POST['img-archive'])){

            redirect('admin/addNews');
        }
            else
        if ((isset($_FILES['userfile']) && !empty($_FILES['userfile']['name']))|| isset($_POST['img-archive'])) {
            $img="";
            if (!$this->upload->do_upload("userfile")) {
                    $img=$this->input->post('img-archive');
            } else {

                $uploadedFileData = $this->upload->data();
                //generate random image name
                $randomName = md5(time()) . $uploadedFileData['file_ext'];
                //rename uploaded image to our new image name
                rename($uploadedFileData['full_path'], $uploadedFileData['file_path'] . $randomName);

                $uploadedFileData["file_name"] = $randomName;
                    $img=$path. $randomName;
                    $this->load->library('image_lib');
                $water_img = $this->input->post('water_img');
                if ($water_img == 1) {
                    $config['source_image'] = $img;
                    $config['image_library'] = 'gd2';
                    $config['wm_type'] = 'overlay';
                    $config['wm_overlay_path'] = './uploads/logo.png';
                    //the overlay image
                    $config['wm_opacity'] = 50;
                    $config['wm_vrt_alignment'] = 'middle';
                    $config['wm_hor_alignment'] = 'center';
                    $config['quality'] = '70%';
                    $this->image_lib->initialize($config);
                    if (!$this->image_lib->watermark()) {
                        echo $this->image_lib->display_errors();
                    } else {
                     //   echo 'Successfully updated image with watermark';
                    }
                }else{

                }
            }

                $newshome = $this->input->post('newshome');
                if ($newshome == null)
                    $newshome = 2;
                $pinhome = $this->input->post('pinhome');
                if ($pinhome == null)
                    $pinhome = 0;    
                $news_ticker_id = $this->input->post('ticker');
                if ($news_ticker_id == null)
                    $news_ticker_id = 2;
                $more_news = $this->input->post('more_news');
                if ($more_news == null)
                    $more_news = 0;
                    $author_id = $this->input->post('author');
                if ($author_id == -1)
                    $author_id = null;
                //  var_dump($newshome." ".$news_ticker_id);
                $u_rec_id = $this->session->userdata('user_id');
                $new = array('title' => $this->input->post('title'),
                    'caption'=>$this->input->post('caption'),
                    'category_id' => $this->input->post('category'),
                    'post_brief' => $this->input->post('comments'),
                    'author_id' => $author_id,
                    'post_text' => $this->input->post('txt'),
                    'img' => $img,
                    'user_id' => $u_rec_id,
                    'news_ticker_id' => $news_ticker_id,
                    'show_home_id' => $newshome,
                    'pin_home' => $pinhome,
                    'created_at' => $date,
                    'updated_at' => $date,
                    'more_news' => $more_news);
            if (isset($_FILES['sound_news']) && !empty($_FILES['sound_news']['name'])) {

                if (!$this->upload->do_upload('sound_news')) {
                } else {
                    $uploadedFileData4 = $this->upload->data();
                    //generate random image name
                    $randomName4 = md5(time()) . $uploadedFileData4['file_ext'];
                    //rename uploaded image to our new image name
                    rename($uploadedFileData4['full_path'], $uploadedFileData4['file_path'] . $randomName4);

                    $uploadedFileData4["file_name"] = $randomName4;
                    $new['sound'] = $path. $randomName4;

                }
            }
                $insert_id = $this->news_Model->addNews($new);
            if($insert_id==true)
                $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
            else
                $this->session->set_flashdata('error','عذراً، فشلت العملية!');
                $arr=$this->input->post('tags');
                if($arr!=null) {
                    foreach ($arr as $ar) {
                        $is_exist = $this->news_Model->is_tagExist($ar);
                        if (count($is_exist) > 0)
                            $tag = Array('news_id' => $insert_id,
                                'tag_id' => $ar);
                        else {
                            $data = Array('name' => $ar);
                            $tag_id = $this->news_Model->addnewTags($data);
                            $tag = Array('news_id' => $insert_id,
                                'tag_id' => $tag_id);
                        }
                        $this->news_Model->addTags($tag);
                    }
                }
                if ($this->input->post('link') != null || $this->input->post('fb_link') != null  || (isset($_FILES['video_file']) && !empty($_FILES['video_file']['name']))) {
                    $video = array(
                'link' => $this->input->post('link'),
                'fb_link' => $this->input->post('fb_link'),
                'post_id' => $insert_id);

                if (!$this->upload->do_upload('video_file')) {
                } else {
                    $uploadedFileData2 = $this->upload->data();
                    $randomName2 = md5(time()) . $uploadedFileData2['file_ext'];
                    //rename uploaded image to our new image name
                    rename($uploadedFileData2['full_path'], $uploadedFileData2['file_path'] . $randomName2);
                    $uploadedFileData2["file_name"] =  $randomName2;
                    $video['local_video'] = $path . $randomName2;

                }

            $this->news_Model->addVideo($video);
                }
            if ($this->input->post('desc_img') != null ) {
                $img_archive = array(
                    'name' => $this->input->post('desc_img'),
                    'path' => $img,
                    'admin_id' => $u_rec_id,
                    'created_at' => $date);
                $this->UploadModel->addImgUpload($img_archive);
            }

            if($this->input->post('fileSubmit') && !empty($_FILES['userFiles']['name'])){
                    $filesCount = count($_FILES['userFiles']['name']);
                    for($i = 0; $i < $filesCount; $i++){
                        $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                        $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                        $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                        $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                        $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                        $uploadPath = $path;
                        $config2['upload_path'] = $uploadPath;
                        $config2['allowed_types'] = 'gif|jpg|png';

                        $this->load->library('upload', $config2);
                        $this->upload->initialize($config2);

                        if($this->upload->do_upload('userFile')){
                            $fileData = $this->upload->data();
                            $randomName = md5(time()) .''.$i. $fileData['file_ext'];
                            //rename uploaded image to our new image name
                            rename($fileData['full_path'], $fileData['file_path'] . $randomName);
                            $fileData["file_name"] = $randomName;
                            
                            $img=$path. $randomName;
                            $this->load->library('image_lib');
                            $water_img = $this->input->post('water_img');
                            if ($water_img == 1) {
                                $config['source_image'] = $img;
                                $config['image_library'] = 'gd2';
                                $config['wm_type'] = 'overlay';
                                $config['wm_overlay_path'] = './uploads/logo.png';
                                $config['wm_opacity'] = 50;
                                $config['wm_vrt_alignment'] = 'middle';
                                $config['wm_hor_alignment'] = 'center';
                                $config['quality'] = '70%';
                                $this->image_lib->initialize($config);
                                if (!$this->image_lib->watermark()) {
                                    echo $this->image_lib->display_errors();
                                } else {
                                    echo 'Successfully updated image with watermark';
                                }
                            }else{

                            }


                            $uploadData[$i]['name'] =  $img;
                            $uploadData[$i]['post_id'] =$insert_id ;

                        }
                    }
                    if(!empty($uploadData)){

                        $this->news_Model->insertimgnews($uploadData);
                    }
                }

        }

                redirect('admin/addNews');


        

        }else{
            redirect('admin/login');
        }



    }

    public function delImagesNews(){
        if ($this->session->userdata('user_id')) {
            $id=$this->input->post('id');
            $this->news_Model->deleteImageNews($id);
        }else{

        }
    }
    public function delVideoNews(){
        if ($this->session->userdata('user_id')) {
            $id=$this->input->post('id');
            $this->news_Model->deleteVideoNews($id);
        }else{

        }
    }

    public function updateNews()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(4,$this->session->userdata('roles'))
            ||in_array(11,$this->session->userdata('roles'))||in_array(12,$this->session->userdata('roles'))){
            $tags= $this->NewsModel->get_tags_add_news();
            $data ['TAGS']=$tags;

        $subdept = $this->deptNewsModel->get_subDept();
        $id=$this->uri->segment(3);

        $news = $this->news_Model->get_news_id($id);
        $tag_new= $this->news_Model->get_news_tags($id);
            $data ['TAGS']=$tags;
            $data ['TAG_NEW']=$tag_new;

        $data ['SubDept'] = $subdept;
        $data ['news'] = $news;
            $imagesnews = $this->news_Model->get_imgNews($id);
            $data ['images'] = $imagesnews;
            $video = $this->news_Model->get_videoNews($id);
            $data ['Video'] = $video;

            if($news != null){
                $data['title'] = "تعديل خبر";
            }
            else{
                $data['title'] = " الصفحة غير موجودة ";
                $data['Description'] = '';
                $data['image'] =" ";
            }
        $this->load->view('admin/partial/header',$data);
        $this->load->view('admin/partial/aside-menu');
            if($news != null)
                $this->load->view('admin/pages/updateNews');
            else
                $this->load->view('admin/pages/err404');
        $this->load->view('admin/partial/footer');
    }else{
redirect('admin/login');
}

    }

    public function saveUpdateNews(){


        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(4,$this->session->userdata('roles'))
            ||in_array(11,$this->session->userdata('roles'))||in_array(12,$this->session->userdata('roles'))){
        $path=path_img('imgnews');
        date_default_timezone_set('Asia/Gaza');
        $date=date('Y-m-d H:i:s');
        $id=$this->uri->segment(3);
        $config['upload_path'] = $path;
        $config['allowed_types'] = '*';
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);
            $u_rec_id = $this->session->userdata('user_id');
            $newshome=$this->input->post('newshome');
            if($newshome==null)
                $newshome=2;
            $news_ticker_id=$this->input->post('ticker');
            if($news_ticker_id==null)
                $news_ticker_id=2;
                
            $pinhome = $this->input->post('pinhome');
            if ($pinhome == null)
                $pinhome = 0;    
            
            $more_news = $this->input->post('more_news');
            if ($more_news == null)
                $more_news = 0;

            if (isset($_FILES['imghome']) && !empty($_FILES['imghome']['name'])) {

                if (!$this->upload->do_upload('imghome')) {
                    $this->session->set_flashdata('error','عذراً، فشلت العملية!');
                    redirect('admin/dtableNews');
                } else {

                    $uploadedFileData = $this->upload->data();
                    //generate random image name
                    $randomName = md5(time()) . $uploadedFileData['file_ext'];
                    //rename uploaded image to our new image name
                    rename($uploadedFileData['full_path'], $uploadedFileData['file_path'] . $randomName);

                    $uploadedFileData["file_name"] = $randomName;
                    $img=$path. $randomName;
                    $this->load->library('image_lib');
                    $water_img = $this->input->post('water_img');
                    if ($water_img == 1) {
                        $config['source_image'] = $img;
                        $config['image_library'] = 'gd2';
                        $config['wm_type'] = 'overlay';
                        $config['wm_overlay_path'] = './uploads/logo.png';
//the overlay image
                        $config['wm_opacity'] = 50;
                        $config['wm_vrt_alignment'] = 'middle';
                        $config['wm_hor_alignment'] = 'center';
                        $config['quality'] = '70%';
//                    $config['width'] = 200;
//                    $config['height'] = 200;
//                    $this->image_lib->resize();
                        $this->image_lib->initialize($config);
                        if (!$this->image_lib->watermark()) {
                            echo $this->image_lib->display_errors();
                        } else {
                            echo 'Successfully updated image with watermark';
                        }
                    }else{

                    }
                    $new=array(

                        'title'=>$this->input->post('title'),
                        'caption'=>$this->input->post('caption'),
                        'category_id'=>$this->input->post('category'),
                        'post_brief'=>$this->input->post('comments'),
                        'post_text'=>$this->input->post('txt'),
                        'img'=>$img,
                        'updated_by'=>$u_rec_id,
                        'news_ticker_id'=>$news_ticker_id,
                        'show_home_id'=>$newshome,
                        'pin_home' => $pinhome,
                        'updated_at' => $date,
                        'more_news' => $more_news);
                    if (isset($_FILES['sound_news']) && !empty($_FILES['sound_news']['name'])) {

                        if (!$this->upload->do_upload('sound_news')) {
                        } else {
                            $uploadedFileData4 = $this->upload->data();
                            //generate random image name
                            $randomName4 = md5(time()) . $uploadedFileData4['file_ext'];
                            //rename uploaded image to our new image name
                            rename($uploadedFileData4['full_path'], $uploadedFileData4['file_path'] . $randomName4);

                            $uploadedFileData4["file_name"] = $randomName4;
                            $new['sound'] = $path. $randomName4;

                        }
                    }
                  $this->news_Model->updateNews($id,$new);
                    $this->news_Model->delTags($id);

                   $arr=$this->input->post('tags');

                    if ($arr!=null) {
                        foreach ($arr as $ar) {
                            $is_exist = $this->news_Model->is_tagExist($ar);
                            $tag=Array();
                            if (count($is_exist) > 0)
                                $tag = Array('news_id' => $id,
                                    'tag_id' => $ar);
                            else {
                                $data = Array('name' => $ar);
                                $tag_id = $this->news_Model->addnewTags($data);
                                $tag = Array('news_id' => $id,
                                    'tag_id' => $tag_id);
                            }
                            $this->news_Model->addTags($tag);
                        }
                    }
                    if($this->input->post('link')!=null || $this->input->post('fb_link') != null || (isset($_FILES['video_file']) && !empty($_FILES['video_file']['name']))) {
                        $video = array(
                            'link' => $this->input->post('link'),
                            'fb_link' => $this->input->post('fb_link'),
                            'post_id' => $id);
                        if (!$this->upload->do_upload('video_file')) {
                        } else {
                            $uploadedFileData2 = $this->upload->data();
                            $randomName2 = md5(time()) . $uploadedFileData2['file_ext'];
                            //rename uploaded image to our new image name
                            rename($uploadedFileData2['full_path'], $uploadedFileData2['file_path'] . $randomName2);
                            $uploadedFileData2["file_name"] =  $randomName2;
                            $video['local_video'] = $path . $randomName2;

                        }
                        $this->news_Model->updateVideo($id, $video);

                    }else{

                    }
                    if ($this->input->post('desc_img') != null ) {
                        $img_archive = array(
                            'name' => $this->input->post('desc_img'),
                            'path' => $img,
                            'admin_id' => $u_rec_id,
                            'created_at' => $date);
                        $this->UploadModel->addImgUpload($img_archive);
                    }
                    $is_exist_video=$this->news_Model->get_videoNews($id);
                    if (count($is_exist_video) == 0){
                        if($this->input->post('link')!=null || $this->input->post('fb_link') != null || (isset($_FILES['video_file']) && !empty($_FILES['video_file']['name']))) {
                            $video = array(
                                'link' => $this->input->post('link'),
                                'fb_link' => $this->input->post('fb_link'),
                                'post_id' => $id);
                            if (!$this->upload->do_upload('video_file')) {
                            } else {
                                $uploadedFileData2 = $this->upload->data();
                                $randomName2 = md5(time()) . $uploadedFileData2['file_ext'];
                                //rename uploaded image to our new image name
                                rename($uploadedFileData2['full_path'], $uploadedFileData2['file_path'] . $randomName2);
                                $uploadedFileData2["file_name"] =  $randomName2;
                                $video['local_video'] = $path . $randomName2;

                            }
                            $this->news_Model->addVideo($video);

                        }else{

                        }
                    }
                    $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');

                }

            }else {
                $new = array(

                    'title' => $this->input->post('title'),
                    'caption'=>$this->input->post('caption'),
                    'category_id' => $this->input->post('category'),
                    'post_brief' => $this->input->post('comments'),
                    'post_text' => $this->input->post('txt'),
                    'img' => $this->input->post('img-archive'),
                    'updated_by' => $u_rec_id,
                    'news_ticker_id' => $news_ticker_id,
                    'show_home_id' => $newshome,
                    'pin_home' => $pinhome,
                    'updated_at' => $date,
                    'more_news' => $more_news);
                if (isset($_FILES['sound_news']) && !empty($_FILES['sound_news']['name'])) {

                    if (!$this->upload->do_upload('sound_news')) {
                    } else {
                        $uploadedFileData4 = $this->upload->data();
                        //generate random image name
                        $randomName4 = md5(time()) . $uploadedFileData4['file_ext'];
                        //rename uploaded image to our new image name
                        rename($uploadedFileData4['full_path'], $uploadedFileData4['file_path'] . $randomName4);

                        $uploadedFileData4["file_name"] = $randomName4;
                        $new['sound'] = $path. $randomName4;

                    }
                }
             $this->news_Model->updateNews($id, $new);

                $this->news_Model->delTags($id);
                $arr=$this->input->post('tags');

                if ($arr!=null) {
                    foreach ($arr as $ar) {
                        $is_exist = $this->news_Model->is_tagExist($ar);
                        if (count($is_exist) > 0)
                            $tag = Array('news_id' => $id,
                                'tag_id' => $ar);
                        else {
                            $data = Array('name' => $ar);
                            $tag_id = $this->news_Model->addnewTags($data);
                            $tag = Array('news_id' => $id,
                                'tag_id' => $tag_id);
                        }
                      $this->news_Model->addTags($tag);

                    }
                }
                if($this->input->post('link')!=null || $this->input->post('fb_link') != null || (isset($_FILES['video_file']) && !empty($_FILES['video_file']['name']))) {
                        $video = array(
                            'link' => $this->input->post('link'),
                            'fb_link' => $this->input->post('fb_link'),
                            'post_id' => $id);
                    if (!$this->upload->do_upload('video_file')) {
                    } else {
                        $uploadedFileData2 = $this->upload->data();
                        $randomName2 = md5(time()) . $uploadedFileData2['file_ext'];
                        //rename uploaded image to our new image name
                        rename($uploadedFileData2['full_path'], $uploadedFileData2['file_path'] . $randomName2);
                        $uploadedFileData2["file_name"] =  $randomName2;
                        $video['local_video'] = $path . $randomName2;

                    }
                  $this->news_Model->updateVideo($id, $video);

                }
                $is_exist_video=$this->news_Model->get_videoNews($id);
                if (count($is_exist_video) == 0){
                    if($this->input->post('link')!=null || $this->input->post('fb_link') != null || (isset($_FILES['video_file']) && !empty($_FILES['video_file']['name']))) {
                        $video = array(
                            'link' => $this->input->post('link'),
                            'fb_link' => $this->input->post('fb_link'),
                            'post_id' => $id);
                        if (!$this->upload->do_upload('video_file')) {
                        } else {
                            $uploadedFileData2 = $this->upload->data();
                            $randomName2 = md5(time()) . $uploadedFileData2['file_ext'];
                            //rename uploaded image to our new image name
                            rename($uploadedFileData2['full_path'], $uploadedFileData2['file_path'] . $randomName2);
                            $uploadedFileData2["file_name"] =  $randomName2;
                            $video['local_video'] = $path . $randomName2;

                        }
                        $this->news_Model->addVideo($video);

                    }else{

                    }
                }
                $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
            }

            if($this->input->post('fileSubmit') && !empty($_FILES['userFiles']['name'])){
                $filesCount = count($_FILES['userFiles']['name']);
                for($i = 0; $i < $filesCount; $i++){
                    $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                    $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                    $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                    $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                    $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                    $uploadPath = $path;
                    $config2['upload_path'] = $uploadPath;
                    $config2['allowed_types'] = 'gif|jpg|png';

                    $this->load->library('upload', $config2);
                    $this->upload->initialize($config2);

                    if($this->upload->do_upload('userFile')){
                        $fileData = $this->upload->data();
                        $randomName = md5(time()) .''.$i. $fileData['file_ext'];
                        //rename uploaded image to our new image name
                        rename($fileData['full_path'], $fileData['file_path'] . $randomName);
                        $fileData["file_name"] = $randomName;
                        $uploadData[$i]['name'] =  $path. $randomName;
                        $uploadData[$i]['post_id'] =$id ;

                    }
                }
                if(!empty($uploadData)){

                    $this->news_Model->insertimgnews($uploadData);

                }
                $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');

            }

            redirect('admin/dtableNews');
}else{
    redirect('admin/login');
}


    }

    public function deleteNews() {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(4,$this->session->userdata('roles'))
            ||in_array(11,$this->session->userdata('roles'))||in_array(12,$this->session->userdata('roles'))){
            $id = $this->input->post('deptID');
            $deleted_id=$this->news_Model->delNews($id);
            if($deleted_id==false)
                $this->session->set_flashdata('success', 'لقد تم الحذف بنجاح!');
            else
                $this->session->set_flashdata('error','عذراً، فشلت العملية!');
}else{
    redirect('admin/login');
}

    }

    public function breaknews_table()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(9,$this->session->userdata('roles'))){
        $data['title'] = "قائمة الأخبار العاجلة";
        $this->load->helper(array('form','url'));
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('news_Model');
        $breaknews = $this->news_Model->get_breaknews();
        $data ['breakNews'] = $breaknews;
        $this->load->view('admin/partial/header',$data);
        $this->load->view('admin/partial/aside-menu');
        $this->load->view('admin/pages/dtableBreaknews');
        $this->load->view('admin/partial/footer');
    }else{
    redirect('admin/login');
}
    }

    public function add_breaknews()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(9,$this->session->userdata('roles'))){
        $data['title'] = "إضافة خبر عاجل";
        $this->load->view('admin/partial/header',$data);
        $this->load->view('admin/partial/aside-menu');
        $this->load->view('admin/pages/addBreakNew');
        $this->load->view('admin/partial/footer');
    }else{
    redirect('admin/login');
}
    }

    public function saveBreaknews(){
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(9,$this->session->userdata('roles'))){
            $u_rec_id = $this->session->userdata('user_id');
            date_default_timezone_set('Asia/Gaza');
        $date=date('Y-m-d H:i:s');
        $breaknew=array(
            'text'=>$this->input->post('newstext'),
            'user_id'=>$u_rec_id,
            'created_at' => $date,
            );

            $is_inserted=$this->news_Model->addBreakNew($breaknew);
            if($is_inserted==false)
                $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
            else
                $this->session->set_flashdata('error','عذراً، فشلت العملية!');
        redirect('admin/addBreakNew');
}else{
    redirect('admin/login');
}
    }

    public function deleteBreakNew() {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(9,$this->session->userdata('roles'))){
        $id = $this->input->post('deptID');

        $this->news_Model->delBreakNew($id);
}else{
    redirect('admin/login');
}

    }

    public function updateBreakNew()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(9,$this->session->userdata('roles'))){
        $id = $this->input->post('deptID');
        $textbox = $this->input->post('textbox');
        //$data1['data'] = $data;

        $this->news_Model->updtBreakNew($id,$textbox);
}else{
    redirect('admin/login');
}

    }
}
