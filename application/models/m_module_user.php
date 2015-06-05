<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class m_module_user extends MY_Model {
    public function __construct() {
        parent::__construct();
    }
    
    function get_menu_id($username) {
        $this->db->distinct();
        $this->db->select('a.module_group_id');
        $this->db->select('a.module_group_name');
        $this->db->select('c.user_group_id');
        $this->db->select('d.username');
        $this->db->from('user_module_group a');
        $this->db->join('user_module b','a.module_group_id=b.module_group_id');
        $this->db->join('user_access c','b.module_id=c.module_id');
        $this->db->join('user d','c.user_group_id=d.user_group_id');
        $this->db->where('d.username',$username);
        return $this->db->get()->result();
    }
    
    function get_page_id($module_group_id,$username) {
        $this->db->from('user_access a');
        $this->db->join('user b','a.user_group_id=b.user_group_id');
        $this->db->join('user_module c','a.module_id=c.module_id');
        $this->db->where('c.module_group_id',$module_group_id);
        $this->db->where('b.username',$username);
        return $this->db->get();
    }
    
}
