<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdvertModel extends CI_Model  {




    public function get_place_adv()
    {

        $this->db->select('*');
        $this->db->from('place_ad');
        $query = $this->db->get();
        return $query->result();
    }


    public function add_banner($data)
    {
        $this->db->insert('ad_banner',$data);
    }

    public function getBanner(){
        $this->db->select('*');
        $this->db->from('ad_banner');
        $this->db->order_by("id" , "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function get_Banner_place1(){
        $this->db->select('*');
        $this->db->from('ad_banner');
        $this ->db->where('activat_id', 1);
        $this ->db->where('place_id', 1);
        $this->db->order_by("id" , "desc");
        $query = $this->db->get();
        return $query->row();
    }

    public function get_Banner_place2(){
        $this->db->select('*');
        $this->db->from('ad_banner');
        $this ->db->where('activat_id', 1);
        $this ->db->where('place_id', 2);
        $this->db->order_by("id" , "desc");
        $query = $this->db->get();
        return $query->row();
    }

    public function get_Banner_place3(){
        $this->db->select('*');
        $this->db->from('ad_banner');
        $this ->db->where('activat_id', 1);
        $this ->db->where('place_id', 3);
        $this->db->order_by("id" , "desc");
        $query = $this->db->get();
        return $query->row();
    }


    public function get_banner_id($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('ad_banner');
        $query = $this->db->get();
        return $query->row();
    }

    public function updateBanner($id,$data)
    {

        $this->db->where('id', $id);
        $this->db->update('ad_banner',$data);
    }
    public function delBanner($id){


        $this -> db -> where('id', $id);
        $this -> db -> delete('ad_banner');
    }


}

