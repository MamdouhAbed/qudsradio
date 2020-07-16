<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_Model extends CI_Model  {

    public function addNews($data)
    {

       $this->db->insert('news',$data);
        return $this->db->insert_id();
    }

    public function addTags($data)
    {

        $this->db->insert('tag_news',$data);
        return $this->db->insert_id();
    }

    public function addnewTags($data)
    {

        $this->db->insert('tags',$data);
        return $this->db->insert_id();
    }

    public function is_tagExist($id)
    {
        $this->db->select('*');
        $this->db->from('tags');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function delTags($id){
        $this -> db -> where('news_id', $id);
        $this -> db -> delete('tag_news');
    }

    public function addVideo($data)
    {

        $this->db->insert('post_video',$data);

    }

    public function delVideo($id)
    {
        $this -> db -> where('post_id', $id);
        $this->db->delete('post_video');

    }
    public function get_videoNews($id)
    {
        $this->db->select('*');
        $this->db->from('post_video');
        $this->db->where('post_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function updateVideo($id,$data)
    {

        $this->db->where('post_id', $id);
        $this->db->update('post_video',$data);
    }

    public function insertimgnews($data = array()){
        $insert = $this->db->insert_batch('post_img',$data);
        return $insert?true:false;
    }

    public function get_imgNews($id)
    {
        $this->db->select('*');
        $this->db->from('post_img');
        $this->db->where('post_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function deleteImageNews($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('post_img');
    }
    public function deleteVideoNews($id)
    {
        $this->db->set('local_video', NUll);
        $this->db->where('id', $id);
        $this->db->update('post_video');
    }

    public function updateNews($id,$data)
    {
//
        $this->db->where('id', $id);
        $this->db->update('news',$data);
    }

    public function delNews($id){


        $this -> db -> where('id', $id);
        $this -> db -> delete('news');

    }

    public function get_news()
    {
        $this->db->select('news.*, category.cat_name,  users1.name,  users2.name updated');
        $this->db->order_by("id" , "desc");
        $this->db->from('news');
        $this->db->join('category', 'category.id = news.category_id' , 'left');
        $this->db->join('users as users1', 'users1.id = news.user_id' , 'left');
        $this->db->join('users as users2', 'users2.id = news.updated_by' , 'left');
        $this->db->where_in('news.category_id', $this->session->userdata('roles'));
        $this->db->or_where('1 in (select role_id from user_permtion
         where user_id = '.$this->session->userdata('user_id').')');
        $this->db->or_where('2 in (select role_id from user_permtion
         where user_id = '.$this->session->userdata('user_id').')');
        $this->db->or_where('4 in (select role_id from user_permtion
         where user_id = '.$this->session->userdata('user_id').')');
        $this->db->limit(500);
        $query = $this->db->get();
        return $query;
    }
    
    public function get_news_limit_5()
    {
        $this->db->select('news.*, category.cat_name,  users.name');
        $this->db->order_by("id" , "desc");
        $this->db->from('news');
        $this->db->join('category', 'category.id = news.category_id' , 'left');
        $this->db->join('users', 'users.id = news.user_id' , 'left');
        $this->db->where_in('news.category_id', $this->session->userdata('roles'));
        $this->db->or_where('1 in (select role_id from user_permtion
         where user_id = '.$this->session->userdata('user_id').')');
        $this->db->or_where('2 in (select role_id from user_permtion
         where user_id = '.$this->session->userdata('user_id').')');
        $this->db->or_where('4 in (select role_id from user_permtion
         where user_id = '.$this->session->userdata('user_id').')');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_news_id($id)
    {
        $this->db->select('news.*, category.id cat_id');
        $this->db->where('news.id', $id);
        $this->db->from('news');
        $this->db->join('category', 'category.id = news.category_id' , 'left');
//        $this->db->where_in('news.category_id', $this->session->userdata('roles'));
//        $this->db->or_where('1 in (select role_id from user_permtion
//         where user_id = '.$this->session->userdata('user_id').')');
//        $this->db->or_where('2 in (select role_id from user_permtion
//         where user_id = '.$this->session->userdata('user_id').')');
//        $this->db->or_where('4 in (select role_id from user_permtion
//         where user_id = '.$this->session->userdata('user_id').')');
        $query = $this->db->get();
        return $query->row();
    }

    public function addBreakNew($data)
    {

        $this->db->insert('breaknews',$data);
    }

    public function get_breaknews()
    {
        $this->db->select('breaknews.*, users.name');
        $this->db->order_by("id" , "desc");
        $this->db->from('breaknews');
        $this->db->limit('100');
        $this->db->join('users', 'users.id = breaknews.user_id' , 'left');
        $query = $this->db->get();
        return $query->result();
    }


    public function delBreakNew($id){


        $this -> db -> where('id', $id);
        $this -> db -> delete('breaknews');
    }

    public function updtBreakNew($id = NULL,$data) {

        $this->db->set('text', $data);
        $this->db->where('id', $id);
        $this->db->update( 'breaknews');

    }

 public function get_news_tags($id)
    {

        $this->db->select('*');
        $this->db->from('tag_news');
        $this->db->where('news_id', $id);
        $query = $this->db->get();
        return $query->result();
    }


}