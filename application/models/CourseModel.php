<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CourseModel extends CI_Model  {


    public function addCourse($data)
    {

        $this->db->insert('programs',$data);
        return $this->db->insert_id();

    }
    public function addLive($data)
    {

        $this->db->insert('live',$data);
        return $this->db->insert_id();

    }
    public function deleteLive($id)
    {
        $this->db->where('program_id', $id);
        $this->db->delete('live');


    }
    public function get_course_where_active($limit,$id)
    {
        $this->db->select('programs.*');
        $this->db->from('programs');
        $this->db->where('programs.is_deleted', 0);
        $this->db->where('activated', 1);
        $this->db->limit($limit,$id);
        $this->db->order_by("id" , "desc");
        $query = $this->db->get();
        return $query->result();
    }
    public function get_course_where_active_count()
    {
        $this->db->select('programs.*');
        $this->db->from('programs');
        $this->db->where('programs.is_deleted', 0);
        $this->db->where('activated', 1);
        $this->db->order_by("id" , "desc");
        $query = $this->db->get();
        return $query->num_rows();

    }
    public function get_course_where_important($limit,$id)
    {
        $this->db->select('programs.*');
        $this->db->from('programs');
        $this->db->where('programs.is_deleted', 0);
        $this->db->where('activated', 1);
        $this->db->where('important', 1);
        $this->db->limit($limit,$id);
        $this->db->order_by("id" , "desc");
        $query = $this->db->get();
        return $query->result();
    }
    public function get_course_panel($limit,$id)
    {
        $this->db->select('programs.*');
        $this->db->from('programs');
        $this->db->where('programs.is_deleted', 0);
        $this->db->limit($limit,$id);
        $this->db->order_by("id" , "desc");
        $query = $this->db->get();
        return $query->result();
    }
    public function get_course_panel_($limit,$id)
    {
        $this->db->select('id, name, activated');
        $this->db->from('programs');
        $this->db->where('programs.is_deleted', 0);
        $this->db->limit($limit,$id);
        $this->db->order_by("id" , "desc");
        $query = $this->db->get();
        return $query->result();
    }
    public function get_course_where_id(){
        $id=$this->uri->segment(2);
        $this->db->select('programs.*');
        $this->db->from('programs');
        $this->db->where('programs.id', $id);
        $query = $this->db->get();
        $courses=$query->row();

        return $courses;
    }
    public function get_course_where_id_panel(){
        $id=$this->uri->segment(3);
        $this->db->select('programs.*');
        $this->db->from('programs');
        $this->db->where('programs.id', $id);
        $query = $this->db->get();
        $courses=$query->row();

        return $courses;
    }

    public function get_course_where_id2($id){

        $this->db->select('programs.*');
        $query = $this->db->get_where('programs', array('programs.id' => $id));
        $courses=$query->row();

        if($courses != null){
            $this->db->where('programs.id', $id);
        }
        return $courses;
    }

    public function get_course_id($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->where('programs.is_deleted', 0);
        $this->db->from('programs');
        $query = $this->db->get();
        return $query->row();
    }


    public function updateCourse($id,$data)
    {

        $this->db->where('id', $id);
        $this->db->update('programs',$data);
    }
    public function get_live_where_course($type)
    {
        $id=$this->uri->segment(2);
        $this->db->select('days.*,live.time,live.type');
        $this->db->from('days');
        $this->db->join('live', "days.id = live.day_id and live.type=$type and live.program_id= $id" , 'left');
        $this->db->order_by('days.id');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_type_where_course()
    {
        $id=$this->uri->segment(2);
        $this->db->distinct('type');
        $this->db->select('type');
        $this->db->from('live');
        $this->db->where('program_id',$id);
        $this->db->order_by('type');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_live_where_course_panel()
    {
        $id=$this->uri->segment(3);
        $this->db->select('live.*,days.name day_name');
        $this->db->from('live');
        $this->db->join('days', 'live.day_id = days.id', 'left');
        $this->db->where('program_id',$id);
        $this->db->order_by('live.type', 'asc');
        $this->db->order_by('live.day_id', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_days()
    {
        $this->db->select('*');
        $this->db->from('days');
        $query = $this->db->get();
        return $query->result();
    }

}