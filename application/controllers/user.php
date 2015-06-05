<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(array('m_user','m_user_group'));
        $this->is_logged_in();
    }
    
    public function index($id='') {
        if($id!='') {
            $data['user1'] = $this->m_user->get_id_user($id); 
        }
        $data['title']='User';
        $data['user'] = $this->m_user->get_all_user();
        $data['user_group']=  $this->m_user_group->get_all('user_group');
        $this->load->view('user', $data);
    }
    
    public function add() {
        $data=array (
            'user_id' => $this->input->post('txtUserId'),
            'user_group_id' => $this->input->post('txtUserGroupId'),
            'username' => $this->input->post('txtUsername'),
            'password' => sha1($this->input->post('txtPassword')),
            'name' => $this->input->post('txtName')		
        );
        $sql=$this->m_user->add('user',$data);
        if($sql) {
            echo "User ".$this->input->post('txtUserId')." tersimpan";
        } else {
            echo "Gagal menyimpan data";
        }        
    }
    
    public function update() {
        $id = $this->input->post('txtUsername');
        $data=array (
            'user_group_id' => $this->input->post('txtUserGroupId'),
            'name' => $this->input->post('txtName')
        );
        $data2=array (
            'user_group_id' => $this->input->post('txtUserGroupId'),
            'password' => sha1($this->input->post('txtPassword')),
            'name' => $this->input->post('txtName')
        );
        $pwd = $this->input->post('txtPassword');
        if ($pwd=='') {
            $sql=$this->m_user->update('user','username',$id,$data);
        } else {
            $sql=$this->m_user->update('user','username',$id,$data2);
        }
        if($sql) { echo "User ".$this->input->post('txtUsername')." terupdate";  } else {
            echo "Gagal mengubah data";
        }   
    }
    
    public function delete() {
        $id = $this->input->post('txtUsername');
        $data=array(
            'password' => $this->input->post('txtPassword'),
            'user_group_id' => $this->input->post('txtUserGroupId'),
            'name' => $this->input->post('txtName')
        );
        $sql=  $this->m_user->delete('user','username',$id,$data);
        if ($sql) {
            echo 'User berhasil dihapus';
        } else {
            echo 'Gagal melakukan hapus user';
        }
    }
    
    public function change_password() {
        $data['title']='Change Password';
        $data['user'] = $this->m_user->get_id('user','username',  $this->session->userdata('username'));
        $this->load->view('change_password', $data);        
    }
}
