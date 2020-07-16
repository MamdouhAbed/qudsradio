<?php

class VideoModel extends CI_Model {

    public function get_video($limit,$id)
    {
        $this->db->select('* , SUBSTRING(link_youtube, -11) as video');
        $this->db->from('videos');
        $this->db->limit($limit,$id);
        $this->db->order_by("id","desc");
        $this->db->where('main_media_id', 1);
        $query=$this->db->get();
        return $query->result();
    }
    public function get_video_activated($limit,$id)
    {
        $this->db->select('* , SUBSTRING(link_youtube, -11) as video');
        $this->db->from('videos');
        $this->db->limit($limit,$id);
        $this->db->order_by("id","desc");
        $this->db->where('main_media_id', 1);
        $this->db->where('activated', 1);
        $query=$this->db->get();
        return $query->result();
    }

    public function get_video_pal_center($limit,$id)
    {
        $this->db->select('* , SUBSTRING(link_youtube, -11) as video');
        $this->db->from('videos');
        $this->db->limit($limit,$id);
        $this->db->order_by("id","desc");
        $this->db->where('main_media_id', 2);
        $query=$this->db->get();
        return $query->result();
    }


    public function get_video_where_count()
    {
        $id=$this->uri->segment(2);
        $this->db->select('* , SUBSTRING(link_youtube, -11) as video');
        $this->db->where('id <>', $id);
        $this->db->from('videos');
        $this->db->order_by("view_count","desc");
        $this->db->where('activated', 1);
        $query=$this->db->get();
        return $query->result();
    }

    public function get_video_details()
    {
        $id = $this->uri->segment(2);
        $this->db->select('* , SUBSTRING(link_youtube, -11) as video');
        $this->db->where('activated', 1);
        $query = $this->db->get_where('videos', array('id' => $id));
        $video = $query->row();
        if ($video != null) {

            $data = array('view_count' => $video->view_count + 1);
            $this->db->where('id', $id);
            $this->db->update('videos', $data);
        }
        return $video;
    }
    public function get_more_video()
    {
        $id=$this->uri->segment(2);
        $this->db->select('* , SUBSTRING(link_youtube, -11) as video');
        $this->db->where('id <>' ,$id);
        $this->db->where('activated', 1);
        $this->db->order_by("id","desc");
        $this->db->from('videos');
        $this->db->limit(20);
        $query=$this->db->get();
        return $query->result();
    }


}


