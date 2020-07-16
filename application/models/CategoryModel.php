<?php

class CategoryModel extends CI_Model {

    public function get_category($limit,$id)
    {
        $this->db->limit($limit,$id);
        $this->db->order_by("id","desc");
        $query = $this->db->get('category');
        return $query->result();
    }

    public function get_categoryById($id)
    {
        $query = $this->db->get_where('category', array('id' => $id));
        $category=$query->row();
        return $category;
    }

    public function get_category_where()
    {
        $this->db->select('cat_name');
        $this->db->from('category');
//        $this->db->where('main_category_id', 1);
        $query = $this->db->get();
        return $query->result();
    }

}