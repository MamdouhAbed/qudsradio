<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactModel extends CI_Model  {


    public function add_contact($data)
    {

        $this->db->insert('contacts',$data);
    }

    public function get_contacts()
    {
        $this->db->select('*');
        $this->db->from('contacts');
        $this->db->order_by("id" , "desc");
        $query = $this->db->get();
        return $query->result();
    }

}