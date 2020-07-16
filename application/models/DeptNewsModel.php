<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeptNewsModel extends CI_Model  {

//    public function addMainDept($data)
//    {
//
//        $this->db->insert('main_category',$data);
//    }
//    public function get_mainDept()
//    {
//        $this->db->select('*');
//        $this->db->from('main_category');
//        $query = $this->db->get();
//        return $query->result();
//    }
//
//    public function delMainDept($id){
//
//
//        $this -> db -> where('id', $id);
//        $this -> db -> delete('main_category');
//    }
//
//    public function updtMainDept($id = NULL,$data) {
//
//        $this->db->set('name', $data);
//        $this->db->where('id', $id);
//        $this->db->update( 'main_category');
//
//    }


    public function addSubDept($data)
    {

        $this->db->insert('category',$data);
    }
    public function get_subDept()
    {
        $this->db->select('*');
        $this->db->from('category');
        $query = $this->db->get();
        return $query->result();
    }
    public function delSubDept($id){


        $this -> db -> where('id', $id);
        $this -> db -> delete('category');
    }

    public function updtSubDept($id = NULL,$data) {

        $this->db->set('cat_name', $data);
        $this->db->where('id', $id);
        $this->db->update( 'category');

    }

}