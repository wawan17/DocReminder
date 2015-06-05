<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dashboard
 *
 * @author SETIAWAN
 */
class dashboard extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(array('m_module_user'));
        $this->is_logged_in();
    }
    
    public function index() {
        $data['header']='Dashboard';
        $data['menu']=  $this->m_module_user->get_menu_id($this->session->userdata('username'));
        parent::_view('dashboard', $data);
        
    }
}
