<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MediaModel extends CI_Model  {

    public function addMediaDept($data)
    {

        $this->db->insert('main_media_dept',$data);
    }
    public function addSubMediaDept($data)
    {

        $this->db->insert('media_dept',$data);
        return $this->db->insert_id();
    }

    public function get_catMedia()
    {
        $this->db->select('*');
        $this->db->from('main_media_dept');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_catSubMedia($id)
    {

        $this->db->select('*');
        $this->db->from('media_dept');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->result();
    }
//    public function get_catSubMedia()
//    {
//        $this->db->select('media_dept.*');
//        $this->db->from('media_dept');
//        $query = $this->db->get();
//        return $query->result();
//    }
    public function get_subDept()
    {
        $this->db->select('sub_category.*, main_category.name');
        $this->db->from('sub_category');
        $this->db->join('main_category', 'main_category.id = sub_category.main_category_id' , 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function delMediaDept($id){


            $this -> db -> where('id', $id);
            $this -> db -> delete('main_media_dept');
        }
    public function delSubMediaDept($id){


        $this -> db -> where('id', $id);
        $this -> db -> delete('media_dept');
    }

    public function updtMediaDept($id = NULL,$data) {

        $this->db->set('name', $data);
        $this->db->where('id', $id);
        $this->db->update( 'main_media_dept');

    }
    public function updtSubMediaDept($id = NULL,$data) {

//        $this->db->set('name', $data);
        $this->db->where('id', $id);
        $this->db->update( 'media_dept',$data);

    }


    }

