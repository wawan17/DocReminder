<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home
 *
 * @author SETIAWAN
 */
class Home extends MY_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('html', 'form', 'url', 'text'));
        $this->load->library(array('form_validation'));
        $this->load->model(array('m_user', 'm_module_user'));
    }

    public function index() {
        if ($this->session->userdata('name')) {
            return redirect('dashboard');
        } else {
            $this->load->view('login'); 
        }
    }

    private function get_name($uname) {
        $sql=  $this->m_user->get_id('user', 'username', $uname);
        foreach ($sql as $row) {
            $name=$row->name;
        }
        return $name;
    }

    public function login_process() {
        $query = $this->m_user->validate();
        $row = $query->num_rows();

        $data['menu'] = $this->m_module_user->get_menu_id($this->input->post('uname'));

        if ($row != 0) {
            $data = array(
                'username' => $this->input->post('uname'),
                'name' => $this->get_name($this->input->post('uname')),
                'pword' => $this->input->post('pword'),
                'is_logged_in' => TRUE
            );


            $this->session->set_userdata($data);
            redirect('dashboard');
        } else {
            $data['data'] = "Username or password you typing are wrong. Plase try again!";
            $this->load->view('login', $data);
        }
    }

    function logout() {
        $this->session->unset_userdata();
        $this->session->sess_destroy();

        $this->output->set_header("HTTP/1.0 200 OK");
        $this->output->set_header("HTTP/1.1 200 OK");
        $this->output->set_header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $last_update) . ' GMT');
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");

        redirect('home');
    }

}
