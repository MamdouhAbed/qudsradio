<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->library('session');
        $this->load->model('AuthorModel');
        $this->load->model('NewsModel');
        $this->load->helper(array('form','url'));
        $this->load->helper("thumb_helper");
        $this->load->helper('helper1');
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->library('pagination');


    }
    

    public function author_table()
    {

        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(8,$this->session->userdata('roles'))){
        $data['title'] = "قائمة الكُتاب";
        $authors = $this->AuthorModel->get_authors();
        $data ['Authors'] = $authors;
        $this->load->view('admin/partial/header',$data);
        $this->load->view('admin/partial/aside-menu');
        $this->load->view('admin/pages/dtableAuthor',$data);
        $this->load->view('admin/partial/footer');
    }else{
redirect('admin/login');
}

    }

    public function add_author()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(8,$this->session->userdata('roles'))){
            $data['title'] = "إضافة كاتب";
            $this->load->view('admin/partial/header', $data);
            $this->load->view('admin/partial/aside-menu');
            $this->load->view('admin/pages/add_authors');
            $this->load->view('admin/partial/footer');

        }else{
            redirect('admin/login');
        }
    }

    public function saveAuthor(){

        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(8,$this->session->userdata('roles'))){
         $path=path_img('authors');
        $config['upload_path'] = $path;
        $config['allowed_types'] = '*';
        $config['max_size'] = '2000';
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);
        $this->load->library('session');
        if (isset($_FILES['userfile']) && !empty($_FILES['userfile']['name'])) {
            if (!$this->upload->do_upload("userfile")) {
            } else {
                $uploadedFileData = $this->upload->data();
                //generate random image name
                $randomName = md5(time()) . $uploadedFileData['file_ext'];
                //rename uploaded image to our new image name
                rename($uploadedFileData['full_path'], $uploadedFileData['file_path'] . $randomName);
                $uploadedFileData["file_name"] = $randomName;
                $person_name = $this->input->post('person_name');
                $u_rec_id = $this->session->userdata('user_id');
                $new = array(
                    'name' => $person_name,
                    'img' => $path. $randomName
                );

                $is_inserted = $this->AuthorModel->addAuthor($new);
                if($is_inserted==true)
                    $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
                else
                    $this->session->set_flashdata('error','عذراً، فشلت العملية!');
                redirect('admin/addAuthor');
            }
        }
        }else{
            redirect('admin/login');
        }

    }





    public function updateAuthor()
    {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(8,$this->session->userdata('roles'))){
        $data['title'] = "تعديل بيانات الكاتب";
        $id=$this->uri->segment(3);
        $author = $this->AuthorModel->get_author_id($id);
        if(!$author){
            redirect('admin/dtableAuthor');
        }
        $data ['author'] = $author[0];
        $this->load->view('admin/partial/header',$data);
        $this->load->view('admin/partial/aside-menu');
        $this->load->view('admin/pages/updateAuthors');
        $this->load->view('admin/partial/footer');
    }else{
redirect('admin/login');
}

    }

    public function saveUpdateAuthor(){
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(8,$this->session->userdata('roles'))){
        $path=path_img('authors');
        $id=$this->uri->segment(3);
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2000';
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);
            $u_rec_id = $this->session->userdata('user_id');



            if (isset($_FILES['userfile']) && !empty($_FILES['userfile']['name'])) {

                if (!$this->upload->do_upload('userfile')) {
                } else {
                    $uploadedFileData = $this->upload->data();
                    //generate random image name
                    $randomName = md5(time()) . $uploadedFileData['file_ext'];
                    //rename uploaded image to our new image name
                    rename($uploadedFileData['full_path'], $uploadedFileData['file_path'] . $randomName);

                    $uploadedFileData["file_name"] = $randomName;

                    $person_name = $this->input->post('person_name');

                    $new=array(

                        'img' => $path. $randomName,
                        'name' => $person_name,
                        );
                    $this->AuthorModel->updateAuthor($id,$new);

                }
            }else {
                $person_name = $this->input->post('person_name');
                        $new = array(
                            'name' => $person_name
                        );
                $is_updated=$this->AuthorModel->updateAuthor($id,$new);

            }

            if($is_updated==false)
                $this->session->set_flashdata('success', 'لقد تمت العملية بنجاح!');
            else
                $this->session->set_flashdata('error','عذراً، فشلت العملية!');
            redirect('admin/dtableAuthor');
}else{
    redirect('admin/login');
}


    }

    public function deleteAuthor() {
        if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(8,$this->session->userdata('roles'))){
            $id = $this->input->post('child_id');
            $new = array(

                'is_delete' => 1,
                'deleted_by' => $this->session->userdata('user_id')
            );
            $this->AuthorModel->updateAuthor($id,$new);
            redirect('admin/dtableAuthor');

        }else{

            redirect('admin/login');
        }

    }





}
