<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrivateFilesModel extends CI_Model  {

    public function add_private_file($data)
    {
        $this->db->insert('special_files',$data);
    }

    public function get_private_files($limit,$id){
        $this->db->select('*');
        $this->db->from('special_files');
        $this->db->order_by("id" , "desc");
        $this->db->where('special_files.is_delete', 0);
        $this->db->limit($limit,$id);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_file_id($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('special_files');
        $query = $this->db->get();
        return $query->row();
    }

    public function updatePrivateFile($id,$data)
    {

        $this->db->where('id', $id);
        $this->db->update('special_files',$data);
    }
    public function delPrivateFile($id){

        $this -> db -> where('id', $id);
        $this -> db -> delete('special_files');
    }


}

