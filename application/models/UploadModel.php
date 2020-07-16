<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UploadModel extends CI_Model  {


    public function addImgUpload($data)
    {

        $this->db->insert('upload_files',$data);
    }
    public function getImgUpload()
    {
        $this->db->select('*');
        $this->db->from('upload_files');
        $this->db->order_by("id" , "desc");
        $query = $this->db->get();
        return $query->result();
    }

}