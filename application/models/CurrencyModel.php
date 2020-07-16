<?php

class CurrencyModel extends CI_Model {

    public function get_currency()
    {

        $this->db->select('*');
        $this->db->order_by("id","desc");
        $this->db->from('currency');
        $query=$this->db->get();
        return $query->row();
    }

    public function addcurrency($data)
    {
        $this->db->insert('currency',$data);
        return $this->db->insert_id();
    }


}