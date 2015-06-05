<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_document
 *
 * @author wawan.setiawan
 */
class m_document extends MY_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function get_all_open_doc($tbl) {
        $this->db->where('status','o');
        return $this->db->get($tbl);
    }
}
