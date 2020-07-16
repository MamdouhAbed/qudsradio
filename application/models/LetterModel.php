<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LetterModel extends CI_Model  {


    public function add_letter($data)
    {
        $this->db->insert('news_letters',$data);
    }
    public function getLetters(){
        $this->db->select('*');
        $this->db->from('news_letters');
        $this->db->order_by("id" , "desc");
        $this->db->where('news_letters.is_deleted', 0);
        $query = $this->db->get();
        return $query->result();
    }
    public function getLetters_today($limit,$id){
        $this->db->select('*');
        $this->db->from('news_letters');
        $this->db->order_by("id" , "desc");
        $this->db->where('news_letters.is_deleted', 0);
        $this->db->limit($limit,$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_letter_id($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('news_letters');
        $query = $this->db->get();
        return $query->row();
    }

    public function updateLetter($id,$data)
    {

        $this->db->where('id', $id);
        $this->db->update('news_letters',$data);
    }
    public function delLetter($id){


        $this -> db -> where('id', $id);
        $this -> db -> delete('news_letters');
    }


}

