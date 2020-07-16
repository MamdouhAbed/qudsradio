<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutUsModel extends CI_Model  {

    public function updateDetails($data)
    {

        $this->db->insert('settings',$data);
    }
    public function deleteDetails()
    {
        $this->db->where('1', 1);
        $this->db->delete('settings');
    }


    public function get_Details()
    {
        $this->db->select('*');
        $this->db->from('settings');
        $query = $this->db->get();
        return $query->row();
    }

}