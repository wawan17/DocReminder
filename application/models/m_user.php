<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_user
 *
 * @author SETIAWAN
 */
class m_user extends MY_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function get_all_user() {
        $this->db->from('user a');
        $this->db->join('user_group b','a.user_group_id=b.user_group_id','left');
        return $this->db->get();
    }
    
    public function get_id_user($username) {
        $this->db->from('user a');
        $this->db->join('user_group b','a.user_group_id=b.user_group_id','left');
        $this->db->where('username',$username);
        return $this->db->get()->result();
    }
    
    function validate() {
        $pw_sha1=  sha1($this->input->post('pword'));
//        $pw_md5= md5($this->input->post('pword'));
//        $pw_mix=substr($pw_md5,0,-10).$pw_sha1.substr($pw_md5,0,3);
//        
        $this->db->where('username',  $this->input->post('uname'));
        $this->db->where('password', $pw_sha1);
        $query=$this->db->get('user');
        return $query;
    }
}
