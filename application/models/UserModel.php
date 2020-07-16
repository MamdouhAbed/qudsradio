<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model  {
    public function get_user_username($name)
    {
        $this->db->select('users.*');
        $this->db->where('name', $name);
        $this->db->from('users');


        $query = $this->db->get();
        return $query->result();
    }

    public function addUser($data)
    {

        $this->db->insert('users',$data);
        return $this->db->insert_id();

    }
    public function addRole($data)
    {

        $this->db->insert('user_permtion',$data);
        return $this->db->insert_id();

    }
    public function delRole($id){


        $this -> db -> where('user_id', $id);
        $this -> db -> delete('user_permtion');
    }
    public function updateRole($id,$data)
    {
        $this->db->where('user_id', $id);
        $this->db->update('user_permtion',$data);

    }
    public function get_role_id($id)
    {
        $prms=array();
        $this->db->select('*');
        $this->db->where('user_id', $id);
        $this->db->from('user_permtion');
        $this->db->join('users', 'users.id = user_permtion.user_id' , 'left');
        $query = $this->db->get();
        $rsults= $query->result();
        foreach ($rsults as $r){
            $prms[]=$r->role_id;
        }
        return $prms;
    }

    public function get_user()
    {
         $this->db->select('users.*');
        $this->db->where('is_deleted', 0);
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_user_id($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('users');
        $query = $this->db->get();
        return $query->row();
    }


    public function updateUser($id,$data)
    {
//
        $this->db->where('id', $id);
        $this->db->update('users',$data);
    }

    public function delUser($id){


        $this -> db -> where('id', $id);
        $this -> db -> delete('users');
    }

}