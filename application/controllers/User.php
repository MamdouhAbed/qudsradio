<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->library('session');
        $this->load->helper('helper1');
        $this->load->helper(array('form','url'));
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('userModel');


    }


    public function user_table()
    {
        if (in_array(1,$this->session->userdata('roles'))) {
        $data['title'] = "إدارة المستخدمين";
        $users = $this->userModel->get_user();
        $data ['User'] = $users;
        $this->load->view('admin/partial/header',$data);
        $this->load->view('admin/partial/aside-menu');
        $this->load->view('admin/pages/dtableUsers');
        $this->load->view('admin/partial/footer');
        }else{
            redirect('admin/login');
        }
    }

    public function add_user()
    {
        if (in_array(1,$this->session->userdata('roles'))) {
        $data['title'] = "إضافة مستخدم جديد";
        $this->load->view('admin/partial/header',$data);
        $this->load->view('admin/partial/aside-menu');
        $this->load->view('admin/pages/addUser');
        $this->load->view('admin/partial/footer');
    }else{
redirect('admin/login');
}
    }

    public function saveUser(){
        if (in_array(1,$this->session->userdata('roles'))) {
         $path=path_img('users');
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'jpg|png|jpeg';
//            $config['max_size'] = '2000';
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);
            if (isset($_FILES['userfile']) && !empty($_FILES['userfile']['name'])) {

                if (!$this->upload->do_upload('userfile')) {
                } else {

                    $uploadedFileData = $this->upload->data();
                    $randomName = md5(time()) . $uploadedFileData['file_ext'];
                    rename($uploadedFileData['full_path'], $uploadedFileData['file_path'] . $randomName);
                    $uploadedFileData["file_name"] = $randomName;


                    $users = array('name' => $this->input->post('username'),
                        'email' => $this->input->post('email'),
                        'img_user' => $path.$randomName,
                        'password' => md5($this->input->post('password')),
                        'activat_id' => 1);

                    $insert_id=$this->userModel->addUser($users);
//                        $role=1;
                        if($this->input->post('admin')==1){
                        $role=1;
                            $roles = Array('user_id' => $insert_id,
                                'role_id' => $role);
                            $this->userModel->addRole($roles);
                    }else{
                    if($this->input->post('supervisor')==1){
                        $role=2;
                            $roles = Array('user_id' => $insert_id,
                                'role_id' => $role);
                            $this->userModel->addRole($roles);
                    }else{
                    if($this->input->post('all_category')==1){
                        $role=3;
                            $roles = Array('user_id' => $insert_id,
                                'role_id' => $role);
                            $this->userModel->addRole($roles);
                    }else {
                        if ($this->input->post('programs') == 1) {
                            $role = 5;
                            $roles = Array('user_id' => $insert_id,
                                'role_id' => $role);
                            $this->userModel->addRole($roles);
                        }
                        if ($this->input->post('episodes') == 1) {
                            $role = 6;
                            $roles = Array('user_id' => $insert_id,
                                'role_id' => $role);
                            $this->userModel->addRole($roles);
                        }
                        if ($this->input->post('media') == 1) {
                            $role = 7;
                            $roles = Array('user_id' => $insert_id,
                                'role_id' => $role);
                            $this->userModel->addRole($roles);
                        }
                        if ($this->input->post('letters') == 1) {
                            $role = 8;
                            $roles = Array('user_id' => $insert_id,
                                'role_id' => $role);
                            $this->userModel->addRole($roles);
                        }
                        if ($this->input->post('breaknews') == 1) {
                            $role = 9;
                            $roles = Array('user_id' => $insert_id,
                                'role_id' => $role);
                            $this->userModel->addRole($roles);
                        }
                        if ($this->input->post('ads') == 1) {
                            $role = 10;
                            $roles = Array('user_id' => $insert_id,
                                'role_id' => $role);
                            $this->userModel->addRole($roles);
                        }
                        if ($this->input->post('live') == 1) {
                            $role = 14;
                            $roles = Array('user_id' => $insert_id,
                                'role_id' => $role);
                            $this->userModel->addRole($roles);
                        }
                        //@start 5-7-2020 Mamdouh
                        if ($this->input->post('private_file') == 1) {
                            $role = 15;
                            $roles = Array('user_id' => $insert_id,
                                'role_id' => $role);
                            $this->userModel->addRole($roles);
                        }
                        //@end
                    }
                    if ($this->input->post('all_catnews') == 1) {
                        $role = 4;
                        $roles = Array('user_id' => $insert_id,
                            'role_id' => $role);
                        $this->userModel->addRole($roles);
                    }else{
                     if($this->input->post('reports')==1){
                        $role=11;
                            $roles = Array('user_id' => $insert_id,
                                'role_id' => $role);
                            $this->userModel->addRole($roles);
                     }
                     if($this->input->post('interviews')==1){
                        $role=12;
                            $roles = Array('user_id' => $insert_id,
                                'role_id' => $role);
                            $this->userModel->addRole($roles);
                     }
                    }
                    }
                        }


                }
            }
            if($insert_id==true)
                $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
            else
                $this->session->set_flashdata('error','عذراً، فشلت العملية!');
       redirect('admin/addUser');
}else{
    redirect('admin/login');
}
    }

    public function updateUser()
    {
        if (in_array(1,$this->session->userdata('roles'))) {
        $id=$this->uri->segment(3);
        $users = $this->userModel->get_role_id($id);
        $data ['users'] = $users;
        $user = $this->userModel->get_user_id($id);
        $data ['user'] =  $user;
            if($user != null){
                $data['title'] = "تعديل بيانات المستخدم ";
            }
            else{
                $data['title'] = " الصفحة غير موجودة ";
                $data['Description'] = '';
                $data['image'] =" ";
            }
        $this->load->view('admin/partial/header',$data);
        $this->load->view('admin/partial/aside-menu');
            if($user != null)
                $this->load->view('admin/pages/updateUser');
        else
            $this->load->view('admin/pages/err404');
        $this->load->view('admin/partial/footer');
    }else{
    redirect('admin/login');
}
    }

    public function saveUpdateUser(){
        if (in_array(1,$this->session->userdata('roles'))) {
            $id = $this->uri->segment(3);
            $this->userModel->delRole($id);
            if($this->input->post('admin')==1){
                $role=1;
                $roles = Array('user_id' => $id,
                    'role_id' => $role);
                $this->userModel->addRole($roles);
            }else{
                if($this->input->post('supervisor')==1){
                    $role=2;
                    $roles = Array('user_id' => $id,
                        'role_id' => $role);
                    $this->userModel->addRole($roles);
                }else{
                    if($this->input->post('all_category')==1){
                        $role=3;
                        $roles = Array('user_id' => $id,
                            'role_id' => $role);
                        $this->userModel->addRole($roles);
                    }else {
                        if ($this->input->post('programs') == 1) {
                            $role = 5;
                            $roles = Array('user_id' => $id,
                                'role_id' => $role);
                            $this->userModel->addRole($roles);
                        }
                        if ($this->input->post('episodes') == 1) {
                            $role = 6;
                            $roles = Array('user_id' => $id,
                                'role_id' => $role);
                            $this->userModel->addRole($roles);
                        }
                        if ($this->input->post('media') == 1) {
                            $role = 7;
                            $roles = Array('user_id' => $id,
                                'role_id' => $role);
                            $this->userModel->addRole($roles);
                        }
                        if ($this->input->post('letters') == 1) {
                            $role = 8;
                            $roles = Array('user_id' => $id,
                                'role_id' => $role);
                            $this->userModel->addRole($roles);
                        }
                        if ($this->input->post('breaknews') == 1) {
                            $role = 9;
                            $roles = Array('user_id' => $id,
                                'role_id' => $role);
                            $this->userModel->addRole($roles);
                        }
                        if ($this->input->post('ads') == 1) {
                            $role = 10;
                            $roles = Array('user_id' => $id,
                                'role_id' => $role);
                            $this->userModel->addRole($roles);
                        }
                        if ($this->input->post('live') == 1) {
                            $role = 14;
                            $roles = Array('user_id' => $id,
                                'role_id' => $role);
                            $this->userModel->addRole($roles);
                        }

                        //@start 5-7-2020 Mamdouh
                        if ($this->input->post('private_file') == 1) {
                            $role = 15;
                            $roles = Array('user_id' => $id,
                                'role_id' => $role);
                            $this->userModel->addRole($roles);
                        }
                        //@end
                    }
                    if ($this->input->post('all_catnews') == 1) {
                        $role = 4;
                        $roles = Array('user_id' => $id,
                            'role_id' => $role);
                        $this->userModel->addRole($roles);
                    }else{
                        if($this->input->post('reports')==1){
                            $role=11;
                            $roles = Array('user_id' => $id,
                                'role_id' => $role);
                            $this->userModel->addRole($roles);
                        }
                        if($this->input->post('interviews')==1){
                            $role=12;
                            $roles = Array('user_id' => $id,
                                'role_id' => $role);
                            $this->userModel->addRole($roles);
                        }
                    }
                }
            }

                $users = array('name' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'activat_id' => 1);
            $this->userModel->updateUser($id, $users);
            $path=path_img('users');
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '3000';
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);
            if (isset($_FILES['userfile']) && !empty($_FILES['userfile']['name'])) {

                if (!$this->upload->do_upload('userfile')) {
                } else {

                    $uploadedFileData = $this->upload->data();
                    $randomName = md5(time()) . $uploadedFileData['file_ext'];
                    rename($uploadedFileData['full_path'], $uploadedFileData['file_path'] . $randomName);
                    $uploadedFileData["file_name"] = $randomName;
                    $users = array(
                        'img_user' => $path . $randomName);
                    $this->userModel->updateUser($id, $users);
                }
            }
            $password = $this->input->post('password');
            if ($password != null) {

            $users = array(
                'password' => md5($password)
            );
                $is_updated=$this->userModel->updateUser($id, $users);
        }
            if($is_updated==false)
                $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
            else
                $this->session->set_flashdata('error','عذراً، فشلت العملية!');
                    redirect('admin/dtableUsers');
}else{
    redirect('admin/login');
}
    }
    public function updateInformation()
    {
        if ($this->session->userdata('user_id')) {
            $user_data = $this->session->userdata('user_id');
            $data['title'] = "تعديل البيانات الشخصية ";
            $users2 = $this->userModel->get_user_id($user_data);
            $data ['users2'] = $users2;
            $this->load->view('admin/partial/header', $data);
            $this->load->view('admin/partial/aside-menu');
            $this->load->view('admin/pages/updateInformation');
            $this->load->view('admin/partial/footer');

        }else{
            redirect('admin/login');
        }
    }

    public function saveUpdateInformation(){
        if ($this->session->userdata('user_id')) {
            date_default_timezone_set('Asia/Gaza');
            $date=date('Y-m-d H:i:s') ;
            $user_data = $this->session->userdata('user_id');


                $users = array('name' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'activat_id' => 1,
                    'updated_at' => $date);

            $is_updated= $this->userModel->updateUser($user_data, $users);
            $path=path_img('users');
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '3000';
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);
            if (isset($_FILES['userfile']) && !empty($_FILES['userfile']['name'])) {

                if (!$this->upload->do_upload('userfile')) {
                    $this->session->set_flashdata('error','عذراً، فشلت العملية!');
                    redirect('admin/updateInformation');
                } else {

                    $uploadedFileData = $this->upload->data();
                    $randomName = md5(time()) . $uploadedFileData['file_ext'];
                    rename($uploadedFileData['full_path'], $uploadedFileData['file_path'] . $randomName);
                    $uploadedFileData["file_name"] = $randomName;
                    $users = array(
                        'img_user' => $path . $randomName);
                    $is_updated= $this->userModel->updateUser($user_data, $users);
                }
            }
            $password = $this->input->post('password');
            if ($password != null) {

                $users = array(
                    'password' => md5($password)
                );
                $is_updated= $this->userModel->updateUser($user_data, $users);
            }
            if($is_updated==false)
                $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
            else
                $this->session->set_flashdata('error','عذراً، فشلت العملية!');
            redirect('admin/updateInformation');

        }else{
            redirect('admin/login');
        }
    }

    public function deleteUser() {
        if (in_array(1,$this->session->userdata('roles'))) {
        $id = $this->input->post('userID');
            $users = array(
                'is_deleted' => 1);
        $this->userModel->updateUser($id,$users);
}else{
    redirect('admin/login');
}

    }

}