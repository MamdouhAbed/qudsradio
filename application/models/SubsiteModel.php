<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubsiteModel extends CI_Model  {


    public function add_Subsite($data)
    {
        $this->db->insert('sub_site',$data);
    }

    public function getSubsite(){
        $this->db->select('*');
        $this->db->from('sub_site');
        $this->db->order_by("id" , "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function get_subsite_id($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('sub_site');
        $query = $this->db->get();
        return $query->row();
    }

    public function updateSubsite($id,$data)
    {

        $this->db->where('id', $id);
        $this->db->update('sub_site',$data);
    }
    public function delSubsite($id){


        $this -> db -> where('id', $id);
        $this -> db -> delete('sub_site');
    }


}

