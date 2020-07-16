<?php

class InsertModel extends CI_Model
{

    public function add_comment()
    {
        $this->db->insert('comments');

    }
}