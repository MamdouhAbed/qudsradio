<?php

class BreakNewsModel extends CI_Model {

    public function get_breaknews()
    {

        $this->db->select('*');
        $this->db->order_by("id","desc");
        $this->db->from('breaknews');
        $this->db->limit('20');
        $query=$this->db->get();
        return $query->result();
    }

}