<?php



Class SearchModel Extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function searchnews($keyword,$limit,$id)
    {
        $this->db->select('news.*, category.id cat_id , category.cat_name ,category.color');
        $this->db->like('title',$keyword);
        $this->db->limit($limit,$id);
        $this->db->order_by("news.id","desc");
        $this->db->from('news');
        $this->db->join('category', 'category.id = news.category_id');
        $query = $this->db->get();
        return $query->result();
    }

    function searchprogram($keyword,$limit,$id)
    {
        $this->db->select('programs.*');
        $this->db->like('name',$keyword);
        $this->db->limit($limit,$id);
        $this->db->order_by("id" , "desc");
        $this->db->from('programs');
        $this->db->where('programs.is_deleted', 0);
        $query = $this->db->get();
        return $query->result();
    }
    function searchepisode($keyword,$limit,$id)
    {
        $this->db->select('episode.*');
        $this->db->like('name',$keyword);
        $this->db->limit($limit,$id);
        $this->db->order_by("id" , "desc");
        $this->db->from('episode');
        $this->db->where('episode.is_deleted', 0);
        $query = $this->db->get();
        return $query->result();
    }
    function searchvideos($keyword,$limit,$id)
    {
        $this->db->select('videos.* , SUBSTRING(link_youtube, -11) as video');
        $this->db->like('title',$keyword);
        $this->db->limit($limit,$id);
        $this->db->order_by("id" , "desc");
        $this->db->from('videos');
        $this->db->where('main_media_id', 1);
        $this->db->where('activated', 1);
        $query = $this->db->get();
        return $query->result();
    }
    function searchletters($keyword,$limit,$id)
    {
        $this->db->select('news_letters.*');
        $this->db->like('name',$keyword);
        $this->db->limit($limit,$id);
        $this->db->order_by("id" , "desc");
        $this->db->from('news_letters');
        $this->db->where('news_letters.is_deleted', 0);
        $query = $this->db->get();
        return $query->result();
    }
    function count_programs($keyword)
    {
        $this->db->select('count(*) count');
        $this->db->like('name',$keyword);
        $this->db->from('programs');
        $query = $this->db->get();
        return $query->result();
    }
}