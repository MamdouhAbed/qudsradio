<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MultimediaModel extends CI_Model  {

    public function addVideo($data)
    {

        $this->db->insert('videos',$data);
    }

    public function get_video()
    {
        $this->db->select('*');
        $this->db->from('videos');
        $this->db->order_by("id" , "desc");
        $query = $this->db->get();
        return $query->result();
    }
    public function get_video_activated()
    {
        $this->db->select('*');
        $this->db->from('videos');
        $this->db->where('activated', '1');
        $this->db->order_by("id" , "desc");
        $query = $this->db->get();
        return $query->result();
    }
    public function get_video_id($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('videos');
        $query = $this->db->get();
        return $query->row();
    }

    public function updateVideo($id,$data)
    {

        $this->db->where('id', $id);
        $this->db->update('videos',$data);
    }

    public function delVideo($id){


        $this -> db -> where('id', $id);
        $this -> db -> delete('videos');
    }

    public function get_images()
    {
        $id=$this->uri->segment(3);
        $this->db->select('*');
       $this->db->from('images');
        $this->db->where('media_dept_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function deleteImage($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('images');
    }

    public function delAlbum($id){


        $this -> db -> where('id', $id);
        $this -> db -> delete('media_dept');
    }

    public function addImages($data)
    {

        $this->db->insert('images',$data);
    }

    public function updateImages($id,$data)
    {

        $this->db->where('id', $id);
        $this->db->update('images',$data);
    }

    public function insert($data = array()){
        $insert = $this->db->insert_batch('images',$data);
        return $insert?true:false;
    }



}