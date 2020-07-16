<?php
function get_Roles_users($user)
{
    $CI =& get_instance();
    $db=$CI->db;
    $db->select('user_permtion.* , roles.id role_id, roles.name role_name');
    $db->from('user_permtion');
    $db->where('user_permtion.user_id', $user);
    $db->join('roles', 'user_permtion.role_id = roles.id');
    $query = $db->get();
    return $query->result();
}
function get_Details()
{
    $CI =& get_instance();
    $db=$CI->db;
    $db->select('frequency,facebook_link,instagram_link,twitter_link,tube_link,whatsapp_link');
    $db->from('settings');
    $query=$db->get();
    return $query->row();
}
function get_currency()
{
    $CI =& get_instance();
    $db=$CI->db;
    $db->select('*');
    $db->order_by("id","desc");
    $db->from('currency');
    $query=$db->get();
    return $query->row();
}
function getSubsite_active()
{
    $CI =& get_instance();
    $db=$CI->db;
    $db->select('*');
    $db->from('sub_site');
    $db->where('activat_id', 1);
    $query = $db->get();
    return $query->result();
}
function get_live_shedule()
{
    $CI =& get_instance();
    $db=$CI->db;
    $db->select('live.*,programs.name pro_name, programs.presenter_program presenter, programs.presenter_img p_img');
    $db->from('live');
    $db->join('days', 'live.day_id = days.id', 'left');
    $db->join('programs', 'live.program_id = programs.id', 'left');
    $db->where('programs.is_deleted', 0);
    $db->where('programs.activated', 1);
    $db->order_by("live.time","asc");
    $query = $db->get();
    return $query->result();
}
function get_live()
{
    $CI =& get_instance();
    $db=$CI->db;
    $db->select('*');
    $db->from('live_brodcast');
    $db->where('is_deleted',0);
    $db->order_by('id','desc');
    $query = $db->get();
    return $query->row();
}
//get max count news where category
function get_news_where_count2($category_id,$count,$id,$db)
{

    $db->select('*');
    $db->order_by("view_count","desc");
    $db->where("category_id", $category_id);
    $db->where('id <>' ,$id);
    $db->limit("3");
    $db->where('created_at BETWEEN DATE_SUB(CURDATE(), INTERVAL '.$count.' DAY) AND NOW()');
//        $this->db->where('CAST( created_at AS DATE ) > DATEADD( DAY, -7, CAST( GETDATE() AS DATE )');
    $db->from('news');
    $query=$db->get();
    $result=$query->result();
    if(count($result)>2 || $count ==90) {

        return $result;
    }else
        return get_news_where_count2($category_id,$count+10,$id,$db);
}


function get_news_where_cat_most_read1($cat_id,$count,$db)
{

    $db->select('id,img,title,view_count');
    $db->order_by("view_count","desc");
    $db->limit('2');
    $db->where('category_id',$cat_id);
    $db->where('created_at BETWEEN DATE_SUB(CURDATE(), INTERVAL '.$count.' DAY) AND NOW()');
    $db->from('news');
    $query=$db->get();
    $result=$query->result();
    if(count($result)>1 || $count ==90) {

        return $result;
    }else
        return get_news_where_cat_most_read1($cat_id,$count+10,$db);
}

function path_img($sub_folder) {
$path = "./admin-assets/uploads/".$sub_folder."/";

$year_folder = $path . date("Y");
$month_folder = $year_folder . '/' . date("m");
$day_folder= $month_folder.'/'. date("d");
!file_exists($year_folder) && mkdir($year_folder , 0777);
!file_exists($month_folder) && mkdir($month_folder, 0777);
!file_exists($day_folder) && mkdir($day_folder, 0777);

$path = $day_folder . '/' ;

    return $path;
};
function path_file($course_id) {

    $path = "./admin-assets/uploads/episodes/";
    $course_folder = $path . '/' .$course_id;
    $year_folder = $course_folder.'/' . date("Y");
    $month_folder = $year_folder . '/' . date("m");
    $day_folder= $month_folder.'/'. date("d");
    !file_exists($course_folder) && mkdir($course_folder , 0777);
    !file_exists($year_folder) && mkdir($year_folder , 0777);
    !file_exists($month_folder) && mkdir($month_folder, 0777);
    !file_exists($day_folder) && mkdir($day_folder, 0777);
    $path = $day_folder . '/' ;

    return $path;
};
