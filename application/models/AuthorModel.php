<?php

class AuthorModel extends CI_Model {



//    public function get_all_children($limit,$id)
//    {
//
//        $this->db->select('*');
//        $this->db->order_by("id","desc");
//        $this->db->limit($limit,$id);
//        $this->db->from('children');
//        $query=$this->db->get();
//        return $query->result();
//    }

    public function get_authors()
    {

        $this->db->select('*');
        $this->db->order_by("id","desc");
        $this->db->where('is_delete <>', 1);
        $this->db->from('author');
        $query=$this->db->get();
        return $query->result();
    }




    public function get_author_id($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->where('is_delete <>', 1);
        $this->db->from('author');
        $query = $this->db->get();
        return $query->result();
    }


    public function updateAuthor($id,$data)
    {
//
        $this->db->where('id', $id);
        $this->db->update('author',$data);
    }

    public function delAuthor($id,$user_id){


        $this -> db -> where('id', $id);
        $this -> db -> update('author');
    }

    public function get_Author_limit()
    {
        $this->db->select('*');
        $this->db->order_by("id","desc");
        $this->db->where('is_delete <>', 1);
        $this->db->limit(15);
        $this->db->from('author');
        $query=$this->db->get();
        return $query->result();
    }

    public function addAuthor($data)
    {

        $this->db->insert('author',$data);
        return $this->db->insert_id();
    }


}