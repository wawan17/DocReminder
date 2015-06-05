<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class user_group extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('m_user_group'));
        $this->is_logged_in();
    }

    public function index($id = '') {
        if ($id != '') {
            $data['user_group1'] = $this->m_user_group->get_id('user_group', 'user_group_id', $id);
            $data['user_access1'] = $this->m_user_group->get_id('user_access', 'user_group_id', $id);
        }
        $data['title'] = 'User Group';
        $data['max_id'] = $this->max_id();
        $data['user_group'] = $this->m_user_group->get_all('user_group');
        $this->load->view('grup_user', $data);
    }

    public function add() {
        $data = array(
            'user_group_id' => $this->input->post('txtUserGroupId'),
            'user_group_name' => $this->input->post('txtUserGroupName'),
            'remark' => $this->input->post('txtRemark')
        );
        
        // user access
        $module=  $this->input->post('module');
        foreach ($module as $id => $value) {
           $data_detail[]=array(
               'id'=>'',
               'module_id'=>  $value,
               'user_group_id'=>  $this->input->post('txtUserGroupId')
           );
        }
        // insert process
        $sql_header = $this->m_user_group->add('user_group', $data);
        $sql_detail = $this->m_user_group->add_detail('user_access',$data_detail);
        
        if($sql_header && $sql_detail) {
            echo "Data User Group Tersimpan";
        } else {
            echo "Transksi gagal";
        }
    }
    
    public function update() {
        $id = $this->input->post('txtUserGroupId');
        
        // delete exiting user access
        $this->m_user_group->delete('user_access','user_group_id',$id);
        
        $data = array(
            'user_group_name' => $this->input->post('txtUserGroupName'),
            'remark' => $this->input->post('txtRemark')
        );
        $this->m_user_group->update('user_group','user_group_id',$id,$data);
        
        // add new user access
        $module=  $this->input->post('module');
        foreach ($module as $id => $value) {
           $data_detail[]=array(
               'id'=>'',
               'module_id'=>  $value,
               'user_group_id'=>  $this->input->post('txtUserGroupId')
           );
        }
        // insert process
        $sql_detail = $this->m_user_group->add_detail('user_access',$data_detail);
        
        if($sql_detail) {
            echo "Data User Group Tersimpan";
        } else {
            echo "Transksi gagal";
        }
        
    }
    
    public function delete() {
        $id = $this->input->post('txtUserGroupId');
        
        // delete exiting user access
        $query1=$this->m_user_group->delete('user_group','user_group_id',$id);
        $query2=$this->m_user_group->delete('user_access','user_group_id',$id);
        
        if($query1 && $query2) {
            echo "User group terhapus";
        } else {
            echo "Gagal menghapus";
        }
    }

    private function max_id() {
        $maxid = $this->m_user_group->get_max_id('user_group', 'user_group_id', '');
        foreach ($maxid as $row) {
            $maxid1 = $row->user_group_id;
            $maxid2 = (int) $maxid1 + 1;
            return $maxid2;
        }
    }

}
