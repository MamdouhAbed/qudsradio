<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EpisodeModel extends CI_Model  {


    public function addEpisode($data)
    {

        $this->db->insert('episode',$data);
        return $this->db->insert_id();

    }

    public function get_episode()
    {
        $this->db->select('episode.*, programs.name course_name');
        $this->db->from('episode');
        $this->db->join('programs', 'programs.id = episode.program_id' , 'left');
        $this->db->where('episode.is_deleted', 0);
        $this->db->order_by("order_id" , "desc");
        $query = $this->db->get();
        return $query->result();
    }
    public function get_all_episode($limit,$offset)
    {
        $this->db->select('episode.*, programs.name course_name');
        $this->db->from('episode');
        $this->db->join('programs', 'programs.id = episode.program_id' , 'left');
        $this->db->where('episode.is_deleted', 0);
        $this->db->limit($limit,$offset);
        $this->db->order_by("order_id" , "desc");
        $query = $this->db->get();
        return $query->result();
    }
    public function get_episode_home($limit)
    {
        $this->db->select('episode.*, programs.name course_name');
        $this->db->from('episode');
        $this->db->join('programs', 'programs.id = episode.program_id' , 'left');
        $this->db->where('episode.is_deleted', 0);
        $this->db->where('episode.show_home', 1);
        $this->db->limit($limit);
        $this->db->order_by("order_id" , "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function get_episode_where_course_count()
    {
        $id = $this->uri->segment(3);
        $this->db->select('id');
        $this->db->from('episode');
        $this->db->where('program_id' ,$id);
        $this->db->where('episode.is_deleted', 0);
        $query = $this->db->get();
        return $query->num_rows();

    }
    public function get_episode_where_course_count_site()
    {
        $id = $this->uri->segment(2);
        $this->db->select('id');
        $this->db->from('episode');
        $this->db->where('program_id' ,$id);
        $this->db->where('episode.is_deleted', 0);
        $query = $this->db->get();
        return $query->num_rows();

    }
    public function get_episode_details()
    {
        $id = $this->uri->segment(3);
        $this->db->select('*');
        $query = $this->db->get_where('episode', array('id' => $id));
        $episode = $query->row();
        return $episode;
    }
    public function get_more_episode($program_id)
    {
        $id=$this->uri->segment(3);
        $this->db->select('*');
        $this->db->where('program_id' ,$program_id);
        $this->db->where('id <>' ,$id);
        $this->db->order_by("order_id","desc");
        $this->db->from('episode');
        $this->db->limit(20);
        $query=$this->db->get();
        return $query->result();
    }

    public function get_episode_where_course($idd,$limit)
    {
        $id=$this->uri->segment(2);
        $this->db->select('episode.*, programs.name course_name, programs.img p_img');
        $this->db->from('episode');
        $this->db->join('programs', 'programs.id = episode.program_id' , 'left');
        $this->db->where('episode.is_deleted', 0);
        $this->db->where('program_id',$id);
        $this->db->limit($idd,$limit);
        $this->db->order_by("order_id" , "desc");
        $query = $this->db->get();
        return $query->result();
    }
    public function get_episode_where_course_panel($idd,$limit)
    {
        $id=$this->uri->segment(3);
        $this->db->select('episode.*, programs.name course_name, programs.img p_img');
        $this->db->from('episode');
        $this->db->join('programs', 'programs.id = episode.program_id' , 'left');
        $this->db->where('episode.is_deleted', 0);
        $this->db->where('program_id',$id);
        $this->db->limit($idd,$limit);
        $this->db->order_by("order_id" , "desc");
        $query = $this->db->get();
        return $query->result();
    }
    public function get_episode_id($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->where('episode.is_deleted', 0);
        $this->db->from('episode');
        $query = $this->db->get();
        return $query->row();
    }

    public function get_episode_order_id($id,$order_id)
    {
        $this->db->select('*');
        $this->db->where('order_id', $order_id);
        $this->db->where('id <> ' , $id);
        $this->db->where('episode.is_deleted', 0);
        $this->db->from('episode');
        $query = $this->db->get();
        return $query->row();
    }
    public function get_episode_id_r()
    {
        $id=$this->uri->segment(3);
        $this->db->select('episode.*, programs.id p_id, programs.name p_nam');
        $this->db->from('episode');
        $this->db->join('programs', 'programs.id = episode.program_id' , 'left');
        $this->db->where('episode.id', $id);
        $this->db->where('episode.is_deleted', 0);
        $query = $this->db->get();
        return $query->row();
    }

    public function updateEpisode($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('episode',$data);
    }
    public function addVideo($data)
    {

        $this->db->insert('episode_video',$data);

    }

    public function get_videoEpisode($id)
    {
        $this->db->select('*');
        $this->db->from('episode_video');
        $this->db->where('episode_id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_episode_video()
    {
        $id=$this->uri->segment(3);
        $this->db->select('* , SUBSTRING(link, -11) as video');
        $this->db->from('episode_video');
        $this->db->where('episode_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function updateVideo($id,$data)
    {

        $this->db->where('episode_id', $id);
        $this->db->update('episode_video',$data);
    }
    public function delVideoEpisode($id)
    {
        $this->db->set('local_video', NUll);
        $this->db->where('id', $id);
        $this->db->update('episode_video');
    }
//    function count_order()
//    {
//        $id=$this->uri->segment(2);
//        $this->db->select('count(*) count');
//        $this->db->from('episode');
//        $this->db->where('episode.is_deleted', 0);
//        $this->db->where('program_id',$id);
//        $query = $this->db->get();
//        return $query->row();
//    }
    public function updateOrder($id,$order,$neworder){
            $this->db->where('order_id' , $order);
            $this->db->where('id <> ' , $id);
            $this->db->update('episode', array('order_id' => $neworder));

    }
    public function updateOrder2($id,$neworder){
        $this->db->where('id' , $id);
        $this->db->update('episode', array('order_id' => $neworder));

    }

//    public function updateOrder($items){
////        $total_items=$this->db->count_all_results('episode');
//        $total_items=4;
//        for($item = 0; $item < $total_items; $item++ )
//        {
//
//            $data = array(
//                'id' => $items[$item],
//                'order_id' => $item+1
//            );
//
//            $this->db->where('id', $data['id']);
//
//            $this->db->update('episode', array('order_id' => $data['order_id']));
//        }
//    }
}